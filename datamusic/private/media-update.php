<?php
    if (isset ($_POST["media_id"]))
    {
        require_once ("connection.php");
        $retorno = array ();

        try
        {
            $connection = open_connection ();

            /* Parameters */
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

            /* sql */
            $sql = " UPDATE media ";
            $sql .= " SET name = ?, artist = ?, description = ?, genre = ?, year = ?, ";
            $sql .= "     type = ?, state = ?, price = ?, quantity = ?, language = ?, ";
            $sql .= "     last_changed = ? ";
            $sql .= " WHERE media_id = ? ";

            /* Bind parameters */
            $statement = $connection -> prepare ($sql);
            $executed = ($statement && ($statement -> bind_param ("ssssissdissi", $name, $artist, $description, $genre, $year, $type, $state, $price, $quantity, $language, $last_changed, $media_id)) && ($statement -> execute ()) && ($statement -> affected_rows === 1) ? true : false);
            $statement -> close ();

            /* Return */
            $retorno["success"] = $executed;
            $retorno["message"] = ($executed ? "Media updated successfully!" : "System error, try again later");
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