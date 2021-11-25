import axios from 'axios'
import qs from 'qs'
import { Toast, Dialog } from 'vant'
import store from '@/store'
import router from '@/router'

// create an axios instance
const service = axios.create({
  baseURL: process.env.VUE_APP_API, // url = base url + request url
  // withCredentials: true, // send cookies when cross-domain requests
  timeout: 5000 // request timeout
})

// request拦截器 request interceptor
service.interceptors.request.use(
  config => {
    // 不传递默认开启loading
    if (!config.hideloading) {
      // loading
      Toast.loading({
        forbidClick: true
      })
    }
    config.data = qs.stringify(config.data)
    config.headers = {
      'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8' //配置请求头
    }

    if (store.getters.token) {
      config.headers.Authorization = store.getters.token
    }

    return config
  },
  error => {
    // do something with request error
    console.log(error) // for debug
    return Promise.reject(error)
  }
)
// respone拦截器
service.interceptors.response.use(
  response => {
    Toast.clear()
    //判断token是否刷新
    const token = response.headers.authorization
    if (token) {
      // 如果 header 中存在 token，那么触发 refreshToken 方法，替换本地的 token
      store.dispatch("user/setToken", token);
    }

    const res = response.data
    // 这里注意修改成你访问的服务端接口规则
    if (res.code && res.code !== 200) {
      Toast({
        message: res.msg,
        forbidClick: true,
      })
      return Promise.reject(res || 'error')
    } else {
      return Promise.resolve(res)
    }
  },
  error => {
    Toast.clear()
    if (error && error.response) {
      switch (error.response.status) {
        case 400:
          error.message = error.response.data.error
          break
        case 401:
          if (router.currentRoute.name != 'Login') {
            Dialog.alert({
              title: '请您重新登录',
              message: '登录超时',
            }).then(() => {
              router.replace({
                name: "Login",
              });
            });
          }
          store.dispatch("user/removeToken");
          return
        case 403:
          error.message = '拒绝访问'
          break
        case 404:
          error.message = '请求错误,未找到该资源'
          break
        case 405:
          error.message = '请求方法未允许'
          break
        case 408:
          error.message = '请求超时'
          break
        case 500:
          error.message = '服务器端出错'
          break
        case 501:
          error.message = '网络未实现'
          break
        case 502:
          error.message = '网络错误'
          break
        case 503:
          error.message = '服务不可用'
          break
        case 504:
          error.message = '网络超时'
          break
        case 505:
          error.message = 'http版本不支持该请求'
          break
        default:
          error.message = `连接错误${error.response.status}`
      }
    } else {
      // 超时处理
      if (JSON.stringify(error).includes('timeout')) {
        error.message = '服务器响应超时，请重试'
      } else {
        error.message = '连接服务器失败'
      }
    }
    Toast({
      message: error.message,
      forbidClick: true,
    })

    return Promise.reject(error)
  }
)

export default service
