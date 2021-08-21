
<?php

include("includes/database.php");
include("includes/User.php");

$users = User::find_all();


?>



<div class="container">
    <div class="row">


        <div class="col-lg-6">
            <table class="table border">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Ismi</th>
                    <th>Familiyasi</th>
                    <th>Rasm</th>
                    <th>Aktivligi</th>
                </tr>
                </thead>
                <tbody>

                <?php

                foreach ($users as $user)
                {
                ?>
                    <tr>
                        <td><?php echo $user->id ?></td>
                        <td><?php echo $user->name ?></td>
                        <td><?php echo $user->family_name ?></td>
                        <td><img src="uploads/<?php echo $user->image ?>" width="100px" alt=""></td>
                        <td><?php if($user->is_active){ ?>
                                <span class="badge bg-success">Active</span>
                            <?php
                            }else{
                            ?>
                            <span class="badge bg-danger">Unactive</span>
                            <?php
                            }
                            ?>

                        </td>
                    </tr>



                <?php
                }
                ?>

                </tbody>
            </table>
            <a href="admin.php" class="btn btn-primary">Admin</a>
        </div>
    </div>
</div>



