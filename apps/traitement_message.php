<?php
if (isset($_SESSION['id']))
{
	if  (isset($_POST['action']) && ($_POST['action'] == 'create'))
	{
		$manager = new MessageManager($link);
			try
			{
				$message = $manager->create($_POST);
				header('Location: home');
				exit;
			}
			catch (Exception $exception)
			{
				$error = $exception->getMessage();
			}
		
	} 
}
?>
