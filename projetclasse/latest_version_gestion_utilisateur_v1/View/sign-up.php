<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Tooplate's Little Fashion - Sign Up Page</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="../css/slick.css"/>

        <link href="../css/tooplate-little-fashion.css" rel="stylesheet">
        
<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
    </head>
    
    <body>

        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>

            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h1 class="hero-title text-center mb-5">Sign Up</h1>
                            <div class="div-separator w-50 m-auto my-5"><span>or</span></div>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form role="form" action="add.php" method="post">
                                        <div class="form-floating">
                                            <input type="text" name="nom" id="nom" class="form-control" placeholder="nom" style="margin-bottom: 15px;" required>
                                            <label for="nom">Name</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="text" name="prenom" id="prenom" class="form-control" placeholder="prenom" style="margin-bottom: 15px;" required>
                                            <label for="prenom">Surname</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="email" required><p style="color:red;"id="email_debug"> </p>
                                            <script>
                                                const emailInput = document.getElementById('email');
                                              
                                                emailInput.addEventListener('input', function () {
                                                  const emailPattern = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
                                              
                                                  if (!emailPattern.test(emailInput.value)) {
                                                    // The entered email is not valid
                                                    // You can perform actions such as displaying an error message or disabling a submit button.
                                                    document.getElementById("email_debug").innerHTML="invalid email";
                                                  } else {
                                                    // The entered email is valid
                                                    document.getElementById("email_debug").innerHTML="";
                                                  }
                                                });
                                              </script>
                                            <label for="email">Email address</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="text" name="adress" id="adress" class="form-control" placeholder="adress" style="margin-top: 15px;" required>
                                            <label for="adress">Adress</label>
                                        </div>

                                        <div class="form-floating my-4">
                                            <input type="password" name="password" id="password"class="form-control" placeholder="password" required><p style="color:red;"id="password_debug"> </p>
                                            <script>
                                                const passwordInput = document.getElementById('password');
                                              
                                                passwordInput.addEventListener('input', function () {
                                                  const passwordPattern = /^[0-9a-zA-Z]{4,10}$/;
                                              
                                                  if (!passwordPattern.test(passwordInput.value)) {
                                                    // The entered password is not valid
                                                    // You can perform actions such as displaying an error message or disabling a submit button.
                                                    document.getElementById("password_debug").innerHTML="invalid password";
                                                  } else {
                                                    document.getElementById("password_debug").innerHTML="";
                                                  }
                                                });
                                            </script>
                                            <label for="password">Password</label>
                                            
                                            <p class="text-center">* shall include 0-9 a-z A-Z in 4 to 10 characters</p>
                                        </div>

                                        <div class="form-floating">
                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="confirm_password" required><p style="color:red;" id="confirm_password_debug"> </p>
                                            <script>
                                                const password_confirm = document.getElementById('confirm_password');
                                              
                                                password_confirm.addEventListener('input', function () {
                                                  const passwordPattern = /^[0-9a-zA-Z]{4,10}$/;
                                              
                                                  if (!passwordPattern.test(password_confirm.value)) {
                                                    // The entered password is not valid
                                                    // You can perform actions such as displaying an error message or disabling a submit button.
                                                    document.getElementById("confirm_password_debug").innerHTML="invalid password";
                                                  } else {
                                                    // The entered password is valid
                                                    document.getElementById("confirm_password_debug").innerHTML="";
                                                  }
                                                });
                                            </script>
                                            <label for="confirm_password">Password Confirmation</label>
                                        </div>
                                        <div class="form-floating">
                                    
                                        <input type="radio" id="radio1" name="radiox" value="c" style="margin-top:25px;"><label style="margin-left:10px;"for="radio1">Client</label>
                                        </div>
                                        
                                        <div class="form-floating">
                                        <input type="radio" id="radio2" name="radiox" style="margin-top: 25px;" value="a"><label style="margin-left : 10px;" for="radio2">Admin</label>
                                        </div>

                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Create account
                                        </button>

                                        <p class="text-center">Already have an account? Please <a href="sign-in.html">Sign In</a></p>
                                    </form>
                                    
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </section>

        </main>

        <footer class="site-footer">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-10 me-auto mb-4">
                        <h4 class="text-white mb-3"><a href="index.php">Little</a> Fashion</h4>
                        <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Little Fashion</strong></p>
                        <br>
                        <p class="copyright-text">Designed by <a href="https://www.tooplate.com/" target="_blank">Tooplate</a></p>
                    </div>

                    <div class="col-lg-5 col-8">
                        <h5 class="text-white mb-3">Sitemap</h5>

                        <ul class="footer-menu d-flex flex-wrap">
                            <li class="footer-menu-item"><a href="about.html" class="footer-menu-link">Story</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Products</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Privacy policy</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">FAQs</a></li>

                            <li class="footer-menu-item"><a href="#" class="footer-menu-link">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-4">
                        <h5 class="text-white mb-3">Social</h5>

                        <ul class="social-icon">

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-skype"></a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer>

        <!-- JAVASCRIPT FILES -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/Headroom.js"></script>
        <script src="../js/jQuery.headroom.js"></script>
        <script src="../js/slick.min.js"></script>
        <script src="../js/custom.js"></script>
    
    </body>
    
</html>

