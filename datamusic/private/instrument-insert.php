<?php
    if (isset ($_POST["name"]))
    {
        require_once ("connection.php");
        $retorno = array ();

        try
        {
            $connection = open_connection ();

            /* Parameters */
            $name = $_POST["name"];
            $description = $_POST["description"];
            $brand = $_POST["brand"];
            $type = $_POST["type"];
            $state = $_POST["state"];
            $price = $_POST["price"];
            $quantity = $_POST["quantity"];
            $last_changed = date ("Y-m-d H:i:s");

            /* sql */
            $sql = " INSERT INTO instrument ";
            $sql .= " (name, description, brand, type, state, price, quantity, last_changed) ";
            $sql .= " VALUES ";
            $sql .= " (?, ?, ?, ?, ?, ?, ?, ?) ";

            /* Bind parameters */
            $statement = $connection -> prepare ($sql);
            $executed = ($statement && ($statement -> bind_param ("sssssdis", $name, $description, $brand, $type, $state, $price, $quantity, $last_changed)) && ($statement -> execute ()) ? true : false);
            $statement -> close ();

            /* Return */
            $retorno["success"] = $executed;
            $retorno["message"] = ($executed ? "Instrument inserted successfully!" : "System error, try again later");
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