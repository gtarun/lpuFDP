/**
* Notification chat
**/
var resource;
if (window.location.hostname == 'localhost')
{
    resource = "https://incandescent-fire-5373.firebaseio.com/chat";// local api
}
else
{
    resource = "https://venturepact.firebaseio.com/chat"; //server api
}

var chat_ref = new Firebase(resource);
var chat = new Firechat(chat_ref);

total_unread_count = 0; /*holds total unread messages*/

/*relative path to default image */
DEFAULT_IMAGE = 'uploads/client/small/avatar.png';

/*toggler ref*/
var title_toggle_inverval;

/*
* Function : notification
* ----------------------
* Purpose
*
* ------------------------
* Parameters:
* u : holds data of current login user
*/

var USER_ONLINE_TIME=new Date().getTime();
function offlineNotificationCount(u)
{
    console.log('offline notification , user');

    /*
        grab the current user's room
        firebase data location of user's room is : users/[userid]/rooms
    */
    chat_ref.child('users').child(u.auth.id).child('rooms').once('value', function (s)
    {
        rooms = s.val();
        /*
          user may not has any room
          if user has then proceed
        */
        if (rooms)
        {
            /*for each room */
            for (room in rooms)
            {
                //console.log('room ', room);
                /*
                    grab the offline time of user in each room
                    offline_time : rooms-users/[roomid]/userid/
                */

                chat_ref.child("room-users")
                        .child(room)
                        .child(u.auth.id)
                        .once('value', (function (room)
                        {
                            /*
                                js : closure
                                refs:
                                http://learn.jquery.com/javascript-101/closures/
                            */
                            return function (s)
                            {
                                //console.log(s.val());
                                ot = s.val().offline_time;

                                /*
                                    isUserActiveInRoom = s.val().active;
                                    because of ajax call at supplier pages :(
                                */

                                //ot=new Date(79,5,24).getTime();
                                //ot = 1400912193762;

                                if (ot)
                                {
                                    chat._messageRef.child(room)
                                                    .startAt(ot)
                                                    .endAt(USER_ONLINE_TIME)
                                                    .once('value',function(s){
                                                        var active_room=$('#chat-box').data('room');
                                                        console.log('active room : ',active_room);
                                                        console.log('room',room);
                                                        if(active_room!=room)
                                                        {
                                                            var total_offline_messages_in_room=s.numChildren();
                                                            var last_message;
                                                            for(m in s.val())
                                                            {
                                                                last_message=s.val()[m];
                                                            }
                                                            if(total_offline_messages_in_room)
                                                            {
                                                                    console.log('last : ',total_offline_messages_in_room,last_message);
                                                                    //other={id:1,pic:DEFAULT_IMAGE};

                                                                    chat_ref.child('room-metadata').child(room).once('value', function (s)
                                                                    {
                                                                        console.log('room-meta', room); // k
                                                                        /*for supplier*/
                                                                        var project_data = s.val().name.split('-'); /*holds project name*/
                                                                        if (window.location.href.indexOf('r=supplier') != -1)
                                                                        {
                                                                            other=project_data[3];

                                                                        }
                                                                        else
                                                                        {
                                                                            other=s.val().createdByUserId;
                                                                        }

                                                                        chat_ref.child('users/' + other).once('value', function (s1)
                                                                        {
                                                                            //notificationUI(p, r, s1.val(), m);
                                                                            other=s1.val();

                                                                             window.notification_objects[room] = $($.parseHTML('<a class="media border-dotted" href="" id="minfo' + room + '">'
                                                                                                         + '<span class="pull-left">'
                                                                                                         + '<img alt="'+other.name+'" class="media-object img-circle" src="'+other.pic+'">'
                                                                                                         + '</span>'
                                                                                                         + '<span class="media-body">'
                                                                                                         + '<span class="media-heading">'
                                                                                                         + 'Project : ' + project_data[2]
                                                                                                         + '<span class="label label-info pull-right" data-original-title="1 unread message" data-toggle="tooltip" data-placement="right" >'+total_offline_messages_in_room+'</span>'
                                                                                                         + '</span>'
                                                                                                         + '<span class="media-text ellipsis nm recent-mesg">' + last_message.message + '</span>'
                                                                                                         + '</span>'
                                                                                                         + '<span class ="message-time media-meta pull-right">' + new Date(last_message.timestamp).toLocaleString() + '</span>'
                                                                                                         + '</a>', document, false));

                                                                                                        //console.log('element :',ele, ele.get());
                                                                                                        console.log('in ui', window.notification_objects);
                                                                                                        $('#chatmessages').append(window.notification_objects[room]);

                                                                                                        /*to hide alert box*/
                                                                                                        $('#chatmessages > div').hide();
                                                                                                        total_unread_count+=total_offline_messages_in_room;
                                                                                                        leftNotificationCounter(room,total_offline_messages_in_room);
                                                                                                        projectNotificationCounter(room,total_offline_messages_in_room);
                                                                                                        if (total_unread_count > 0)
                                                                                                        {
                                                                                                            $icon = $('#chatmessages').parents('.dropdown-menu').siblings('a').find('span').eq(0);
                                                                                                            $icon.append('<span class="label label-info">' + total_unread_count + '</span>');
                                                                                                        }

                                                                        });//end of chat ref

                                                                    });//end of chat ref outer

                                                            }
                                                        }//end of if active room
                                    });//end of chat message ref

                                } //end of if ot
                            }

                        })(room));

            }/*for end*/
        }
    });
}

