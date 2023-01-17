let elems = document.getElementsByClassName('btn-primary');
let confirmIt = function (e) {
    let anyerrors = false;
    let showErrors = '<div class="alert alert-danger"><ul>\n';
    let email = document.getElementsByName('email')[0].value;
    let predmet = document.getElementsByName('predmet')[0].value;
    let obsah = document.getElementsByName('obsah')[0].value;

    if (email === '') {
        anyerrors = true;
        showErrors += '<li>' + 'Pole "Meno" nesmie byt prázdne!' + '</li>';
    } else if (!/^[a-zA-Z]+$/.test(meno)) {
        anyerrors = true;
        showErrors += '<li>' + 'Pole "Meno" obsahuje nepovolené znaky!' + '</li>';
    }

    if (predmet === '') {
        anyerrors = true;
        showErrors += '<li>' + 'Pole "Priezvisko" nesmie byt prázdne!' + '</li>';
    } else if (!/^[a-zA-Z]+$/.test(priezvisko)) {
        anyerrors = true;
        showErrors += '<li>' + 'Pole "Priezvisko" obsahuje nepovolené znaky!' + '</li>';
    }
    if (obsah === '') {
        anyerrors = true;
        showErrors += '<li>' + 'Pole "Rezervácia do" nesmie byť prázdne!' + '</li>';
    }
    if (anyerrors) {
        showErrors += '</div><br/>';
        document.getElementById('jscheck').innerHTML = showErrors;
        e.preventDefault();
    }
};
for (let i = 0, l = elems.length; i < l; i++) {
    elems[i].addEventListener('click', confirmIt, false);
}
