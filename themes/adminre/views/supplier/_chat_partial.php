

    <div id="chat-box" class="table-layout" <?php echo (empty($project->chat_room_id)?'style="display:block"':"data-room=$project->chat_room_id"); ?>>
        <div class="col-lg-12 valign-top panel panel-default">
            <!-- panel heading -->
            <div class="panel-heading">
                <h5 class="panel-title">
                    <i class="ico-circle text-default mr5"></i>
                    <span class="name">
                        <?php echo $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name; ?></span>
                    <span class="badge pull-right"></span>
                </h5>
            </div>
            <!-- black screen  -->
            <div class="info col-sm-12 text-center <?php echo (empty($project->chat_room_id)?'':"hide"); ?>" >
                <a  class="btn btn-info clarification" style="margin-top:15px; margin-left:8px;<?php echo (!empty($project->chat_room_id)?'display:none': ''); ?>"  ><i class="ico-eye" ></i> Seek Clarification</a>

            </div>
            <!-- black screen  -->
            <div class="panel-body np" id="scrollbox7">
                <!-- message list -->
                <ul class="media-list media-list-bubble clearfix" id="chattingscroll"></ul>
                <!--/ message list -->
                <div class="status text-center text-default">
                    <i>
                        <?php echo $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name; ?> is offline</i>
                </div>
            </div>

            <div class="panel-footer border-none pt0">
                <!--write box-->
                <div class="panel-toolbar-wrapper">
                    <div class="panel-toolbar">
                        <div class="input-group" style="width:100%;">
                            <input type="text" class="form-control message" placeholder="Type your message">
                            <span class="input-group-btn">
                                <button class="btn btn-primary send" type="button">
                                    <i class="ico-paper-plane"></i>
                                    <span class="semibold">Send</span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <hr class="mt10 mb10">
                <!-- horizontal line -->

                <div class="panel-toolbar-wrapper">
                    <div class="panel-toolbar">
                        <div class="btn-group">
                           <!--  <button type="button" class="btn btn-default">
                                <i class="ico-facetime-video"></i>
                            </button>-->
                        </div>
                    </div>

                    <div class="panel-toolbar text-right">
                        <button class="btn btn-default" id="attachfileformessage">
                            <i class="ico-attachment"></i>Attach files</button>

                    </div>
                </div>
            </div>
            <!-- panel footer -->
        </div>
    </div>
<script type="text/javascript">

		var other = {
			id: "<?php echo $project->clientProjects->clientProfiles->users->id; ?>",
			name: "<?php echo $project->clientProjects->clientProfiles->first_name.' '.$project->clientProjects->clientProfiles->last_name; ?>"
		};
        var project={
            proposalId: "<?php echo $project->id; ?>",
            projectName: "<?php echo $project->clientProjects->name; ?>",
            roomurl : "<?php echo CController::createUrl('/supplier/ajaxChatHandler'); ?>"
        };
     //init();
    $(document).ready(function(){
     /*   $('.jumbotron').delegate('#btnsubmitproject','click',function()
        {
            console.log("#submit project clicked");
            console.log(u);
            var el= $(this);
            bootbox.confirm("Are you sure you want to submit this project?", function (result)
            {
            	if(result)
            	{
             		console.log("ye chla ");
                		$('#chat-box .info').hide();

                   	return false;
                }
                            // callback
            });
            return false;
            event.preventDefault();

        }); */
    });
</script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/javascript/xchat.js"></script>
