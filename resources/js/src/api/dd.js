/* eslint-disable camelcase */
import http from '@/utils/http'

export default {
  erpDd: (kind) => {
    return http.get('erpdd', { kind }, true)
  },
  company: () => {
    return http.get('company', {}, true)
  }
}
