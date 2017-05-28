import Vue from 'vue'
import Vuex from 'vuex'
import { fetchUser } from './api'

Vue.use(Vuex)

const state = {
  user: JSON.parse(localStorage.authUser) || {}
}

const mutations = {
  setUser (state) {
    state.user = fetchUser()
  },
  removeUser (state) {
    delete localStorage.authUser
    state.user = {}
  }
}

const actions = {
  setUser: ({ commit }, data) => { commit('setUser', data) },
  removeUser: ({ commit }) => commit('removeUser')
}

const getters = {

}

const store = new Vuex.Store({
  state,
  getters,
  actions,
  mutations
})

if (module.hot) {
  module.hot.accept([
    getters,
    actions,
    mutations
  ], () => {
    store.hotUpdate({
      getters,
      actions,
      mutations
    })
  })
}

export default store
