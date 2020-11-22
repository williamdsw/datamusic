<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/form.css">
        <link rel="stylesheet" href="css/modals.css">
        <title> DataMusic - Login </title>
    </head>
    <body>
        <main class="container">
            <section class="col-lg-5 col-md-6 mx-auto my-5 bg-dark text-white form-container">
                <header>
                    <h1 class="text-center">
                        DataMusic 
                    </h1>
                </header>

                <hr class="bg-white">

                <form>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="font-weight-bold" for="nameInput"> 
                                    Name: 
                                </label>
                                <input type="text" id="nameInput" name="name" class="form-control dark-input" placeholder="Your Name" maxlength="20" required/>
                            </div>
                        </div>
                    </div> 

                    <!-- Password -->
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="font-weight-bold" for="passwordInput"> 
                                    Password: 
                                </label>
                                <input type="password" id="passwordInput" name="password" class="form-control dark-input" placeholder="Your Password" maxlength="20" required/>
                            </div>
                        </div>
                    </div>

                    <hr class="bg-white">

                    <!-- Submit -->
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-lg btn-secondary float-left square-button">
                                    Register
                                </button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-lg btn-primary float-right square-button"> 
                                    Submit 
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </main>

        <!-- libs / js -->
        <script src="libs/jquery/jquery-3.4.0.min.js"></script>
        <script src="libs/popper/popper.min.js"></script>
        <script src="libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="index.js"></script>
        <script src="js/utilities.js"></script>
        
        <!-- modals -->
        <?php require_once ("components/modals.php"); ?>
    </body>
</html>