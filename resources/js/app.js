import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const deleteButtons = document.querySelectorAll('.form_delete_project button[type="submit"]');

deleteButtons.forEach(button => {
    button.addEventListener('click', event => {
        event.preventDefault();

        const userResponse = confirm("Sei sicuro di voler eliminare l'elemento?");

        if (userResponse) {
            button.parentElement.submit();
        }

    })
});



const btnDelete = document.getElementById('btn-delete');

btnDelete.addEventListener('click', function () {
    const formDelete = document.getElementById('form-delete');
    formDelete.submit();
});


