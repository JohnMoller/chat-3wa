<?php
if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$manager = new CategoryManager($link);
	$category = $manager->findById($id);

	$messages = $category->getMessages();

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
