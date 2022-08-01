/* get signed in user */
import signedInUser from "../php/signedInUser.json" assert { type: "json" };
const account = document.querySelector(#account);

for (let x in signedInUser) {
    console.log(signedInUser)
    if(signedInUser.isSignedIn == false){
        account.disabled = true
    }
}