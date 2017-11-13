<?php

require __DIR__.'/models/User.php';

session_start();

$connected_user = null;

if (isset($_SESSION['user_id'])) {
    $connected_user = User::read($_SESSION['user_id']);
}

