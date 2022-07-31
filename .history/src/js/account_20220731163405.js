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
