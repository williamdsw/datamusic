<?php
    require_once ("connection.php");
    $data = array ();

    try
    {
        $connection = open_connection ();
        
        // Parameters
        $column = $_GET["column"];
        $content = $_GET["content"];
        $last = $_GET["last"];

        // SQL query
        $query = " SELECT accessory_id, name, description, brand, ";
        $query .= "       type, price, quantity, last_changed ";
        $query .= " FROM accessory ";
        
        // Format parameters
        if (!empty ($column))
        {
            $query .= sprintf (" WHERE %s LIKE '%s' ", $column, "%" . $content . "%");
            $query .= sprintf (" ORDER BY %s  ", $column);
        }
        
        if (!empty ($last))
        {
            $query .= " ORDER BY last_changed desc ";
            $query .= " LIMIT 10 ";
        }
        
        // Bind parameters
        $statement = $connection -> prepare ($query);
        $statement -> execute ();
        $result = $statement -> get_result ();
        
        // Getting data
        while ($row = $result -> fetch_object ())
        {
            $data[] = $row;
        }
        
        $statement -> close ();
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
?>