const { createApp } = window.Vue;
const component = {
    data(){
        return{
            info : null,
            array: []
        }
    },
    mounted() {
        axios
        .get('public/watches/all')
        .then( response => (this.info = response.data))
    },
}

window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#app")
})