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
            $name = $_POST["name"];
            $description = $_POST["description"];
            $brand = $_POST["brand"];
            $type = $_POST["type"];
            $state = $_POST["state"];
            $price = $_POST["price"];
            $quantity = $_POST["quantity"];
            $last_changed = date ("Y-m-d H:i:s");

            /* sql */
            $sql = " UPDATE instrument ";
            $sql .= " SET name = ?, description = ?, brand = ?, ";
            $sql .= "     type = ?, state = ?, price = ?, quantity = ?, ";
            $sql .= "     last_changed = ? ";
            $sql .= " WHERE instrument_id = ? ";

            /* Bind parameters */
            $statement = $connection -> prepare ($sql);
            $executed = ($statement && ($statement -> bind_param ("sssssdisi", $name, $description, $brand, $type, $state, $price, $quantity, $last_changed, $instrument_id)) && ($statement -> execute ()) && ($statement -> affected_rows === 1) ? true : false);
            $statement -> close ();

            /* Return */
            $retorno["success"] = $executed;
            $retorno["message"] = ($executed ? "Instrument updated successfully!" : "System error, try again later");
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