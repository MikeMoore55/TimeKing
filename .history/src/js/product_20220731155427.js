/* get selected product */
import selectedProductArray from "../php/selectedProduct.json" assert { type: "json" };

const { createApp } = window.Vue;
const component = {
    data(){
        return{
            selectedProduct : selectedProductArray,
            array : []
        }
    },
    methods: {
        toArray(selectedProduct){
            array = JSON.parse(selectedProduct)
        }
    },
    mounted() {
        console.log(this.selectedProduct),
        this.toArray(),
        console.log(array)
    },
}
/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#product")
})