function leftNotificationCounter(room,count)
{
    console.log('left side');
    chat_ref.child('room-metadata').child(room).once('value', function (s)
    {
        var project_data = s.val().name.split('-'); /*index[1] : id , index[2]: name*/
        console.log(s.val(), project_data);


        /*supplier side*/
        $counter = $('.submenu a[data-target=#p_' + project_data[1] + ']').find('.projectmessagecount');
        console.log($counter);
        if ($counter.length)
        {
            $counter.html(count);
            $counter.attr('data-original-title',count + ' unread messages(s)');
        }

        /*client-side*/
        $c = $('.projectmessagecount[data-pid=' + project_data[1] + ']');
        if ($c.length)
        {
            $c.html(count);
        }

    });

}

function projectNotificationCounter(room,count)
{
    console.log('in project : ',room);
    /*there is project class*/
    if ($('.project').length)
    {
        /*three posibility may be there*/
        /*either it's client's index page or compare page or supplier index page*/

        /*for supplier's index page and client's compare page */

        var $counter = $('.project[data-room=' + room + ']').find('.msg2');

        if ($counter.length)
        {
            //console.log($counter);
            console.log('Either supplier index page or client compare page');
            $counter.html(count);
        }

        if ($('#number' + room).length)
        {
            /*client index page*/
            console.log('client index page');
            var $count = $('#number' + room);
            $count.val(count);
            sum = 0;
            var $project = $count.parents('.project');
            $project.find('.counter').each(function ()
            {
                sum += parseInt($(this).val());
            });

            var $counter = $project.find('.mes1');
            //$counter.html(parseInt($counter.html()) + 1);
            $counter.html(sum);
        }
    }
}



function notification(u)
{
    console.log('in notification , user', u);

    /*
		grab the current user's room
		firebase data location of user's room is : users/[userid]/rooms
	*/
    chat_ref.child('users').child(u.auth.id).child('rooms').once('value', function (s)
    {
        rooms = s.val();
        /*
		  user may not has any room
		  if user has then proceed
		*/
        if (rooms)
        {
            /*for each room */
            for (room in rooms)
            {

               /*message listener for each room*/
	            chat._messageRef.child(room)
    							.startAt(USER_ONLINE_TIME)
    							.on('child_added', notificationHandler(u, room));

            }/*for end*/
        }
    });
}

/*
* Function : notificationHandler
* -------------------------------
* it increases the counter at various places
* (
*   1. left panel (client,supplier),
*   2. proposal panel(client's index page + compare page,supplier index page)
* )
* whenever a new message is recieved. and also generates notification on top
*/
function notificationHandler(user, room)
{
    return function (s)
    {
        /*grab message*/
        var message = s.val();
        message.id = s.name();
        console.log('message-added:', s.val());

        /*grab user's state in same room from which message is recieved*/
        chat_ref.child('room-users/' + room + '/' + user.auth.id).once('value', (function(room)
        {
            return function (s1)
            {
                console.log('user active handler', user, room);
                isUserActiveInRoom = s1.val().active;
                console.log('user active : ', isUserActiveInRoom);
                /*if */
                if (!isUserActiveInRoom && message.userId != user.auth.id)
                {
                    /*increase unread counter*/
                    total_unread_count += 1;

                    /*generate notification*/
                    topMessageNotification(room, message);

                    /*increase counter*/
                    leftSideMessageCounter(room, message);
                    projectMessageCounter(room, message);
                }
                else
                    console.log('user is active in room');
            }
        })(room));
     }
}

