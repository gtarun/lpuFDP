<script src="http://html2canvas.hertzen.com/build/html2canvas.js"></script>
<!-- START Template Container -->
<section class="container-fluid">
    <!-- Page header -->
    <div class="page-header page-header-block">
        <div class="page-header-section">
            <h4 class="title semibold">Attempt Test</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8 col-lg-offset-2">
            <div class="panel panel-default">
                <!-- panel heading/header -->
                <div class="panel-heading">
                    <h3 class="panel-title">Certificate</h3>
                </div>
                <!--/ panel heading/header -->
                <!-- panel body -->
                <div class="panel-body" >
                    <?php $html=$this->renderPartial("_temp1",array("users"=>yii::app()->user->profile)); ?>
                    <?php //$html=$this->renderPartial("_temp2",array("users"=>yii::app()->user->profile)); ?>
                    <?php echo $html; ?>

                </div>
                <div class="panel-body" id="certi_view"></div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary">Downlaod</button>

                </div>
            </div>

        </div>



    </div>
    </div>
    <!--/ Page header -->

    <!-- START YOUR CONTENT -->
</section>
<!--/ END Template Container -->
<script type="application/javascript">
    $(document).ready(function() {
        html2canvas([document.getElementById('cert')], {
            onrendered: function(canvas) {
                //document.getElementById('certi_view').innerHTML = canvas;
                $("#certi_view").html(canvas);
                $("#cert").hide();
                var data = canvas.toDataURL('image/png');
                console.log(data);
                // AJAX call to send `data` to a PHP file that creates an image from the dataURI string and saves it to a directory on the server
            }
        });
    });
</script>
