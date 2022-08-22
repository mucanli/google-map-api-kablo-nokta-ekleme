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
         $kapasitearray=explode('|',$_POST['kapasite']);
        $renk=$kapasitearray[0];
        $kapasite=$kapasitearray[1];


        $isim=strtoupper($_POST['isim']);
        $tur=$_POST['tur'];
        $aciklama=$_POST['aciklama'];
        $hat=$_POST['hat'];
        $dolap=$_POST['dolap'];
        $santralno=$_POST['santralno'];
        $metre=$_POST['metre'];
        $kordinat=$_POST['kordinat'];
        $kordinat=str_replace('(', '{lat:', $kordinat);
        $kordinat=str_replace(', ', ', lng:', $kordinat);
        $kordinat=str_replace(')', '}', $kordinat);
        
      


        $ekle=$db->query("insert into kablo (kabloIsim,kapasite,cins,guzergah,kablokordinat,metre,renk,aciklama,dolap,santralno) value('$isim','$kapasite','$tur','$hat','$kordinat','$metre','$renk','$aciklama','$dolap','$santralno')");

        if($ekle){
         // echo "<script>window.location.href='kablo-ekle.php';</script>";
          header("location:kablo-ekle.php");
        } 

}






 // kablo sorgu
  $kablosql=$db->query("select* from kablo");
  $say=mysqli_num_rows($kablosql);

  while($kablo=mysqli_fetch_array($kablosql)){
    $kordinat[]=$kablo;
  }






?>

    <script>

      function haversine(kor){

km=kor.split(",");

var R = 6371; // km 
//has a problem with the .toRad() method below.
var dLat= (km[2]-km[0]) * Math.PI / 180; 
var dLon = (km[3]-km[1]) * Math.PI / 180;
var cLat1=km[0]*Math.PI/180;
var cLat2=km[2]*Math.PI/180;


var a = Math.sin(dLat/2) * Math.sin(dLat/2) +

 Math.cos(cLat1) * Math.cos(cLat2) *
  Math.sin(dLon/2) * Math.sin(dLon/2);
                
                  
var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
var m = (R * c)*1000; 

return m;
}

     
     var uzun=<?php echo $say;?>;

      
// The following example creates complex markers to indicate beaches near
// Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
// to the base of the flagpole.











function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 14,
    mapTypeId: "hybrid",
    center: { lat: 35.12884408857798, lng: 33.931506032617776 },

  });
  setMarkers(map);
  setCursor('crosshair');

}








// Data for the markers consisting of a name, a LatLng and a zIndex for the
// order in which these markers should display on top of each other.

function setMarkers(map) {
  // Adds markers to the map.
  // Marker sizes are expressed as a Size of X,Y where the origin of the image
  // (0,0) is located in the top left of the image.
  // Origins, anchor positions and coordinates of the marker increase in the X
  // direction to the right and in the Y direction down.
 




 /* var icon = {
    url: "https://telefonariza.online/g/mp2.png", // url
  
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0), // anchor
    
    color:'red',
};   */ 


var icon = {

    path: "M-20,0a20,20 0 1,0 40,0a20,20 0 1,0 -40,0",
    fillColor: '#fb7474 ',
    fillOpacity: .8,
    anchor: new google.maps.Point(0,0),
  
    strokeWeight: 2,
    scale: 1
}



  // Shapes define the clickable region of the icon. The type defines an HTML
  // <area> element 'poly' which traces out a polygon as a series of X,Y points.
  // The final coordinate closes the poly by connecting to the first coordinate.
  const shape = {
    coords: [1, 1, 1, 20, 18, 20, 18, 1],
    type: "poly",
  };

  
// kablo listesi gosterme

      var arrayKordinat=[];
      var renk=[];
      var tur=[];
      var not=[];
      var over=[];
   <?php   for ($i = 0; $i <$say; $i++) { ?>

arrayKordinat.push([<?php echo $kordinat[$i][4];?>]);


renk.push([<?php echo "'".$kordinat[$i][7]."'"; ?>]);
tur.push([<?php echo "'".$kordinat[$i][3]."'"; ?>]);
not.push([<?php echo "'Kablo ismi:".$kordinat[$i][1]."</br>Kapasite".$kordinat[$i][2]." </br> Metre:".$kordinat[$i][5]." </br>".$kordinat[$i][8]."'" ;?>]);
over.push([<?php echo "'".$kordinat[$i][2]." </br> Metre:".$kordinat[$i][5]."'" ;?>]);


 <?php  } ?>
 infowindow = new google.maps.InfoWindow();
        for (let i = 0; i < uzun; i++) {

         
            if(tur[i]=='Yeraltı'){
           var line = new google.maps.Polyline({
                path:arrayKordinat[i], 
                strokeColor: 'black',
         
                strokeWeight: 2
            });  line.setMap(map); }


        const flightPath = new google.maps.Polyline({
          path: arrayKordinat[i],
          geodesic: true,
          strokeColor: renk[i],
          strokeOpacity: 1.0,
          strokeWeight: 2,
        
        });
         
          
  google.maps.event.addListener(flightPath, 'mouseover', function(event) {
        infowindow.setContent(''+over[i]+'');
        infowindow.setPosition(event.latLng);
        infowindow.open(map);
        });

      
      
           google.maps.event.addListener(flightPath, 'click', function(event) {
        infowindow.setContent(''+not[i]+'');
        infowindow.setPosition(event.latLng);
        infowindow.open(map);
        });


google.maps.event.addListener(map, 'click', function(event) {
  
        infowindow.close(map);

    });

              flightPath.setMap(map);
    
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
<div>  

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
        <div class="card-header">
           <h2>Kablo Dökümü</h2>
        </div>
      <div class="card-body">
	  <div class="container-fluid">
	   <div class="row">

			
		     <div class="col-md-12">
               <div class="card card-primary">
            <div class="card-header"><h3 class='card-title'>Kablo Kordinat</h3></div>
          
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

</body>
</html>
