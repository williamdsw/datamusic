<?php 
    if (isset ($_SESSION["user"]))
    {
        $user = $_SESSION["user"];
    }
?>

<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <section class="container">

        <!-- header -->
        <div>
            <!-- toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#movelmenu" aria-controls="movelmenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Brand -->
            <a id="link_brand" class="navbar-brand" href="../../main.php"> DataMusic </a>
        </div>

        <!-- content -->
        <div id="movelmenu" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">

                <!-- Acessories -->
                <li class="nav-item dropdown">
                    <a id="dropdown_accessories" class="nav-link dropdown-toggle" href="#" 
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Accessories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown_accessories">
                      <a id="link_accessory_create" class="dropdown-item" href="../../accessory/create/"> Create </a>
                      <a id="link_accessory_search" class="dropdown-item" href="../../accessory/search/"> Search </a>
                    </div>
                </li>

                <!-- Instruments -->
                <li class="nav-item dropdown">
                    <a id="dropdown_instruments" class="nav-link dropdown-toggle" href="#" 
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Instruments
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown_instruments">
                      <a id="link_instrument_create" class="dropdown-item" href="../../instrument/create/"> Create </a>
                      <a id="link_instrument_search" class="dropdown-item" href="../../instrument/search/"> Search </a>
                    </div>
                </li> 

                <!-- Media -->
                <li class="nav-item dropdown">
                    <a id="dropdown_media" class="nav-link dropdown-toggle" href="#" 
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Media
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown_media">
                      <a id="link_media_create" class="dropdown-item" href="../../media/create/"> Create </a>
                      <a id="link_media_create" class="dropdown-item" href="../../media/search/"> Search </a>
                    </div>
                </li>  
            </ul>                    

            <!-- User Name -->
            <ul class="navbar-nav mr-5">
                <li class="nav-item ">
                    <a id="nav_link_name" class="nav-link" href="#"> <?php echo $user["name"]; ?> </a>
                </li>  
            </ul>

            <!-- Logout -->
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a id="link_logout" class="btn btn-secondary my-2 my-sm-0" href="../../private/logout.php"> Logout </a>
                </li>
            </ul>
        </div>
    </section>
</nav>