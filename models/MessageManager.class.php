<?php
class MessageManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}
	
	public function findAll()
	{
		$list = [];
		$request = "SELECT * FROM message ORDER BY id DESC";
		$res = mysqli_query($this->link, $request);
		while ($message = mysqli_fetch_object($res, "Message", [$this->link]))
			$list[] = $message;
		return $list;
	}



	public function create($data)
	{
		if (!isset($_SESSION['id']))
			throw new Exception ("Vous devez être identifié");

		if (!isset($data['contenu']))
			throw new Exception ("Missing paramater : reference");

		$message = new Message($this->link);

		$message->setContenu($data['contenu']);
		$message->setIdUser();
		

		$contenu = mysqli_real_escape_string($this->link, $message->getContenu());
		$id_user = $message->getIdUser();

		$request = "INSERT INTO message (contenu, id_user) VALUES('".$contenu."','".$id_user."')";
		$res = mysqli_query($this->link, $request);
		if ($res)
		{
			$id = mysqli_insert_id($this->link);
			if ($id)
			{
				return $message;
			}
			else
				throw new Exception ("Internal server error");
		}
		else
			throw new Exception ("Internal server error");
		
	}

	

}
?>