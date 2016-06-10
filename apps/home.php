<?php
require('views/form_message.phtml');
$manager = new MessageManager($link);

$messages = $manager->findAll();
if (!$messages)
	require('views/home_vide.phtml');
else
{
	$count = 0;
	$max = sizeof($messages);
	while ($count < $max)
	{
		$message = $messages[$count];
		require('views/home.phtml');

		$count++;
	}
}
?>