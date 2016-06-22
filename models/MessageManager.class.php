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

	public function findByChannel(Channel $channel)
	{
		$list = [];
		$id_channel = $channel->getId();
		$request = "SELECT * FROM message WHERE id_channel='".$id_channel."' ORDER BY id DESC";
															
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
			throw new Exception ("Missing paramater : message");

		$message = new Message($this->link);

		$message->setContenu($data['contenu']);
		$id_channel = 1;
		$message->setIdUser();
		

		$contenu = mysqli_real_escape_string($this->link, $message->getContenu());
		$id_user = $message->getIdUser();

		$request = "INSERT INTO message (contenu, id_user, id_channel) VALUES('".$contenu."','".$id_user."','".$id_channel."')";

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