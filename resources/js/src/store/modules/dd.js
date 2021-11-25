import Api from '@/api/comment.js'
const state = {
  dd: {},
  sysSet: {}
}

const mutations = {
  SET_DD: (state, dd) => {
    state.dd = dd
  },
  SET_SYS_SET: (state, sysSet) => {
    state.sysSet = sysSet
  }
}

const actions = {
  setDd({ commit }) {
    Api.dd().then((res) => {
      commit('SET_DD', res.data.dd)
    });
  },
  setSysSet({ commit }) {
    Api.sysset().then((res) => {
      commit('SET_SYS_SET', res.data.setting)
    });
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}
