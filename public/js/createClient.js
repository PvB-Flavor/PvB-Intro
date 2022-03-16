const firstname = document.querySelector('#fname');
const surname = document.querySelector('#lname');
const birthDate = document.querySelector('#bdate');
const language = document.querySelector('#languages');
const panicButtons = document.querySelector('#panicbuttons');
const color = document.querySelector('#color');
const submit = document.querySelector('#submit');

async function addPerson() {
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
    });
}

window.addEventListener('load', () => {
   submit.addEventListener('click', () => addPerson().then()) ;
});