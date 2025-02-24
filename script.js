// Verifica se o usuário está logado
/*if (!localStorage.getItem('usuario_logado')) {
    // Redireciona para a página de login
    window.location.href = 'login.html';
}*/

const form = document.querySelector('form');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    if (nome === '' || email === '' || senha === '') {
        alert('Por favor, preencha todos os campos.');
    } else {
        form.submit();
    }
});

