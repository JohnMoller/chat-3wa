$('document').ready(function()
{
	$('form').submit(function(info)
	{
		info.preventDefault();
		var contenu = $("#contenu").val();
		$.post('index.php?page=message', {"contenu":contenu,"action":"create"}, function()
		{
			$("#contenu").val("").focus();
		});
		return false;
	});
	setInterval(function()
	{
		$('#liste_messages').load('index.php?page=liste_messages&ajax');
	}, 1000);
});