<div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-b from-gray-100 to-gray-300 py-8">
    <div class="flex flex-col px-20  w-1/2 bg-white rounded-xl shadow-lg p-8 pb-5">
        <h2 class="text-3xl font-bold text-blue-800 mb-6 text-center">Approvisionnement</h2>
        <form method="POST" action="<?= WEBROOT ?>/?controller=appro" class="space-y-6">

            <label class="block text-sm font-medium text-gray-700 mb-1" for="typeId">Fournisseur</label>
            <select name="idFour"
                class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                id="typeId">
                <?php foreach ($fournisseurs as $fournisseur) { ?>
                    <option  <?php if($_SESSION["panier"]!= false && $_SESSION["panier"]->fournisseur == $fournisseur['id']) echo "selected"; ?>value="<?= $fournisseur['id'] ?>"><?= $fournisseur['nomFour'] ?></option>
                <?php } ?>
            </select>
            <div class="flex items-center space-x-12">
                <!-- Article Select -->
                <div>
                    <label for="article" class="sr">Article</label>
                    <select id="article" name="idArticle"
                        class="block w-max py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <?php foreach ($articles as $article) { ?>
                            <option value="<?= $article['id'] ?>"><?= $article['nomArticle'] ?></option>
                        <?php } ?>
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
                    <?php 
                    if (isset($_SESSION['panier'])) 
                    {
                    foreach (($_SESSION["panier"])->articles as $article) { 
                        
                        ?>

                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $article['nomArticle'] ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $article['qteAppro'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $article['prixAppro'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $article['montantArticle'] ?>
                            </td>
                        </tr>
                    <?php } 
                    
                    }?>

                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <div>Total : <span class="font-medium text-gray-700"><?=$_SESSION["panier"]->total ?> CFA</span></div>
        </div>

        <a 
    class="w-full bg-gradient-to-r from-green-500 to-blue-500 text-white font-semibold py-3 rounded-lg mt-6 hover:from-green-600 hover:to-blue-600 transition-colors duration-300 text-center"
    href="<?= WEBROOT ?>?controller=appro&action=add-appro" >Ajouter</a>

        
    </div>
</div>