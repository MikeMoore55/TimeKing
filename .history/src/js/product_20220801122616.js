/* get selected product */
import selectedProductArray from "../php/selectedProduct.json" assert { type: "json" };
/* get signed in user */
import signedInUser from "../php/signedInUser.json" assert { type: "json" };

/* make that user has to be signed in to add to cart (TODO) */

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
        console.log(this.selectedProduct)
    },
}
/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#info")
})
