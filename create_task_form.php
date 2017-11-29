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

    echo 
    "
        <div class='row'>
            <div class='col-md-6 col-offset-3'>
                <form
                    action='/create_task.php'
                    method='post'
                >
                    <div class='form-group'>
                        <label for='exampleInputEmail1'>Task name</label>
                        <input type='text' class='form-control' name='task' placeholder='Enter task name'>
                        <small id='emailHelp' class='form-text text-muted'>Max 50 Char.</small>
                    </div>
                    <button type='submit' class='btn btn-primary'>Create</button>
                </form>
            </div>
        </div>
    ";

    echo "
  </div>
</section>
";


?>