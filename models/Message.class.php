<?php
class Message
{
	private $id;
	private $contenu;
	private $date;
	private $id_user;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getContenu();
	{
		return $this->contenu;
	}
	public function getDate();
	{
		return $this->date;
	}

	public function getIdUser();
	{
		return $this->id_user;
	}

	public function setContenu($contenu)
	{
		if (strlen($contenu) < 5)
			throw new Exception("Contenu trop court (< 5)");
		else if (strlen($contenu) > 2047)
			throw new Exception("Contenu trop long (> 2047)");
		return $this->contenu = $contenu;
	}

	public function setIdUser()
	{
		$id_user = $_SESSION['id'];
		return $this->id_user;
	}
}
?>