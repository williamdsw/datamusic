"use strict";

// Event Listeners

document.addEventListener('DOMContentLoaded', () => { 
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function (ev) { 
            ev.preventDefault();
            doLogin(this);
        });
    }
});

// Helper Functions

function doLogin(form) {
    const formData = new FormData(form);
    fetch('private/user-login.php', { method: 'POST', body: formData })
    .then(response => {
        if (response.ok) {
            response.json().then(json => {
                if (json && json.success === true && json.user) {
                    createUserSessionAndRedirect(json.user);
                }
                else {
                    showFailModal('Incorrect data!', 'User or password incorrect. Try again');
                }
            }).catch(() => showFailModal());
        }
        else {
            showFailModal();
        }
    }).catch(() => showFailModal());
}

function createUserSessionAndRedirect(userJson) {
    const formData = new FormData();
    formData.append('user', JSON.stringify (userJson));
    fetch('private/create-session.php', { method: 'POST', body: formData })
    .then(response => {
        if (response.ok) {
            response.text().then(text => {
                if (text && text === 'logged') {
                    location.href = 'home';
                }
                else {
                    showFailModal();
                }
            }).catch(() => showFailModal());
        }
        else {
            showFailModal();
        }
    }).catch(() => showFailModal());
}