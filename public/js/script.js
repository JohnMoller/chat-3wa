$('document').ready(function()
{
	$('form').submit(function(info)
	{
		info.preventDefault();
		$.post('index.php?page=message', {message:""}, function()
		{

		});
		return false;
	});
	setInterval(function()
	{
		$('#liste_messages').load('index.php?page=liste_messages&ajax');
	}, 1000);
});