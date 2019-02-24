
var span = document.getElementsByClassName('close');
var btn = document.getElementsByClassName('deleteBtn');
var modal = document.getElementById('myModal');


for (var i = 0; i < btn.length; i++) {
  var thisBtn = btn[i];

      thisBtn.addEventListener('click', (event) =>{
        modal.style.display = 'block';
    }, false);
}

for (var j = 0; j < span.length; j++) {
  var closeThis = span[j];
      closeThis.addEventListener('click', (event) => {
        var closeModal = document.getElementById(this.dataset.modal);
        closeModal.style.display = 'none';
    }, false);
}

window.addEventListener('click', (event) => {
    if (event.target == modal) {
        modal.style.display = 'none';
    }
});