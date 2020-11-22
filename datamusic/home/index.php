<?php 
    session_start ();

    if (!isset ($_SESSION["user"])) {
        header ("location: ../");
        exit;
    } 
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/menu-bar.css">
        <link rel="stylesheet" href="../css/form.css">
        <link rel="stylesheet" href="../css/modals.css">
        <link rel="stylesheet" href="../css/main.css">
    </head>
    <body>
        <main class="container">

            <!-- header -->
            <?php include_once ("../components/menu-bar.php") ?>

            <article class="col-12 bg-dark text-white form-container main-container">
                <div class="row">
                    <div class="last-list col-lg-4">
                        <header>
                            <h5> Last Accessories Created </h5>
                        </header>

                        <ul id="last_accessories" class="list-unstyled">
                        </ul>
                    </div>
                    <div class="last-list col-lg-4">
                        <header>
                            <h5> Last Instruments Created </h5>
                        </header>
                        
                        <ul id="last_instruments" class="list-unstyled">
                        </ul>
                    </div>
                    <div class="last-list col-lg-4">
                        <header>
                            <h5> Last Media Created </h5>
                        </header>
                        
                        <ul id="last_media" class="list-unstyled">
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-2 text-center">
                        <h4 id="counter"></h4>
                    </div> 
                </div>
            </article>
        </main>

        <!-- libs / js -->
        <script src="../libs/jquery/jquery-3.4.0.min.js"></script>
        <script src="../libs/popper/popper.min.js"></script>
        <script src="../libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="../services/acessory.service.js"></script>
        <script src="index.js"></script>
    </body>
</html>