document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formCadastro');
    const mensagemStatus = document.getElementById('mensagem-status');

    // Elementos dos campos
    const campos = {
        nome: document.getElementById('nome'),
        email: document.getElementById('email'),
        senha: document.getElementById('senha'),
        confirmarSen: document.getElementById('confirmarSen')
    };

    // Elementos de erro
    const erros = {
        nome: document.getElementById('nome-erro'),
        email: document.getElementById('email-erro'),
        senha: document.getElementById('senha-erro'),
        confirmarSen: document.getElementById('confirmarSen-erro')
    };

    // Validação em tempo real
    Object.keys(campos).forEach(key => {
        campos[key].addEventListener('input', function() {
            validarCampo(key);
            if (key === 'senha' || key === 'confirmarSen') {
                validarSenhas();
            }
        });
    });

    // Validação no submit
    form.addEventListener('submit', function(e) {
        let formValido = true;
        
        // Valida todos os campos
        Object.keys(campos).forEach(key => {
            if (!validarCampo(key)) {
                formValido = false;
            }
        });
        
        // Validação especial para senhas
        if (!validarSenhas()) {
            formValido = false;
        }
        
        if (!formValido) {
            e.preventDefault();
            mostrarMensagem('Por favor, corrija os erros no formulário', 'erro');
        } else {
            // Se o formulário for válido, faz o submit via AJAX
            e.preventDefault();
            enviarFormulario();
        }
    });

    function validarCampo(campo) {
        const valor = campos[campo].value.trim();
        let valido = true;
        erros[campo].textContent = '';
        
        if (!valor) {
            erros[campo].textContent = `O campo ${campo} é obrigatório`;
            valido = false;
        } else if (campo === 'email' && !validarEmail(valor)) {
            erros[campo].textContent = 'Email inválido';
            valido = false;
        }
        
        return valido;
    }

    function validarSenhas() {
        const senha = campos.senha.value;
        const confirmarSen = campos.confirmarSen.value;
        let valido = true;
        
        erros.senha.textContent = '';
        erros.confirmarSen.textContent = '';
        
        if (!senha) {
            erros.senha.textContent = 'A senha é obrigatória';
            valido = false;
        }
        
        if (!confirmarSen) {
            erros.confirmarSen.textContent = 'Confirme sua senha';
            valido = false;
        }
        
        if (senha && confirmarSen && senha !== confirmarSen) {
            erros.confirmarSen.textContent = 'As senhas não coincidem';
            valido = false;
        }
        
        return valido;
    }

    function validarEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function mostrarMensagem(texto, tipo) {
        mensagemStatus.textContent = texto;
        mensagemStatus.className = `mensagem-${tipo}`;
        mensagemStatus.style.display = 'block';
        
        // Rolar para o topo para ver a mensagem
        window.scrollTo(0, 0);
    }

    function enviarFormulario() {
        const formData = new FormData(form);
        
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'sucesso') {
                mostrarMensagem(data.mensagem, 'sucesso');
                setTimeout(() => {
                    window.location.href = data.redirect;
                }, 2000);
            } else {
                mostrarMensagem(data.mensagem, 'erro');
            }
        })
        .catch(error => {
            mostrarMensagem('Erro ao processar a requisição', 'erro');
            console.error('Error:', error);
        });
    }

});