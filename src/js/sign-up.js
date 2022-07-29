
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
                url: 'public/createNewUser/new',
                data:{ name: this.name,
                        surname: this.surname,
                        displayName: this.displayName,
                        email: this.email,
                        password: this.email,
                    }
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
        this.createUser();
    },
}

window.addEventListener('DOMContentLoaded', () => {
    const app = createApp(component)
    app.mount("#main")
})
  