<?php
    if (isset ($_POST["name"]) && isset ($_POST["password"]))
    {
        require_once ("connection.php");
        $data = array ();

        try
        {
            $connection = open_connection ();
            
            // Parameters
            $name = $_POST["name"];
            $password = $_POST["password"];

            // SQL query
            $query = " SELECT user_id, name from user ";
            $query .= " WHERE name = ? ";
            // $query .= " AND DECODE (password, 'mykey') = ? ";
            $query .= " AND password = ? ";

            // Bind parameters
            $statement = $connection -> prepare ($query);

            $statement -> bind_param ("ss", $name, $password);
            $statement -> execute ();
            $result = $statement -> get_result ();
            
            // Data
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