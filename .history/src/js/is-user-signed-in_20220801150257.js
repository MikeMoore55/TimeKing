/* get signed in user */
import signedInUser from "../php/signedInUser.json" assert { type: "json" };

const account = document.querySelector("#account");

if (Object.keys(signedInUser).length === 0) {
    account.disabled = true;
}