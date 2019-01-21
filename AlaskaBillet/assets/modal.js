
var modal = document.getElementById('myModal');
var btn = document.querySelectorAll(".deleteBtn");
var span = document.getElementsByClassName("close")[0];

//This is just faster than typing Array.prototype.forEach.call(...);
//Copy Object
  [].forEach.call(btn, function(el) {
    el.onclick = function() {
        modal.style.display = "block";
    }
  })
  span.onclick = function() {
      modal.style.display = "none";
  }
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }