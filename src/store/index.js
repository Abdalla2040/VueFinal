import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    projects: [],
    auth: false,
    session: "",
    user: {
      id: null,
      firstName: "",
      lastName: "",
      email: "",
      username: ""
    }
  },
  getters: {
  },
  mutations: {
    addProject: function(state, payload){
      state.projects.push(Object.assign({}), payload)
    },
    clear: function(state){
      state.projects = []
    },
    setAuth: function(state, payload){
      state.auth = payload.auth;
      state.session = payload.session;
    },
    setUser: function(state, payload){
      state.user.id = payload.id;
      state.user.firstName = payload.firstName;
      state.user.lastName = payload.lastName;
      state.user.email = payload.email;
      state.user.username = payload.username;
    }
  },
  actions: {
    clear: function(context){
      context.commit("clear");
    }
  },
  modules: {
  }
})
