<?php $this->load->helper('url');
$this->load->helper('form');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPShistory</title>
    <link rel="stylesheet" href="<?php echo base_url("public/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("public/mystyle.css"); ?>" />
    <style>
        .error {
            color: rgb(255, 0, 0);
        }
        .green {
            color: rgb(0, 255, 0);
        }
        #list_opt {
            position: absolute;
            width: 100%;
            z-index: 1000;
        }
        .list-group-item {
            cursor: pointer;
        }
        input::-ms-clear,
        input::-ms-reveal {
            display: none;
        }
    </style>
</head>
<body class="bg-dark">
    <!-- navbar -->
    <?php
    
    echo file_get_contents(APPPATH . 'views/components/Navbar.html');
    
    ?>
    <div class="container my-2 text-light">
        <div class="row my-4">
            <div class="col-sm-8 mx-auto">
                <?php echo validation_errors(); ?>
                <?php echo form_open('signup_finder/add_user_finder'); ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <label id="username_message" class="form-text mb-2"></label>
                        <input required type="text" class="form-control" id="username_input"
                        value="<?php if(isset($_POST['username'])) echo $_POST['username']?>"
                        name="username" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text text-light <?php if ($username == true) echo "error"; ?>">Use only alphebets, numbers</div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input required name="password" type="password" class="form-control" id="password_input">
                        
                        <div class="progress mt-2" role="progressbar" aria-label="Basic example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="height: 10px">
                            <div id="bar" class="bg-success progress-bar" ></div>
                        </div>
                        <div id="emailHelp" class="form-text text-light <?php if ($password == true) echo "error" ?>">Your password must be 8-20 characters long</div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Your Name</label>
                        <input type="text" required name="name" class="form-control" 
                        value="<?php if(isset($_POST['name'])) echo $_POST['username']?>"
                        >
                        <div class="form-text text-light">Your full name</div>
                    </div>

                    <button disabled id='submit_button' type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('public/js/bootstrap.min.js'); ?>"></script>
    <!-- username password -->
    <script>
        document.getElementById("signup").classList.add("active");
        const input = document.getElementById('username_input');
        const messageElement = document.getElementById('username_message');
        const button = document.getElementById('submit_button');
        let flag = false;
        let type = 'finder'

        function check(e = null) {
            let username = "";
            if(e == null) {
                username = input.innerText;
            } else {
                username = e.target.value;
            }
            if(username.length == 0) {
                messageElement.classList.remove('green');
                messageElement.classList.add('error');
                messageElement.textContent = "Username should not be empty";
                button.disabled = true;
            } else {
                if(!(/^[a-zA-Z0-9]+$/.test(username))) {
                    messageElement.classList.remove('green');
                    messageElement.classList.add('error');
                    messageElement.textContent = "Username should have only alphebets and numbers";
                    button.disabled = false;
                    return;
                }
                fetch('/weconnect/signup_provider/check_username_existence', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'username=' + encodeURIComponent(username) + '&type=' + encodeURIComponent(type)
                })
                .then(response => response.json())
                .then(result => {
                    if (result.is_exist) {
                        messageElement.textContent = 'Username already exists!';
                        messageElement.classList.remove('green');
                        messageElement.classList.add('error');
                        button.disabled = true;
                    } else {
                        messageElement.textContent = 'Username is valid!';
                        messageElement.classList.remove('error');
                        messageElement.classList.add('green');
                        button.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
        check();
        input.addEventListener('input' , check);

        const bar = document.getElementById("bar");
        const password = document.getElementById('password_input');
        password.addEventListener('input' , e => {
            let width;
            if(e.target.value.length < 8) {
                width = ((e.target.value.length - 0) / (8 - 0)) * 100;
                bar.classList.remove('bg-success');
                bar.classList.add('bg-danger');
                button.disabled = true;
            } else {
                width = 100
                bar.classList.add('bg-success');
                bar.classList.remove('bg-danger');
                button.disabled = false;
            };
            bar.style.width = `${width}%`;
        })

    </script>
    <script>
        document.getElementById("signup").innerText = "Signup - Finder";
    </script>
</body>
</html>