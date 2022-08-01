/* get signed in user */
/* import signedInUser from "../php/signedInUser.json" assert { type: "json" };
const account = document.querySelector("#account");

for (let x in signedInUser) {
    console.log(signedInUser)
    if(signedInUser.isSignedIn == false){
        account.disabled = true;
    }else{
        account.disabled = false;     
    }
} */

const fs = require('signedInUser.json');

// directory to check if exists
const dir = '../php/';

// check if directory exists
if (fs.existsSync(dir)) {
    console.log('Directory exists!');
} else {
    console.log('Directory not found.');
}