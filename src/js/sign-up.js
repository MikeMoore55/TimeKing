/* secondary measure to ensure all fields are filled out */

const NameInput = document.querySelector("#name").value;
const SurnameInput = document.querySelector("#surname").value;
const UsernameInput = document.querySelector("#username").value;
const EmailInput = document.querySelector("#email").value;
const PasswordInput = document.querySelector("#password").value;


const nameErr = document.querySelector("#name-err");
const surnameErr = document.querySelector("#surname-err");
const usernameErr = document.querySelector("#username-err");
const emailErr = document.querySelector("#email-err");
const passwordErr = document.querySelector("#password-err");

function validateForm(){
    if (NameInput == "") {
        nameErr.style.display="block";
        nameErr.innerHTML = "** required **"
    }

    if (SurnameInput == "") {
        surnameErr.style.display="block";
        surnameErr.innerHTML = "** required **"
    }

    if (UsernameInput == "") {
        usernameErr.style.display="block";
        usernameErr.innerHTML = "** required **"
    }

    if (EmailInput == "") {
        emailErr.style.display="block";
        emailErr.innerHTML = "** required **"
    }

    if (PasswordInput == "") {
        passwordErr.style.display="block";
        passwordErr.innerHTML = "** required **"
    }

}
