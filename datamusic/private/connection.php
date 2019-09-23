<?php
    
    function open_connection ()
    {
        try
        {
            $server = "localhost";
            $user = "root";
            $password = "";
            $database = "datamusic";

            $connection = new mysqli ($server, $user, $password, $database);

            if ($connection -> connect_errno)
                die ("Error on server connection: " . $connection -> connect_errno);
        }
        catch (Exception $exception)
        {
            echo "Exception: " .  $exception -> getMessage ();
        }
        
        return $connection;
    }

    function close_connection ($connection)
    {
        $connection -> close ();
    } 
?>