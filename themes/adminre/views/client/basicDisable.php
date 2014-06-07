<?php $form=$this->beginWidget('CActiveForm', array('id'=>'login-form', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('id'=>'project-form','enctype' => 'multipart/form-data','class'=>"",'data-parsley-validate'=>'data-parsley-validate'))); ?>
<!-- START Basic Template Container -->
<section class="container-fluid" id="basicProject">
	<!-- Page Header -->

    <div class="page-header page-header-block pb0 pt15">
        <div class="page-header-section pt5">
            <ol class="breadcrumb" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
                <li><?php echo CHtml::link('Dashboard', array('/client/index'));?></li>
				<li class="text-info">Job Scope</li>
                <li class="active">The Basics</li>
            </ol>
        </div>
    </div>
    <!--/ Page Header -->
    <!-- START row -->
    <div class="row">

<div class="col-md-12">
<div class="alert alert-dismissable alert-info">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
<strong>Thanks for posting the job scope.</strong> You can see the service providers proposals <a href="<?php echo CController::createUrl("/client/compare",array('id'=>$project->id));?>"><strong>Here</strong></a></div>
</div>


        <div class="col-md-12">
         <div class="panel panel-default form-horizontal form-bordered">
                <!-- panel heading/header -->
                <div class="panel-heading">
                    <h3 class="panel-title">The Basics</h3>
                </div>
                <!--/ panel heading/header -->
                <!-- panel body -->
                <div class="panel-body">

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Q. Please give your job a title. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            <?php echo $form->textField($project,'name',array('placeholder'=>"",'class'=>'form-control required','disabled'=>'disabled','required'=>'required')); ?>
                            </div>
                        </div>


						<!-- new design -->
						<div class="form-group">
						<label class="col-sm-4 control-label">Q. Please choose a category. <span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<!-- Software Development -->
							<div class="col-sm-4 pl0 pr0 groupSD">
								<label class="col-sm-12 gray_label_new  pl0 pr0 mb15">Software Development</label>
								<?php foreach($services as $service){
									if($service->category =='SD'){?>
								<div class="panel-heading pl0 pr0">
									<a href="#sd_overview" id="sd_main" data-toggle="collapse" class="hide">hide</a>
									<span class="radio custom-radio">
										<input type="radio" name="Services[]" <?php echo (in_array($service->id,$selecetedServices))?'checked':'';?>  id="serviceradio<?php echo $service->id;?>" value="<?php echo $service->id;?>" disabled='disabled' />
										<label for="serviceradio<?php echo $service->id;?>">&nbsp;&nbsp;<?php echo $service->name;?>.</label>
									</span>
								</div>
                                <?php
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
										<input type="radio" name="Services[]" <?php echo (in_array($service->id,$selecetedServices))?'checked':'';?>  id="serviceradio<?php echo $service->id;?>" value="<?php echo $service->id;?>" disabled="disabled" />
										<label for="serviceradio<?php echo $service->id;?>">&nbsp;&nbsp;<?php echo $service->name;?>.</label>
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
										<input type="radio" name="Services[]" <?php echo (in_array($service->id,$selecetedServices))?'checked':'';?>  id="serviceradio<?php echo $service->id;?>" value="<?php echo $service->id;?>"  class="groupOS" disabled="disabled" />
										<label for="serviceradio<?php echo $service->id;?>">&nbsp;&nbsp;<?php echo $service->name;?>.</label>
									</span>
								</div>
                                <?php
									}
								} ?>
                            </div>
                            <!--/ Other Services -->

                        </div>
                        </div>
                        <!-- new design -->

                        <!-- panel group of sd_overview -->
                        <div class="panel-group mb0" id="accordion1">
                        <div class="">
                            <div style="height: auto;" id="sd_overview" class="panel-collapse collapse">
                                <div class="form-group border-top">
                                    <label class="col-sm-4 control-label">Q. What describes the job the best?
                                    <span class="text-danger"></span></label>
                                    <div class="col-sm-8 pl0 pr0">
                                        <div class="col-sm-12">
                                        <div class="row">
                                        	<div class="col-sm-12">
											<?php foreach($currentStatus as $cStatus){
												if($cStatus->position	==	'SD'){?>
                                                <span class="checkbox custom-checkbox ">
                                                <input type="checkbox" name="current_status[]" <?php echo (in_array($cStatus->id,$selecetedStatus))?'checked':'';?> id="statuscheckbox<?php echo $cStatus->id;?>" value="<?php echo $cStatus->id;?>" disabled="disabled" />
                                                <label for="statuscheckbox<?php echo $cStatus->id;?>">&nbsp;&nbsp;<?php echo $cStatus->name;?>.</label>
                                                </span>
                                                <?php } }?>
                                           </div>
                                        </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Q. Please check the categories that apply to the job. <span class="text-danger"></span></label>

                                    <div class="col-sm-8 pl0 pr0">
                                        <div class="row">
											<div class="col-sm-12">
												<div class="col-sm-12 pl0">
													<div class="col-sm-12">
														<label class="col-sm-12 gray_label_new pl0 pr0 mb5 mt5">Business Applications</label>
														<div class="col-sm-12 pl0 pr0">
															<ul class="col-sm-12 pl0">
																<?php foreach($industries as $industry){
																	if($industry->position =='IO'){
																	?>
																<li class="col-sm-4 pl0">
																<span class="checkbox custom-checkbox ">
																<input type="checkbox" name="Industries[]" <?php echo (in_array($industry->id,$selecetedIndustries))?'checked':'';?> id="industrycheckbox<?php echo $industry->id;?>" value="<?php echo $industry->id;?>" disabled="disabled" />
																<label for="industrycheckbox<?php echo $industry->id;?>">&nbsp;&nbsp;<?php echo $industry->name;?>.</label>
																</span>
																</li>
																<?php }
																}?>
															</ul>
														</div>
													</div>
												</div>

												<div class="col-sm-12">
													<div class="col-sm-12 pl0">
														<label class="col-sm-12 gray_label_new pl0 pr0 mb5 mt15">Customer-facing Applications</label>
														<div class="col-sm-12 pl0 pr0">
														<ul class="col-sm-12 pl0">

															<?php foreach($industries as $industry){
																if($industry->position =='CF'){
																?>
															<li class="col-sm-4 pl0">
															<span class="checkbox custom-checkbox ">
															<input type="checkbox" name="Industries[]" <?php echo (in_array($industry->id,$selecetedIndustries))?'checked':'';?> id="industrycheckbox<?php echo $industry->id;?>" value="<?php echo $industry->id;?>" disabled="disabled" />
															<label for="industrycheckbox<?php echo $industry->id;?>">&nbsp;&nbsp;<?php echo $industry->name;?>.</label>
															</span>
															</li>
															<?php }
															}?>
															</ul>
														</div>
													</div>
												</div>
											</div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--/ panel group sd_overview -->

                        <!-- panel group of it_overview -->
                        <div class="panel-group mb0" id="accordion1">
                        <div class="">
                            <div style="height: auto;" id="it_overview" class="panel-collapse collapse">
                                <div class="form-group border-top">
                                    <label class="col-sm-4 control-label">Q. Which of the following best describes your IT need? <span class="text-danger"></span></label>
                                    <div class="col-sm-8 col-sm-9 pl0 pr0">
                                        <div class="col-sm-12">
											<?php foreach($currentStatus as $cStatus){
												if($cStatus->position	==	'ITS'){?>
                                            <span class="checkbox custom-checkbox ">
                                            <input type="checkbox" name="current_status[]" <?php echo (in_array($cStatus->id,$selecetedStatus))?'checked':'';?> id="statuscheckbox<?php echo $cStatus->id;?>" value="<?php echo $cStatus->id;?>" disabled="disabled" />
                                            <label for="statuscheckbox<?php echo $cStatus->id;?>">&nbsp;&nbsp;<?php echo $cStatus->name;?>.</label>
                                            </span>
                                            <?php }}?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                       </div>
                       <!--/ panel group it_overview -->

                        <div class="form-group border-top">
                            <label class="col-sm-4 control-label">Q. Please summarize the job in your own words. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                               <?php echo $form->textArea($project,'description',array('placeholder'=>"",'class'=>'form-control required','required'=>'required','rows'=>'3','disabled'=>'disabled')); ?>
                               <?php echo $form->hiddenField($project,'other_status',array('placeholder'=>"",'id'=>'other_status')); ?>
                            </div>
                        </div>


                        <div class="form-group border-top">
                            <label class="col-sm-4 control-label">Q. Language or skill preference. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
								<select id="satnam-start" class="form-control" placeholder="Select skills..." multiple name="Skills[]" disabled="disabled">
									<!--<option value="">Select a framework...</option>-->
									<?php foreach($skills as $skill){?>
									<option value="<?php echo $skill->id;?>" <?php echo (in_array($skill->id,$selecetedSkills))?'selected="selected"':'';?> ><?php echo $skill->name;?></option>
									<?php } ?>
								</select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Q. Start Date. <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            	<?php echo $form->textField($project,'start_date',array('value'=>(isset($project->start_date))?date('m/d/Y',strtotime($project->start_date)):'','placeholder'=>"Select a date",'id'=>'satnamDate','disabled'=>'disabled','class'=>'form-control required')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-sm-4 control-label">Q. What is your current progress? <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
							<?php foreach($currentStatus as $cStatus){
                            if($cStatus->position	==	'CS'){?>
                            <span class="checkbox custom-checkbox ">
                            <input type="checkbox" name="current_status[]" <?php echo (in_array($cStatus->id,$selecetedStatus))?'checked':'';?> id="statuscheckbox<?php echo $cStatus->id;?>" value="<?php echo $cStatus->id;?>" disabled="disabled" />
                            <label for="statuscheckbox<?php echo $cStatus->id;?>">&nbsp;&nbsp;<?php echo $cStatus->name;?>.</label>
                            </span>
                            <?php }}?>

                        </div>
                        </div>

                       <div class="form-group" style="background: beige">
                            <label class="col-sm-4 control-label">Q. Please upload any mockups, designs or other documentation that will help us better understand your needs. <span class="text-danger"></span></label>

                            <div class="col-sm-6">
                                <div class="input-group">
                                    <input type="text" readonly="" class="form-control" data-parsley-id="3057"><ul class="parsley-errors-list" id="parsley-id-3057"></ul>
                                    <span class="input-group-btn">
                                        <div class="btn btn-primary btn-file">
                                            <span class="icon iconmoon-file-3"></span> <a href="javascript:void();" style="color:#FFF;" id="openBrow">Browse </a>

                                        </div>
                                    </span>
                                </div>

                            </div>
                            <div class="col-sm-8 pull-right mt15">
                              <table class="table table-striped">
                                                    <tbody id="ClientProjects_mockup">

                             	<?php
											if(count($project->clientProjectDocuments)>0){
												foreach($project->clientProjectDocuments as $doc){?>
													<tr>
                                                    <td>
                                                       <span class="label label-success"><?php echo $doc->type;?></span> <?php echo $doc->name;?> (<?php echo round($doc->size/(1024));?> KB)
                                                    </td>
                                                    <td><a href="javascript:OpenFile('<?php echo $doc->path;?>',400,500)">View</a></td>
                                                        </tr>
                                             	<?php }
											}?>
                                    </tbody></table>


                             </div>
                      </div>




                       <div class="panel-footer mt0">
                            <div class="form-group no-border pt0 pb0">
                                <label class="col-sm-3 control-label"></label>
                                <div class="pull-right mr15">
                                    <button type="button" id="basicSave" class="btn btn-teal">Next</button>

                                </div>
                            </div>
                        </div>

                </div>
                <!-- panel body -->
            </div>
        </div>
    </div>
    <!--/ END row -->

</section>

<!--/ END Basic Template and Start Progress Container -->

<!-- END Progress And START Product Scope Template Container -->
<section class="container-fluid hide" id="productScope">
<!-- Page Header -->
<div class="page-header page-header-block pb0 pt15">
    <div class="page-header-section pt5 ">
        <ol class="breadcrumb" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
            <li><?php echo CHtml::link('Dashboard', array('/client/index'));?></li>
			<li class="text-info">Job Scope</li>
            <li class="active">Budget</li>
        </ol>
    </div>
</div>
<!--/ Page Header -->
<!-- START row -->
<div class="row">
<div class="col-md-12">
<div class="alert alert-dismissable alert-info">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
<strong>Thanks for posting the job scope.</strong> You can see the service providers proposals <a href="<?php echo CController::createUrl("/client/compare",array('id'=>$project->id));?>"><strong>Here</strong></a></div>
</div>

    <div class="col-md-12">
        <div data-parsley-validate="" action="" class="panel panel-default  form-horizontal form-bordered" novalidate>
            <div class="panel-heading">
                <h3 class="panel-title">Budget preferences</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="control-label col-sm-4 pl0">Q. Where do you want your service providers to be located? <span class="text-danger">*</span></label>
                        <div class="col-sm-8">

                                    <span class="radio-inline custom-radio custom-radio-primary satnam">

                                    <input type="radio" data-parsley-id="5322" data-parsley-multiple="a" name="ClientProjects[preferences]" id="customradio1" value="no-preferences" <?php echo ($project->preferences=='no-preferences')?'checked="checked"':'';?> class="budgetClass" disabled="disabled" >
                                    <label for="customradio1">&nbsp;&nbsp;No preference</label>
                                    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
                                    </ul>
                                    <span class="radio-inline custom-radio custom-radio-primary">
                                    <input type="radio" data-parsley-id="4433" data-parsley-multiple="a" value="city" name="ClientProjects[preferences]" id="customradio2" <?php echo ($project->preferences=='city')?'checked="checked"':'';?> class="budgetClass" disabled="disabled" >
                                    <label for="customradio2">&nbsp;&nbsp;In my city</label>
                                    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
                                    </ul>
                                    <span class="radio-inline custom-radio custom-radio-primary">
                                    <input type="radio" data-parsley-id="3557" data-parsley-multiple="a" value="country" name="ClientProjects[preferences]" id="customradio3" <?php echo ($project->preferences=='country')?'checked="checked"':'';?> class="budgetClass" disabled="disabled" >
                                    <label for="customradio3">&nbsp;&nbsp;In my country</label>
                                    </span><ul class="parsley-errors-list" id="parsley-id-multiple-a"></ul>
                                    <ul id="parsley-id-multiple-a" class="parsley-errors-list">
                                    </ul>
                                     <span class="radio-inline custom-radio custom-radio-primary">
									<input type="radio" data-parsley-id="3557" data-parsley-multiple="a" value="regoin" name="ClientProjects[preferences]" id="customradio4" <?php echo ($project->preferences=='regoin')?'checked="checked"':'';?> class="budgetClass" disabled="disabled"  >
                                    <label for="customradio4">&nbsp;&nbsp;In these regions</label>
												</span>
                                <div style="height: auto;" id="regions" class="col-sm-12 panel-collapse collapse <?php echo ($project->preferences=='regoin')?'in':'';?> pl0 pr0">
									<div class="panel-body mt15 pl0">
										 <?php
										$regions	=	Countries::model()->findAll();
										foreach($regions as $region){?>
										<div data-toggle="buttons" class="btn-group mb10 mr10">
											<label class="btn btn-sm btn-default active_success btn_new btn_rounded <?php echo (in_array($region->id,$selecetedRegions))?'active':'';?>" >
											<input type="checkbox" id="option<?php echo $region->id;?>" name="options[]" value="<?php echo $region->id;?>"  <?php echo (in_array($region->id,$selecetedRegions))?'checked="checked"':'';?> class="tireSelectuion" disabled="disabled" /><?php echo $region->name;?></label>
										</div>
										<?php }?>
									</div>
								</div>
                            </div>
						</div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="panel-toolbar-wrapper pl0 pt5 pb5 border-none bg-none">
                                <div class="panel-toolbar">
                                    <label class="control-label mb-15">Q. Given your geographical preferences, the following pricings are available. Please select those that match your budget. <span class="text-danger">*</span></label>
                                </div>
                            </div>
                        <div novalidate action="" data-parsley-validate="" class="panel panel-default">
                            <div id="satnamBugdet">
								<?php $this->renderPartial('_budget1', array('list'=>$list,'sel'=>$selecetedTier));?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                    	<div class="form-group mt20 mb10">
                            <label class="col-sm-4 control-label">Q. Given your selection above, what is the range of your TOTAL budget? <span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                            	<div class="col-md-3 pl0">
                                    <div class="col-md-2 input-group">
                                        <span class="input-group-addon">$</span>
                                        <?php echo $form->textField($project,'min_budget',array('placeholder'=>"Min",'class'=>'form-control','disabled'=>'disabled')); ?>
                                    </div>
                                </div>
                                <div class="col-md-3 pl0">
                                    <div class="col-md-2 input-group">
                                        <span class="input-group-addon">$</span>
                                        <?php echo $form->textField($project,'max_budget',array('placeholder'=>"Max",'class'=>'form-control','disabled'=>'disabled')); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                                <div class="form-group mt20 mb100">
                                   <label class="col-sm-4 control-label">Q. How do you plan to finance this project? <span class="text-danger"></span></label>
                                    <div class="col-sm-8">


<?php echo $form->radioButtonList($project,'custom_budget_range', array('Personal funds'=>'Personal funds', 'Cash flow from operations'=>'Cash flow from operations','Funding: Series A or up'=>'Funding: Series A or up','Funding: Seed or Angel'=>'Funding: Seed or Angel'), array('template'=>'<span class="radio-inline custom-radio custom-radio-primary">{input} {label}</span>','labelOptions'=>array('style'=>'display:inline'), 'separator'=>'', 'encode'=>true)); ?>

                                    </div>
                                </div>
                            </div>
                </div>
            </div>
			<div class="panel-footer">
				<button class="btn btn-teal pull-right ml10"  id="productScopeSave" type="button">Next</button>
				<button class="btn btn-default pull-right " id="productScopeBack" type="button">Back</button>

			</div>
            </div>
        </div>
    </div>

    <!--budget-->


<!--/ END row -->

</section>

<!--/ END Product Scope Template and Start Budget Container -->

<!-- START Template Container -->
<section class="container-fluid hide" id="budgetProject">

                <!-- Page Header -->
                <div class="page-header page-header-block pb0 pt15">
                    <div class="page-header-section pt5 ">
                        <ol class="breadcrumb" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
                            <li><?php echo CHtml::link('Dashboard', array('/client/index'));?></li>
                            <li class="text-info">Job Scope</li>
                            <li class="active">Specifications</li>
                        </ol>
                    </div>
                </div>

                <!--/ Page Header -->
                <!-- START row -->
                <div class="row">
<div class="col-md-12">
<div class="alert alert-dismissable alert-info">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
<strong>Thanks for posting the job scope.</strong> You can see the service providers proposals <a href="<?php echo CController::createUrl("/client/compare",array('id'=>$project->id));?>"><strong>Here</strong></a></div>
</div>
                    <div class="col-md-12">
                      <div data-parsley-validate="" action="" class="panel panel-default form-horizontal form-bordered input-append" novalidate>
                        <div class="panel-heading">
                          <h3 class="panel-title">Specifications (optional)</h3>
                        </div>
                        <div class="panel-body">


						<div class="form-group">
							<label class="col-sm-4 control-label text-left">Q. Try to walk us through the user flow. Think of each screen the user will come across as they navigate the app. <span class="text-danger"></span></label>
                            <div class="col-sm-8 mb10">
                            	<div class="row container_outer">
                                	<?php
									$count	=	1;
									if(count($project->clientProjectFlows)>0){
									foreach($project->clientProjectFlows as $setp){?>
                                    <div class="col-sm-12 mb5">
                                    	<div class="col-sm-3">
                                        	<label class="col-sm-12 control-label add_new" style="padding-top:8px;">Screen <?php echo $count;?>:</label>
                                        </div>
                                        <div class="col-sm-8">
                                        	<input type="text"  class="form-control " placeholder="User signs up using Facebook or Twitter" name="Flows[]" required value="<?php echo $setp->description;?>" disabled="disabled" >
                                        </div>
                                    </div>
                                    <?php $count++;}
									}else{?>
                                    <div class="col-sm-12 mb5">
                                    	<div class="col-sm-3">
                                        	<label class="col-sm-12 control-label add_new" style="padding-top:8px;">Screen <?php echo $count;?>:</label>
                                        </div>
                                        <div class="col-sm-8">
                                        	<input type="text"  class="form-control " placeholder="User signs up using Facebook or Twitter" name="Flows[]" required value="" disabled="disabled" >
                                        </div>
                                    </div>
                                    <?php } ?>

                                  </div>
                                    <div>


                                    <div class="col-sm-12 mb5 hide">
                                        <div class="col-sm-3">
                                        	<input type="hidden" class="counterNum" value="<?php echo $count;?>" />
                                            <label class="col-sm-12 control-label add_new" style="padding-top:8px;">Screen :</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text"  class="form-control " placeholder="User signs up using Facebook or Twitter" name="Flows[]" required value="" disabled="disabled" >
                                        </div>
                                    </div>
                                   </div>






							</div>
                        </div>


                      	<div class="form-group">
                                        <label class="col-sm-4 control-label text-left">Q. Please give examples of applications with similar functionalities. <span class="text-danger"></span></label>
                                        <div class="col-sm-8 mb10">
                                          <div class="row container_outer">
                                          	<?php
											if(count($project->projectReferences)>0){
											foreach($project->projectReferences as $ref){?>
                                            <div class="col-sm-12 mb5">
                                              <div class="col-sm-11 mt5">
                                             <input type="text"  class="form-control " placeholder="www.facebook.com" name="projectReferences[]" required value="<?php echo $ref->details;?>" disabled="disabled" >
                                               </div>

                                             </div>
                                            <?php }
											}else{?>
                                            <div class="col-sm-12 mb5">
                                            	<div class="col-sm-11 mt5">
                                            	<input type="text"  class="form-control " placeholder="www.facebook.com" name="projectReferences[]" required disabled="disabled" >
                                               </div>
                                            </div>
                                            <?php } ?>

                                        </div>
                                        <div>
                                        	<div class="col-sm-12 mb5 hide">
                                            	<div class="col-sm-12 mt5">
                                            	<input type="text"  class="form-control " placeholder="www.facebook.com" name="projectReferences[]" required disabled="disabled" />
                                               </div>
                                            </div>


                                        </div>
                                        </div>
                                    </div>


                        <div class="form-group">

                                        <label class="col-sm-4 control-label text-left">Q. Add a few questions you'd like service providers to answer while pitching. <span class="text-danger"></span></label>

                                       <div class="col-sm-8">
                                        	<div class="container_outer row">
									<?php if(count($project->clientProjectsQuestions)>0){
											foreach($project->clientProjectsQuestions as $que){?>
											<div id="add_outr" class="col-sm-12 mb5">
												<label style="padding-top:8px;" class="col-sm-2 control-label add_new">Question:</label>
												<div class="col-sm-9">
													<input type="text" name="Question[]" class="form-control add_new" placeholder="Which API do you plan on using for scraping the web pages?" value="<?php echo $que->question;?>" disabled="disabled" />
												</div>
											</div>
											<?php }
											}else{?>
											<div id="add_outr" class="col-sm-12 mb5 ">
												<label style="padding-top:8px;" class="col-sm-2 control-label add_new">Question:</label>
												<div class="col-sm-9">
													<input type="text" name="Question[]" class="form-control add_new" disabled="disabled" />
												</div>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<div class="panel-footer">
								<!--<button type="button" id="budgetSave" class="btn btn-teal pull-right ml10">Next</button>-->
								<button type="button" id="budgetBack" class="btn btn-default pull-right">Back</button>
							</div>
						</div>
					</div>
				</div>
				<!--/ END row -->
			</section>
<!--/ END Template Container -->

<section class="container-fluid hide" id="questionProject">
    <!-- Page Header -->
 <div class="page-header page-header-block pb0 pt15">
    <div class="page-header-section pt5 ">
        <ol class="breadcrumb" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
			<li><?php echo CHtml::link('Dashboard', array('/client/index'));?></li>
			<li class="text-info">Job Scope</li>
            <li class="active">Custom Questions</li>
        </ol>
    </div>
</div>
    <!--/ Page Header -->
    <!-- START row -->
    <div class="row">
        <div class="col-md-12">
          <div data-parsley-validate="" action="" class="panel panel-default" novalidate="">
            <div class="panel-heading">
              <h3 class="panel-title">Custom Questions</h3>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-12">
                    <label class="control-label mb10">Q. Are there any questions that you want to ask the companies who would bid for your project?<span class="text-danger">*</span></label>
                    <div class="container_outer">
					<?php
                    if(count($project->clientProjectsQuestions)>0){
                    foreach($project->clientProjectsQuestions as $que){?>
                    <div id="add_outr" class="col-sm-12 mb5">
                        <label style="padding-top:8px;" class="col-sm-1 control-label add_new">Question:</label>
                        <div class="col-sm-6">
                            <input type="text" name="Question[]" class="form-control add_new" value="<?php echo $que->question;?>" disabled="disabled" />
                        </div>
                    </div>
                    <?php }
                    }else{?>
                    <div id="add_outr" class="col-sm-12 mb5 ">
                        <label style="padding-top:8px;" class="col-sm-1 control-label add_new">Question:</label>
                        <div class="col-sm-6">
                            <input type="text" name="Question[]" class="form-control add_new" disabled="disabled" />
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                     <div id="add_outr" class="col-sm-12 mb5 hide">
                        <label style="padding-top:8px;" class="col-sm-1 control-label add_new">Question:</label>
                        <div class="col-sm-6">
                            <input type="text" name="Question[]" class="form-control add_new" disabled="disabled" />
                        </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="panel-footer">
            	<button class="btn btn-teal  pull-right ml15" id="finalSave" type="button" disabled="disabled">Submitted</button>
                <button class="btn btn-teal  pull-right " id="finalBack" type="button">Back</button>
            </div>
          </div>
        </div>
    </div>
    <!--/ END row -->

</section>

<?php $this->endWidget(); ?>

<div id="bs-modal" class="modal fade ">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header text-center ">
                                <button data-dismiss="modal" class="close" type="button">×</button>
                                <h3 class="semibold modal-title">Terms &amp; Conditions </h3>

                            </div>
                            <div class="modal-body">
                              <div class="panel-body">


                                    <p class="pb10">This Privacy Policy governs the manner in which VenturePact LLC.   collects, uses, maintains and discloses information collected from users   (each, a "User") of the VenturePact.com website ("Site"). This privacy   policy applies to the Site and all products and services offered by   VenturePact LLC.<br>
                                      <br>
                                      <strong class="text-primary">Personal identification information</strong><br>
                                      <br>
We may collect personal identification information from Users in a   variety of ways, including, but not limited to, when Users visit our   site, register on the site, fill out a form, and in connection with   other activities, services, features or resources we make available on   our Site. Users may be asked for, as appropriate, name, email address.   Users may, however, visit our Site anonymously. We will collect personal   identification information from Users only if they voluntarily submit   such information to us. Users can always refuse to supply personally   identification information, except that it may prevent them from   engaging in certain Site related activities.<br>
<br>
<strong class="text-primary">Non-personal identification information</strong><br>
<br>
We may collect non-personal identification information about Users   whenever they interact with our Site. Non-personal identification   information may include the browser name, the type of computer and   technical information about Users means of connection to our Site, such   as the operating system and the Internet service providers utilized and   other similar information.<br>
<br>
<strong class="text-primary">How we use collected information</strong><br>
<br>
The VenturePact LLC may collect and use Users personal information for the following purposes:<br>
<br>
- To personalize user experience We may use information in the aggregate   to understand how our Users as a group use the services and resources   provided on our Site. <br>
- To send periodic emails If User decides to opt-in to our mailing list,   they will receive emails that may include company news, updates,   related product or service information, etc. If at any time the User   would like to unsubscribe from receiving future emails, they may do so   by contacting us via our Site.<br>
<br>
<strong class="text-primary">How we protect your information</strong><br>
<br>
We adopt appropriate data collection, storage and processing practices   and security measures to protect against unauthorized access,   alteration, disclosure or destruction of your personal information,   username, password, transaction information and data stored on our Site.<br>
<br>
<strong class="text-primary">Sharing your personal information</strong><br>
<br>
We do not sell, trade, or rent Users personal identification information   to others. We may share generic aggregated demographic information not   linked to any personal identification information regarding visitors and   users with our business partners, trusted affiliates and advertisers   for the purposes outlined above.<br>
<br>
<strong class="text-primary">Third party websites</strong><br>
<br>
Users may find advertising or other content on our Site that link to the   sites and services of our partners, suppliers, advertisers, sponsors,   licensors and other third parties. We do not control the content or   links that appear on these sites and are not responsible for the   practices employed by websites linked to or from our Site. In addition,   these sites or services, including their content and links, may be   constantly changing. These sites and services may have their own privacy   policies and customer service policies. Browsing and interaction on any   other website, including websites which have a link to our Site, is   subject to that website's own terms and policies.<br>
<br>
<strong class="text-primary">Compliance with children's online privacy protection act</strong><br>
<br>
Protecting the privacy of the very young is especially important. For   that reason, we never collect or maintain information at our Site from   those we actually know are under 13, and no part of our website is   structured to attract anyone under 13.<br>
<br>
<strong class="text-primary">Changes to this privacy policy</strong> VenturePact LLC has the discretion to update this privacy policy at any   time. When we do, we will post a notification on the main page of our   Site. We encourage Users to frequently check this page for any changes   to stay informed about how we are helping to protect the personal   information we collect. You acknowledge and agree that it is your   responsibility to review this privacy policy periodically and become   aware of modifications.<br>
<br>
<strong class="text-primary">Your acceptance of these terms</strong> By using this Site, you signify your acceptance of this policy. If you   do not agree to this policy, please do not use our Site. Your continued   use of the Site following the posting of changes to this policy will be   deemed your acceptance of those changes.<br>
<br>
<strong class="text-primary">Contacting us</strong><br>
<br>
If you have any questions about this Privacy Policy, the practices of   this site, or your dealings with this site, please contact us at:<br>
<br>
<a href="mailto:questions@venturepact.com">questions@venturepact.com </a></p>

                 </div>
                            </div>

                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/js/selectize.min.js"></script>

<script type="text/javascript">
$('input').attr("disabled",'disabled');
$("#satnam-start").selectize();
$(document).ready(function() {$("#satnamDate").datepicker();})
$('input').attr("readonly",'readonly');
$("#basicSave").click(function(){$('#basicProject').addClass('hide');$('#productScope').removeClass('hide');$("#ProductScope"+<?php echo $project->id;?>).addClass("active");$("#Basic<?php echo $project->id;?>").removeClass("activeLink");$("#ProductScope<?php echo $project->id;?>").addClass("activeLink");$("#Budget<?php echo $project->id;?>").removeClass("activeLink");$("#Questions<?php echo $project->id;?>").removeClass("activeLink");});
$("#productScopeSave").click(function(){$('#productScope').addClass('hide');$('#budgetProject').removeClass('hide');$("#Budget"+<?php echo $project->id;?>).addClass("active");$("#Basic<?php echo $project->id;?>").removeClass("activeLink");$("#ProductScope<?php echo $project->id;?>").removeClass("activeLink");$("#Budget<?php echo $project->id;?>").addClass("activeLink");$("#Questions<?php echo $project->id;?>").removeClass("activeLink");});
$('#productScopeBack').click(function(){$('#productScope').addClass('hide');$('#basicProject').removeClass('hide');$("#Basic<?php echo $project->id;?>").addClass("activeLink");$("#ProductScope<?php echo $project->id;?>").removeClass("activeLink");$("#Budget<?php echo $project->id;?>").removeClass("activeLink");$("#Questions<?php echo $project->id;?>").removeClass("activeLink");});
$("#budgetSave").click(function(){$('#budgetProject').addClass('hide');$('#questionProject').removeClass('hide');$("#Questions"+<?php echo $project->id;?>).addClass("active");$("#Basic<?php echo $project->id;?>").removeClass("activeLink");$("#ProductScope<?php echo $project->id;?>").removeClass("activeLink");$("#Budget<?php echo $project->id;?>").removeClass("activeLink");$("#Questions<?php echo $project->id;?>").addClass("activeLink");});
$('#budgetBack').click(function(){$('#budgetProject').addClass('hide');$('#productScope').removeClass('hide');$("#Basic<?php echo $project->id;?>").removeClass("activeLink");$("#ProductScope<?php echo $project->id;?>").addClass("activeLink");$("#Budget<?php echo $project->id;?>").removeClass("activeLink");$("#Questions<?php echo $project->id;?>").removeClass("activeLink");});
$("#finalSave").click(function(){});
$('#finalBack').click(function(){$('#questionProject').addClass('hide');$('#budgetProject').removeClass('hide');$("#Basic<?php echo $project->id;?>").removeClass("activeLink");$("#ProductScope<?php echo $project->id;?>").removeClass("activeLink");$("#Budget<?php echo $project->id;?>").addClass("activeLink");$("#Questions<?php echo $project->id;?>").removeClass("activeLink");});
(function($){
$(".questionsshow_sd").on("click",function(){$("#sd_main").click();});
$(".questionsshow_it").on("click",function(){$("#it_main").click();});
$("#customcheckbox_p4").on("click",function(){$("#main_regions").click();});
$("#customradio4").on("change", function(){
	if($("#customradio4").is(":checked")){
		$("#regions").show();
		var regions	=	[];
		$("input[name='options[]']:checked").each( function () {
			regions.push($(this).val());
		});
		getData($(this).val(),regions);
	}
})
$("#customcheckbox_pref4").on('click',function(){$('#satnam').click();})
$(".questionsshow_sd").on('click',function(){$('#sd_main').click();});
$(".questionsshow_it").on('click',function(){$('#it_main').click();});
$('.groupSD').find(':radio:checked').each(function (){$('#sd_overview').show()});
$('.groupITS').find(':radio:checked').each(function (){$('#it_overview').show()});
	})(jQuery);
</script>
