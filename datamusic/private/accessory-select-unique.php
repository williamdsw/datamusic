<?php
    if (isset ($_GET["accessory_id"]))
    {
        require_once ("connection.php");
        $data = array ();

        try
        {
            $connection = open_connection ();

            // Parameters
            $accessory_id = $_GET["accessory_id"];
            
            // SQL query
            $query = " SELECT accessory_id, name, description, brand, ";
            $query .= "       type, price, quantity, last_changed ";
            $query .= " FROM accessory ";
            $query .= " WHERE accessory_id = ? ";

            // Bind parameters
            $statement = $connection -> prepare ($query);
            $statement -> bind_param ("i", $accessory_id);
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
            header ("location: ..");
        }
        finally
        {
            close_connection ($connection);
        }
        
        echo json_encode ($data);
    }
?>