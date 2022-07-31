/* get selected product */
import selectedProductArray from "../php/selectedProduct.json" assert { type: "json" };
/* get signed in user */
import signedInUser from "../php/signedInUser.json" assert { type: "json" };

const { createApp } = window.Vue;
const component = {
    data(){
        return{
            selectedProduct : selectedProductArray,
            user: signedInUser
        }
    },
    methods: {
    },
    mounted() {
    },
}
/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#info")
})
