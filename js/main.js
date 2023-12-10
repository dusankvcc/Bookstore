// Get modal element
var modal = document.getElementById("myModal");

// Function to open the modal
function openModal() {
    modal.style.display = "block";
}

// Function to close the modal
function closeModal() {
    modal.style.display = "none";
}

// Adding event listener to the button for opening the modal
var loginButton = document.getElementById('signInBtn');
loginButton.addEventListener('click', openModal);
// Adding event listener to the button for opening the modal
var signupButton = document.getElementById('signUpBtn');
signupButton.addEventListener('click', openModal);

// Optional: Close the modal if the user clicks outside of it
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
}



 
const signUpBtn = document.getElementById('signUpBtn');
const signInBtn = document.getElementById('signInBtn');

signUpBtn.addEventListener('click', showSignUp); 
signInBtn.addEventListener('click', showSignIn);

function showSignUp() {
    container.classList.add('right-panel-active');  
  }
  
  function showSignIn() {
     container.classList.remove('right-panel-active');
  }