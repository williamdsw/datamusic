<?php
    if (isset ($_POST["name"]) && isset ($_POST["password"]))
    {
        require_once ("connection.php");
        $data = array ();

        try
        {
            $connection = open_connection ();
            
            /* Parametros */
            $name = $_POST["name"];
            $password = $_POST["password"];

            /* sql */
            $sql = " SELECT user_id, name from user ";
            $sql .= " WHERE name = ? ";
            $sql .= " AND DECODE (password, 'mykey') = ? ";
            
            /* Bind parameters */
            $statement = $connection -> prepare ($sql);
            $statement -> bind_param ("ss", $name, $password);
            $statement -> execute ();
            $result = $statement -> get_result ();
            
            /* Result */
            $executed = ($result -> num_rows == 1);
            $data["success"] = $executed;
            $data["user"] = ($result -> fetch_object ());
            $statement -> close ();
        }
        catch (Exception $exception)
        {
            $data["success"] = false;
            $data["user"] = "";
        }
        finally
        {
            close_connection ($connection);
        }
        
        echo json_encode ($data);
    }
?>