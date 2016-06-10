<?php
$manager = new MessageManager($link);

$messages = $manager->findAll();
$count = 0;
$max = sizeof($messages);
while ($count < $max)
{
	$message = $messages[$count];
	require('views/home.phtml');

	$count++;
}
?>