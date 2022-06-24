<?php
require_once('../Php_Store_System/connection/storeClass.php');
$store->addUser();





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Add User</h2>
    <div class="form-container">
        <form method="post">
            <div class="input-container">
                <label for="">First Name</label>
                <input type="text" name="fname" required>
                <label for="">Last Name</label>
                <input type="text" name="lname" required>
                <label for="">Email</label>
                <input type="email" name="email" required>
                <label for="">Access</label>
                <select name="access" id="" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <label for="">Password</label>
                <input type="password" name="password" id="" required>
                <button type="submit" name="addUser">Add User</button>

            </div>
        </form>
    </div>


</body>
</html>