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
            $price = $_POST["price"];
            $quantity = $_POST["quantity"];
            $last_changed = date ("Y-m-d H:i:s");

            /* sql */
            $sql = " INSERT INTO accessory ";
            $sql .= " (name, description, brand, type, price, quantity, last_changed) ";
            $sql .= " VALUES ";
            $sql .= " (?, ?, ?, ?, ?, ?, ?) ";

            /* Bind parameters */
            $statement = $connection -> prepare ($sql);
            $executed = ($statement && ($statement -> bind_param ("ssssdis", $name, $description, $brand, $type, $price, $quantity, $last_changed)) && ($statement -> execute ()) ? true : false);
            $statement -> close ();

            /* Return */
            $retorno["success"] = $executed;
            $retorno["message"] = ($executed ? "Accessory inserted successfully!" : "System error, try again later");
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