/* get signed in user */
import signedInUser from "../php/signedInUser.json" assert { type: "json" };

const account = document.querySelector("#account");

if (Object.entries(signedInUser).length === 0) {
    account.disabled = true;
}