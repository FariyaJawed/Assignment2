<?php include_once("./header.php") ?>
<?php !isset($_SESSION['user_id']) ? header('location:http://localhost/p2c4/Assignment2/login.php'): '' ?>

<?php
 $query = "SELECT * from users where id = {$_SESSION['user_id']}";
 $result = mysqli_query($link,$query);
 var_dump(mysqli_fetch_assoc($result));
?>
<?php include_once("./footer.php") ?> 