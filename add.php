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
    <title>Create Invoice | Sam One Cargo</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="public/img/favicon.ico">

    <!-- Template -->
    <link rel="stylesheet" href="public/graindashboard/css/graindashboard.css">

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

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
                            <a class="unfold-link d-flex align-items-center text-nowrap" href="logout.php#">
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
                    <nav class="d-none d-md-block" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Invoice</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Create Invoice</li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->

                    <div class="mb-3 mb-md-4 d-flex justify-content-between">
                        <div class="h3 mb-0">Create Invoice</div>
                    </div>


                    <!-- Form -->
                    <?php
                    include 'connection.php';
                    $query = mysqli_query($koneksi, "SELECT max(Invoice) as kodeTerbesar FROM Identity");
                    $data = mysqli_fetch_array($query);
                    $kodeBarang = $data['kodeTerbesar'];
                    $urutan = (int) substr($kodeBarang, 6, 6);
                    $urutan++;
                    $huruf = "SOC";
                    $kodeBarang = $huruf . sprintf("%06s", $urutan);
                    ?>	

                    <div>
                        <form name="dynamic_form" id="dynamic_form">
                             <div id="dynamic_field_append">
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-2">
                                        <input type="text" style="text-align:center;" name="invoice" class="form-control" required="required" value="<?php echo $kodeBarang ?>" readonly><br>
                                    </div>
                                    <div class="form-group col-12 col-md-2">
                                    <input type="text" style="text-align:center;" name="tanggal" class="form-control" required="required" value="<?php echo date("d-m-Y")?>" readonly><br>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name">Nama Pengirim</label>
                                        <input type="text" name="namaPengirim" class="form-control" placeholder="Nama Pengirim">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                    <label for="name">Nama Penerima</label>
                                    <input type="text" name="namaPenerima" class="form-control" placeholder="Nama Penerima">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name">Handphone Pengirim</label>
                                        <input type="number" name="hpPengirim" class="form-control" placeholder="Handphone Pengirim">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name">Handphone Penerima</label>
                                        <input type="number" name="hpPenerima" class="form-control" placeholder="Handphone Penerima">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-20 col-md-6">
                                        <label for="name">Alamat</label>
                                        <textarea name="alamat" class="form-control" cols="30" rows="8"></textarea>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name">Kode Tujuan</label>
                                        <input type="text" name="kodeTujuan" class="form-control">
                                        <label for="name">Harga Packing </label>
                                        <input type="number" name="hargaPacking" class="form-control">
                                        <label for="name">Isi Barang</label>
                                        <input type="text" name="isiBarang" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                     <div class="form-group col-12 col-md-6">
                                        <label for="name">Harga Perkilo</label>
                                        <input type="number" name="hargaKilo" class="form-control">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name">SMU </label>
                                        <input type="number" name="smu" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name">Pilih Armada Pengiriman </label><br>
                                        <select name="armada" class="form-control">
                                            <option value="Pengiriman Via Darat">Pengiriman Via Darat</option>
                                            <option value="Pengiriman Via Laut">Pengiriman Via Laut</option>
                                            <option value="Pengiriman Via Udara">Pengiriman Via Udara</option>
                                        </select>                                
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name">Pilih Pembagi Harga</label><br>
                                        <select name="harga" class="form-control">
                                            <option value="4000">Rp. 4000 - Via Darat / Laut</option>
                                            <option value="6000">Rp. 6000 - Via Udara </option>
                                            <option value="5000">Rp. 5000 - Luar Negeri</option>
                                        </select>                      
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name">Panjang Barang</label>
                                        <input type="number" name="panjang[]" placeholder="Panjang Barang" class="form-control">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name">Lebar Barang </label><br>
                                        <input type="number" name="lebar[]" placeholder="Lebar Barang" class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name">Tinggi Barang</label>
                                        <input type="number" name="tinggi[]" placeholder="Tinggi Barang" class="form-control">
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label for="name">Berat Barang </label><br>
                                        <input type="number" name="berat[]" placeholder="Berat Barang" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" name="add" id="add_field" class="btn btn-success"> Tambah Barang</button>
                                    </div>
                                </div>
                                <!-- <div class="custom-control custom-switch mb-2">
                                    <input type="checkbox" class="custom-control-input" id="randomPassword">
                                    <label class="custom-control-label" for="randomPassword">Set Random Password</label>
                                </div> -->

                             </div>
                             <input type="button" name="submit" id="submit" class="btn btn-primary float-right" value="Submit" />

                        </form>
                    </div>
                    <!-- End Form -->
                </div>
            </div>


        </div>

        <!-- Footer -->
        <footer class="small p-3 px-md-4 mt-auto">
                <div class="col-lg text-center text-lg-right">
                    &copy; 2021 Sam One Cargo. All Rights Reserved.
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>
</main>

<script>
          $(document).ready(function(){ 
               var i = 1;
               $('#add_field').click(function(){  
                   i++;  
                   $('#dynamic_field_append').append('<div class="form-row" id="row_remove'+i+'"><div class="form-group col-12 col-md-6"><label for="name">Panjang Barang</label><input type="number" name="panjang[]" placeholder="Panjang Barang" class="form-control"></div><div class="form-group col-12 col-md-6"><label for="name">Lebar Barang </label><br><input type="number" name="lebar[]" placeholder="Lebar Barang" class="form-control"></div></div><div class="form-row" id="row_remove'+i+'"><div class="form-group col-12 col-md-6"><label for="name">Tinggi Barang</label><input type="number" name="tinggi[]" placeholder="Tinggi Barang" class="form-control"></div><div class="form-group col-12 col-md-6"><label for="name">Berat Barang </label><br><input type="number" name="berat[]" placeholder="Berat Barang" class="form-control"></div><div class="col-md-4"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Hapus</button></div></div>');
               });
               $(document).on('click', '.btn_remove', function() {
                   var button_id = $(this).attr("id");
                   $('#row_remove'+button_id+'').remove();
               });
               $('#submit').click(function() {
                   $.ajax({
                       url:"save.php",
                       method:"POST",
                       data:$('#dynamic_form').serialize(),
                       success:function(data) {  
                           alert(data);
                           $('#dynamic_form')[0].reset();
                           window.location.href = "list.php";
                       }
                   });
               });
        })
;
      </script>


<script src="public/graindashboard/js/graindashboard.js"></script>
<script src="public/graindashboard/js/graindashboard.vendor.js"></script>

</body>
</html>