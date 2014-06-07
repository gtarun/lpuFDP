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
    <table cellpadding="0" cellspacing="0" border="0" class="mail_set" style="background:#fff ; color:#333; padding:8px;">
	<!--<tr>
        <td >
			<a href="#" class="mail_logo" style="margin-bottom:10px;">
			<img src="<?php //echo "http://".Yii::app()->request->getServerName().Yii::app()->theme->baseUrl; ?>/image/vp-logo.png"/>
			</a>
		</td>
	</tr>-->
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
			Hey <?php echo $name; ?>,<br /><br />
		</td>
	</tr>
	<tr style="background-color:#fff;">
		<td  style="padding:10px">
            You have successfully submitted your Request for Proposal to VenturePact. I will go through the RFP once to make sure there is enough detail. Once everything is set, I will shortlist the right service providers for your needs and you will start receiving proposals within 24 hours. <br />

If you have any questions, feel free to reply to this email.<br />

		</td>
	</tr>

	<tr style="background-color:#fff;">
		<td  style="padding:10px">
            Regards,<br />
			Pratham Mittal<br />
			CoFounder at VenturePact<br />

		</td>
	</tr>
</table>
</div>
