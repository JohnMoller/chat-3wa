<?php
if ($_SESSION['id'])
{
	if  (isset($_POST['action']) && ($_POST['action'] == 'create'))
	{
		$manager = new MessageManager($link);
			try
			{
				$message = $manager->create($_POST);
				header('Location: index.php?page=index');
				exit;
			}
			catch (Exception $exception)
			{
				$error = $exception->getMessage();
			}
		
	} 
}
?>
