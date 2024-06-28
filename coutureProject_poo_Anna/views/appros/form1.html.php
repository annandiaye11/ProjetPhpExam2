<div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-b from-gray-100 to-gray-300 py-8">
    <div class="flex flex-col px-20  w-1/2 bg-white rounded-xl shadow-lg p-8 pb-5">
        <h2 class="text-3xl font-bold text-blue-800 mb-6 text-center">Approvisionnement</h2>
        <form method="POST" action="<?= WEBROOT ?>/?controller=appro" class="space-y-6">

        <div class="flex items-center space-x-12">
                <!-- Tel Select -->
                <div>
                    <label for="telephone" class="sr">Telephone</label>
                    <input type="text" id="telephone" name="telephone" placeholder="telephone four"
                        class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- nom Input -->
                <div>
                    <label for="nom" class="sr">nom</label>
                    <input disabled type="text" id="nom" name="nomFournisseur" placeholder="nom_four"
                        class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Add Input -->
                <div>
                    <label for="adresse" class="sr">adresse</label>
                    <input disabled type="text" id="adresse" name="addresse" placeholder="adresse_four"
                        class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

            </div>


            <div class="flex items-center space-x-12">
                <!-- Article Select -->
                <div>
                    <label for="article" class="sr">Article</label>
                    <select id="article" name="idArticle"
                        class="block w-max py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        
                        
                        <option selected>...</option>
                    </select>
                </div>

                <!-- Qte Appro Input -->
                <div>
                    <label for="qte" class="sr">Qte Appro</label>
                    <input type="number" id="qte" name="qte" placeholder="Qte Appro"
                        class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <button type="submit" name="action" value="add-articleappro"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-5">
                    Add
                </button>
            </div>

        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
           
            
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Article
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Qte Appro
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Prix Appro
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Montant
                        </th>
                       
                    </tr>
                </thead>
                <tbody>
                    

                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <div>Total : <span class="font-medium text-gray-700"> CFA</span></div>
        </div>

        <a 
    class="w-full bg-gradient-to-r from-green-500 to-blue-500 text-white font-semibold py-3 rounded-lg mt-6 hover:from-green-600 hover:to-blue-600 transition-colors duration-300 text-center"
    href="<?= WEBROOT ?>/?controller=appro&action=add-appro" >Ajouter</a>

        
    </div>
</div>

<script type="module" src="<?= WEBROOT ?>/js/ApproController.js"></script>