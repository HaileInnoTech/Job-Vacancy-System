<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    echo "<div class='container bg-light'>";
    echo '<p><h2 class="text-center">Job Vacancy Information</h2></p>';
    echo ' <div class="row">';
    echo '<div class="col">
        <p><strong>Req 1</strong></p>
      <p>What is the PHP version installed in mercury?</p>';
    echo '<ul>';
    echo '<li>PHP version: ' . phpversion() . '</li>'; //PHP function to check version
    echo '</ul>';
    ; //PHP function to check version
    echo '<p>What tasks you have not attempted or not completed?</p>
    <ul>
    <li>    For the requirement of task 7 Req 2, I did not completed the requirement of req2 for it, I have completed the form so it can get the criteria.
    </li>
    </ul>';
    echo '<br>';
    echo '<p>What special features have you done, or attempted, in creating the site that we should know
    about?</p>

        <ul>
    <li>         For the better user expearience I applied the Boostrapp Framework (Bootstrap 4.3.1) in this assignment 1.
    With it I can config the grid of the content and if you change the website size, Bootstrap will support responsive design and a consistemt in styling.
    </li>
    </ul>    
        </div>';
    echo '</div>';

    echo ' <div class = "row">
    <div class ="col">
    <p><strong>Req 2</strong></p>
    <p>What discussion points did you participated on in the unit’s discussion board for Assignment 1</p>
    
    <img id="image" src="style/screenshot.png"width="400px" height="400px" alt="Screenshot">
    </div> 
    </div>';

    echo ' <div class = "row">
    <div class ="col">
    <p><strong>Req 3</strong></p>
    <p>Provide a link to return to the Homepage.</p>
    <p><a href="index.php" ><u>Return to Home Page</u></a></p>
    </div> 
    </div>';
    echo "</div>";
    ?>
</body>

</html>