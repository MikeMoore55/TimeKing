const { createApp } = window.Vue;
const component = {
    data(){
        return{
            info : null,
        }
    },
    methods: {
        getWatches(){
            axios
            .get('public/watches/all')
            .then( response => (this.info = response.data))
        }
    },
    mounted() {
    
    },
}

window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#app")
})