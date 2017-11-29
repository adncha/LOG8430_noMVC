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

    // Retrieve tasks
    $sql = "Select *From tasks";
    $tasks = $conn->query($sql);

    // Header
    echo
    "
    <!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='utf-8'>
        <title>TODO LIST 2.0</title>
        <!-- Latest compiled and minified CSS -->
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'
              integrity='sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u'
              crossorigin='anonymous'>


        <!--- Bootstrap Switch CDN-->
        <link href='https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css' rel='stylesheet'>


        <!-- Project css -->
        <link rel='stylesheet' href='/style.css'>

        <!-- Latest compiled and minified Jquery -->
        <script
                src='https://code.jquery.com/jquery-3.2.1.min.js'
                integrity='sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4='
                crossorigin='anonymous'></script>


        <!-- Bootstrap Toggle-->
        <script src='https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js'></script>

        <style>
        section
        {
        padding: 20px;
        }
        </style>

        <!-- Project script -->
        <script src='/script.js'></script>


    </head>
    <header class='bg-primary '>
        <div class='container'>
            <div class='row'>
                <div class='col-md-12'>
                    <h3 class='text-center'>
                    tasks
                    </h3>
                </div>
            </div>
        </div>
    </header>
    <body>
    ";


    /******
     *
     *PAGE VIEW
     *
     */
    echo
    "
    <section class='padding-top-20'>
    <div class='container'>";

    // Message in case of successfully creating a task
    if ( $_GET['suc_mess'])
    {
        echo "
                <div class='row'>
                    <div class='col-md-6 col-md-offset-3'>
                        <div class='alert alert-success'>
                            <strong>Success!</strong> Task has been created
                        </div>
                    </div>
                </div>";
    }



    //Create a new task button
    echo " 
        <div class='row'>
            <div class='col-md-6 col-md-offset-3' >
                <a href = '/create_task_form.php' class='btn  btn-success btn-block' >
                    <i class='glyphicon glyphicon-plus' ></i >
                    CREATE A NEW TASK
                </a>
            </div>
        </div>";

    //
    echo "
                <hr >
                <div class='table-responsive' >
                    <table id = 'mytable' class='table table-bordred table-striped' >
                        <thead >
                            <th > Task</th >
                            <th > Date</th >
                            <th > Eta</th >
                            <th > Delete</th >
                        </thead >
                        <tbody >";
    if ($tasks->num_rows > 0)
    {
        while ($task = $tasks->fetch_object())
        {
            echo "
            <tr>
                <td>$task->task</td>
                <td>
                    " . date('Y-m-d  H:i', strtotime($task->date)) . "
                </td>
                <td>
                    <form
                            id='task_update_form'
                            method='post'
                            action='/update_task.php'
                    >
                        <input name='id' type='hidden' value='$task->id'>
                        <input type='checkbox' value='1'
                               name='eta' ".(!$task->eta ?: 'checked')."
                               data-on='Done' data-off='Not done' data-onstyle='success'
                               data-offstyle='danger' data-toggle='toggle'
                               class='auto-submit'>
                    </form>
                </td>
                <td>
                    <form
                            id='task_delete_form'
                            method='post'
                            data-reload='true'
                            data-confirm='Are you sure you wan to delete this task?'
                            action='/delete_task.php'>
                        <input name='id' type='hidden' value='$task->id'>
                        <p data-placement='top' data-toggle='tooltip' title='Delete'>
                            <button type='button' class='btn btn-danger btn-xs auto-submit'
                                    data-title='Delete'><span
                                        class='glyphicon glyphicon-trash'></span></button>
                        </p>
                    </form>

                </td>
            </tr>";

        }
    }
    else
    {
        echo 'You have no task, create a new one';
    }
    echo "
            </tbody>
         </table>
       </div>
     </div>
   </div>
  </div>
</section>
";


?>