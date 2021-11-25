<template>
  <div class="home">
    <van-nav-bar title="首页" />
    <van-grid :column-num="1">
      <van-grid-item :key="1" icon="close" text="登出" @click="logout" />
    </van-grid>
  </div>
</template>

<script>
import Api from "@/api/login.js";
export default {
  name: "Home",
  components: {},
  methods: {
    logout() {
      Api.logout().then((res) => {
        if (res.code == 200) {
          this.$store.dispatch("user/removeToken");
          this.$router.replace({
            name: "Login",
          });
        }
      });
    },
  },
};
</script>
