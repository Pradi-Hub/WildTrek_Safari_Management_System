//delete reservation
function deleteRes() {
var msg = "Are you sure you want to delete this reservation?";
  if (confirm(msg)) {
      return true; // Proceed with the deletion
  } else {
      return false; // Cancel the deletion
  }
}

//clear form
window.addEventListener("pageshow", function(event) {
  var form = document.getElementById("myForm");
  if (event.persisted) {
      form.reset(); // Clear form fields if navigating back
  }
});

