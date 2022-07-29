const { createApp } = window.Vue;
const component = {
    data(){
        return{
            username: '',
            password: ''
        }
    }
}

/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
    const app = createApp(component)
    app.mount("#main")
  })
  