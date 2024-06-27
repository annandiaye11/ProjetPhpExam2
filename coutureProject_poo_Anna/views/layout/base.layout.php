<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Tailwind CSS v5.2.1 -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="js/script.js" defer></script>
</head>

<body>
    <nav class="bg-gradient-to-r from-blue-600 to-purple-700 text-white border-b border-blue-800">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-6">
            <a href="<?= WEBROOT ?>/?controller=article&action=liste"
                class="flex items-center space-x-4 rtl:space-x-reverse">
                <span class="self-center text-3xl font-bold tracking-wide">Appli de couture</span>
            </a>
            <button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center p-3 w-12 h-12 justify-center rounded-lg md:hidden bg-white text-blue-600 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-300"
                aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:flex md:items-center md:space-x-12" id="navbar-dropdown">
                <ul
                    class="flex flex-col font-semibold p-4 md:p-0 mt-4 border border-blue-800 rounded-lg bg-blue-600 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent">
                    <li>
                        <a href="<?= WEBROOT ?>/?controller=article&action=liste"
                            class="block py-2 px-3 rounded md:bg-transparent md:hover:text-white md:p-0 dark:text-white md:dark:hover:text-white"
                            aria-current="page">Article</a>
                    </li>
                    <li class="relative">
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full py-2 px-3 rounded hover:bg-blue-700 md:hover:bg-transparent md:hover:text-white md:p-0 md:w-auto">
                            Paramétrage
                            <svg class="w-3 h-3 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="absolute z-10 hidden font-normal bg-white text-blue-600 divide-y divide-gray-100 rounded-lg shadow-md w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-300"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="<?= WEBROOT ?>/?controller=type"
                                        class="block px-4 py-2 hover:bg-blue-100 dark:hover:bg-blue-900 dark:hover:text-white transition duration-150">Types</a>
                                </li>
                                <li>
                                    <a href="<?= WEBROOT ?>/?controller=categorie"
                                        class="block px-4 py-2 hover:bg-blue-100 dark:hover:bg-blue-900 dark:hover:text-white transition duration-150">Catégories</a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <li>
                        <a href="<?= WEBROOT ?>/?controller=appro&action=liste-appro"
                            class="block py-2 px-3 rounded hover:bg-blue-700 md:hover:bg-transparent md:hover:text-white md:p-0 dark:text-white md:dark:hover:text-white">Approvisionnement</a>
                    </li>
                    <li>
                        <a href="<?= WEBROOT ?>/?controller=login"
                            class="block py-2 px-3 rounded hover:bg-blue-700 md:hover:bg-transparent md:hover:text-white md:p-0 dark:text-white md:dark:hover:text-white">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <?= $contentView ?>
    </main>
</body>

</html>