function leftSideMessageCounter(room, message)
{
    console.log('left side');
    chat_ref.child('room-metadata').child(room).once('value', function (s)
    {
        var project_data = s.val().name.split('-'); /*index[1] : id , index[2]: name*/
        console.log(s.val(), project_data);


        /*supplier side*/
        $counter = $('.submenu a[data-target=#p_' + project_data[1] + ']').find('.projectmessagecount');
        console.log($counter);
        if ($counter.length)
        {
            $counter.html(parseInt($counter.html()) + 1);
            $counter.attr('data-original-title', $counter.html() + ' unread messages(s)');
        }

        /*client-side*/
        $c = $('.projectmessagecount[data-pid=' + project_data[1] + ']');
        if ($c.length)
        {
            $c.html(parseInt($c.html()) + 1);
        }

    });
}
function projectMessageCounter(room, message)
{
    console.log('in project : ',room);
    /*there is project class*/
    if ($('.project').length)
    {
        /*three posibility may be there*/
        /*either it's client's index page or compare page or supplier index page*/

        /*for supplier's index page and client's compare page */

        var $counter = $('.project[data-room=' + room + ']').find('.msg2');

        if ($counter.length)
        {
            console.log($counter);
            console.log('Either supplier index page or client compare page');
            $counter.html(parseInt($counter.html()) + 1);
        }

        if ($('#number' + room).length)
        {
            /*client index page*/
            console.log('client index page');
            var $count = $('#number' + room);
            $count.val(parseInt($count.val()) + 1);
            sum = 0;
            var $project = $count.parents('.project');
            $project.find('.counter').each(function ()
            {
                sum += parseInt($(this).val());
            });

            var $counter = $project.find('.mes1');
            //$counter.html(parseInt($counter.html()) + 1);
            $counter.html(sum);
        }
    }
}

//function UserMessages()
//{
//    this.Room;
//    this.MessageCount;
//    this.Message;
//    this.Description;
//}

//var roomarray = new Array();
//var myarray = new Array();

notification_objects = {};

function topMessageNotification(room, message)
{

    /*var m = new UserMessages();
    m.Room = room;
    m.MessageCount = 1;
    m.Message = message;
    myarray.push(m);

    */

    //console.log('top message notification', room, message); //room variation K
    //console.log('#minfo' + room)
    ////console.log(JSON.stringify(info));
    //console.log(info + '  with length ' + info.length + ' ' + $('#minfo' + room).length);

    if (window.notification_objects[room])
    {
        var number = window.notification_objects[room].find('.label');
        number.html(parseInt(number.html()) + 1);
        window.notification_objects[room].find('.recent-mesg').html(message.message);
        window.notification_objects[room].find('.time').html(new Date(message.timestamp).toLocaleString());

    }
    else
    {
        //roomarray.push(room);

        /*grab room data in other to */
        chat_ref.child('room-metadata').child(room).once('value', function (s)
        {
            console.log('room-meta', room, message); // k
            /*for supplier*/
            var project_data = s.val().name.split('-'); /*holds project name*/
            if (window.location.href.indexOf('r=supplier') != -1)
            {
                other=project_data[3];

            }
            else
            {
                other=s.val().createdByUserId;
            }

            chat_ref.child('users/' + other).once('value', (function (p, r, m)
            {
                return function (s1)
                {
                    notificationUI(p, r, s1.val(), m);
                }
            })(project_data[2], room, message));

        });


        /*to hide alert box*/
        $('#chatmessages > div').hide();
    }

    /*to update badge*/
    if (total_unread_count > 0)
    {
        $icon = $('#chatmessages').parents('.dropdown-menu').siblings('a').find('span').eq(0);
        $icon.append('<span class="label label-info">' + total_unread_count + '</span>');
    }

}
function notificationUI(project,room,other,message)
{
    window.notification_objects[room] = $($.parseHTML('<a class="media border-dotted" href="" id="minfo' + room + '">'
                                                         + '<span class="pull-left">'
                                                         + '<img alt="'+other.name+'" class="media-object img-circle" src="'+other.pic+'">'
                                                         + '</span>'
                                                         + '<span class="media-body">'
                                                         + '<span class="media-heading">'
                                                         + 'Project : ' + project
                                                         + '<span class="label label-info pull-right" data-original-title="1 unread message" data-toggle="tooltip" data-placement="right" >1</span>'
                                                         + '</span>'
                                                         + '<span class="media-text ellipsis nm recent-mesg">' + message.message + '</span>'
                                                         + '</span>'
                                                         + '<span class ="message-time media-meta pull-right">' + new Date(message.timestamp).toLocaleString() + '</span>'
                                                         + '</a>', document, false));

    //console.log('element :',ele, ele.get());
    console.log('in ui', window.notification_objects);
    $('#chatmessages').append(window.notification_objects[room]);
}

