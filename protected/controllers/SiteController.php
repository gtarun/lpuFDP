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
        $this->layout  = '//layouts/newLayout';
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


    public function sendMail($data,$type)
	{
		switch($type){
			case 'welcome':
				$subject = 'VenturePact: We are offering you premium concierge service.';
				$body = $this->renderPartial('/mails/welcome_tpl',
										array('name' => $data['name']), true);
			break;
			case 'contact':
				$subject = 'Contact Us';
				$body = $this->renderPartial('/mails/contact_tpl',
										array('name' => $data['name']), true);
			break;
			case 'forget':
				$subject = 'VenturePact: Forgot Password';
				$body = $this->renderPartial('/mails/forgot_tpl',
										array(	'name' => $data['name'],
												'email'=>$data['email'],
												'password'=>$data['password']), true);
			break;
			case 'register':
				$subject = 'Action Required - Verify Email Address';
				$body = $this->renderPartial('/mails/register_tpl',
										array(	'name' => $data['name'],
												'email'=>$data['email'],
                                                'link'=>base64_encode($data['email']),
												'password'=>base64_encode($data['password'])), true);
			break;
			case 'request':
				$subject = 'Project request application';
				$body = $this->renderPartial('/mails/request_tpl',
										array(	'data' => $data), true);

				$data['email']	=	Yii::app()->params['adminEmail'];
			break;

			default:
			break;
		}
		$from		=	Yii::app()->params['adminEmail'];
		$to			=	$data['email'];
		require_once("sendgrid-php/sendgrid-php.php");
		$options = array("turn_off_ssl_verification" => true);
		$sendgrid = new SendGrid('riteshtandon231981', 'venturepact1', $options);
		$mail = new SendGrid\Email();
		$mail->addTo($to)->setFrom($from)->setSubject($subject)->setHtml($body);
		if(!$sendgrid->send($mail))
			return 0;
        else
			return 1;
	}

	public function ActionLinkedin()
	{
		$role				=	$_REQUEST['role'];
		$API_CONFIG = array(
			'appKey'       => '75anr5w4aijrvv',
			'appSecret'    => 'Aox4aWXcgWh1J3pk',
			'callbackUrl'  => $this->createAbsoluteUrl('/site/linkedinAfter',array('role'=>$role))
			);
		$_REQUEST['lType']	=	(isset($_REQUEST['lType'])) ? $_REQUEST['lType'] : '';
		switch($_REQUEST['lType']) {
			case 'initiate':
				$OBJ_linkedin = new LinkedIn($API_CONFIG);
				$_GET[LINKEDIN::_GET_RESPONSE] = (isset($_GET[LINKEDIN::_GET_RESPONSE])) ? $_GET[LINKEDIN::_GET_RESPONSE] : '';
				if(!$_GET[LINKEDIN::_GET_RESPONSE]) {
					$response = $OBJ_linkedin->retrieveTokenRequest();
					if($response['success'] === TRUE) {
						Yii::app()->session['oauth_request']	= $response['linkedin'];
						header('Location: ' . LINKEDIN::_URL_AUTH . $response['linkedin']['oauth_token']);
					} else {
						echo "Request token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
					}
				}
				else{
					$response = $OBJ_linkedin->retrieveTokenAccess(Yii::app()->session['oauth_request']['oauth_token'],Yii::app()->session['oauth_request']['oauth_token_secret'], $_GET['oauth_verifier']);
					if($response['success'] === TRUE) {
						Yii::app()->session['oauth_access'] = $response['linkedin'];
						Yii::app()->session['oauth_authorized'] = TRUE;
						$this->redirect(Yii::app()->createUrl('linkedinAfter',array('role'=>$role)));
					} else {
						echo "Access token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
					}
				}
			break;
			case 'revoke':
				if(!oauth_session_exists()) {
					throw new LinkedInException('This script requires session support, which doesn\'t appear to be working correctly.');
				}
				$OBJ_linkedin = new LinkedIn($API_CONFIG);
				$OBJ_linkedin->setTokenAccess(Yii::app()->session['oauth_access']);
				$response = $OBJ_linkedin->revoke();
				if($response['success'] === TRUE) {
					session_unset();
					$_SESSION = array();
					if(session_destroy()) {
						header('Location: ' . $_SERVER['PHP_SELF']);
					} else {
						echo "Error clearing user's session";
					}
				} else {
					echo "Error revoking user's token:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
				}
			break;
			default:
				if(version_compare(PHP_VERSION, '5.0.0', '<')) {
					throw new LinkedInException('You must be running version 5.x or greater of PHP to use this library.');
				}
				if(extension_loaded('curl')) {
					$curl_version = curl_version();
					$curl_version = $curl_version['version'];
				}else {
					throw new LinkedInException('You must load the cURL extension to use this library.');
				}
			break;
		}
	}

	public function ActionLinkedinAfter()
	{
		$API_CONFIG = array(
			'appKey'       => '75anr5w4aijrvv',
			'appSecret'    => 'Aox4aWXcgWh1J3pk',
			'callbackUrl'  => $this->createAbsoluteUrl('/site/linkedinAfter',array('role'=>$_REQUEST['role']))
			//'callbackUrl'  => $this->createAbsoluteUrl('/site/linkedinAfter')
			);
		$OBJ_linkedin = new LinkedIn($API_CONFIG);
		$response = $OBJ_linkedin->retrieveTokenAccess(Yii::app()->session['oauth_request']['oauth_token'],Yii::app()->session['oauth_request']['oauth_token_secret'], $_GET['oauth_verifier']);
		if($response['success'] === TRUE) {
			Yii::app()->session['oauth_access'] = $response['linkedin'];
			Yii::app()->session['oauth_authorized'] = TRUE;
		}
		Yii::app()->session['oauth_authorized'] = (isset( Yii::app()->session['oauth_authorized']))? Yii::app()->session['oauth_authorized']: FALSE;
		if( Yii::app()->session['oauth_authorized'] === TRUE) {
			$OBJ_linkedin = new LinkedIn($API_CONFIG);
			$OBJ_linkedin->setTokenAccess(Yii::app()->session['oauth_access']);
			$OBJ_linkedin->setResponseFormat(LINKEDIN::_RESPONSE_XML);
			$response = $OBJ_linkedin->profile('~:(id,first-name,last-name,public-profile-url,email-address,picture-url,location,interests,phone-numbers,main-address,positions,skills,educations,network)');
			if($response['success'] === TRUE) {
				$response['linkedin'] = new SimpleXMLElement($response['linkedin']);
				$responseArray = (array) $response['linkedin'];
				$loc	=	(array)$responseArray['location'];
				$postion	=	(array)$responseArray['positions'];
				if(isset($postion['position'][0])){
					$curPo		=	(isset($postion['position'][0]))?(array)$postion['position'][0]:array();
					$company1	=	(isset($curPo['company']))?(array)$curPo['company']:array();
					$company	=	(isset($company1['name']))?$company1['name']:'';
				}
				$location	=	explode(',',$loc['name']);
				if(isset($location[1]) && isset($location[0])){
					$stat	=	States::model()->findByAttributes(array('name'=>rtrim(ltrim(ucfirst($location[1]),' '),' ')));
					if(empty($stat)){
						$stat				=	new States;
						$stat->name			=	rtrim(ltrim(ucfirst($location[1]),' '),' ');
						$stat->description	=	'Data added from Linkedin';
						$stat->price_zone_id=	1;
						$stat->countries_id	=	1;
						$stat->code			=	1;
						$stat->code2			=	1;
						$stat->status		=	1;
						$stat->save();
					}
					$city	=	Cities::model()->findByAttributes(array('name'=>rtrim(ltrim(ucfirst($location[0]),' '),' '),'states_id'=>$stat->id));
					if(empty($city)){
						$city				=	new Cities;
						$city->name			=	rtrim(ltrim(ucfirst($location[0]),' '),' ');
						$city->description	=	'Data added from Linkedin';
						$city->states_id	=	$stat->id;
						$city->code			=	1;
						$city->status		=	1;
						$city->save();
					}
				}
				else{
					$city				=	Cities::model()->findByPk(9);
				}
				$linkedinId		=	$responseArray['id'];
				$email			=	$responseArray['email-address'];
				$phone			=	$responseArray['phone-numbers'];
				$display_name	=	(isset($responseArray['first-name']))?$responseArray['first-name']:'';
				$profileUrl		=	(isset($responseArray['public-profile-url']))?$responseArray['public-profile-url']:'';
				$profilePic		=	(isset($responseArray['picture-url']))?$responseArray['picture-url']:'';
				$last_name		=	(isset($responseArray['last-name']))?$responseArray['last-name']:'';
				$education1		=	(array)$responseArray['educations'];
				if(!empty($education1['education']))
					$educations		=	$education1['education'];
				else
					$educations		=	array();
				if(!empty($responseArray['positions']))
					$position1		=	(array)$responseArray['positions'];
				else
					$position1		=	array();

				if(!empty($position1) && !empty($position1['position']))
					$positions		=	$position1['position'];
				else
					$positions		=	array();
				$record_exists	=	Users::model()->find('linkedin = :linkedinId and username = :username', array(':linkedinId'=>$linkedinId,':username'=>$email));
				if(!empty($record_exists)){
					$model     			=     new LoginForm;
					$model->username	=	$record_exists->username;
					$model->password	=	$record_exists->password;
					if($model->validate() && $model->login()){
						if(isset(Yii::app()->user->role)){
							$this->redirect(array('/'.Yii::app()->user->role));
						}else{
							$this->redirect(array('site/login'));
						}
					}
				}
				else{
					$users	=	Users::model()->findByAttributes(array('username'=>$email));
					if(empty($users)){
						$users					=	new Users;
						$users->username		=	$email;
						$password				=	time();
						$users->password		=	$password;
						$users->status			=	1;
						$users->role_id			=	$_REQUEST['role'];
						$users->display_name	=	$display_name;
						$users->add_date		=	date('Y-m-d H:i:s');
					}
					$users->linkedin			=	$linkedinId;
					if($users->save())
					{
						if($_REQUEST['role']==2){
							$profile	=	ClientProfiles::model()->find('users_id = :userId', array(':userId'=>$users->id));
							if(empty($profile)){
								$profile	                =	new ClientProfiles;
								$profile->first_name	    =	$display_name;
								$profile->last_name			=	$last_name;
								$profile->email				=	$email;
								$profile->phone_number		=	(isset($phone))?$phone:"";
								$profile->image				=	$profilePic;
								$profile->users_id		    =	$users->id;
								$profile->cities_id		    =	$city->id;
								$profile->company_name		=	(isset($company))?$company:'';
								$profile->status			=	1;
								$profile->add_date		    =	date('Y-m-d H:i:s');
								$profile->save();
							}
							$model				=	new LoginForm;
							$model->username	=	$users->username;
							$model->password	=	$users->password;
							if($model->login()){
								$data['name']		=	$users->display_name;
								$data['email']		=	$users->username;
								$data['password']	=	$users->password;
								$this->sendMail($data,'register');
								if(isset(Yii::app()->user->role)){
									$this->redirect(array('/'.Yii::app()->user->role));
								}else{
									$this->redirect(array('site/login'));
								}
							}
							else{
								Yii::app()->user->setFlash('error','Unable to connect linked in profile.');
								$this->redirect(Yii::app()->createUrl('/site/login'));
							}
						}
						else{
							$profile	=	Suppliers::model()->find('users_id = :userId', array(':userId'=>$users->id));
							if(empty($profile)){
								$profile	                =	new Suppliers;
								$profile->first_name	    =	$display_name;
								$profile->last_name			=	$last_name;
								$profile->name			    =	$users->display_name;
								$profile->email				=	$email;
								$profile->phone_number		=	(isset($phone))?$phone:"";
								$profile->logo				=	$profilePic;
								$profile->users_id		    =	$users->id;
								$profile->cities_id		    =	$city->id;
								$profile->status		    =	1;
								$profile->add_date		    =	date('Y-m-d H:i:s');
								$profile->save();
								//CVarDumper::dump($profile,10,1);die;
							}
							$model				=	new LoginForm;
							$model->username	=	$users->username;
							$model->password	=	$users->password;
							if($model->login()){
								$data['name']		=	$users->display_name;
								$data['email']		=	$users->username;
								$data['password']	=	$users->password;
								$this->sendMail($data,'register');
								if(Yii::app()->user->role=='admin'){
									$this->redirect(array('admin/admin'));
								}
								elseif(Yii::app()->user->role=='client'){
									$this->redirect(array('client/index'));
								}
								elseif(Yii::app()->user->role=='supplier'){
									$this->redirect(array('supplier/index'));
								}else{
									$this->redirect(array('site'));
								}
							}
							else{
								Yii::app()->user->setFlash('loginError','Unable to connect linked in profile.');
								$this->redirect(Yii::app()->createUrl('/site/supplier'));
							}

						}
					}
					else{
						Yii::app()->user->setFlash('loginError','Unable to connect linked in profile.');
						$this->redirect(Yii::app()->createUrl('/site/login'));
					}
                }
			}
			else{
				Yii::app()->user->setFlash('loginError',"Error retrieving profile information:<br />RESPONSE:<br /><pre>".print_r($response)."</pre>");
				$this->redirect(Yii::app()->createUrl('/site/login'));
			}
		}
	//die('Done');
    }

}
