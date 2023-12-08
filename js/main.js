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
var loginButton = document.getElementById('navbtn');
loginButton.addEventListener('click', openModal);
// Adding event listener to the button for opening the modal
var signupButton = document.getElementById('navbtn1');
signupButton.addEventListener('click', openModal);

// Optional: Close the modal if the user clicks outside of it
window.onclick = function(event) {
    if (event.target == modal) {
        closeModal();
    }
}




const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