/*
* to authenticate user with firebase :
* token : holds user data  in encrypted form
*/
var ROOM;
function init()
{
    console.log('init called');
    chat_ref.auth(token, function (e, u)
    {

        if (e) /*if something went wrong*/
        {
            /*put */
            console.log('error');
            console.log(e);
        }
        else /*successful authenticated*/
        {
            console.log('authenticated', u);
            u.auth.pic = u.auth.pic ? u.auth.pic : DEFAULT_IMAGE;
            /*to make user online*/

            chat.setUser(u.auth.id, u.auth.name, u.auth.pic, function ()
            {
                console.log('user is online',u);
                offlineNotificationCount(u);
                /*real-time notification count*/
                notification(u);

                /*
                    as soon as ajax request get completed
                    check is there chat-box ?
                    if there load chat
                */

                /*
                    for client side chat (pitch) page
                    client side chat page is loaded normally

                */
                if ($('#chat-box').length)
                {
                    console.log('chatbox is here : calling chat');
                    console.log('first');
                    chatInit(u);

                }// end of chat box detect

                /*
                    for supplier side chat (rfp,pitch) pages
                    supplier chat side pages are loaded via ajax
                */
                console.log('ajax complete initialize');
                $(document).ajaxComplete(function ()
                {
                    console.log('ajax complete triggered');
                    /*if there is chat box  */
                    if ($('#chat-box').length)
                    {
                        console.log('page loaded via ajax');
                        console.log('chatbox is here : calling chat');
                        console.log('chat users : ', other, u);
                        var active_room=$('#chat-box').data('room');
                        console.log('active room : ',active_room);
                        if(active_room)
                        {
                            chat_ref.child('room-metadata').child(active_room).once('value', function (s)
                            {
                                var project_data = s.val().name.split('-'); /*holds project name*/
                                /*resetting counter*/
                                $counter = $('.submenu a[data-target=#p_' + project_data[1] + ']').find('.projectmessagecount');
                                var count=0;
                                if ($counter.length)
                                {
                                    count=parseInt($counter.html());
                                    $counter.html('0');
                                    $counter.attr('data-original-title', ' no unread messages(s)');

                                }

                                /*removing notification*/
                                $('#minfo'+active_room).remove();
                                console.log('active_room',active_room);

                                console.log('active_room',room);
                                /*redefining red ball on icon*/
                                $icon = $('#chatmessages').parents('.dropdown-menu').siblings('a').find('span').eq(0);
                                var diff=parseInt($icon.find('.label').html())-count;
                                if(diff>0)
                                {
                                    $icon.find('.label').html(diff);
                                }
                                else
                                {
                                    $icon.find('.label').remove();
                                }


                            });// end of chat_ref

                            if(ROOM && active_room!=ROOM)
                            {
                                chat_ref.child('users').child(u.auth.id).update({ 'offline_time': Firebase.ServerValue.TIMESTAMP });
                                chat_ref.child("room-users").child(ROOM).child(u.auth.id).update({ 'offline_time': Firebase.ServerValue.TIMESTAMP });
                                chat_ref.child("room-users").child(ROOM).child(u.auth.id).update({ "active": false });

                            }
                            ROOM=active_room;
                        }//end of of active room
                        console.log('second');
                        chatInit(u);

                        console.log('out of if');
                    }//end of chat box detect
                });//end of ajaxcomplete
            });
        }//end of successful authentication
    });
}
/*initialize script*/







/*
* Function : isWindowHidden()
* ---------------------------
* Purpose
* It checks whether window is active
* or not. If active returns false else true
* ----------------------------
* Returns
* boolean value
*/

function isWindowHidden()
{
    return document.hidden || document.webkitHidden || document.mozHidden || document.msHidden || false;
}

