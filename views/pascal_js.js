function updateDate()
{
	$('.date').each(function()
	{
		var time = moment($(this).data('time'), 'X');
		if (moment().isSame(time, 'day'))
			var str = time.format('HH:mm:ss');
		else
			var str = time.format('DD/MM/YYYY HH:mm:ss');
		$(this).html(str);
	});
}
function refresh()
{
	var last = $('.message').first().data('id');
	$.get('displayMessages?ajax&last='+last, function(html)
	{
		$('.js_msglist').prepend(html);
		updateDate();
	});
	$.get('displayUsers?ajax', function(html)
	{
		$('.js_userlist').html(html);
	});
}
$('document').ready(function()
{
	$('.context').each(function()
	{
		if ($(this).text().length == 0)
			$(this).remove();
		else
			$(this).show();
	});
	var heightMax = window.innerHeight;
	var top = 60;
	var bot = $('.footer').height();
	var height = heightMax - top - bot - 10;
	height -= 50;
	$('.js_height').css('height', height+'px');
	var modalContent = $('.modal').find('.modal-body').html();
	if (modalContent.length > 0)
	{
		$('.modal').on('hidden.bs.modal', function (e)
		{
			$('input').focus();
		});
		$('.modal').modal('show');
	}
	else
		$('.modal').remove();
	if ($('.js_input').length > 0)
	{
		moment.locale('fr');
		updateDate();
		$('.js_input').submit(function(e)
		{
			e.preventDefault();
			var value = $('input').val();
			$.post('tchat', {message:value,action:"create"}, function(data)
			{
				var test = $('.modal', data).find('.modal-body').html();
				if (test && test.length > 0)
					alert(test);
				else
				{
					refresh();
					$('input').val('').focus();
				}
			});
			return false;
		});
		setInterval(function()
		{
			refresh();
		}, 1000);
	}
});