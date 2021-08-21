
<?php

include("includes/header.php");


include("includes/database.php");
include("includes/User.php");

$users = User::find_all();

?>



<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <a href="index.php">Index</a>

            <form action="includes/submit_admin.php" method="post">

                <?php
                if (isset($_SESSION['activeness'])){

                    ?>
                <div class="alert alert-success"><?php  echo $_SESSION['activeness'] ?></div>
                <?php
                    unset($_SESSION['activeness']);
                    }elseif(isset($_SESSION['updated'])){
                ?>
                    <div class="alert alert-warning"><?php echo $_SESSION['updated'] ?></div>


                <?php
                    unset($_SESSION['updated']);
                }elseif(isset($_SESSION['created'])){
                    ?>
                    <div class="alert alert-success"><?php echo $_SESSION['created'] ?></div>


                    <?php
                    unset($_SESSION['created']);

                }elseif(isset($_SESSION['deleted'])){
                    ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['deleted'] ?></div>


                    <?php
                    unset($_SESSION['deleted']);

                }

                ?>
                <table class="table border">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Ismi</th>
                        <th>Familiyasi</th>
                        <th>Rasm</th>
                        <th>Aktivligi</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    foreach ($users as $user)
                    {
                        ?>
                        <tr>
                            <td><?php echo $user->id ?></td>
                            <td> <a href="includes/edit.php?id=<?php echo $user->id ?>"><?php echo $user->name ?></a></td>
                            <td><?php echo $user->family_name ?></td>
                            <td><img src="uploads/<?php echo $user->image ?>" width="100px" alt=""></td>
                            <td><div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="checkbox_<?php echo $user->id ?>" <?php
                                    if($user->is_active)
                                        echo "checked"

                                    ?>>
                                </div></td>
                            <td>
                                <a href="includes/delete.php?id=<?php echo $user->id ?>"class="btn btn-danger">Delete</a>
                            </td>
                        </tr>



                        <?php
                    }
                    ?>

                    </tbody>
                </table>
                <input type="submit" name="submit" class="btn btn-primary">
                <a href="includes/create.php" class="btn btn-success">+</a>
            </form>

        </div>
    </div>
</div>

<?php
include("includes/footer.php");


?>

