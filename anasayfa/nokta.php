<!DOCTYPE html>
  <?php session_start(); ?>
<html>
<head>
  <title>Telefon</title>
<?php include("../include/header.php"); ?>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
 <script
      src="https://maps.googleapis.com/maps/api/js?key='google api key'&callback=initMap&libraries=&v=weekly"
      async
    ></script>

<?php


 if(isset($_POST['kaydet'])){
        $t=0;
     

        $isim=strtoupper($_POST['isim']);
        $tur=$_POST['tur'];
        $aciklama=$_POST['aciklama'];
     
        $dolap=$_POST['dolap'];
        $santralno=$_POST['santralno'];
        $kordinat=$_POST['kordinat'];


        $ekle=$db->query("insert into dipi (dipi_isim,dipi_tur,dipi_kordinat,dipi_not,dipi_dolap,dipi_santral) value('$isim','$tur','$kordinat','$aciklama','$dolap','$santralno')");

        if($ekle){
          echo "<script>window.location.href='dipi-ekle.php';</script>";
        } 
        else{
          echo $db->error;
        }

}


// dolap sorgu



  $kablosql=$db->query("select* from kablo");
  $say=mysqli_num_rows($kablosql);
  while($kablo=mysqli_fetch_array($kablosql)){
    $kordinat[]=$kablo;

  }
$toplam=count($kordinat);



$dipilist='';
$di=$db->query('select* from dipi');
while($dip=mysqli_fetch_assoc($di)){
  $dipilist=$dipilist.'["'.$dip['dipi_isim'].'",'.$dip['dipi_kordinat'].'],';
}




?>

    <script>

        var uzun=<?php echo $toplam;?>;
      var kor=<?php echo $toplam;?>;

      
// The following example creates complex markers to indicate beaches near
// Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
// to the base of the flagpole.
function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 12,
    mapTypeId: "hybrid",
    center: { lat: 35.12884408857798, lng: 33.931506032617776 },

  });
  setMarkers(map);
}
// Data for the markers consisting of a name, a LatLng and a zIndex for the
// order in which these markers should display on top of each other.


const beaches = [<?php echo $dipilist;?>];


function setMarkers(map) {
  // Adds markers to the map.
  // Marker sizes are expressed as a Size of X,Y where the origin of the image
  // (0,0) is located in the top left of the image.
  // Origins, anchor positions and coordinates of the marker increase in the X
  // direction to the right and in the Y direction down.
        var icon = {

    path: "M-14.87 8.21L-6.2 8.21L0.46 17.22L5.13 8.21L18.46 8.21L18.46 -7.33L-14.87 -7.33L-14.87 8.21Z",
    fillColor: 'white ',
    fillOpacity: .9,
    strokeColor:'blue',
    strokeWeight:2,
    anchor: new google.maps.Point(0,0),
  


}
  // Shapes define the clickable region of the icon. The type defines an HTML
  // <area> element 'poly' which traces out a polygon as a series of X,Y points.
  // The final coordinate closes the poly by connecting to the first coordinate.
  const shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: "poly",
  };

  for (let i = 0; i < beaches.length; i++) {
    const beach = beaches[i];
    new google.maps.Marker({
      position: { lat: beach[1], lng: beach[2]},
      map,
      content:"text",
      icon: icon,
      shape: shape,
      title: beach[0],
      zIndex: beach[3],

       label: {
      text: beach[0],
      
      fontSize: "15px",
      fontWeight: "bold",



    },
    });
  }

  const flightPlanCoordinates = [
    {lat:43.4238323795855, lng:-92.25144154036045},{lat:42.16628494059184, lng:-92.02072864973545} 
  ];

  const flightPath = new google.maps.Polyline({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 2,

  });
  flightPath.setMap(map);






      var arrayKordinat=[];
      var renk=[];
   <?php   for ($i = 0; $i <1; $i++) { ?>

arrayKordinat.push([<?php echo $kordinat[$i][5];?>]);

renk.push([<?php echo "'".$kordinat[$i][8]."'"; ?>]);

 <?php  } ?>
        for (let i = 0; i <uzun; i++) {

        const flightPath = new google.maps.Polyline({
          path: arrayKordinat[i],
          geodesic: true,
          strokeColor: renk[i],
          strokeOpacity: 1.0,
          strokeWeight: 2,
        });
        flightPath.setMap(map);
  }




              var infoWindow = new google.maps.InfoWindow();
             var latlngbounds = new google.maps.LatLngBounds();
       
            google.maps.event.addListener(map, 'click', function (e) {
                ar= e.latLng.lat() + "," + e.latLng.lng();
               
                document.getElementById("kor").value=ar;
            });


            
            google.maps.event.addListener(map, 'mouseover', function(e) {
                map.setOptions({draggableCursor:'crosshair'});
                map.setOptions({draggingCursor:'crosshair'});
              
            });




    for (let i = 0; i < beaches.length; i++) {


         var icond = {

    path: "M12.67 0.72C12.67 7.44 6.99 12.89 0 12.89C-6.99 12.89 -12.67 7.44 -12.67 0.72C-12.67 -5.99 -6.99 -11.44 0 -11.44C6.99 -11.44 12.67 -5.99 12.67 0.72Z",
    fillColor: '#F9FF9A ',
    fillOpacity: .9,
    strokeColor:'red',
    strokeWeight:2,
    anchor: new google.maps.Point(0,0),
  


}




  }


}


  








    </script>

<style type="text/css">
  
        #map {
             width: 100%; height: 650px; padding-bottom: 0px; margin-bottom: 0px;
           
        }
  
</style>





</head>
<body class="hold-transition sidebar-mini sidebar-collapse layout-navbar-fixed ">
<!-- Site wrapper -->
<div  >  

<?php 
    
 include("../include/navbar.php"); 
 include("../include/sidebar.php"); ?>
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div>
       
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
   



      <div class="card-body">
	  <div class="container-fluid">
	   <div class="row">

		     <div class="col-md-12">
               <div class="card card-primary">
            <div class="card-header"><h3 class='card-title'>Dipi Listesi</h3></div>
          
                <div id="map">


</div>
             
            </div>
          </div>
          </div>
          </div>
        </div>

        <!-- /.card-body -->
        <div class="card-footer">
             <!--  Footer Alanı -->
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include("../include/footer.php"); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
