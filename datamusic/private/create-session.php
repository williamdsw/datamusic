<?php
    if (isset ($_POST["user"]))
    {
        // User's session
        $user = $_POST["user"];
        session_start ();
        $_SESSION["user"] = json_decode ($user, true);
        echo "logged";
    }
?>