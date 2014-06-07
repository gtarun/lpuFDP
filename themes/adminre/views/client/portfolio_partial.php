<!-- START Template Container -->
<section class="container-fluid">
	 <!-- Page Header -->
    <div class="page-header page-header-block pb0 pt0 mt0">
        <div class="page-header-section pt5 ">
            <ol class="breadcrumb pb10" style="margin-bottom: 5px; background: none repeat scroll 0% 0% transparent;">
                <li><?php echo CHtml::link('Dashboard', array('/client/index'));?></li>
				<li class="text-info">Proposal</li>
                <li class="active">Portfolio</li>

            </ol>

        </div>
    </div>
    <!--/ Page Header -->
   	<!-- START row -->
	<div class="row" id="mixitup-grid">
    	<?php
		if(count($portfolio)>0){
		foreach($portfolio as $item){?>
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

                                            <?php $selectedSkills=array(); foreach($item->suppliersPortfolioHasSkills as $r) { $selectedSkills[$r->skills->id]=$r->skills->name; } ?>

                                        </div>
                                    </div>
                                    <!--/ toolbar overlay -->
                                    <img width="100%" alt="Cover" src="<?php echo $item->cover ?>/convert?w=400&h=250&fit=crop" data-toggle="unveil" class="unveiled">
                                </div>
                                <!--/ media -->
                                <div class="caption">
                                    <div class="" style="display:inline-block; width:100%;">
                                        <h5 class="semibold pull-left mt0 mb5">
                                            <a href="//<?php echo $item->project_link ; ?>" target="_blank"><?php echo $item->project_name; ?></a> <span class="text-muted" style="font-size: 13px;">(<?php echo $item->year_done ; ?>)</span>
                                        </h5>
                                        <div class="text-muted mb5 ellipsis pull-right mb5 mt0"> <span class=" ico-calendar6"> <?php echo $item->estimate_timelines  ; ?> days | <span class="ico-money"> $<?php echo $item->estimate_price; ?></span> </span></div>

                                    </div>
                                    <p class="text-muted mb5 ">Client: <?php echo $item->client_name ; ?></p>
                                    <div style="width:100%; height:35px; overflow:hidden;">
                                        <p class="text-muted mb5"><span  data-original-title="<?php echo $item->description; ?>" data-toggle="tooltip" data-placement="top">

                                        <?php echo $item->description; ?></span></p>
                                        </div><p></p>
                                    <p class="tag ellipsis">
                                        <?php $tooltipdata=array(); ?>
                                        <?php foreach($item->suppliersPortfolioHasSkills as $tag){ ?>
                                        <a href="javascript:void(0)">#
                                            <?php echo $tag->skills->name;
                                                   $tooltipdata[]=$tag->skills->name; ?></a>&nbsp;
                                        <?php }?>
                                        <?php if(!empty($item->industry->name)){ ?>
                                            <a href="javascript:void(0)">#
                                                <?php echo $item->industry->name;
                                                    $tooltipdata[]=$item->industry->name; ?></a>&nbsp;
                                        <?php } ?>
                                        <?php if(!empty($item->service->name)){ ?>
                                            <a href="javascript:void(0)">#
                                                <?php echo $item->service->name;
                                                $tooltipdata[]=$item->service->name; ?></a>&nbsp;
                                        <?php } ?>

                                    </p>
                                    <p class="tag ellipsis">
                                    <span data-original-title="<?php echo implode(',',$tooltipdata); ?>" data-toggle="tooltip" data-placement="top">
                                        </span></p>

                                </div>

                            </div>
                            <!--/ thumbnail -->
                        </div>


		<?php }
		}else{?>
            <div class="col-xs-12 col-md-12 col-lg-12">
		        <div class="alert alert-dismissable alert-info">
                   	<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>
                   	<strong>Hey!</strong>  Currently there are no Portfolio to display.
               	</div>
			</div>
        <?php }?>


	</div>
	<!--/ END row -->

</section>
<script type="text/javascript">

$(document).ready(function(){
	$("span[data-toggle='tooltip']").tooltip();
	//$('.popover_class').popover('toggle')
	$('.popover_class').tooltip()



});
</script>
<!--/ END Template Container -->

