<?php
session_start();

if (!$_SESSION["is_login"] === TRUE) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>Invoice List | Sam One Cargo</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/img/favicon.ico">

    <!-- Template -->
    <link rel="stylesheet" href="public/graindashboard/css/graindashboard.css">
</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
<!-- Header -->
<header class="header bg-body">
    <nav class="navbar flex-nowrap p-0">
        <div class="navbar-brand-wrapper d-flex align-items-center col-auto">
            <!-- Logo For Mobile View -->
            <!-- <a class="navbar-brand navbar-brand-mobile" href="/">
                <img class="img-fluid w-100" src="https://www.socmalang.com/storage/2021/07/20201223_191052-removebg-preview-e1627548384499.png" alt="Graindashboard">
            </a> -->
            <!-- End Logo For Mobile View -->

            <!-- Logo For Desktop View -->
            <a style="margin: auto;" class="navbar-brand navbar-brand-desktop" href="/">
                <img class="side-nav-show-on-closed"  alt="Graindashboard" style="display:none;width: auto; height: 33px;">
                <img class="side-nav-hide-on-closed" src="https://www.socmalang.com/storage/2021/07/20201223_191052-removebg-preview-e1627548384499.png" alt="Graindashboard" style="width: auto; height: 50px;">
            </a>
            <!-- End Logo For Desktop View -->
        </div>

        <div class="header-content col px-md-3">
            <div class="d-flex align-items-center">
                <!-- Side Nav Toggle -->
                <a  class="js-side-nav header-invoker d-flex mr-md-2" href="#"
                    data-close-invoker="#sidebarClose"
                    data-target="#sidebar"
                    data-target-wrapper="body">
                    <i class="gd-align-left"></i>
                </a>
                <!-- End Side Nav Toggle -->

                <!-- User Notifications -->
                <div class="dropdown ml-auto">
                    <a id="notificationsInvoker" class="header-invoker" aria-controls="notifications" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#notifications" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                        <!-- <span class="indicator indicator-bordered indicator-top-right indicator-primary rounded-circle"></span> -->
                        <!-- <i class="gd-bell"></i> -->
                    </a>

                    <div id="notifications" class="dropdown-menu dropdown-menu-center py-0 mt-4 w-18_75rem w-md-22_5rem unfold-css-animation unfold-hidden" aria-labelledby="notificationsInvoker" style="animation-duration: 300ms;">
                        <div class="card">
                            <div class="card-header d-flex align-items-center border-bottom py-3">
                                <h5 class="mb-0">Notifications</h5>
                                <a class="link small ml-auto" href="#">Clear All</a>
                            </div>

                            <div class="card-body p-0">
                                <div class="list-group list-group-flush">
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center text-nowrap mb-2">
                                            <i class="gd-info-alt icon-text text-primary mr-2"></i>
                                            <h6 class="font-weight-semi-bold mb-0">New Update</h6>
                                            <span class="list-group-item-date text-muted ml-auto">just now</span>
                                        </div>
                                        <p class="mb-0">
                                            Order <strong>#10000</strong> has been updated.
                                        </p>
                                        <a class="list-group-item-closer text-muted" href="#"><i class="gd-close"></i></a>
                                    </div>
                                    <div class="list-group-item list-group-item-action">
                                        <div class="d-flex align-items-center text-nowrap mb-2">
                                            <i class="gd-info-alt icon-text text-primary mr-2"></i>
                                            <h6 class="font-weight-semi-bold mb-0">New Update</h6>
                                            <span class="list-group-item-date text-muted ml-auto">just now</span>
                                        </div>
                                        <p class="mb-0">
                                            Order <strong>#10001</strong> has been updated.
                                        </p>
                                        <a class="list-group-item-closer text-muted" href="#"><i class="gd-close"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End User Notifications -->
                <!-- User Avatar -->
                <div class="dropdown mx-3 dropdown ml-2">
                    <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#profileMenu" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                        <!--img class="avatar rounded-circle mr-md-2" src="#" alt="John Doe"-->
                        <!-- <span class="mr-md-2 avatar-placeholder">J</span> -->
                        <span class="d-none d-md-block"><?php echo $_SESSION['email']; ?></span>
                        <i class="gd-angle-down d-none d-md-block ml-2"></i>
                    </a>

                    <ul id="profileMenu" class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                        <li class="unfold-item">
                            <a class="unfold-link d-flex align-items-center text-nowrap" href="logout.php">
                    <span class="unfold-item-icon mr-3">
                      <i class="gd-power-off"></i>
                    </span>
                            Log Out
                            </a>
                        </li>
                        <!-- <li class="unfold-item unfold-item-has-divider">
                            <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
                    <span class="unfold-item-icon mr-3">
                      <i class="gd-power-off"></i>
                    </span>
                                Sign Out
                            </a>
                        </li> -->
                    </ul>
                </div>
                <!-- End User Avatar -->
            </div>
        </div>
    </nav>
