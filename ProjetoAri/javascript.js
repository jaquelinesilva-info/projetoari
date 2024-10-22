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

/*  formulario de contato*/
function showTab(event, tabName) {
    // Esconder todos os conteúdos das abas
    const tabContents = document.querySelectorAll('.tab-content');
    tabContents.forEach((tab) => {
        tab.style.display = 'none';
    });

    // Remover a classe "active" de todas as abas
    const tabs = document.querySelectorAll('.tab');
    tabs.forEach((tab) => {
        tab.classList.remove('active');
    });

    // Mostrar o conteúdo da aba clicada
    document.getElementById(tabName).style.display = 'block';
    
    // Adicionar a classe "active" na aba clicada
    event.currentTarget.classList.add('active');
}

// Mostrar a aba de "Canais de Atendimento" por padrão quando a página é carregada
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('defaultTab').click();
});
