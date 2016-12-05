<?php
    session_start();
    if(!isset($_SESSION['users']))
    {
      header("refresh:0,url=index.php");

    }
    else
    {
      require_once('db.php');
      $id=$_GET['id'];
      $type=$_GET['type'];
      $amount=$_GET['amount'];
      $tofrom=$_GET['tofrom'];
      $comment=$_GET['comment'];
      $lat=$_GET['lat'];
      $lang=$_GET['lang'];
      $add=$_GET['add'];
      $date=$_GET['date'];
      $month=$_GET['month'];
      $year=$_GET['year'];
      $f=1;
      if($type=="EARN")
      {
        $q="UPDATE login set `money`=`money`+'$amount' WHERE id='$id';";
        $r=mysqli_query($stat,$q);
    	  echo "Earning Successfully added!!";
      }
      else if($type=="SPENT")
      {
        $qe="SELECT * FROM login WHERE id='$id';";
        $re=mysqli_query($stat,$qe);
        if($ar=mysqli_fetch_array($re))
        {
          if($ar['money']>=$amount)
          {
              $q="UPDATE login set `money`=`money`-'$amount' WHERE id='$id';";
              $r=mysqli_query($stat,$q);
              echo "Spending Successfully added!!";    
          }
          else
          {
            $f=0;
            echo "<script type='text/javascript'>alert('Spending Amount is more than the Balance!!');</script>";
          }
        }
      }
      else if($type=="LENT")
      {
        $qe="SELECT * FROM login WHERE id='$id';";
        $re=mysqli_query($stat,$qe);
        if($ar=mysqli_fetch_array($re))
        {
          if($ar['money']>=$amount)
          {
              $q="UPDATE login set `money`=`money`-'$amount' WHERE id='$id';";
              $r=mysqli_query($stat,$q);
              echo "Lending Successfully added!!";    
          }
          else
          {
            $f=0;
            echo "<script type='text/javascript'>alert('Lending Amount is more than the Balance!!');</script>";
          }
        }
      }
      else if($type=="BORROW")
      {
        $q="UPDATE login set `money`=`money`+'$amount' WHERE id='$id';";
        $r=mysqli_query($stat,$q);
        echo "Borrowing Successfully added!!";    
      }
      if($f==1)
      {
        $q="INSERT INTO transfer VALUES(NULL,'$id','$type','$amount','$tofrom','$comment','$lat','$lang','$add','$date','$month','$year');";
        $r=mysqli_query($stat,$q);
      }
    }
  	?>
