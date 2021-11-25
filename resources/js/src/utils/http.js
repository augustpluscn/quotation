// 导入封装好的axios实例
import request from './request'

const http = {
  /**
   * methods: 请求
   * @param url 请求地址
   * @param params 请求参数
   */
  get(url, params, hideloading = false) {
    const config = {
      method: 'get',
      url: url,
      hideloading: hideloading
    }
    if (params) config.params = params
    return request(config)
  },
  post(url, params, hideloading = false) {
    const config = {
      method: 'post',
      url: url,
      hideloading: hideloading
    }
    if (params) config.data = params
    return request(config)
  },
  put(url, params, hideloading = false) {
    const config = {
      method: 'put',
      url: url,
      hideloading: hideloading
    }
    if (params) config.params = params
    return request(config)
  },
  delete(url, params, hideloading = false) {
    const config = {
      method: 'delete',
      url: url,
      hideloading: hideloading
    }
    if (params) config.params = params
    return request(config)
  }
}
//导出
export default http
