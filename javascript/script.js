function display_tables(){
    const links = document.querySelectorAll('a[js="links_adm"]');
    const tables = document.querySelectorAll('.table_sql');

    links.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault(); 
            
            const tableId = link.getAttribute('data-table');
            const tableToShow = document.getElementById(tableId);

            // Verifica se o link já está ativo 
            if (link.classList.contains('activelink')) {
                tableToShow.classList.remove('active');
                link.classList.remove('activelink');
            } else {
                // Esconde todas as tabelas e remove a classe 'activelink' de todos os links
                links.forEach(link => link.classList.remove('activelink'));
                tables.forEach(table => table.classList.remove('active'));

                // Mostra apenas a tabela correspondente e destaca o link
                tableToShow.classList.add('active');
                link.classList.add('activelink');
            }
        });
    });
}

function carrossel(){
    const imagens = document.querySelectorAll('.imagens');
    const esquerda = document.querySelector('#esquerda');
    const direita = document.querySelector('#direita');
    const atual = document.querySelector('#atual');
    var imgI=0;

    atual.src = imagens[0].src; 

    function prox(){
        imgI++;
        if(imgI>imagens.length-1)
            imgI=0;
        
        atual.src = imagens[imgI].src;   
    } 

    function antes(){
        imgI--;
        if(imgI<0)
            imgI=imagens.length-1;

        atual.src = imagens[imgI].src;     

    }

    esquerda.addEventListener('click', antes);
    direita.addEventListener('click', prox);

    const automatico = setInterval(prox,3500);
}

function sistema_login(){
    const form_login = document.querySelector('#login_form');
    const form_create = document.querySelector('#criar_form');
    const goRegister = document.querySelector('#GoToRegister');
    const goLogin = document.querySelector('#GoToLogin');
    
    goLogin.addEventListener('click',()=>{

        form_create.classList.remove('show_criar');
        form_create.classList.add('hide_criar');

        setTimeout(function() {
        form_create.classList.add('displaynone');
        form_create.classList.remove('hide_criar');
        form_login.classList.remove('displaynone');
        form_login.classList.add('show_login');
        }, 450); // 600ms para coincidir com a duração da animação
    });
    
    goRegister.addEventListener('click',()=>{
        
        form_login.classList.remove('show_login');
        form_login.classList.add('hide_login');

        setTimeout(function() {
            form_login.classList.add('displaynone');
            form_login.classList.remove('hide_login');
            form_create.classList.remove('displaynone');
            form_create.classList.add('show_criar');
        }, 450); 

    });

    var body = document.body;
    const btn_abrir = document.querySelector('#login_btn');
    const btn_sair = document.querySelector('#logout_btn'); // AINDA PRA FAZER!!!!!!!!!!!!!!!
    const fechar = document.querySelector('#fechar');
    const formulario = document.querySelector('#main_container');
    let ativo = false;

    function fechar_form(event) {
        if (ativo && event.target !== formulario && !formulario.contains(event.target) && event.target !== btn_abrir) {
            formulario.style.display = 'none';
            ativo = false;
            body.removeEventListener('click', fechar_form);
        }
    }

    btn_abrir.addEventListener('click', (event) => {
        event.stopPropagation(); // Impede a propagação do evento de clique para o body
        ativo = true;

        formulario.style.display = 'flex';
        body.addEventListener('click', fechar_form);
    });

    fechar.addEventListener('click', () => {
        formulario.style.display = 'none';
        ativo = false;
    });



}

function dropdown() {
    const userOptions = document.querySelector('#userOptions');
    const dropdownToggle = userOptions.querySelector('.dropdown-toggle');
    const dropdownMenu = userOptions.querySelector('.dropdown-menu');

    dropdownToggle.addEventListener('click', function() {
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    });

    window.addEventListener('click', function(event) {
        if (!userOptions.contains(event.target)) {
            dropdownMenu.style.display = 'none';
        }
    });
}

document.addEventListener('DOMContentLoaded', dropdown);

function autoResizeTextarea(textarea) {
    textarea.style.height = 'auto'; // Redefine a altura
    textarea.style.height = textarea.scrollHeight + 'px'; // Define a nova altura
}

document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('sinopse');
    
    autoResizeTextarea(textarea);
    
    // Redimensiona automaticamente ao digitar
    textarea.addEventListener('input', function() {
        autoResizeTextarea(textarea);
    });
});


function configurarModalMidias() {
    const midias = document.querySelectorAll('.midia');

    midias.forEach(midia => {
        midia.addEventListener('click', (event) => {
            const id = midia.getAttribute('data-id');
            const titulo = midia.getAttribute('data-titulo');
            const sinopse = midia.getAttribute('data-sinopse');
            const imagem = midia.getAttribute('data-imagem');
            const temporada = midia.getAttribute('data-temporada');

            // Atualizando o conteúdo do modal com os dados da mídia clicada
            const modal = document.getElementById('modal');
            modal.querySelector('#id_midia_input').value = id;
            modal.querySelector('.imagem img').src = imagem;
            modal.querySelector('.titulo').textContent = titulo;
            modal.querySelector('.sinopse').textContent = sinopse;
            modal.querySelector('h3').textContent = temporada;

            // Exibindo o modal
            modal.style.display = 'block';
            event.stopPropagation();
        });
    });

    // Fechando o modal ao clicar no botão de fechar
    const fecharModal = document.getElementById('fechar_midia');
    fecharModal.addEventListener('click', () => {
        const modal = document.getElementById('modal');
        modal.style.display = 'none';
    });

    // Fechando o modal ao clicar fora dele

    window.addEventListener('click',(event)=>{
            if (modal.style.display === 'block' && event.target !== modal && !modal.contains(event.target)) {
                modal.style.display = 'none';
            }
    });

    // Fechando o modal ao pressionar a tecla Esc
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            const modal = document.getElementById('modal');
            modal.style.display = 'none';
        }
    });
}

// Chamando a função para configurar o modal ao carregar a página
document.addEventListener('DOMContentLoaded', () => {
    configurarModalMidias();
});

display_tables();
carrossel();
sistema_login();