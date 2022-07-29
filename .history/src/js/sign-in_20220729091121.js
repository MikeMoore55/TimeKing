const { createApp } = window.Vue;
const component = {
    data(){
        return{
            username: ''
        }
    },
    methods: {
        
    },
    mounted() {
        
    }
}

/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
    const app = createApp(component)
    app.mount("#main")
  })
  