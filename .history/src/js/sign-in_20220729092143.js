const { createApp } = window.Vue;
const component = {
    data(){
        return{
            info : null
        }
    },
    mounted() {
        //get all watches
          axios
            .get('public/users/info')
            .then( response => (this.info = response.data))
    },
}
/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#main")
})

