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
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 30px;
            margin-top: 50px;
        }

        h1 {
            color: #007bff;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body class="">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center">User Information</h1>
                <hr>

                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" readonly value="Username123">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" readonly value="John Doe">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" id="description" rows="3" readonly>Description text goes here.</textarea>
                </div>

                <div class="mb-3">
                    <label for="serviceName" class="form-label">Service Name:</label>
                    <input type="text" class="form-control" id="serviceName" readonly value="Awesome Service">
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location:</label>
                    <input type="text" class="form-control" id="location" readonly value="City, Country">
                </div>

                <div class="mb-3">
                    <label for="contact" class="form-label">Contact:</label>
                    <div class="mb-2">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="tel" class="form-control" id="phone" readonly value="123-456-7890">
                    </div>
                    <div>
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" readonly value="john@example.com">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
</body>
</html>