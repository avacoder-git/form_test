<?php


include("database.php");
include("User.php");


if (isset($_POST['submit']))
{
    $user = User::find_by_id($_POST['id']);


    $user->name = $_POST['name'];
    $user->family_name = $_POST['fname'];
    $user->image = $_FILES['image'];
    $user->is_active = 0;
    $user->update();

    header('location: ../admin.php');





}



?>