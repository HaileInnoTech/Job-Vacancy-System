<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Job Process</title>
    <!-- Include Bootstrap CSS from a CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    // Echo a container div with a white background
    echo "<div class='container bg-white'>";

    // Echo a heading tag with the text "Job Vacancy Information" centered in the page
    echo '<p><h2 class="text-center">Job Vacancy Information</h2></p>';

    // Define a custom function called preprocess that trims, strips slashes, and converts special characters to HTML entities
    function preprocess($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Define a custom function called printURL that echoes two links to return to the homepage and the search job vacancy page
    function printURL($url1, $url2)
    {
        echo '<p><a href="' . $url1 . '" ><u>Return to Home Page</u></a></p>';
        echo '<p><a href="' . $url2 . '"><u>Return to Search Job Vacancy Page</u></a></p>';
    }

    // Define a custom function called rawstring that removes all non-alphanumeric characters from a string and converts it to lowercase
    function rawstring($string)
    {
        $string = trim($string);
        $str = preg_replace('/[^a-zA-Z0-9]+/', '', strtolower($string));
        return $str;
    }

    // Initialize an empty array called $errors
    $errors = array();

    // Initialize an empty array called $result
    $result = array();

    // Get the job title from the form and preprocess it
    $data = preprocess($_POST["job_title"]);

    // If the job title is empty or not set, add an error message to the $errors array
    if (empty($data) || !isset($data)) {
        $errors = "Please fill in the blank!!!";
    } else {
        // If the jobposts.txt file exists, open it and search for job vacancies that match the search criteria
        if (file_exists("../../data/jobposts/jobs.txt")) {
            // Convert the search keyword to lowercase
            $data = strtolower($data);
            // Open the jobposts.txt file for reading
            $file = fopen("../../data/jobposts/jobs.txt", "r");
            // Initialize an empty array called $results
            $results = array();
            // Loop through each line in the jobposts.txt file
            while (($line = fgets($file)) !== false) {
                // Split the line into fields using a tab character as the delimiter
                $fields = explode("\t", $line);
                // Extract the job ID, job title, job description, closing date, position, contract type, accepted by, and location from the fields array
                $job_Id = trim($fields[0]);
                $job_Title = strtolower(trim($fields[1]));
                $job_Desc = trim($fields[2]);
                $job_Date = trim($fields[3]);
                // Convert the closing date from d/m/y format to d-m-y format
                
                $job_Date = DateTime::createFromFormat('d/m/y', $job_Date)->format('d-m-y');
                $job_Position = trim($fields[4]);
                $job_Contract = trim($fields[5]);
                $job_Accept_by = trim($fields[6]);
                $job_Location = trim($fields[7]);
                // Get the current date in d-m-y format
                $today = date("d-m-y");
                // If the job title contains the search keyword and the closing date is on or after the current date, add the job information to the $results array
                if (strpos($job_Title, $data) !== false && $job_Date >= $today) {
                    $results[] = array(
                        'id' => $job_Id,
                        'title' => $job_Title,
                        'desc' => $job_Desc,
                        'date' => $job_Date,
                        'position' => $job_Position,
                        'contract' => $job_Contract,
                        'accept_by' => $job_Accept_by,
                        'location' => $job_Location,
                    );
                }
            }
            // Close the jobposts.txt file
            fclose($file);
            // If $results is empty, display an error message and links to return to the homepage and search job vacancy page
            if (empty($results)) {
                echo '<div style="font-size:15pt" class="alert alert-danger"  role="alert">No job vacancies found!!! Please try again.</div>';
                printURL('index.php', 'searchjobform.php');
            } else {
                // If $results is not empty, display a success message with the search keyword and loop through each job vacancy in the $results array
                echo "<div style='font-size :20pt ' class='p-3 mb-2 bg-success text-white'>Searched for keyword :   '" . $data . "'</div>";
                foreach ($results as $result) {
                    // Extract the job information from the $result array
                    $job_Id = $result['id'];
                    $job_Title = $result['title'];
                    $job_Desc = $result['desc'];
                    $job_Date = $result['date'];
                    $job_Position = $result['position'];
                    $job_Contract = $result['contract'];
                    $job_Accept_by = $result['accept_by'];
                    $job_Location = $result['location'];
                    // Echo an unordered list with each job information as a list item
                    echo "<ul class='list-unstyled'>";
                    echo "<li style='font-size :15pt 'class='list-group-item list-group-item-success'>";
                    echo "Job Title: " . ($job_Title) . "<br>";
                    echo "Description: " . ($job_Desc) . "<br>";
                    echo "Closing Date: " . ($job_Date) . "<br>";
                    echo "Position: " . ($job_Position) . "<br>";
                    echo "Contract: " . ($job_Contract) . "<br>";
                    echo "Accept by: " . ($job_Accept_by) . "<br>";
                    echo "Location: " . ($job_Location) . "<br>";
                    echo "</li>";
                    echo "</ul>";
                }
                // Echo links to return to the homepage and search job vacancy page
                printURL('index.php', 'searchjobform.php');
            }
        } else {
            // If the jobposts.txt file does not exist, display an error message and stop executing the script
            die('No result found!! Please post some job first!!!');
        }
    }
    // If $errors is not empty, display an error message and links to return to the homepage and search job vacancy page
    if (!empty($errors)) {
        echo '<div class="alert alert-danger text-center" role="alert" style="font-size:15pt" >' . $errors . '</div>';
        printURL('index.php', 'searchjobform.php');
    }
    // Close the container div
    echo "</div>";
    // End of PHP code block
    ?>
</body>

</html>