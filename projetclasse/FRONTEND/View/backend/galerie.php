<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products Page - Dashboard Template</title>
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
    <link rel="stylesheet" href="css/tooplate.css">
</head>

<body id="reportsPage" class="bg02">
    <div class="" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-xl navbar-light bg-light">
                        <a class="navbar-brand" href="index.html">
                            <i class="fas fa-3x fa-tachometer-alt tm-site-icon"></i>
                            <h1 class="tm-site-title mb-0">Dashboard</h1>
                        </a>
                        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
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
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Reports
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Daily Report</a>
                                        <a class="dropdown-item" href="#">Weekly Report</a>
                                        <a class="dropdown-item" href="#">Yearly Report</a>
                                    </div>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="products.html">Products</a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="galerie.php">Galerie</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="accounts.html">Accounts</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                    <a class="nav-link d-flex" href="login.html">
                                        <i class="far fa-user mr-2 tm-logout-icon"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row tm-mt-big">
                <div class="col-xl-8 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <h2 class="tm-block-title d-inline-block">Gallery</h2>

                            </div>
                            <div class="col-md-4 col-sm-12 text-right">
                                <a href="..\backend\views\addGalerie.php" class="btn btn-small btn-primary">Add New
                                    Gallery </a>

                            </div>
                            <br>
                            </br>
                        </div>
                        <div class="table-responsive">
                            <?php
                            include "../backend/controller/GalerieC.php";

                            $c = new GalerieC();
                            $tab = $c->listGaleries();

                            ?>
                            <br>
                            <style>
                                table {
                                    border-collapse: collapse;
                                    width: 100%;
                                }

                                th,
                                td {
                                    border: 1px solid black;
                                    padding: 8px;
                                    text-align: left;
                                }

                                th {
                                    background-color: #f2f2f2;
                                }
                            </style>
                            
                            <table border="1" align="center" width="100%">
                                <tr>
                                    <th>Id Galerie</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Horaires</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                                </br>

                                <?php
                                foreach ($tab as $galerie) {
                                    ?>

                                    <tr>
                                        <td>
                                            <?= $galerie['idGalerie']; ?>
                                        </td>
                                        <td>
                                            <?= $galerie["nom"]; ?>
                                        </td>
                                        <td>
                                            <?= $galerie['email']; ?>
                                        </td>
                                        <td>
                                            <?= $galerie['tel']; ?>
                                        </td>
                                        <td>
                                            <?= $galerie["horaires"]; ?>
                                        </td>
                                        <td align="center">
                                            <form method="POST" action="../backend/views/updateGalerie.php">
                                                <input type="submit" name="update" value="Update">
                                                <input type="hidden" value=<?PHP echo $galerie['idGalerie']; ?>
                                                    name="idGalerie">
                                            </form>
                                        </td>
                                        <td>
                                        <a href="../BACKENDD/views/deleteGalerie.php?id=<?php echo $galerie['idGalerie']; ?>" id="l" onclick="return confirmDelete();">Delete</a> 

                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <br>
                        </div>
                        <div class="col-md-13 col-sm-13 text-right">
                            <a href="..\backend\views\addImage.php" class="btn btn-small btn-primary">+ Add New
                                Image </a>
                        </div>
                        <br>
                        <div class="col-md-13 col-sm-13 text-right">
                            <a href="..\backend\views\afficherImages.php" class="btn btn-small btn-primary">Images By Gallery </a>
                        </div>
                        
                    
                        <div class="tm-table-mt tm-table-actions-row">
                            <div class="tm-table-actions-col-left">
                                <button class="btn btn-danger">Delete Selected Items</button>
                            </div>
                            <div class="tm-table-actions-col-right">
                                <span class="tm-pagination-label">Page</span>
                                <nav aria-label="Page navigation" class="d-inline-block">
                                    <ul class="pagination tm-pagination">
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <span class="tm-dots d-block">...</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">13</a></li>
                                        <li class="page-item"><a class="page-link" href="#">14</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-12 tm-md-12 tm-sm-12 tm-col">
                    <div class="bg-white tm-block h-100">
                        <h2 class="tm-block-title d-inline-block">Product Categories</h2>
                        <table class="table table-hover table-striped mt-3">
                            <tbody>
                                <tr>
                                    <td>1. Cras efficitur lacus</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>2. Pellentesque molestie</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>3. Sed feugiat nulla</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>4. Vestibulum varius arcu</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>5. Aenean eget urna enim</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>6. Condimentum viverra</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>7. In malesuada</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>8. Placerat</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                                <tr>
                                    <td>9. Donec semper</td>
                                    <td class="tm-trash-icon-cell"><i class="fas fa-trash-alt tm-trash-icon"></i></td>
                                </tr>
                            </tbody>
                        </table>

                        <a href="#" class="btn btn-primary tm-table-mt">Add New Category</a>
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
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function () {
            $('.tm-product-name').on('click', function () {
                window.location.href = "edit-product.html";
            });
        })
    </script>
</body>

</html>