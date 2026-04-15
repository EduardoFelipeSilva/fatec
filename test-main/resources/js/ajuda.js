// Exemplo de interatividade simples com JS
document.querySelectorAll('.help-card').forEach((card, index) => {
    card.addEventListener('click', () => {
        console.log(`Você clicou no passo ${index + 1}`);
    });
});
