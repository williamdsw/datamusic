<?php
    if (isset ($_GET["media_id"]))
    {
        require_once ("connection.php");
        $data = array ();

        try
        {
            $connection = open_connection ();

            /* Parameters */
            $media_id = $_GET["media_id"];
            
            /* sql */
            $sql = " SELECT media_id, name, artist, description, genre, ";
            $sql .= "       year, type, state, price, quantity, ";
            $sql .= "       language, last_changed ";
            $sql .= " FROM media ";
            $sql .= " WHERE media_id = ? ";

            /* Bind parameters */
            $statement = $connection -> prepare ($sql);
            $statement -> bind_param ("i", $media_id);
            $statement -> execute ();
            $result = $statement -> get_result ();

            /* Pass data */
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