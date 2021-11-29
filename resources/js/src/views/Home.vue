<template>
  <div class="home">
    <van-nav-bar title="刀具报价" fixed='true' />
    <van-field required readonly clickable :value="jgfs.val.content" name="picker" label="加工方式" placeholder="加工方式" @click="jgfs.show = true" />
    <van-popup v-model="jgfs.show" position="bottom">
      <van-picker
        title="加工方式"
        show-toolbar
        value-key="content"
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
    <!-- <van-field required v-for="(item,index) in eleItem" :key='index' v-model="eleVal[item.编号]" type="number" :label="item.名称" /> -->
    <template v-for="(item,index) in eleItem">
      <van-field v-if="item.类型==1" required :key='index' v-model="eleVal[item.编号]" type="number" :label="item.名称" />
      <div :key='index' v-if="item.类型==2 && Object.prototype.hasOwnProperty.call(eveSelect, item.编号)" class="van-cell van-cell--required van-field">
        <div class="van-cell__title van-field__label"><span>{{item.名称}}</span></div>
        <div class="van-cell__value van-field__value">
          <div class="van-field__body">
            <v-select :options="eveSelect[item.编号]" v-model="eleVal[item.编号]" class="select"></v-select>
          </div>
        </div>
      </div>
    </template>
    <div class="preview" v-if="eleItem.length>0">
      <van-button type="primary" @click="preview" size="small">预览</van-button>
    </div>
    <div v-if="res" class="detail">
      <div class="title">报价详情</div>
      <div class="item">
        <div>总价:{{Math.round(res.res*100)/100}}</div>
        <div v-for="(item,index) in res.resArr" :key='index'>
          <div>
            <div>项目:{{item.成本名称}}</div>
            <div>{{Math.round(item.金额*100)/100}}</div>
          </div>
          <div v-if="item.公式">
            公式:{{item.公式}}
          </div>
          <div v-if="item.说明">
            说明:{{item.说明}}
          </div>
        </div>
      </div>
    </div>
    <div v-if="res" class="cus">
      <div class="van-cell van-cell--required van-field">
        <div class="van-cell__title van-field__label"><span>客户</span></div>
        <div class="van-cell__value van-field__value">
          <div class="van-field__body">
            <v-select :options="company" v-model="companyVal" class="select"></v-select>
          </div>
        </div>
      </div>
      <van-field required v-model="confirmPrice" type="number" label="最终报价" />
      <van-field v-model="remark" label="备注" />
      <div class="save">
        <van-button type="primary" @click="preview">保存</van-button>
      </div>
    </div>
  </div>
</template>

<script>
import Rule from "@/api/rule.js";
import Ele from "@/api/element.js";
import Dd from "@/api/dd.js";
import Quotation from "@/api/quotation.js";
import { Dialog } from "vant";
export default {
  name: "Home",
  data() {
    return {
      company: [],
      companyVal: "",
      eleItem: [],
      eleVal: {},
      eveSelect: {},
      rule: {
        list: [],
        val: {},
        show: false,
      },
      jgfs: {
        list: [],
        val: {},
        show: false,
      },
      res: false,
      confirmPrice: 0,
      remark: "",
    };
  },
  components: {},
  methods: {
    clear() {
      this.rule = {
        list: [],
        val: {},
        show: false,
      };
      this.eleItem = [];
      this.res = false;
    },
    getCompany() {
      Dd.company().then((res) => {
        this.company = res.data.list;
      });
    },
    getJgfs() {
      Dd.erpDd("报价制作类别").then((res) => {
        this.jgfs.list = res.data.list;
      });
    },
    getRuleList() {
      this.clear();
      Rule.list(this.jgfs.val.BID).then((res) => {
        this.rule.list = res.data.list;
      });
    },
    onConfirmJgfs(value, index) {
      if (this.jgfs.list.length > 0) {
        this.jgfs.val = value;
        this.getRuleList();
      }
      this.jgfs.show = false;
    },
    onConfirmRule(value, index) {
      if (this.rule.list.length > 0) {
        this.rule.val = value;
        this.getElement();
      }
      this.rule.show = false;
    },
    getElement() {
      this.res = false;
      Ele.item(this.rule.val.元素).then((res) => {
        this.eleItem = res.data.list;
        this.eleVal = {};
        this.eveSelect = res.data.dd;
      });
    },
    preview() {
      if (Object.keys(this.eleVal).length < this.eleItem.length) {
        Dialog.alert({
          title: "警告",
          message: "请填写完整资料",
        });
        return;
      }
      Quotation.compute(this.rule.val.编号, this.eleVal).then((res) => {
        this.res = res.data.res;
        this.confirmPrice = Math.round(this.res.res * 100) / 100;
      });
    },
  },
  created() {
    this.getJgfs();
    this.getCompany();
  },
};
</script>

<style lang="scss">
.home {
  padding: 46px 0 20px;
  .select {
    width: 100%;
  }
  .vs__dropdown-toggle {
    border: none !important;
  }
  .preview,
  .save {
    text-align: center;
  }
  .save {
    margin-bottom: 20px;
  }
  .detail {
    .title {
      text-align: center;
      padding: 10px;
    }
    .item {
      > div {
        margin: 5px 0;
        padding: 5px 15px;
      }
      > div:first-child {
        color: #f95;
        font-size: 24px;
      }
      > div:not(:first-child) {
        > div:first-child {
          display: flex;
          justify-content: space-between;
        }
      }
      > div:not(:last-child) {
        border-bottom: 1px solid #ddd;
      }
    }
  }
}
</style>
