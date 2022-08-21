

    <!-- Navbar -->
<?php

$link = basename($_SERVER['SCRIPT_NAME']);

 ?>
 
 <style>
.nav-treeview{

font-family: Arial, Helvetica, sans-serif;
}
.nav-treeview li{
  background-color:#464a41;
  margin-left: 15px;
}

</style>

  <aside class="main-sidebar  sidebar-dark-primary elevation-4 ">

    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../resimler/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">ADMIN</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
                <a href="../anasayfa/kablo.php" class="nav-link <?php if($link=='kablo.php'){echo 'active'; } ?>">

                  <i class="fas fa-info-circle nav-icon"></i>
                  <p>Kablo</p>
                </a>
              </li>
                  <li class="nav-item">
                <a href="../anasayfa/nokta.php" class="nav-link <?php if($link=='nokta.php'){echo 'active'; } ?>">

                  <i class="fas fa-info-circle nav-icon"></i>
                  <p>Nokta</p>
                </a>
              </li>    <li class="nav-item">
                <a href="../anasayfa/kablo-ekle.php" class="nav-link <?php if($link=='kablo-ekle.php'){echo 'active'; } ?>">

                  <i class="fas fa-info-circle nav-icon"></i>
                  <p>kablo ekle</p>
                </a>
              </li>    <li class="nav-item">
                <a href="../anasayfa/nokta-ekle.php" class="nav-link <?php if($link=='nokta-ekle.php'){echo 'active'; } ?>">

                  <i class="fas fa-info-circle nav-icon"></i>
                  <p>nokta ekle</p>
                </a>
              </li>


		  </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
