// Simulando dados de notícias relacionadas ao PCRN
const noticias = [
    {
        titulo: "Polícia Civil do RN desmantela quadrilha de tráfico internacional",
        descricao: "Operação resultou na apreensão de drogas e armas de fogo, com prisões em várias cidades.",
    },
    {
        titulo: "Polícia Civil investiga série de roubos a caixas eletrônicos em Natal",
        descricao: "Suspeitos estão sendo monitorados, e diligências estão em andamento para prender os criminosos.",
    },
    {
        titulo: "PCRN intensifica combate a crimes cibernéticos no estado",
        descricao: "Ações estão sendo realizadas para identificar e prender hackers envolvidos em fraudes digitais.",
    },
    {
        titulo: "Operação da Polícia Civil prende suspeitos de fraude em licitações públicas",
        descricao: "Grupo criminoso é investigado por envolvimento em fraudes em licitações do governo estadual.",
    }
];

// Função para renderizar as notícias em duas colunas
function renderNoticias() {
    const newsListLeft = document.getElementById('news-list-left');
    const newsListRight = document.getElementById('news-list-right');

    // Limpar o conteúdo das listas
    newsListLeft.innerHTML = '';
    newsListRight.innerHTML = '';

    noticias.forEach((noticia, index) => {
        const newsItem = document.createElement('div');
        newsItem.classList.add('card', 'mb-4');
        newsItem.innerHTML = `
            <div class="card-body">
                <h2 class="card-title">${noticia.titulo}</h2>
                <p class="card-text">${noticia.descricao}</p>
            </div>
        `;

        // Distribuir em colunas diferentes
        if (index < 2) {
            newsListLeft.appendChild(newsItem);
        } else {
            newsListRight.appendChild(newsItem);
        }
    });
}

// Inicializar renderização
renderNoticias();

// Seleciona o elemento da manchete principal
const mainHeadlineElement = document.getElementById('main-headline');

// Dados simulados de manchete principal
const manchetePrincipal = {
    titulo: "Polícia Civil do RN realiza megaoperação contra o tráfico de armas",
    descricao: "Mais de 50 policiais participaram da operação, resultando em apreensões e prisões.",
    link: "#"
};

// Função para exibir a manchete do dia
function exibirManchete() {
    if (mainHeadlineElement) {
        mainHeadlineElement.innerHTML = `
            <h2>${manchetePrincipal.titulo}</h2>
            <p>${manchetePrincipal.descricao} <a href="${manchetePrincipal.link}">Leia mais</a></p>
        `;
    }
}

document.addEventListener('DOMContentLoaded', exibirManchete);
