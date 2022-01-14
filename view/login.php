<?php

require "../model/database.php";

echo("exemple de mise à jour en passant par l'interface VSCode");
print_r($_POST);

if (!empty($_POST)) {
	database::connexionsite($_POST['Mail'], $_POST['Mail']);
}