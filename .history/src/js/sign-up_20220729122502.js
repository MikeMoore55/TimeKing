const { default: axios } = require("axios");

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
        
            axios({
                method: 'post',
                url: './src/routes/users.php',
                data: formData,
                config: { Headers : {'Content-Type': 'multipart/form-data'}}
            })
            .then(function(response){
                console.log(response);
            })
            .catch(function(response){
                console.log(response)
            })
        }
    },
    mounted() {
        
    },
}

window.addEventListener('DOMContentLoaded', () => {
    const app = createApp(component)
    app.mount("#main")
})
  