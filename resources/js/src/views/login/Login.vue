<template>
  <div class="login">
    <van-nav-bar title="登录" />
    <van-form @submit="onSubmit">
      <van-field v-model="username" name="username" label="用户名" placeholder="用户名" :rules="[{ required: true, message: '请填写用户名' }]" />
      <van-field v-model="password" type="password" name="password" label="密码" placeholder="密码" :rules="[{ required: true, message: '请填写密码' }]" />
      <div style="margin: 16px;">
        <van-button round block type="info" native-type="submit">提交</van-button>
      </div>
    </van-form>
  </div>
</template>

<script>
import Api from "@/api/login.js";
export default {
  components: {},
  data() {
    return {
      username: "",
      password: "",
    };
  },
  computed: {},
  methods: {
    onSubmit(e) {
      Api.login(e).then((res) => {
        if (res.code == 200) {
          this.$store.dispatch("user/setToken", res.data.access_token);
          this.$store.dispatch("dd/setDd");
          this.$router.replace({
            name: "Home",
          });
        }
      });
    },
  },
};
</script>
