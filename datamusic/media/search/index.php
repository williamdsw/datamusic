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
        <link rel="stylesheet" href="../../css/table.css">
        <link rel="stylesheet" href="../../css/form.css">
        <link rel="stylesheet" href="../../css/modals.css">
        
        <title> Search an Media Record </title>
    </head>
    <body>
        <!-- header -->
        <?php include_once ("../../components/menu-bar.php") ?>
        
        <div id="container_table" class="container col-sm-12 col-md-8 offset-md-2 col-lg-10 offset-lg-1 bg-dark text-white">
            
            <div class="">
                <div class="form-group">
                    <div class="input-group">
                        
                        <!-- Columns -->
                        <span class="input-group-btn">
                            <select id="column" class="form-control dark-input">
                                <option value=""> None </option>
                                <option value="name"> Name </option>
                                <option value="artist"> Artist </option>
                                <option value="description"> Description </option>
                                <option value="genre"> Genre </option>
                                <option value="type"> Type </option>
                                <option value="state"> State </option>
                                <option value="price"> Price </option>
                                <option value="quantity"> Quantity </option>
                                <option value="language"> Language </option>
                            </select>
                        </span>
                        
                        <!-- Value -->
                        <input type="search" id="content" class="form-control dark-input" placeholder="Content">

                        <!-- Button -->
                        <span class="input-group-btn">
                            <button type="button" id="btn_search" class="btn btn-light"> Search </button>
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- caption (header) -->
            <h3 class="text-center"> List of Media Records </h3>
            
            <div class="table-responsive">
                
                <!-- table -->
                <table id="table_media" class="table table-sm table-striped table-dark">
                    
                    <!-- Headers -->
                    <thead>
                        <th scope="col"> # </th>
                        <th scope="col"> Name </th>
                        <th scope="col"> Artist </th>
                        <th scope="col"> Description </th>
                        <th scope="col"> Genre </th>
                        <th scope="col"> Type </th>
                        <th scope="col"> State </th>
                        <th scope="col"> Price </th>
                        <th scope="col"> Quantity </th>
                        <th scope="col"> Language </th>
                        <th scope="col"> Last Changed </th>
                    </thead>   

                    <!-- Data -->
                    <tbody>
                    </tbody>
                </table>
            </div>
            
            <!-- buttons -->
            <div class="text-center mt-3">
                <a href="" id="btn_delete" class="btn btn-lg btn-danger disabled"> Delete </a> 
                <a href="" id="btn_update" class="btn btn-lg btn-secondary disabled"> Update </a> 
                <a href="../create/" class="btn btn-lg btn-primary"> New </a> 
            </div>
        </div>

        <!-- libs / js -->
        <script src="../../libs/jquery/jquery-3.4.0.min.js"></script>
        <script src="../../libs/popper/popper.min.js"></script>
        <script src="../../libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../js/utilities.js"></script>
        <script src="../../js/media-search.js"></script>
        
        <?php require_once ("../../components/modals.php"); ?>
    </body>
</html>