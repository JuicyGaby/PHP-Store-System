<?php
require_once('../Php_Store_System/connection/storeClass.php');
$store->login();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
</head>
<body>
    <h2>Gaby's Store Login</h2>
    <div class="form-container">
        <form method="post">
            <label for="">Email</label>
            <input type="text" name="email" placeholder="Email" required>
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="submit">Login</button>
        </form>

    <div class="form-container"></div>
</body>
</html>