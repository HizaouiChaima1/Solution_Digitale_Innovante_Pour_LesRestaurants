<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>carte cadeau</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/logoo.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icons.css" />

  
    
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/vendor/js/template-customizer.js"></script>

    <script src="assets/js/config.js"></script>
    <link rel="stylesheet" href="assets/css/produit.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
 
    <style>
        .button-heading-container {
    display: flex;
    align-items: center; /* Align items vertically in the center */
    justify-content: space-between; /* Add space between the heading and the button */
    margin-bottom: 20px; /* Adjust margin as needed */
}
</style>
  
</head>

<body class="bg-white">



@include ('admin.sidebar')

     <!-- Layout container -->
 <div class="layout-page">
         
 @include('admin.nav')
 <!-- Content wrapper -->
 <div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
                <div class="dev">
                <div class="button-heading-container">
                        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span>Carte cadeau</h4>
                        <button type="button" id="create-button" class="create-button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Créer une carte de fidélité</button>
                        </div>
                        <!-- Table -->
                        <div class="card">
                     <div class="card-datatable table-responsive">
                     <div id="tableContainer">
                     <table class="datatables-customers table border-top"  id="mainTable">
                <div class="d-flex justify-content-end"> 
        
             <thead>
                    <tr>
                    <th class="tous" onclick="showMainTable()">Tous</th>
            <th class="active" onclick="showActiveTable()">Active</th>
            <th class="inactive" onclick="showInactiveTable()">Inactive</th>
            <th class="supprime" onclick="showNewTable()">Supprimé</th>
                            <th></th>
                            <th></th>
                            <th></th>
                      </tr>
                      @if ($Cartefidelites ->isEmpty())
                     <tr>
                      <td colspan="8">Créez des cartes-cadeaux que les clients peuvent acheter et utiliser plus tard pour payer leurs commandes.<br>
                       La carte-cadeau est vendue en tant que produit et le montant de la vente ne sera pas reflété dans les rapports de ventes.
                       </td>
                        </tr>
                      @else
                        <tr>                       
                            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th></th>
                            <th>Nom</th>
                            <th>SKU</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                     <tbody class="bg-white">
                     @foreach ($Cartefidelites as $carte)
                     @if (!$carte->deleted_at )
                     <tr onclick="window.location='{{ route('carte.detail', ['carte' => $carte->id]) }}';" style="cursor: pointer;">                                                
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                    
                           <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <img src="{{ $carte->photo}}" width ="50"height ="50"class ="img img-responsive"/></td>                     
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->SKU}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->category->Nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Prix}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->status}} </td>                          
                        </tr>
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                    </div>
                </table>
              

                <table class="datatables-customers table border-top" id="newTable" style="display: none;">
                <div class="d-flex justify-content-end"> 
        
             <thead>
                    <tr>
                        <th class="tous" onclick="showMainTable()">Tous</th>
                         <th class="active" onclick="showActiveTable()">Active</th>
                         <th class="inactive" onclick="showInactiveTable()">Inactive</th>
                          <th class="supprime" onclick="showNewTable()">Supprimé</th>
                            <th></th>
                            <th></th>
                            <th></th>
                      </tr>
                      @if ($Cartefidelites ->isEmpty())
                     <tr>
                      <td colspan="8">Créez des cartes-cadeaux que les clients peuvent acheter et utiliser plus tard pour payer leurs commandes.<br>
                       La carte-cadeau est vendue en tant que produit et le montant de la vente ne sera pas reflété dans les rapports de ventes.
                       </td>
                        </tr>
                      @else
                        <tr>                       
                            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th></th>
                            <th>Nom</th>
                            <th>SKU</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                     <tbody class="bg-white">
                     @foreach ($Cartefidelites as $carte)
                     @if ($carte->deleted_at )
                     <tr onclick="window.location='{{ route('carte.detail', ['carte' => $carte->id]) }}';" style="cursor: pointer;">                                                
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                    
                           <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <img src="{{ $carte->photo}}" width ="50"height ="50"class ="img img-responsive"/></td>                     
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->SKU}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->category->Nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Prix}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->status}} </td>                          
                        </tr>
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                    </div>
                </table>


                
                <table class="datatables-customers table border-top" id="activeTable" style="display: none;">
                <div class="d-flex justify-content-end"> 
        
             <thead>
                    <tr>
                        <th class="tous" onclick="showMainTable()">Tous</th>
                         <th class="active" onclick="showActiveTable()">Active</th>
                         <th class="inactive" onclick="showInactiveTable()">Inactive</th>
                          <th class="supprime" onclick="showNewTable()">Supprimé</th>
                            <th></th>
                            <th></th>
                            <th></th>
                      </tr>
                      @if ($Cartefidelites ->isEmpty())
                     <tr>
                      <td colspan="8">Créez des cartes-cadeaux que les clients peuvent acheter et utiliser plus tard pour payer leurs commandes.<br>
                       La carte-cadeau est vendue en tant que produit et le montant de la vente ne sera pas reflété dans les rapports de ventes.
                       </td>
                        </tr>
                      @else
                        <tr>                       
                            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th></th>
                            <th>Nom</th>
                            <th>SKU</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                     <tbody class="bg-white">
                     @foreach ($Cartefidelites as $carte)
                     @if ($carte->status == 'Actif')
                     <tr onclick="window.location='{{ route('carte.detail', ['carte' => $carte->id]) }}';" style="cursor: pointer;">                                                
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                    
                           <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <img src="{{ $carte->photo}}" width ="50"height ="50"class ="img img-responsive"/></td>                     
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->SKU}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->category->Nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Prix}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->status}} </td>                          
                        </tr>
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                    </div>
                </table>



                <table class="datatables-customers table border-top" id="inactiveTable" style="display: none;">
                <div class="d-flex justify-content-end"> 
        
             <thead>
                    <tr>
                        <th class="tous" onclick="showMainTable()">Tous</th>
                         <th class="active" onclick="showActiveTable()">Active</th>
                         <th class="inactive" onclick="showInactiveTable()">Inactive</th>
                          <th class="supprime" onclick="showNewTable()">Supprimé</th>
                            <th></th>
                            <th></th>
                            <th></th>
                      </tr>
                      @if ($Cartefidelites ->isEmpty())
                     <tr>
                      <td colspan="8">Créez des cartes-cadeaux que les clients peuvent acheter et utiliser plus tard pour payer leurs commandes.<br>
                       La carte-cadeau est vendue en tant que produit et le montant de la vente ne sera pas reflété dans les rapports de ventes.
                       </td>
                        </tr>
                      @else
                        <tr>                       
                            <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1"
                                colspan="1" style="width: 18px;" data-col="1" aria-label="">
                                <input type="checkbox" class="form-check-input">
                            </th>
                            <th></th>
                            <th>Nom</th>
                            <th>SKU</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Active</th>
                        </tr>
                    </thead>
                     <tbody class="bg-white">
                     @foreach ($Cartefidelites as $carte)
                     @if ($carte->status == 'Inactif')
                     <tr onclick="window.location='{{ route('carte.detail', ['carte' => $carte->id]) }}';" style="cursor: pointer;">                                                
                            <td><input type="checkbox" class="dt-checkboxes form-check-input"></td>                    
                           <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                            <img src="{{ $carte->photo}}" width ="50"height ="50"class ="img img-responsive"/></td>                     
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->SKU}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->category->Nom}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->Prix}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">{{ $carte->status}} </td>                          
                        </tr>
                        @endif
                        @endforeach
                        @endif
                    </tbody>
                    </div>
      
                </table>
