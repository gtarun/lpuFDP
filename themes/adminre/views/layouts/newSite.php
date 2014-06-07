<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/favicon.png">
<title>VenturePact</title>
<!-- Bootstrap core CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/css/settings.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/google-code-prettify/prettify.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.2" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/css/color/blue.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/type/fontello.css" rel="stylesheet">
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/type/picons.css" rel="stylesheet">
<!-- CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/main/css/index.css" type="text/css" rel="stylesheet"/>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="style/js/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/main/css/simpletextrotator.css" />
</head>
<body class="onepage full-layout">
<div class="body-wrapper">
  <div class="yamm navbar basic default">
    <div class="navbar-header">
      <div class="container">
        <div class="basic-wrapper" style="float: left; padding-top: 30px; width: 300px;"> <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i class='icon-menu-1'></i></a>

        <?php echo CHtml::link('<img src="'.Yii::app()->theme->baseUrl.'/main/style/images/logo.png" data-at2x="style/images/logo@2x.png" alt="" />', array('/site/index'));?>
        <a class="navbar-brand" href="index.html"></a> </div>
        <div class="collapse navbar-collapse pull-right">
           <ul class="nav navbar-nav">
              <li><?php echo CHtml::link('Home', array('/site/index'));?></li>
              <li><?php echo CHtml::link('About', array('/site/about'));?></li>
              <li><?php echo CHtml::link('FAQ', array('/site/faq'));?></li>
              <li><a href="#">Blog</a></li>
              <li><?php echo CHtml::link('Contact', array('/site/contact'));?></li>
            </ul>
        </div>
      </div>
    </div>
    <!--/.nav-collapse -->
  </div>
  <!--/.navbar -->
  <div class="offset"></div>
  <?php echo $content;?>
  <footer class="black-wrapper">
    <div class="container inner">
      <div class="row">
        <div class="col-sm-4">
          <div class="widget"> <img src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logo.png" data-at2x="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/images/logo@2x.png" alt="" />
            <div class="divide20"></div>
            <p>VenturePact is an online marketplace that connects businesses with pre-screened software development firms.</p>
            <p>The marketplace provides a transparent platform where companies can get customized pitches, see a firm’s ratings, inspect a verified portfolio, get their standard FAQs answered and make secure payments</p>
            <div class="divide5"></div>
            <ul class="social">
              <li><a href="#"><i class="icon-s-rss"></i></a></li>
              <li><a href="#"><i class="icon-s-twitter"></i></a></li>
              <li><a href="#"><i class="icon-s-facebook"></i></a></li>
              <li><a href="#"><i class="icon-s-pinterest"></i></a></li>
              <li><a href="#"><i class="icon-s-linkedin"></i></a></li>
            </ul>
          </div>
          <!-- /.widget -->
        </div>
        <!-- /col -->

        <div class="col-sm-4">
          <div class="widget">
            <h3 class="section-title widget-title upper">Popular Posts</h3>
            <ul class="post-list">
              <li>
                <h6><a href="blog-post.html">Vivamus sagittis lacus vel augue metus</a></h6>
                <em>3th Oct 2012</em> </li>
              <li>
                <h6><a href="blog-post.html">Scelerisque nisl consectetur et</a></h6>
                <em>28th Sep 2012</em> </li>
              <li>
                <h6><a href="blog-post.html">Pellentesque ornare sem lacinia quam</a></h6>
                <em>15th Aug 2012</em> </li>
            </ul>
            <!-- /.post-list -->
          </div>
          <!-- /.widget -->
        </div>
        <!-- /col -->

        <div class="col-sm-4">
          <div class="widget">
            <h3 class="section-title widget-title upper">Get In Touch</h3>
            <p>Our offices are located in New York City & Philadelphia. Please contact us in case you would like to setup a in-person meeting or a call.</p>
            <div class="divide10"></div>
            <div class="contact-info"> <i class="icon-location"></i> WeWork, Fulton St. <br/>
              <i class="icon-phone"></i>+1 215 964 2332<br />
              <i class="icon-mail"></i> <a href="first.last@email.com">Questions@VenturePact.com</a> </div>
          </div>
        </div>
        <!-- /col -->


        <!-- /col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- .container -->

    <div class="sub-footer">
      <div class="container">
        <p class="pull-left">© 2014 Venturepact. All rights reserved.</p>
        <ul class="footer-menu pull-right">
          <li><?php echo CHtml::link('Home', array('/site/index'));?></li>
          <li><?php echo CHtml::link('About', array('/site/about'));?></li>
          <li><?php echo CHtml::link('FAQ', array('/site/faq'));?></li>
          <li><a href="#">Blog</a></li>
          <li><?php echo CHtml::link('Contact', array('/site/contact'));?></li>
        </ul>
      </div>
    </div>
  </footer>
  <!-- /footer -->

</div>
<!-- /.body-wrapper -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/twitter-bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.themepunch.plugins.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.2"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.0"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.isotope.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.easytabs.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/owl.carousel.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.fitvids.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.sticky.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/google-code-prettify/prettify.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/jquery.slickforms.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/retina.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/style/js/scripts.js"></script>

<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- JS -->
<!-- Jquery and Jquery migrate (for older plugins) -->
<!-- Jquery and Jquery migrate (for older plugins) -->
<!-- Jquery Portfolio gallery dependencies -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/jQuery.Opie.PortfolioGallery.min.js"></script>
<!-- Sequence plugin + dependencies -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/classie.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/modernizr.custom.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/jquery.sequence-min.js"></script>
<!-- Parallax slider plugin for reposive sliders -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/jquery.slider.min.js"></script>
<!-- Scroller plugins -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/cbpScroller.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/slider/niceScroll.js"></script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/hover.js"></script>
		<!-- All the plugins initialization script -->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/init.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/main/js/jquery.simple-text-rotator.js"></script>
<script>
	  $(document).ready(function(){
			$(".demo1 .rotate").textrotator({
		animation: "fade",
		speed: 1500
	  });
	  $(".demo2 .rotate").textrotator({
		animation: "flip",
		speed: 1250
	  });
	  $(".demo3 .rotate").textrotator({
		animation: "flipCube",
		speed: 1500
	  });
	  $(".demo4 .rotate").textrotator({
		animation: "flipUp",
		speed: 1750
	  });
	  $(".demo5 .rotate").textrotator({
		animation: "spin",
		speed: 2000
	  });
		});

</script>
<!-- begin olark code -->
<script data-cfasync="false" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('9619-816-10-5151');/*]]>*/</script><noscript><a href="https://www.olark.com/site/9619-816-10-5151/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
<!-- end olark code -->


</body>
</html>
