<?php

if (isset($_SESSION['id'])) {

$user_manager = new UserManager($link);
$user = $user_manager->findById($_SESSION['id']);
$user_manager->update_connexion($user);

require('views/liste_users_online.phtml');

}


?>