<?php
    if (isset ($_POST["media_id"]))
    {
        require_once ("connection.php");
        $data = array ();

        try
        {
            $connection = open_connection ();

            // Parameters
            $media_id = $_POST["media_id"];

            // SQL query
            $query = " DELETE FROM media ";
            $query .= " WHERE media_id = ? ";

            // Bind parameters
            $statement = $connection -> prepare ($query);
            $executed = ($statement && ($statement -> bind_param ("i", $media_id)) && ($statement -> execute ()) && ($statement -> affected_rows === 1) ? true : false);
            $statement -> close ();

            // Data
            $data["success"] = $executed;
            $data["message"] = ($executed ? "Media deleted successfully!" : "System error, try again later");
        }
        catch (Exception $exception)
        {
            $data["success"] = false;
            $data["message"] = $exception -> getMessage ();
        }
        finally
        {
            close_connection ($connection);
        }

        echo json_encode ($data);
    }
?>