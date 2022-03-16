const firstname = document.querySelector('#fname');
const surname = document.querySelector('#lname');
const birthDate = document.querySelector('#bdate');
const language = document.querySelector('#languages');
const panicButtons = document.querySelector('#panicbuttons');
const color = document.querySelector('#color');
const submit = document.querySelector('#add');

async function addPerson(e) {
    e.preventDefault();

    let lang;
    let pButtons = [];

    language.querySelectorAll('input').forEach(element => {
        if (element.checked) lang = element.id;
    });

    panicButtons.querySelectorAll('input').forEach(element => {
        if (element.checked) pButtons.push(element.id);
    });

    const data = {
        name: firstname.value,
        surname: surname.value,
        birthdate: birthDate.value,
        language: lang,
        panicButtons: pButtons,
        color: color.value
    };

    await fetch(saveEndpoint, {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        Swal.fire({
            title: 'Persoon toegevoegd.',
            icon: 'success',
            showConfirmButton: false
        });

        setTimeout(function() {
            window.location.reload();
        }, 2000)
    })
    .catch(error => {
        Swal.fire({
            title: 'Error',
            text: 'Oeps! Er is iets mis gegaan bij het opslaan. Weet u zeker dat u alle velden correct heeft ingevuld?',
            icon: 'error',
            confirmButtonText: 'Sluit',
            confirmButtonColor: '#2c58d5',
            customClass: {
                confirmButton: 'closeConfirm',
            }
        });
    });
}

window.addEventListener('load', () => {
   submit.addEventListener('click', (e) => addPerson(e).then()) ;
});