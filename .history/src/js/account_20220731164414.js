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
/* 
displayEmail(){
    document.querySelector("#email").style.display = "block";
}

displayCart(){
    document.querySelector("#cart").style.display = "block";
}

displayPassword(){
    document.querySelector("#password").style.display = "block";
} */