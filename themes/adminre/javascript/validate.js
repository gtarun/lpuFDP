function testPhone(value){
	var regexp = /^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}$/;
	var re = new RegExp(regexp);
	return re.test(value);
}
function testNumber(value){
	var regexp = /^\d*\.?\d*$/;
	var re = new RegExp(regexp);
	return re.test(value);
}
function testEmail(value){
	var regexp = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i;
	var re = new RegExp(regexp);
	return re.test(value);
}

function testURL(value){
   var regexp=/^((https?|s?ftp):\/\/)?(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i;
	//var regexp	=	/((?:https?\:\/\/)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)/i;
	if(!$(this).hasClass('required')){
		var re = new RegExp(regexp);
		if(value=='')
			return true;
		else
			return re.test(value);
	}else{
		var re = new RegExp(regexp);
		return re.test(value);
	}
}
function testDate(value){
    var regexp=/^(([1-9]{1}\d{3}))-(([0]?\d{1})|([1][0,1,2]{1}))-(([0-2]?\d{1})|([3][0,1]{1}))$/;
	if(!$(this).hasClass('required')){
		var re = new RegExp(regexp);
		if(value=='')
			return true;
		else
			return re.test(value);
	}else{
		var re = new RegExp(regexp);
		return re.test(value);
	}
}
function testDataRange(dateFrom,dateTo){
    if(dateFrom == '' && dateTo == '' )
        return true;
	if(dateTo >= dateFrom){
		return true;
	}else
		return false;
}
function changeValidate($fieldId)
{
	var errorList	=	0;
	$('#'+$fieldId+' :input.required').each(function (){
		var elem	=	$(this);
		if(elem.hasClass('parsley-error')){
			if(elem.val()== null || elem.val().length==0){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter required field</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else if(elem.hasClass('minlength') &&  elem.val().length < parseInt(elem.attr('length'))){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter min '+elem.attr('length')+' characters.</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else if($(this).hasClass('email') && !testEmail($(this).val())){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter valid email address</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else if($(this).hasClass('url') && !testURL($(this).val())){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter valid url (www.example.com)</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else if($(this).hasClass('phone') && !testPhone($(this).val())){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter valid phone number</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else if($(this).hasClass('number') && !testNumber($(this).val())){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter number only(ex: 2 or 2.00)</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else if($(this).hasClass('to')){
				var dataFrom	=	$(this).parent().parent().parent().find('.from').val();
				var dataTo		=	$(this).val();
				if(parseInt(dataTo) <= parseInt(dataFrom)){
					elem.addClass('parsley-error');
					var ErrID	=	elem.attr('data-parsley-id')
					$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter valide range</li>');
					$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
					errorList	=	1;
				}
			}else{
				elem.removeClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-satn-'+ErrID).html('');
			}
		}

});

	$('#'+$fieldId+' :input.minlength').each(function (){
		var elem	=	$(this);
		if(elem.hasClass('parsley-error')){
			if( elem.val().length < parseInt(elem.attr('length'))){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter min '+elem.attr('length')+' characters</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else if($(this).hasClass('required') && $(this).val().length==0){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter required field</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else{
				elem.removeClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-satn-'+ErrID).html('');
			}
		}
	});

	$('#'+$fieldId+' :input.url').each(function (){
		var elem	=	$(this);
		if(elem.hasClass('parsley-error')){
		if(!testURL($(this).val())){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter valid url (www.example.com)</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
        }else if($(this).hasClass('required') && $(this).val().length==0){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter required field</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
		}else{
			elem.removeClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-satn-'+ErrID).html('');
		}
		}
	});
	$('#'+$fieldId+' :input.number').each(function (){
		var elem	=	$(this);
		if(elem.hasClass('parsley-error')){
			if(!testNumber($(this).val())){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter number only(ex: 2 or 2.00)</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else if($(this).hasClass('required') && $(this).val().length==0){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter required field</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else if($(this).hasClass('to') && $(this).val().length!=0){
				var dataFrom	=	$(this).parent().parent().parent().find('.from').val();
				var dataTo		=	$(this).val();
				if(parseInt(dataTo) <= parseInt(dataFrom)){
					elem.addClass('parsley-error');
					var ErrID	=	elem.attr('data-parsley-id')
					$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter valide range</li>');
					$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
					errorList	=	1;
				}
			}else{
				elem.removeClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-satn-'+ErrID).html('');
			}
		}
	});
	$('#'+$fieldId+' :input.to').each(function (){
	var elem	=	$(this);
	if(elem.hasClass('parsley-error')){
		var dataFrom	=	$(this).parent().parent().parent().find('.from').val();
		var dataTo		=	$(this).val();
		if(parseInt(dataTo) <= parseInt(dataFrom)){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter valide range</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
		}else{
			elem.removeClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-satn-'+ErrID).html('');
		}

		if($(this).hasClass('required') && $(this).val().length==0){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter required field</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
		}
		if($(this).hasClass('number') && !testNumber($(this).val())){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter number only(ex: 2 or 2.00)</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
        }
		}
	});
	return errorList;

}
function validate($fieldId){
	var errorList	=	0;
	$('#'+$fieldId+' :input.required').each(function (){
		var elem	=	$(this);
			if(elem.val()== null || elem.val().length==0){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter required field</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}
			else if(elem.hasClass('minlength') &&  elem.val().length < parseInt(elem.attr('length'))){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter min '+elem.attr('length')+' characters.</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}
			else if($(this).hasClass('email') && !testEmail($(this).val())){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter valid email address</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else if($(this).hasClass('url') && !testURL($(this).val())){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter valid url (www.example.com)</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else if($(this).hasClass('phone') && !testPhone($(this).val())){
				elem.addClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter valid phone number</li>');
				$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
				errorList	=	1;
			}else{
				elem.removeClass('parsley-error');
				var ErrID	=	elem.attr('data-parsley-id')
				$('#parsley-id-satn-'+ErrID).html('');
			}

	});

	$('#'+$fieldId+' :checkbox.require-one').each(function (){
		if($('.require-one:checked').size() == 0){
			$('#parsley-id-progress-224').html('<li>Please select required field</li>');
			$('#parsley-id-progress-224').addClass('filled');
			errorList	=	1;
		}else{
			$('#parsley-id-progress-224').removeClass('filled');
			$('#parsley-id-progress-224').html('');
		}
	});
	$('#'+$fieldId+' :input.url').each(function (){
		var elem	=	$(this);

		if(!testURL($(this).val())){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter valid url (www.example.com)</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
        }else if($(this).hasClass('required') && $(this).val().length==0){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter required field</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
		}else{
			elem.removeClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-satn-'+ErrID).html('');
		}
	});
	$('#'+$fieldId+' :input.number').each(function (){
		var elem	=	$(this);
		if(!testNumber($(this).val())){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter number only(ex: 2 or 2.00)</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
        }else if($(this).hasClass('required') && $(this).val().length==0){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter required field</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
		}else{
			elem.removeClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-satn-'+ErrID).html('');
		}
	});
	$('#'+$fieldId+' :input.minlength').each(function (){
		var elem	=	$(this);
		if( elem.val().length < parseInt(elem.attr('length'))){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter min '+elem.attr('length')+' characters</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
        }else if($(this).hasClass('required') && $(this).val().length==0){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter required field</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
		}else{
			elem.removeClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-satn-'+ErrID).html('');
		}
	});

	$('#'+$fieldId+' :input.to').each(function (){
		var elem	=	$(this);
		var dataFrom	=	$(this).parent().parent().parent().find('.from').val();
		var dataTo		=	$(this).val();
		if(parseInt(dataTo) <= parseInt(dataFrom)){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter valide range</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
		}else{
			elem.removeClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-satn-'+ErrID).html('');
		}

		if($(this).hasClass('required') && $(this).val().length==0){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter required field</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
		}
		if($(this).hasClass('number') && !testNumber($(this).val())){
			elem.addClass('parsley-error');
			var ErrID	=	elem.attr('data-parsley-id')
			$('#parsley-id-'+ErrID).html('<li id="parsley-id-satn-'+ErrID+'">Please enter number only(ex: 2 or 2.00)</li>');
			$('#parsley-id-'+ErrID).addClass('parsley-errors-list filled');
			errorList	=	1;
        }
	});
	return errorList;

}
function OpenFile(URL,height,width){
	var File = window.open(URL,"","toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width="+width+",height="+height+"");
}
function SaveToDisk(fileUrl, fileName) {
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
