const hamburgerBtn = document.getElementById('hamburger-btn');
const sideNav = document.getElementById('side-nav');
const closeBtn = document.getElementById('close-btn');

hamburgerBtn.addEventListener('click', () => {
    sideNav.classList.toggle('open');
});

closeBtn.addEventListener('click', () => {
    sideNav.classList.remove('open');
});

function toggleDropdown() {
    const dropdown = document.getElementById('dropdownMenu');
    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
}