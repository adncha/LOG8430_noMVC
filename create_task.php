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




    $task= $_POST['task'];

    $sql = "
          INSERT INTO `tasks`   
          (`task`) VALUES ('".$task."')";



    if ($conn->query($sql) === TRUE) {
        $conn->close();
        header( 'Location: /tasks.php?suc_mess=1' ) ;
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }


    //Redirect

?>