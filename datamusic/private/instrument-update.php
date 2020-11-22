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
            $name = $_POST["name"];
            $description = $_POST["description"];
            $brand = $_POST["brand"];
            $type = $_POST["type"];
            $state = $_POST["state"];
            $price = $_POST["price"];
            $quantity = $_POST["quantity"];
            $last_changed = date ("Y-m-d H:i:s");

            // SQL query
            $query = " UPDATE instrument ";
            $query .= " SET name = ?, description = ?, brand = ?, ";
            $query .= "     type = ?, state = ?, price = ?, quantity = ?, ";
            $query .= "     last_changed = ? ";
            $query .= " WHERE instrument_id = ? ";

            // Bind parameters
            $statement = $connection -> prepare ($query);
            $executed = ($statement && ($statement -> bind_param ("sssssdisi", $name, $description, $brand, $type, $state, $price, $quantity, $last_changed, $instrument_id)) && ($statement -> execute ()) && ($statement -> affected_rows === 1) ? true : false);
            $statement -> close ();

            // Data
            $data["success"] = $executed;
            $data["message"] = ($executed ? "Instrument updated successfully!" : "System error, try again later");
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