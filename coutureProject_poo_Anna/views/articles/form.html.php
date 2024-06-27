<div class="flex flex-col items-center justify-center min-h-screen bg-gradient-to-b from-gray-100 to-gray-300 py-8">
    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-3xl font-bold text-blue-800 mb-6 text-center">Article</h2>
        <form method="POST" action="<?= WEBROOT ?>/?controller=article" class="space-y-6">
            <input type="hidden" name="id" value="<?= $article['id'] ?? "" ?>">
            <input placeholder="Libellé" name="nomArticle" value="<?= $article['nomArticle'] ?? "" ?>" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" type="text">
            <input placeholder="Prix" name="prixAppro" value="<?= $article['prixAppro'] ?? "" ?>" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" type="number">
            <input placeholder="Stock" name="qteStock" value="<?= $article['qteStock'] ?? "" ?>" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" type="number">
            
            <label class="block text-sm font-medium text-gray-700 mb-1" for="typeId">Type</label>
            <select name="typeId" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" id="typeId">
                <?php foreach ($types as $type) {?>
                    <option value="<?= $type['id'] ?>"><?= $type['nomType'] ?></option>
                <?php } ?>
            </select>

            <label class="block text-sm font-medium text-gray-700 mb-1" for="categoryId">Catégories</label>
            <select name="categoryId" class="w-full bg-gray-50 border border-gray-300 rounded-lg p-3 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" id="categoryId">
                <?php foreach ($categories as $category) {?>
                    <option value="<?= $category['id'] ?>"><?= $category['nomCategorie'] ?></option>
                <?php } ?>
            </select>

            <button name="action" value="create" class="w-full bg-gradient-to-r from-green-500 to-blue-500 text-white font-semibold py-3 rounded-lg mt-6 hover:from-green-600 hover:to-blue-600 transition-colors duration-300" type="submit">
                <?= isset($article['id']) ? "Editer" : "Ajouter" ?>
            </button>
        </form>
    </div>
</div>
