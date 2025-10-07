<!doctype html>
<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets') }}"
  data-template="vertical-menu-template">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Tous</title>

    <meta name="description" content="" />
   <!-- Favicon -->
   <link rel="icon" type="image/x-icon" href="{{ asset('slims.png') }}" />

   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link
     href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
     rel="stylesheet" />

   <!-- Icons -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}'" />
   <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/tabler-icons.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}"/>

   <!-- Core CSS -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

   <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/vendor/libs/swiper/swiper.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}" />

   <!-- Page CSS -->
   <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/cards-advance.css') }}" />

   <!-- Helpers -->
   <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
   <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
   <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
   <script src="{{ asset('assets/js/config.js') }}"></script>
  
  
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  
    <style>
.button-activer {
    background-color: #4CAF50; /* Couleur de fond verte */
    color: #fff; /* Couleur du texte blanc */
    font-weight: bold;
    padding: 8px 16px; /* Espacement du contenu à l'intérieur du bouton */
    border-radius: 4px; /* Coins arrondis */
    cursor: pointer;
    transition: background-color 0.3s ease; /* Animation de transition */
}

.button-activer:hover {
    background-color: #45a049; /* Couleur de fond verte foncée au survol */
}

/* Style pour le bouton Inactif */
.button-inactif {
    background-color: #FF5252; /* Couleur de fond rouge */
    color: #fff; /* Couleur du texte blanc */
    font-weight: bold;
    padding: 8px 16px; /* Espacement du contenu à l'intérieur du bouton */
    border-radius: 4px; /* Coins arrondis */
    cursor: pointer;
    transition: background-color 0.3s ease; /* Animation de transition */
}

.button-inactif:hover {
    background-color: #FF4040; /* Couleur de fond rouge foncée au survol */
}
.container {
            text-align: center;
        }
  .img {
    margin-top: 5%;
    margin-left: 30%;
    margin-bottom: -33%;
    /* Réglez cette valeur selon vos besoins */
}   
</style>
  </head>

  <body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@include('layouts.side')
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

      
        <!-- / Menu -->

        <!-- Layout container -->
<!-- navbar -->

        @include('layouts.navbar')
<!--/ Navbar -->


<div class="content-wrapper">

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-2"><span class="text-muted fw-light"></span><b>Tous les Restaurants</b></h4>

        <!-- customers List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-customers table border-top">
                <div class="d-flex justify-content-end"> <!-- Container for right alignment -->
  <button 
    type="button"
    class="add-new btn btn-primary py-2 px-4 waves-effect waves-light"
    data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasEcommerceCustomerAdd"
    style="padding: 0.5rem 1rem;"> <!-- Adjust padding to increase space -->
    <i class="ti ti-plus me-2 mb-1 ti-xs"></i> <!-- Adjust margin to increase space -->
    <span class="d-none d-sm-inline-block">Add Customer</span>
  </button>
</div>  
                    <thead>
                        <tr>
                            <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 0px;"
                                aria-label=""></th>
                           
                            <th>Customer</th>
                            <th>Customer Id</th>
                            <th>Nom restaurant</th>
                            <th>Country</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($restaurants as $restaurant)
                        <tr>
                            <td  tabindex="0"><button type="button"
                                    class=" btn-primary  rounded-circle showDetailsBtn"   
                                                    data-customer-name="{{ $restaurant->customerName }}"
                                                    data-customer-id="{{ $restaurant->id }}"
                                                    data-customer-telephone="{{ $restaurant->customerContact }}"
                                                    data-customer-email="{{ $restaurant->customerEmail }}"
                                                    data-customer-nomrestaurant="{{ $restaurant->nomrestau }}"
                                                    data-customer-adresserestaurant="{{ $restaurant->customerAddress1 }}"
                                                    data-customer-country="{{ $restaurant->pays }}">+</button></td>                      
                           
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                {{ $restaurant->customerName}}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{ $restaurant->id }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{ $restaurant->nomrestau }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{ $restaurant->pays }}</td>
                                <td style="color: {{ $restaurant->status === 'inactiver' ? '#FF0000' : ($restaurant->status === 'activer' ? '#00FF00' : '#000000') }}">Client :{{ $restaurant->status }}</td>
                                <td>
            <div class="dt-buttons btn-group flex-wrap">
    <button class="button-activer btn add-new btn-primary mb-3 mb-md-0 waves-effect waves-light" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#addPermissionModal">
        <span>Activer</span>
    </button>
</div>
<a class="button-inactif btn add-new btn-primary mb-3 mb-md-0 waves-effect waves-light" href="{{ url('inactiver/' . $restaurant->customerEmail) }}">Inactive</a>
            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
