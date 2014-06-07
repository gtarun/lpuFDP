Hello

<section>
    <!-- START Template Container -->
    <section class="container-fluid">
        <!-- section header -->
        <div class="page-header page-header-block pb0 pt15">
            <div class="page-header-section pt5">
                <ol style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;" class="breadcrumb">
                    <li><a href="javascript:void(0);">Supplier Dashboard</a></li>
                </ol>
            </div>
        </div>


        <!--/ section header -->
		<?php if($supplier->status == 0){ ?>
			<div class="col-md-12 pl0 pr0">
                <div class="alert alert-dismissable alert-info">

                    <strong>Welcome to VenturePact!</strong> The next step is to complete and submit your Profile and FAQ's to start receiving RFP's. Please click on <strong>"Profile"</strong> to get started.
                </div>
            </div>
             <!-- New section {SAhil} -->
			<div class="col-md-12 pl0 pr0">
                    <div class="col-md-3">
                        <!-- START Widget Panel -->
                        <div class="widget">
                            <!-- panel body -->
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li class="text-center mb15">
                                        <img width="100px" height="100px" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/supplier_profile.png" class="img-circle ">
                                    </li>
                                    <li class="text-center mb10">
                                        <h5 class="semibold ellipsis nm text-default">Step 1: Complete your profile</h5>
                                    </li>
                                    <li class="text-center text-default">You will be required to provide details of your <strong>portfolio</strong>, your <strong>past client</strong> and <strong>project preferences.</strong></li>
                                </ul>
                            </div>
                            <!--/ panel body -->
                        </div>
                        <!--/ END Widget Panel -->
                    </div>
                    <div class="col-md-1" style="padding-top:5%;"><i class="ico-long-arrow-right text-default" style="font-size:25px;"></i></div>
                    <div class="col-md-3">
                        <!-- START Widget Panel -->
                        <div class="widget">
                            <!-- panel body -->
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li class="text-center mb15">
                                        <img width="100px" height="100px" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/approved_icon.png" class="img-circle ">
                                    </li>
                                    <li class="text-center mb10">
                                        <h5 class="semibold ellipsis nm text-default">Step 2: Get verified</h5>
                                    </li>
                                    <li class="text-center text-default">Our team will help you through the verification process. Thereafter, we sign the <strong>Services Agreement</strong>.</li>
                                </ul>
                            </div>
                            <!--/ panel body -->
                        </div>
                        <!--/ END Widget Panel -->
                    </div>
                    <div class="col-md-1" style="padding-top:5%;"><i class="ico-long-arrow-right text-default" style="font-size:25px;"></i></div>
                    <div class="col-md-3">
                        <!-- START Widget Panel -->
                        <div class="widget">
                            <!-- panel body -->
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li class="text-center mb15">
                                        <img width="100px" height="100px" alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/finish_icon.png" class="img-rounded ">
                                    </li>
                                    <li class="text-center mb10">
                                        <h5 class="semibold ellipsis nm text-default">Step 3: Receive leads</h5>
                                    </li>
                                    <li class="text-center text-default">Once your profile is set and legalities are out of the way, we start <strong>pushing leads</strong> your way.</li>
                                </ul>
                            </div>
                            <!--/ panel body -->
                        </div>
                        <!--/ END Widget Panel -->
                    </div>
                </div>
			<!--/ New Section {Sahil} -->

		<!-- if Profile has filled -->
		<?php }else if($supplier->status ==1){ ?>

		<div class="col-md-12 pl0 pr0">
			<div class="alert alert-dismissable alert-success col-sm-12">
                We will review your profile & get back with the next steps.
			</div>
		</div>

         <!-- After profile filled Awaiting admin approval -->
		<?php }else if($supplier->status ==2){ ?>
			<div class="col-md-12 alert alert-dismissable alert-info">
				<div class="col-sm-12"><strong></strong> Hey! Your Profile is now Approved and you are just a step away from officialy being a VenturePactian. Just sign the legal document and you are done.</div>
				<div class="col-sm-10"></div>
				<div class="col-sm-2 pr0">
					<a href="javascript:void(0);" data-toggle="modal" class="btn btn-danger pull-right" data-target="#bs-modal-terms-suppliers">Sign</a>
				</div>
			</div>


		<?php }else if($supplier->status ==3){ ?>
            <!-- Project Not accepting -->
            <div class="row">
                <!-- Project you are not accepting -->
                    <?php if(Yii::app()->user->hasFlash('success')):?>
					<div class="col-md-12">
						<div class="alert alert-dismissable alert-success">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
							<?php echo Yii::app()->user->getFlash('success'); ?>
						</div>
					</div>
                    <?php endif; ?>

                    <!-- Panel body -->

                    <?php if(!empty($supplier->suppliersHasServices)){ ?>
                    <div class="col-md-12">
                        <div class="panel panel-default">

                    <!-- Starts panel header -->
                      <div class="panel-heading">
                        <h3 class="panel-title" style="font-size: 13px;">Which of these services are you offering at the moment? Please check the ones you're offering and uncheck those for which you may not have resources available. </h3>

                        </div>
                                <!--/ Ends panel header -->
                        <div class="panel-body">
                        <?php $form=$this->beginWidget('CActiveForm', array('id'=>'skills-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('enctype' => 'multipart/form-data','class'=>"panel-default form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate'))); ?>

                        <div class="panel-default">


                            <div class="">
                                <!-- panel body -->
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="col-md-12 pl0">
                                                <?php foreach($supplier->suppliersHasServices as $service){ ?>
                                                <span class="checkbox custom-checkbox custom-checkbox pb5 pt5 col-sm-3  <?php echo ($service->status==1)?'':'cross_text_try';?>" value="<?php echo $service->id; ?>">
                                                    <input type='checkbox' name='Services[<?php echo $service->services_id; ?>]' id='customcheckbox<?php echo $service->services_id; ?>' data-toggle='selectrow' data-target='tr' data-contextual='stroke' <?php echo ($service->status==1)?'checked':'';?> value="<?php echo $service->id; ?>" class='index_checkbox'>
                                                    <label for="customcheckbox<?php echo $service->services_id; ?>" data-original-title='<?php echo $service->services->description; ?>' data-toggle='tooltip' data-placement="top">&nbsp;&nbsp;<?php echo $service->services->name; ?></label>
                                                </span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/ panel body -->
                                <input type="hidden" name="Services[test]" value="4" />

                                <!-- panel footer -->
                                <div class="panel-footer">
                                <div class="form-group no-border pt0 pb0">
                                    <label class="col-sm-4 control-label"></label>
                                    <div class="col-sm-8 pl0 pr0">
                                        <button type="submit" class="mr15 btn btn-teal pull-right"  id="basicSave">Save</button>

                                    </div>
                                </div>
                            </div>

                            </div>
                                <!--/ panel footer -->
                            </div>

                     <?php $this->endWidget(); ?>
                     </div>


                    <!--/ Panel body -->
                    </div>
                    </div>
                    <?php } ?>
                <!--/ Project you are not accepting -->

                <!-- View all projects categories wise -->
                <div class="col-md-12 mb15 hide">
                    <div class="form-wizard mt10 mb15">
                        <h3 class="control-label mb-15 mt0 text-success">New Projects</h3>
                    </div>
                </div>
            <?php if(empty($supplier->suppliersProjectsProposals)){ ?>
                <div class="col-md-12 hide">
                    <div class="alert alert-dismissable alert-danger">
                        <strong></strong> No Current Projects !
                    </div>
                </div>
            <?php }else{ ?>
                <?php foreach($supplier->suppliersProjectsProposals as $project){ ?>

                <div class="col-xs-12 col-md-6 col-lg-4 project "<?php if(!empty($project->chat_room_id)) echo 'data-room="'.$project->chat_room_id.'"' ?>>

                    <div class="table-layout widget panel grand_parent">

                        <!-- Left side of card -->
                        <div class="col-xs-6 widget panel panel-minimal bgcolor-inverse">
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li class="text-center">
                                         <?php
									foreach($project->clientProjects->clientProjectsHasServices as $service){
										echo '<i class="'.$service->services->tooltip.'" style="font-size:25px;"></i>';
                                    }?>


                                        <br/>
                                        <!-- Project Name -->
                                        <h5 class="semibold mb0" >
                                             <?php echo CHtml::link( $project->clientProjects->name, array('/supplier/rfp&render=full&projectid='.$project->id."&stat=".$project->status),array("class"=>"projectName"));?>
                                        </h5>
                                        <!-- Project Name -->

                                        <!-- Starts Display services selected -->
                                        <div >
                                            <?php foreach($project->clientProjects->clientProjectsHasServices as $service){?>
                                            <p class="nm mb10 text-white">
                                                <?php echo $service->services->name;?></p>
                                            <?php } ?>
                                        </div>
                                        <br/>
                                        <!-- Ends Display the information of services selected -->
                                        <div> <!-- class="client_dashboard_scoller"> -->
                                        <p class="nm text-white">
                                            <!-- hide below on requirement change -->
                                            <?php //echo $project->clientProjects->description; ?>
                                        </p>
                                        </div>
                                        <br/>
                                        <h5>
                                            <?php //echo $project->clientProjects->clientProfiles->first_name; ?></h5>
                                      <!--   <p class="nm text-muted">Awaiting your response</p> -->
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <!--/ Left side of card -->
                        <!-- Right side of card -->
                        <div class="col-xs-6 widget panel panel-minimal bgcolor-white">
                            <div class="panel-body text-center bgcolor-white">
                                <ul class="list-unstyled">
                                    <li class="text-center">
                                        <i class="ico-dollar" style="font-size:26px;"></i>
                                        <br>
                                        <?php $minbudget=empty($project->clientProjects->min_budget) ? "0" : $project->clientProjects->min_budget; $maxbudget = empty($project->clientProjects->max_budget) ? "0" : $project->clientProjects->max_budget; ?>
                                        <h5 class="semibold mb0">
                                            <?php echo $minbudget. " - ".$maxbudget; ?>
                                        </h5>
                                        <p class="nm text-muted">Budget</p>
                                    </li>
                                </ul>
                            </div>
                            <hr class="mt0 mb0">
                            <div class="panel-body text-center bgcolor-white">
                                <ul class="list-unstyled">
                                    <li class="text-center">
                                        <i class="ico-calendar" style="font-size:26px;"></i>
                                        <br>
                                        <h5 class="semibold mb0">
                                            <?php echo date( "d-M-Y",strtotime($project->clientProjects->start_date)); ?></h5>
                                        <p class="nm text-muted">Start Date</p>
                                    </li>
                                </ul>
                            </div>
                            <hr class="mt0 mb0">
                            <div class="panel-body text-center bgcolor-white">
                                <ul class="list-unstyled">
                                    <li class="text-center">
                                        <i class="ico-calendar" style="font-size:26px;"></i>
                                        <br>
                                        <h5 class="semibold mb0">
                                            <?php echo (isset($this->projectStatus[$project->status]["supplier"])?$this->projectStatus[$project->status]["supplier"]:"Status Not Found") ?></h5>
                                        <p class="nm text-muted">Status</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="panel-body text-center bgcolor-success">

                                <div class="col-sm-12">
                                    <ul class="nav nav-section nav-justified">
                                        <li class="text-center">
                                            <div class="section">
                                                <span class="number">
                                                   <span class="label label-danger msg2">0</span>
                                                </span>
                                                <p class="nm">
                                                    <a href="" class="text-white">Message</a>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--/ Right side of card -->
                    </div>
                </div>

                    <?php } ?>
                <?php } ?>
            </div>
            <!--/ END row -->

		<?php } ?>



		<!-- START modal -->
		<div id="bs-modal-terms-suppliers" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header bgcolor-teal border-radius">
						<button type="button" class="close" data-dismiss="modal">x</button>
						<h4 class="semibold modal-title">Sign the Legal Document</h4>
					</div>
					<?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/supplier/index'),'id'=>'legal-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default form-horizontal",'data-parsley-validate'=>'data-parsley-validate'))); ?>
					<?php //$form=$this->beginWidget('CActiveForm', array('id'=>'legal-form','enableClientValidation'=>true,'action'=>CController::createUrl("/site/updateLegalStatus"),'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default",'data-parsley-validate'=>'data-parsley-validate')));?>

					<div class="modal-body bgcolor-white slimscroll" style="height:300px;">
						<div class="col-md-12 pl10 pr10">
							<div class="form-group">
								<div class="row">
									<div class="col-sm-12">
										<p>Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</p>
										<p>Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum</p>
									</div>
								 </div>
							</div>
						</div>
						<div style="position: absolute; z-index: 1; margin: 0px; padding: 0px; opacity: 0; display: none; left: 100px; top: 582px;">
							<div style="position: relative; height: 353px;" class="enscroll-track track3">
								<a style="position: absolute; z-index: 1; height: 112.058px; top: 0px;" href="" class="handle3">
									<div class="top"></div>
									<div class="bottom"></div>
								</a>
							</div>
						</div>
					</div>
					<div class="modal-footer panel-footer">
						<input type="hidden" name="action" value="approve" />
						<!--<input type="checkbox" name="Suppliers[status]" value="2" id="chkLegal" />-->

						<div class="col-sm-7 pl0 pr0"></div>
						<div class="col-sm-5 pl0 pr0">
							<div class="col-sm-6 pr0">
								<span class="checkbox custom-checkbox custom-checkbox-inverse">
									<input type="checkbox" name="Suppliers[status]" id="chkLegal" value="2" required="">
									<label for="chkLegal"></label>
								</span>
								<?php //echo CHtml::submit('Accept & Continue',array('name'=>'Submit','class'=>'btn btn-success','id'=>'passButSat')); ?>
							</div>
							<div class="col-sm-6 pr0">
								<input type="submit" id="btnLegal" value="Accept & Continue" class="btn btn-teal col-sm-12"/>
							</div>

						</div>
						<div class="alert alert-success hide" id="repsoneLegal">
							<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>

						</div>
                        <p id="messageResponse"><?php echo Yii::app()->user->getFlash('errorfPass'); ?></p>
					</div>

					<?php $this->endWidget(); ?>
				</div><!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
		<!--/ END modal -->
	</section>
    <!--/ END Template Container -->

    <!-- START To Top Scroller -->
    <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%">
        <i class="ico-angle-up"></i>
    </a>
    <!--/ END To Top Scroller -->
