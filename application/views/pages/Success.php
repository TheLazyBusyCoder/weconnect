<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('/public/css/bootstrap.min.css'); ?>">
    <title>Signup Successful</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Signup Successful</h5>
                <p class="card-text">Please login to continue.</p>
                <a href="/weconnect/login" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('public/js/bootstrap.min.js') ?>"></script>
</body>
</html>
