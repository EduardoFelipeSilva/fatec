
// Obtém o nome do arquivo atual da URL (ex: index.php)
const activePage = window.location.pathname.split("/").pop();

// Seleciona todos os links dentro da sidebar
const navLinks = document.querySelectorAll('.sidebar a');

navLinks.forEach(link => {
    // Remove a classe active de todos primeiro (para limpar o padrão)
    link.classList.remove('active');

    // Se o href do link for igual à página atual, adiciona a classe active
    if (link.getAttribute('href') === activePage) {
        link.classList.add('active');
    }
});

// Caso especial para a Home se a URL estiver vazia ou terminar em "/"
if (activePage === "" || activePage === "index.php") {
    document.querySelector('a[href="index.php"]').classList.add('active');
}
