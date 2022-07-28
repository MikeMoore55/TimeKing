const { createApp } = window.Vue;
const component = {
    data(){
        return{
            info : null
        }
    },
    mounted() {
        axios
        .get('/watches/all')
        .then(response => (this.info = response.data))
    },
   
}

window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#app")
})