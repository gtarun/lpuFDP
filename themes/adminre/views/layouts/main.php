<!DOCTYPE html>
<html>
    <!-- START Head -->
    <head>
        <!-- START META SECTION -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/favicon.png">
        <title>VenturePact</title>
        <meta name="description" content="Adminre admin dashboard">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon-57x57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/image/touch/apple-touch-icon.png">
        <!--/ END META SECTION -->
        <!-- START STYLESHEETS -->
        <!-- Library stylesheet : mandatory -->

        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/magnific-popup.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/css/selectize.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/library/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/css/jquery-ui.min.css">
        <!--/ Library stylesheet -->
        <!-- Application stylesheet : mandatory -->
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/layout.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/uielement.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/stylesheet/custom_sa.css">
        <!--/ Application stylesheet -->
        <!-- END STYLESHEETS -->
        <!-- START JAVASCRIPT SECTION - Load only modernizr script here -->
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/library/modernizr/js/modernizr.min.js"></script>
        <!--/ END JAVASCRIPT SECTION -->
		<style type="text/css">
			.errordialog{
				position:fixed; width:100%; border-bottom:1px solid black; background:lightyellow; left:0; top:0; padding: 3px 0; text-indent: 5px; font: normal 11px Verdana;z-index:99999;
		}

	</style>
    </head>
    <!--/ END Head -->
    <body data-page="form-wizard">
    	<div class="loader_outr" id="ajaxLoadingDiv">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/greenloader.gif" />
        </div>
        <!-- START Template Header -->
        <?php  $this->Widget('WidgetDashboardTop'); ?>
        <!--/ END Template Header -->

        <!-- START Template Sidebar (Left) -->
         <?php  $this->Widget('WidgetDashboardMenu'); ?>

        <!--/ END Template Sidebar (Left) -->

        <!-- START Template Main -->
        <section id="main" role="main" class="left_panel">
        <?php echo $content;?>
        <!-- START To Top Scroller -->
            <a href="#" class="totop animation" data-toggle="waypoints totop" data-marker="#main" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="-50%"><i class="ico-angle-up"></i></a>
            <!--/ END To Top Scroller -->
        </section>
        <!--/ END Template Main -->

        <!-- START Template Sidebar (right) -->
        <aside class="sidebar sidebar-right">
            <!-- START Sidebar Content -->
            <section class="content slimscroll">
                <!-- START Sidebar Profile -->
                <!-- START Panel -->
                <div class="panel">
                    <!-- thumbnail -->
                    <div class="thumbnail">
                        <!-- media -->
                        <div class="media">
                            <!-- meta -->
                            <span class="meta text-center">
                                <h5 class="semibold mb0">Erich Reyes</h5>
                                <p class="nm"><i class="ico-user7 mr5"></i>Administrator</p>
                            </span>
                            <!-- meta -->
                            <!-- indicator -->
                            <div class="indicator"><span class="spinner"></span></div>
                            <!--/ indicator -->
                            <img data-toggle="unveil" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/background/400x250/placeholder.jpg" data-src="<?php echo Yii::app()->theme->baseUrl; ?>/image/background/400x250/background3.jpg" alt="Cover" width="100%">
                        </div>
                        <!--/ media -->
                    </div>
                    <!--/ thumbnail -->
                    <!-- panel body -->
                    <div class="panel-body" style="margin-top:-55px;z-index:2;">
                        <ul class="list-unstyled">
                            <li class="text-center">
                                <img class="img-circle" src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar7.jpg" alt="" width="75px" height="75px">
                                <br>
                                <!-- dropdown -->
                                <div class="btn-group mt10">
                                    <button type="button" class="btn btn-default"><span class="hasnotification hasnotification-success mr5"></span>Online</button>
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Away</a></li>
                                        <li><a href="#">Offline</a></li>
                                        <li><a href="#">Busy</a></li>
                                    </ul>
                                </div>
                                <!--/ dropdown -->
                            </li>
                        </ul>
                    </div>
                    <!--/ panel body -->
                </div>
                <!--/ END Panel -->
                <!--/ END Sidebar Profile -->

                <!-- START Sidebar contact -->
                <div class="media-list media-list-contact">
                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar1.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Autumn Barker</span>
                            <span class="media-meta ellipsis">Malaysia</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar2.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Giselle Horn</span>
                            <span class="media-meta ellipsis">Bolivia</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-danger mr5"></span> Austin Shields</span>
                            <span class="media-meta ellipsis">Timor-Leste</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-danger mr5"></span> Caryn Gibson</span>
                            <span class="media-meta ellipsis">Libya</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar3.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Nash Evans</span>
                            <span class="media-meta ellipsis">Honduras</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar4.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Josiah Johnson</span>
                            <span class="media-meta ellipsis">Belgium</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Philip Hewitt</span>
                            <span class="media-meta ellipsis">Bahrain</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar5.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-default mr5"></span> Wilma Hunt</span>
                            <span class="media-meta ellipsis">Dominica</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar6.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Noah Gill</span>
                            <span class="media-meta ellipsis">Guatemala</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar8.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> David Fisher</span>
                            <span class="media-meta ellipsis">French Guiana</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar9.jpg" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Samantha Avery</span>
                            <span class="media-meta ellipsis">Jersey</span>
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="media">
                        <span class="media-object pull-left">
                            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/image/avatar/avatar.png" class="img-circle" alt="">
                        </span>
                        <span class="media-body">
                            <span class="media-heading"><span class="hasnotification hasnotification-success mr5"></span> Madaline Medina</span>
                            <span class="media-meta ellipsis">Finland</span>
                        </span>
                    </a>
                </div>
                <!--/ END Sidebar contact -->
            </section>
            <!--/ END Sidebar Content -->
        </aside>
        <!--/ END Template Sidebar (right) -->

		<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Library script : mandatory -->

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-ui-touch.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/jquery/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/library/core/js/core.min.js"></script>
<!--/ Library script -->

