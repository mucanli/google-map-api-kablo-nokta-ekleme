  <?php session_start();
  ?>


<!DOCTYPE html>
<html>
<head>

 <?php include("../include/header.php"); ?>
<style type="text/css">
	#frame {
  position: relative;
  overflow: hidden;
  width: 100%;
  height: 100%;
}
</style>
<script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.1.2/firebase-messaging.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head>

 <body class="hold-transition  sidebar-mini sidebar-collapse layout-navbar-fixed  " >

<div >



  <!-- Navbar -->
 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include('../include/navbar.php');
       include('../include//sidebar.php'); 

  if($_SESSION['ekipno']>0 ){  echo "<script> window.location='../ariza/arizaekip.php'; </script>";} ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      <div class="card">  
        
        <!-- /.row -->
        <!-- Main row -->
	   <div class="row">
	
			<div class="col-md-6">
				<div class="card-body">

			</div>
        </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include("../include/footer.php"); ?>
 
  <aside class="control-sidebar control-sidebar-dark">
 

    <IFRAME id="frame" src="../chat/index.php" width=250 height=auto marginwidth=0 marginheight=0 hspace=0 vspace=0 scrolling=no frameborder=0></IFRAME>

  </aside>  
  <!-- /.control-sidebar -->
</div>



<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>



</body>
</html>
