const clientList = document.querySelector('.client-list');
const clientSearchInput = document.querySelector('.search').querySelector('input');

function updateList() {
    let input, filter, ul, li, i, txtValue;

    input = clientSearchInput;
    filter = input.value.toUpperCase();
    ul = clientList;
    li = ul.getElementsByTagName("li");

    for (i = 0; i < li.length; i++) {
        txtValue = li[i].querySelector('.client-info-firstname').innerHTML;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

clientSearchInput.addEventListener('keyup', updateList);