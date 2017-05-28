import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const state = {

}

const mutations = {

}

const actions = {

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
