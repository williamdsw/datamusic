<?php
    if (isset ($_POST["accessory_id"]))
    {
        require_once ("connection.php");
        $data = array ();

        try
        {
            $connection = open_connection ();

            // Parameters
            $accessory_id = $_POST["accessory_id"];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $brand = $_POST["brand"];
            $type = $_POST["type"];
            $price = $_POST["price"];
            $quantity = $_POST["quantity"];
            $last_changed = date ("Y-m-d H:i:s");

            // SQL query
            $query = " UPDATE accessory ";
            $query .= " SET name = ?, description = ?, brand = ?, ";
            $query .= "     type = ?, price = ?, quantity = ?, ";
            $query .= "     last_changed = ? ";
            $query .= " WHERE accessory_id = ? ";

            // Bind parameters
            $statement = $connection -> prepare ($query);
            $executed = ($statement && ($statement -> bind_param ("ssssdisi", $name, $description, $brand, $type, $price, $quantity, $last_changed, $accessory_id)) && ($statement -> execute ()) && ($statement -> affected_rows === 1) ? true : false);
            $statement -> close ();

            // Data
            $data["success"] = $executed;
            $data["message"] = ($executed ? "Accessory updated successfully!" : "System error, try again later");
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