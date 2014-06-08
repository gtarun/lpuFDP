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

		 if(isset(Yii::app()->user->role))
			$this->redirect(array('/'.Yii::app()->user->role));

		$model	=	new LoginForm;
		$users	=	new Users;
		$forgot	=	new ForgotpasswordForm;
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
			if($model->validate() && $model->login()){
                if(yii::app()->user->role=="admin"){
                    $this->redirect(array('admin/users/admin'));
                }
                else{
				    $this->redirect(array('users/index'));
                }

			}else{
				Yii::app()->user->setFlash('loginError','Username or password is Invalid');
			}
		}
		if(isset($_POST['Users']))
		{
			$response = array("iserror" =>false,
								"errors" => array(),
							  	"Success" => array()
							 );
            $users = Users::model()->exists('username = :user_id', array(":user_id"=>$_REQUEST['Users']['username']));
            if($users)
            {
                $response["iserror"] = true;
                $msg= array(
                            'msg'=>"Already Registered with Us, Please try login!!",
                            //'token'=>$token
                        );
                $response["errors"]=$msg;
            }else{
                $users = new Users;
                $users->attributes	=	$_POST['Users'];
                $users->status		=	1;
                if($users->save())
                {
                    $data['name']		=	$users->first_name;
                    $data['email']		=	$users->username;
                    $data['password']	=	$users->password;
                    //$this->sendMail($data,'register');
                    $model->username	=	$users->username;
                    $model->password	=	$users->password;

                    if($model->validate() && $model->login()){

                        $response["iserror"] = false;
                        //$token = $tokenGen->createToken(array("id"=>yii::app()->user->profileId,"type"=>"abc","name"=>$profile->first_name." ".$profile->last_name));
                        $msg= array(
                            'msg'=>"Signed Up succesfully!!",
                            //'token'=>$token
                        );
                        $response["Success"]= $msg;
                    }
                    else{
                        Yii::app()->user->setFlash('contact','Thank you for contacting us.We will respond to you ASA possible.');
                        $this->refresh();
                    }
                }
                else{
                    $response["iserror"] = true;
                    $msg= array(
                            'msg'=>"Already Registered with Us, Please try login!!",
                            //'token'=>$token
                        );
                    $response["errors"]=$msg;

                }
            }
			echo json_encode($response);
			die;
		}
		$this->render('login',array('users'=>$users,'model'=>$model,'forgot'=>$forgot)	);
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

				$linkedinId		=	$responseArray['id'];
				$email			=	$responseArray['email-address'];
				$phone			=	$responseArray['phone-numbers'];
				$first_name	=	(isset($responseArray['first-name']))?$responseArray['first-name']:'';
				$profileUrl		=	(isset($responseArray['public-profile-url']))?$responseArray['public-profile-url']:'';
				$profilePic		=	(isset($responseArray['picture-url']))?$responseArray['picture-url']:'';
				$last_name		=	(isset($responseArray['last-name']))?$responseArray['last-name']:'';

				$record_exists	=	Users::model()->find('linkedin_id = :linkedinId and username = :username', array(':linkedinId'=>$linkedinId,':username'=>$email));
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
						$users->first_name	    =	$first_name;
						$users->created		=	date('Y-m-d H:i:s');
					}
					$users->linkedin_id			=	$linkedinId;
					if($users->save())
					{
                        $model				=	new LoginForm;
						$model->username	=	$users->username;
						$model->password	=	$users->password;
						if($model->login()){
						  $data['name']		=	$users->first_name;
				          $data['email']	=	$users->username;
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



				}
            }
            else{
				Yii::app()->user->setFlash('loginError','Unable to connect linked in profile.');
				$this->redirect(Yii::app()->createUrl('/site/login'));
            }
        }
        else{
				Yii::app()->user->setFlash('loginError',"Error retrieving profile information:<br />RESPONSE:<br /><pre>".print_r($response)."</pre>");
				$this->redirect(Yii::app()->createUrl('/site/login'));
			}

    }

}
