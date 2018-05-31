<?php if (isset($_SESSION['user_id'])) { header("Location: ". URL);} ?>
<?php include "views/header.php" ?>



    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Register</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">
                <?php if (isset($this->failed)) {?>
                    <div class="alert alert-danger">
                        <?php echo $this->failed ?>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        User registration form
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" name="first_name" class="form-control" placeholder="Enter first name" required value="<?php if (isset($_POST['first_name'])) {echo $_POST['first_name'];} ?>">
                            </div>
                            <div class="form-group">
                                <label>Last name</label>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter last name" required value="<?php if (isset($_POST['last_name'])) {echo $_POST['last_name'];} ?>">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter username" required value="<?php if (isset($_POST['username'])) {echo $_POST['username'];} ?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                            </div>
                            <button type="submit" class="btn btn-default">Submit Button</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- /#page-wrapper -->

<?php include "views/footer.php" ?>