document.addEventListener('DOMContentLoaded', () => {
    const trigger = document.getElementById('trigger-profile');
    const main = document.getElementById('main-contai');

    const profileContainer = document.getElementById('profile-container');
    const settingsItem = document.getElementById('settings-item');
    const settingsModal = document.getElementById('settings-modal');
    const closeSettingsBtn = document.getElementById('close-settings');

    // Funcionalidade para o menu de notificação (do exemplo anterior)
    const notificationToggle = document.getElementById('notification-toggle');
    const notificationOptions = document.getElementById('notification-options');
    const themeToggleBtn = document.getElementById('theme-toggle-btn');
    const themeValue = document.getElementById('theme-value');
    const fontToggleBtn = document.getElementById('font-toggle-btn');
    const fontSizeValue = document.getElementById('font-size-value');

    // if (!trigger || !main) {
    //     console.error("Erro: IDs não encontrados no HTML!");
    //     return;
    // }

    trigger.addEventListener('click', function(e) {
        // Log para testar no F12 do navegador
        console.log("Marival clicado!");

        // Evita fechar se clicar dentro do menu branco
        if (e.target.closest('#main-contai')) {
            return;
        }

        // Liga/Desliga a classe 'show'
        main.classList.toggle('show');
    });

    // Fecha se clicar fora do Marival
    document.addEventListener('click', function(e) {
        if (!trigger.contains(e.target)) {
            main.classList.remove('show');
        }
    });

        // Lida com o clique no item "Configurações"
    settingsItem.addEventListener('click', () => {
        // Oculta a tela de perfil
        // profileContainer.classList.add('hidden');
        console.log("Campo clicado!");
        
        // Exibe a tela de configurações após um pequeno atraso
        setTimeout(() => {
            settingsModal.classList.add('show');
        }, 500); // O atraso deve corresponder à duração da transição CSS
    });

    // Lida com o clique no botão de fechar da tela de configurações
    closeSettingsBtn.addEventListener('click', () => {
        // Oculta a tela de configurações
        settingsModal.classList.remove('show');
        
        // Exibe a tela de perfil após um pequeno atraso
        setTimeout(() => {
            profileContainer.classList.remove('hidden');
        }, 500); // O atraso deve corresponder à duração da transição CSS
    });
    
    // Funcionalidade do menu de notificação (código do exemplo anterior)
    notificationToggle.addEventListener('click', (event) => {
        event.stopPropagation();
        const isVisible = notificationOptions.classList.toggle('drop-up');

        if (isVisible) {
            document.addEventListener('click', closeMenu);
        } else {
            document.removeEventListener('click', closeMenu);
        }
    });

    function closeMenu(event) {
        if (!notificationOptions.contains(event.target) && !notificationToggle.contains(event.target)) {
            notificationOptions.classList.remove('drop-up');
            document.removeEventListener('click', closeMenu);
        }
    }

    const options = notificationOptions.querySelectorAll('.option');
    options.forEach(option => {
        option.addEventListener('click', (event) => {
            event.stopPropagation();
            const statusText = option.textContent;
            document.querySelector('.notification-status').textContent = statusText;
            notificationOptions.classList.remove('drop-up');
        });
    });

    function applyTheme(theme) {
        const isDark = theme === 'dark';
        document.documentElement.classList.toggle('dark-theme', isDark);
        if (themeValue) {
            themeValue.textContent = isDark ? 'Escuro' : 'Claro';
        }
        if (themeToggleBtn) {
            themeToggleBtn.textContent = isDark ? 'Usar Claro' : 'Usar Escuro';
        }
        localStorage.setItem('appTheme', isDark ? 'dark' : 'light');
    }

    function applyFontSize(size) {
        const isLarge = size === 'large';
        document.documentElement.classList.toggle('large-font', isLarge);
        if (fontSizeValue) {
            fontSizeValue.textContent = isLarge ? 'Grande' : 'Normal';
        }
        if (fontToggleBtn) {
            fontToggleBtn.textContent = isLarge ? 'Fonte Normal' : 'Aumentar Fonte';
        }
        localStorage.setItem('appFontSize', isLarge ? 'large' : 'normal');
    }

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', () => {
            const currentTheme = document.documentElement.classList.contains('dark-theme') ? 'dark' : 'light';
            applyTheme(currentTheme === 'dark' ? 'light' : 'dark');
        });
    }

    if (fontToggleBtn) {
        fontToggleBtn.addEventListener('click', () => {
            const currentSize = document.documentElement.classList.contains('large-font') ? 'large' : 'normal';
            applyFontSize(currentSize === 'large' ? 'normal' : 'large');
        });
    }

    const savedTheme = localStorage.getItem('appTheme') || 'light';
    applyTheme(savedTheme);
    const savedFontSize = localStorage.getItem('appFontSize') || 'normal';
    applyFontSize(savedFontSize);



});