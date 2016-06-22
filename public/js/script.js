function GetURLParameter(sParam)
{
	var sPageURL = window.location.search.substring(1);
	var sURLVariables = sPageURL.split('&');
	for (var i = 0; i < sURLVariables.length; i++)
	{
		var sParameterName = sURLVariables[i].split('=');
		if (sParameterName[0] == sParam)
		{
			return sParameterName[1];
		}
	}
}
var channel = GetURLParameter('channel');

$('document').ready(function()
{
	$('#createmessage').submit(function(info)
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
		$('#liste_messages').load('index.php?page=liste_messages&ajax&channel='+channel);
		$('#liste_online_users').load('index.php?page=liste_users_online&ajax');
	}, 1000);
});