/* eslint-disable camelcase */
import http from '@/utils/http'

export default {
  dd: () => {
    return http.get('dd', {}, true)
  },
  sysset: () => {
    return http.get('sysset', {}, true)
  }
}