</section>
<!--/ END Template Main -->
<!--
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/firebase.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/firechat.js"></script>
-->
<script type="text/javascript">


			$(".index_checkbox").on('click',function(){

				if($('.index_checkbox').attr('checked')) {
					var pare	=	$(this).parent();
					pare.removeClass('cross_text_try');
					//$(".cross_text_try").css({"color":"#ccc",});//"background":"#efefef","padding-right":"18px"
				} else {
					var pare	=	$(this).parent();

                    pare.addClass('cross_text_try');
					//$(".cross_text_try").css({"color":"#333"});//"background":"none","padding-right":"0"
				}

			});

			$('.btn-toggle').click(function() {

				$(this).find('.btn').toggleClass('btn-default');

			});

			$('form').submit(function(){
				//alert($(this["options"]).val());
				//return true;
			});
        </script>
<script>

    $(document).ready(function(){
		var legal_form= $("#legal-form").parsley();
       // var legal_form= $("#legal-form").parsley();
		/*$("#btnLegal").on("click",function(){
			var elem	=	$('#chkLegal');
			var ErrID	=	elem.attr('data-parsley-id')
			console.log("submitting" + elem.attr("checked"));
			if(typeof elem.attr("checked") !== 'undefined'){
				console.log("Sending request");
				$('#parsley-id-multiple-Suppliersstatus,#parsley-id-'+ErrID).html('');
				$('#parsley-id-multiple-Suppliersstatus,#parsley-id-'+ErrID).removeClass('parsley-errors-list filled');
				$('#btnLegal').attr('disabled','disabled');
				$.ajax({
					type: 'POST',
					url:"<?php echo CController::createUrl('/supplier/updateLegalStatus'); ?>",
					data:$("#legal-form").serialize(),
					success :function(data){
						console.log(JSON.stringify(data));
						var response = JSON.parse(data);
						if(response.iserror == false){
							$("#repsoneLegal").removeClass("hide");
							$("#messageResponse").html(response.success);

						}
						else{
							elem.val('');
							$('#messageResponse').html(response.message);
							$('#repsoneRest').show();
							$('#repsoneRest').removeClass('hide');
							var ErrID	=	elem.attr('data-parsley-id')
							$('#parsley-id-satn-'+ErrID).html('');
						}

					}
				});
			}
			else{
				elem.addClass('parsley-error');

				$('#parsley-id-multiple-Suppliersstatus,#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Agree to terms.</li>');
				$('#parsley-id-multiple-Suppliersstatus,#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				console.log("Invalid form");
			}
			return true;
		}); */
});

    $(document).ready(function()
    {
        $(".project").on('click',function(){

			window.location.href= $(this).find(".projectName").attr("href");
		});
        var resource;
        if(window.location.hostname=='localhost')
        {
            resource="https://incandescent-fire-5373.firebaseio.com/chat";// local api
        }
        else
        {
            resource="https://venturepact.firebaseio.com/chat"; //server api
        }

        var chat_ref=new Firebase(resource);
        var chat=new Firechat(chat_ref);

        //var token = "<?php echo $token; ?>";

       /*
        chat_ref.auth(token,function(e,u)
        {
            if(e) //if something went wrong
            {
                console.log(e);
            }
            else //successful login
            {
                console.log('user authenticated');
                console.log(u);
                //for each project
                $('.project').each(function(i,e)
                {

                    var $project=$(this);

                    var room=$project.data('room');
                    console.log(room);
                    if(room)
                    {
                        var ot;
                        chat_ref.child("room-users")
                                .child(room)
                                .child('<?php echo yii::app()->user->id ?>')
                                .once('value',function(s)
                                {
                                    ot=s.val().offline_time; //offline time
                                    console.log(ot);
                                    if(ot)
                                    {

                                        console.log(room);
                                       chat._messageRef.child(room)
                                                       .startAt(ot)
                                                       .on('value',function(s1)
                                                       {
                                                            $project.find('.number>.label').html(s1.numChildren());
                                                       });
                                    }
                               });
                    }
                });
            }
        });
		*/

    });
</script>


