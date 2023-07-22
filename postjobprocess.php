<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Job Process</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    echo " <div class='container bg-light'>";

    echo '<p ><h2 class="text-center">Job Vacancy Information</h2></p>';

    // Define a custom function called preprocess that trims, strips slashes, and converts special characters to HTML entities
    function preprocess($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //If it does not exist, the code creates the directory with the permissions 0777, which means that the directory is readable, writable, and executable by everyone.
    if (!is_dir('../../data/jobposts')) {
        mkdir('../../data/jobposts', 0777);
    }
    // Check for errors in the submitted data using regular expressions or string length rules, and append them to an array
    $errors = array();
    $position_id_rule = !preg_match('/P\d{4}/', $_POST['position_id']);
    $title_rule = !preg_match('/^[A-Za-z0-9\s,!\.]{1,20}$/', $_POST['title']);
    $description_rule = strlen($_POST['description']) > 260;
    $closing_date_rule = !preg_match('/^\d{1,2}\/\d{1,2}\/\d{2}$/', $_POST['closing_date']);

    if (empty($_POST['position_id']) || $position_id_rule) {
        $errors[] = "Invalid Position ID. Please enter a Position ID in the format Pxxxx.";
    }

    if (empty($_POST['title']) || $title_rule) {
        $errors[] = "Invalid Title. Title can only contain a maximum of 20 alphanumeric characters including spaces, comma, period (full stop), and exclamation point.";
    }

    if (empty($_POST['description']) || $description_rule) {
        $errors[] = "Invalid Description. Description cannot be empty and must be no more than 260 characters long.";
    }

    if (empty($_POST['closing_date']) || $closing_date_rule) {
        $errors[] = "Invalid Closing Date. Closing date must be in dd/mm/yy format.";
    }
    if (!isset($_POST['position']) && empty($_POST['position'])) {
        $errors[] = "Invalid Position. At least 1 position must be filled in.";

    }
    if (!isset($_POST['contract']) && empty($_POST['contract'])) {
        $errors[] = "Invalid Contract. At least 1 contract must be filled in.";

    }
    if (!isset($_POST['arreute'])) {
        $errors[] = "Invalid Accept Application. At least 1 checkbox must be checked in.";
    }
    if (!isset($_POST['location']) && empty($_POST['location']) || $_POST['location'] === '---') {
        $errors[] = "Invalid Location. At least 1 location must be choosed.";

    }
    // If there are no errors, create a new job post record in a text file, or display an error message if the position ID already exists in the file
    if (empty($errors)) {
        $position_id = preprocess($_POST['position_id']);
        $selectedOptions = $_POST['arreute'];
        //implode if both check box is selected
        $accept_application = implode('|', $selectedOptions);

        $record = preprocess($_POST['position_id']) . "\t" . preprocess($_POST['title']) . "\t" . preprocess($_POST['description'])
            . "\t" .
            preprocess($_POST['closing_date']) . "\t" . preprocess($_POST['position']) . "\t" . preprocess($_POST['contract']) . "\t" . preprocess($accept_application) . "\t" .
            preprocess($_POST['location']) . "\n";
        // Open the job post file in append mode
        $post_job_file = fopen("../../data/jobposts/jobs.txt", "a+");
        // Check if the position ID alreadyexists in the file
        if (CheckIdExist($post_job_file, $record, $position_id)) {
            $message = "<div class='alert alert-danger text-center' role='alert' style='font-size:15pt'>Error: Position ID already exists!!!</div>";
        } else {
            //open the file and print to the end of the line with the recode
            $file = fopen("../../data/jobposts/jobs.txt", "a+");
            fwrite($file, $record);
            fclose($file);
            $message = "<div style='font-size :20pt' class='alert alert-success' role='alert'>Job post successfully!!!</div>";
        }
    }
    //print to html whether have errors or not
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger' role='alert'>$error</div>";
        }
        printURL('index.php', 'postjobform.php');
    } else {
        echo "<p>$message</p>";
        printURL('index.php', 'postjobform.php');

    }

    //functin to print URL
    function printURL($url1, $url2)
    {
        echo '<p><a href="' . $url1 . '"><u>Return to Home Page</u></a></p>';
        echo '<p><a href="' . $url2 . '"><u>Return to Post Job Vacancy Page</u></a></p>';
    }

    //functin to check exist ID
    
    function CheckIdExist($filename, $record, $position_id)
    {
        if ($filename) {
            while (($line = fgets($filename)) !== false) {
                $fields = explode("\t", $line);
                if ($fields[0] == $position_id) {
                    fclose($filename);
                    return true;
                }
            }
            fclose($filename);
            return false;
        } else {
            // error opening the file
            return false;
        }
    }
    echo " </div>";
    ?>
</body>

</html>