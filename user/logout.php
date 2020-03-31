<?php

include '../config/database.php';
$db = $conn;

include_once "../objects/cart_item.php";
include_once "../objects/user.php";


$cart_item = new CartItem($db);
$user = new User($db);

session_destroy();

var_dump($_SESSION);

$page_title = '';

include '../misc/layout_head.php';

include '../misc/layout_foot.php'; ?>