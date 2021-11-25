import {
  loadToken,
  saveToken,
  removeToken
} from '@/utils/cache'
const state = {
  token: loadToken(),
}

const mutations = {
  SET_TOKEN: (state, token) => {
    state.token = token
  },
}

const actions = {
  setToken({ commit }, data) {
    commit('SET_TOKEN', saveToken(data));
  },
  // 登出
  removeToken({ commit }) {
    commit('SET_TOKEN', removeToken());
  }
}

export default {
  namespaced: true,
  state,
  mutations,
  actions
}
