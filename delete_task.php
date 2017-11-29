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



    $sql = "
          DELETE FROM `tasks`   
          where `id` =  ".$_POST['id'];



    if ($conn->query($sql) === TRUE) {
        return 1;
    } else {
        echo "Error updating record: " . $conn->error;
    }


    //Redirect

?>
?>