const { createApp } = window.Vue;
const component = {
    data(){
        return{
            info : null
        }
    },
    mounted() {
        axios
        .get('public/watches/all')
        .then(response => (this.info = response.data))

        info.array.forEach(element => {
            const watchName = element.watch_name
        });
    },
   
}

window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#app")
})