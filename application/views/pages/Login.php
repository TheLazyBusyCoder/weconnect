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
    <link rel="stylesheet" href="<?php echo base_url("public/mystyle.css"); ?>" />
    <style>
        .red {
            border: 2px solid red;
        }
        .yellow:hover {
            background-color: rgb(255, 213, 0);
            color: black;
        }
    </style>
</head>
<body class="bg-dark">
    <?php
    echo file_get_contents(APPPATH . 'views/components/Navbar.html');
    ?>
    <div class="container my-5">
        <div class="row my-4">
            <div class="col-10 col-sm-8 mx-auto text-light">
                <?php echo validation_errors(); ?>
                <?php
                    if(isset($error)) {
                        echo $error;
                    }
                ?>
                <?php echo form_open('login/login'); ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="type" value="finder" id="finder">
                        <label class="form-check-label" for="finder">
                            Finder
                        </label>
                    </div>

                    <div class="form-check form-check-inline mb-3">
                        <input class="form-check-input" type="radio" name="type" value="provider" id="provider" checked>
                        <label class="form-check-label" for="provider">
                            Provider
                        </label>
                    </div>  

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-semibold text-warning fs-5">Username</label>
                        <input required require type="text" class="form-control <?php if(isset($username)) echo "red"; ?>" id="username_input"
                        name="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label fw-semibold text-warning fs-5">Password</label>
                        <input required name="password" type="password" class="form-control <?php if(isset($password)) echo " red"; ?>  " id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input checked name="per" type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Keep me logged In</label>
                    </div>
                    <button type="submit" class="btn btn-primary yellow fw-semibold">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <script>
        document.getElementById("login").classList.add("active");
    </script>
</body>
</html>