import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
// 引入全局样式
import '@/assets/css/index.scss'

// 全局引入按需引入UI库 vant
import '@/plugins/vant'
//权限
import '@/permission'

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
