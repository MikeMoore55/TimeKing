const UsernameInput = document.querySelector("#username").value;
const PasswordInput = document.querySelector("#password").value;
const usernameErr = document.querySelector("#username-err");
const passwordErr = document.querySelector("#password-err");

function validateForm(){
  if (UsernameInput == "") {
        usernameErr.style.display="block";
        usernameErr.innerHTML = "** required **"
    }
   if (PasswordInput == "") {
        passwordErr.style.display="block";
        passwordErr.innerHTML = "** required **"
    }
}

return this.validateForm();
