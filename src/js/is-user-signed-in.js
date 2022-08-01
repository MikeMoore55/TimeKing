/* get signed in user */
import signedInUser from "../php/signedInUser.json" assert { type: "json" };

const account = document.querySelector("#account");

if (signedInUser === "") {
    account.href = "./sign-in.html";
}