<div class="modal fade" id="addPermissionModal" tabindex="-1" aria-labelledby="addPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title container" id="addPermissionModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form  action="{{ route('Email.envoyeremail') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" name="Email" class="form-control" id="email-{{ $restaurant->id }}" value="{{ session('emails.' . $restaurant->id) }}" placeholder="Email" autofocus>
                </div>
                <div class="mb-3">
                    <label for="mdp" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" autofocus>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary me-3 waves-effect waves-light" id="myButton" >Confirmer le client</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>            
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
        </div>
    </div>
</div> 

                <!-- Modal -->
                <div class="modal fade" id="customerDetailsModal" tabindex="-1" aria-labelledby="customerDetailsModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal content -->

                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title"></h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                        <tbody>
                        <tr>
                            <td>Nom et prénom:</td>
                            <td id="customerName"></td>
                        </tr>
                        <tr>
                            <td>Id:</td>
                            <td id="customerId"></td>
                        </tr>
                        <tr>
                            <td>Nom restaurant:</td>
                            <td id="customerRestaurant"></td>
                        </tr>
                        <tr>
                            <td>Adresse Restaurant:</td>
                            <td id="customeradresse"></td>
                        </tr>
                        <tr>
                            <td>Pays:</td>
                            <td id="customerCountry"></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td id="customeremail"></td>
                        </tr>
                        <tr>
                            <td>Numero de telephone</td>
                            <td id="customertelephone"></td>
                        </tr>
                    </tbody>
                                           
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 </div>
                
                <!-- Offcanvas to add new customer -->
                <div
                  class="offcanvas offcanvas-end"
                  tabindex="-1"
                  id="offcanvasEcommerceCustomerAdd"
                  aria-labelledby="offcanvasEcommerceCustomerAddLabel">
                  <div class="offcanvas-header">
                    <h5 id="offcanvasEcommerceCustomerAddLabel" class="offcanvas-title">Add Customer</h5>
                    <button
                      type="button"
                      class="btn-close text-reset"
                      data-bs-dismiss="offcanvas"
                      aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body mx-0 flex-grow-0">
                    <form class="ecommerce-customer-add pt-0" id="eCommerceCustomerAddForm"  action=""   method="POST">
                    @csrf
                      <div class="ecommerce-customer-add-basic mb-3">
                        <h6 class="mb-3">Basic Information</h6>
                        <div class="mb-3">
                          <label class="form-label" for="ecommerce-customer-add-name">Nom & Prenom*</label>
                          <input
                            type="text"
                            class="form-control"
                            id="customerName"
                            placeholder="John Doe"
                            name="customerName"
                            aria-label="John Doe" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="ecommerce-customer-add-state">Nom restaurant*</label>
                            <input
                              type="text"
                              id="nom_restaurant"
                              class="form-control"
                              placeholder="in & out"
                              aria-label="in & out"
                              name="nom_restaurant" />
                          </div>
                          <div class="mb-3">
                          <label class="form-label" for="ecommerce-customer-add-address-2">Adresse restaurant*</label>
                          <input
                            type="text"
                            id="adresse_restaurant"
                            class="form-control"
                            aria-label="adresse"
                            name="adresse_restaurant" />
                        </div>
                      
                        <div>
                          <label class="form-label" for="ecommerce-customer-add-country">Pays*</label>
                          <select id="pays" class="select2 form-select" name ="pays">
                            <option value="">Select</option>
                            <option value="Australia">Australia</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>

                            <option value="Italy">Italy</option>
                            <option value="Japan">Japan</option>
                            <option value="Korea">Korea, Republic of</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Russia">Russian Federation</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                          </select>
                        </div>
                      
                        <div class="mb-3">
                          <label class="form-label" for="ecommerce-customer-add-email">Email*</label>
                          <input
                            type="text"
                            id="customerEmail"
                            class="form-control"
                            placeholder="john.doe@example.com"
                            aria-label="john.doe@example.com"
                            name="customerEmail" />
                        </div>
                        <div>
                          <label class="form-label" for="ecommerce-customer-add-contact">Numero de téléphone*</label>
                          <input
                            type="text"
                            id="telephone"
                            class="form-control phone-mask"
                            placeholder="+(123) 456-7890"
                            aria-label="+(123) 456-7890"
                            name="telephone" />
                        </div>
                      <div class="pt-3">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Add</button>
                        <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Discard</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                  <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️
                  </div>
                  <div class="d-none d-lg-inline-block">
                    <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
<script>
    $(document).ready(function () {
        $('.showDetailsBtn').on('click', function () {
            var customerName = $(this).data('customer-name');
            var customerId = $(this).data('customer-id');
            var customerRestaurant = $(this).data('customer-nomrestaurant');
            var customerCountry = $(this).data('customer-country');
            var customeradresse = $(this).data('customer-adresserestaurant');
            var customeremail = $(this).data('customer-email');
            var customertelephone = $(this).data('customer-telephone');
           

            $('#customerName').text(customerName);
            $('#customerId').text(customerId);
            $('#customerRestaurant').text(customerRestaurant);
            $('#customerCountry').text(customerCountry);
            $('#customeradresse').text(customeradresse);
            $('#customeremail').text(customeremail);
            $('#customertelephone').text(customertelephone);


            // Update modal title with customer name
            $('#customerDetailsModal .modal-title').text('Détails de ' + customerName);


            $('#customerDetailsModal').modal('show');
        });
    });


</script>

<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/swiper/swiper.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
  


<script>
    document.querySelector('.button-activer').addEventListener('click', function() {
        var modal = new bootstrap.Modal(document.getElementById('addPermissionModal'));
        modal.show();
    });
</script>

  </body>
</html>
