<?php
    if (isset($_SESSION["user"])) {
        $user = $_SESSION["user"];
    }
?>

<!-- menu bar -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <section class="container">
        <div>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#movelmenu" aria-controls="movelmenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a id="link_brand" class="navbar-brand" href="../../home"> 
                DataMusic 
            </a>
        </div>

        <!-- content -->
        <div id="movelmenu" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">

                <!-- Acessories -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" 
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Accessories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown_accessories">
                        <a class="dropdown-item" href="../accessory/create/">
                            Create
                        </a>
                        <a class="dropdown-item" href="../accessory/search/">
                            Search
                        </a>
                    </div>
                </li>

                <!-- Instruments -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" 
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Instruments
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown_instruments">
                        <a class="dropdown-item" href="../instrument/create/"> 
                            Create 
                        </a>
                        <a class="dropdown-item" href="../instrument/search/"> 
                            Search 
                        </a>
                    </div>
                </li>

                <!-- Media -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" 
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Media
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown_media">
                        <a class="dropdown-item" href="../media/create/"> 
                            Create 
                        </a>
                        <a class="dropdown-item" href="../media/search/"> 
                            Search 
                        </a>
                    </div>
                </li>
            </ul>

            <!-- User Name -->
            <ul class="navbar-nav mr-5">
                <li class="nav-item">
                    <p class="font-weight-bold text-white my-3">
                        Welcome, <?php echo $user["name"]; ?> !
                    </p>
                </li>
            </ul>

            <!-- Logout -->
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="btn btn-secondary my-2 my-sm-0" href="../logout/"> 
                        Logout 
                    </a>
                </li>
            </ul>
        </div>
    </section>
</nav>