"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[1831],{1831:(t,a,s)=>{s.r(a),s.d(a,{default:()=>r});const e={props:["user"],components:{},data:function(){return{contracts:[],datas:[],filters:{symbol:{value:"",keys:["symbol"]}},currentPage:1,totalPages:0}},methods:{goBack:function(){window.history.length>1?this.$router.go(-1):this.$router.push("/")},fetchData:function(){var t=this;this.$http.post("/user/fetch/binary/practice/contracts").then((function(a){t.contracts=a.data.contracts,t.datas=a.data.datas}))}},created:function(){this.fetchData()},mounted:function(){},destroyed:function(){}};const r=(0,s(1900).Z)(e,(function(){var t=this,a=t.$createElement,s=t._self._c||a;return s("div",[s("div",{staticClass:"row",attrs:{id:"table-hover-row"}},[s("div",{staticClass:"col-12"},[s("div",{staticClass:"card"},[s("div",{staticClass:"card-header"},[s("h4",{staticClass:"card-title"},[t._v("\n                        Binary Practice Contracts Log\n                    ")]),t._v(" "),s("div",{staticClass:"input-group w-50"},[s("span",{staticClass:"input-group-text",attrs:{id:"symbol-search"}},[t._v("Symbol")]),t._v(" "),s("input",{directives:[{name:"model",rawName:"v-model",value:t.filters.symbol.value,expression:"filters.symbol.value"}],staticClass:"form-control",domProps:{value:t.filters.symbol.value},on:{input:function(a){a.target.composing||t.$set(t.filters.symbol,"value",a.target.value)}}})])]),t._v(" "),s("div",{staticClass:"table-responsive"},[s("v-table",{staticClass:"table table-hover",attrs:{data:t.contracts,filters:t.filters,hideSortIcons:!0,currentPage:t.currentPage,pageSize:10},on:{"update:currentPage":function(a){t.currentPage=a},"update:current-page":function(a){t.currentPage=a},totalPagesChanged:function(a){t.totalPages=a}},scopedSlots:t._u([{key:"body",fn:function(a){var e=a.displayData;return s("tbody",{},[null!=t.contracts?t._l(e,(function(a){return s("tr",{key:a.id},[s("td",{attrs:{"data-label":"Symbol"}},[t._v("\n                                        "+t._s(a.symbol)+"/"+t._s(a.pair)+"\n                                    ")]),t._v(" "),s("td",{attrs:{"data-label":"Amount"}},[t._v("\n                                        "+t._s(t._f("toMoney")(a.amount))+"\n                                        "+t._s(a.pair)+"\n                                    ")]),t._v(" "),s("td",{attrs:{"data-label":"Profit"}},[1==a.result?s("span",{staticClass:"badge bg-success"},[t._v(t._s(t._f("toMoney")(a.margin))+"\n                                            "+t._s(a.pair))]):2==a.result?s("span",{staticClass:"badge bg-danger"},[t._v("-\n                                            "+t._s(t._f("toMoney")(a.amount))+"\n                                            "+t._s(a.pair))]):3==a.result?s("span",{staticClass:"badge bg-warning"},[t._v("0")]):s("span",{staticClass:"badge bg-warning"},[t._v("Pending")])]),t._v(" "),s("td",{attrs:{"data-label":"High/Low"}},[1==a.hilow?s("span",{staticClass:"badge bg-success"},[t._v("Rise")]):2==a.hilow?s("span",{staticClass:"badge bg-danger"},[t._v("Fall")]):t._e()]),t._v(" "),s("td",{attrs:{"data-label":"Result"}},[1==a.result?s("span",{staticClass:"badge bg-success"},[t._v("Win")]):2==a.result?s("span",{staticClass:"badge bg-danger"},[t._v("Lose")]):3==a.result?s("span",{staticClass:"badge bg-warning"},[t._v("Draw")]):s("span",{staticClass:"badge bg-warning"},[t._v("Pending")])]),t._v(" "),s("td",{attrs:{"data-label":"Status"}},[0==a.status?s("span",{staticClass:"badge bg-primary"},[t._v("Running")]):1==a.status?s("span",{staticClass:"badge bg-success"},[t._v("Complete")]):t._e()]),t._v(" "),s("td",{attrs:{"data-label":"Date"}},[t._v("\n                                        "+t._s(t._f("moment")(a.created_at,"dddd, MMMM Do YYYY"))+"\n                                    ")]),t._v(" "),null!=a.result?[t.datas[t.user.id][a.id]?s("td",[s("a",{staticClass:"btn btn-icon btn-sm btn-outline-info",attrs:{href:"user/binary/practice/contract/log/preview/"+a.id}},[s("i",{staticClass:"bi bi-info-lg"})])]):s("td",[s("span",{staticClass:"badge bg-danger",attrs:{"data-bs-toggle":"tooltip","data-bs-placement":"top",title:"Contract chart data was lost because you closed the trade page before it complete"}},[t._v("Not Data Recorded")])])]:t._e()],2)})):[s("tr",[s("td",{attrs:{colspan:"100%"}},[t._v("\n                                        No results found!\n                                    ")])])]],2)}}])},[s("thead",{attrs:{slot:"head"},slot:"head"},[s("tr",[s("v-th",{attrs:{sortKey:"symbol",scope:"col"}},[t._v("Symbol")]),t._v(" "),s("v-th",{attrs:{sortKey:"amount",scope:"col"}},[t._v("Amount")]),t._v(" "),s("v-th",{attrs:{sortKey:"margin",scope:"col"}},[t._v("Profit")]),t._v(" "),s("v-th",{attrs:{sortKey:"hilow",scope:"col"}},[t._v("Rise/Fall")]),t._v(" "),s("v-th",{attrs:{sortKey:"result",scope:"col"}},[t._v("Result")]),t._v(" "),s("v-th",{attrs:{sortKey:"status",scope:"col"}},[t._v("Status")]),t._v(" "),s("v-th",{attrs:{sortKey:"created_at",scope:"col"}},[t._v("Date")]),t._v(" "),s("th",{attrs:{scope:"col"}},[t._v("Action")])],1)])])],1),t._v(" "),s("div",{staticClass:"card-footer ms-auto pb-0"},[s("smart-pagination",{attrs:{currentPage:t.currentPage,totalPages:t.totalPages},on:{"update:currentPage":function(a){t.currentPage=a},"update:current-page":function(a){t.currentPage=a}}})],1)])])])])}),[],!1,null,null,null).exports}}]);