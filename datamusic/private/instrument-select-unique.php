<?php
    if (isset ($_GET["instrument_id"]))
    {
        require_once ("connection.php");
        $data = array ();

        try
        {
            $connection = open_connection ();

            /* Parameters */
            $instrument_id = $_GET["instrument_id"];
            
            /* sql */
            $sql = " SELECT instrument_id, name, description, brand, ";
            $sql .= "       type, state, price, quantity, last_changed ";
            $sql .= " FROM instrument ";
            $sql .= " WHERE instrument_id = ? ";

            /* Bind parameters */
            $statement = $connection -> prepare ($sql);
            $statement -> bind_param ("i", $instrument_id);
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
            header ("location: ..");
        }
        finally
        {
            close_connection ($connection);
        }
        
        echo json_encode ($data);
    }
?>