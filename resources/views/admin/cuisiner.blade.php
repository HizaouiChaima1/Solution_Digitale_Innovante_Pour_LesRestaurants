<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interface Cuisiner</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 100%;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #090909;
      border-radius: 10px;
      background-color: #1600a8;
    }
    .order {
      margin-bottom: 20px;
      border: 1px solid #000000;
      border-radius: 5px;
      padding: 10px;
      background-color: #ffffff;
    }
    .order-details {
      margin-bottom: 10px;
    }
    .order-products {
      margin-bottom: 10px;
    }
    .processing {
      display: none;
      text-align: center;
      margin-top: 20px;
    }
    .processing img {
      width: 50px;
    }
  </style>
      <!-- Favicon -->
      <link rel="icon" type="image/x-icon" href="{{ asset('slims.png')}}" />

      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />
  
      <!-- Icons -->
      <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />
  
      <!-- Core CSS -->
      <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
      <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
  
      <!-- Vendors CSS -->
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
      <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
  
      <!-- Page CSS -->
  
      <!-- Helpers -->
      <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
      <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
      <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
     
    
      <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
      <script src="{{ asset('assets/js/config.js') }}"></script>
  
</head>
<body>
  @include('admin.nav');
  <div class="container">
    <h2 style="text-align: center;color:#fff;">Commandes de jours</h2>

    <div class="order">
      @foreach ($commandes as $commande)
      <div class="order-details">Commande n° $i:</div>
      @foreach ($commande->produits as $produit)
      <div class="order-products"> <li>{{ $produit->nom_produit }}</li></div>
      @endforeach
      <button class="day-button" onclick="processOrder('Traité')">Traité</button>
      <button class="day-button" onclick="processOrder('Non Traité')">Non Traité</button>
    </div>
    @endforeach
  </div>

  <script>
    function processOrder(status) {
      document.getElementById('processing').style.display = 'block';
      // Ici, vous pouvez ajouter le code pour traiter la commande sélectionnée.
      // Par exemple, vous pouvez envoyer une requête AJAX au serveur pour traiter la commande.

      // Simuler un délai de traitement (3 secondes ici)
      setTimeout(function() {
        document.getElementById('processing').style.display = 'none';
        alert('La commande a été ' + status + ' avec succès!');
      }, 3000);
    }
  </script>
</body>
</html>
