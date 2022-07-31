const { createApp } = window.Vue;
const component = {
    data(){
        return{
            cart : null,
        }
    },
    mounted() {
        //get all watches
          axios
            .get('public/cart')
            .then( response => (this.cart = response.data)),
    },
}
/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#main")
})

