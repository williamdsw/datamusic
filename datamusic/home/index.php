<?php 
    session_start ();

    if (!isset ($_SESSION["user"]))
    {
        header ("location: index.php");
        exit;
    } 
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- libs / css -->
        <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/menu-bar.css">
        <link rel="stylesheet" href="../css/form.css">
        <link rel="stylesheet" href="../css/modals.css">
        <link rel="stylesheet" href="../css/main.css">
        
        <title> Datamusic </title>
    </head>
    <body>
        <!-- header -->
        <?php include_once ("../components/menu-bar.php") ?>
        
        <div id="container_form" class="container col-sm-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2 bg-dark text-white">
            <div class="row">
                <!-- Accessories -->
                <div class="last-list col-lg-4">
                    <h5> Last Accessories Created </h5>
                    <ul id="last_accessories" class="list-unstyled">
                    </ul>
                </div> 
                
                <!-- Instruments -->
                <div class="last-list col-lg-4">
                    <h5> Last Instruments Created </h5>
                    <ul id="last_instruments" class="list-unstyled">
                    </ul>
                </div>  
                
                <!-- Media -->
                <div class="last-list col-lg-4">
                    <h5> Last Media Created </h5>
                    <ul id="last_media" class="list-unstyled">
                    </ul>
                </div>  
            </div>            
            <div class="row">
                <div class="col-lg-12 mt-2 text-center">
                    <h4 id="counter"></h4>
                </div> 
            </div>
        </div>

        <!-- libs / js -->
        <script src="../libs/jquery/jquery-3.4.0.min.js"></script>
        <script src="../libs/popper/popper.min.js"></script>
        <script src="../libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>