<?php
include $_SERVER['DOCUMENT_ROOT'].'/project/lib/loade.php';
$name = $_POST['username'];
$pass = $_POST['password'];
$conn = database::getconnection(); 

$sql = "SELECT * FROM `sql` WHERE `username` = '$name' LIMIT 50";
echo $sql;
$result = $conn->query($sql);
if ($conn->query($sql)) {
    $row = $result->fetch_assoc();
    if ($row['password'] == $pass) {
        echo "suc";
    } else {
        echo "failed";
    }
} else {
    echo $conn->error;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
</head>
<body>

    <h2>Login</h2>

    <form action="" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

</body>
</html>
