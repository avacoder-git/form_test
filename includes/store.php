<?php


include("database.php");
include("User.php");


if (isset($_POST['submit']))
{
    $user = new User();


    $user->name = $_POST['name'];
    $user->family_name = $_POST['fname'];
    $user->image = $_FILES['image'];
    $user->is_active = 0;
    $user->create();

    header('location: ../admin.php');





}



?>