<?php session_start(); ?>
<?php include "../core/config.php"; ?>
<?php include "handelers/logincheck.php"; ?>
<?php include "inc/header.php";  ?>
<!-- End Topbar header -->

<?php include "inc/sidebar.php"; ?>

<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Admin</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <!-- show session msg -->
        <?php if (isset($_SESSION['msg'])) : ?>

            <div class="alert alert-success ">
                <?php echo $_SESSION['msg'] ?>
            </div>
        <?php
            unset($_SESSION['msg']);
        endif;
        ?>
        <div class="card-body">
            <a href="admin-add.php" class="card-title m-b-0 btn btn-primary lg">Add Admin</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $result = $conn->query("SELECT * FROM `tbl_admin`");
                $i = 1;
                $count = $result->rowCount();
                while ($row = $result->fetch()) :
                    //check if there is data in the admin table
                    if ($count > 0) : ?>
                        <tr>
                            <th scope=""><?= $i++; ?> </th>
                            <td><?= $row['full_name'] ?></td>
                            <td><?= $row['user_name'] ?></td>
                            <td>

                                <a href="<?php echo BURL; ?>back/admin-edite.php?id=<?php echo $row['id'] ?>" class="badge badge-secondary">Update</a>
                                <a href="<?php echo BURL; ?>back/handelers/admin/delete-admin.php?id=<?php echo $row['id']; ?>" class="badge badge-danger">Delete</a>

                            </td>

                        </tr>
                    <?php else : ?>

                        <tr>
                            <td colspan="3"><?= "No data Found " ?> </td>
                        </tr>

                    <?php endif; ?>

                <?php endwhile; ?>

            </tbody>
        </table>
    </div>
</div>











<?php include "inc/footer.php"; ?>