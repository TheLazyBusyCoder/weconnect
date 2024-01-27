<?php $this->load->helper('url');
$this->load->helper('form');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>What are you?</title>
    <link rel="stylesheet" href="<?php echo base_url("public/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("public/mystyle.css"); ?>" />  
</head>
<body class="bg-dark">
    <div class="container my-5">
        <div class="row my-5">
            <div class="col text-white text-center">
                <h1>What are you?</h1>
            </div>
        </div>
        <div class="row">
            <!-- Left Box (Provider) -->
            <div class="col-md-6">
                <a href="signup_provider" class="text-decoration-none">
                <div class="card bg-warning text-dark">
                    <div class="card-body">
                        <h4 class="card-title">Provider</h4>
                        <p class="card-text">Provider - A person who can provide service. Provider completes the work and takes some money in return. Just create a profile and done. Finders will find you and will contact you directly</p>
                    </div>
                </div>
                </a>
            </div>

            <!-- Right Box (Finder) -->
            <div class="col-md-6 mt-5 mt-sm-0">
                <a href="signup_finder" class="text-decoration-none">
                <div class="card bg-secondary text-white">
                    <div class="card-body">
                        <h4 class="card-title">Finder</h4>
                        <p class="card-text">Finder - A person who is looking for a job to get done. Just create a account and you will get a search page from which you can search for service providers in the area.</p>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
</body>
</html>