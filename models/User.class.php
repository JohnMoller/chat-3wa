<?php
class User
{
	private $id;
	private $login;
	private $password;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getLogin()
	{
		return $this->login;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setLogin($login)
	{
		if (strlen($login) < 4)
			throw new Exception ("Login trop court (< 4)");
		else if (strlen($login) > 15)
			throw new Exception ("Login trop long (> 15)");
		$this->login = $login;
	}

	public function setPassword($password)
	{
		if (strlen($password) < 4)
			throw new Exception ("Mot de passe trop court (< 4)");
		else if (strlen($password) > 255)
			throw new Exception ("Mot de passe trop long (> 255)");
		$password = password_hash($password, PASSWORD_BCRYPT, array("cost"=>8));
		$this->password = $password;
	}
}
?>