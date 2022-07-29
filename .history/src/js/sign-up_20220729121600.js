const { createApp } = window.Vue;
const component = {
    data(){
        return{
            name: '',
            surname: '',
            displayName: '',
            email: '',
            password: ''
        }
    },
    methods: {
        
    },
    mounted() {
        
    },
}

window.addEventListener('DOMContentLoaded', () => {
    const app = createApp(component)
    app.mount("#main")
  })
  