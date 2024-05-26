document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('login-submit-button').addEventListener('click', function (event) {
        event.preventDefault();

        let emailInput = document.getElementById('login-email');
        let passwordInput = document.getElementById('password');
        let emailError = document.getElementById('email-error');
        let passwordError = document.getElementById('password-error');

        let emailValue = emailInput.value.trim();
        let passwordValue = passwordInput.value.trim();

        let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        let passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d).+$/;

        if (!emailRegex.test(emailValue)) {
            emailError.classList.remove('hidden');
            emailInput.focus();
            return;
        } else {
            emailError.classList.add('hidden');
        }

        if (passwordValue.length < 8 || !passwordRegex.test(passwordValue)) {
            passwordError.classList.remove('hidden');
            passwordInput.focus();
            return;
        } else {
            passwordError.classList.add('hidden');
        }

        event.target.form.submit();
    });

    document.getElementById('register-submit-button').addEventListener('click', function (event) {
        event.preventDefault();

        let firstNameInput = document.getElementById('firstname');
        let lastNameInput = document.getElementById('lastname');
        let emailInput = document.getElementById('register-email');
        let passwordInput = document.getElementById('register-password');
        let passwordConfirmInput = document.getElementById('password_confirmation');

        let firstNameError = document.getElementById('register-firstname-error');
        let lastNameError = document.getElementById('register-lastname-error');
        let emailError = document.getElementById('register-email-error');
        let passwordError = document.getElementById('register-password-error');
        let passwordConfirmError = document.getElementById('register-password-confirmation-error');

        let firstNameValue = firstNameInput.value.trim();
        let lastNameValue = lastNameInput.value.trim();
        let emailValue = emailInput.value.trim();
        let passwordValue = passwordInput.value.trim();
        let passwordConfirmValue = passwordConfirmInput.value.trim();

        let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        let passwordRegex = /^(?=.*[a-zA-Z])(?=.*\d).+$/;
        let nameRegex = /^[a-zA-Z]+$/;

        if (!nameRegex.test(firstNameValue)) {
            firstNameError.classList.remove('hidden');
            firstNameInput.focus();
            return;
        } else {
            firstNameError.classList.add('hidden');
        }

        if (!nameRegex.test(lastNameValue)) {
            lastNameError.classList.remove('hidden');
            lastNameInput.focus();
            return;
        } else {
            lastNameError.classList.add('hidden');
        }

        if (!emailRegex.test(emailValue)) {
            emailError.classList.remove('hidden');
            emailInput.focus();
            return;
        } else {
            emailError.classList.add('hidden');
        }

        if (passwordValue.length < 8 || !passwordRegex.test(passwordValue)) {
            passwordError.classList.remove('hidden');
            passwordInput.focus();
            return;
        } else {
            passwordError.classList.add('hidden');
        }

        if (passwordValue !== passwordConfirmValue) {
            passwordConfirmError.classList.remove('hidden');
            passwordConfirmInput.focus();
            return;
        } else {
            passwordConfirmError.classList.add('hidden');
        }

        event.target.form.submit();
    }
    );
});