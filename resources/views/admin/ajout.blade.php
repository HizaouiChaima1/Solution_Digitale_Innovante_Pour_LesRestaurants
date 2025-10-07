<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Ajouter Compte</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/logoo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!-- Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="assets/vendor/js/template-customizer.js"></script>
    <!-- Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    <link rel="stylesheet" href="assets/css/produit.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .button-heading-container {
            display: flex;
            align-items: center;
            /* Align items vertically in the center */
            justify-content: space-between;
            /* Add space between the heading and the button */
            margin-bottom: 20px;
            /* Adjust margin as needed */
        }

        .add-button {
            background-color: white;
            color: black;
            border-radius: 5px;
            cursor: pointer;
        }

        .sidebar {
            width: 200px;
            margin: 0 10px;
            padding: 10px;
        }

        .dev {
            margin-top: 2%;
            width: 90%;
            margin-right: -9%;
            margin-left: 15%;
        }
    </style>
</head>

<body>

    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            @include ('admin.sidebar')
            <div class="dev">

                <!-- Content -->
                <div class="container-xxl">
                    <div class="authentication-wrapper authentication-basic container-p-y">
                        <div class="authentication-inner py-4">
                            @include ('admin.nav')
                            <!-- Demande de Partenariat Card -->
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="mb-1 pt-2" style="text-align: center">Nouvel Employé</h4>

                                    <form class="mb-3" action="{{ route('employe.store')}}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="nom" class="form-label">Nom et Prénom:</label>
                                            <input type="text" class="form-control" id="Nom" name="Nom"
                                                placeholder="Nom et Prénom" autofocus />
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="text" class="form-control" id="Email" name="Email"
                                                placeholder="Email" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="telephone" class="form-label">Numéro de Téléphone :</label>
                                            <input type="tel" class="form-control" id="numero_de_téléphone"
                                                name="numero_de_téléphone" placeholder="Numéro de téléphone" />
                                        </div>
                                        <div class="mb-3 row">
                                            <div>
                                                <label for="role" class="col-sm-2 col-form-label">Rôle:</label>
                                            </div>
                                            <div class="col-sm-12">
                                                <select id="Rôle" name="Rôle" class="form-select">
                                                    <option value="" disabled selected hidden>Rôle
                                                    </option>
                                                    <option value="Caissier">Caissier</option>
                                                    <option value="Cuisinier">Cuisinier</option>
                                                    <option value="Serveur">Serveur</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="mb-3">
                                            <label for="telephone" class="form-label">Adresse employee :</label>
                                            <input type="tel" class="form-control" id="customerAddress1"
                                                name="customerAddress1"  value="L'adresse d'employéé" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="telephone" class="form-label">pays :</label>
                                            <input type="tel" class="form-control" id="pays"
                                                name="pays"  value="{{ session('pays') }}" />
                                        </div>
                                     
                                        <div class="mb-3">
                                            <label for="telephone" class="form-label">Nom restaurant :</label>
                                            <input type="tel" class="form-control" id="nomrestau"
                                                name="nomrestau"  value="{{ session('nomrestau') }}" />
                                        </div>
                                    
                                        <div class="mb-3">
                                            <label for="motpasse" class="form-label">Mot de passe :</label>
                                            <input type="text" class="form-control" id="password" name="password"
                                                placeholder="Mot de passe " />
                                        </div>
                                        <button type="submit" class="btn btn-primary d-grid w-100">Enregistre</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /Demande de Partenariat Card -->
                        </div>
                    </div>
                </div>
                <!-- / Content -->
            </div>
        </div>
    </div>
</body>

</html>
