<?php

session_start();

include("database.php");
include("User.php");

if (isset($_POST['submit']))
{

    $users = User::find_all();


    foreach ($users as $user)
    {

        $checkbox = "checkbox_". $user->id;
        $user->is_active = (isset($_POST[$checkbox]))?1:0;

        $user->set_active();


    }
    $_SESSION['activeness'] = "Aktivliklar o'zgartirildi";


    header("location: ../admin.php");


}






?>