<?php
class UserManager
{
	private $link;
	public function __construct($link)
	{
		$this->link = $link;
	}


	public function findById($id)
	{
		$id = intval($id);
		$request = "SELECT * FROM user WHERE id=".$id;
		$res = mysqli_query($this->link, $request);
		$user = mysqli_fetch_object($res, "User", [$this->link]);
		return $user;
	}
	
	

	public function verifVariables($data)
	{
	if (!isset($data['email']))
		throw new Exception ("Missing paramater : email");
	if (!isset($data['login']))
		throw new Exception ("Missing paramater : login");
	if (!isset($data['password1']))
		throw new Exception ("Missing paramater : password1");
	if (!isset($data['password2']))
		throw new Exception ("Missing paramater : password2");
	if ($data['password1'] != $data['password2'])
		throw new Exception ("les passwords ne correspondent pas");
	if (!isset($data['prenom']))
		throw new Exception ("Missing paramater : prenom");
	if (!isset($data['nom']))
		throw new Exception ("Missing paramater : nom");
	if (!isset($data['sexe']))
		throw new Exception ("Missing paramater : sexe");
	if (!isset($data['date_naissance']))
		throw new Exception ("Missing paramater : date_naissance");
	}

	public function create($data)
	{
		$user = new User($this->link);
		
		if (!isset($data['login']))
			throw new Exception ("Missing paramater : login");
		if (!isset($data['password1']))
			throw new Exception ("Missing paramater : password1");
		if (!isset($data['password2']))
			throw new Exception ("Missing paramater : password2");
		if ($data['password1'] != $data['password2'])
			throw new Exception ("les passwords ne correspondent pas");


		$user->setLogin($data['login']);
		$user->setPassword($data['password1']);
	
		$login = mysqli_real_escape_string($this->link, $user->getLogin());
		$password = $user->getPassword();
		
		$request = "INSERT INTO user (login, password) VALUES('".$login."', '".$password."')";
		$res = mysqli_query($this->link, $request);
		if ($res)
		{
			$id = mysqli_insert_id($this->link);
			if ($id)
			{
				$user = $this->findById($id);
				return $user;
			}
			else
				throw new Exception ("Internal server error");
		}
		else
			throw new Exception ("Internal server error");
	}

	public function getById($id)
	{
		return $this->findById($id);
	}

	

	public function login($data)
	{
		if (!isset($data['login']) || empty($data['login']))
			throw new Exception ("Missing paramater : login");
		if (!isset($data['password']) || empty($data['password']))
			throw new Exception ("Missing paramater : password");

		$login = mysqli_real_escape_string($this->link, $data['login']);
		$password = mysqli_real_escape_string($this->link, $data['password']);
		$request = "SELECT * FROM user WHERE login='".$login."' AND actif=1 LIMIT 1";
		$res = mysqli_query($this->link, $request);
		$user = mysqli_fetch_object($res, "User", [$this->link]);
		if ($user)
		{
			$verif_password = $user->verifyPassword($password);
			if ($verif_password)
			{
				$_SESSION['id'] = $user->getID();
				$_SESSION['login'] = $user->getLogin();

				return $user;
			}
			else
				throw new Exception("Incorrect password");
		}
		else
			throw new Exception("User not found");
	}

	
}
?>