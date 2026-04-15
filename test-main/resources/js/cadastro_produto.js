// Exemplo de script para validação simples antes de enviar o formulário
const form = document.querySelector('.form-container');

form.addEventListener('submit', function(event) {
    const nome = document.getElementById('nome').value;
    const preco = document.getElementById('preco').value;
    const custo = document.getElementById('custo').value;

    if (nome.trim() === '' || preco.trim() === '' || custo.trim() === '') {
        alert('Por favor, preencha os campos obrigatórios (Nome, Preço, Custo).');
        event.preventDefault(); // Impede o envio do formulário
    }

    // Você pode adicionar validações mais complexas aqui
    // Ex: checar se o preço é um número positivo, etc.
});

// Exemplo de como você poderia preencher os dropdowns dinamicamente
// fetch('api/categorias.php')
//    .then(response => response.json())
//    .then(data => {
//        const categoriaSelect = document.getElementById('categoria');
//        data.forEach(categoria => {
//            const option = document.createElement('option');
//            option.value = categoria.id;
//            option.textContent = categoria.nome;
//            categoriaSelect.appendChild(option);
//        });
//    });