<!-- START Template Container -->
<section class="container-fluid">
    <!-- Page header -->
    <div class="page-header page-header-block">
        <div class="page-header-section">
            <h4 class="title semibold">Attempt Test</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default">
                <!-- panel heading/header -->
                <div class="panel-heading">
                    <h3 class="panel-title">List Of Questions</h3>
                </div>
                <!--/ panel heading/header -->
                <!-- panel body -->
                <div class="panel-body">
                    <form class="form-horizontal form-bordered" action="">
                        <div class="panel-group panel-group-compact" id="accordion2">
                            <?php if(!empty($questions)){ ?>
                            <?php foreach($questions as $q){ ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne1" class="collapsed">
                                            <span class="plus mr5"></span> <?php echo $q->question; ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne1" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                        <?php echo $q->description; ?>
                                        <hr>
                                        <?php foreach($q->answers as $a){ ?>
                                        <span class="radio custom-radio custom-radio-primary pt15">
                                <input type="radio" id="customradio<?php echo $a->id; ?>" value="<?php echo $a->id; ?>" name="UsersAnswer[<?php echo $q->id; ?>]">
                                 <label for="customradio<?php echo $a->id; ?>">&nbsp;&nbsp;<?php echo $a->answer; ?></label>
                             </span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                            <?php } ?>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-inverse">Reset</button>
                </div>
            </div>

        </div>
        <div class="col-sm-4">
            <div class="panel panel-default">
                <!-- panel heading/header -->
                <div class="panel-heading">
                    <h3 class="panel-title">Progress</h3>
                </div>
                <!--/ panel heading/header -->
                <!-- panel body -->
                <div class="panel-body">
                </div>
            </div>



        </div>
    </div>
    <!--/ Page header -->

    <!-- START YOUR CONTENT -->
</section>
<!--/ END Template Container -->

