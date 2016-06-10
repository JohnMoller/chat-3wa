<?php
if (isset($_POST['action']))
{
	if ($_POST['action'] == 'create')
	{
		$manager = new UserManager($link);
		try
		{
			$user = $manager->create($_POST);
			header('Location: index.php');
			exit;
		}
		catch (Exception $exception)
		{
			$error = $exception->getMessage();
		}
	}

	if ($_POST['action'] == 'login')
	{
		$manager = new UserManager($link);
		try
		{
			$user = $manager->login($_POST);
			header('Location: index.php');
			exit;
		}
		catch (Exception $exception)
		{
			$error = $exception->getMessage();
		}
	}
}

if (isset($_GET['action']))
{
	if ($_GET['action'] == 'logout')
	{
		session_destroy();
		header('Location: index.php');
		exit;
	}
}

?>