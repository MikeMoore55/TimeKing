/* get signed in user */
import signedInUser from "../php/signedInUser.json" assert { type: "json" };

for (let x in signedInUser) {
    console.log(x)
}