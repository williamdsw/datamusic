<?php
    require_once ("connection.php");
    $data = array ();

    try
    {
        $connection = open_connection ();
        
        /* Parameters */
        $column = $_GET["column"];
        $content = $_GET["content"];
        $last = $_GET["last"];

        /* sql */
        $sql = " SELECT media_id, name, artist, description, genre, ";
        $sql .= "       year, type, state, price, quantity, ";
        $sql .= "       language, last_changed ";
        $sql .= " FROM media ";
        
        /* Format parameters */
        if (!empty ($column))
        {
            $sql .= sprintf (" WHERE %s LIKE '%s' ", $column, "%" . $content . "%");
            $sql .= sprintf (" ORDER BY %s  ", $column);
        }
        
        if (!empty ($last))
        {
            $sql .= " ORDER BY last_changed DESC ";
            $sql .= " LIMIT 10 ";
        }
        
        /* Statement */
        $statement = $connection -> prepare ($sql);
        $statement -> execute ();
        $result = $statement -> get_result ();
        
        /* Pass data */
        while ($row = $result -> fetch_object ())
        {
            $data[] = $row;
        }
        
        $statement -> close ();
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

    echo json_encode ($data);
?>