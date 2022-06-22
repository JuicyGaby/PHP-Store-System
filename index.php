<?php

require_once('../Php_Store_System/connection/storeClass.php');

$store = new MyStore();
$users = $store->getUsers();

print_r($users);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaby's Store</title>
</head>
<body>
    <h1>Hello World!!</h1>
</body>
</html>