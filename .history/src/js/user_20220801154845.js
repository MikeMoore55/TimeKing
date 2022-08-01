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
        //test for new user
        axios
            .get('public/users/add')
            .then( response => (this.all = response.data)),
        // gets user
        axios
            .get('public/user')
            .then( response => (this.all = response.data)),
        }
        
}
/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#main")
})

