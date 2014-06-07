<!-- START Template Main -->
<section >
	<!-- START Template Container -->
	<section class="container-fluid">
		<!-- Page header -->
		<div class="page-header page-header-block pb0 pt15">
			<div class="page-header-section pt5 ">
				<ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
					<li><?php echo CHtml::link('Dashboard', array('/supplier/index'));?></li>
					<li class="text-info">Supplier Profile</li>
					<li class="active">FAQ</li>

				</ol>
			</div>
		</div>
	<!--/ Page header -->


		<!-- START FOrm -->
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-12 hide">
					<div class="alert alert-dismissable alert-danger signup_error_container">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
                    <div class="signup_errors"></div>
                </div>
				</div>
                       <?php if(Yii::app()->user->hasFlash('success')):?>
                        <div class="alert alert-dismissable alert-success">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
                    <?php endif; ?>
				<!-- START panel -->
				 <?php //$form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/supplier/faq'),'id'=>'faq-supplier','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default form-horizontal",'data-parsley-validate'=>'data-parsley-validate')));?>

                <?php $form=$this->beginWidget('CActiveForm', array('id'=>'faq-supplier', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('enctype' => 'multipart/form-data','class'=>"panel panel-default form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate'))); ?>


                    <!-- panel heading/header -->
					<div class="panel-heading">
						<h3 class="panel-title">About the service provider</h3>
					</div>
					<!--/ panel heading/header -->

					<!-- panel body -->
					<div class="panel-body">
						<?php if(empty($faq)){ ?>
							<div class="col-md-12">
                                        <div class="alert alert-dismissable alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <strong>Oh snap!</strong> Admin has not added any Question yet!
                                        </div>
                            </div>
						<?php }else{ ?>
							<?php foreach($faq as $question){ ?>

								<div class="form-group">
									<label class="col-sm-4 control-label"><strong>Ques</strong> <?php echo $question->question ;?>
										<span class="text-danger">*</span>
									</label>
									<div class="col-sm-4">
										<input type="text" value="<?php echo (isset($ansList[$question->id])?$ansList[$question->id]:''); ?>" name="SuppliersFaqAnswers[<?php echo $question->id; ?>]" class="form-control required"  />
									<?php //echo $form->textField($question,'questioin',array('placeholder'=>"",'class'=>'form-control','required'=>'required')); ?>
									</div>
								</div>
							<?php } ?>
                            <div class="panel-footer">
							<div class="form-group no-border pt0 pb0">
								<label class="col-sm-4 control-label"></label>
								<div class="col-sm-8">
                                    <input type="hidden" name="action" value="noajax">

                                    <input type="submit" class="ml10 btn btn-primary pull-right" id="btnsaveFaq" value="<?php echo (($profile->is_application_submit==1)?'Update':'Save')  ?>" name="save" />
									<input type="button" class="<?php echo (($profile->is_application_submit==1)?'btn btn-teal':'btn btn-success')  ?> pull-right " id="btnAddFaq" name="app" value="<?php echo (($profile->is_application_submit==1)?'Submitted':'Submit')  ?>" />

								</div>
							</div>
						</div>

						<?php } ?>



					</div>

					<!--/ panel body -->
				<?php $this->endWidget(); ?>
				<!-- END panel -->
			</div>
		</div>
		<!--/ END form -->

	</section>
	<!--/ END Template Container -->

	<!-- START To Top Scroller -->
	<a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%">
		<i class="ico-angle-up"></i>
	</a>
	<!--/ END To Top Scroller -->
</section>
<!--/ END Template Main -->

<script type="text/javascript">
	$(document).ready(function(){
		$('.signup_error_container').hide();
        var faq_validate = $("#faq-supplier").parsley();
		$("#faq-supplier").on("submit",function(){
			console.log("submitting");
			return true;
		});
		/*$("#faq-supplier").on("submit",function(){
            console.log("submitting form "+ faq_validate.isValid())
            //return false;
        });*/
        /*
        $("#btnAddFaq").on("click",function(){
            $("#faq-supplier").submit();
			if(faq_validate.isValid()==true)
            {
                console.log("valid form ");
                var thisform = $("#faq-supplier");
                console.log("submitting form"+ thisform.serialize());
                $.ajax({
                    type:'POST',
                    data: thisform.serialize(),
                    url:"<?php echo CController::createUrl('/supplier/faq');?>",
                    datatype:"json",
                    success:function(data)
                    {
                            var data= JSON.parse(data);
                            console.log(JSON.stringify(data));
                            $('.signup_error_container').removeClass('alert-danger').addClass('alert-success');
                            var messageData = data.Success ;
                            var htm="";
                            if(data.iserror){
                                //rendering error
                                console.log("error found ");
                                messageData = data.errors[0].msg;
                                $('.signup_error_container').removeClass('alert-success').addClass('alert-danger');
                            }else
                            {

                                messageData = data.success[0].msg;
                            }

                            //Genrating message
                            console.log("message data : " + JSON.stringify(messageData) );

                            htm+=messageData + "<br />";
                            $(".signup_errors").html(htm);
                            $('.signup_error_container').show('blind', {}, 500)
                            console.log("finsishes all tasks");

                    },
                    error: function(a,b,c){
                        console.log("Errors found : " +a +" | " +b + " | " + c);
                    }
                });
            }else
            {
                console.log("Invalid form");
            }

		//hideNotification();
		return false;
		});
        */

        $("#btnAddFaq").click(function(){
            var boottext = "Are you sure all the information provided in your profile is authentic and true to the best of your knowledge?";
            if($(this).attr("value")=="Submit"){
                bootbox.dialog({
                        message: boottext,
                        title: "Submit your profile for review.",
                        buttons: {
                            success: {
                                label: "Confirm",
                                className: "btn-success",
                                callback: function () {
                                    var isProfile = "<?php echo $profile->is_profile_complete; ?>";
                                    var isfaq = "<?php echo $profile->is_faq_complete; ?>";
                                    console.log(isProfile + " " + isfaq );
                                    if(isProfile== 1 && isfaq==1){
                                        callanotherpopup();
                                    }
                                    else
                                    {
                                        callerrorpopup();
                                    }

                                    return true;
                                    // callback
                                }
                            },
                            danger: {
                                label: "Close",
                                className: "btn-danger ",
                                callback: function () {

                                    // callback
                                }
                            }
                        }
                    });
                return false;
                event.preventDefault();
            }
        });
	});
    function callanotherpopup(){
        var boottext = "Thank you for submitting your profile. We look forward to welcoming you to the VenturePact community.<br><br>1. Over the next few days, we will look over your profile to make sure you company is good fit for our marketplace. <br>2. You can update the profile whenever you want. You may add portfolio items, past client or change account information."
        bootbox.dialog({
                        message: boottext,
                        title: "Thank you for submitting your profile.",
                        buttons: {
                            success: {
                                label: "Got it!",
                                className: "btn-success",
                                callback: function () {
                                    console.log("got it submit now");
                                    submitform();
                                    return true;
                                    // callback
                                }
                            }
                        }
                    });
    }
    function callerrorpopup(){
        var boottext = "Please fill your Profile and Faq section before submitting the application."
        bootbox.dialog({
                        message: boottext,
                        title: "Error Found!",
                        buttons: {
                            success: {
                                label: "Got it!",
                                className: "btn-danger",
                                callback: function () {
                                    // callback
                                }
                            }
                        }
                    });
    }
    function submitform(){
        console.log("about to submit ");
        console.log($("#faq-supplier").serialize());
        $("#faq-supplier").find("[name=action]").val("ajax");
        $.ajax({
            type:'POST',
            url: $("#faq-supplier").attr("action"),
            data : $("#faq-supplier").serialize(),
            datatype :'json',
            success: function(data){
                data = JSON.parse(data);
                console.log(data);
                console.log(data.iserror);
                if(data.iserror==false){
                    window.location = '<?php echo CController::createUrl("/supplier/index");?>';
                }
                else{
                    console.log("error found");
                }
            }
        });

    }


</script>