</div>            
</div>
</div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Créer une carte de fidélité</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="mb-3" action="{{ route('cartefidelite.ajout') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez un nom de carte de fidélité">
                        <span>Nom</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="text" class="form-control" id="nom" name ="Nom"  >
                        </div>
                        <div class="mb-3">
                         <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Entrez une photo de carte de fidélité">
                        <span>Photo de carte de fidélité</span><i class="fas fa-exclamation-circle"></i></label>
                       <input type="file" class="form-control" id="photo" name="photo">
                         </div>
                        <div class="mb-3">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Choisissez la catégorie de cette carte fidélité">
                        <span>Catégories</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <select class="form-control" id="Catégorie" name="Catégorie">
                             <option value="">Choisir...</option>
                               @foreach($categories as $categorie)
                                   <option value="{{ $categorie->Nom }}">{{ $categorie->Nom }}</option>
                                    @endforeach
                                 </select>
                        </div>
                        <div class="mb-2 row">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="L'unité de gestion des stocks est un code composé de chiffres ou de lettres qui identifie la carte fidélité">
                        <span>SKU</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                        <div class="col-sm-8">
                         <input type="text" class="form-control" id="sku" name ="SKU">
                        </div>
                         <div class="col-sm-2">
                        <button type="button" class="btn btn-secondary">Générer</button>
                        </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pour choisir le mode de tarification">
                        <span>Stratégie de prix</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <select id="stp" class="form-control" name ="strategie_prix">
                            <option value="Prix fixe" name="Prix fixe">Prix fixe</option>
                            <option value="Prix libre" name ="Prix libre">Prix libre</option>
                            </select>
                        </div>
                        <div class="mb-3" id="prixContainer" style="display: none;">
                        <label class="form-label"  data-bs-toggle="tooltip" data-bs-placement="top" title="Pour choisir le mode de tarification">
                        <span>Prix</span><span style="color: red;">*</span> <i class="fas fa-exclamation-circle"></i></label>
                            <input type="number" class="form-control" id="prix" name ="Prix">
                        </div>

                        <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" id="saveButton">Sauvegarder</button>
                </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /Modal -->

 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




 <!-- Bootstrap JS and jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
 
 function showMainTable() {
   document.getElementById('mainTable').style.display = 'table';
   document.getElementById('newTable').style.display = 'none';
   document.getElementById('activeTable').style.display = 'none';
   document.getElementById('inactiveTable').style.display = 'none';
 }
 
 function showNewTable() {
   document.getElementById('mainTable').style.display = 'none';
   document.getElementById('newTable').style.display = 'table';
   document.getElementById('activeTable').style.display = 'none';
   document.getElementById('inactiveTable').style.display = 'none';
 }
 
 function showActiveTable() {
   document.getElementById('mainTable').style.display = 'none';
   document.getElementById('newTable').style.display = 'none';
   document.getElementById('activeTable').style.display = 'table';
   document.getElementById('inactiveTable').style.display = 'none';
 }
 
 function showInactiveTable() {
   document.getElementById('mainTable').style.display = 'none';
   document.getElementById('newTable').style.display = 'none';
   document.getElementById('activeTable').style.display = 'none';
   document.getElementById('inactiveTable').style.display = 'table';
 }
 </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('stp');
        const prixContainer = document.getElementById('prixContainer');

        selectElement.addEventListener('change', function() {
            if (this.value === 'Prix fixe') {
                prixContainer.style.display = 'block';
            } else {
                prixContainer.style.display = 'none';
            }
        });

        // To handle the initial load state
        if (selectElement.value === 'Prix fixe') {
            prixContainer.style.display = 'block';
        } else {
            prixContainer.style.display = 'none';
        }
    });
</script>

<script>
  $(document).ready(function() {
    $('.create-category-button').on('click', function() {
      $('#exampleModal').modal('show');
    });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap"></script>
<script src="assets/vendor/js/bootstrap.js"></script>
<script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="assets/vendor/libs/@form-validation/bootstrap5.js"></script>
</body>
</html>

