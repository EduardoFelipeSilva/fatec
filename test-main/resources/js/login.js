
document.addEventListener('DOMContentLoaded', () => {
    const loginSection = document.getElementById('loginSection');
    const cadastroSection = document.getElementById('cadastroSection');
    const btnToggleCadastro = document.getElementById('btn-toggle-cadastro');
    const btnVoltar = document.getElementById('btn-voltar');
    const formTitulo = document.getElementById('form-titulo');
    const mensagemDiv = document.getElementById('mensagem');
    const loginForm = document.getElementById('loginForm');
    const cadastroForm = document.getElementById('cadastroForm');

    btnToggleCadastro.addEventListener('click', () => {
        loginSection.classList.add('hidden');
        cadastroSection.classList.remove('hidden');
        formTitulo.textContent = 'Cadastro';
        mensagemDiv.textContent = '';
    });

    btnVoltar.addEventListener('click', () => {
        cadastroSection.classList.add('hidden');
        loginSection.classList.remove('hidden');
        formTitulo.textContent = 'Login / Cadastro';
        mensagemDiv.textContent = '';
    });


    loginForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const email = document.getElementById('emailLogin').value;
    const senha = document.getElementById('senhaLogin').value;

    try {
        const resposta = await fetch('../controller/controllerUsuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                acao: 'Login',
                email: email,
                senha: senha
            })
        });

        const resultado = await resposta.text();

        if (resultado.includes("sucesso")) {
            window.location.href = "index.php";
        } else {
            mensagemDiv.innerHTML = resultado;
            mensagemDiv.style.color = 'red';
        }

    } catch (erro) {
        mensagemDiv.textContent = "Erro ao tentar fazer login!";
        mensagemDiv.style.color = 'red';
        console.error(erro);
    }
});

cadastroForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const nome = document.getElementById('nome').value;
    const cpf = document.getElementById('cpf').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const telefone = document.getElementById('telefone').value;
    const endereco = document.getElementById('endereco').value;
    const cargo = document.getElementById('cargo').value;
    const foto = document.getElementById('foto').value;


    try {

        const resposta = await fetch('../controller/controllerUsuario.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                acao: 'Salvar',
                nome: nome,
                cpf: cpf,
                email: email,
                senha: senha,
                telefone: telefone,
                endereco: endereco,
                cargo: cargo,
                foto: foto,
            })
        });

        const resultado = await resposta.text();

if (resultado.includes("sucesso")) {

    mensagemDiv.innerHTML = "Cadastro realizado com sucesso! <br> Aguarde Liberação do Administrador.";
    mensagemDiv.style.color = 'green';
    cadastroSection.classList.add('hidden');
    loginSection.classList.remove('hidden');
    formTitulo.textContent = 'Login / Cadastro';
    cadastroForm.reset();

} else {

    mensagemDiv.innerHTML = resultado;
    mensagemDiv.style.color = 'red';

}

    } catch (erro) {
        mensagemDiv.textContent = "Erro ao cadastrar!";
        mensagemDiv.style.color = 'red';

        console.error(erro);
    }

    const resultado = await resposta.text();

});

});