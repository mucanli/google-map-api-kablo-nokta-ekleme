


  

  <!-- Navbar -->



  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style='margin-top: -30px;'>
    <!-- Left navbar links -->
   <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <a href="../anasayfa/index.php" class="nav-link">Anasayfa</a>


        <span id='bildir'></span>

  
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
       <li class="nav-item">
        <a class="nav-link"   href="javascript:void(0)" onclick="window.print()" role="button">
          <i class="fa fa-print" aria-hidden="true"></i>
        </a>
      </li>
      
        <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </br>
  </nav>

  <div class="col-sm-5 main-header">
<?php if(isset($_GET['true'])){ ?>
 <div class="info-box bg-green">
  <span class="info-box-icon"><i class="fa fa-check" aria-hidden="true"></i></span>
   <div class="info-box-content">   <span class="info-box-number">İşlem Başarılı</span>  </div>
  </div>  <?php }  ?>

<?php if(isset($_GET['false'])){ ?>
<div class="info-box bg-red">
  <span class="info-box-icon"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
  <div class="info-box-content">   <span class="info-box-number">İşlem Başarısız</span>  </div>
  </div>  <?php }  ?>
</div>

<span id='zil'></span>







