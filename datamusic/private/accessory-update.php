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
            $name = $_POST["name"];
            $description = $_POST["description"];
            $brand = $_POST["brand"];
            $type = $_POST["type"];
            $price = $_POST["price"];
            $quantity = $_POST["quantity"];
            $last_changed = date ("Y-m-d H:i:s");

            /* sql */
            $sql = " UPDATE accessory ";
            $sql .= " SET name = ?, description = ?, brand = ?, ";
            $sql .= "     type = ?, price = ?, quantity = ?, ";
            $sql .= "     last_changed = ? ";
            $sql .= " WHERE accessory_id = ? ";

            /* Bind parameters */
            $statement = $connection -> prepare ($sql);
            $executed = ($statement && ($statement -> bind_param ("ssssdisi", $name, $description, $brand, $type, $price, $quantity, $last_changed, $accessory_id)) && ($statement -> execute ()) && ($statement -> affected_rows === 1) ? true : false);
            $statement -> close ();

            /* Return */
            $retorno["success"] = $executed;
            $retorno["message"] = ($executed ? "Accessory updated successfully!" : "System error, try again later");
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