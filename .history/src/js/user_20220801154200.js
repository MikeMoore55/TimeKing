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
            .get('users/add')
            .then( response => (this.all = response.data)),
        axios
            .get('users/add')
            .then( response => (this.all = response.data)),
        },
        
}
/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#main")
})

