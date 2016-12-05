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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content=""><meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>TraWal</title>
    <!--REQUIRED STYLE SHEETS-->
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-image: url('assets/img/1.jpg')">
    <?php
    require_once("navbar.php");
    ?>
  <div class="container" id="home">
        <div class="row text-left " >
    <br><br><br><br><br>
        <div style="border-width: 2px; border-color: black; border-style: solid; padding: 10px">
             <h2 style="color: black;font-size: 40px" ><b>About TraWal</b></h2>
             <br>
             <h3 style="color:black">
             <p>
             The place where all your money transactions get stored and tracked ! 
</p>
<p>
Know where and when you have spent your money and track down every penny that is valuable to you ! 
</p>
<p>
From money activities related to purchases to lending and borrowing, your secure 'bank' keeps a record of everything you need. So let's get rid of our tally books and switch to TraWal !
</p>

<p>
   Using TraWal is easy, private and very secure. All your data is secure with us and there is nothing to worry about, as everything has been encrypted. 
</p>

<p>
    This Project was developed by Abhiram M, Anirudh D, Gayathri, Ramanujan, Rohan Chandrasekar.
</p>

</h3>
             <br><br>
            </div> 
    
          </div>
    </div>
    <!--End Header section  -->


    <!--About Section-->
  
    <!--End About Section-->

    <!-- Services Section-->
    
     <!--End Services Section-->

    <!-- Free Section -->
    
    <!--End Free Section -->

    <!-- Contact Section -->
    
    <!--End Contact Section -->
    <!--footer Section -->
    <!--End footer Section -->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP CORE SCRIPT   -->
    <script src="assets/plugins/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
<?php
}
}
?>
</body>
</html>
