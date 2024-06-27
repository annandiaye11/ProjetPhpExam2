document.addEventListener('DOMContentLoaded', toggle);

function toggle() {
    const dropdownToggle = document.querySelector('[data-dropdown-toggle]');
    const dropdownMenu = document.getElementById(dropdownToggle.getAttribute('data-dropdown-toggle'));

    dropdownToggle.addEventListener('click', function () {
        dropdownMenu.classList.toggle('hidden');
    });
}