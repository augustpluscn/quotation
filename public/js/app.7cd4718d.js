(function(e){function t(t){for(var n,i,l=t[0],o=t[1],c=t[2],u=0,v=[];u<l.length;u++)i=l[u],Object.prototype.hasOwnProperty.call(s,i)&&s[i]&&v.push(s[i][0]),s[i]=0;for(n in o)Object.prototype.hasOwnProperty.call(o,n)&&(e[n]=o[n]);d&&d(t);while(v.length)v.shift()();return r.push.apply(r,c||[]),a()}function a(){for(var e,t=0;t<r.length;t++){for(var a=r[t],n=!0,i=1;i<a.length;i++){var o=a[i];0!==s[o]&&(n=!1)}n&&(r.splice(t--,1),e=l(l.s=a[0]))}return e}var n={},s={app:0},r=[];function i(e){return l.p+"js/"+({}[e]||e)+"."+{"chunk-2d230e44":"50a4016b"}[e]+".js"}function l(t){if(n[t])return n[t].exports;var a=n[t]={i:t,l:!1,exports:{}};return e[t].call(a.exports,a,a.exports,l),a.l=!0,a.exports}l.e=function(e){var t=[],a=s[e];if(0!==a)if(a)t.push(a[2]);else{var n=new Promise((function(t,n){a=s[e]=[t,n]}));t.push(a[2]=n);var r,o=document.createElement("script");o.charset="utf-8",o.timeout=120,l.nc&&o.setAttribute("nonce",l.nc),o.src=i(e);var c=new Error;r=function(t){o.onerror=o.onload=null,clearTimeout(u);var a=s[e];if(0!==a){if(a){var n=t&&("load"===t.type?"missing":t.type),r=t&&t.target&&t.target.src;c.message="Loading chunk "+e+" failed.\n("+n+": "+r+")",c.name="ChunkLoadError",c.type=n,c.request=r,a[1](c)}s[e]=void 0}};var u=setTimeout((function(){r({type:"timeout",target:o})}),12e4);o.onerror=o.onload=r,document.head.appendChild(o)}return Promise.all(t)},l.m=e,l.c=n,l.d=function(e,t,a){l.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a})},l.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},l.t=function(e,t){if(1&t&&(e=l(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(l.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)l.d(a,n,function(t){return e[t]}.bind(null,n));return a},l.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return l.d(t,"a",t),t},l.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},l.p="/",l.oe=function(e){throw console.error(e),e};var o=window["webpackJsonp"]=window["webpackJsonp"]||[],c=o.push.bind(o);o.push=t,o=o.slice();for(var u=0;u<o.length;u++)t(o[u]);var d=c;r.push([0,"chunk-vendors"]),a()})({0:function(e,t,a){e.exports=a("56d7")},"21bb":function(e,t,a){"use strict";a("2dad")},"2dad":function(e,t,a){},4360:function(e,t,a){"use strict";var n=a("2b0e"),s=a("2f62"),r={token:function(e){return e.user.token}},i=r,l={},o={},c={},u={namespaced:!0,state:l,mutations:o,actions:c},d=a("751a"),v={dd:function(){return d["a"].get("dd",{},!0)},sysset:function(){return d["a"].get("sysset",{},!0)}},f={dd:{},sysSet:{}},h={SET_DD:function(e,t){e.dd=t},SET_SYS_SET:function(e,t){e.sysSet=t}},p={setDd:function(e){var t=e.commit;v.dd().then((function(e){t("SET_DD",e.data.dd)}))},setSysSet:function(e){var t=e.commit;v.sysset().then((function(e){t("SET_SYS_SET",e.data.setting)}))}},m={namespaced:!0,state:f,mutations:h,actions:p},g=a("335a"),_="Token";function b(){return g["a"].get(_,!1)}function k(e){return g["a"].set(_,e),e}function y(){return g["a"].remove(_),!1}var w={token:b()},x={SET_TOKEN:function(e,t){e.token=t}},C={setToken:function(e,t){var a=e.commit;a("SET_TOKEN",k(t))},removeToken:function(e){var t=e.commit;t("SET_TOKEN",y())}},j={namespaced:!0,state:w,mutations:x,actions:C};n["a"].use(s["a"]);var S=new s["a"].Store({modules:{app:u,dd:m,user:j},getters:i});t["a"]=S},"56d7":function(e,t,a){"use strict";a.r(t);a("e260"),a("e6cf"),a("cca6"),a("a79d");var n=a("2b0e"),s=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{attrs:{id:"app"}},[a("router-view")],1)},r=[],i={name:"App",created:function(){}},l=i,o=a("2877"),c=Object(o["a"])(l,s,r,!1,null,null,null),u=c.exports,d=a("a18c"),v=a("4360"),f=a("4a7a"),h=a.n(f),p=(a("9536"),a("e92b"),a("f06a"),a("20fb")),m=(a("81e6"),a("9ffb")),g=(a("4d48"),a("d1e1")),_=(a("8a58"),a("e41f")),b=(a("5f5f"),a("f253")),k=(a("0ec5"),a("21ab")),y=(a("3df5"),a("2830")),w=(a("66b9"),a("b650")),x=(a("be7f"),a("565f")),C=(a("38d5"),a("772a")),j=(a("5246"),a("6b41"));n["a"].use(j["a"]),n["a"].use(C["a"]),n["a"].use(x["a"]),n["a"].use(w["a"]),n["a"].use(y["a"]),n["a"].use(k["a"]),n["a"].use(b["a"]),n["a"].use(_["a"]),n["a"].use(g["a"]),n["a"].use(m["a"]),n["a"].use(p["a"]);var S=a("1da1");a("96cf");d["a"].beforeEach(function(){var e=Object(S["a"])(regeneratorRuntime.mark((function e(t,a,n){var s;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:s=v["a"].getters.token,s?"/login"===t.path?n({path:"/"}):n():n("/login"===t.path||{path:"/login"});case 2:case"end":return e.stop()}}),e)})));return function(t,a,n){return e.apply(this,arguments)}}()),n["a"].component("v-select",h.a),n["a"].config.productionTip=!1,new n["a"]({router:d["a"],store:v["a"],render:function(e){return e(u)}}).$mount("#app")},"5c1b":function(e){e.exports=JSON.parse('{"version":"220118.1415"}')},"751a":function(e,t,a){"use strict";a("e17f");var n=a("2241"),s=(a("e7e5"),a("d399")),r=(a("d3b7"),a("b0c0"),a("ac1f"),a("5319"),a("caad"),a("2532"),a("e9c4"),a("bc3a")),i=a.n(r),l=a("4328"),o=a.n(l),c=a("4360"),u=a("a18c"),d=i.a.create({baseURL:"http://bjtest.seal.rwdsoft.com/api/",timeout:5e3});d.interceptors.request.use((function(e){return e.hideloading||s["a"].loading({forbidClick:!0}),e.data=o.a.stringify(e.data),e.headers={"Content-Type":"application/x-www-form-urlencoded;charset=UTF-8"},c["a"].getters.token&&(e.headers.Authorization=c["a"].getters.token),e}),(function(e){return console.log(e),Promise.reject(e)})),d.interceptors.response.use((function(e){s["a"].clear();var t=e.headers.authorization;t&&c["a"].dispatch("user/setToken",t);var a=e.data;return a.code&&200!==a.code?(Object(s["a"])({message:a.msg,forbidClick:!0}),Promise.reject(a||"error")):Promise.resolve(a)}),(function(e){if(s["a"].clear(),e&&e.response)switch(e.response.status){case 400:e.message=e.response.data.error;break;case 401:return"Login"!=u["a"].currentRoute.name&&n["a"].alert({title:"请您重新登录",message:"登录超时"}).then((function(){u["a"].replace({name:"Login"})})),void c["a"].dispatch("user/removeToken");case 403:e.message="拒绝访问";break;case 404:e.message="请求错误,未找到该资源";break;case 405:e.message="请求方法未允许";break;case 408:e.message="请求超时";break;case 500:e.message="服务器端出错";break;case 501:e.message="网络未实现";break;case 502:e.message="网络错误";break;case 503:e.message="服务不可用";break;case 504:e.message="网络超时";break;case 505:e.message="http版本不支持该请求";break;default:e.message="连接错误".concat(e.response.status)}else JSON.stringify(e).includes("timeout")?e.message="服务器响应超时，请重试":e.message="连接服务器失败";return Object(s["a"])({message:e.message,forbidClick:!0}),Promise.reject(e)}));var v=d,f={get:function(e,t){var a=arguments.length>2&&void 0!==arguments[2]&&arguments[2],n={method:"get",url:e,hideloading:a};return t&&(n.params=t),v(n)},post:function(e,t){var a=arguments.length>2&&void 0!==arguments[2]&&arguments[2],n={method:"post",url:e,hideloading:a};return t&&(n.data=t),v(n)},put:function(e,t){var a=arguments.length>2&&void 0!==arguments[2]&&arguments[2],n={method:"put",url:e,hideloading:a};return t&&(n.params=t),v(n)},delete:function(e,t){var a=arguments.length>2&&void 0!==arguments[2]&&arguments[2],n={method:"delete",url:e,hideloading:a};return t&&(n.params=t),v(n)}};t["a"]=f},9536:function(e,t,a){},a18c:function(e,t,a){"use strict";a("d3b7"),a("3ca3"),a("ddb0");var n=a("2b0e"),s=a("8c4f"),r=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"home"},[a("van-nav-bar",{attrs:{title:"刀具报价",fixed:"","right-text":e.rightTxt},on:{"click-right":e.onClickRight}}),a("div",{staticClass:"ver"},[e._v(e._s(e.version.version))]),a("van-field",{attrs:{required:"",readonly:"",clickable:"",value:e.jgfs.val.content,name:"picker",label:"加工方式",placeholder:"加工方式"},on:{click:function(t){e.jgfs.show=!0}}}),a("van-popup",{attrs:{position:"bottom"},model:{value:e.jgfs.show,callback:function(t){e.$set(e.jgfs,"show",t)},expression:"jgfs.show"}},[a("van-picker",{attrs:{title:"加工方式","show-toolbar":"","value-key":"content",columns:e.jgfs.list},on:{confirm:e.onConfirmJgfs,cancel:function(t){e.jgfs.show=!1}}})],1),a("van-field",{attrs:{required:"",readonly:"",clickable:"",value:e.rule.val.成本名称,name:"picker",label:"报价种类",placeholder:"报价种类"},on:{click:function(t){e.rule.show=!0}}}),a("van-popup",{attrs:{position:"bottom"},model:{value:e.rule.show,callback:function(t){e.$set(e.rule,"show",t)},expression:"rule.show"}},[a("van-picker",{attrs:{title:"报价种类","show-toolbar":"","value-key":"成本名称",columns:e.rule.list},on:{confirm:e.onConfirmRule,cancel:function(t){e.rule.show=!1}}})],1),e._l(e.eleItem,(function(t,n){return[1==t.类型?a("div",{key:n,staticClass:"van-cell van-cell--required van-field"},[a("div",{staticClass:"van-cell__title van-field__label"},[a("span",[e._v(e._s(t.名称))])]),a("div",{staticClass:"van-cell__value van-field__value"},[a("van-stepper",{attrs:{"input-width":"70%"},model:{value:e.eleVal[t.编号],callback:function(a){e.$set(e.eleVal,t.编号,a)},expression:"eleVal[item.编号]"}})],1)]):e._e(),2==t.类型&&Object.prototype.hasOwnProperty.call(e.eveSelect,t.编号)?a("div",{key:n,staticClass:"van-cell van-cell--required van-field"},[a("div",{staticClass:"van-cell__title van-field__label"},[a("span",[e._v(e._s(t.名称))])]),a("div",{staticClass:"van-cell__value van-field__value"},[a("div",{staticClass:"van-field__body"},[a("v-select",{staticClass:"select",attrs:{options:e.eveSelect[t.编号]},model:{value:e.eleVal[t.编号],callback:function(a){e.$set(e.eleVal,t.编号,a)},expression:"eleVal[item.编号]"}})],1)])]):e._e()]})),e.eleItem.length>0?[a("div",{staticClass:"van-cell van-cell--required van-field"},[e._m(0),a("div",{staticClass:"van-cell__value van-field__value"},[a("div",{staticClass:"van-field__body"},[a("v-select",{staticClass:"select",attrs:{options:e.taxArr},model:{value:e.tax,callback:function(t){e.tax=t},expression:"tax"}})],1)])]),a("div",{staticClass:"preview"},[a("van-button",{attrs:{type:"primary",size:"small"},on:{click:e.preview}},[e._v("预览")])],1)]:e._e(),e.res?a("div",{staticClass:"detail"},[a("div",{staticClass:"title"},[e._v("报价结果")]),a("div",{staticClass:"item"},[a("div",[a("div",[e._v("总价:"+e._s(Math.round(100*e.res.res)/100))]),a("div",[e._v("单价:"+e._s(e.unitPrice))]),a("div",[e._v("含税:"+e._s(e.taxPrice))]),a("div",[e._v("税率:"+e._s(e.tax.label||"0%"))])])])]):e._e(),e.res?a("div",{staticClass:"cus"},[a("div",{staticClass:"van-cell van-cell--required van-field"},[e._m(1),a("div",{staticClass:"van-cell__value van-field__value"},[a("div",{staticClass:"van-field__body"},[a("v-select",{staticClass:"select",attrs:{options:e.company},model:{value:e.companyVal,callback:function(t){e.companyVal=t},expression:"companyVal"}})],1)])]),a("van-field",{attrs:{required:"",type:"number",label:"最终报价"},model:{value:e.confirmPrice,callback:function(t){e.confirmPrice=t},expression:"confirmPrice"}}),a("van-field",{attrs:{label:"备注"},model:{value:e.remark,callback:function(t){e.remark=t},expression:"remark"}}),a("div",{staticClass:"save"},[a("van-button",{attrs:{type:"primary"},on:{click:e.save}},[e._v("保存")])],1)],1):e._e(),a("van-popup",{style:{width:"90%"},attrs:{round:"",closeable:""},model:{value:e.show,callback:function(t){e.show=t},expression:"show"}},[e.res?a("div",{staticClass:"detail"},[a("div",{staticClass:"title"},[e._v("报价详情")]),a("div",{staticClass:"item"},[a("div",[a("div",[e._v("总价:"+e._s(Math.round(100*e.res.res)/100))]),a("div",[e._v("单价:"+e._s(e.unitPrice))]),a("div",[e._v("含税:"+e._s(e.taxPrice))]),a("div",[e._v("税率:"+e._s(e.tax.label||"0%"))])]),e._l(e.res.resArr,(function(t,n){return a("div",{key:n},[a("div",[a("div",[e._v("项目:"+e._s(t.成本名称))]),a("div",[e._v(e._s(Math.round(100*t.金额)/100))])]),t.公式?a("div",[e._v(" 公式:"+e._s(t.公式)+" ")]):e._e(),t.说明?a("div",[e._v(" 说明:"+e._s(t.说明)+" ")]):e._e()])}))],2)]):e._e()])],2)},i=[function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"van-cell__title van-field__label"},[a("span",[e._v("税率")])])},function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"van-cell__title van-field__label"},[a("span",[e._v("客户")])])}],l=(a("e17f"),a("2241")),o=(a("159b"),a("b64b"),a("751a")),c={list:function(e){return o["a"].get("rule",{kind:e},!0)}},u={item:function(e){return o["a"].get("element",{item:e})}},d={erpDd:function(e){return o["a"].get("erpdd",{kind:e},!0)},company:function(){return o["a"].get("company",{},!0)}},v={compute:function(e,t){return o["a"].post("compute",{rule:e,eles:t})},add:function(e,t,a,n,s,r){var i=arguments.length>6&&void 0!==arguments[6]?arguments[6]:0;return o["a"].post("quoadd",{rule:e,cus:t,eles:a,res:n,remark:s,price:r,tax:i})}},f=a("5c1b"),h={name:"Home",data:function(){return{version:{version:""},taxArr:[],tax:null,company:[],companyVal:"",eleItem:[],eleVal:{},eveSelect:{},rule:{list:[],val:{},show:!1},jgfs:{list:[],val:{},show:!1},res:!1,confirmPrice:0,remark:"",saved:!1,show:!1,unitPrice:0}},components:{},computed:{rightTxt:function(){return this.res?"详情":""},taxPrice:function(){var e=0;return this.res&&(e=this.tax?(1+1*this.tax.code)*this.res.res:this.res.res),Math.round(100*e)/100}},methods:{onClickRight:function(){this.res&&(this.show=!0)},clear:function(){this.rule={list:[],val:{},show:!1},this.eleItem=[],this.res=!1,this.companyVal="",this.saved=!1},getTax:function(){var e=this;d.erpDd("税率").then((function(t){var a=[];t.data.list.forEach((function(e){a.push({label:e.content,code:e.BID})})),e.taxArr=a}))},getCompany:function(){var e=this;d.company().then((function(t){e.company=t.data.list}))},getJgfs:function(){var e=this;d.erpDd("报价制作类别").then((function(t){e.jgfs.list=t.data.list}))},getRuleList:function(){var e=this;this.clear(),c.list(this.jgfs.val.BID).then((function(t){e.rule.list=t.data.list}))},onConfirmJgfs:function(e,t){this.jgfs.list.length>0&&(this.jgfs.val=e,this.getRuleList()),this.jgfs.show=!1},onConfirmRule:function(e,t){this.rule.list.length>0&&(this.rule.val=e,this.getElement()),this.rule.show=!1},getElement:function(){var e=this;this.res=!1,this.companyVal="",this.saved=!1,u.item(this.rule.val.元素).then((function(t){e.eleItem=t.data.list,e.eleVal={},e.eveSelect=t.data.dd;var a={};e.eleItem.forEach((function(e){a[e.编号]=e.默认值})),e.eleVal=a}))},preview:function(){var e=this;if(Object.keys(this.eleVal).length<this.eleItem.length)l["a"].alert({title:"警告",message:"请填写完整资料"});else{var t=!1;for(var a in this.eleVal)if(""==this.eleVal[a]||0==this.eleVal[a]||null==this.eleVal[a]){t=!0;break}t||null==this.tax?l["a"].alert({title:"警告",message:"请填写完整资料"}):v.compute(this.rule.val.编号,this.eleVal).then((function(t){e.res=t.data.res,e.confirmPrice=e.taxPrice,e.unitPrice=Math.round(e.res.res/e.eleVal.Y0001*100)/100,e.saved=!1}))}},save:function(){var e=this;this.saved?l["a"].alert({title:"警告",message:"已经保存!"}):""!=this.companyVal?0!=this.res?v.add(this.rule.val.编号,this.companyVal,this.eleVal,this.res,this.remark,this.confirmPrice,this.tax.code).then((function(t){l["a"].alert({title:"提示",message:t.data.msg}),e.saved=!0})):l["a"].alert({title:"警告",message:"请先预览结果"}):l["a"].alert({title:"警告",message:"请选择客户"})}},created:function(){this.version=f,this.getJgfs(),this.getTax(),this.getCompany()}},p=h,m=(a("21bb"),a("2877")),g=Object(m["a"])(p,r,i,!1,null,null,null),_=g.exports;n["a"].use(s["a"]);var b=[{path:"/",name:"Home",component:_},{path:"/login",name:"Login",component:function(){return a.e("chunk-2d230e44").then(a.bind(null,"ede4"))}}],k=new s["a"]({mode:"history",routes:b});t["a"]=k}});
//# sourceMappingURL=app.7cd4718d.js.map