<template>
  <div class="home">
    <van-nav-bar
      title="刀具报价"
      fixed
      :right-text="rightTxt"
      @click-right="onClickRight" />

    <div class="ver">{{version.version}}</div>
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
      <div v-if="item.类型==1" :key='index' class="van-cell van-cell--required van-field">
        <div class="van-cell__title van-field__label"><span>{{item.名称}}</span></div>
        <div class="van-cell__value van-field__value">
          <van-stepper v-model="eleVal[item.编号]" input-width="70%" />
        </div>
      </div>
      <!-- <van-stepper v-if="item.类型==1" :key='index' v-model="eleVal[item.编号]" /> -->
      <!-- <van-field v-if="item.类型==1" required :key='index' v-model="eleVal[item.编号]" type="number" :label="item.名称" /> -->
      <div :key='index' v-if="item.类型==2 && Object.prototype.hasOwnProperty.call(eveSelect, item.编号)" class="van-cell van-cell--required van-field">
        <div class="van-cell__title van-field__label"><span>{{item.名称}}</span></div>
        <div class="van-cell__value van-field__value">
          <div class="van-field__body">
            <v-select :options="eveSelect[item.编号]" v-model="eleVal[item.编号]" class="select"></v-select>
          </div>
        </div>
      </div>
    </template>
    <template v-if="eleItem.length>0">
      <div class="van-cell van-cell--required van-field">
        <div class="van-cell__title van-field__label"><span>税率</span></div>
        <div class="van-cell__value van-field__value">
          <div class="van-field__body">
            <v-select :options="taxArr" v-model="tax" class="select"></v-select>
          </div>
        </div>
      </div>
      <div class="preview">
        <van-button type="primary" @click="preview" size="small">预览</van-button>
      </div>
    </template>
    <div v-if="res" class="detail">
      <div class="title">报价结果</div>
      <div class="item">
        <div>
          <div>总价:{{Math.round(res.res*100)/100}}</div>
          <div>单价:{{unitPrice}}</div>
          <div>含税:{{taxPrice}}</div>
          <div>税率:{{tax.label || '0%'}}</div>
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
        <van-button type="primary" @click="save">保存</van-button>
      </div>
    </div>
    <van-popup v-model="show" round closeable :style="{ width: '90%' }">
      <div v-if="res" class="detail">
        <div class="title">报价详情</div>
        <div class="item">
          <div>
            <div>总价:{{Math.round(res.res*100)/100}}</div>
            <div>单价:{{unitPrice}}</div>
            <div>含税:{{taxPrice}}</div>
            <div>税率:{{tax.label || '0%'}}</div>
          </div>
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
    </van-popup>
  </div>
</template>

<script>
import Rule from "@/api/rule.js";
import Ele from "@/api/element.js";
import Dd from "@/api/dd.js";
import Quotation from "@/api/quotation.js";
import { Dialog } from "vant";
import version from "@/version.json";
export default {
  name: "Home",
  data() {
    return {
      version: { version: "" },
      taxArr: [],
      tax: null,
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
      saved: false,
      show: false,
      unitPrice: 0,
    };
  },
  components: {},
  computed: {
    rightTxt() {
      return this.res ? "详情" : "";
    },
    // unitPrice() {
    //   let unitPrice = 0;
    //   if (this.res) {
    //     if (Object.prototype.hasOwnProperty.call(this.eleVal, "Y0001")) {
    //       let qty = this.eleVal.Y0001 || 1;
    //       unitPrice = this.res.res / qty;
    //     } else {
    //       unitPrice = this.res.res;
    //     }
    //   }
    //   return Math.round(unitPrice * 100) / 100;
    // },
    taxPrice() {
      let price = 0;
      if (this.res) {
        if (this.tax) {
          price = (1 + this.tax.code * 1) * this.res.res;
        } else {
          price = this.res.res;
        }
      }
      return Math.round(price * 100) / 100;
    },
  },
  methods: {
    onClickRight() {
      if (this.res) {
        this.show = true;
      }
    },
    clear() {
      this.rule = {
        list: [],
        val: {},
        show: false,
      };
      this.eleItem = [];
      this.res = false;
      this.companyVal = "";
      this.saved = false;
    },
    getTax() {
      Dd.erpDd("税率").then((res) => {
        let arr = [];
        res.data.list.forEach((element) => {
          arr.push({
            label: element.content,
            code: element.BID,
          });
        });
        this.taxArr = arr;
      });
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
      this.companyVal = "";
      this.saved = false;
      Ele.item(this.rule.val.元素).then((res) => {
        this.eleItem = res.data.list;
        this.eleVal = {};
        this.eveSelect = res.data.dd;
        let obj = {};
        this.eleItem.forEach((item) => {
          obj[item.编号] = item.默认值;
        });
        this.eleVal = obj;
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
      let err = false;
      for (let item in this.eleVal) {
        if (
          this.eleVal[item] == "" ||
          this.eleVal[item] == 0 ||
          this.eleVal[item] == null
        ) {
          err = true;
          break;
        }
      }
      if (err || this.tax == null) {
        Dialog.alert({
          title: "警告",
          message: "请填写完整资料",
        });
        return;
      }
      Quotation.compute(this.rule.val.编号, this.eleVal).then((res) => {
        this.res = res.data.res;
        this.confirmPrice = this.taxPrice;
        this.unitPrice =
          Math.round((this.res.res / this.eleVal.Y0001) * 100) / 100;
        this.saved = false;
      });
    },
    save() {
      if (this.saved) {
        Dialog.alert({
          title: "警告",
          message: "已经保存!",
        });
        return;
      }
      if (this.companyVal == "") {
        Dialog.alert({
          title: "警告",
          message: "请选择客户",
        });
        return;
      }
      if (this.res == false) {
        Dialog.alert({
          title: "警告",
          message: "请先预览结果",
        });
        return;
      }
      Quotation.add(
        this.rule.val.编号,
        this.companyVal,
        this.eleVal,
        this.res,
        this.remark,
        this.confirmPrice,
        this.tax.code
      ).then((res) => {
        Dialog.alert({
          title: "提示",
          message: res.data.msg,
        });
        this.saved = true;
      });
    },
  },
  created() {
    this.version = version;
    this.getJgfs();
    this.getTax();
    this.getCompany();
  },
};
</script>

<style lang="scss">
.home {
  padding: 46px 0 20px;
  .ver {
    text-align: center;
    font-size: 10px;
  }
  .select {
    width: 100%;
  }
  .van-cell__value {
    text-align: left !important;
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
        display: flex;
        flex-wrap: wrap;
        > div {
          width: 50%;
        }
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
