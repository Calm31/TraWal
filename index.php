<!DOCTYPE html>
<html lang="en">
    <?php
        session_start();
        if(isset($_SESSION['users']))
        {
            header("refresh:0,url=users.php");
        }
        function succ()
        {
            echo"
                <script type='text/javascript'>
                document.getElementById('cor1').innerHTML='Account Registered succesfully ! ' ;
                </script>"
                ;
        }
        require_once('db.php');
        if(isset($_POST['name']))
            $name=mysqli_real_escape_string($stat,$_POST['name']);
        else
            $name="";
        if(isset($_POST['contact']))
            $contact=mysqli_real_escape_string($stat,$_POST['contact']);
        else
            $contact="";
        if(isset($_POST['email']))
            $email=mysqli_real_escape_string($stat,$_POST['email']);
        else
            $email="";
        $pass=$repass='';
    ?>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TraWal Login </title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body style="background-image: url('assets/img/1.jpg')">

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><b>TraWal Login</b></h1>
                            <div class="description">
                                <p><b>
                                    Locate and track your money usage !!
                                </b></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                            
                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>Login to our site</h3>
                                        <p>Enter username and password to log on:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <form role="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="login-form">
                                        <center><p id="incor2" style="color: red" class="error"></p>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-username">Username</label>
                                            <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">Password</label>
                                            <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                        </div>
                                        <button type="submit" name="signin" class="btn">Sign in!</button>
                                    </form>
                                </div>
                            </div>
                        
                            
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                            
                        <div class="col-sm-5">
                            
                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>Sign up now</h3>
                                        <p>Fill in the form below to get instant access:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <form role="form" action="" method="post" class="registration-form">
                                        <center><div id="incor1" class="error" style="color: red"></div>
                                            <div id="cor1" style="color:green"></div></center>
                                        
                                        <div class="form-group">
                                            <label class="sr-only" for="form-first-name">Name</label>
                                            <input type="text" name="name" placeholder="First name..." value="<?php echo $name?>" class="form-first-name form-control" id="form-first-name">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-email">Email</label>
                                            <input type="text" name="email" placeholder="Email..." value="<?php echo $email?>" class="form-email form-control" id="form-email">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-email">Contact No.</label>
                                            <input type="text" name="contact" placeholder="Contact No..." value="<?php echo $contact?>" class="form-email form-control" id="form-email">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">Password</label>
                                            <input type="password" name="password1" placeholder="Password..." class="form-password form-control" id="form-password">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">Re-type Password</label>
                                            <input type="password" name="password2" placeholder="Re-type Password..." class="form-password form-control" id="form-password">
                                        </div>
                                        <button type="submit" name="register" class="btn">Sign me up!</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
        <?php
            if(isset($_POST['register']))
            {
                $f=1;
                if(isset($_POST['name']))
                    $name=mysqli_real_escape_string($stat,$_POST['name']);
                else
                {
                    $f=0;
                    ?>
                    <script>
                        var msg="Name cannot be empty!!";
                    </script>
                    <?php
                }
                if(isset($_POST['email']))
                    $email=mysqli_real_escape_string($stat,$_POST['email']);
                else
                {
                    $f=0;
                    ?>
                    <script>
                        var msg="Email cannot be empty!!";
                    </script>
                    <?php
                }
                if(isset($_POST['contact']))
                    $contact=mysqli_real_escape_string($stat,$_POST['contact']);
                else
                {
                    $f=0;
                    ?>
                    <script>
                        var msg="Contact cannot be empty!!";
                    </script>
                    <?php
                }
                if(isset($_POST['password1']))
                    $pass=mysqli_real_escape_string($stat,$_POST['password1']);
                else
                {
                    $f=0;
                    ?>
                    <script>
                        var msg="Password cannot be empty!!";
                    </script>
                    <?php
                }
                if(isset($_POST['password2']))
                {
                    $repass=mysqli_real_escape_string($stat,$_POST['password2']);
                    if(strlen($pass)<6)
                    {
                        $f=0;
                        ?>
                        <script>
                            var msg="Password cannot be less than 6 letters...";
                        </script>
                        <?php
                    }
                    if($pass!=$repass)
                    {
                        
                        $f=0;
                        ?>
                        <script>
                            var msg="Password and Re-type password should be the same!";
                        </script>
                        <?php
                    }
                }
                else
                {
                    $f=0;
                    ?>
                    <script>
                        var msg="Re-type password cannot be empty!!";
                    </script>
                    <?php
                }
                if($f==1)
                {
                    require_once("db.php");
                    $query2="SELECT * FROM login where email='$email';";
                    $result2=mysqli_query($stat,$query2);
                    if(mysqli_num_rows($result2)!=0)
                    {
                        $f=0;
                        ?>
                        <script>
                            var msg="Account already registered!!";
                        </script>
                        <?php
                    }
                    else
                    {
                        $blowfish_salt=bin2hex(openssl_random_pseudo_bytes(22));
                        $hash=crypt($pass,"$2a$12$".$blowfish_salt);
                        $query3="INSERT INTO login VALUES(NULL,'$name','$email','$contact','$hash',0)";
                        $result3=mysqli_query($stat,$query3);
                        succ();
                    }
                }
                ?>
                <script>
                    if(msg!="")
                    {
                        document.getElementById("incor1").innerHTML="ERROR : "+msg ;
                    }
                </script>
                <?php
            }
            if(isset($_POST['signin']))
            {
                $f=1;
                if(isset($_POST['username']))
                    $username=mysqli_real_escape_string($stat,$_POST['username']);
                else
                {
                    $f=0;
                    ?>
                    <script>
                        var msg="Usename cannot be empty!!";
                    </script>
                    <?php
                }
                if(isset($_POST['password']))
                    $pass1=mysqli_real_escape_string($stat,$_POST['password']);
                else
                {
                    $f=0;
                    ?>
                    <script>
                        var msg="Password cannot be empty!!";
                    </script>
                    <?php
                }
                if($f==1)
                {
                    require_once("db.php");
                    $query3="SELECT * FROM login where email='$username';";
                    $result3=mysqli_query($stat,$query3);
                    if(mysqli_num_rows($result3)==0)
                    {
                        $f=0;
                        ?>
                        <script>
                            var msg="Account is not Registered!!";
                        </script>
                        <?php
                    }
                    
                    if($r=mysqli_fetch_array($result3))
                    {
                        if(crypt($pass1,$r['password'])==$r['password'])
                        { 
                            $_SESSION['users']=$r['id'];
                            echo "<meta http-equiv=\"refresh\" content=\"0;URL=users.php\">";
                        }
                        else
                        {
                            ?>
                            <script>
                                var msg="Password is incorrect !! ";
                            </script>
                            <?php
                        }
                    }
                }
                ?>
                <script>
                    if(msg!="")
                    {
                        document.getElementById("incor2").innerHTML="ERROR : "+msg ;
                    }
                    
                </script>
                <?php
            }                                                       
        ?>
        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>