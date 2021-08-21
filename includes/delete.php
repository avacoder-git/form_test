<?php

include("database.php");
include("User.php");


if (isset($_GET['id']))
{


    $user = User::find_by_id($_GET['id']);

    $user->delete();


    header("location: ../admin.php");




}


?>