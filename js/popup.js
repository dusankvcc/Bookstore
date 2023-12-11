// Check if loginSuccess session variable is set 
let isLoginSuccess = sessionStorage.getItem('loginSuccess') !== null;
debugger
// If successful login
if(isLoginSuccess) {

  // Show popup
  setTimeout(() => {

    const popup = document.createElement('div');
    popup.classList.add('popup'); 
    popup.textContent = 'Successfully logged in!';
    
    document.body.appendChild(popup);
    
    setTimeout(() => {
        popup.remove(); 
    }, 3000); 

  }, 1000);

}

// Unset the session variable 
sessionStorage.removeItem('loginSuccess');