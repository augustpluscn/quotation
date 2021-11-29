/* eslint-disable camelcase */
import http from '@/utils/http'

export default {
  list: (kind) => {
    return http.get('rule', { kind }, true)
  }
}
