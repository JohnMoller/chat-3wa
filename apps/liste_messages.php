<?php
$manager = new MessageManager($link);

$messages = $manager->findAll();
$count = 0;

$max = sizeof($messages);

while ($count < $max)
{
	$message = $messages[$count];
	$user = $message->getUser($message->getIdUser());
	require('views/message_fiche.phtml');

	$count++;
}

?>
