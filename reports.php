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
        $no=10;
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
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-image: url('assets/img/1.jpg')">
    <?php
    require_once("navbar.php");
    ?>

    
      <script type="text/javascript" src="webstore/js/jquery-1.7.2.min.js"></script> <!-- (do not call twice) --> 
      
      <!-- DC Instant.Webstore JS --> 
      <script src="webstore/js/jquery.instant.webstore.js"></script> 
      
      <!-- DC Instant.Webstore CSS -->
      <link rel="stylesheet" href="webstore/css/style.css">
      <br><br><br>
      <h1 style="color: black">REPORTS
      <div id="webstore">
        <ul id="webstore-navigation">
          <li><a class="current store-tab" href="#catalogue">DAILY</a></li>
          <li><a class="store-tab" href="#cart">MONTHLY</a></li>
          <li><a class="store-tab" href="#checkout">YEARLY</a></li>
        </ul>
        <div id="webstore-container">
          <div id="webstore-container-inner">
            <div class="webstore-clear" id="catalogue" >
                
                <br>
                <h1>DAILY Report</h1>
                <br><br>
                <form method="get" class="registration-form">
                  <div class="form-group">
                      <label for="cemail" class="control-label col-lg-offset-2 col-lg-4" style="margin-right: -200px;margin-left: 250px">Date <span class="required">*</span></label>
                      <div class="col-lg-3" style="margin: 10px">
                         <input id="datepicker" name="date"  class="form-control" />
                    </div>
                  </div>
                  <div class="form-group">
                      <div class="col-lg-offset-5 col-lg-8">
                          <button id="btn"  style="margin-left: 55px;color: black;width: 70px;background-color: #abcdef" class="btn btn-success">GO !</button>
                    </div>
                  </div>
                </form>
                <div class="row">
                    <div class="col-lg-offset-1 col-lg-10">
                        <div class="table-responsive">
                              <table class="table table-bordered table-hover table-striped" style="font-size: 15px">
                                  <tbody>
                                      <thead>
                                          <tr>
                                              <th  colspan="5"><h2><b>SPENDINGS</b></h2></th>
                                          </tr>
                                      </thead>
                                      <tr>  
                                          <td style="width: 5%; height:30px"><b> S.NO</b></td>
                                          <td style="width: 10%;"><b>DATE</b></td>
                                          <td><b>AMOUNT</b></td>
                                          <td><b>COMMENT</b></td>
                                          <td><b>ADDRESS</b></td>
                                      </tr>
                                      <?php
                                          require_once('db.php');
                                          if(isset($_GET['date'])&&$_GET['date']!="")
                                          {
                                              $d=$_GET['date'];
                                              $month=substr($d,0,2);
                                              $date=substr($d,3,2);
                                              $year=substr($d,6,4);
                                              $query="SELECT * from transfer where userid='$id' and type='SPENT' and date='$date' and month='$month' and year='$year' LIMIT $no;";
                                          }
                                          else
                                          {
                                            $query="SELECT * from transfer where userid='$id' and type='SPENT' ORDER by year DESC,month DESC ,date DESC LIMIT $no ;";
                                          }
                                          $result=mysqli_query($stat,$query); 
                                          $i=1;
                                          while($rows=mysqli_fetch_array($result))
                                          {
                                              
                                              ?>  <tr>
                                                      <td style="width: 5%; height:30px"><?php echo $i ?></td>
                                                      <td style="width: 10%;"><?php echo $rows['date'].'/'.$rows['month'].'/'.$rows['year'];?></td>
                                                      <td><?php echo $rows['amount'] ; ?></td>
                                                      <td><?php echo $rows['comment'] ; ?></td>
                                                      <td><?php echo str_replace('-', ' ', $rows['address']) ; ?></td>
                                                  </tr>
                                                  <?php    
                                                  $i++;
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
                                              <th  colspan="5"><h2><b>LENDINGS</b></h2></th>
                                          </tr>
                                      </thead>
                                      <tr>  
                                          <td style="width: 5%; height:30px"><b>S.NO</b></td>
                                          <td style="width: 10%;"><b>DATE</b></td>
                                          <td><b>AMOUNT</b></td>
                                          <td><b>LENT TO</b></td>
                                          <td><b>ADDRESS</b></td>
                                      </tr>
                                      <?php
                                          require_once('db.php');
                                          if(isset($_GET['date'])&&$_GET['date']!="")
                                          {
                                              $d=$_GET['date'];
                                              $month=substr($d,0,2);
                                              $date=substr($d,3,2);
                                              $year=substr($d,6,4);
                                              $query="SELECT * from transfer where userid='$id' and type='LENT' and date='$date' and month='$month' and year='$year' LIMIT $no;"; 
                                          }
                                          else
                                          {
                                              $query="SELECT * from transfer where userid='$id' and type='LENT' ORDER by year DESC,month DESC, date DESC LIMIT $no ;";
                                          }
                                          $result=mysqli_query($stat,$query); 
                                          $i=1;
                                          while($rows=mysqli_fetch_array($result))
                                          {
                                              
                                              ?>  <tr>
                                                      <td style="width: 5%; height:30px"><?php echo $i ?></td>
                                                      <td style="width: 10%;"><?php echo $rows['date'].'/'.$rows['month'].'/'.$rows['year'];?></td>
                                                      <td><?php echo $rows['amount'] ; ?></td>
                                                      <td><?php echo $rows['tofrom'] ; ?></td>
                                                      <td><?php echo str_replace('-', ' ', $rows['address']) ; ?></td>
                                                  </tr>
                                                  <?php    
                                                  $i++;
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
                                              <th  colspan="5"><h2><b>EARNINGS</b></h2></th>
                                          </tr>
                                      </thead>
                                      <tr>  
                                          <td style="width: 5%; height:30px"><b>S.NO</b></td>
                                          <td style="width: 10%;"><b>DATE</b></td>
                                          <td><b>AMOUNT</b></td>
                                          <td><b>COMMENT</b></td>
                                          <td><b>ADDRESS</b></td>
                                      </tr>
                                      <?php
                                          require_once('db.php');
                                          if(isset($_GET['date'])&&$_GET['date']!="")
                                          {
                                              $d=$_GET['date'];
                                              $month=substr($d,0,2);
                                              $date=substr($d,3,2);
                                              $year=substr($d,6,4);
                                              $query="SELECT * from transfer where userid='$id' and type='EARN' and date='$date' and month='$month' and year='$year' LIMIT $no;";
                                          }
                                          else
                                          {
                                              $query="SELECT * from transfer where userid='$id' and type='EARN' ORDER by year DESC,month DESC,date DESC  LIMIT $no;";
                                          }
                                          $result=mysqli_query($stat,$query); 
                                          $i=1;
                                          while($rows=mysqli_fetch_array($result))
                                          {
                                              
                                              ?>  <tr>
                                                      <td style="width: 5%; height:30px"><?php echo $i ?></td>
                                                      <td style="width: 10%;"><?php echo $rows['date'].'/'.$rows['month'].'/'.$rows['year'];?></td>
                                                      <td><?php echo $rows['amount'] ; ?></td>
                                                      <td><?php echo $rows['comment'] ; ?></td>
                                                      <td><?php echo str_replace('-', ' ', $rows['address']) ; ?></td>
                                                  </tr>
                                                  <?php    
                                                  $i++;
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
                                              <th  colspan="5"><h2><b>BORROWINGS</b></h2></th>
                                          </tr>
                                      </thead>
                                      <tr>  
                                          <td style="width: 5%; height:30px"><b>S.NO</b></td>
                                          <td style="width: 10%;"><b>DATE</b></td>
                                          <td><b>AMOUNT</b></td>
                                          <td><b>BORROWED FROM</b></td>
                                          <td><b>ADDRESS</b></td>
                                      </tr>
                                      <?php
                                          require_once('db.php');
                                          if(isset($_GET['date'])&&$_GET['date']!="")
                                          {
                                              $d=$_GET['date'];
                                              $month=substr($d,0,2);
                                              $date=substr($d,3,2);
                                              $year=substr($d,6,4);
                                              $query="SELECT * from transfer where userid='$id' and type='BORROW' and date='$date' and month='$month' and year='$year' LIMIT $no;";
                                          }
                                          else
                                          {
                                              $query="SELECT * from transfer where userid='$id' and type='BORROW' ORDER by year DESC,month DESC,date DESC LIMIT $no ;";
                                          }
                                          $result=mysqli_query($stat,$query); 
                                          $i=1;
                                          while($rows=mysqli_fetch_array($result))
                                          {
                                              
                                              ?>  <tr>
                                                      <td style="width: 5%; height:30px"><?php echo $i ?></td>
                                                      <td style="width: 10%;"><?php echo $rows['date'].'/'.$rows['month'].'/'.$rows['year'];?></td>
                                                      <td><?php echo $rows['amount'] ; ?></td>
                                                      <td><?php echo $rows['tofrom'] ; ?></td>
                                                      <td><?php echo str_replace('-', ' ', $rows['address']) ; ?></td>
                                                  </tr>
                                                  <?php    
                                                  $i++;
                                          }
                                          ?>
                                  </tbody>
                              </table>
                              </div>
                      
                    </div>
                </div>
                <h2><a href="daily.php">Click Here to View All</a></h2>
            </div>
            <div class="webstore-clear" id="cart">
              <br>
                <h1>MONTHLY Report</h1>
                <br><br>
                <form method="get" class="registration-form">
                  <div class="form-group">
                      <label for="cemail" class="control-label col-lg-offset-2 col-lg-4" style="margin-right: -200px;margin-left: 250px">Month <span class="required">*</span></label>
                      <div class="col-lg-3" style="margin: 10px">
                         <select name="month" class="form-control" >
                         <option selected disabled value="">Select a Month</option>
                              <?php
                              $i=1;
                              while($i<=12)
                              {
                                  $dateObj=DateTime::createFromFormat('!m', $i);
                                  $monthName = $dateObj->format('F');  
                                  ?>
                                  <option value="<?php echo $i; ?>"><?php echo $monthName;?></td>
                                  <?php

                                $i++;
                              }
                              ?>
                         </select>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="cemail" class="control-label col-lg-offset-2 col-lg-4" style="margin-right: -200px;margin-left: 250px">Year <span class="required">*</span></label>
                      <div class="col-lg-3" style="margin: 10px">
                         <select name="year" class="form-control" >
                         <option selected disabled value="">Select a Year</option>
                              <?php
                              $i=2015;
                              while($i<=2025)
                              {
                                  ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i;?></td>
                                  <?php

                                $i++;
                              }
                              ?>
                         </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                      <div class="col-lg-offset-5 col-lg-8">
                          <button id="btn"  style="margin-left: 55px;color: black;width: 70px;background-color: #abcdef" class="btn btn-success">GO !</button>
                    </div>
                  </div>
                </form>
                
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
                                              $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='SPENT' and month='$month' and year='$year' LIMIT $no ;";
                                          }
                                          else
                                          {
                                            $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='SPENT' GROUP BY year,month ORDER by year DESC,month DESC LIMIT $no ;";
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
                                              $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='LENT' and month='$month' and year='$year' LIMIT $no ;";
                                          }
                                          else
                                          {
                                            $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='LENT' GROUP BY year,month ORDER by year DESC,month DESC LIMIT $no ;";
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
                                              $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='EARN' and month='$month' and year='$year' LIMIT $no;";
                                          }
                                          else
                                          {
                                            $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='EARN' GROUP BY year,month ORDER by year DESC,month DESC LIMIT $no ;";
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
                                              $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='BORROW' and month='$month' and year='$year' LIMIT $no ;";
                                          }
                                          else
                                          {
                                            $query="SELECT SUM(AMOUNT) as sum,month,year from transfer where userid='$id' and type='BORROW' GROUP BY year,month ORDER by year DESC,month DESC LIMIT $no ;";
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
                  <h2><a href="monthly.php">Click Here to View All</a></h2>
            </div>
            <div class="webstore-clear" id="checkout">
                                <br>
                <h1>YEARLY Report</h1>
                <br><br>
                <form method="get" class="registration-form">
                  <div class="form-group">
                      <label for="cemail" class="control-label col-lg-offset-2 col-lg-4" style="margin-right: -200px;margin-left: 250px">Year <span class="required">*</span></label>
                      <div class="col-lg-3" style="margin: 10px">
                         <select name="year" class="form-control" >
                         <option selected disabled value="">Select a Year</option>
                              <?php
                              $i=2015;
                              while($i<=2025)
                              {
                                  ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i;?></td>
                                  <?php

                                $i++;
                              }
                              ?>
                         </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                      <div class="col-lg-offset-5 col-lg-8">
                          <button id="btn"  style="margin-left: 55px;color: black;width: 70px;background-color: #abcdef" class="btn btn-success">GO !</button>
                    </div>
                  </div>
                </form>
                
                <div class="row">
                    <div class="col-lg-offset-3 col-lg-6">
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
                                          <td style="width: 15%;"><b>YEAR</b></td>
                                          <td><b>AMOUNT</b></td>
                                      </tr>
                                      <?php
                                          require_once('db.php');
                                          if(isset($_GET['year'])&&$_GET['year']!="")
                                          {
                                              $year=$_GET['year'];
                                              $query="SELECT SUM(AMOUNT) as sum,year from transfer where userid='$id' and type='SPENT' and year='$year' LIMIT $no;";  
                                          }
                                          else
                                          { 
                                              $query="SELECT SUM(AMOUNT) as sum,year from transfer where userid='$id' and type='SPENT' GROUP BY year ORDER by year DESC LIMIT $no ;";
                                          }
                                          $result=mysqli_query($stat,$query); 
                                          $i=1;
                                          while($rows=mysqli_fetch_array($result))
                                          {
                                              
                                              ?>  <tr>
                                                      <td style="width: 5%; height:30px"><?php echo $i ?></td>
                                                      <td style="width: 15%;"><?php echo $rows['year'] ; ?></td>
                                                      <td><?php echo $rows['sum'] ; ?></td>
                                                  </tr>
                                                  <?php    
                                                  $i++;
                                          }
                                          ?>
                                  </tbody>
                              </table>
                              </div>
                      
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-offset-3 col-lg-6">
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
                                          <td style="width: 15%;"><b>YEAR</b></td>
                                          <td><b>AMOUNT</b></td>
                                      </tr>
                                      <?php
                                          require_once('db.php');
                                          if(isset($_GET['year'])&&$_GET['year']!="")
                                          {
                                              $year=$_GET['year'];
                                              $query="SELECT SUM(AMOUNT) as sum,year from transfer where userid='$id' and type='LENT' and year='$year' LIMIT $no;";  
                                          }
                                          else
                                          { 
                                              $query="SELECT SUM(AMOUNT) as sum,year from transfer where userid='$id' and type='LENT' GROUP BY year ORDER by year DESC LIMIT $no;";
                                          }
                                          $result=mysqli_query($stat,$query); 
                                          $i=1;
                                          while($rows=mysqli_fetch_array($result))
                                          {
                                              
                                              ?>  <tr>
                                                      <td style="width: 5%; height:30px"><?php echo $i ?></td>
                                                      <td style="width: 15%;"><?php echo $rows['year'] ; ?></td>
                                                      <td><?php echo $rows['sum'] ; ?></td>
                                                  </tr>
                                                  <?php    
                                                  $i++;
                                          }
                                          ?>
                                  </tbody>
                              </table>
                              </div>
                      
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-offset-3 col-lg-6">
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
                                          <td style="width: 15%;"><b>YEAR</b></td>
                                          <td><b>AMOUNT</b></td>
                                      </tr>
                                      <?php
                                          require_once('db.php');
                                          if(isset($_GET['year'])&&$_GET['year']!="")
                                          {
                                              $year=$_GET['year'];
                                              $query="SELECT SUM(AMOUNT) as sum,year from transfer where userid='$id' and type='EARN' and year='$year' LIMIT $no;";  
                                          }
                                          else
                                          { 
                                              $query="SELECT SUM(AMOUNT) as sum,year from transfer where userid='$id' and type='EARN' GROUP BY year ORDER by year DESC LIMIT $no;"; 
                                          }
                                          $result=mysqli_query($stat,$query); 
                                          $i=1;
                                          while($rows=mysqli_fetch_array($result))
                                          {
                                              
                                              ?>  <tr>
                                                      <td style="width: 5%; height:30px"><?php echo $i ?></td>
                                                      <td style="width: 15%;"><?php echo $rows['year'] ; ?></td>
                                                      <td><?php echo $rows['sum'] ; ?></td>
                                                  </tr>
                                                  <?php    
                                                  $i++;
                                          }
                                          ?>
                                  </tbody>
                              </table>
                              </div>
                      
                    </div>
                </div> 


                <div class="row">
                    <div class="col-lg-offset-3 col-lg-6">
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
                                          <td style="width: 15%;"><b>YEAR</b></td>
                                          <td><b>AMOUNT</b></td>
                                      </tr>
                                      <?php
                                          require_once('db.php');
                                          if(isset($_GET['year'])&&$_GET['year']!="")
                                          {
                                              $year=$_GET['year'];
                                              $query="SELECT SUM(AMOUNT) as sum,year from transfer where userid='$id' and type='BORROW' and year='$year' LIMIT $no;";  
                                          }
                                          else
                                          { 
                                              $query="SELECT SUM(AMOUNT) as sum,year from transfer where userid='$id' and type='BORROW' GROUP BY year ORDER by year DESC LIMIT $no;";
                                          }
                                          $result=mysqli_query($stat,$query); 
                                          $i=1;
                                          while($rows=mysqli_fetch_array($result))
                                          {
                                              
                                              ?>  <tr>
                                                      <td style="width: 5%; height:30px"><?php echo $i ?></td>
                                                      <td style="width: 15%;"><?php echo $rows['year'] ; ?></td>
                                                      <td><?php echo $rows['sum'] ; ?></td>
                                                  </tr>
                                                  <?php    
                                                  $i++;
                                          }
                                          ?>
                                   
                                  </tbody>
                              
                              </table>
                            
                              </div>
                        <h2><a href="yearly.php">Click Here to View All</a></h2>
                    </div>
                </div>

            </div>
          </div>
        </div>
      </div>
      </h1>
        
    </div>
  </div>
</section>
<script type="text/javascript">
                         $x=jQuery.noConflict();
$x('#cart-list').instant('webstore', {

                         
                        // PAYMENT SETTINGS
                        // To configure advanced settings, edit dcodes/webstore/js/jquery.instant.webstore.js
                         
                            sandbox: false, // enable sandbox to test payment without incurring real charges. Set to false to accept real payments.
                            authorizeNetSignature: 'http://yourdomain.com/dcodes/webstore/authorize.net.php', // return path to authorize.net.php. Make sure you edit this file located in /webstore/authorize.net.php to configure your Authorize.Net login/key
                            paypaluser: 'paypal', // enter your paypal username, for example if your paypal address is paypal@mydomain.com, enter "paypal" here
                            paypaldomain: 'example.com', // enter your paypal domain, for example if your paypal address is paypal@mydomain.com, enter "mydomain.com" here
                            skrilluser: '', // enter your skrill (moneybookers) user name
                            skrilldomain: '', // enter your skrill (moneybookers) domain name
                            amazonmerchant: '', // enter your amazon payments username/id
                            googlemerchant: '', // enter your google checkout username/id
                            returnurl: 'http://www.yourdomain.com/thankyou-for-your-order.html', // enter your return URL here after payment success. Return URL should be a thank you/confirmation page.
                            properties: [ 'thumb', 'title', 'description' ],
                            cartitem: '<div class="left"><img src="{thumb}"></div>'
                                + '<div class="right">'
                                + '<span class="title">{title}</span>'
                                + '<span class="description">{description}<span class="gradient"></span></span>'
                                + '<input class="quantity" value="{quantity}">'
                                + '<span class="price"><small><span>{pricesingle}</span></small><span>{pricetotal}</span></span>'
                                + '</div>',
                            discountCodes: { // define coupon codes here
                                '10PERCENT': '10%', // coupon code is 10PERCENT, discount items by 10%
                                '10DOLLARS': 10, // coupon code is 10DOLLARS, discount items by $10
                                '2FOR10': function () { // coupon code is 2FOR10, let users select any two items for $10
                                    return this.quantity === 2 ? (this.subtotal + this.shipping + this.tax) - 10 : 0;
                                },
                                'FREESHIPPINGOVER100': function () { // make shipping free if users spend over $100
                                    return this.subtotal > 100 ? this.shipping : 0;
                                }
                            },
                                     
                            geolocation: true, // Set this to true to use instant.webstore's experimental geolocation, which utilizes services of geoplugin.com, a third-party provider.
                         
                         // tax shipping: enable/disable tax on shipping (edit in dcodes/webstore/js/jquery.instant.webstore.js)
                                     
                            shippingType: 'flat', // 'flat' = flat rate shipping fee, 'fixed' = fixed fee per item, 'range', or 'variable' = % based on cost of shopping cart total (e.g. 0.10 = 10%)
                                     
                            shippingRate: {
                                'USPS': 9.95, // 9.95 = $9.95 (fixed) / 0.10 = 10% (variable)
                                'UPS Ground': 14.95,
                                'FedEx Express': 21.95
                            }
                        });
                        </script>


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
}
}
?>
</body>
</html>
