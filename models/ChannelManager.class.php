<?php
class ChannelManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}
	
	public function findAll()
	{
		$list = [];
		$request = "SELECT * FROM channel ORDER BY id DESC";
		$res = mysqli_query($this->link, $request);
		while ($channel = mysqli_fetch_object($res, "Channel", [$this->link]))
			$list[] = $channel;
		return $list;
	}

	public function findById($id)
	{
		$id = intval($id);
		$request = "SELECT * FROM channel WHERE id=".$id;
		$res = mysqli_query($this->link, $request);
		$channel = mysqli_fetch_object($res, "Channel", [$this->link]);
		return $channel;
	}



	public function create($data)
	{
		if (!isset($_SESSION['id']))
			throw new Exception ("Vous devez être identifié");

		if (!isset($data['title']))
			throw new Exception ("Missing paramater : title");

		if (!isset($data['description']))
			throw new Exception ("Missing paramater : description");

		$channel = new Channel($this->link);

		$channel->setTitle($data['title']);
		$channel->setDescription($data['description']);
		$channel->setIdUser();
		

		$title = mysqli_real_escape_string($this->link, $channel->getTitle());
		$description = mysqli_real_escape_string($this->link, $channel->getDescription());
		$id_user = $channel->getIdUser();

		$request = "INSERT INTO channel (title, description, id_user) VALUES('".$title."','".$description."','".$id_user."')";
		$res = mysqli_query($this->link, $request);
		if ($res)
		{
			$id = mysqli_insert_id($this->link);
			if ($id)
			{
				return $channel;
			}
			else
				throw new Exception ("Internal server error");
		}
		else
			throw new Exception ("Internal server error");
		
	}

	

}
?>