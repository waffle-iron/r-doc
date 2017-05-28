import Vue from 'vue'
import Vuex from 'vuex'
import api from './api'

Vue.use(Vuex)

const state = {
  user: {}
}

const mutations = {
  SET_USER (state, payload) { state.user = payload },
  REMOVE_USER (state) { state.user = {} }
}

const actions = {
  setUser: ({ commit }) => {
    api.saveUser().then(data => {
      api.set('user', data.data)
      commit('SET_USER', data.data)
    })
  },
  removeUser: ({ commit }) => {
    api.remove('user')
    commit('REMOVE_USER')
  }
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
