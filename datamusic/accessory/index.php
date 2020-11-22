<?php
    session_start ();

    if (!isset ($_SESSION["user"]))
    {
        header ("location: ../");
        exit;
    }
    else 
    {
        header ("location: search");
        exit;
    }
?>