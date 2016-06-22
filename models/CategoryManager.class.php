<?php
class CategoryManager
{
	private $link;

	public function __construct($link)
	{
		$this->link = $link;
	}
	
	public function findAll()
	{
		$list = [];
		$request = "SELECT * FROM category ORDER BY id DESC";
		$res = mysqli_query($this->link, $request);
		while ($category = mysqli_fetch_object($res, "Category", [$this->link]))
			$list[] = $category;
		return $list;
	}

	public function findById($id)
	{
		$id = intval($id);
		$request = "SELECT * FROM category WHERE id=".$id;
		$res = mysqli_query($this->link, $request);
		$category = mysqli_fetch_object($res, "Category", [$this->link]);
		return $category;
	}



	public function create($data)
	{
		if (!isset($_SESSION['id']))
			throw new Exception ("Vous devez être identifié");

		if (!isset($data['title']))
			throw new Exception ("Missing paramater : title");

		if (!isset($data['description']))
			throw new Exception ("Missing paramater : description");

		$category = new Category($this->link);

		$category->setTitle($data['title']);
		$category->setDescription($data['description']);
		$category->setIdUser();
		

		$title = mysqli_real_escape_string($this->link, $category->getTitle());
		$description = mysqli_real_escape_string($this->link, $category->getDescription());
		$id_user = $category->getIdUser();

		$request = "INSERT INTO category (title, description, id_user) VALUES('".$title."','".$description."','".$id_user."')";
		$res = mysqli_query($this->link, $request);
		if ($res)
		{
			$id = mysqli_insert_id($this->link);
			if ($id)
			{
				return $category;
			}
			else
				throw new Exception ("Internal server error");
		}
		else
			throw new Exception ("Internal server error");
		
	}

	

}
?>