<!-- START Template Container -->
<section class="container-fluid">
    <!-- section header -->
    <div class="page-header page-header-block pb0 pt15">
        <div class="page-header-section pt5">
            <ol style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;" class="breadcrumb">
                <li><a href="javascript:void(0);">Dashboard</a></li>
            </ol>
        </div>


    </div>
    <!--/ section header -->
<?php
if(isset($_REQUEST['first'])){?>
<div class="alert alert-success" id="repsoneRest2">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<p id="messageResponse2">

    <script id="timelyScript" src="https://book.gettimely.com/widget/book-button.js"> </script>
<div style="display:none;"><script id="hideScript">var hideButton = new timelyButton('venturepact', { buttonId: 'hideScript' });</script></div>

<strong> Welcome to VenturePact!</strong> Post your first job by clicking on "Add a new Job". If you would like to discuss your requirements over a call, feel free to schedule a call <a href="#" onclick="hideButton.start();">here</a>.</p>
</div>

<script type="text/javascript">
$(document).ready(function(e){$("#testAs").click();});
</script>

<?php } ?>
    <!-- START row -->
    <div class="row">

    	<?php foreach($projects as $project){
			$proposals	=	0;
			foreach($project->suppliersProjectsProposals as $pr){
				if(in_array($pr->status,array(1,2)))
					$proposals = $proposals+1;
			}
			$messages	=	0;
			?>
		<div class="col-xs-12 col-md-6 col-lg-4 project" id="deletProjectDiv-<?php echo $project->id;?>">
			<div class="table-layout widget panel grand_parent">
				<div class="col-xs-6 widget panel panel-minimal bgcolor-inverse" onclick="window.location.href='<?php echo ($proposals==0 && $project->state != 2)?CController::createUrl("/client/project",array('id'=>$project->id)):CController::createUrl("/client/compare",array('id'=>$project->id));?>'">
					<div class="panel-body">
						<ul class="list-unstyled">
                                <li class="text-center">
                                    <?php
									foreach($project->clientProjectsHasServices as $service){
										echo '<i class="'.$service->services->tooltip.'" style="font-size:25px;"></i>';
                                    }?>
									<br/>
                                    <h5 class="semibold mb5 mt5">
                                    <?php
                                    if($proposals==0 && $project->state != 2)
                                        echo CHtml::link($project->name,array('/client/project','id'=>$project->id));
                                    else
                                        echo CHtml::link($project->name,array('/client/compare','id'=>$project->id));
                                    ?>
                                    </h5>
                                    <div >
                                    <?php foreach($project->clientProjectsHasServices as $service){?>
                                    <p class="nm mb5 text-white"><?php echo $service->services->name;?></p>
                                    <?php } ?>
                                    </div>
                                    <br/>
                                </li>
                            </ul>
                    	</div>
                </div>
                <div class="col-xs-6 widget panel panel-minimal bgcolor-white delete_parent">
                    <a href="" title="Delete Project" data-toggle="modal" data-target="#dlete_project" rel="<?php echo ($project->state==2)?'Not':$project->id;?>" class="btn child_delete"> <i class="ico-trash text-muted"></i> </a>

                    	<div class="panel-body text-center bgcolor-white" onclick="window.location.href='<?php echo ($proposals==0 && $project->state != 2)?CController::createUrl("/client/project",array('id'=>$project->id)):CController::createUrl("/client/compare",array('id'=>$project->id));?>'">
                            <ul class="list-unstyled">
                                <li class="text-center">
                                    <i class="ico-warning-sign" style="font-size:26px;"></i>
                                    <br>
                                    <h5 class="semibold mb5" style="font-size:12px; min-height:25px;">
                                    <?php
									$chatData	=	array();
									if($project->state	==2)
                                                if($proposals>0){
													foreach($project->suppliersProjectsProposals as $propo){
														if(in_array($propo->status,array(1,2,4))){
															if(!empty($propo->chat_room_id))
																$chatData[]=$propo->chat_room_id;
														}
														if($propo->status==4){
															$messg	=	'Proposals Accepted';
															break;
														}else
															$messg	=	'Proposals received. Awaiting your response';

													echo '<input type="hidden" value="0" class="counter" id="number'.$propo->chat_room_id.'" />';
													}
													echo $messg;
												}else
                                                    echo 'Awaiting for proposals';
											elseif($project->state	==1)
												echo 'Not submitted yet';?>
                                    </h5>
                                    <p class="nm text-muted">Status</p>
                                </li>
                            </ul>
                    	</div>
                    <hr class="mt0 mb0">
                    <?php if($proposals==0 && $project->state != 2)
							echo CHtml::link('<div class="panel-body text-center bgcolor-success"><ul class="list-unstyled"><li class="text-center"><span class="number"><span class="label label-danger">'.$proposals.'</span></span><p class="nm text-white custom_white">Proposals</p></li></ul></div>',array('/client/project','id'=>$project->id));
						else
							echo CHtml::link('<div class="panel-body text-center bgcolor-success"><ul class="list-unstyled"><li class="text-center"><span class="number"><span class="label label-danger">'.$proposals.'</span></span><p class="nm text-white custom_white">Proposals</p></li></ul></div>',array('/client/compare','id'=>$project->id));?>
                    <hr class="mt0 mb0" style="border-color: rgb(255, 255, 255);">

                    <div class="panel-body text-center bgcolor-success" onclick="window.location.href='<?php echo ($proposals==0 && $project->state != 2)?CController::createUrl("/client/project",array('id'=>$project->id)):CController::createUrl("/client/compare",array('id'=>$project->id));?>'">
                        <div class="col-sm-12">
                            <ul class="nav nav-section nav-justified">
                                <li class="text-center">
                                    <div class="section">
                                        <span class="number"><span class="label  label-danger">
											<input type="hidden" value=<?php echo json_encode($chatData,JSON_HEX_QUOT);?> />
											<span class="mes1">0</span>
                                        </span>
                                        </span>
                                        <p class="nm text-white custom_white">Messages</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php } ?>
        <div class="col-xs-12 col-md-6 col-lg-4 ">
            <div class="col-xs-12 col-md-6 col-lg-12 pa5 pt0 pl0">
                <!-- START Widget Panel -->
                <div class="widget panel ">
                    <!-- panel body -->
                    <div class="panel-body" style="min-height:270px;">
                        <ul class="list-unstyled mt15 mb15" style="margin-top:27% !important;margin-bottom:27% !important;">
                            <li class="text-center">
                                <a href="" data-toggle="modal" data-target="#add_project"><i style="font-size:46px;" class="ico-plus"></i></a>
                            </li>
                            <li class="text-center">
                                <h5 class="semibold mb0 text-grey9"><a href="">Add a new job</a></h5>
                            </li>
                        </ul>
                    </div>
                    <!--/ panel body -->
                </div>
                <!--/ END Widget Panel -->
            </div>
        </div>

    </div>
    <div id="add_project" class="modal fade">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bgcolor-teal border-radius">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h4 class="semibold modal-title">New Job</h4>
                            </div>
                            <?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'project-form','enctype' => 'multipart/form-data','class'=>"panel-default form-horizontal"))); ?>
                            <div class="modal-body  bgcolor-white">
                            	 	<div class="form-group">
                                    <div class="col-sm-12">
                                            <label class="col-sm-3 control-label pl0">Q. Please give your job a title.<span class="text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <?php echo $form->textField($newProject,'name',array('placeholder'=>"",'class'=>'form-control required','maxlength'=>"200",'data-parsley-id'=>'9793')); ?><ul class="parsley-errors-list" id="parsley-id-9793"></ul>
                                                                                 <small class="help-block">Try to keep it concise, yet descriptive. Ex: e-Commerce app for fashion brand.</small>

                                            </div>
                                        </div>
                                    </div>
                                	<div class="form-group">
                                        <label class="col-sm-3 control-label">Q. Please choose a category. <span class="text-danger">*</span></label>
                                        <div class="col-sm-9">
                            <!-- Software Development -->
							<div class="col-sm-4 pl0 pr0 groupSD">
								<label class="col-sm-12 gray_label_new  pl0 pr0 mb15">Software Development</label>

								<?php
								$coun=0;
								foreach($services as $service){
									if($service->category =='SD'){?>
								<div class="panel-heading pl0 pr0">
									<a href="#sd_overview" id="sd_main" data-toggle="collapse" class="hide">hide</a>
									<span class="radio custom-radio">
										<input type="radio" name="Services[]" id="serviceradio<?php echo $service->id;?>" value="<?php echo $service->id;?>" <?php echo ($coun==0)?'checked="checked"':'';?>  />
                                       <label for="serviceradio<?php echo $service->id;?>" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $service->description;?>">&nbsp;&nbsp;<?php echo $service->name;?></label>
									</span>
								</div>
                                <?php
									$coun=1;
									}
								} ?>
                            </div>
                            <!--/ Software Development -->

                            <!-- IT Solutions -->
                            <div class="col-sm-4 pl0 pr0 groupITS">
                                <label class="col-sm-12 gray_label_new  pl0 pr0 mb15">IT Solutions</label>
                               <?php foreach($services as $service){
									if($service->category =='ITS'){?>
								<div class="panel-heading pl0 pr0">
									<a href="#sd_overview" id="sd_main" data-toggle="collapse" class="hide">hide</a>
									<span class="radio custom-radio">
										<input type="radio" name="Services[]" id="serviceradio<?php echo $service->id;?>" value="<?php echo $service->id;?>"  />
										<label for="serviceradio<?php echo $service->id;?>" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $service->description;?>">&nbsp;&nbsp;<?php echo $service->name;?></label>
									</span>
								</div>
                                <?php
									}
								} ?>
                            </div>
                            <!--/ IT Solutions -->

                            <!-- Other Services -->
                            <div class="col-sm-4 pl0 pr0">
                                <label class="col-sm-12 gray_label_new pl0 pr0 mb15 pb0">Other Services</label>
                              <?php foreach($services as $service){
									if($service->category =='OS'){?>
								<div class="panel-heading pl0 pr0">
									<a href="#sd_overview" id="sd_main" data-toggle="collapse" class="hide">hide</a>
									<span class="radio custom-radio">
										<input type="radio" name="Services[]"  id="serviceradio<?php echo $service->id;?>" value="<?php echo $service->id;?>"  class="groupOS" />
										<label for="serviceradio<?php echo $service->id;?>" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo $service->description;?>" >&nbsp;&nbsp;<?php echo $service->name;?></label>
									</span>
								</div>
                                <?php
									}
								} ?>
                            </div>
                            <!--/ Other Services -->


                            <div class="col-sm-12 mt5">
                                            <small class="help-block text-danger">Select one</small>
                                </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer" style="">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" id="submitPro" class="btn btn-teal">Get Started</button>
                            </div>

                            <?php $this->endWidget(); ?>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
	<button data-target="#bs-modal-lg" id="testAs" data-toggle="modal" class="btn hide btn-primary mb5">Large Modal</button>
    <!-- START modal-lg -->
    <div id="bs-modal-lg" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bgcolor-teal border-radius">
                    <button data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Welcome to VenturePact!</h4>
                </div>
                <div class="modal-body pt0">
                    <div class="panel-body owl-carousel pt0" id="one-slide">
                        <div class="item">

							<div class="col-sm-2 text-center">
								<img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/image/icons/map.png" alt="map">
							</div>
	                     <div class="col-sm-9">
							<h4 style="font-size: 16px; pull-center; line-height: 1.5">You're steps awat from getting 3-5 personalized proposals..</br></h4>

								<p class="text-default">


                                <ol style="line-height: 1.6;">
									<li class="" style="color:#777777;"><strong>Step 1:&nbsp;</strong>Define your requirements and product scope</li>
                                    <li class="" style="color:#777777;"><strong>Step 2:&nbsp;</strong>We work our magic to get you best deal from top providers</li>
									<li class="" style="color:#777777;"><strong>Step 3:&nbsp;</strong>Connect with your matches, evaluate their portfolios and ratings</li>
                                    <li class="" style="color:#777777;"><strong>Step 4:&nbsp;</strong><strong>Start building!</strong></li>

								</ol>
									<li class="" style="color:#777777;"><strong>Step 1:&nbsp;</strong>Define your requirements and product scope</li>
                                    <li class="" style="color:#777777;"><strong>Step 2:&nbsp;</strong>We work our magic to get you best deal from top providers</li>
									<li class="" style="color:#777777;"><strong>Step 3:&nbsp;</strong>Connect with your matches, evaluate their portfolios and ratings</li>
                                    <li class="" style="color:#777777;"><strong>Step 4:&nbsp;</strong><strong>Start building!</strong></li>

								</ol>
								</p>

	                                    <p class="text-primary">Here's what a proposal looks like..&#8230;</p>
							</div>


                        <!-- slide #1 -->
