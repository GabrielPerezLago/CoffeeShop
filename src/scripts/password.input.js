const icon = document.getElementById('pass_icon');
const password_input = document.getElementById('pass_input');

icon.addEventListener('click', () => {
    const isPassword = password_input.type === 'password';

    if (isPassword) {
        password_input.type = 'text';
        icon.src = '../public/assets/icons/eye_cross_icon.svg';
    } else {
        password_input.type = 'password';
        icon.src = '../public/assets/icons/eye_icon.svg';
    }
});