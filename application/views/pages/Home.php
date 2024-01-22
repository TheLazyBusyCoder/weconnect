<?php $this->load->helper('url'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPShistory</title>
    <link rel="stylesheet" href="<?php echo base_url("public/css/bootstrap.min.css"); ?>" />
</head>
<body>
    <!-- navbar -->
    <nav class="navbar border-bottom bg-body-tertiary navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="home">GPShistory</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="home">Home</a>
                <a class="nav-link" href="login">Login</a>
                <a class="nav-link" href="signup">Signup</a>
            </div>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row py-4 m-4">
            <div class="col-12 mt-4 text-warning fw-bold fs-1">GPShistory</div>
            <div class="col-12 my-4">
                Welcome to GPShistory, where we capture and safeguard your journey through time and space. Our platform securely stores and manages your location history, providing you with a reliable repository of your past locations. Explore the convenience of tracing your path, understanding your whereabouts, and embracing the memories of your past adventures with ease.
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
</body>
</html>