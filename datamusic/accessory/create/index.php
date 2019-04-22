<?php require_once ("../../private/verify-session.php"); ?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- libs / css -->
        <link rel="stylesheet" href="../../libs/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/menu-bar.css">
        <link rel="stylesheet" href="../../css/form.css">
        <link rel="stylesheet" href="../../css/modals.css">
        
        <title> Create an Accessory Record </title>
    </head>
    <body>
        <!-- header -->
        <?php include_once ("../../components/menu-bar.php") ?>
        
        <div id="container_form" class="container col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 bg-dark text-white">
            <form id="create_form">
                
                <!-- Header -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <h3 class="text-center"> Create an Accessory Record </h3>
                        </div>
                    </div>
                </div> 
                
                <!-- Name -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold d-none d-sm-block"> *Name: </label>
                            <input type="text" id="name" name="name" class="form-control dark-input" placeholder="*Accessory's Name" maxlength="1000" required/>
                        </div>
                    </div>
                </div>  
                
                <!-- Description -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description" class="font-weight-bold d-none d-sm-block"> Description: </label>
                            <textarea id="description" name="description" class="form-control dark-input" placeholder="Accessory's Description" maxlength="1000"></textarea>
                        </div>
                    </div>
                </div>  
                                
                <!-- Brand -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="brand" class="font-weight-bold d-none d-sm-block"> *Brand: </label>
                            <input type="text" id="brand" name="brand" class="form-control dark-input" placeholder="*Accessory's Brand" maxlength="100" required/>
                        </div>
                    </div>
                </div> 
   
                <!-- Type -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="type" class="font-weight-bold d-none d-sm-block"> *Type: </label>
                            <select id="type" name="type" class="form-control dark-input" required>
                            </select>
                        </div>
                    </div>
                </div>  
                
                <!-- Price -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="price" class="font-weight-bold d-none d-sm-block"> Price: </label>
                            <input type="text" id="price" name="price" class="form-control dark-input" placeholder="20.5" maxlength="29"/>
                        </div>
                    </div>
                </div> 
                
                <!-- Quantity -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="quantity" class="font-weight-bold d-none d-sm-block"> Quantity: </label>
                            <input type="text" id="quantity" name="quantity" class="form-control dark-input" placeholder="10" maxlength="11"/>
                        </div>
                    </div>
                </div> 
                
                <!-- Required -->
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="font-weight-bold"> * Required fields: </label>
                        </div>
                    </div>
                </div> 
                
                <!-- Buttons -->
                <div class="row">
                    
                    <!-- Back -->
                    <div class="col-sm-2 mb-3 col-md-3 col-lg-2">
                        <a href="../search/" id="btn_back" class="btn btn-block btn-light float-left square-button"> Back </a>
                    </div>
                    
                    <!-- Reset -->
                    <div class="col-sm-2 mb-3 col-md-3 offset-md-1 col-lg-2 offset-lg-3">
                        <button type="reset" id="btn_reset" class="btn btn-block btn-secondary square-button"> Reset </button>
                    </div>
                    
                    <!-- Submit -->
                    <div class="col-sm-2 mb-3 col-md-3 offset-md-2 col-lg-2 offset-lg-3">
                        <button type="submit" id="btn_submit" class="btn btn-block btn-primary float-right square-button"> Submit </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- libs / js -->
        <script src="../../libs/jquery/jquery-3.4.0.min.js"></script>
        <script src="../../libs/popper/popper.min.js"></script>
        <script src="../../libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../js/utilities.js"></script>
        <script src="../../js/accessory-create.js"></script>
        
        <?php require_once ("../../components/modals.php"); ?>
    </body>
</html>