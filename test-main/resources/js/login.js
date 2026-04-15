
document.addEventListener('DOMContentLoaded', () => {
    const loginSection = document.getElementById('loginSection');
    const cadastroSection = document.getElementById('cadastroSection');
    const btnToggleCadastro = document.getElementById('btn-toggle-cadastro');
    const btnVoltar = document.getElementById('btn-voltar');
    const formTitulo = document.getElementById('form-titulo');
    const mensagemDiv = document.getElementById('mensagem');
    const loginForm = document.getElementById('loginForm');
    const cadastroForm = document.getElementById('cadastroForm');

    // Função para mostrar o formulário de cadastro
    btnToggleCadastro.addEventListener('click', () => {
        loginSection.classList.add('hidden');
        cadastroSection.classList.remove('hidden');
        formTitulo.textContent = 'Cadastro';
        mensagemDiv.textContent = '';
    });

    // Função para mostrar o formulário de login
    btnVoltar.addEventListener('click', () => {
        cadastroSection.classList.add('hidden');
        loginSection.classList.remove('hidden');
        formTitulo.textContent = 'Login / Cadastro';
        mensagemDiv.textContent = '';
    });

    // Lógica de simulação de login (substitua pelo seu PHP)
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const email = document.getElementById('emailLogin').value;
        const senha = document.getElementById('senhaLogin').value;

        // Simulação de validação
        if (email === "admin@teste.com" && senha === "123456") {
            mensagemDiv.textContent = "Login realizado com sucesso!";
            mensagemDiv.style.color = 'green';
        } else {
            mensagemDiv.textContent = "Usuário ou senha incorretos!";
            mensagemDiv.style.color = 'red';
        }
    });

    // Lógica de simulação de cadastro (substitua pelo seu PHP)
    cadastroForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const nome = document.getElementById('nomeCadastro').value;
        const cpf = document.getElementById('cpfCadastro').value;
        const dataNascimento = document.getElementById('dataNascimentoCadastro').value;
        const email = document.getElementById('emailCadastro').value;
        const senha = document.getElementById('senhaCadastro').value;
        const confirmaSenha = document.getElementById('confirmaSenhaCadastro').value;

        if (senha !== confirmaSenha) {
            mensagemDiv.textContent = "As senhas não coincidem!";
            mensagemDiv.style.color = 'red';
        } else {
            // Simulação de cadastro
            mensagemDiv.textContent = `Cadastro realizado com sucesso para ${nome}!`;
            mensagemDiv.style.color = 'green';
        }
    });
});