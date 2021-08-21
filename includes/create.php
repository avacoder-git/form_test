<?php

include("header.php");


include("database.php");
include("User.php");



?>


<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <form action="store.php" method="post" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header"><h1>Create a user</h1></div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name"required>
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="fname" name="fname" required>
                            <label for="fname">Family Name</label>
                        </div>
                        <img height="100px" id="img" src="" alt="">

                        <div class="form-group">
                            <label for="image" class="btn btn-secondary">Add an image</label>
                            <input type="file" class="d-none" name="image" id="image">
                        </div>

                        <div class="form-group mt-3">
                            <input type="submit" name="submit" class="btn btn-success">
                        </div>



                    </div>
                </div>
            </form>
        </div>
    </div>
</div>





<?php


include("footer.php");



?>