/*Dectect visibilty change event name
* Refs :
* https://developer.mozilla.org/en-US/docs/Web/Guide/User_experience/Using_the_Page_Visibility_API
* http://www.w3.org/TR/page-visibility/
*/
var PAGE_TITLE = document.title;
var VISIBILITY_CHANGE_EVENT
if (typeof document.hidden == "undefined")
{
    extension = ['ms', 'webkit', 'moz', 'o']
    for (i in extension)
    {
        if (typeof document[extension[i] + 'Hidden'] !== "undefined")
        {

            VISIBILITY_CHANGE_EVENT = extension[i] + 'visibilitychange';
            //console.log(VISIBILITY_CHANGE_EVENT);
            break;
        }
    }
}
else
{
    VISIBILITY_CHANGE_EVENT = 'visibilitychange';
}

document.addEventListener(VISIBILITY_CHANGE_EVENT, function ()
{
    /*if tab goes active*/
    console.log('visibilitychanged');
    if (!isWindowHidden())
    {
        console.log('tab is active');
        /*remove toggler*/
        if (title_toggle_inverval)
        {
            clearInterval(title_toggle_inverval);
        }
        document.title = PAGE_TITLE;
    }
});



/*
* Function: track(other)
* ----------------------
* Purpose
* It tracks the other user status as soon as it join  the room
* ----------------------
* Parameter
* other : a object(id,name) : to whom current login user is talking
*/

function track(other)
{
    var room = $('#chat-box').data('room');
    console.log(room);
    /*wait for client to enter room*/
    chat._firebase.child("room-users").child(room).on('value', function (s)
    {
        console.log(s.val());
        var id;
        for (k in s.val())
        {
            if (k == other.id)
            {
                otherUserStatusTracking(other);
                trackTyping(other);
                chat._firebase.child("room-users").child(room).off('value');
                break;
            }
        }
    });
}

/*
* Function offlineMessageCount
* --------------------
* Purpose
* To count how many messages current user
* has recieved for a particuler chat (room) during
* his or her offline time period
*/

function offlineMessagesCount(user)
{
    var room = $('#chat-box').data('room');
    var ot;
    /*grab user offline time */
    chat_ref.child("room-users")
            .child(room)
            .child(user.auth.id)
            .once('value', function (s)
            {
                ot = s.val().offline_time;
                if (ot)
                {
                    chat._messageRef.child(room)
                                    .startAt(ot)
                                    .endAt(new Date().getTime())
                                    .once('value', function (s)
                                    {
                                        if (s.numChildren() == 0)
                                        {
                                            $('#chat-box .badge').html('');
                                        }
                                        else
                                        {
                                            $('#chat-box .badge').html(s.numChildren());

                                            /*to pop out bubble after few secs*/
                                            setTimeout(function () { $('#chat-box .badge').html(''); }, 5000);
                                        }

                                    });
                }
            });
}

/*
* Function : setReadingFunctionality()
* ------------------------------------
* Purpose
* It displays message
*
*/
function setReadingFunctionality(user)
{
    console.log("inside reading");
    var room = $('#chat-box').data('room');

    /*do not put var before it*/
    last_message_id = '1';

    chat._messageRef.child(room).on('child_added', function (s)
    {
        console.log("child added");

        /*to avoid duplicate messages*/
        if (last_message_id != s.name())
        {
            var message_object = s.val();
            console.log('last-message : ', last_message_id);
            console.log('message-added : ', s.name());

            console.log(message_object);
            timestamp = new Date(message_object.timestamp);
            /*if it it current user*/
            if (user.auth.id == message_object.userId)
            {

                $('#chat-box .media-list').append('<li class="media media-right">'
                                                    + '<a href="javascript:void(0);" class="media-object">'
                                                    + '  <img src="' + chat._userPic + '" class="img-circle" alt="">'
                                                    + '</a>'
                                                    + '<div class="media-body">'
                                                    + '  <p class="media-text" title="' + timestamp.toTimeString() + '">' + message_object.message + '</p>'
                                                    + '  <span class="clearfix"></span>'
                                                    + '  <p class="media-meta">' + timestamp.toDateString() + '</p>'
                                                    + '<div>'
                                                   + '</li>');
            }
            else
            {

                $('#chat-box .media-list').append('<li class="media">'
                                                   + '<a href="javascript:void(0);" class="media-object">'
                                                   + '  <img src="' + (other.pic ? other.pic : 'themes/adminre/image/avatar/avatar.png') + '" class="img-circle" alt="">'
                                                   + '</a>'
                                                   + '<div class="media-body">'
                                                   + '  <p class="media-text" title="' + timestamp.toTimeString() + '">' + message_object.message + '</p>'
                                                   + '  <span class="clearfix"></span>'
                                                   + '  <p class="media-meta">' + timestamp.toDateString() + '</p>'
                                                   + '<div>'
                                                  + '</li>');
                console.log(other);
                playSound();
                toggleTitleOnMessage(message_object.name);
            }
            /*scroll down*/
            $('#chat-box .media-list').eq(0).scrollTop($('#chat-box .media-list')[0].scrollHeight);
            console.log("scroll height " + $('#chat-box .media-list')[0].scrollHeight);

        }

        last_message_id = s.name();
        console.log('lmi',last_message_id);
    });
}

