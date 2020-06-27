<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Klinik Nur Khadijah | User
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="<?php echo base_url('assets/css/gf.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/fa/css/all.min.css'); ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/now-ui-dashboard.css?v=1.3.0'); ?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url('assets/demo/demo.css'); ?>" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.min.css'); ?>"/>
  
  
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/select2/css/select2.min.css'); ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/select2/css/select2-bootstrap4.css'); ?>"/>
  <script type="text/javascript">
    var baseurl = "<?php echo base_url(); ?>";
  </script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    	-->
      <div class="logo">
        <a href="<?php echo base_url(); ?>" class="simple-text logo-mini">
          <i class="now-ui-icons media-2_sound-wave"></i>
        </a>
        <a href="<?php echo base_url(); ?>" class="simple-text logo-normal">
          Klinik Nur Khadijah
        </a>
      </div>
      <?php $this->load->view('sidebar'); ?>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="">User</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="menuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuProfile">
                  <a class="dropdown-item" href="#">
										<i class="now-ui-icons users_single-02"></i>
										<p>Profile</p>
									</a>
									<a class="dropdown-item" href="<?php echo base_url('dashboard/logout/'); ?>">
										<i class="now-ui-icons media-1_button-power"></i>
										<p>Logout</p>
									</a>
                </div>
							</li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
        <div id="form" class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 id="formTitle" class="card-title"> Edit Data Pengguna</h4>
              </div>
              <div class="card-body">
                <form class="needs-validation" action="<?php echo base_url('User/updateDataPengguna'); ?>" method="POST">
                	<div class="row">
                    <?php foreach ($query->result() as $baris) { ?>
                		<div class="col-md-6">
                			<div class="form-group">
                        <input type="text" hidden name="id" value="<?php echo $baris->id;?>">
                				<label>NIK</label>
                				<input type="text" name="nik" class="form-control" placeholder="NIK" required value="<?php echo $baris->nik ; ?>">
                			</div>
                		</div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Name" required value="<?php echo $baris->name ; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="E-Mail" required value="<?php echo $baris->email ; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="pw1" name="password" class="form-control" placeholder="Password" required value="<?php echo $baris->password ; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Re-type Password</label>
                        <input type="password" id="pw2" name="retype_password" class="form-control" placeholder="Re-type Password" required value="<?php echo $baris->password ; ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>User Type</label>
                        <select name="type" class="form-control">
                          <option value="<?php echo $baris->type;?>"> <?php echo $baris->type;?> </option>
                          <option value="Employee">Employee</option>
                          <option value="Client">Client</option>
                        </select>
                      </div>
                    </div>
                	</div>
                  <?php } ?>
                  <div class="card-footer row">
                    <div class="col-md-2">
                      <button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Save</button>
                    </div>
                    <div class="col-md-2">
                      <a href="<?php echo base_url('index.php/User');?>" class="btn btn-danger btn-block" ><i class="fa fa-times"></i> Cancel</a>
                    </div>
                  </div>
                </form>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('assets/js/core/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/core/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/core/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js'); ?>"></script>
  <!-- Chart JS -->
  <script src="<?php echo base_url('assets/js/plugins/chartjs.min.js'); ?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js'); ?>"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('assets/js/now-ui-dashboard.min.js?v=1.3.0'); ?>" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url('assets/demo/demo.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/admina.user.js'); ?>" type="text/javascript"></script>

  <!-- hapus sementara -->
  <script type="text/javascript" src="<?php echo base_url('assets/DataTables/datatables.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/select2/js/select2.min.js'); ?>"></script>

  <!-- js untuk table by angga-->
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
  <!-- js untuk table by Angga -->

  <!-- js untuk validasi password by angga -->
   <script type="text/javascript">
            window.onload = function () {
                document.getElementById("pw1").onchange = validatePassword;
                document.getElementById("pw2").onchange = validatePassword;
            }
            function validatePassword(){
                var pass2=document.getElementById("pw2").value;
                var pass1=document.getElementById("pw1").value;
                if(pass1!=pass2)
                    document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
                else
                    document.getElementById("pw2").setCustomValidity('');
            }
  </script>
  <!-- js untuk validasi password by angga -->
</body>

</html>