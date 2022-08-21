  <?php session_start();
  ?>
  <?php include('include/config.php')?>

<!DOCTYPE html>
<html>
<head>

 <?php include("include/header.php"); ?>
<style type="text/css">
	#frame {
  position: relative;
  overflow: hidden;
  width: 100%;
  height: 100%;
}
</style>

</head>
<script>window.location.href="anasayfa/index.php";</script>
 <body class="hold-transition  sidebar-mini sidebar-collapse layout-navbar-fixed  " >

<div class="wrapper" >

  <!-- Navbar -->
 
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<?php include('include/navbar.php');
       include('include/sidebar.php'); ?>

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
				
				<?php $perno=$_SESSION['perno'];

if(in_array(211, $_SESSION['yetki']) ){ 
$yet=$db->query("select* from personel_yetki where perno='$perno'");
$yetki=mysqli_fetch_assoc($yet);
switch($yetki['talep']){
	
	case 2:
			
	
		if($yetki['uyari']==0){ ?>
		
		<?php } 
		else { ?>

		<div class="alert alert-info alert-dismissible" >

						<button type="button" class="close btn btn-info" aria-hidden="true" onclick="window.location.href='talep/talep.php'">GOSTER</button>
						<h5><i class="icon fas fa-info"></i> <?php echo $yetki['uyari'].' Adet Yeni Talep Var'; ?></h5>
						
		</div>
		<?php  }
		
	case 1:
			break;
		
	case 0:
		break;
	} 

    }  ?>
				
				
					
					
					<?php 

            if(in_array(204, $_SESSION['yetki']) ){ 

            $bugun=date('Y-m-d');
						$tarih=strtotime('-3	 day ',strtotime($bugun));
						$ytarih=date('Y/m/d',$tarih);
						
						$arizalar=$db->query("select* from ariza where tarih <= '$ytarih' ");
						$arizasay=mysqli_num_rows($arizalar);
						if($arizasay>0){
						?>
						<a href="ariza/ariza-sureli-liste.php">
					<div class="alert alert-warning alert-dismissible" >
						
						
						<h5><i class="icon fas fa-exclamation-triangle"></i><?php echo $arizasay;?> tane suresi Geçen arıza var !</h5>
						
					</div>
				</a>
						<?php } } ?>


					</div>
				
			</div>
        </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php include("include/footer.php"); ?>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->

    <IFRAME id="frame" src="chat/index.php" width=250 height=auto marginwidth=0 marginheight=0 hspace=0 vspace=0 scrolling=no frameborder=0></IFRAME>

  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
	<?php
function kisalt($kelime, $uzunluk, $son="..."){
 $say = strlen($kelime); // harfleri saydık
 if($say > $uzunluk){ // uzunluk değşkeninden uzun ise;
 $yeni = substr($kelime,0,$uzunluk); // büyük olduğunda parçaldık
 $yeni .= $son; // kelimenin sonuna ekledik.
 }elseif(($say == $uzunluk) or ($say < $uzunluk)){ // küçük yada eşit ise;
 $yeni = $kelime; // değişiklilk yapma
 }
 return $yeni;
}



?>


</script>

   <script>
    $(document).ready(function(){
		$("#sql").load("../talep-sql.php");
		 $("#bildir").load("../bildirim-talep.php");
		});
		 </script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>



</body>
</html>
