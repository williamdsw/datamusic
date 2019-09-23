<?php
    if (isset ($_POST["name"]))
    {
        require_once ("connection.php");
        $data = array ();

        try
        {
            $connection = open_connection ();

            // Parameters
            $name = $_POST["name"];
            $description = $_POST["description"];
            $brand = $_POST["brand"];
            $type = $_POST["type"];
            $price = $_POST["price"];
            $quantity = $_POST["quantity"];
            $last_changed = date ("Y-m-d H:i:s");

            // SQL query
            $query = " INSERT INTO accessory ";
            $query .= " (name, description, brand, type, price, quantity, last_changed) ";
            $query .= " VALUES ";
            $query .= " (?, ?, ?, ?, ?, ?, ?) ";

            // Bind parameters
            $statement = $connection -> prepare ($query);
            $executed = ($statement && ($statement -> bind_param ("ssssdis", $name, $description, $brand, $type, $price, $quantity, $last_changed)) && ($statement -> execute ()) ? true : false);
            $statement -> close ();

            // Data
            $data["success"] = $executed;
            $data["message"] = ($executed ? "Accessory inserted successfully!" : "System error, try again later");
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