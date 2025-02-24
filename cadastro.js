/*função de envio do formulário no seu código JavaScript*/
const form = document.getElementById('cadastro-form');

form.addEventListener('submit', (event) => {
    event.preventDefault(); // Impede o comportamento padrão do formulário

    console.log("Formulário submetido!"); // Mensagem no console

    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;
    const data_nascimento = document.getElementById('data_nascimento_formato_db').value;
    const sexo = document.getElementById('sexo').value;
    const telefone = document.getElementById('telefone').value;
    const cep = document.getElementById('cep').value;
    const endereco = document.getElementById('endereco').value;
    const numero = document.getElementById('numero').value;
    const bairro = document.getElementById('bairro').value;
    const login = document.getElementById('login').value;

    if (nome === '' || email === '' || senha === '') {
        alert('Por favor, preencha todos os campos.');
    } else {
        // Cria um objeto com os dados do formulário
        const data = {
            nome: nome,
            email: email,
            senha: senha,
            data_nascimento: data_nascimento,
            sexo: sexo,
            telefone: telefone,
            cep: cep,
            endereco: endereco,
            numero: numero,
            bairro: bairro,
            login: login
        };

        // Envia os dados para o servidor usando AJAX
        $.ajax({
            type: 'POST',
            url: 'cadastro.php',
            data: data,
            success: function(response) {
                console.log("Resposta do servidor:", response);
                alert("Cadastro realizado com sucesso!");
                // Redireciona para a página de login
                window.location.href = "login.html";
            },
            error: function(error) {
                console.error("Erro ao cadastrar:", error);
                alert("Ocorreu um erro ao cadastrar. Tente novamente mais tarde.");
            }
        });
    }
});

/* Valida cep   */
$(document).ready(function() {
    $('#cep').blur(function() {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep.length === 8) {
            $.ajax({
                url: 'https://viacep.com.br/ws/' + cep + '/json/',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (!data.erro) {
                        $('#endereco').val(data.logradouro);
                        $('#bairro').val(data.bairro);
                    } else {
                        alert('CEP não encontrado.');
                    }
                }
            });
        }
    });
});


