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
            $sql = " INSERT INTO media ";
            $sql .= " (name, artist, description, genre, year, type, state, price, quantity, language, last_changed) ";
            $sql .= " VALUES ";
            $sql .= " (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ";

            /* Bind parameters */
            $statement = $connection -> prepare ($sql);
            $executed = ($statement && ($statement -> bind_param ("ssssissdiss", $name, $artist, $description, $genre, $year, $type, $state, $price, $quantity, $language, $last_changed)) && ($statement -> execute ()) ? true : false);
            $statement -> close ();

            /* Return */
            $retorno["success"] = $executed;
            $retorno["message"] = ($executed ? "Media inserted successfully!" : "System error, try again later");
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