<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?></title>
    <link rel="stylesheet" href="<?php echo base_url("public/css/bootstrap.min.css"); ?>" />
</head>
<body class="bg-dark">

    <div class="container mt-5">
        <div class="card border border-warning ">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Provider Search Form</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="searchBar" class="fs-4 text">Service Name:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="searchBar" placeholder="Enter your search">
                            </div>
                        </div>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group col-md-4">
                            <label for="selectBox1" class="fs-5 text">State:</label>
                            <select class="form-control" id="selectBox1">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-3">
                            <label for="selectBox2" class="fs-5 text">City:</label>
                            <select class="form-control" id="selectBox2">
                                <option value="optionA">Option A</option>
                                <option value="optionB">Option B</option>
                                <option value="optionC">Option C</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 mt-3">
                            <label for="selectBox3" class="fs-5 text">Area:</label>
                            <select class="form-control" id="selectBox3">
                                <option value="itemX">Item X</option>
                                <option value="itemY">Item Y</option>
                                <option value="itemZ">Item Z</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="mt-3 btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
</body>
</html>