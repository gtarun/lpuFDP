<style>
.grey{
	background-color:#999;
}
.mail_set{
	padding:30px 30px 50px 30px;
	width:635px;
	background:#ccc;
	border:1px solid #ebebeb;
	font-size:24px;
	font-weight:normal;
	color:#000;
	font-family: 'MyriadProRegular';
	margin-top:45px;
}
.mail_logo{
	background:#ccc;
}
.mail_logo img{
	width:100px;
	height:42px;
}
.mail_set span{
	color:#656565;
	font-style:italic;
}
</style>
<div class="grey">
    <table cellpadding="0" cellspacing="0" border="0" class="mail_set" style="background:#fff; color:#333; padding:8px;">
	<tr>
        <td >
			<a href="#" class="mail_logo" style="margin-bottom:10px;">
			<img src="<?php echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/image/vp-logo.png"/>
			</a>
		</td>
	</tr>

	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			Hey <?php echo $name; ?>,<br />
		</td>
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
            Thank you for recommending <?php echo $supplier; ?>. We appreciate your time. <br /><br />

We would also like to welcome you to the VenturePact marketplace. You can now find the top service providers and get vetted proposals for your projects. <br /><br />

You can log in to www.VenturePact.com using the following username and password.<br /><br />

Username: <?php echo $email;?><br />
Password: <?php echo $password;?><br /><br />

* Please change the password as soon as possible. <br /><br />

If you have any questions, please do not hesitate to reply to this email or schedule a call.
		</td>
	</tr>

	<tr style="background-color:#fff;">
		<td  style="padding:10px">



Regards,<br>
VenturePact team

		</td>
	</tr>
</table>
</div>
