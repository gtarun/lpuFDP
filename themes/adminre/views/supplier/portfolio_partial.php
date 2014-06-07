<!-- START Template Container -->
<section class="container-fluid" >

	 <!-- Page header -->
		 <div class="page-header page-header-block pb0 pt15">
			<div class="page-header-section pt5 ">
				<ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
					<li><?php echo CHtml::link('Dashboard', array('/supplier/index'));?></li>
					<li class="text-info">Supplier Profile</li>
					<li class="active">Build Your portfolio</li>
				</ol>
			</div>
		</div>
	<!--/ Page header -->
	<!--/ Page header -->
	 <?php if(Yii::app()->user->hasFlash('success')):?>
        <div class="alert alert-dismissable alert-success">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?php echo Yii::app()->user->getFlash('success'); ?>
			<script type="text/javascript">
			$(document).ready(function(){
				setTimeout(function(){$(".alert").hide()},1000);
			});
			</script>
        </div>
        <?php endif; ?>

	<!-- START row -->

	<div class="col-md-12" >
		<div class="alert alert-dismissable alert-danger signup_error_container hide">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="false">×</button>
			<div id="signup_errors"></div>
		</div>
	</div>
    <div class="col-md-12 pl0 pr0">
		<div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" >Portfolio</h3>
			</div>
            <div class="panel-body">
				<div class="row" id="mixitup-grid">
                    <!-- Add new thumnail -->
                    <div class="col-md-4 mix filter_creative filter_nature " data-cat="background1.jpg">
                        <!-- thumbnail -->
                        <div class="widget panel mb10">
                            <!-- panel body -->
                            <div class="panel-body height_set">
                                <ul class="list-unstyled mt15 mb15">
                                    <li class="text-center">
                                        <a onclick="addNewPortfolio()" href="javascript:void(0)"><i class="ico-plus" style="font-size:46px;"></i></a>
                                    </li>
                                    <li class="text-center">
                                        <h5 class="semibold mb0 text-grey9"><a href="">Add a new project</a></h5>
                                    </li>
                                </ul>
                            </div>
                            <!--/ panel body -->
                        </div>
                    <!--/<div class="thumbnail thumbnail-album ">

                        <div class="media " style="height:400;width:250">

                            <div class="overlay ">
                                <div class="toolbar ">

                                    <a title="add images" class="btn btn-success" href="javascript:void(0);"  onclick="addNewPortfolio()">
                                        <i class="ico-plus"></i>
                                    </a>

                                </div>
                            </div>
                            <img width="100%" alt="Cover" src="<?php //echo Yii::app()->theme->baseUrl; ?>/image/background/400x250/background3dasdas.jpg" data-toggle="unveil" class="unveiled">
                        </div>

                    </div>-->
                    <!--/ thumbnail -->
                    </div>

                    <!--/ Add new thumnail -->

                    <!-- START Displaying all portfolio user has already added  -->
                    <?php if(!empty($portfolio)){ ?>
                    <div>
                        <?php foreach($portfolio as $item){ ?>
                        <?php //echo json_encode($item->attributes); ?>
                        <div class="col-md-4 mix filter_creative filter_nature " data-cat="background1.jpg" id="portfolio_<?php echo $item->id; ?>">
                            <!-- thumbnail -->
                            <div class="thumbnail thumbnail-album">
                                <!-- media -->
                                <div class="media ">
                                    <!-- indicator -->
                                    <div class="indicator">
                                        <span class="spinner"></span>
                                    </div>
                                    <!--/ indicator -->
                                    <!-- toolbar overlay -->
                                    <div class="overlay ">
                                        <div class="toolbar ">

                                            <?php // Finding skills to send as parameter to Jquery object
                                                 $selectedSkills=array(); foreach($item->suppliersPortfolioHasSkills as $r) { $selectedSkills[$r->skills->id]=$r->skills->name; } ?>
											<?php $portfoliodata = array("id"=>$item->id); ?>
                                            <a title="Edit" class="btn btn-success" href="#" data-toggle="modal" id="editportfolio" onclick='editportfolio(<?php echo json_encode($portfoliodata);?>,this,"xyz")'>

                                                <i class="ico-edit" ></i>

                                            </a>
                                            <a title="Remove" class="btn btn-success" href="#" data-toggle="modal" onclick='removeportfoilo("<?php echo $item->id; ?>")'>
                                                <i class="ico-minus" ></i>
                                            </a>

                                        </div>
                                    </div>
                                    <!--/ toolbar overlay -->
                                    <img width="100%" alt="Cover" src="<?php echo $item->cover ?>/convert?w=400&h=250&fit=crop" data-toggle="unveil" class="unveiled">
                                </div>
                                <!--/ media -->
                                <div class="caption">
                                    <div class="" style="display:inline-block; width:100%;">
                                        <h5 class="semibold pull-left mt0 mb5">
                                            <a href="//<?php echo $item->project_link ; ?>" target="_blank"><?php echo $item->project_name; ?></a> <span class="text-muted" style="font-size: 13px;"> - (<?php echo $item->year_done ; ?>)</span>
                                        </h5>
                                        <div class="text-muted mb5 ellipsis pull-right mb5 mt0"> <span class=" ico-calendar6"> <?php echo $item->estimate_timelines  ; ?> days | <span class="ico-money"> $<?php echo $item->estimate_price; ?></span> </span></div>

                                    </div>
                                    <p class="text-muted mb5 ">Client: <?php echo $item->client_name ; ?></p>



											<span  data-original-title="<?php echo htmlspecialchars($item->description,ENT_QUOTES); ?>" data-toggle="tooltip" data-placement="top"><p class="tag ellipsis text-muted mb5"><?php echo $item->description; ?></p></span>


										<?php $tooltipdata=array();$skillsdata=""; ?>
										<?php foreach($item->suppliersPortfolioHasSkills as $tag){

												$skillsdata.='<a href="javascript:void(0)">#'.$tag->skills->name.'</a>&nbsp';
                                                $tooltipdata[]=$tag->skills->name;
											 }
											if(!empty($item->service->name)){
												$skillsdata.='<a href="javascript:void(0)">#'.$item->service->name.'</a>&nbsp';
                                                $tooltipdata[]=$item->service->name;
											}
											if(!empty($item->industry->name)){
												$tooltipdata[]=$item->industry->name;
												$skillsdata.='<a href="javascript:void(0)">#'.$item->industry->name.'</a>&nbsp';
											}
										?>

									<span data-original-title="<?php echo implode(',',$tooltipdata); ?>" data-toggle="tooltip" data-placement="top">
								<p class="tag ellipsis text-muted mb5"><?php echo $skillsdata ?></p>
									</span>





                                </div>

                                <!-- Hidden as per new design  -->
                                <!--
                                <hr class="mt5 mb5">
                                <ul class="meta">
                                    <li>
                                        <div class="img-group img-group-stack">
                                            <img alt="" class="img-circle" src="image/avatar/avatar7.jpg">
                                            <img alt="" class="img-circle" src="image/avatar/avatar2.jpg">
                                            <span class="more img-circle">2+</span>
                                        </div>
                                    </li>
                                    <li>
                                        <p class="nm">
                                            <a class="semibold" href="#">4 people</a>love this</p>
                                    </li>
                                </ul> -->
                            </div>
                            <!--/ thumbnail -->
                        </div>


                        <?php } ?>
                    </div>
                    <?php }?>
                    <!-- End Displaying all portfolio user has already added  -->
            	</div>
    		</div>
        	<div class="panel-footer">
                <div class="form-group no-border pt0 pb0">
                    <label class="col-sm-4 control-label"></label>
                    <div class="col-sm-8 pl0 pr0">
                        <button type="submit" class="mr15 btn btn-teal pull-right" id="btnPortfolioNext">Next</button>
                    </div>
                </div>
            </div>
    	</div>
    </div>

