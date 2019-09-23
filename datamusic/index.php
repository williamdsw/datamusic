<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- libs / css -->
        <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/form.css">
        <link rel="stylesheet" href="css/modals.css">
        
        <title> DataMusic - Login </title>
    </head>
    <body>
        <div id="container_form" class="container col-sm-12 col-md-6 offset-md-3 col-lg-4 offset-lg-4 bg-dark text-white">
            <form id="login_form">
                
                <!-- Header -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <h3 class="text-center"> DataMusic - Login </h3>
                        </div>
                    </div>
                </div> 
                
                <!-- Name -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"> Name: </label>
                            <input type="text" id="name" name="name" class="form-control dark-input" placeholder="Your Name" maxlength="20" required/>
                        </div>
                    </div>
                </div> 

                <!-- Password -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold"> Password: </label>
                            <input type="password" id="password" name="password" class="form-control dark-input" placeholder="Your Password" maxlength="20" required/>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary float-right square-button"> Submit </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- libs / js -->
        <script src="libs/jquery/jquery-3.4.0.min.js"></script>
        <script src="libs/popper/popper.min.js"></script>
        <script src="libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="js/login.js"></script>
        <script src="js/utilities.js"></script>
        
        <!-- modals -->
        <?php require_once ("components/modals.php"); ?>
    </body>
</html>