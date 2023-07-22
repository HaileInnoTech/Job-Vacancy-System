<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container bg-light">
        <div class="row" style="text-align: center">
            <div class="col-sm-12">
                <p>
                <h2 class="text-center">Job Vacancy Information</h2>
                </p>
            </div>
        </div>

        <br>
        <div class="row ">
            <div class="col-6 mx-auto">
                <form method="post" action="postjobprocess.php">
                    <div class="form-group row">
                        <label for="position_id" class="col-sm-3 col-form-label">Position ID:</label>
                        <div class="col-sm-9">
                            <input type="text" id="position_id" name="position_id" class="form-control  rounded-pill">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Title:</label>
                        <div class="col-sm-9">
                            <input type="text" id="title" name="title" class=" form-control rounded-pill">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-3 col-form-label">Description:</label>
                        <div class="col-sm-9">
                            <textarea id="description" name="description" class="form-control  rounded-pill"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="closing_date" class="col-sm-3 col-form-label">Closing
                            Date:</label>
                        <div class="col-sm-9">
                            <input type="text" id="closing_date" name="closing_date"
                                value="<?php echo date('d/m/y'); ?>" class="form-control   rounded-pill">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label pt-0">Position:</label>
                        <div class="col-sm-9  text-left">
                            <div class="form-check form-check-inline">
                                <input type="radio" name="position" value="Full-Time" class="form-check-input">
                                <label class="form-check-label" for="Fulltime"> Full Time</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="position" value="Part-Time" class="form-check-input">
                                <label class="form-check-label" for="Parttime"> Part Time</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contract" class="col-sm-3 col-form-label pt-0">Contract:</label>
                        <div class="col-sm-9  text-left">
                            <div class="form-check form-check-inline">
                                <input type="radio" name="contract" id="On-going" value="On-going"
                                    class="form-check-input">
                                <label class="form-check-label">On-going</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input type="radio" name="contract" id="Fixed-term" value="Fixed-Term"
                                    class="form-check-input">
                                <label class="form-check-label">Fixed Term</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="accept_application" class="col-sm-3 col-form-label pt-0">Application by:</label>
                        <div class="col-sm-9 text-left">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="arreute[]" value="Post" id="Post">
                                <label class="form-check-label" for="Post">Post</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="arreute[]" value="Email"
                                    id="Email">
                                <label class="form-check-label" for="Email">Email</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="location" class="col-sm-3 col-form-label pt-0">Location:</label>
                        <div class="col-sm-9">
                            <select id="location" name="location" class="  rounded-pill">
                                <option value="---">---</option>
                                <option value="ACT">ACT</option>
                                <option value="NSW">NSW</option>
                                <option value="NT">NT</option>
                                <option value="QLD">QLD</">QLD</option>
                                <option value="SA">SA</option>
                                <option value="TAS">TAS</option>
                                <option value="VIC">VIC</option>
                                <option value="WA">WA</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-6 col-form-label"> <button type="submit"
                                class="btn btn-primary">Submit</button></label>
                        <label class="col-sm-6 col-form-label"> <button type="reset"
                                class="btn btn-warning">Reset</button></label>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <p>All field are required <a href="index.php"><u>Return to Home Page</u></a></p>

            </div>
        </div>
    </div>