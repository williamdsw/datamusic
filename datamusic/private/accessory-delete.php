<?php
    if (isset ($_POST["accessory_id"]))
    {
        require_once ("connection.php");
        $retorno = array ();

        try
        {
            $connection = open_connection ();

            /* Parameters */
            $accessory_id = $_POST["accessory_id"];

            /* sql */
            $sql = " DELETE FROM accessory ";
            $sql .= " WHERE accessory_id = ? ";

            /* Bind parameters */
            $statement = $connection -> prepare ($sql);
            $executed = ($statement && ($statement -> bind_param ("i", $accessory_id)) && ($statement -> execute ()) && ($statement -> affected_rows === 1) ? true : false);
            $statement -> close ();

            /* Return */
            $retorno["success"] = $executed;
            $retorno["message"] = ($executed ? "Accessory deleted successfully!" : "System error, try again later");
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