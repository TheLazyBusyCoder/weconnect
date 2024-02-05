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
    <link rel="stylesheet" href="<?php echo base_url("public/mystyle.css"); ?>" />
</head>
<body class="bg-dark text-light">

    <?php echo file_get_contents(APPPATH . "views/components/SearchForm.html"); ?>

    <?php echo file_get_contents(APPPATH . "views/components/Result.html"); ?>
    
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <script  src="<?php echo base_url('public/some.js'); ?>">
    </script>
</body>
</html>