<!--                        <div class="item">-->
                            <!--<div class="col-sm-2 text-center">
                                <img src="<?php //echo Yii::app()->theme->baseUrl; ?>/assets/image/icons/map.png" alt="map">
                            </div>
                            <div class="col-sm-7">
                                <h4>Your personalized proposals will be here soon. Here's what you'll get: </h4>
                                <p class="text-default">
                                    <ul>
                                        <li class="list" style="color:#777777;">A personalized pitch from 2-5 top vendors</li>
                                        <li class="list" style="color:#777777;">Validated past client reviews and ratings</li>
                                        <li class="list" style="color:#777777;">Upfront pricing & timeline estimates</li>
                                        <li class="list" style="color:#777777;">Easy communication with real time chat</li>
                                    </ul>
                                </p>
                                <a href="javascript:void(0);">Here's a sneak peek&#8230;</a>
                            </div>-->
                            <div class="col-md-12 pl0 pr0 text-center">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/compare.png" class="crousel_img" alt="">
                            </div>
                        </div>
                        <!--/ slide #1 -->

                        <!-- slide #2 -->
                        <!--<div class="item">
                            <!--<div class="col-sm-2 text-center">
                                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/image/icons/lighthouse.png" alt="lighthouse">
                            </div>
                            <div class="col-sm-7">
                                <h4>Proposals come with transparent portfolios</h4>
                                <p class="text-default">
                                    <ul>
                                        <li class="list" style="color:#777777;">See a service provider's past work</li>
                                        <li class="list" style="color:#777777;">Get pricing and timeline estimates for each portfolio item</li>
                                        <li class="list" style="color:#777777;">Transparent information about languages used</li>
                                    </ul>
                                </p>
                                <a href="javascript:void(0);">Here's a sneak peek&#8230;</a>
                            </div>-->
						<!--<div class="col-md-12 pl0 pr0 text-center mb15 mt15">
								<img src="<?php //echo Yii::app()->theme->baseUrl; ?>/image/portfolio.png" class="crousel_img" alt="">
							</div>
                        </div>--!>
                        <!--/ slide #2 -->
                    </div><br /><br />
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>-->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!--/ END modal-lg -->

