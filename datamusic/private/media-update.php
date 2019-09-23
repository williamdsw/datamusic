<?php
    if (isset ($_POST["media_id"]))
    {
        require_once ("connection.php");
        $data = array ();

        try
        {
            $connection = open_connection ();

            // Parameters
            $media_id = $_POST["media_id"];
            $name = $_POST["name"];
            $artist = $_POST["artist"];
            $description = $_POST["description"];
            $genre = $_POST["genre"];
            $year = $_POST["year"];
            $type = $_POST["type"];
            $state = $_POST["state"];
            $price = $_POST["price"];
            $quantity = $_POST["quantity"];
            $language = $_POST["language"];
            $last_changed = date ("Y-m-d H:i:s");

            // SQL query
            $query = " UPDATE media ";
            $query .= " SET name = ?, artist = ?, description = ?, genre = ?, year = ?, ";
            $query .= "     type = ?, state = ?, price = ?, quantity = ?, language = ?, ";
            $query .= "     last_changed = ? ";
            $query .= " WHERE media_id = ? ";

            // Bind parameters
            $statement = $connection -> prepare ($query);
            $executed = ($statement && ($statement -> bind_param ("ssssissdissi", $name, $artist, $description, $genre, $year, $type, $state, $price, $quantity, $language, $last_changed, $media_id)) && ($statement -> execute ()) && ($statement -> affected_rows === 1) ? true : false);
            $statement -> close ();

            // Data
            $data["success"] = $executed;
            $data["message"] = ($executed ? "Media updated successfully!" : "System error, try again later");
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