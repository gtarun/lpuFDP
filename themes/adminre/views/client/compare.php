<!-- START Template Container -->
<section class="container-fluid">
    <!-- section header -->
    <div class="section-header">
        <h5 class="semibold title mb15">Compare Proposals</h5>
    </div>
    <!--/ section header -->
    <!-- START row -->
    <div class="row">
    <?php
	if(count($list)!=0){
	foreach($list as $propo){
		$totalratings = $c = $q1	=	$q2	=	$q3	=	$q4	=	0;
		$totalratings = count($propo->suppliers->suppliersHasReferences);
		foreach($propo->suppliers->suppliersHasReferences as $ref){
			if($ref->status == 1){
				$q1= (int)$q1 + (int)$ref->q1_communication_rating ;
				$q2= (int)$q2 + (int)$ref->q2_skill_rating  ;
				$q3= (int)$q3 + (int)$ref->q3_timelines_ratings  ;
				$q4= (int)$q4 + (int)$ref->q4_independence_rating  ;
				$c++;
			}
		}
		if($c==0)
			$c=1;
		$sumref["totalratings"] = $totalratings= $c;
		$sumref["average"] = (int)$q1 + (int)$q2 +(int)$q3 +(int)$q4;
		$sumrefA = number_format((float)((((int)$sumref["average"]))/(4*((int)$totalratings))),1);?>
		<div class="col-xs-12 col-md-6 col-lg-4 project" <?php echo 'data-room="'.$propo->chat_room_id.'"';?>>
            <div class="table-layout widget panel mb0 grand_parent blur_main">
                <div class="col-xs-6 widget panel panel-minimal bgcolor-inverse">
                    <div class="panel-body" onclick="window.location.href='<?php echo CController::createUrl("/client/pitch",array('id'=>$propo->id,'pid'=>$propo->client_projects_id));?>'">
                        <ul class="list-unstyled">
                            <li class="text-center">
                            	<img class="img-circle circle_border" src="<?php echo (strpos($propo->suppliers->logo,'avatar.png'))?$propo->suppliers->logo:$propo->suppliers->logo.'/convert?w=150&h=150&fit=crop';?>" alt="<?php echo $propo->suppliers->name;?> Logo" height="70" width="70"  />
                                <!---->
                                <br/>
                                <h5 class="semibold mb0 mt10">
                                 <p class="nm text-muted"><?php echo $propo->suppliers->name;?></p><br />
                                <i style="font-size:12px;" class="ico-dollar"></i>
								<?php echo ($propo->status == 1)?'- - -':$propo->min_price;?> - <i style="font-size:12px;" class="ico-dollar"></i><?php echo ($propo->status == 1)?'- - -':$propo->max_price;?></h5>
                                <p class="nm text-muted">
                                    <?php if($propo->status == 1){
                                    echo 'Price';
                                    }else{?>
                                    <span style="font-size:12x;" class="semibold">
                                    <?php echo $propo->time_material;?></span>, to be paid <span class="semibold" style="font-size:12x;" id="budget_type"><?php echo $propo->billing_schedule;?></span>
									<?php } ?>
                                </p>
                            </li>
                        </ul>

                    </div>
				</div>
				<div class="col-xs-6 widget panel panel-minimal bgcolor-white delete_parent">
					<div class="panel-body text-center bgcolor-white">
                        <div class="col-lg-12 pl0 mt15 mb15 pr0">
                            <div class="progress progress-xs nm col-lg-6 pl0 pr0">
                                <div class="progress-bar progress-bar-warning" style="width: <?php echo (($sumref["average"]*100)/5); ?>%"></div>
                            </div>
                            <h4 class="semibold col-lg-6 mt0 mb0" style="font-size:12px;">
							<?php echo $sumrefA; ?> / 5</h4>
                            <p class="media-text " style="font-size:10px"><b><?php echo $sumref["totalratings"]?></b> ratings</p>
                        </div>
                    </div>
                    <hr class="mt0 mb0">
                    <div class="panel-body text-center bgcolor-success">
                        <ul class="list-unstyled">
                            <li class="text-center ">
                                <span class="number"><span class="msg2 label label-danger ">0</span></span>
                                <p class="nm"><a href="" class="text-white custom_white ">Messages</a></p>
                            </li>
                        </ul>
                    </div>
                    <hr class="mt0 mb0">
                    <div class="panel-body text-center bgcolor-success">
                        <ul class="list-unstyled">
                            <li class="text-center">
                                <span class="number"><span class="label label-danger"> <?php echo ($propo->status == 1)?'- - -':$propo->time_estimation;?> Day(s)</span></span>
                                <p class="nm"><a href="" class="text-white custom_white ">Timeline</a></p>
                            </li>
                        </ul>
                    </div>
                    <hr class="mt0 mb0" style="border-color: rgb(255, 255, 255);">
                    <div class="panel-body text-center bgcolor-success">

                        <div class="col-sm-12">
                            <ul class="nav nav-section nav-justified">
                                <li class="text-center">
                                    <div class="section">
                                        <span class="number"><span class="label label-danger">
										<?php echo ($propo->status == 1)?'- - -':$propo->trial_period;?> Day(s)</span></span>
                                        <p class="nm"><a href="" class="text-white custom_white">Trial</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php }
	}
	else{?>

<!--
        <div class="col-md-12">
        	<div class="alert alert-dismissable alert-info">
        		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        		<strong>Thanks for posting the job scope.</strong> The service providers are currently preparing their proposals. You should be hearing back within 24-48 hours.
             </div>

        </div>
-->

<!-- START new slider 28may -->
<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/owl/css/owl.carousel.min.css">
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/owl/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/components/carousel.js"></script>
<!-- START new slider 28may -->


	<div class="col-sm-12">
                        <!-- example 4 -->
                        <div class="panel nm no-border col-sm-12">
                            <div class="panel-body owl-carousel" id="one-slide">
                                <!-- slide #1 -->
                                <div class="item">
                                    <div class="col-sm-2 text-center">
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/image/icons/map.png" alt="map">
                                    </div>
                                    <div class="col-sm-7">
                                        <h4>Your personalized proposals will be here soon. Here's what you'll get: </h4>
                                        <p class="text-default"><ul><li class="list" style="color:#777777;">A personalized pitch from 2-5 top vendors</li>
                                                                    <li class="list" style="color:#777777;">Validated past client reviews and ratings</li>
                                                                    <li class="list" style="color:#777777;">Upfront pricing & timeline estimates</li>
                                                                    <li class="list" style="color:#777777;">Easy communication with real time chat</li>
                                                                    </ul></p>
                                        <p class="text-primary">Here's a sneak peek&#8230;</p>

                                    </div>
                                    <div class="col-md-12 pl0 pr0 text-center">
                                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/compare.png" class="crousel_img" alt="">

                                    </div>
                                </div>

                                <!--/ slide #1 -->
                                <!-- slide #2 -->
                                <!--<div class="item">
                                    <div class="col-sm-2 text-center">
                                        <img src="<?php //echo Yii::app()->theme->baseUrl; ?>/assets/image/icons/lighthouse.png" alt="lighthouse">
                                    </div>
                                    <div class="col-sm-7">
                                        <h4>Proposals come with transparent portfolios</h4>
                                       <p class="text-default"><ul><li class="list" style="color:#777777;">See a service provider's past work</li>
                                                                    <li class="list" style="color:#777777;">Get pricing and timeline estimates for each portfolio item</li>
                                                                    <li class="list" style="color:#777777;">Transparent information about languages used</li>
                                                                    </ul></p>
                                                                            <p class="text-primary" >Here's a sneak peek&#8230;</p>

                                    </div>
                                    <div class="col-md-12 pl0 pr0 text-center mb15 mt15">
                                        <img src="<?php //echo Yii::app()->theme->baseUrl; ?>/image/portfolio.jpg" class="crousel_img" alt="">

                                    </div>
                                </div>-->
                                <!--/ slide #2 -->

                            </div>

                        </div>
                        <!--/ example 4 -->
                    </div>


    <?php }?>
    </div>


<style>
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
	display: none;
}
.owl-theme .owl-controls .owl-buttons .owl-prev {
    left: -27px;
}
.owl-theme .owl-controls .owl-buttons .owl-next {
    right: -27px;
}
</style>
    <!--/ END row -->
</section>
<!--/ END Template Container -->
