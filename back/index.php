        <?php session_start(); ?>
        <?php include "../core/config.php"; ?>
        <?php include "handelers/logincheck.php"; ?>
        <?php include "inc/header.php"; ?>
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <?php include "inc/sidebar.php"; ?>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <!-- show session msg -->
                                <?php if (isset($_SESSION['msg'])) : ?>

                                    <div class="alert alert-success ">
                                        <?php echo $_SESSION['msg'] ?>
                                    </div>
                                <?php
                                    unset($_SESSION['msg']);
                                endif;
                                ?>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <?php
                                $result = $conn->query("SELECT * FROM `tbl_category`");
                                $countCat = $result->rowCount();
                                ?>
                                <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                <h6 class="text-white"><?php echo $countCat; ?> Categories</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <?php
                                $result = $conn->query("SELECT * FROM `tbl_food`");
                                $countFood = $result->rowCount();
                                ?>
                                <h1 class="font-light text-white"><i class="mdi mdi-food-fork-drink"></i></h1>
                                <h6 class="text-white"><?php echo $countFood; ?> Foods</h6>
                            </div>
                             
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <?php 
                                $result = $conn->query("SELECT * FROM `tbl_order`");
                                $countOrder = $result->rowCount();
                                ?>
                                <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                                <h6 class="text-white"><?= $countOrder; ?> Total Orders</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <?php 
                                $result = $conn->query("SELECT sum(total) AS total FROM `tbl_order`WHERE status='Delivered'");
                                $countTotal = $result->fetch();
                                $RevenueGenerated = $countTotal['total'];
                                ?>
                                <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                                <h6 class="text-white">$ <?= $RevenueGenerated; ?></br> Revenue Generated</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
   
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Site Analysis</h4>
                                        <h5 class="card-subtitle">Overview of Latest Month</h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- column -->
                                    <div class="col-lg-9">
                                        <div class="flot-chart">
                                            <div class="flot-chart-content" id="flot-line-chart"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-user m-b-5 font-16"></i>
                                                    <h5 class="m-b-0 m-t-5">2540</h5>
                                                    <small class="font-light">Total Users</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-plus m-b-5 font-16"></i>
                                                    <h5 class="m-b-0 m-t-5">120</h5>
                                                    <small class="font-light">New Users</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                    <h5 class="m-b-0 m-t-5">656</h5>
                                                    <small class="font-light">Total Shop</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-tag m-b-5 font-16"></i>
                                                    <h5 class="m-b-0 m-t-5">9540</h5>
                                                    <small class="font-light">Total Orders</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-table m-b-5 font-16"></i>
                                                    <h5 class="m-b-0 m-t-5">100</h5>
                                                    <small class="font-light">Pending Orders</small>
                                                </div>
                                            </div>
                                            <div class="col-6 m-t-15">
                                                <div class="bg-dark p-10 text-white text-center">
                                                    <i class="fa fa-globe m-b-5 font-16"></i>
                                                    <h5 class="m-b-0 m-t-5">8540</h5>
                                                    <small class="font-light">Online Orders</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- column -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->

            <?php include "inc/footer.php"; ?>