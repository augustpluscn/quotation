import router from '@/router'
import store from '@/store'

router.beforeEach(async (to, from, next) => {
  //检测登录
  let isLogin = store.getters.token;

  if (isLogin) {
    // 如果已经处于登录状态，跳到登录页重定向到首页
    if (to.path === '/login') {
      next({ path: '/' })
    } else {
      next()
    }
  } else {
    next(to.path !== '/login' ? { path: '/login' } : true)
  }
})