</header>
<!-- End Header -->

<main class="main">
    <!-- Sidebar Nav -->
    <aside id="sidebar" class="js-custom-scroll side-nav">
        <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
            <!-- Title -->
            <li class="sidebar-heading h6">Dashboard</li>
            <!-- End Title -->

            <!-- Dashboard -->
            <li class="side-nav-menu-item active">
                <a class="side-nav-menu-link media align-items-center" href="index.php">
              <span class="side-nav-menu-icon d-flex mr-3">
                <i class="gd-dashboard"></i>
              </span>
                    <span class="side-nav-fadeout-on-closed media-body">Dashboard</span>
                </a>
            </li>
            <!-- End Dashboard -->

            <!-- Documentation -->
            <li class="side-nav-menu-item">
                <a class="side-nav-menu-link media align-items-center" href="list.php" target="_blank">
              <span class="side-nav-menu-icon d-flex mr-3">
                <i class="gd-list"></i>
              </span>
                    <span class="side-nav-fadeout-on-closed media-body">Invoice Lists</span>
                </a>
            </li>
            <!-- End Documentation -->

            <!-- Users -->
            <li class="side-nav-menu-item side-nav-has-menu">
                <a class="side-nav-menu-link media align-items-center" href="#"
                   data-target="#subUsers">
                  <span class="side-nav-menu-icon d-flex mr-3">
                    <i class="gd-file"></i>
                  </span>
                    <span class="side-nav-fadeout-on-closed media-body">Create Invoice</span>
                    <span class="side-nav-control-icon d-flex">
                <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
              </span>
                    <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                </a>

                <!-- Users: subUsers -->
                <ul id="subUsers" class="side-nav-menu side-nav-menu-second-level mb-0">
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="add.php">Add Invoice</a>
                    </li>
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="addbulk.php">Add Bulk Invoice</a>
                    </li>
                </ul>
                <!-- End Users: subUsers -->
            </li>
            <!-- End Users -->

            <!-- Authentication -->
            <!-- <li class="side-nav-menu-item side-nav-has-menu">
                <a class="side-nav-menu-link media align-items-center" href="#"
                   data-target="#subPages">
              <span class="side-nav-menu-icon d-flex mr-3">
                <i class="gd-lock"></i>
              </span>
                    <span class="side-nav-fadeout-on-closed media-body">Authentication</span>
                    <span class="side-nav-control-icon d-flex">
                <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
              </span>
                    <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                </a> -->

                <!-- Pages: subPages -->
                <!-- <ul id="subPages" class="side-nav-menu side-nav-menu-second-level mb-0">
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="login.html">Login</a>
                    </li>
                    <li class="side-nav-menu-item">
                        <a class="side-nav-menu-link" href="register.html">Register</a>
                    </li>
                </ul> -->
                <!-- End Pages: subPages -->
            <!-- </li> -->
            <!-- End Authentication -->

            <!-- Settings -->
            <!-- <li class="side-nav-menu-item">
                <a class="side-nav-menu-link media align-items-center" href="settings.html">
              <span class="side-nav-menu-icon d-flex mr-3">
                <i class="gd-settings"></i>
              </span>
                    <span class="side-nav-fadeout-on-closed media-body">Settings</span>
                </a>
            </li> -->
            <!-- End Settings -->

            <!-- Static -->
            <!-- <li class="side-nav-menu-item">
                <a class="side-nav-menu-link media align-items-center" href="static-non-auth.html">
              <span class="side-nav-menu-icon d-flex mr-3">
                <i class="gd-file"></i>
              </span>
                    <span class="side-nav-fadeout-on-closed media-body">Static page</span>
                </a>
            </li> -->
            <!-- End Static -->

        </ul>
    </aside>
    <!-- End Sidebar Nav -->


    <div class="content">
        <div class="py-4 px-3 px-md-4">
            <div class="card mb-3 mb-md-4">

                <div class="card-body">
                    <!-- Breadcrumb -->
                    <!-- <nav class="d-none d-md-block" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Users</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Users</li>
                        </ol>
                    </nav> -->
                    <!-- End Breadcrumb -->

                    <div class="mb-3 mb-md-4 d-flex justify-content-between">
                        <div class="h3 mb-0">Invoice Lists</div>
                    </div>

                    <!-- Users -->
                    <div class="table-responsive-xl">
                        <table class="table text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-2">Invoice</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Pengirim</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Penerima</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Tanggal</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Barang</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Tujuan</th>
                                <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
               <?php 
                include 'connection.php';
                $batas = 40;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
				$previous = $halaman - 1;
				$next = $halaman + 1;
				
				$data = mysqli_query($koneksi,"select * from Identity");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
 
				$barang = mysqli_query($koneksi,"select * from Identity order by Invoice DESC limit $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
			
            while($b = mysqli_fetch_array($barang)){
				?>
                            <tr>
                                <td class="py-3"><?php echo $b['Invoice']; ?></td>
                                <td class="align-middle py-3"><div class="d-flex align-items-center"><?php echo $b['NamaPengirim']; ?></div></td>
                                <td class="py-3"><?php echo $b['NamaPenerima']; ?></td>
                                <td class="py-3"><?php echo $b['tanggal']; ?></td>
                                <td class="py-3"><?php echo $b['IsiBarang']; ?></td>
                                <td class="py-3"><?php echo $b['KodeTujuan']; ?></td>
                                <td class="py-3">
                                    <div class="position-relative">
                                        <a class="link-dark d-inline-block"  href="printAwb.php?inv=<?=$b['Invoice']?>">
                                            <i class="gd-printer icon-text"></i>
                                        </a>
                                        <a class="link-dark d-inline-block" href="delete.php?inv=<?=$b['Invoice']?>">
                                            <i class="gd-trash icon-text"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                            }
                            ?>
                            </tbody>
                        </table>
                        <div class="card-footer d-block d-md-flex align-items-center d-print-none">
                            <!-- <div class="d-flex mb-2 mb-md-0">Showing 1 to 8 of 24 Entries</div> -->

                            <nav class="d-flex ml-md-auto d-print-none" aria-label="Pagination">
                                <ul class="pagination justify-content-end font-weight-semi-bold mb-0">
                                        <!-- <li class="page-item">				
                                        <a id="datatablePaginationPrev" class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?> aria-label="Previous">
                                        <i class="gd-angle-left icon-text icon-text-xs d-inline-block"></i></a>	</li> -->
                                        
                                        <li class="page-item d-none d-md-block">
                                        <?php 
                                            for($x=1;$x<=$total_halaman;$x++){
                                            ?> 
                                            <a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                            <?php
                                            }
                                            ?>	    
                                        </li>
                                        
                                        <!-- <li class="page-item">
                                        <a id="datatablePaginationNext" class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?> aria-label="Next">
                                        <i class="gd-angle-right icon-text icon-text-xs d-inline-block"></i></a></li> -->
                				</ul>
                            </nav>
                        </div>
                    </div>
                    <!-- End Users -->
                </div>
            </div>


        </div>

        <!-- Footer -->
        <footer class="small p-3 px-md-4 mt-auto">
            <div class="row justify-content-between">
                <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
                    <ul class="list-dot list-inline mb-0">
                        <li class="list-dot-item list-dot-item-not list-inline-item mr-lg-2"><a class="link-dark" href="#">FAQ</a></li>
                        <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Support</a></li>
                        <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Contact us</a></li>
                    </ul>
                </div>

                <div class="col-lg text-center mb-3 mb-lg-0">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-twitter-alt"></i></a></li>
                        <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-facebook"></i></a></li>
                        <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i class="gd-github"></i></a></li>
                    </ul>
                </div>

                <div class="col-lg text-center text-lg-right">
                    &copy; 2019 Graindashboard. All Rights Reserved.
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>
</main>


<script src="public/graindashboard/js/graindashboard.js"></script>
<script src="public/graindashboard/js/graindashboard.vendor.js"></script>

</body>
</html>