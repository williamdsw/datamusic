<?php
    if (isset ($_GET["media_id"]))
    {
        require_once ("connection.php");
        $data = array ();

        try
        {
            $connection = open_connection ();

            // Parameters
            $media_id = $_GET["media_id"];
            
            // SQL query
            $query = " SELECT media_id, name, artist, description, genre, ";
            $query .= "       year, type, state, price, quantity, ";
            $query .= "       language, last_changed ";
            $query .= " FROM media ";
            $query .= " WHERE media_id = ? ";

            // Bind parameters
            $statement = $connection -> prepare ($query);
            $statement -> bind_param ("i", $media_id);
            $statement -> execute ();
            $result = $statement -> get_result ();

            // Getting data
            if ($row = $result -> fetch_object ())
            {
                foreach ($row as $key => $value)
                {
                    $data[$key] = $value;
                }
            }

            $statement -> close ();
        }
        catch (Exception $exception)
        {
            header ("location: ...");
        }
        finally
        {
            close_connection ($connection);
        }
        
        echo json_encode ($data);
    }
?>