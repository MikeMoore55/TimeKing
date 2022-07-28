const { createApp } = window.Vue;
const component = {
    data(){
        return{
            all : null,
            featured : null
        }
    },
    mounted() {
          axios
            .get('public/watches/all')
            .then( response => (this.all = response.data)),
            axios
            .get('public/watches/featured')
            .then( response => (this.featured = response.data))
    },
}

window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#main")
})

