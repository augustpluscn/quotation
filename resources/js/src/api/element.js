/* eslint-disable camelcase */
import http from '@/utils/http'

export default {
  item: (item) => {
    return http.get('element', { item }, true)
  }
}
