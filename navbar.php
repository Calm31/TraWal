<?php
    if(!isset($_SESSION['users']))
    {
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php\">";
    }
    else
    {
        $id=$_SESSION['users'];
        require_once("db.php");
        $queryx="SELECT * FROM login where id='$id';";
        $resultx=mysqli_query($stat,$queryx);
        if($r=mysqli_fetch_array($resultx))
        {        
?>
<!-- Navigation -->
<style>
.dropdown-menu
{
    background-color:#444;
}
#content{
    -webkit-animation: fadein 0.8s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 0.8s; /* Firefox < 16 */
        -ms-animation: fadein 0.8s; /* Internet Explorer */
         -o-animation: fadein 0.8s; /* Opera < 12.1 */
            animation: fadein 0.8s;
}

@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}
</style>
<link href="assets/css/bootstrap-theme.css" rel="stylesheet">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="users.php"><div style="font-size: 25px;color: orange"> TraWal</div> </a>
            </div>

            <!-- Collect the nav links for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" >
                
                <ul class="nav navbar-nav navbar-left" style="margin-top:0px;">
                        <li><a href="users.php">HOME</a></li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li><a href="spent.php">SPEND</a></li>
                        <li><a href="lent.php">LEND</a></li>
                        <li><a href="earn.php">EARN</a></li>
                        <li><a href="borrow.php">BORROW</a></li>
                        <li><a href="reports.php">REPORTS</a></li>
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right" style="height:50px">
					 <li class="dropdown" >
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style=""><?php echo $r['name']." "; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" style="background-color:#444">
                            <li><a href="logout.php">Log Out</a></li>
                        </ul>
					</li>
                    </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!--End Navigation -->

<style>
/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url(images/loader-128x/loader1.gif) center no-repeat #fff;
    }
    </style>

    <script src="jquery.min.js"></script>
    <script src="modernizr.js"></script>
    <script>
        //paste this code under head tag or in a seperate js file.
        // Wait for window load
        $(window).load(function() {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>

    </head>

    <body>
        <!-- Paste this code after body tag -->
        
        <!-- Ends -->

    <div id="content">
    <div class="se-pre-con"></div>
    <!--Header section  -->
	<?php
}
}
?>