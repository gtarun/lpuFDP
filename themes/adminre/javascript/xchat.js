/*supplier chat script*/



/*images*/
// var user_image  =  $("#header").find(".avatar img").attr("src");
// var other_image = "http://test.venturepact.com/uploads/client/small/avatar.png"


/*Function: chatInit
* -----------------------
* Parameter:
* 1. token : a alphanumeric string : to authenticate current user to firebase system
* 2. other : object(id,name) : person whom supplier going to talk
* 3. roomurl : url : where to query about room information
* 4. purposalId :
* Purpose :Initiate chat functionlity
* Action:
* This is main function which authenticates user
* and makes him online and loads rest all functionality
*/

function chatInit(user)
{
    other.name = other.name.toLowerCase();


    chat_ref.child('users').child(other.id).on('value', function (s)
    {
        /*it may happen that client may not be in firebase system */
        console.log('pic listening')
        if (s.val())
        {
            other.pic = s.val().pic;
            chat_ref.child('users').child(other.id).off();
        }
    });


    console.log("inside chat : " , user);
    /*if room is there */

    if($('#chat-box').data('room'))
    {
        console.log('normal mode');

        $('.jumbotron').delegate('#btnsubmitproject','click',function()
        {
            console.log("#submit project clicked in seek clarification");
            console.log(user);
            var el= $(this);
            var boottext= "Are you sure you want to submit this project?";
            bootbox.confirm(boottext, function (result)
            {
	            if(result)
	            {
	               // console.log("ye chla ");
	                window.location.href=$('#btnsubmitproject').attr('href');
	                return false;
	            }
                    // callback
             });
            return false;
            event.preventDefault();
        });


        var room=$('#chat-box').data('room');

        console.log(room);

        /*on disconnect : offline time storage  */
        chat_ref.child('users').child(user.auth.id).onDisconnect().update({ 'offline_time': Firebase.ServerValue.TIMESTAMP });
        chat_ref.child("room-users").child(room).child(user.auth.id).onDisconnect().update({"offline_time":Firebase.ServerValue.TIMESTAMP});
        chat_ref.child("room-users").child(room).child(user.auth.id).onDisconnect().update({ "active": false });
        console.log('entering room');

        /*entering room*/
        chat.enterRoom(room);
        chat_ref.child("room-users").child(room).child(user.auth.id).update({ 'active': true });

        /*start functionality*/
        setWritingFunctionality(user);
        console.log("Done writing");
        setReadingFunctionality(user);

        /*offline messages*/
        offlineMessagesCount(user);

        /*track other user*/
        track(other);

        /*offline time record event*/

    }
    else
    {
        console.log("disabled mode");
        $('.jumbotron, #chat-box').delegate('.clarification','click',function()
        {
            console.log("#clarification clicked");
            console.log(user);
            var boottext = "Good to know that you're interested in the project. <strong>Best of Luck!</strong><br><p></p> In order to seek clarification from the client, please send a message using chat below.";
            bootbox.dialog({
                        message: boottext,
                        title: "Seek Clarification",
                        buttons: {

                             danger: {
                                label: "Cancel",
                                className: "btn-danger ",
                                callback: function () {

                                    // callback
                                }
                            },
                            success: {
                                label: "Got it!",
                                className: "btn-success",
                                callback: function () {
                                    /*on disconnect : offline time storage  */
					chat._userRef.onDisconnect().update({'offline_time':Firebase.ServerValue.TIMESTAMP});


					$('#chat-box .info').hide();
					createRoom(user);

					$('#chat-box').show();
					$('.clarification').prop('disabled','true');
                                    // callback
                                }
                            }

                        }
                    });


            return false;
        });

        $('.jumbotron').delegate('#btnsubmitproject','click',function()
        {
            console.log("#submit project clicked");
            //console.log(u);
            var el= $(this);
            bootbox.confirm("Are you sure you want to submit this project?", function (result)
            {
            	if(result)
            	{
             		console.log("submit project");

                	$('#chat-box .info').hide();
                	createRoom(user,1);

                   	return false;
                }
                            // callback
            });
            return false;
            event.preventDefault();

        });
    }//else
}


/*function createRoom
* ---------------------
* Parameter:
* other : a object(id,name) :  to whom current user will talk
* this function create private chat room and puts current login user & "other" user in created chat-box
*/



function createRoom(user,stat)
{
   stat = (typeof stat == 'undefined')? 0 : stat;

    chat.createRoom("vp-"+project.proposalId+'-'+project.projectName+'-'+other.id,"private",function(room)
    {
        console.log(project.roomurl);

        //set room
        $.ajax(
        {
            url:project.roomurl,
            type:'post',
            dataType:"json",
            data:"room="+room+"&proposalId="+project.proposalId+"&action=setroom&stat="+stat,
            success:function(d)
            {
                console.log("set room : "+ JSON.stringify(d));
                if(!d.iserror)
                {
                    if(d.success)
                    {
                        console.log('database updated');

                        /*
                            update other user time
                            Logic : other user (client) is offline from room since its creation
                        */
                        chat_ref.child("room-users").child(room).child(other.id).update({ 'offline_time': Firebase.ServerValue.TIMESTAMP });
                        chat_ref.child("room-users").child(room).child(other.id).update({ 'active': false });

                        /*update current user offline time event*/

                        chat_ref.child("room-users").child(room).child(user.auth.id).onDisconnect().update({ "offline_time": Firebase.ServerValue.TIMESTAMP });
                        chat_ref.child("room-users").child(room).child(user.auth.id).onDisconnect().update({ "active": false });

                        /*
                            put current user in newly created room
                            don't remove this piece of code.

                            purpose of this line to record user's offline time in newly created room

                        */

                        chat.enterRoom(room);

                        /*
                            active : to detect user in that room if true means user is there
                            false means user is not there

                        */

                        chat_ref.child("room-users").child(room).child(user.auth.id).update({ 'active': true });

                        /*redirect*/
                        if (stat)
                        {
                            window.location.href=$('#btnsubmitproject').attr('href');
                        }
                        else
                        {
                            console.log("new url");
                            var newurl = window.location.pathname + "?r=supplier/rfp&render=full&projectid="+project.proposalId+"&stat=1";
                            window.location.href = newurl ;

                        }

                    }
                }
                else
                {
                    /*Error Handler*/
                    /*Message: unable to create room Error*/
                    console.log("Server error ");
                    return false;
                }
            }
        });
    });
}








