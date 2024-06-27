<div class="m-auto relative overflow-x-auto w-1/3 p-6 bg-white rounded-lg shadow-lg">
    <form method="POST" action="<?= WEBROOT ?>/?controller=categorie" class="max-w-md mx-auto mb-8">
        <label for="default-search" class="mb-2 text-sm font-semibold text-gray-800 sr-only">Ajouter</label>
        <div class="relative">
            <input type="text" name="nomCategorie" id="default-search" 
                   class="block w-full py-4 ps-12 pr-32 text-gray-900 border border-gray-300 rounded-full bg-gray-50 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none "
                   placeholder="Une categorie" required />
            <button type="submit" name="action" value="create"
                    class="absolute end-2 top-2 bg-gradient-to-r from-green-500 to-blue-500 text-white font-bold py-2 px-6 rounded-full hover:from-green-600 hover:to-blue-600 focus:ring-2 focus:ring-blue-300 focus:outline-none">
                    <i class="fa-solid fa-plus text-white-500"></i>
            </button>
        </div>
    </form>
    
    <table class="w-full text-sm text-left text-white-600 dark:text-white-400">
        <thead class="text-xs text-white-800 uppercase bg-white-100 dark:bg-white-800 dark:text-white-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-8 py-3">
                    Nom catégorie
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($categories as $categorie) {
                ?>
                <tr class="bg-white-50 border-b dark:bg-white-900 dark:border-white-700 hover:bg-white-200 dark:hover:bg-white-700">
                    <th scope="row" class="px-6 py-4 font-semibold text-gray-800 dark:text-gray">
                        <?= $categorie['id'] ?>
                    </th>
                    <td class="px-8 py-4">
                        <?= $categorie['nomCategorie'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
