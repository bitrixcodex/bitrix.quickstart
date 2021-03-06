$(document).ready(
		function()
		{
			setSectionsOneHeight();
			setikSelect();
			setMask();
		}
);
BX.addCustomEvent('onAjaxSuccess', function()
		{
			setSectionsOneHeight();
			setikSelect();
			setMask();
		}
);

function setSectionsOneHeight()
{
	if ($(".js_wrap_section").length) 
	{
		if ($('html').width() >= 751) 
		{
			height_section();
		}
	}
}

function setikSelect()
{
	if ($('.block_buyer').length)
	{
		$(function() 
		{
			if (!$.browser.safari) 
			{
				$('.block_buyer #ID_PROFILE_ID').ikSelect();
			}
		});
	}
}
function showPostForm()
{
	if ( $('.post-field').css('display') == 'none' )
	{
		$('.post-field').each(function(){
			if($(this).find('input').attr('value') == 'test-test')
			{
				$(this).find('input').attr('value','');
			}
			if($(this).find('textarea').html() == 'test-test')
			{
				$(this).find('textarea').html('');
			}
		});
		
	}
	else
	{
		$('.post-field').each(function(){
			if($(this).find('input').attr('value') == '')
			{
				$(this).find('input').attr('value','test-test');
			}
			if($(this).find('textarea').html() == '')
			{
				$(this).find('textarea').html('test-test');
			}
		});
	}
	$('.post-field').toggle();
	setSectionsOneHeight();
}

function setMask(obj)
{
	if(obj)
	{
		if($.trim(obj.val()) == '')
		{
			jQuery(obj).blur();
			var mask = $('#OrderPropMask').html();
			obj.mask(mask);
			jQuery(obj).focus();
		}
	}
	else
	{
		var mask = $('#OrderPropMask').html();
		$(".show-mask").each(
				function(){
					if($.trim($(this).val) == '')
					{
						$(this).mask(mask);
					}
				}
		);
	}
}

$(function()
{
	$(".show-mask").keyup(
		function()
		{
			var obj = $(this).closest('.wrap_field').find('.show-mask');
			setMask(obj);
		}).keyup();
});
