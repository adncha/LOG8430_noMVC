<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbName = "todo_list";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbName);

    // Check connection
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }




    //retrieve data from post
    $eta= isset($_POST['eta']) && $_POST['eta']?1:0;
    $id= $_POST['id'];


    $sql = "
          UPDATE `tasks`   
          SET `eta` = ".$eta."
          WHERE `id` = ".$id." 
        ";


    if ($conn->query($sql) === TRUE) {
        echo true;
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();