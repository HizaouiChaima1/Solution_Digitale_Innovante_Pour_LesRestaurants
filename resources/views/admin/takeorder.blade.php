<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander</title>
    <style>
        .category-button,
        .product-button {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin: 0.5rem; /* Add this line */
            border: none;
            border-radius: 4px;
            background-color:#ffffff;
            color: #ffffff;
            font-size: 1rem;
            cursor: pointer;
        }
        .t{
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .categorie {
            margin-left: 21%;
            position: relative;
            height: 13vh;
            width: 700px;
        }
        .formulaire {
            margin-left: 6%;
        }
        .button-row {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
            width: 100%;
        }
        .purple-button {
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 24px;
            width: 150px; 
            height: 60px; 
            display: flex;
            align-items: center; 
            justify-content: center;
        }
        .container {
            margin-left: -4%;
            position: relative; 
            height: 100vh;
            width: 800px ;
        }
        #sidebar {
            float: left; 
            width: 250px;
            margin: 10px;
            padding : 10px;
            margin-top: -5%;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 5px;
            margin-left: -3%;
        }
        label {
            display: block;
            margin-bottom: 2px;
            font-size: 14px;
        }
        select,
        input[type="text"],
        input[type="datetime-local"],
        textarea {
            display: block;
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1rem;
            line-height: 1.5;
        }
        .table-container {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        th,
        td {
            padding: 5px;
            border: 1px solid #ccc;
            font-size: 12px;
        }
        button {
            background-color: #ffffff !important;
            color: #000000;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #000; 
        }
        a { 
            font-weight: bold;
            color: #AF2B1D; 
            text-decoration: none; 
        } 
        a:hover {
            text-decoration: underline;
        }
        .lien {
            margin-top: -10px;
        }
        .prodd {
            position: relative;
            margin-left: 21%;
        }
        .subcategory-square {
            width: 150px; 
            height: 150px; 
            background-color: rgb(255, 253, 253);
            padding: 10px;
            margin: 5px;
            display: flex;
            flex-direction: column; 
            align-items: center;
            justify-content: center;
            border: 2px solid black; 
        }
        .subcategory-square a {
            color: black; 
            text-decoration: none;
            display: block;
            margin-bottom: 10px; 
        }
        .subcategory-square a:hover {
            background-color: rgb(253, 249, 249);
        }
        .subcategory-square img {
            max-width: 100%; 
            max-height: 100%;
        }
    </style>
</head>
<body>
    <div class="categorie">
        <div class="button-row" id="product-buttons">
            @foreach ($produits as $produit)
                <button type="button" class="subcategory-square category-button" data-prix="{{ $produit->Prix }}">
                    {{ $produit->Nom }}
                    <div>
                        <img src="{{ $produit->photo }}" width="50px" class="img img-responsive">
                    </div>
                </button>
            @endforeach
        </div>              
    </div>
    <div id="table-wrapper" class="t">
        <div id="order-table" style="display: none;">
            <h2>Order</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody id="order-table-body">
                    <!-- Rows will be dynamically added here -->
                </tbody>
            </table>
        </div>
    </div>
    <div id="sidebar">
        <a href="/ordres" class="lien"> < Annuler </a>
        <h2>Nom de restaurant</h2>
        <div class="formulaire">
            <form action="{{ route('admin.store') }}" method="post" onsubmit="return validateTotalPrice()">
                @csrf
                <div class="form-group">
                    <label for="branch">Branche</label>
                    <select id="branch" name="branch">
                        <option value="branch1">Branche 1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="order-type">Type de commande</label>
                    <select id="type_commande" name="type_commande">
                        <option value="À emporter">À emporter</option>
                        <option value="Livraison">Livraison</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="customer">Client</label>
                    <input type="text" id="client" name="client" placeholder="Nom du client">
                </div>
                <input type="hidden" id="total-price-input" name="total_price" required>
                <div class="form-group">
                    <label for="due-at">Date :</label>
                    <input type="datetime-local" id="heure_arrivee" name="heure_arrivee">
                </div>
                <div class="form-group">
                    <label for="receipt-notes">Notes de réception</label>
                    <textarea id="notes_ticket" name="notes_ticket" placeholder="Entrez les notes de réception"></textarea>
                </div>
                <div class="form-group">
                    <label for="kitchen-notes">Notes de cuisine</label>
                    <textarea id="notes_cuisine" name="notes_cuisine" placeholder="Entrez les notes de cuisine"></textarea>
                </div>
                <div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Article
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Quantité
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Prix
                                </th>
                            </tr>
                        </thead>
                        <tbody id="selected-products-body" class="bg-white divide-y divide-gray-200">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">Total</div>
                                </td>
                                <td id="total-price" class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">0 TND</div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <button id="submit-orderButton" style="background-color: #AF2B1D !important;" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Envoyer la commande
                </button>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function validateTotalPrice() {
            var totalPrice = parseFloat(document.getElementById('total-price-input').value);
            if (totalPrice <= 0) {
                alert("Veuillez sélectionner au moins un produit.");
                return false;
            }
            return true;
        }

        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll('.category-button');
            const selectedProductsBody = document.getElementById('selected-products-body');
            const totalPrice = document.getElementById('total-price');
            const totalPriceInput = document.getElementById('total-price-input');

            let total = 0;

            buttons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    const nomProduit = button.textContent.trim();
                    const prix = parseFloat(button.getAttribute('data-prix'));

                    const newRow = selectedProductsBody.insertRow(-1);
                    const cellNom = newRow.insertCell(0);
                    const cellQuantite = newRow.insertCell(1);
                    const cellPrix = newRow.insertCell(2);
                    cellNom.textContent = nomProduit;
                    cellQuantite.textContent = "1";
                    cellPrix.textContent = prix + " TND";

                    total += prix;
                    totalPrice.textContent = total.toFixed(2) + " TND";
                    totalPriceInput.value = total.toFixed(2);
                });
            });
        });
    </script>
</body>
</html>
