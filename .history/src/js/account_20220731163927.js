/* get selected product */
import signedInUser from "../php/signedInUser.json" assert { type: "json" };

const { createApp } = window.Vue;
const component = {
    data(){
        return{
            user : signedInUser
        }
    },
    methods: {
    },
    mounted() {
        console.log(this.user)
    },
}
/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#user-info")
})

function displayEmail(){
    document.querySelector("#email").style.display = "block";
}

function displayDisplayName(){
    document.querySelector("#username").style.display = "block";
}

function displayPassword(){
    document.querySelector("#password").style.display = "block";
}