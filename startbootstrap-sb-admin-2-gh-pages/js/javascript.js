/* Carrossel Genérico */
const carousel = document.querySelector('.carousel'); // Carrossel genérico
const prevBtn = document.querySelector('.prev-btn'); // Botão anterior genérico
const nextBtn = document.querySelector('.next-btn'); // Botão próximo genérico
const cardWidth = 300; // Largura do card genérico
const visibleCards = 2; // Número de cards visíveis no carrossel genérico

if (nextBtn && prevBtn && carousel) {
    nextBtn.addEventListener('click', () => {
        carousel.scrollBy({ left: cardWidth * visibleCards, behavior: 'smooth' });
    });

    prevBtn.addEventListener('click', () => {
        carousel.scrollBy({ left: -cardWidth * visibleCards, behavior: 'smooth' });
    });
}

/* Carrossel de Delegacias Especializadas 1 */
const carouselEspecializadas1 = document.querySelector('.especializadas-carousel-inner'); // Carrossel especializado 1
const prevBtnEspecializadas1 = document.querySelector('.especializadas-prev-btn-1'); // Botão anterior especializado 1
const nextBtnEspecializadas1 = document.querySelector('.delegacias-next-btn-1'); // Botão próximo especializado 1
const cardWidthEspecializadas1 = 300; // Largura de cada card no carrossel especializado 1
const visibleCardsEspecializadas1 = 2; // Número de cards visíveis no carrossel especializado 1

// Verifique se todos os elementos estão presentes no DOM
if (nextBtnEspecializadas1 && prevBtnEspecializadas1 && carouselEspecializadas1) {
    // Evento para o botão "next" (próximo) do carrossel 1
    nextBtnEspecializadas1.addEventListener('click', () => {
        const maxScrollLeft = carouselEspecializadas1.scrollWidth - carouselEspecializadas1.clientWidth;
        const scrollAmount = cardWidthEspecializadas1 * visibleCardsEspecializadas1;
        const currentScrollPosition = carouselEspecializadas1.scrollLeft;

        // Garante que não ultrapasse o máximo de rolagem
        if (currentScrollPosition + scrollAmount <= maxScrollLeft) {
            carouselEspecializadas1.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        } else {
            carouselEspecializadas1.scrollTo({ left: maxScrollLeft, behavior: 'smooth' });
        }
    });

    // Evento para o botão "prev" (anterior) do carrossel 1
    prevBtnEspecializadas1.addEventListener('click', () => {
        const scrollAmount = cardWidthEspecializadas1 * visibleCardsEspecializadas1;
        const currentScrollPosition = carouselEspecializadas1.scrollLeft;

        // Garante que não role mais que o mínimo
        if (currentScrollPosition - scrollAmount >= 0) {
            carouselEspecializadas1.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        } else {
            carouselEspecializadas1.scrollTo({ left: 0, behavior: 'smooth' });
        }
    });
}
/* Carrossel de Delegacias Especializadas 2 */
const carouselEspecializadas2 = document.querySelector('.especializadas-carousel-inner-2'); // Carrossel especializado 2
const prevBtnEspecializadas2 = document.querySelector('.especializadas-prev-btn-2'); // Botão anterior especializado 2
const nextBtnEspecializadas2 = document.querySelector('.delegacias-next-btn-2'); // Botão próximo especializado 2
const cardWidthEspecializadas2 = 300; // Largura de cada card no carrossel especializado 2
const visibleCardsEspecializadas2 = 2; // Número de cards visíveis no carrossel especializado 2

// Verifique se todos os elementos estão presentes no DOM
if (nextBtnEspecializadas2 && prevBtnEspecializadas2 && carouselEspecializadas2) {
    // Evento para o botão "next" (próximo) do carrossel 2
    nextBtnEspecializadas2.addEventListener('click', () => {
        const maxScrollLeft = carouselEspecializadas2.scrollWidth - carouselEspecializadas2.clientWidth;
        const scrollAmount = cardWidthEspecializadas2 * visibleCardsEspecializadas2;
        const currentScrollPosition = carouselEspecializadas2.scrollLeft;

        // Garante que não ultrapasse o máximo de rolagem
        if (currentScrollPosition + scrollAmount <= maxScrollLeft) {
            carouselEspecializadas2.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        } else {
            carouselEspecializadas2.scrollTo({ left: maxScrollLeft, behavior: 'smooth' });
        }
    });

    // Evento para o botão "prev" (anterior) do carrossel 2
    prevBtnEspecializadas2.addEventListener('click', () => {
        const scrollAmount = cardWidthEspecializadas2 * visibleCardsEspecializadas2;
        const currentScrollPosition = carouselEspecializadas2.scrollLeft;

        // Garante que não role mais que o mínimo
        if (currentScrollPosition - scrollAmount >= 0) {
            carouselEspecializadas2.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        } else {
            carouselEspecializadas2.scrollTo({ left: 0, behavior: 'smooth' });
        }
    });
}


//cards:
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.card');
    const modal = document.getElementById('modal');
    const modalTitle = document.getElementById('modal-title');
    const modalText = document.getElementById('modal-text');
    const closeModal = document.getElementById('close-modal');

    // Dados adicionais para os cards
    const cardDetails = {
        0: {
            title: 'A Fundação da Polícia Civil',
            text: 'A Polícia Civil do RN foi fundada em 1836 para manter a ordem e proteger os cidadãos. Desde então, tem desempenhado um papel crucial na manutenção da segurança pública e da justiça no estado.'
        },
        1: {
            title: 'Primeiras Grandes Operações',
            text: 'Nas décadas de 1920 e 1930, a Polícia Civil realizou grandes operações para combater o crime organizado. Essas ações marcaram o início de sua reputação como uma força essencial para a justiça no estado.'
        },
        2: {
            title: 'Modernização da Polícia Civil',
            text: 'Nos anos 2000, a instituição passou por grandes avanços tecnológicos. Delegacias especializadas e sistemas digitais de monitoramento ajudaram a transformar a Polícia Civil em uma força moderna e eficiente.'
        }
    };

    // Adiciona eventos de clique nos cards
    cards.forEach((card, index) => {
        card.addEventListener('click', () => {
            const { title, text } = cardDetails[index];
            modalTitle.innerText = title;
            modalText.innerText = text;
            modal.style.display = 'flex';
        });
    });

    // Fecha o modal ao clicar no "X"
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Fecha o modal ao clicar fora do conteúdo
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });
});

