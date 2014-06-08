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
                    <?php $form=$this->beginWidget('CActiveForm', array('id'=>'questions-list', 'enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true,),'htmlOptions'=>array('enctype' => 'multipart/form-data','class'=>"panel panel-default form-horizontal form-bordered",'data-parsley-validate'=>'data-parsley-validate'))); ?>
                        <div class="panel-group panel-group-compact" id="accordion3">
                            <?php if(!empty($questions)){ ?>
                            <?php foreach($questions as $q){ ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion2" href="#c<?php echo $q->id; ?>" class="">
                                            <span class="plus mr5"></span> <?php echo $q->question; ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="c<?php echo $q->id; ?>" class="panel-collapse collapse in" >
                                    <div class="panel-body">
                                        <?php echo $q->description; ?>
                                        <hr>
                                        <?php $aCount=0; ?>
                                        <?php foreach($q->answers as $a){ ?>
                                        <span class="radio custom-radio custom-radio-primary pt15">
                                            <input type="radio" id="customradio<?php echo $a->id; ?>" value="<?php echo $a->id; ?>" name="UsersAnswer[<?php echo $q->id; ?>]" <?php echo ($aCount==0?'required':'');$aCount++ ?> />
                                            <label for="customradio<?php echo $a->id; ?>">&nbsp;&nbsp;<?php echo $a->answer; ?></label>
                                        </span>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>
                            <?php } ?>
                        </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-inverse">Reset</button>
                    </div>
                    <?php $this->endWidget(); ?>
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
                    <div class="toolbar">

                    <?php if(!empty($questions)){ ?>
                            <?php foreach($questions as $q){ ?>
                         <a href="#" class="btn btn-default" id="q_<?php echo $q->id; ?>" title="love this collection"><?php echo $q->id ;?><i class=""></i></a>

                            <?php } ?>
                    <?php } ?>
                        </div>
                </div>
            </div>



        </div>
    </div>
    <!--/ Page header -->

    <!-- START YOUR CONTENT -->
</section>
<!--/ END Template Container -->