<style>
.owl-theme .owl-controls .owl-pagination {
    margin: 10px auto;
    position: absolute;
    top: 98% !important;
    width: 100%;
}
.owl-theme .owl-controls .owl-buttons {
    top: 50% !important;
    left: 15px;
    margin-top: -20px;
    min-height: 40px;
    position: absolute;
    right: 15px;
	display: none;
}
.owl-theme .owl-controls .owl-buttons .owl-next, .owl-theme .owl-controls .owl-buttons .owl-prev {
    background: none repeat scroll 0 0 #6BCCB4  !important;
    border-color: #5CC7AC ;
    border-radius: 50%;
    color: #FFFFFF !important;
    display: inline-block;
    font-size: 0;
    height: 40px;
    opacity: 0.5;
    position: absolute;
    transition: opacity 0.3s ease 0s;
    width: 40px;
}
.owl-theme .owl-controls .owl-buttons .owl-prev {
    left: -18px;
}
.owl-theme .owl-controls .owl-buttons .owl-next {
    right: -18px;
}
</style>



    <!--/ END row -->
</section>
<!--/ END Template Container -->

<!-- START new slider 2june -->
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/owl/css/owl.carousel.min.css">
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/owl/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/components/carousel.js"></script>
<!-- START new slider 2june -->


<script type="application/javascript">
$(".child_delete ").on("click", function (event) {
	var el= $(this);
	var id	=	$(this).attr('rel');
	if(id == 'Not'){
		bootbox.confirm("You can not delete submitted project.", function (result) {
			if(result){
				return true;
			}
		}).find("div.modal-body").addClass("bgcolor-teal");
	}
	else{
		bootbox.confirm("Are you sure you want to delete this project?", function (result) {
			if(result){

				$.ajax({
					type:'POST',
					url:"<?php echo CController::createUrl("/client/projectDelete");?>",
					data : 'id='+id,
					success:function(data){
						if(data==1){
							$("#deletProjectDiv-"+id).hide();
							location.reload();
						}
					}
				});
				return true;
			}
		}).find("div.modal-body").addClass("bgcolor-teal");
	}
	return false;
	event.preventDefault();
});
$('#submitPro').on('click',function(){
	if(!validate('project-form')){
		$('#project-form').submit();
		$('#ajaxLoadingDiv').show();
	}
});
</script>
