<!-- component -->

<div class="container mx-auto my-8 p-4 bg-gray-100 rounded-lg shadow-lg">
    <div class="flex justify-end mb-4">
        <a href="<?= WEBROOT ?>/?controller=article&action=form"
            class="cursor-pointer px-6 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition-colors duration-300">Nouveau</a>
    </div>
    <div class="overflow-hidden rounded-lg border border-gray-200">
        <table class="min-w-full bg-white">
            <thead class="bg-blue-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-blue-800 font-semibold uppercase tracking-wider">Date</th>
                    <th scope="col" class="px-6 py-3 text-blue-800 font-semibold uppercase tracking-wider">Montant</th>
                    <th scope="col" class="px-6 py-3 text-blue-800 font-semibold uppercase tracking-wider">Fournisseur</th>
                    <th scope="col" class="px-6 py-3 text-right"></th>
                    <th scope="col" class="px-6 py-3 text-right"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appros as $appro): ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4 text-gray-800"><?= $appro['date'] ?></td>
                        <td class="px-6 py-4 text-gray-800"><?= $appro['montant'] ?></td>
                        <td class="px-6 py-4 text-gray-800"><?= $appro['idFour'] ?></td>
                        <td class="px-6 py-4 text-right">
                            <a href="<?= WEBROOT ?>/?controller=article&action=edit_<?= $article['id'] ?>" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="<?= WEBROOT ?>/?controller=article&action=suppr_<?= $article['id'] ?>" class="text-red-600 hover:text-red-900">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

