<?php //CVarDumper::dump($project->clientProjects->clientProjectsHasSkills->skills->name,10,1);die; ?>
<!-- START Template Main -->
<section>
    <div class="page-header page-header-block pb0 pt0">
		<div class="page-header-section pt5 ">
			<ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
				<li><?php echo CHtml::link('Dashboard', array('/supplier/index'));?></li>
				<li class="text-info">Project</li>
				<li class="text-info">RFP</li>
				<li class="active"><?php echo $project->clientProjects->name; ?></li>
			</ol>
		</div>
	</div>

   <input type="hidden" name="page" value="pitch" id="hiddenpage" />
	<?php if(Yii::app()->user->hasFlash('success')):?>
		<div class="col-md-12 mb10">
			<div class="alert alert-dismissable alert-success">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<?php echo Yii::app()->user->getFlash('success'); ?>
			</div>
		</div>
        <?php endif; ?>
	<?php if(Yii::app()->user->hasFlash('errors')):?>
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-danger">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<?php echo Yii::app()->user->getFlash('errors'); ?>
			</div>
		</div>
        <?php endif; ?>




	<!-- START Template Container  -->
	<section class="container-fluid">

		<!-- START Table Layout -->
		<div class="row">
        	<!-- START Jumbotron -->
            <div class="jumbotron jumbotron120 mb0 mt5" style="border-bottom:1px solid #DAE2E4">
                <!-- info -->
                <div class="indicator hide"><span class="spinner"></span></div>
                <div class="info bottom">
                    <!-- Supplier Detials -->
                    <div class="col-md-8 mt10">
                        <h4 class="semibold ellipsis nm pb5 "><?php echo $project->clientProjects->name; ?></h4>
                        <p class="ellipsis nm text-default">
                            <i class="ico-user mr5"></i> Client: <?php echo $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name; ?> - <?php echo $project->clientProjects->clientProfiles->company_name; ?></p>

                        <p class="ellipsis nm text-default">
                            <i class="ico-users mr5"></i><?php echo (empty($project->clientProjects->clientProfiles->team_size)?"0":$project->clientProjects->clientProfiles->team_size); ?> Employees</p>
                        <p class="ellipsis nm text-default">
                            <i class="ico-location mr5"></i> Based in <?php echo $project->clientProjects->clientProfiles->cities->name; ?> </p>
                    </div>
                    <!--/ Supplier Detials -->
                    <!-- Submit project buttons -->

                    <div class="col-md-4 pl0 pr0 pull-right mt10">
                        <?php if($project->status == 0 || $project->status==1){ ?>

                        <a type="button" class="btn btn-danger ml5 pull-right" style="margin-top:23px;" id="btnarchive" href="<?php echo CController::createUrl('/supplier/projectStatusHandler&stat=6&projectid='.$project->id); ?>">
                            <i class="ico-question mr5"></i> Archive
                        </a>
                        <a type="button" class="btn btn-success pull-right" style="margin-top:23px;" href="javascript:void(0);" id="btnpitch">
                            <i class="ico-checkmark3 mr5" ></i> Pitch
                        </a>
                        <a  class="btn btn-info clarification mr5 pull-right" style="margin-top:23px; margin-left:2px; <?php echo (!empty($project->chat_room_id)?'display:none': ''); ?>"  >
                            <i class="ico-eye mr5" ></i> Seek Clarification
                        </a>

                        <!-- <a type="button" class="btn btn-success" style="margin-top:15px;" href="<?php //echo CController::createUrl('/supplier/pitch&render=1&projectid='.$project->id."&stat=".$project->status); ?>" id="btnpitch">
                            <i class="ico-checkmark3" ></i>Pitch</a> -->

                        <?php }else{ ?>
                            <button type="button" class="btn btn-success ml10 pull-right" style="margin-top: 32px;">
                            <i class="ico-checkmark3"></i> <?php echo $this->projectStatus[$project->status]["supplier"]; ?></button>
                        <?php } ?>

                    </div>
                    <!--/ Submit project buttons -->
                </div>
                <!--<div class="media">
                    <img alt="Cover photo" data-src="<?php //echo Yii::app()->theme->baseUrl; ?>/image/background/background16.jpg" src="<?php //echo Yii::app()->theme->baseUrl; ?>/image/background/background16.jpg" data-toggle="unveil" class="unveiled">
                </div>-->
                <!--/ info -->
                <!-- media : make sure that media image is 1280px width -->

                <!--/ media -->
            </div>
            <!--/ END Jumbotron -->
			<div class="col-md-12">
				<div class="panel">
					<div class="pa15">
						<ul class="nav nav-section nav-justified">
							<!-- Software development section -->
							<li style="width:3%">

								<div class="section">
									<h4 class="semibold text-success mt0 mb5" style="font-size:12px;">
										<?php
											foreach($project_status as $key=>$item)
											{
												if($key!= "CS")
													echo implode(',',$item);
											}

										?></h4>
									<p class="nm text-muted">
										<span class="" style="font-size:12px;">Requirement</span>
									</p>
								</div>
							</li>
							<!--/ Software development section -->
							<!-- Services section (Need  -->

				            <?php if(empty($project->clientProjects->clientProjectsHasServices)){ ?>
										<!-- NO services! -->
				            <?php }else{ ?>
                            <li>

								<div class="section">
									<h4 class="semibold text-success mt0 mb5" style="font-size:12px;">
										<?php foreach($project->clientProjects->clientProjectsHasServices as $service){ ?>
											<?php echo $service->services->name.","; ?>
										<?php } ?>
                                        </h4>
									<p class="nm text-muted">
										<span class="" style="font-size:12px;">Service type</span>
									</p>
								</div>

							</li>
				            <?php } ?>

							<!--/ Services section (Need  -->

							<!-- Industries section   -->
							<?php if(empty($project->clientProjects->clientProjectsHasIndustries)){ ?>
										<!-- NO Indutries! -->
				            <?php }else{ ?>
                            <li>
								<div class="section">
									<h4 class="semibold text-warning mt0 mb5" style="font-size:12px;">
										<?php foreach($project->clientProjects->clientProjectsHasIndustries as $industry){ ?>
											<?php echo $industry->industries->name.","; ?>
										<?php } ?>
                                        </h4>
                                        <p class="nm text-muted">
										<span class="">Category</span>
									</p>
								</div>
							</li>
				        <?php } ?>

							<!--/ Industries section   -->
							<li>
								<div class="section">
									<h4 class="semibold text-primary mt0 mb5" style="font-size:12px;"><?php echo "$".$project->clientProjects->min_budget." - $".$project->clientProjects->max_budget ; ?></h4>
									<p class="nm text-muted">
										<span class="" style="font-size:12px;">Monthly Budget
											<i class="ico-info-sign hide" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="Enter Text for Budget details" style="cursor:pointer;"></i>
										</span>
								</div>
							</li>
							<li>
								<div class="section">
									<h4 class="semibold text-danger mt0 mb5" style="font-size:12px;"><?php echo date( "d-M-Y",strtotime($project->clientProjects->start_date)); ?></h4></h4>
									<p class="nm text-muted">
										<span class="">Start Date</span>
									</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<!-- Flow section  -->
                            <div class="col-lg-12">
                            	<div class="panel">
									<div class="panel-heading">
                                        <h3 class="panel-title">Scope</h3>
                                    </div>
									<hr class="nm">
									<div class="panel-body">
                                        <p class="text-default">
                                            <?php echo $project->clientProjects->description; ?>
                                        </p>
                                        <h5 class="text-success semibold pt10 pb10">Flow </h5>
										<div class="widget-notes block">
                                        	<div class="scrollbox_bar slimscroll" id="flowscroll">
                                            <div class="paper pt0">
                                                <ul class="list-table">

														<?php
												if(count($project->clientProjects->clientProjectFlows)>0){ ?>
                                                    <li class="text-left">
												<?php	foreach($project->clientProjects->clientProjectFlows as $step){ ?>
                                                        <div class="col-sm-12 mb0 pl0 pr0">
                                                            <div class="col-sm-2 pl0">
                                                                <label class="control-label add_new" style="padding-top:8px;"><?php echo "Step".((int)$step->step + 1).":"; ?></label>
                                                            </div>
                                                            <div class="col-sm-10">
                                                                <p class="text-default add_new mt5 pt5 mb0"><?php echo $step->description; ?></p>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                         </li>
													<?php }else{ ?>
                                                        <li class="text-center">
														No Steps given!!
                                                        </li>
													<?php } ?>

                                                </ul>
                                            </div>
                                        </div>
										</div>

										<h5 class="text-success semibold pt10 pb10">Language Preferences</h5>
										<?php if(empty($project->clientProjects->clientProjectsHasSkills)){ ?>
										<div class="col-md-12">
                                        <div class="alert alert-dismissable alert-danger">

                                            <strong></strong> No Language preference added!
                                        </div>
                                    </div>
										<?php }else{ ?>
											<?php foreach($project->clientProjects->clientProjectsHasSkills as $skill){ ?>
										<span class="label label-success mb5"><?php echo $skill->skills->name ?></span>

										<?php } ?>
										<?php } ?>


                                        <br>
                                        <h5 class="text-success semibold pt10 pb0">References</h5>
                                        <p class="pb0">
                                           <?php echo $project->clientProjects->unique_features ?>
                                        </p>
										<div class="border-dashed">
											<!-- DIsplay reference  links -->
                                            <ul class="list-group mb0">
                                                <li class="list-group-item np" style="border:none;">
													<?php if(count($project->clientProjects->projectReferences)>0){ ?>
													<?php foreach($project->clientProjects->projectReferences as $reference){ ?>
                                                    <a class="text-muted" target="_blank" href="//<?php echo $reference->details; ?>"><?php echo $reference->details ?></a> ,
													<?php } ?>
                          							<?php }else{ ?>

                          							<?php } ?>
                                                </li>
                                            </ul>
											<!--/ DIsplay reference  links -->
                                        </div>

										<!-- Progress section -->

                                        <h5 class="text-success semibold mb15 mt15">Progress</h5>
                                        <ul class="list-group">
                                            <li class="list-group-item np" style="border:none;">
                                                <div class="form-wizard">
													<!-- Progess display -->
                                                    <div class="col-sm-12 pl0 pr0 mb10">

											<?php
											foreach($project_status as $key=>$item)
											{
												if($key == "CS"){
													foreach($item as $p){
													?>
												   <span class="checkbox custom-checkbox pb10">
                                                            <input type="checkbox" checked="" disabled="" id="customcheckbox1" name="customcheckbox1" >
                                                            <label title="" for="customcheckbox1">&nbsp;&nbsp;<?php echo $p; ?></label>
                                                        </span>
												<?php } } } ?>


                                                    </div>
													<!--/ Progess display -->
                                              </div>
                                            </li>
                                        </ul>

										<!--/ Progress section -->
                                        <div class="panel-footer">
                                        <h5 class="semibold mt0 mb5" style="font-size:12px">
                                            <i class="ico-attachment mr5"></i>Attachment
                                            <span class="text-muted" style="font-size:10px;">(<?php echo count($project->clientProjects->clientProjectDocuments); ?> attachment)</span>
                                        </h5>
                                        <table class="table table-striped mb0">
                                            <tbody>

												<!-- Documents Displaying -->
												<?php if(count($project->clientProjects->clientProjectDocuments)>0){ ?>
													<?php foreach($project->clientProjects->clientProjectDocuments as $doc){ ?>
                                                <tr>
                                                    <td style="border:none;padding-left:0px; background:none;">
                                                        <span class="label label-success">HTML</span> <?php echo $doc->name ;?>
                                                    </td>
                                                    <td width="6%" style="border:none; background:none; "><a href="javascript:void(0)" onclick='SaveToDisk("<?php echo $doc->path ?>","")'>Download</a></td>
                                                </tr>
												<?php } ?>
											<?php }else{ ?>
												<div class="col-md-12">
                                        <div class="alert alert-dismissable alert-danger hide">

                                            <strong></strong> No attachments provided.
                                        </div>
                                    </div>

											<?php } ?>
												<!--/ Documents Displaying -->
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
								</div>
                            </div>
					<!--/ Flow section  -->
					<!-- Refrences Block -->
                            <div class="col-lg-6 hide">
                            	<div class="panel">
                                	<div class="panel-heading">
                                        <h3 class="panel-title">References</h3>
                                    </div>
									<hr class="nm">
                                    <div class="text-default panel-body">
										<p class="pb5">
                                           <?php echo $project->clientProjects->unique_features ?>
                                        </p>
										<div class="border-dashed">
											<!-- DIsplay reference  links -->
                                            <ul class="list-group mb0">
                                                <li class="list-group-item text-center np" style="border:none;">
													<?php if(count($project->clientProjects->projectReferences)>0){ ?>
													<?php foreach($project->clientProjects->projectReferences as $reference){ ?>
                                                    <a class="text-muted" target="_blank" href="//<?php echo $reference->details; ?>"><?php echo $reference->details ?></a> ,
													<?php } ?>
                          							<?php }else{ ?>
													No references are provided.
                          							<?php } ?>
                                                </li>
                                            </ul>
											<!--/ DIsplay reference  links -->
                                        </div>

										<!-- Progress section -->

                                        <h5 class="text-success semibold mb15 mt15">Progress</h5>
                                        <ul class="list-group">
                                            <li class="list-group-item np" style="border:none;">
                                                <div class="form-wizard">
													<!-- Progess display -->
                                                    <div class="col-sm-12 pl0 pr0 mb10">

											<?php
											foreach($project_status as $key=>$item)
											{
												if($key == "CS"){
													foreach($item as $p){
													?>
												   <span class="checkbox custom-checkbox pb10">
                                                            <input type="checkbox" checked="" disabled="" id="customcheckbox1" name="customcheckbox1" data-parsley-multiple="customcheckbox1" data-parsley-id="1063">
                                                            <label title="" for="customcheckbox1">&nbsp;&nbsp;<?php echo $p; ?></label>
                                                        </span>
												<?php } } } ?>


                                                    </div>
													<!--/ Progess display -->
                                              </div>
                                            </li>
                                        </ul>

										<!--/ Progress section -->
                                    </div>
									<div class="panel-footer ">
                                        <h5 class="semibold mt0 mb5" style="font-size:12px">
                                            <i class="ico-attachment mr5"></i>Attachment
                                            <span class="text-muted" style="font-size:10px;">(<?php echo count($project->clientProjects->clientProjectDocuments); ?> attachment)</span>
                                        </h5>
                                        <table class="table table-striped mb0">
                                            <tbody>

												<!-- Documents Displaying -->
												<?php if(count($project->clientProjects->clientProjectDocuments)>0){ ?>
													<?php foreach($project->clientProjects->clientProjectDocuments as $doc){ ?>
                                                <tr>
                                                    <td style="border:none;padding-left:0px; background:none;">
                                                        <span class="label label-success">HTML</span> <?php echo $doc->name ;?>
                                                    </td>
                                                    <td width="6%" style="border:none; background:none; "><a href="javascript:void(0)" onclick='SaveToDisk("<?php echo $doc->path ?>","")'>Download</a></td>
                                                </tr>
												<?php } ?>
											<?php }else{ ?>
												<div class="col-md-12">
                                        <div class="alert alert-dismissable alert-danger hide">

                                            <strong></strong> No Documents Found !
                                        </div>
                                    </div>

											<?php } ?>
												<!--/ Documents Displaying -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
					<!--/ Refrences Block -->
                        </div>
			</div>
			<!--/ Left Side / Top side -->

			<!-- Right Side / Bottom side  Chatting panel -->
            <audio id="pop">
    <source src="<?php echo Yii::app()->theme->baseUrl; ?>/files/pop.mp3" type="audio/mpeg">
        <source src="<?php echo Yii::app()->theme->baseUrl; ?>/files/pop.ogg" type="audio/ogg">
</audio>
            <div class="col-md-6">
			  <?php echo $this->renderPartial("_chat_partial",array('project'=>$project)); ?>
			</div>
		</div>
		<!--/ END Table Layout -->
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
    (function($){

		$("html").Core({ "console": false });

		$('#flowscroll').enscroll({
			showOnHover: true,
			verticalTrackClass: 'track3',
			verticalHandleClass: 'handle3'
		});



	})(jQuery);
</script>


<script type="text/javascript">

$(document).ready(function(){
	console.log("loading chat");
    //init();
	//attachfileformessage
    $("#btnpitch").on('click',function(){
        $.ajax({
				type: 'POST',
				data: "projectid=<?php echo $project->id; ?>",
				url: "<?php echo CController::createUrl('/supplier/pitch'); ?>",
				success: function(data){
					$("#content").html(data);

				},
				error: function(a,b,c){
					console.log("Errors found : " +JSON.stringify(a) +" | " +JSON.stringify(b) + " | " + JSON.stringify(c));
				},
			});

    });
	$('#attachfileformessage').on('click',function(){
            console.log("clicked");
    		filepicker.setKey("<?php echo $this->filpickerKey; ?>");
    		filepicker.pick({
    				mimetypes: ['image/*','text/plain','application/pdf']
    				},
    				function(InkBlob){
    					$(".message").val(InkBlob.url);
						$(".send").trigger("click");
    					console.log("fil : " + JSON.stringify(InkBlob));
    				},
    				function(FPError){
    					//alert("Error Uploading Files : " + FPError.toString());
    					console.log(FPError.toString());
    				}
    		);

        });
	$("#btnarchive").on("click", function (event) {
		 var el= $(this);
         bootbox.confirm("Are you sure you want to archive this project?", function (result)           {
			 if(result){
				 window.location.href = el.attr("href");
				 return true;
			 }
                // callback
         });
		return false;
        event.preventDefault();
    });
	$('#scrollbox7').enscroll({
					showOnHover: true,
					verticalTrackClass: 'track3',
					verticalHandleClass: 'handle3'
	});


	});
</script>
<style>
.media-list > .media .media-object > img {width: 100%; height: 100%;
}
</style>
