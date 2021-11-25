/* eslint-disable camelcase */
import http from '@/utils/http'

export default {
  list: () => {
    return http.get('rule')
  }
}
