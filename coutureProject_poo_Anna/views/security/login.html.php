<?php
use Anna\Core\Session;

$errors = [];
if ($_SESSION['errors']) {
    $errors = $_SESSION['errors'];
    Session::remove('errors');
}
?>

<div class="w-full h-screen flex items-center justify-center bg-gray-200 dark:bg-gray-800">
    <form method="POST" action="<?= WEBROOT ?>"
        class="max-w-sm w-full bg-white dark:bg-gray-900 rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-semibold text-center text-gray-900 dark:text-white mb-6">LOGIN</h2>

        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">email</label>
            <input type="email" name="login" id="email"
                class="block w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 <?= add_class_invalid($errors, 'login') ?>"
                placeholder="<?= add_placeholder_invalid($errors, 'login', 'name@gmail.com') ?>" required />
        </div>

        <div class="mb-5">
            <label for="password"
                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">password</label>
            <input type="password" name="password" id="password"
                class="block w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 <?= add_class_invalid($errors, 'password') ?>"
                placeholder="********" required />
        </div>
        <input type="hidden" name="controller" value = "login">
        <button type="submit" name="action" value="log"
            class="w-full py-2.5 text-white bg-gradient-to-r from-blue-500 to-teal-500 hover:from-blue-600 hover:to-teal-600 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 rounded-lg font-medium text-sm text-center dark:bg-blue-600 dark:hover:bg-teal-600 dark:focus:ring-teal-700 transition duration-150">
            Sign in
        </button>
    </form>
</div>