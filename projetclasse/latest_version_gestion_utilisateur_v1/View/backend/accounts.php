<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounts Page - Dashboard Template</title>
    <!--

    Template 2108 Dashboard

	http://www.tooplate.com/view/2108-dashboard

    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/fullcalendar.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="bg03">
    <style>
        .wrapper {
            position: relative;
            width: 400px;
            height: 500px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .5);
            border-radius: 20px;
            backdrop-filter: blur(20px);
            box-shadow: 0 0 30px rgba(0, 0, 0, .5);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }


        /* Custom styling */
        .custom-hr {
            border-top: 1px dashed #888;
            /* Dashed line with a different color */
            margin: 30px 0;
            /* Adjust vertical margin */
        }

        /* Style for table headers (th) */
        th {
            background-color: grey;
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        /* Style for table cells (td) */
        td {
            background-color: whitesmoke;
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .instyle {
            appearance: none;
            border: none;
            outline: none;
            border-bottom: .2em solid #E91E63;
            background: rgba(#E91E63, .2);
            border-radius: .2em .2em 0 0;
            padding: .4em;
            color: #E91E63;
        }

        /* Optional: Add some hover effect for better user experience */
        tr:hover {
            background-color: black;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-xl navbar-light bg-light">
                    <a class="navbar-brand" href="index.html">
                        <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                        <h1 class="tm-site-title mb-0">Dashboard</h1>
                    </a>
                    <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.html">Dashboard
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Reports
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Daily Report</a>
                                    <a class="dropdown-item" href="#">Weekly Report</a>
                                    <a class="dropdown-item" href="index.html">Yearly Report</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../front/index.php">Products</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="galerie.php">Galerie</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Accounts</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Settings
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Billing</a>
                                    <a class="dropdown-item" href="#">Customize</a>
                                </div>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <!--<a class="nav-link d-flex" href="login.html">
                                    <i class="far fa-user mr-2 tm-logout-icon"></i>
                                    <span>Logout</span>
                                </a>-->
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- row -->
        <?php
        include('controller/utilisateurC.php');
        $utilisateurc = new utilisateurC();
        $utilisateurc->listutilisateurs();
        ?>
        <h1 style='font-family: Georgia, serif;color:#c3b0e3;margin-top:10px;text-decoration: underline;
    text-underline-offset: 10px;margin-bottom:30px;'>Update Account:</h1>

        <div class="row tm-content-row tm-mt-big">

            <div class="tm-col tm-col-big">
                <div class="bg-white tm-block">

                    <div class="row">
                        <div class="col-12">
                            <form action="accounts_check.php" method="post" class="tm-signup-form">
                                <div class="form-group">
                                    <label for="cid">Account id:</label>
                                    <input placeholder="target id" id="cid" name="cid" type="text" class="form-control validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input placeholder="Name" id="nom" name="nom" type="text" class="form-control validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="surname">SurName</label>
                                    <input placeholder="SurName" id="name" name="prenom" type="text" class="form-control validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="adress">Adress:</label>
                                    <input placeholder="Adress" id="adress" name="adress" type="text" class="form-control validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email account</label>
                                    <input placeholder="Email" id="email" name="email" type="email" class="form-control validate" required>
                                    <p style="color:red;" id="email_debug"></p>
                                </div>
                                <script>
                                    const emailInput = document.getElementById('email');

                                    emailInput.addEventListener('input', function() {
                                        const emailPattern = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;

                                        if (!emailPattern.test(emailInput.value)) {
                                            // The entered email is not valid
                                            // You can perform actions such as displaying an error message or disabling a submit button.
                                            document.getElementById("email_debug").innerHTML = "invalid email";
                                        } else {
                                            // The entered email is valid
                                            document.getElementById("email_debug").innerHTML = "";
                                        }
                                    });
                                </script>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input placeholder="password" id="password" name="password" type="password" class="form-control validate" required>
                                    <p id="password_debug" style="color:red;"></p>
                                    <p class="text-center">* shall include 0-9 a-z A-Z in 4 to 10 characters</p>
                                </div>
                                <script>
                                    const passwordInput = document.getElementById('password');

                                    passwordInput.addEventListener('input', function() {
                                        const passwordPattern = /^[0-9a-zA-Z]{4,10}$/;

                                        if (!passwordPattern.test(passwordInput.value)) {
                                            // The entered password is not valid
                                            // You can perform actions such as displaying an error message or disabling a submit button.
                                            document.getElementById("password_debug").innerHTML = "invalid password";
                                        } else {
                                            document.getElementById("password_debug").innerHTML = "";
                                        }
                                    });
                                </script>
                                <div class="form-group">
                                    <label for="password2">Re-enter Password</label>
                                    <input placeholder="password confirm" id="password2" name="password2" type="password" class="form-control validate" required>
                                    <p id="password_debug2" style="color:red;"></p>
                                </div>
                                <span id="passwordMatch"></span>
                                <script>
                                    const passwordInput2 = document.getElementById('password2');

                                    passwordInput2.addEventListener('input', function() {
                                        const passwordPattern = /^[0-9a-zA-Z]{4,10}$/;

                                        if (!passwordPattern.test(passwordInput2.value)) {
                                            // The entered password is not valid
                                            // You can perform actions such as displaying an error message or disabling a submit button.
                                            document.getElementById("password_debug2").innerHTML = "invalid password";
                                        } else {
                                            document.getElementById("password_debug2").innerHTML = "";
                                        }
                                    });
                                </script>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        var passwordInput = document.getElementById('password');
                                        var confirmPasswordInput = document.getElementById('password2');
                                        var passwordMatchSpan = document.getElementById('passwordMatch');

                                        function checkPasswordMatch() {
                                            var password = passwordInput.value;
                                            var confirmPassword = confirmPasswordInput.value;

                                            if (password === confirmPassword) {
                                                passwordMatchSpan.innerHTML = 'Passwords match!';
                                                passwordMatchSpan.style.color = 'green';
                                            } else {
                                                passwordMatchSpan.innerHTML = 'Passwords do not match';
                                                passwordMatchSpan.style.color = 'red';
                                            }
                                        }

                                        // Attach the event listener to both input fields
                                        passwordInput.addEventListener('input', checkPasswordMatch);
                                        confirmPasswordInput.addEventListener('input', checkPasswordMatch);
                                    });
                                </script>
                                <div class="form-group">
                                <input type="radio" id="radio2" name="radiox" style="margin-top: 25px;" value="a" required><label style="margin-left : 10px;" for="radio2">Admin</label>
                                </div>
                                <div class="form-group">
                                <input type="radio" id="radio2" name="radiox" style="margin-top: 25px;" value="a" required><label style="margin-left : 10px;" for="radio2">Client</label>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <button type="submit" name="update" class="btn btn-primary">Update
                                    </button>
                                </div>
                                



                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h1 style='font-family: Georgia, serif;color:#c3b0e3;margin-top:10px;text-decoration: underline;
    text-underline-offset: 10px;margin-bottom:30px;'>Delete Account:</h1>
                    <form action="accounts_check.php" method="post" class="tm-signup-form">
                        <div class="form-group">
                            <label for="cid"></label>
                            <input placeholder="target id" id="cid2" name="cid2" type="text" class="form-control validate" required>
                        </div>



                        <div class="col-12 col-sm-4">
                            <button type="submit" name="delete" class="btn btn-danger">Delete
                            </button>
                        </div>



                    </form>
                </div>
            </div>


        </div>
        <footer class="row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="d-inline-block tm-bg-black text-white py-2 px-4">
                    Copyright &copy; 2018 Admin Dashboard . Created by
                    <a rel="nofollow" href="https://www.tooplate.com" class="text-white tm-footer-link">Tooplate</a>
                </p>
            </div>
        </footer>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>


    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
</body>

</html>