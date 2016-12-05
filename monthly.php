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
    <center><h1 style="color: black">Monthly Report</h1></center>
        
                <div class="row">
                    <div class="col-lg-offset-1 col-lg-10">
                        <div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped" style="font-size: 15px">
                                  <tbody>
                                      <thead>
                                          <tr>
                                              <th colspan="4"><h2><b>SPENDINGS</b></h2></th>
                                          </tr>
                                      </thead>
                                      <tr>  
                                          <td style="width: 5%; height:30px"><b>S.NO</b></td>
                                          <td style="width: 10%;"><b>MONTH</b></td>
                                          <td><b>YEAR</b></td>
                                          <td><b>AMOUNT</b></td>
                                      </tr>
                                      <?php
                                          require_once('db.php');
                                          if(isset($_GET['month'])&&isset($_GET['year'])&&$_GET['year']!=""&&$_GET['month']!="")
                                          {
                                              $month=$_GET['month'];
                                              $year=$_GET['year'];
                                              $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='SPENT' and month='$month' and year='$year' ;";
                                          }
                                          else
                                          {
                                            $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='SPENT' GROUP BY year,month ORDER by year DESC,month DESC ;";
                                          }
                                          $result=mysqli_query($stat,$query); 
                                          $i=1;
                                          while($rows=mysqli_fetch_array($result))
                                          {
                                              if($rows['month']>0&&$rows['month']<=12)
                                              {
                                              ?>  <tr>
                                                      <td style="width: 5%; height:30px"><?php echo $i ?></td>
                                                      <td style="width: 10%;"><?php 
                                                      
                                                        $dateObj   = DateTime::createFromFormat('!m', $rows['month']);
                                                          $monthName = $dateObj->format('F');  echo $monthName;
                                                          ?></td>
                                                      <td><?php echo $rows['year'] ; ?></td>
                                                      <td><?php echo $rows['sum'] ; ?></td>
                                                  </tr>
                                                  <?php    
                                                  $i++;
                                                }
                                          }
                                          ?>
                                  </tbody>
                              </table>
                              </div>
                      
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-offset-1 col-lg-10">
                        <div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped" style="font-size: 15px">
                                  <tbody>
                                      <thead>
                                          <tr>
                                              <th colspan="4"><h2><b>LENDING</b></h2></th>
                                          </tr>
                                      </thead>
                                      <tr>  
                                          <td style="width: 5%; height:30px"><b>S.NO</b></td>
                                          <td style="width: 10%;"><b>MONTH</b></td>
                                          <td><b>YEAR</b></td>
                                          <td><b>AMOUNT</b></td>
                                      </tr>
                                      <?php
                                          require_once('db.php');
                                          if(isset($_GET['month'])&&isset($_GET['year'])&&$_GET['year']!=""&&$_GET['month']!="")
                                          {
                                              $month=$_GET['month'];
                                              $year=$_GET['year'];
                                              $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='LENT' and month='$month' and year='$year' ;";
                                          }
                                          else
                                          {
                                            $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='LENT' GROUP BY year,month ORDER by year DESC,month DESC ;";
                                          }
                                          $result=mysqli_query($stat,$query); 
                                          $i=1;
                                          while($rows=mysqli_fetch_array($result))
                                          {
                                              if($rows['month']>0&&$rows['month']<=12)
                                              {
                                              ?>  <tr>
                                                      <td style="width: 5%; height:30px"><?php echo $i ?></td>
                                                      <td style="width: 10%;"><?php 
                                                      
                                                        $dateObj   = DateTime::createFromFormat('!m', $rows['month']);
                                                          $monthName = $dateObj->format('F');  echo $monthName;
                                                          ?></td>
                                                      <td><?php echo $rows['year'] ; ?></td>
                                                      <td><?php echo $rows['sum'] ; ?></td>
                                                  </tr>
                                                  <?php    
                                                  $i++;
                                                }
                                          }
                                          ?>
                                  </tbody>
                              </table>
                              </div>
                      
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-offset-1 col-lg-10">
                        <div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped" style="font-size: 15px">
                                  <tbody>
                                      <thead>
                                          <tr>
                                              <th colspan="4"><h2><b>EARNINGS</b></h2></th>
                                          </tr>
                                      </thead>
                                      <tr>  
                                          <td style="width: 5%; height:30px"><b>S.NO</b></td>
                                          <td style="width: 10%;"><b>MONTH</b></td>
                                          <td><b>YEAR</b></td>
                                          <td><b>AMOUNT</b></td>
                                      </tr>
                                      <?php
                                          require_once('db.php');
                                          if(isset($_GET['month'])&&isset($_GET['year'])&&$_GET['year']!=""&&$_GET['month']!="")
                                          {
                                              $month=$_GET['month'];
                                              $year=$_GET['year'];
                                              $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='EARN' and month='$month' and year='$year';";
                                          }
                                          else
                                          {
                                            $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='EARN' GROUP BY year,month ORDER by year DESC,month DESC ;";
                                          }
                                          $result=mysqli_query($stat,$query); 
                                          $i=1;
                                          while($rows=mysqli_fetch_array($result))
                                          {
                                              if($rows['month']>0&&$rows['month']<=12)
                                              {
                                              ?>  <tr>
                                                      <td style="width: 5%; height:30px"><?php echo $i ?></td>
                                                      <td style="width: 10%;"><?php 
                                                      
                                                        $dateObj   = DateTime::createFromFormat('!m', $rows['month']);
                                                          $monthName = $dateObj->format('F');  echo $monthName;
                                                          ?></td>
                                                      <td><?php echo $rows['year'] ; ?></td>
                                                      <td><?php echo $rows['sum'] ; ?></td>
                                                  </tr>
                                                  <?php    
                                                  $i++;
                                                }
                                          }
                                          ?>
                                  </tbody>
                              </table>
                              </div>
                      
                    </div>
                </div> 


                <div class="row">
                    <div class="col-lg-offset-1 col-lg-10">
                        <div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped" style="font-size: 15px">
                                  <tbody>
                                      <thead>
                                          <tr>
                                              <th colspan="4"><h2><b>BORROWING</b></h2></th>
                                          </tr>
                                      </thead>
                                      <tr>  
                                          <td style="width: 5%; height:30px"><b>S.NO</b></td>
                                          <td style="width: 10%;"><b>MONTH</b></td>
                                          <td><b>YEAR</b></td>
                                          <td><b>AMOUNT</b></td>
                                      </tr>
                                      <?php
                                          require_once('db.php');
                                          if(isset($_GET['month'])&&isset($_GET['year'])&&$_GET['year']!=""&&$_GET['month']!="")
                                          {
                                              $month=$_GET['month'];
                                              $year=$_GET['year'];
                                              $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='BORROW' and month='$month' and year='$year' ;";
                                          }
                                          else
                                          {
                                            $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='BORROW' GROUP BY year,month ORDER by year DESC,month DESC ;";
                                          }
                                          $result=mysqli_query($stat,$query); 
                                          $i=1;
                                          while($rows=mysqli_fetch_array($result))
                                          {
                                              if($rows['month']>0&&$rows['month']<=12)
                                              {
                                              ?>  <tr>
                                                      <td style="width: 5%; height:30px"><?php echo $i ?></td>
                                                      <td style="width: 10%;"><?php 
                                                      
                                                        $dateObj   = DateTime::createFromFormat('!m', $rows['month']);
                                                          $monthName = $dateObj->format('F');  echo $monthName;
                                                          ?></td>
                                                      <td><?php echo $rows['year'] ; ?></td>
                                                      <td><?php echo $rows['sum'] ; ?></td>
                                                  </tr>
                                                  <?php    
                                                  $i++;
                                                }
                                          }
                                          ?>
                                  </tbody>
                              </table>
                              </div>
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
