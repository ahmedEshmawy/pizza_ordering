<?php session_start(); ?>
<?php include "../core/config.php"; ?>
<?php include "handelers/logincheck.php"; ?>
<?php include "inc/header.php";  ?>
<!-- End Topbar header -->

<?php include "inc/sidebar.php"; ?>


<div class="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 ">
                <div class="card">
                    <!-- show session msg -->
                    <?php if (isset($_SESSION['msg'])) :
                        foreach ($_SESSION['msg'] as $msg) : ?>
                            <div class="alert alert-danger">
                                <?php echo $msg ?>
                            </div>
                    <?php endforeach;
                        unset($_SESSION['msg']);
                    endif;
                    ?>
                    <form action="handelers/Admin/add-admin.php" method="POST" class="form-horizontal">
                        <div class="card-body">
                            <h4 class="card-title">Personal Info</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="fullname" placeholder="Full Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">User Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" placeholder="User Name Here">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" placeholder="Password Here">
                                </div>
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <input type="submit" name="submit" class="btn btn-primary" value="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>









<?php include "inc/footer.php"; ?>