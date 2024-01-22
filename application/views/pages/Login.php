<?php $this->load->helper('url');
$this->load->helper('form');
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo base_url("public/css/bootstrap.min.css"); ?>" />
    <style>
        .red {
            border: 2px solid red;
        }
    </style>
</head>
<body>
    <nav class="navbar border-bottom bg-body-tertiary navbar-expand-lg">
        <div class="container ">
            <a class="navbar-brand" href="/project/home">GPShistory</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="/project/home">Home</a>
                <a class="nav-link" href="/project/signup">Signup</a>
            </div>
            </div>
        </div>
    </nav>
    <div class="container my-2">
        <div class="row my-4">
            <div class="col">
                <?php echo validation_errors(); ?>
                <?php
                    if(isset($error)) {
                        echo $error;
                    }
                ?>
                <?php echo form_open('login/login'); ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" value="finder" id="finder">
                        <label class="form-check-label" for="finder">
                            Finder
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="type" value="provider" id="provider" checked>
                        <label class="form-check-label" for="provider">
                            Provider
                        </label>
                    </div>  
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input require type="text" class="form-control <?php if(isset($username)) echo "red"; ?>" id="username_input"
                        name="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control <?php if(isset($password)) echo " red"; ?>  " id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input checked name="per" type="checkbox" class="form-check-input " id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Keep me logged In</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
</body>
</html>