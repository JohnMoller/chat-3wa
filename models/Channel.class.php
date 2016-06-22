<?php
class Channel
{
	private $id;
	private $title;
	private $description;
	private $date;

	private $messages;

	public function __construct($link)
	{
		$this->link = $link;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function getDate()
	{
		return $this->date;
	}
	public function getIdUser()
	{
		return $this->id_user;
	}

	

	public function setTitle($title)
	{
		if (strlen($title) < 4)
			throw new Exception ("Titre trop court (< 4)");
		else if (strlen($title) > 64)
			throw new Exception ("Titre trop long (> 64)");
		$this->login = $title;
	}

	public function setDescription($description)
	{
		if (strlen($description) < 6)
			throw new Exception ("Description trop court (< 6)");
		else if (strlen($description) > 511)
			throw new Exception ("Description trop long (> 511)");
		$this->description = $description;
	}

	public function setIdUser()
	{
		$this->id_user = $_SESSION['id'];
	}

	public function getMessages()
	{
		if ($this->messages === null)
		{
			$messageManager = new MessageManager($this->link);
			$this->messages = $messageManager->findByChannel($this);
		}
		return $this->messages;
	}

}
?>