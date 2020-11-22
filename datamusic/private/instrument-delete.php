<?php
    if (isset ($_POST["instrument_id"]))
    {
        require_once ("connection.php");
        $data = array ();

        try
        {
            $connection = open_connection ();

            // Parameters
            $instrument_id = $_POST["instrument_id"];

            // SQL query
            $query = " DELETE FROM instrument ";
            $query .= " WHERE instrument_id = ? ";

            // Bind parameters
            $statement = $connection -> prepare ($query);
            $executed = ($statement && ($statement -> bind_param ("i", $instrument_id)) && ($statement -> execute ()) && ($statement -> affected_rows === 1) ? true : false);
            $statement -> close ();

            // Data
            $data["success"] = $executed;
            $data["message"] = ($executed ? "Instrument deleted successfully!" : "System error, try again later");
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