/* eslint-disable camelcase */
import http from '@/utils/http'

export default {
  compute: (rule, eles) => {
    return http.post('compute', { rule, eles })
  },
  add: (rule, cus, eles, res, remark) => {
    return http.post('quoadd', { rule, cus, eles, res, remark })
  }
}
