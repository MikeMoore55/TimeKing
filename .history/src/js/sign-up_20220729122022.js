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
        createUser(){
            let formData = new FormData();
            formData.append("name", this.name);
            formData.append("surname", this.surname)
            formData.append("displayName", this.displayName)
            formData.append("email", this.email)
            formData.append("password", this.password)

        }
    },
    mounted() {
        
    },
}

window.addEventListener('DOMContentLoaded', () => {
    const app = createApp(component)
    app.mount("#main")
})
  