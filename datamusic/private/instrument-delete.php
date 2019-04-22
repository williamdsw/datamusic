<?php
    if (isset ($_POST["instrument_id"]))
    {
        require_once ("connection.php");
        $retorno = array ();

        try
        {
            $connection = open_connection ();

            /* Parameters */
            $instrument_id = $_POST["instrument_id"];

            /* sql */
            $sql = " DELETE FROM instrument ";
            $sql .= " WHERE instrument_id = ? ";

            /* Bind parameters */
            $statement = $connection -> prepare ($sql);
            $executed = ($statement && ($statement -> bind_param ("i", $instrument_id)) && ($statement -> execute ()) && ($statement -> affected_rows === 1) ? true : false);
            $statement -> close ();

            /* Return */
            $retorno["success"] = $executed;
            $retorno["message"] = ($executed ? "Instrument deleted successfully!" : "System error, try again later");
        }
        catch (Exception $exception)
        {
            $retorno["success"] = false;
            $retorno["message"] = $exception -> getMessage ();
        }
        finally
        {
            close_connection ($connection);
        }

        echo json_encode ($retorno);
    }
?>