const { default: axios } = require("axios");

const { createApp } = window.Vue;
const component = {
    data(){
        return{
            displayName : '',
            password : '', 
            info : null
        }
    },

    methods: {
        postUserInfo : function(){
            let formData = new FormData();
            formData.append("displayName", this.displayName)
            formData.append("password", this.password)
            axios({
                method: 'post',
                url: 'public/user/signIn',
                data: formData
            })
            .then(function (response){
                console.log(response)
            })
            .catch(function(response){
                console.log(response)
            })
        }    
    },

    mounted() {
        this.postUserInfo()
    },
}
/* mount on main */
window.addEventListener('DOMContentLoaded', () => {
  const app = createApp(component)
  app.mount("#main")
})

