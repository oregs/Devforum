import axios from "axios";

const state =  {
    user: {}
};
const getters = {};
const actions = {
    loginUser ( {}, user ){
        axios.post('/api/user/login', {
            email: user.email,
            password: user.password
        }).then( response => {
            if(response.data.access_token){
                //save token
                localStorage.setItem('blog_token', response.data.access_token);
                window.location.replace('/home');
            }
        });
    }
};
const mutations = {};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
