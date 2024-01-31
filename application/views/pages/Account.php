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
                <h1 class=" text-warning fs-1 text d-flex justify-content-around align-items-center ">User Information
                    <?php echo form_open('edit/logout'); ?>
                        <button type="submit" class="btn bg-light text-dark">logout</button>
                    </form>
                </h1>
                <hr>
                <?php echo form_open('edit/edit'); ?>
                    <div class="mb-3">
                        <label for="username" class="form-label text-light fs-5">Username</label>
                        <label class="form-control bg-dark text-light" id="username">
                            <?php echo $username; ?>
                        </label>
                    </div>

                    <input name="username" type="hidden" value="<?php echo $username; ?>" />

                    <div class="mb-3">
                        <label for="username" class="form-label text-light fs-5">Name</label>
                        <input type="text" class="form-control bg-dark text-light" name="name" id="name" required readonly value="<?php echo $name ?>">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label text-light fs-5">Description</label>
                        <textarea name="description" class="form-control bg-dark text-light" id="description" rows="3" readonly required><?php echo $description ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label text-light fs-5">Service Name</label>
                        <input type="text" class="form-control bg-dark text-light" name="service_name" required id="serviceName" readonly value="<?php echo $service_name ?>">
                    </div>

                    <div class="mb-3 bg-dark text-light">
                        <label for="username" class="form-label fs-5">Location</label>
                        <table class="table table-dark">
                            <tbody class="bg-dark">
                                <tr>
                                    <th scope="col bg-dark">Area</th>
                                    <td class="bg-dark">
                                        <label class="  text-light"  id="area">
                                            <?php echo ucfirst($area); ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">City</th>
                                    <td>
                                        <label class="  text-light"  id="area">
                                            <?php echo ucfirst($city); ?>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">State</th>
                                    <td>
                                        <label class="  text-light"  id="area">
                                            <?php echo ucfirst($state); ?>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label text-light fs-5">Phone</label>
                        <input type="tel" class="form-control bg-dark text-light" id="phone" name="phonenumber" readonly required value="<?php echo ucfirst($phonenumber); ?>">
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