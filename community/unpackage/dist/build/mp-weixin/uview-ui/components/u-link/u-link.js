(global["webpackJsonp"]=global["webpackJsonp"]||[]).push([["uview-ui/components/u-link/u-link"],{"1c53":function(t,n,e){"use strict";(function(t){Object.defineProperty(n,"__esModule",{value:!0}),n.default=void 0;var e={name:"u-link",props:{color:{type:String,default:"#2979ff"},fontSize:{type:[String,Number],default:28},underLine:{type:Boolean,default:!1},href:{type:String,default:""},mpTips:{type:String,default:"链接已复制，请在浏览器打开"},lineColor:{type:String,default:""}},methods:{openLink:function(){var n=this;t.setClipboardData({data:this.href,success:function(){t.hideToast()}}),this.$nextTick((function(){n.$u.toast(n.mpTips)}))}}};n.default=e}).call(this,e("543d")["default"])},2972:function(t,n,e){"use strict";var u=e("e50b"),i=e.n(u);i.a},3146:function(t,n,e){"use strict";e.r(n);var u=e("1c53"),i=e.n(u);for(var r in u)"default"!==r&&function(t){e.d(n,t,(function(){return u[t]}))}(r);n["default"]=i.a},4155:function(t,n,e){"use strict";e.r(n);var u=e("6d67"),i=e("3146");for(var r in i)"default"!==r&&function(t){e.d(n,t,(function(){return i[t]}))}(r);e("2972");var a,o=e("f0c5"),f=Object(o["a"])(i["default"],u["b"],u["c"],!1,null,"27d2d060",null,!1,u["a"],a);n["default"]=f.exports},"6d67":function(t,n,e){"use strict";var u,i=function(){var t=this,n=t.$createElement;t._self._c},r=[];e.d(n,"b",(function(){return i})),e.d(n,"c",(function(){return r})),e.d(n,"a",(function(){return u}))},e50b:function(t,n,e){}}]);
;(global["webpackJsonp"] = global["webpackJsonp"] || []).push([
    'uview-ui/components/u-link/u-link-create-component',
    {
        'uview-ui/components/u-link/u-link-create-component':(function(module, exports, __webpack_require__){
            __webpack_require__('543d')['createComponent'](__webpack_require__("4155"))
        })
    },
    [['uview-ui/components/u-link/u-link-create-component']]
]);
