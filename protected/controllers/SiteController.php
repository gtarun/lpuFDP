<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $layout='site';
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$this->layout='/layouts/mainSite';
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		if(isset(Yii::app()->user->profile))
			$this->redirect(array('/'));
		$model=new LoginForm;
		$users	=	new Users;
		$forgot	=	new ForgotpasswordForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->loginStatus() && $model->login()){
				if(Yii::app()->user->role=='admin'){
					$this->redirect(array('/admin/users/admin'));
				}
				elseif(Yii::app()->user->role=='client'){
					$this->redirect(array('/client/index'));
				}
				elseif(Yii::app()->user->role=='supplier'){
					$this->redirect(array('/supplier/index'));
				}else{
					$this->redirect(array('/site/login'));
				}
			}else{
				Yii::app()->user->setFlash('loginError','Username or password is not valid or email is not verified.');
			}
		}

		// display the login form
		$this->render('login',array('users'=>$users,'model'=>$model,'forgot'=>$forgot));
	}



	public function actionSignup()
	{
		$model				=	new LoginForm;
		$users				=	new Users;
		$users->attributes	=	$_POST['Users'];
		$users->role_id		=	2;
		$users->status		=	1;
		if($users->save())
		{
			$profile	                =	new ClientProfiles;
			$profile->first_name	    =	$users->display_name;
			$profile->email				=	$users->username;
			$profile->last_name	    	=	$users->role;
			$profile->users_id			=	$users->id;
			$profile->cities_id			=	(!empty($_POST['ClientProjects']['cities_id']))?$_POST['ClientProjects']['cities_id']:9;
			$profile->team_size		    =	$_POST['ClientProjects']['team_size'];
			$profile->company_link		=	$_POST['Users']['company_link'];
			$profile->company_name		=	$_POST['Users']['company_name'];
			$profile->status		    =	1;
			$profile->add_date		    =	date('Y-m-d H:i:s');
			$profile->save();

			$data['name']		=	$users->display_name;
			$data['email']		=	$users->username;
			$data['password']	=	$users->password;
			$this->sendMail($data,'register');

			$model->username	=	$users->username;
			$model->password	=	$users->password;
			if($model->login())
				$response = array("exist" =>true,'message'=>'Welcome to VenturePact. Post your first job by clicking on "Add a new Job". <br>If you would like to discuss your requirements over a call, feel free to schedule a call here.');
			else{
				$response = array("exist" =>false,'message'=>'Error occurred during login to your account. Please try again after some time.');
			}

		}
		else
			$response = array("exist" =>false,'message'=>'Signup not completed. This email address is already in use.');

		echo json_encode($response);
		die;
	}
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
    public function actionNewPassword()
	{
		if(!isset(Yii::app()->session['passwordEmail']))
			$this->redirect(Yii::app()->createUrl('/site/resetPassword'));
		$model     =    new NewpasswordForm;
		if(isset($_POST['NewpasswordForm'])){
			$model->attributes=$_POST['NewpasswordForm'];
			if($model->validate())
			{
				$record = Users::model()->findByAttributes(array('username'=>Yii::app()->session['passwordEmail']));
				$record->password            =    $model->new_password;
				if($record->save()){
					$login     =    new LoginForm;
					$login->username     =  Yii::app()->session['passwordEmail']  ;
					$login->password     =  $model->new_password ;
					if($login->validate() && $login->login()){
						if(Yii::app()->user->role=='admin'){
							Yii::app()->user->setFlash('success','Your new password has been sent to the email address you provided.');
							unset(Yii::app()->session['passwordEmail']);
							$this->redirect(array('admin/users'));
						}else{
							Yii::app()->user->setFlash('success','Your new password has been sent to the email address you provided.');
							unset(Yii::app()->session['passwordEmail']);
							$this->redirect(Yii::app()->createUrl('/'.Yii::app()->user->role));
						}
					}
				}
				else
					die('error');
			}
		}
		$this->render('newPassword',array('model'=>$model));
	}

}
