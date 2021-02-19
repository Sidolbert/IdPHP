<?php

require "../model/database.php";

echo("test");
print_r($_POST);

if (!empty($_POST)) {
	database::connexionsite($_POST['Mail'], $_POST['Mail']);
}