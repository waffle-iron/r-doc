import Vue from 'vue'
import Vuex from 'vuex'
import api from './api'

Vue.use(Vuex)

const state = {
  user: {},
  documentList: [],
  currentDocument: {}
}

const mutations = {
  SET_USER (state, payload) { state.user = payload },
  REMOVE_USER (state) { state.user = {} },
  SET_DOCUMENT_INDEX (state, payload) { state.documentList = payload },
  SET_CURRENT_DOCUMENT (state, payload) { state.currentDocument = payload },
  REMOVE_CURRENT_DOCUMENT (state) { state.currentDocument = {} }
}

const actions = {
  setUser: ({commit}) => {
    api.saveUser().then(data => {
      api.set('user', data.data)
      commit('SET_USER', data.data)
    })
  },
  removeUser: ({commit}) => {
    api.remove('user')
    commit('REMOVE_USER')
  },
  fetchDocumentIndex: ({commit}) => {
    api.fetch('/api/v1/guides').then(data => {
      api.set('documentIndex', data.data)
      commit('SET_DOCUMENT_INDEX', data.data)
    })
  },
  loadDocumentIndex: ({commit}) => {
    commit('SET_DOCUMENT_INDEX', api.get('documentIndex'))
  },
  resetCurrentDocument: ({commit}) => {
    api.remove('currentDocument')
    commit('REMOVE_CURRENT_DOCUMENT')
  },
  fetchCurrentDocument: (context, guide) => {
    api.fetch(`/api/v1/guides/${guide.id}`).then(data => {
      api.set('currentDocument', data.data)
      context.commit('SET_CURRENT_DOCUMENT', data.data)
    })
  },
  loadCurrentDocument: ({commit}) => {
    commit('SET_CURRENT_DOCUMENT', api.get('currentDocument'))
  }
}

const getters = {}

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
