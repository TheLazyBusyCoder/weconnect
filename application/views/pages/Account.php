<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('form');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $username; ?></title>
    <link rel="stylesheet" href="<?php echo base_url("public/css/bootstrap.min.css"); ?>" />
    <style>
        .container {
            box-shadow: 0 6px 8px rgba(255, 255, 255, 1);
            border-radius: 10px;
        }

        h1 {
            color: #007bff;
        }
    </style>
</head>
<body class="bg-dark">
    <div class="container-fluid my-sm-5">
        <div class="row py-3">
            <div class="col-md-6 mx-auto">
                <h1 class="text-center text-warning">User Information</h1>
                <hr>
                <?php echo form_open('edit/edit'); ?>
                    <div class="mb-3">
                        <label for="username" class="form-label text-light fs-5">Username</label>
                        <input type="text" class="form-control" id="username" readonly value="<?php echo $username ?>">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label text-light fs-5">Name</label>
                        <input type="text" class="form-control" id="name" readonly value="<?php echo $name ?>">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label text-light fs-5">Description</label>
                        <textarea class="form-control" id="description" rows="3" readonly><?php echo $description ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label text-light fs-5">Service Name</label>
                        <input type="text" class="form-control" id="serviceName" readonly value="<?php echo $service_name ?>">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label text-light fs-5">Location</label>
                        <table class="table ">
                            <tbody>
                                <tr>
                                    <th scope="col">Area</th>
                                    <td>
                                    <input type='text' value="<?php echo ucfirst($area); ?>" readonly id="area"/>    
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">City</th>
                                    <td>
                                    <input type='text' value="<?php echo ucfirst($city); ?>" readonly id="city"/>    
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">State</th>
                                    <td>
                                    <input type='text' value="<?php echo ucfirst($state); ?>" readonly id="state"/>    
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label text-light fs-5">Phone</label>
                        <input type="tel" class="form-control" id="phone" readonly value="<?php echo ucfirst($phonenumber); ?>">
                    </div>

                    <div class="d-flex justify-content-around">
                        <button id="edit" type="submit" class="btn btn-primary">Edit</button>

                        <button id="submit" disabled type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/myjs.js'); ?>">
        
    </script>
</body>
</html>