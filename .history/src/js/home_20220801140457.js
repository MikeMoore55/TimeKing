const { createApp } = window.Vue;
const component = {
    data(){
        return{
            all : null,
            featured : null,
            upcoming : null,
        }
    },

    methods: {
    },
    mounted() {
        //get all watches
          axios
            .get('public/watches/all')
            .then( response => (this.all = response.data)),
        // get featured watches
            axios
            .get('public/watches/featured')
            .then( response => (this.featured = response.data)),
        //get upcoming watches
            axios
            .get('public/watches/upcoming')
            .then( response => (this.upcoming = response.data)),
            console.log(this.all)
        },
        
}
/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#main")
})

