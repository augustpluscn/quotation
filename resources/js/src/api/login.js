/* eslint-disable camelcase */
import http from '@/utils/http'

export default {
  login: (obj) => {
    return http.post('auth/login', obj)
  },
  logout: () => {
    return http.post('auth/logout', {}, true)
  }
}