function setWritingFunctionality(user)
{
    /* send button functionality */
    $('#chat-box').delegate(".send", "click", function (e)
    {
        /*grab content of message*/
        var $mb = $(this).parent().siblings();
        if ($mb.val() !== '')  /*if message is not empty*/
        {

            roomid = $('#chat-box').data("room");
            chat.sendMessage(roomid, $mb.val());
            $mb.val('');
            chat._firebase.child("room-users").child(roomid).child(user.auth.id).update({ '_typing': false });
        }

    });

    /*to handle chat-box functionality*/
    $('#chat-box').delegate(".message", "keypress", function (e)
    {

        var roomid = $('#chat-box').data("room");
        if (e.keyCode == 13) /*if enter is pressed*/
        {
            //take content & send it
            if ($(this).val() !== '')
            {

                chat.sendMessage(roomid, $(this).val());
                $(this).val('');
                chat._firebase.child("room-users").child(roomid).child(user.auth.id).update({ '_typing': false });
            }
        }
        else
        {
            chat._firebase.child("room-users").child(roomid).child(user.auth.id).update({ '_typing': true });
        }
    });
}

/*
* Function trackTyping
* --------------------
* Parameters
* other : a object(id,name)
* Purpose:
* To track whether other person is typing or not
*/
function trackTyping(other)
{
    console.log("type tracking");
    /*track typing status*/
    var room = $('#chat-box').data('room');

    chat._firebase.child('room-users/'+room+'/'+other.id).on('value', function (s)
    {
        if(s.val()._typing)
        {
            $('#chat-box .status>i').html(other.name + ' is typing..');
        }
        else
        {
            $('#chat-box .status>i').html('');
        }
    });
}

function otherUserStatusTracking(other)
{
    /* track supplier status : online or offline */
    chat._usersOnlineRef.child(other.id).on('value', function (s)
    {
        //start loader say connecting
        if (s.val() == null)// if suppplier went offline
        {
            /*set status*/
            $('#chat-box .status>i').html(other.name + ' is offline');

            /*set grey dot*/
            var $dot = $('#chat-box .panel-title>i')

            if ($dot.hasClass('text-success'))
            {
                $dot.removeClass('text-success');
            }

            $dot.addClass('text-default');
        }
        else /* if user went online*/
        {
            // hide loader say connected

            /*status*/
            $('#chat-box .status>i').html('');

            /*set green dot*/
            $('#chat-box .panel-title>i').removeClass('text-default')
                                           .addClass('text-success');
        }
    });
}

/*
* Function : toggleTitleOnMessage(name)
* ------------------------------------
* Purpose
* It toggles title on message recived
* for every 2 seconds.
*/

function toggleTitleOnMessage(name)
{
    console.log("in toggle");

    /*if tab is inactive*/
    if (isWindowHidden())
    {
        title_toggle_inverval = setInterval(function ()
        {
            /*toggle message*/
            document.title = document.title == PAGE_TITLE ? name + " messaged you" : PAGE_TITLE;
        }, 2000);
    }
}


/*
* Function : playSound()
* --------------------
* Purpose
* to play pop sound on message recieved.
*/
function playSound()
{
    /*
    * Source of pop sound
    * https://www.freesound.org/people/tmokonen/sounds/102740/
    */

    if (isWindowHidden())
    {
        $('#pop')[0].play(); /*html5 sound api*/
    }
}
$(document).ready(function ()
{
  init();
});