<!-- 3rd party plugin script : optional(per use) -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/parsley/js/parsley.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/steps/js/jquery.steps.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/inputmask/js/inputmask.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/scroller.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/page.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/validate.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/filepicker.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/plugins/selectize/js/selectize.min.js"></script>

<!--         <script type="text/javascript" src="<?php //echo Yii::app()->theme->baseUrl; ?>/javascript/popover.js"></script>-->
<!--/ 3rd party plugin script -->
<!-- app init script -->
<script type="text/javascript">
function OpenFile(URL,height,width)
{
	var File = window.open(URL,"","toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width="+width+",height="+height+"");
}
function SaveToDisk(fileUrl, fileName) {
	console.log(navigator.appCodeName);
	var hyperlink = document.createElement('a');
	hyperlink.href = fileUrl;
	hyperlink.target = '_blank';
	hyperlink.download = fileName || fileUrl;

	var mouseEvent = new MouseEvent('click', {
		view: window,
		bubbles: true,
		cancelable: true
	});

	hyperlink.dispatchEvent(mouseEvent);
	(window.URL || window.webkitURL).revokeObjectURL(hyperlink.href);
}
(function($){
	$("html").Core({ "console": false });
	$('.client_dashboard_scoller').enscroll({
		showOnHover: true,
		verticalTrackClass: 'track3',
		verticalHandleClass: 'handle3'
	});

	$('#scrollbox6').enscroll({
		showOnHover: true,
		verticalTrackClass: 'track3',
		verticalHandleClass: 'handle3'
	});
	$('#scrollbox7').enscroll({
		showOnHover: true,
		verticalTrackClass: 'track3',
		verticalHandleClass: 'handle3'
	});
	$('#scrollbox8').enscroll({
		showOnHover: true,
		verticalTrackClass: 'track3',
		verticalHandleClass: 'handle3'
	});
	})(jQuery);

var errordialog=function(msg, url, linenumber){
	var dialog=document.createElement("div")
	dialog.className='errordialog hide'
	dialog.innerHTML='&nbsp;<b style="color:red">JavaScript Error: </b>' + msg +' at line number ' + linenumber +'. Please inform Venturepact.'
	document.body.appendChild(dialog);
	return true;
}

$(document).ready(function(){

	//New code added to scroll the div on the top
	$("#main").scrollTop(0);

	//Code to say no data found for category of rfp
	$("#components li,#faq li a").click(function(e){
        $("[data-target^=#p_]").parent().parent().find("li").removeClass("active2")
		if(e.isDefaultPrevented())
			e.preventDefault()
		var el = $(this);
		//console.log("outer li " + el.html() + " /" +e.isDefaultPrevented() );
		$("#components li,#faq li").each(function(){
			$(this).removeClass("activeLink");
		});
		el.addClass("activeLink");
	});

	$("#rfps li").click(function(e){
			e.preventDefault();
			var el = $(this);
			//console.log("outer li " + el.html());
			$("#rfps li").each(function(){
				$(this).removeClass("active");
			});
			el.addClass("active");
			el.parent().parent().addClass("active");
		});
		/*$("#rfps li [id^=project] li").click(function(e){
			var el = $(this);
			//console.log("inner li " + el.html());
			$("#rfps li [id^=project] li").each(function(){
				$(this).removeClass("active");
			});
			$("#rfps li [id^=project] li").first().addClass("active");
		});*/

		$("[data-target^=#p_]").click(function(e){
            e.preventDefault();
            var el = $(this);
            var elclass= el.parent().attr("class") ;
            console.log(elclass);
            el.parent().parent().find("li").removeClass("active2");
            el.parent().addClass("active2");
            if(elclass=="")
                el.parent().addClass("active2");
        });
        $("[id^=p_] a").on('click',function(){
            $("[id^=p_] a").parent().removeClass("active2");
            $(this).parent().addClass("active2") ;

        });

});

function notificationRead(){
	$.ajax({
		type:'POST',
		url:"<?php echo CController::createUrl("/site/notifictaion");?>",
		success:function(data){
			$('.hasnotification').removeClass('hasnotification');
		}
	});
	$( "#ajaxLoadingDiv" ).hide();
}

$( document ).ajaxStart(function() {
	$( "#ajaxLoadingDiv" ).show();
});
$( document ).ajaxStop(function() {
	$( "#ajaxLoadingDiv" ).hide();
});

function hideNotification()
{
	console.log("hiding ");
	setTimeout(function() {
		$(".errordialog").hide('blind', {}, 500);
		$(".signup_error_container").hide('blind', {}, 500);
	});
}
$(document).unload(function(){
	$( "#ajaxLoadingDiv" ).show();
});
$(document).ready(function(){
	$( "#ajaxLoadingDiv" ).hide();
});
</script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/notification.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/jquery.magnific-popup.min.js" ></script>
        <script type="application/javascript">
        $(document).ready(function(){
            $("#main").magnificPopup({
            delegate: ".magnific",
            type: "image",
            gallery: {
                enabled: true
            }
        });
        });
        </script>

</body>
</html>
