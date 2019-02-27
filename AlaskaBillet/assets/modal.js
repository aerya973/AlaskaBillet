// MODAL DELETE BUTTON
var span = document.getElementsByClassName('close');
var btn = document.getElementsByClassName('deleteBtn');
var modal = document.getElementById('myModal');
var alertMsg = document.getElementById('alert');
var spanAlert = document.getElementsByClassName('closeAlert');


for (var i = 0; i < btn.length; i++) {
  var thisBtn = btn[i];

      thisBtn.addEventListener('click', (event) => {
        modal.style.display = 'block';
        var modalId = event.target.dataset.id;
        document.getElementById('id').value = modalId;
    }, false);
}

for (var j = 0; j < span.length; j++) {
  var closeThis = span[j];
  closeThis.addEventListener('click', (event) => {
    modal.style.display = 'none';
  }, false);
}

window.addEventListener('click', (event) => {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});


//MODAL ALERT 

for (var k = 0; k < spanAlert.length; k++) {
  var closeThisAlert = spanAlert[k];
  closeThisAlert.addEventListener('click', (event) => {
    alertMsg.style.display = 'none';
  }, false);
}

window.addEventListener('click', (event) => {
    if (event.target == alertMsg) {
        alertMsg.style.display = 'none';
    }
});









