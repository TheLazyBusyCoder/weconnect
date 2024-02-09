<?php $this->load->helper('url'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeConnect</title>
    <link rel="stylesheet" href="<?php echo base_url("public/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("public/mystyle.css"); ?>" />

    <?php 
    $htmlContent = file_get_contents(APPPATH . 'views/components/favicon.html');
    echo $htmlContent; 
    ?>
</head>
<body class="bg-light vh-100 border">
    <!-- navbar -->
    <?php 
    $htmlContent = file_get_contents(APPPATH . 'views/components/Navbar.html');
    echo $htmlContent; 
    ?>
    <!-- description -->
    <?php 
    $desc = file_get_contents(APPPATH . 'views/components/Description.html');
    echo $desc; 
    ?>

    <!-- Two Box -->

    <div class="container my-2">
        <div class="row">
            <!-- Left Box (Provider) -->
            <div class="col-md-6 ">
                <div class="card boxtypeone rounded-0">
                    <div class="card-body">
                        <h4 class="card-title">Provider</h4>
                        <p class="card-text">Provider - A person who can provide service. Provider completes the work and takes some money in return. Just create a profile and done. Finders will find you and will contact you directly</p>
                    </div>
                </div>
            </div>

            <!-- Right Box (Finder) -->
            <div class="col-md-6 mt-3 mt-sm-0">
                <div class="card boxtypetwo rounded-0">
                    <div class="card-body">
                        <h4 class="card-title">Finder</h4>
                        <p class="card-text">Finder - A person who is looking for a job to get done. Just create a account and you will get a search page from which you can search for service providers in the area.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" container bg-dark position-absolute footer text-light">
        <div class="row text-center">
            <div class="col m-2">&copy; 2024 WeConnect. All rights reserved.</div>
            <div class="col m-2">Created by TheLazyBusyCoder</div>
        </div>
    </div>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <script>
        document.getElementById("home").classList.add("active");
    </script>
</body>
</html>