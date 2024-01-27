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
                <?php echo form_open('signup_provider/add_user_provider'); ?>
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

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Service Name</label>
                        <input type="text" required name="service_name" class="form-control" 
                        >
                        <div class="form-text text-light">Name of the service you are providing</div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">State (Required)</label>
                        <div class="form-group">
                            <select required name="state" class="form-select" aria-label="Default select example" id="stateInput">
                                <option value="none" selected>Open this select menu</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">City (Required)</label>
                        <div class="form-group">
                            <select disabled required name="city" class="form-select" aria-label="Default select example" id="cityInput">
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Area (Required)</label>
                        <div class="form-group">
                            <select disabled required name="area" class="form-select" aria-label="Default select example" id="areaInput">
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Description</label>
                        <input type="text" required name="description" class="form-control" 
                        >
                        <div class="form-text text-light">Description of the service you are providing</div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Contact</label>
                        <input type="number" name="phonenumber" class="form-control" 
       pattern="\d*" maxlength="10" 
       placeholder="Enter Indian Phone Number (up to 10 digits)" 
       oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                        <div class="form-text text-light">Your Phone number</div>
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
        let type = 'provider'

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
    <!-- location -->
    <script>

        const states = [
            "maharashtra",
        ];

        const pune = [
            "mumbai", "pune", "nagpur", "nashik", "thane", "aurangabad", "solapur", "amravati", "kolhapur", "navi mumbai"
        ]

        const pune_areas = [
            "ambegaon budruk",
            "aundh",
            "baner",
            "bavdhan khurd",
            "bavdhan budruk",
            "balewadi",
            "shivajinagar",
            "bibvewadi",
            "bhugaon",
            "bhukum",
            "dhankawadi",
            "dhanori",
            "dhayari",
            "erandwane",
            "fursungi",
            "ghorpadi",
            "hadapsar",
            "hingne khurd",
            "karve nagar",
            "kalas",
            "katraj",
            "khadki",
            "kharadi",
            "kondhwa",
            "koregaon park",
            "kothrud",
            "lohagaon",
            "manjri",
            "markal",
            "mohammed wadi",
            "mundhwa",
            "nanded",
            "parvati (parvati hill)",
            "panmala",
            "pashan",
            "pirangut",
            "shivane",
            "sus",
            "undri",
            "vishrantwadi",
            "vitthalwadi",
            "vadgaon khurd",
            "vadgaon budruk",
            "vadgaon sheri",
            "wagholi",
            "wanwadi",
            "warje",
            "yerwada"
        ];

        states.forEach(e => {
            let option = document.createElement('option');
            option.innerText = e;
            option.setAttribute('value' , e);
            document.getElementById('stateInput').appendChild(option);
        });

        function updateCities() {
            let selectElement = document.getElementById("cityInput");
            while (selectElement.firstChild) {
                selectElement.removeChild(selectElement.firstChild);
            }
            if(document.getElementById('stateInput').value == "maharashtra") {
                pune.forEach(e => {
                    let option = document.createElement('option');
                    option.innerText = e;
                    option.setAttribute('value' , e);
                    document.getElementById('cityInput').appendChild(option);
                });
            }
        }

        function updateArea() {
            let selectElement = document.getElementById("areaInput");
            while (selectElement.firstChild) {
                selectElement.removeChild(selectElement.firstChild);
            }
            if(document.getElementById('cityInput').value == "pune") {
                pune_areas.forEach(e => {
                    let option = document.createElement('option');
                    option.innerText = e;
                    option.setAttribute('value' , e);
                    document.getElementById('areaInput').appendChild(option);
                });
            }
        }

        document.getElementById('stateInput').addEventListener('change' ,  function() {
            updateCities();
            document.getElementById('cityInput').disabled = false;
        });

        document.getElementById('cityInput').addEventListener('change' ,  function() {
            updateArea();
            document.getElementById('cityInput').disabled = false;
            document.getElementById('areaInput').disabled = false;
        });
        document.getElementById('areaInput').addEventListener('change' ,  function() {
            document.getElementById('areaInput').disabled = false;
        });
    </script>
    <script>
        document.getElementById("signup").innerText = "Signup - Provider";
    </script>
</body>
</html>