<!--
                                <div class="pull-right">
                                    <button type="button" id="basicSave" class="btn btn-teal mr15">Save &amp; Next</button>
                                </div>
-->

            <!--/ END row -->
	<div id="bs-modal" class="modal fade">
		<div class="modal-dialog modal-lg" style="width:1024px;">
			<div class="modal-content">
				<div id="portcontent"></div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

    <!-- New Model Popup -->
    <div id="bs-modal-new-portfolio" class="modal fade">
        <div class="modal-dialog modal-lg" style="width:1024px;">
            <div class="modal-content">

                 <?php $form=$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/supplier/profile'),'id'=>'portfolio-supplier','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true),'htmlOptions'=>array('class'=>"panel-default form-horizontal",'data-parsley-validate'=>'data-parsley-validate')));?>

                <div class="modal-header bgcolor-teal border-radius">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <div class="ico-user-plus2 mr15 mt5 pull-left" style="font-size:16px;"></div>
                    <h4 class="modal-title ">Add a new project</h4>
                </div>

                <br/>
                <?php echo $form->hiddenField($portfolioSave,"id"); ?>
                <input type="hidden" name="action" value="add" />
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Project screenshots
                            <span class="text-danger"></span>
                        </label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" readonly id="faketxtbox" class='form-control'/>
                                <?php echo $form->hiddenField($portfolioSave,'cover',array('placeholder'=>"",'class'=>'form-control')); ?>


                                <span class="input-group-btn">
                                    <div class="btn btn-primary btn-file" id="openBrow">
                                        <span class="icon iconmoon-file-3"></span>Browse
                                        <ul class="parsley-errors-list" id="parsley-id-6400"></ul>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Project name
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-7">
                            <?php echo $form->textField($portfolioSave,'project_name',array('placeholder'=>"Name",'class'=>'form-control','required'=>'required',"data-parsley-maxlength"=>"30")); ?>
                            <ul class="parsley-errors-list"></ul>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Project URL
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-7">
                            <?php echo $form->textField($portfolioSave,'project_link',array('placeholder'=>"http://www.awesomeproject.com",'class'=>'form-control','required'=>'required',"data-parsley-type"=>"url")); ?>
                            <ul class="parsley-errors-list"></ul>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Client name
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-7">
                            <?php echo $form->textField($portfolioSave,'client_name',array('placeholder'=>"Client Name",'class'=>'form-control','required'=>'required',"data-parsley-maxlength"=>"30")); ?>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Year completed
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-7">
                            <?php echo $form->textField($portfolioSave,'year_done',array('placeholder'=>"",'class'=>'form-control','required'=>'required')); ?>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Brief description
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-7">
                            <?php echo $form->textArea ($portfolioSave,'description',array('placeholder'=>"Try to limit your response to 100 words Description atleast",'class'=>'form-control','required'=>'required',"data-parsley-minlength "=>"[100]")); ?>


                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Category
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-7">
                            <?php $typeList=CHtml::ListData(Industries::model()->findAll(),'id','name'); $htmlOption = array('size'=>'1','prompt'=>'Select industry...','class'=>'form-control', 'id'=>'SuppliersPortfolioHasSkills_industryId'); ?>
                            <?php echo $form->dropDownList($portfolioSave, 'industry_id', $typeList, $htmlOption); ?>

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Languages or frameworks used
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-7">
                            <select id="SuppliersPortfolioHasSkills_id" class="form-control " placeholder="Select languages..." multiple name="SuppliersHasSkills[skills_id][]" >

                                    <?php foreach($skills as $skill){?>
                                    <option value="<?php echo $skill->id;?>" <?php //echo (in_array($skill->id,$portfolioSkills))?'selected="selected"':'';?> >
                                        <?php echo $skill->name;?>

                                    </option>
                                    <?php } ?>
                                </select>

                        </div>
                    </div>
                </div>

                <!-- new design -->
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Service type<span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <!-- Software Development -->
                            <div class="col-sm-4 pl0 pr0 groupSD">
                                <label class="col-sm-12 gray_label_new  pl0 pr0 mb15">Software Development</label>
                                <?php foreach($services as $service){
                                    if($service->category =='SD'){?>
                                <div class="panel-heading pl0 pr0">

                                    <span class="radio-inline custom-radio custom-radio-primary">
                                        <input type="radio" value="<?php echo $service->id;?>" id="newcustomradio<?php echo $service->id;?>" name="SuppliersHasPortfolio[service_id]" required />

                                        <label for="newcustomradio<?php echo $service->id;?>">&nbsp;&nbsp;<?php echo $service->name;?>.</label>
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
                                    <span class="radio-inline custom-radio custom-radio-primary">
                                        <input type="radio" value="<?php echo $service->id;?>" id="newcustomradio<?php echo $service->id;?>" name="SuppliersHasPortfolio[service_id]" required />

                                        <label for="newcustomradio<?php echo $service->id;?>">&nbsp;&nbsp;<?php echo $service->name;?>.</label>
                                    </span>
                                    <!-- Hidden on changes by prahtam as said it should be single  -->
                                <!--	<span class="checkbox custom-checkbox">
                                        <input type="checkbox" name="Services[]" <?php echo (in_array($service->id,$selecetedServices))?'checked':'';?>  id="servicecheckbox<?php echo $service->id;?>" value="<?php echo $service->id;?>" />
                                        <label for="servicecheckbox<?php echo $service->id;?>">&nbsp;&nbsp;<?php echo $service->name;?>.</label>
                                    </span> -->
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
                                    <span class="radio-inline custom-radio custom-radio-primary">
                                        <input type="radio" value="<?php echo $service->id;?>" id="newcustomradio<?php echo $service->id;?>" name="SuppliersHasPortfolio[service_id]" required />

                                        <label for="newcustomradio<?php echo $service->id;?>">&nbsp;&nbsp;<?php echo $service->name;?>.</label>
                                    </span>
                                    <!-- Hidden on changes by prahtam as said it should be single  -->
                                    <!-- <span class="checkbox custom-checkbox">
                                        <input type="checkbox" name="Services[]" <?php echo (in_array($service->id,$selecetedServices))?'checked':'';?>  id="servicecheckbox<?php echo $service->id;?>" value="<?php echo $service->id;?>"  class="groupOS" />
                                        <label for="servicecheckbox<?php echo $service->id;?>">&nbsp;&nbsp;<?php echo $service->name;?>.</label>
                                    </span> -->
                                </div>
                                <?php
                                    }
                                } ?>
                            </div>
                            <!--/ Other Services -->

                        </div>
                    </div>
                </div>
                <!-- new design -->


                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Estimated price
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-7 ">
                            <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <?php echo $form->textField($portfolioSave,'estimate_price',array('placeholder'=>"",'class'=>'form-control','required'=>'required',"data-parsley-type"=>"integer","data-parsley-maxlength "=>"10")); ?>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <label class="col-sm-4 control-label">Estimated timeline
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-7">
                            <div class="input-group">
                            <span class="input-group-addon">Days</span>
                            <?php echo $form->textField($portfolioSave,'estimate_timelines',array('placeholder'=>"",'class'=>'form-control','required'=>'required',"data-parsley-maxlength "=>"10","data-parsley-type"=>"integer")); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <!--<div class="col-sm-12">
                        <label class="col-sm-4 control-label">Language Used
                            <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-7">
                            <?php //echo $form->textField($portfolioSave,'languages_used',array('placeholder'=>"Enter Languages coma seprated",'class'=>'form-control','required'=>'required')); ?>

                        </div>
                    </div>
    -->
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <?php echo CHtml::submitButton( 'Add Project',array( 'id'=>'btnprotfolioadd','class'=>'btn btn-teal')); ?>

                </div>

                <?php $this->endWidget(); ?>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--/ New Model Popup -->



