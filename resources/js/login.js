document.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('email').value.length > 4)
        document.getElementById('password').removeAttribute('disabled');
    else
        document.getElementById('password').setAttribute('disabled', '');
})
// Setting up eye icons
for (let icon of document.getElementsByClassName('show-hide')) {
    icon.addEventListener('click', () => {
        if (icon.classList.contains('fa-eye')) {
            // Showing input content
            icon.previousElementSibling.type = 'text';
            icon.setAttribute('data-title', 'Ocultar')
            icon.classList.add('fa-eye-slash');
            icon.classList.remove('fa-eye');
        } else {
            // Hiding input content
            icon.previousElementSibling.type = 'password';
            icon.setAttribute('data-title', 'Mostrar')
            icon.classList.add('fa-eye');
            icon.classList.remove('fa-eye-slash');
        }
    })
}

for (let input of document.getElementsByClassName('inputs-icon')) {

    // Setting up interactivity and validation
    input.addEventListener('input', () => {

        if (!input.value) {
            document.getElementById('send_btn').setAttribute('disabled', true);
            if (input.id === 'email') {
                document.getElementById('password').setAttribute('disabled', '');
            } else {
                input.nextElementSibling.classList.add('pe-none');
            }
        } else {
            if (input.id === 'email') {
                if (input.value.length > 4) {
                    document.getElementById('password').removeAttribute('disabled');
                    document.getElementById('send_btn').removeAttribute('disabled');
                } else {
                    document.getElementById('password').setAttribute('disabled', '');
                    document.getElementById('send_btn').setAttribute('disabled', '');
                }
            } else {
                // Enabling eye icon mouse events
                input.nextElementSibling.classList.remove('pe-none');
                document.getElementById('send_btn').removeAttribute('disabled');
            }
        }
    });
}

