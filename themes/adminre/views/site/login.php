<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<section class="col-lg-12 bg-teal" style="height:5px;">
  <!-- START row -->

  <!--/ END row -->
</section>
<section class="col-lg-12">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h3 class="title light text-grey5 mtb22">Welcome To FDP programme on Online Publishing Website using PHP</h3>
    </div>
  </div>
</section>
<section class="col-lg-12" style="margin-top:20px;">
  <!-- START row -->
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="col-sm-12">
        <div class="col-sm-12 text-center">
          <h4 class="title light text-grey9 text-size16 mb20">Access our self-service platform:</h4>
        </div>

        <!-- Social button -->
        <div class="col-sm-12"> <a href="index.php?r=site/linkedin&lType=initiate&role=2" class="btn btn-social btn-block btn-linkedin"> <i class="1-icon mr15"></i> Sign in with LinkedIn </a> </div>
        <!--/ Social button -->
        <div class="col-sm-12 text-center mb15">
          <h4 class="title text-grey9 text-size13 pt0">or</h4>
          <span class="text-muted ">Sign in with E-mail: </span> </div>

        <!-- Login form -->
        <div class="col-sm-12 ">
          <?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('data-parsley-validate'=>"data-parsley-validate"))); ?>
          <div class="form-group mb10">
            <?php if(Yii::app()->user->hasFlash('loginError')):?>
            <script type="text/javascript">$(".showdiv").slideToggle(700);</script>
            <div class="alert alert-dismissable alert-danger">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?php echo Yii::app()->user->getFlash('loginError'); ?> </div>
            <?php endif; ?>
            <div class="row">
              <div class="col-sm-6 mb5">
                <label class="control-label">E-mail <span class="text-danger">*</span></label>
                <div class="has-icon pull-right"> <?php echo $form->textField($model,'username',array('placeholder'=>"Username",'class'=>'form-control input-white','required'=>'required','data-parsley-type'=>"email")); ?> <i class="ico-user2  form-control-icon icon-top"></i> </div>
              </div>
              <div class="col-sm-6 mb5">
                <label class="control-label">Password <span class="text-danger">*</span></label>
                <div class="has-icon pull-right"> <?php echo $form->passwordField($model,'password',array('placeholder'=>"Password",'class'=>'form-control input-white','required'=>'required')); ?> <i class="ico-lock4 form-control-icon icon-top"></i> </div>
              </div>
            </div>
          </div>
          <div class="form-group mb10">
            <div class="row">
              <div class="col-xs-6 text-left">
                <div class="checkbox custom-checkbox"> <?php echo $form->checkBox($model,'rememberMe',array('value'=>"1",'id'=>"customcheckbox")); ?>
                  <label for="customcheckbox" class="text-grey9">&nbsp;&nbsp;Remember me</label>
                </div>
              </div>
              <div class="col-xs-6 text-right"> <a href="javascript:void(0);" id="errorfPassLink" data-toggle="modal" data-target="#bs-modal-lost-password">Forgot password?</a> </div>
            </div>
          </div>
          <div class="form-group mb10"> <?php echo CHtml::submitButton('Sign In',array('class'=>'btn btn-block btn-teal btn-social btn-signin col-lg-offset-4 w30','style'=>'padding:11px 0px !important;')); ?> </div>
          <p class="clearfix text-center"> <span class="text-muted">Here for the first time ? <a href="javascript:void(0);"  data-target="#bs-modal" data-toggle="modal" class="semibold">Register to get started.</a></span> </p>
          <?php $this->endWidget(); ?>
        </div>
        <!--/ Login form -->
      </div>
    </div>

    <!-- START modal -->
    <div id="bs-modal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bgcolor-teal border-radius">
            <button data-dismiss="modal" class="close mt5" type="button">×</button>
            <div style="font-size:16px;" class="pull-left ico-user22 mr10 mt5"></div>
            <h4 class="semibold modal-title">Sign Up</h4>
          </div>
          <!--<div class="modal-header text-center">
                                <button type="button" class="close" data-dismiss="modal">x</button>
                                <h3 class=" modal-title">Sign Up</h3>
                            </div>-->
          <?php $form=$this->beginWidget('CActiveForm', array('id'=>'Signup-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate'))); ?>
          <div class="modal-body">
            <div class="alert alert-success hide" id="repsoneRest2">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <p id="messageResponse2"></p>
            </div>
            <div class="form-group mb10">
              <div class="col-md-12">
                <div class="alert alert-dismissable alert-danger signup_error_container hide">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
                  <div id="signup_errors"></div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 mb5">
                  <label class="control-label">First Name <span class="text-danger">*</span></label>
                  <div class="has-icon pull-right"> <?php echo $form->textField($users,'first_name',array('placeholder'=>"John",'class'=>'form-control required','required'=>'required','data-parsley-type'=>"alphanum",'data-parsley-minlength'=>"2"));?> </div>
                </div>
                <div class="col-sm-6 mb5">
                  <label class="control-label">Last Name <span class="text-danger">*</span></label>
                  <div class="has-icon pull-right"> <?php echo $form->textField($users,'last_name',array('placeholder'=>"Doe",'class'=>'form-control required','required'=>'required','data-parsley-type'=>"alphanum",'data-parsley-minlength'=>"2"));?> </div>
                </div>
              </div>
            </div>
            <div class="form-group mb10">
              <div class="row">
                <div class="col-sm-6 mb5">
                  <label class="control-label">E-mail <span class="text-danger">*</span></label>
                  <div class="has-icon pull-right"> <?php echo $form->textField($users,'username',array('placeholder'=>"Username / email",'class'=>'form-control required email','required'=>'required','data-parsley-type'=>"email")); ?> <i class="ico-user2 form-control-icon"></i> </div>
                </div>
                <div class="col-sm-6 mb5">
                  <label class="control-label">Password <span class="text-danger">*</span></label>
                  <div class="has-icon pull-right"> <?php echo $form->passwordField($users,'password',array('placeholder'=>"Password",'class'=>'form-control required minlength','required'=>'required','length'=>"6"));?> <i class="ico-lock4 form-control-icon"></i> </div>
                </div>
              </div>
            </div>

            <p class="text-center text-grey9">By clicking on "Sign Up" below, you agree to the <a  href="javascript:void(0);" data-toggle="modal" data-target="#bs-modal-lg">Terms &amp; Conditions</a>.</p>
          </div>
          <div class="modal-footer"> <?php echo CHtml::button('Sign Up',array('id'=>'signupButSat','class'=>'btn btn-teal')); ?> </div>
          <?php $this->endWidget(); ?>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!--/ END modal -->

    <!-- START modal -->
    <div id="bs-modal-lost-password" class="modal fade">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header bgcolor-teal border-radius">
            <button data-dismiss="modal" class="close mt5" type="button">×</button>
            <div style="font-size:16px;" class="pull-left ico-unlock-alt mr10 mt5"></div>
            <h4 class="semibold modal-title">Forgot Password</h4>
          </div>
          <!--<div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h3 class=" modal-title">Forgot Password</h3>
                </div>-->
          <?php $form=$this->beginWidget('CActiveForm', array('id'=>'forget-form','enableClientValidation'=>true,'action'=>CController::createUrl("/site/forgotPassword"),'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>
          <div class="alert alert-success hide mt15" id="repsoneRest">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <p id="messageResponse"><?php echo Yii::app()->user->getFlash('errorfPass'); ?></p>
          </div>
          <div id="resetpass" class="modal-body">
            <div class="form-group mb0">
              <div class="row">
                <div class="col-sm-12">
                  <label class="control-label">Enter Your e-mail here <span class="text-danger">*</span></label>
                  <div class="has-icon pull-right"> <?php echo $form->textField($forgot,'email',array('placeholder'=>'Email','class'=>'form-control','required'=>'required','data-parsley-type'=>"email",'id'=>'forget-form-email')); ?> <i class="ico-user2 form-control-icon"></i> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer"> <?php echo CHtml::button('Reset Password',array('name'=>'Submit','class'=>'btn btn-teal','id'=>'passButSat')); ?> </div>
          <?php $this->endWidget(); ?>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!--/ END modal -->


  </div>
</section>

<script type="text/javascript">
$(document).ready(function(){
	$('#usernameL').on("keypress",function(){
		var elem	=	$(this);
		var ErrID	=	elem.attr('data-parsley-id')
		$('#parsley-id-satn-'+ErrID).html('');
	});
	$('#usernameL').on("focusout",function(){
		var elem	=	$(this);
		$.ajax({
			type: 'POST',
			url:"<?php echo CController::createUrl('/site/ajaxUniqe');?>"+'&email='+elem.val(),
			success :function(data){
				var response = JSON.parse(data);

				if(elem.attr('id')=='usernameL'){
					if(response.exist){
						elem.addClass('parsley-error');
						var ErrID	=	elem.attr('data-parsley-id')
						$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Email address already exists.</li>');
						$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
						$('#signupButSat').attr('type','button');
					}
					else{
						var ErrID	=	elem.attr('data-parsley-id')
						$('#parsley-id-satn-'+ErrID).html('');
						$('#signupButSat').attr('type','submit');
					}
				}else{
					if(!(response.exist)){
						elem.addClass('parsley-error');
						var ErrID	=	elem.attr('data-parsley-id')
						$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Record does not exists for this email.</li>');
						$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
						$('#passButSat').attr('type','button');
					}
					else{
						var ErrID	=	elem.attr('data-parsley-id')
						$('#parsley-id-satn-'+ErrID).html('');
						$('#passButSat').attr('type','submit');
					}
				}
			}
		});
	});

	$('#signupButSat').on("click",function(){
		//console.log(validate('Signup-form'));
		if(!validate('Signup-form')){
			$('#signupButSat').val('Please wait..');
			$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/site/signup');?>",
				data:$('#Signup-form').serialize(),
				success :function(data){
					var response = JSON.parse(data);
					if(response.exist){
						$('#messageResponse2').html(response.message);
						redirectToURL("<?php echo CController::createAbsoluteUrl('/client/index',array('first'=>1));?>");
						$.ajax({
							type: 'POST',
							url:"<?php echo CController::createUrl('/client/statusUpdate');?>",
							success :function(data){}
						});
					}
					else{
						$('#messageResponse2').html(response.message);
						$('#repsoneRest2').show();
						$('#repsoneRest2').removeClass('hide');
						$('#repsoneRest2').removeClass('alert-success');
						$('#repsoneRest2').addClass('alert-danger');

					}

				}
			});
		}
	});

	$('#passButSat').on("click",function(){
		var elem	=	$('#forget-form-email');
		if(elem.val().length>0){
			if(testEmail(elem.val())){

				$('#passButSat').val('Please Wait');
				$.ajax({
				type: 'POST',
				url:"<?php echo CController::createUrl('/site/ajaxUniqe');?>"+'&email='+elem.val(),
				success :function(data){
					var response = JSON.parse(data);
					if(response.exist){
						elem.addClass('parsley-error');
						var ErrID	=	elem.attr('data-parsley-id')
						$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">'+response.message+'</li>');
						$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
						$('#signupButSat').attr('type','button');


					}
					else{
						elem.val('');
						$('#messageResponse').html(response.message);
						$('#repsoneRest').show();
						$('#resetpass').addClass('hide');
						$('#repsoneRest').removeClass('hide');
						var ErrID	=	elem.attr('data-parsley-id')
						$('#parsley-id-satn-'+ErrID).html('');
					}

				}
			});
			}
			else{
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">This is not a valid email address.</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			}
		}
		else{
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">This is required field.</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
		}
	});
});
function redirectToURL(redirectURL){
window.location.href= redirectURL;
}
$('#Signup-form').on('change',function(){changeValidate('Signup-form');});
</script>
