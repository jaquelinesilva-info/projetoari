// Alternar retração da sidebar
document.querySelector('.toggle-btn').addEventListener('click', function () {
    document.querySelector('.sidebar').classList.toggle('retraida');
    document.querySelector('.main-content').classList.toggle('retraida');
});

// Alternar contraste
let currentContrast = 0;
const contrastButton = document.getElementById('toggle-contrast');

contrastButton.addEventListener('click', () => {
    currentContrast = (currentContrast + 1) % 3; // Alterna entre 3 modos de contraste
    document.body.className = ''; // Reseta as classes do body

    if (currentContrast === 1) {
        document.body.classList.add('high-contrast'); // Ativa alto contraste
    } else if (currentContrast === 2) {
        document.body.classList.add('inverted-contrast'); // Ativa contraste invertido
    }
});
