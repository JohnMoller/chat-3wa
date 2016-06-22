<?php
if (isset($_GET['channel']))
{
	$id = $_GET['channel'];
	$manager = new ChannelManager($link);
	$channel = $manager->findById($id);

	$messages = $channel->getMessages();

	$count = 0;
	$max = sizeof($messages);

	while ($count < $max)
	{
		$message = $messages[$count];
		$user = $message->getUser($message->getIdUser());
		require('views/message_fiche.phtml');

		$count++;
	}
}

?>