</section>
<!--/ END Template Container -->

<!-- START To Top Scroller -->
<a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%">
	<i class="ico-angle-up"></i>
</a>
<!--/ END To Top Scroller -->
<script type="text/javascript">
	$(document).ready(function(){
        $("span[data-toggle='tooltip'],p[data-toggle='tooltip']").tooltip();
        //hideNotification();
        $("#btnPortfolioNext").on("click",function(){
            var id = $("#components li:nth(2) a").attr("id");
			console.log("finsishes all tasks" +id);
			$("#"+id).trigger("click");

        });


		//SuppliersHasPortfolio_year_done
		$("#SuppliersHasPortfolio_year_done").datepicker({
                changeMonth: true,
                changeYear: true
        });
		$('.signup_error_container').hide();
		$('#openBrow').click(function(){
			console.log("clicked");
			filepicker.setKey("<?php echo $this->filpickerKey; ?>");
			filepicker.pick({
    			mimetypes: ['image/*']
				},
				function(InkBlob){
					$("#SuppliersHasPortfolio_cover,#faketxtbox").val(InkBlob.url);
			  		console.log(InkBlob.url);
				},
				function(FPError){
    				console.log(FPError.toString());
  				}
			);
		});

	});
	function fireTrigger(what){
		if(what){
			var id = $("#components li:nth(1) a").attr("id");
			console.log("finsishes all tasks" +id);
			$("#"+id).trigger("click");
		}
	}
	function removeportfoilo(portfolioId)
	{
		console.log("remove - " +portfolioId);
		var el = $("#portfolio_"+portfolioId);
		var boottext = "Are you sure you want to delete this project?";
        bootbox.confirm(boottext, function (result)
        {
	        if(result)
	        {
                $.ajax({
                    type: "POST",
                    data:"portfolioId="+ portfolioId+"&action=remove",
                    url: "<?php echo CController::createUrl('/supplier/ajaxPortfolio'); ?>",
                    success: function(data){
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
                            el.hide(300);
                            messageData = data.success[0].msg;
							$(".portfoliocount").html(parseInt($(".portfoliocount").text())-1);

                        }

                        //Genrating message
                        console.log("message data : " + JSON.stringify(messageData) );
                        htm+=messageData + "<br />";
                        $("#signup_errors").html(htm);
                        $('.signup_error_container').show('blind', {}, 500)
                        console.log("finsishes all tasks");
                        hideNotification(false);
                        //var data
                        //if(data.iserror )
                    },
                    error: function(a,b,c)
                    {
                        console.log("Error occured : " + a +" | "+ b + " | "+ c);
                    }

			});
            }
        }).find("div.modal-body").addClass("bgcolor-teal");

		return false;
	}
	function editportfolio(jsonData,el,selData){
		console.log("edit called " +jsonData.id  );
		console.log("edit : " +  JSON.stringify(jsonData));
		console.log("edit : " +  JSON.stringify(selData));
		$.ajax({
			type:'POST',
			data:'portofolioId=' + jsonData.id ,
			url:"<?php echo CController::createUrl('/supplier/ajaxGetPortfolio');?>",
			success:function(data)
			{
				$("#portcontent").html(data);
				var options = {
					"backdrop" : "static"
				}
				$("#bs-modal").find('.modal-title').text("Edit Portfolio");
				$("#bs-modal").modal(options);
				console.log("finsishes all tasks");

			},
			error: function(a,b,c){
				console.log("Errors found : " +JSON.stringify(a) +" | " +b + " | " + c);
			}
		});




	}
	function addNewPortfolio()
	{
        console.log("getting form");
        $.ajax({
			type:'POST',
			data:'portofolioId=0'  ,
			url:"<?php echo CController::createUrl('/supplier/ajaxGetPortfolio');?>",
			success:function(data)
			{
				$("#portcontent").html(data);
				var options = {
					"backdrop" : "static"
				}
				$("#bs-modal").find('.modal-title').text("Edit Portfolio");
				$("#bs-modal").modal(options);
				console.log("finsishes all tasks");

			},
			error: function(a,b,c){
				console.log("Errors found : " +JSON.stringify(a) +" | " +b + " | " + c);
			}
		});

	}
	function hideNotification(triggerneeded)
	{
		triggerneeded = typeof triggerneeded !== 'undefined'? triggerneeded: true;
		//Hide the notification div after 2 second
		//fireTrigger(true);
		setTimeout(function() {
			fireTrigger(triggerneeded);
			$(".signup_error_container,.alert-success").hide('blind', {}, 500);
		}, 2000);
			//

	}
</script>
