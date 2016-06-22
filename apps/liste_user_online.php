<?php
$i=0;
$users_online = $user_manager->online();
$max_users_online = sizeof($users_online);
while ($i < $max_users_online)
{
	$user_online = $users_online[$i];
	require('views/liste_user_online.phtml');
	$i++;
}
?>