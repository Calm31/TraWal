<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<?php
    session_start();
    if(!isset($_SESSION['users']))
    {
      header("refresh:0,url=index.php");
    }
    else
    {
      require_once('db.php');
      $id=$_SESSION['users'];
      $query="SELECT * FROM login where id='$id';";
      $result=mysqli_query($stat,$query);
      if($r1=mysqli_fetch_array($result))
      {
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>TraWal</title>
    <!--REQUIRED STYLE SHEETS-->
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
  
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    
</head>
<body style="background-image: url('assets/img/1.jpg')">>
     <?php
    require_once("navbar.php");
    ?>
          <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyB4zs3DVPbX6DvZEeTAI9EanzAIU3lTAQ8'></script> 
      <br><br><br><br>
    <h1 style="color:black">LENDINGS</h1>
    <div id="demo" style="color: green;font-size: 20px;">
    </div>
    <div class="container" id="home">
          <div class="row">
              <div class="col-lg-6">

                    <div class="panel-body">
                        <div class="form">
                               <div class="form-group " >
                                    <label for="cname" class="control-label col-lg-10">Amount Lent <span class="required">*</span></label>
                                    <div class="col-lg-10" style="margin: 10px">
                                        <input class="form-control" id="amount" type="number" min=0 required />
                                    </div>
                                </div>
                                <div class="form-group "  >
                                    <label for="cemail" class="control-label col-lg-10"> Person Lent To <span class="required">*</span></label>
                                    <div class="col-lg-10" style="margin: 10px">
                                        <input class="form-control" type="text" id="tofrom" required />
                                    </div>
                                </div>
                                <div class="form-group "  >
                                    <label for="cemail" class="control-label col-lg-10">Address (city, state, country)<span class="required">*</span></label>
                                    <div class="col-lg-10" style="margin: 10px">
                                    <div>
                                      <div style="float: left"><input class="form-control" id="address" name="address" style="width: 180%" type="text" required ></div><div style="float: right"><button id="map"><i class="fa fa-map-marker" style="font-size:30px;color: blue"></i></button></div>
                                    </div>
                                    </div>
                                </div>
                                <img scr="assets/img/1.jpg" style="height:30px">
                                <div class="form-group">
                                    <label for="cemail" class="control-label col-lg-10">Date <span class="required">*</span></label>
                                    <div class="col-lg-10" style="margin: 10px">
                                       <input id="datepicker"  class="form-control" />
                                  </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                       <button id="btn"  style="margin-left: -200px;margin-top: 40px" class="btn">SAVE</button>
                                    </div>
                                </div>  
                                <div>
                                 <input type="text" id="latitude" name="latitude"  readonly=""  hidden="" />
                                 <input type="text" id="longitude" name="longitude" readonly=""  hidden="" /> 
                              </div>
                                
                                
                        </div>
                      </div>
                      </div>
                      <div class="col-lg-5">
                          <div class="maps">   
                            <div class ="maps-1" style="overflow:hidden;width:100%;height:100%;"> 
                              <div id='gmap_canvas' style="height:400px;width:450px;"></div>

                              <style>
                              #gmap_canvas img
                              {
                                max-width:none!important;
                                background:none!important
                              }
                              </style>
                            </div>
                            
                    
                      </div>
                  
              </div>
          </div>
          <script type='text/javascript'>
          /* This showResult function is used as the callback function*/
          var lat,lang,amount,tofrom,date,month,year;
            function showResult(result,address) {
                lat=document.getElementById('latitude').value = result.geometry.location.lat();
                lang=document.getElementById('longitude').value = result.geometry.location.lng();
                var myOptions = {zoom:16,center:new google.maps.LatLng(lat,lang),mapTypeId: google.maps.MapTypeId.ROADMAP};
                map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(lat,lang)});
                infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>'+address+'<br>'});
                google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
                infowindow.open(map,marker);
                load(address);
            }
            function show(result,address) {
                lat=document.getElementById('latitude').value = result.geometry.location.lat();
                lang=document.getElementById('longitude').value = result.geometry.location.lng();
                var myOptions = {zoom:16,center:new google.maps.LatLng(lat,lang),mapTypeId: google.maps.MapTypeId.ROADMAP};
                map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(lat,lang)});
                infowindow = new google.maps.InfoWindow({content:'<strong>Title</strong><br>'+address+'<br>'});
                google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});
                infowindow.open(map,marker);
            }
            function load(address)
            {
                address=address.split(' ').join('-');
                $('#demo').load("transfer.php?id=<?php echo $id;?>&type=LENT&amount="+amount+"&tofrom="+tofrom+"&comment=&lat="+lat+"&lang="+lang+"&add="+address+"&date="+date+"&month="+month+"&year="+year);
                location.reload();
            }
            function getLatitudeLongitude(callback, address) {
                // If adress is not supplied, use default value 'Ferrol, Galicia, Spain'
                address = address || 'Chennai, India';
                // Initialize the Geocoder
                geocoder = new google.maps.Geocoder();
                if (geocoder) {
                    geocoder.geocode({
                        'address': address
                    }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            callback(results[0],address);
                        }
                    });
                }
            }
            function getLOC(callback, address) {
                // If adress is not supplied, use default value 'Ferrol, Galicia, Spain'
                address = address || 'Chennai, India';
                // Initialize the Geocoder
                geocoder = new google.maps.Geocoder();
                if (geocoder) {
                    geocoder.geocode({
                        'address': address
                    }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            callback(results[0],address);
                        }
                    });
                }
            }
            var button = document.getElementById('btn');
            button.addEventListener("click", function () {
                var address = document.getElementById('address').value;
                amount=document.getElementById('amount').value;
                tofrom=document.getElementById('tofrom').value;
                var d=document.getElementById('datepicker').value;
                month=d.substr(0,2);
                date=d.substr(3,2);
                year=d.substr(6,4);
                if(address!=""&&amount!=""&&tofrom!=""&&d!="")
                {
                  getLatitudeLongitude(showResult, address);
                }
                else
                {
                  alert("Enter all details!!");
                }
            });
            var button = document.getElementById('map');
            button.addEventListener("click", function () {
                var address = document.getElementById('address').value;
                if(address!="")
                {
                  getLOC(show, address);
                }
                else
                {
                  alert("Enter address!!");
                }
            });
              
              //google.maps.event.addDomListener(window, 'load', init_map);
              
          </script>
      </div>
      <!--End footer Section -->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP CORE SCRIPT   -->
    <script src="assets/plugins/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script>
    $(document).ready(function() {
      $("#datepicker").datepicker();
    });
    </script>

<?php
}}
?>  
</body>
</html>
