let elems = document.getElementsByClassName('btn-danger');
let confirmIt = function (e) {
    if (!confirm('Naozaj chcete danú rezerváciu vymazať?')) e.preventDefault();
};
for (let i = 0, l = elems.length; i < l; i++) {
    elems[i].addEventListener('click', confirmIt, false);
}
