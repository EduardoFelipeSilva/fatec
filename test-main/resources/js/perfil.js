document.getElementById('profile-form').addEventListener('submit', function(e) {
    e.preventDefault();

    // Capturando os dados
    const formData = new FormData(this);
    const name = formData.get('name');
    const email = formData.get('email');

    // Atualizando o visual do header
    document.getElementById('display-name').textContent = name;
    document.getElementById('display-email').textContent = email;

    alert('Alterações salvas com sucesso!');
});

// Lógica para pré-visualizar a foto
document.getElementById('upload-photo').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(event) {
            document.getElementById('profile-img').setAttribute('src', event.target.result);
        }
        reader.readAsDataURL(file);
    }
});