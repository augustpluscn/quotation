<template>
  <div class="home">
    <van-nav-bar title="道具报价" />

    <van-field required readonly clickable :value="jgfs.val" name="picker" label="加工方式" placeholder="加工方式" @click="jgfs.show = true" />
    <van-popup v-model="jgfs.show" position="bottom">
      <van-picker
        title="加工方式"
        show-toolbar
        :columns="jgfs.list"
        @confirm="onConfirmJgfs"
        @cancel="jgfs.show = false" />
    </van-popup>
    <van-field required readonly clickable :value="rule.val.成本名称" name="picker" label="报价种类" placeholder="报价种类" @click="rule.show = true" />
    <van-popup v-model="rule.show" position="bottom">
      <van-picker
        title="报价种类"
        show-toolbar
        value-key="成本名称"
        :columns="rule.list"
        @confirm="onConfirmRule"
        @cancel="rule.show = false" />
    </van-popup>
    <van-field required v-for="(item,index) in eleItem" :key='index' v-model="eleVal[item.编号]" type="number" :label="item.名称" />
  </div>
</template>

<script>
import Api from "@/api/login.js";
import Rule from "@/api/rule.js";
import Ele from "@/api/element.js";
// import { Toast } from "vant";
export default {
  name: "Home",
  data() {
    return {
      eleItem: [],
      eleVal: {},
      rule: {
        list: [],
        val: {},
        show: false,
      },
      jgfs: {
        list: ["新制", "维修"],
        val: "",
        show: false,
      },
    };
  },
  components: {},
  methods: {
    getRuleList() {
      Rule.list().then((res) => {
        this.rule.list = res.data.list;
      });
    },
    onConfirmJgfs(value, index) {
      this.jgfs.val = value;
      this.jgfs.show = false;
    },
    onConfirmRule(value, index) {
      this.rule.val = value;
      this.rule.show = false;
      this.getElement();
    },
    getElement() {
      Ele.item(this.rule.val.元素).then((res) => {
        this.eleItem = res.data.list;
        this.eleVal = {};
      });
    },
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
  created() {
    this.getRuleList();
  },
};
</script>
