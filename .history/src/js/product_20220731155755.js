/* get selected product */
import selectedProductArray from "../php/selectedProduct.json" assert { type: "json" };

const { createApp } = window.Vue;
const component = {
    data(){
        return{
            selectedProduct : JSON.parse(selectedProductArray),
        }
    },
    methods: {
    },
    mounted() {
        selectedProduct
    },
}
/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#product")
})
