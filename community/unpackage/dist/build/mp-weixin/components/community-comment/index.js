(global["webpackJsonp"]=global["webpackJsonp"]||[]).push([["components/community-comment/index"],{"5ee14":function(n,t,e){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),t.default=void 0;var o=function(){e.e("components/user-row/index").then(function(){return resolve(e("d9bb"))}.bind(null,e)).catch(e.oe)},u=function(){e.e("components/comment-input/comment-input").then(function(){return resolve(e("5462"))}.bind(null,e)).catch(e.oe)},c={data:function(){return{isShow:!1}},props:["show"],components:{userRow:o,commentInput:u},watch:{show:function(){this.isShow=this.show}},methods:{close:function(){this.$emit("close",this.isShow)}},mounted:function(){}};t.default=c},"63e3":function(n,t,e){"use strict";var o={uPopup:function(){return e.e("uview-ui/components/u-popup/u-popup").then(e.bind(null,"4492"))},commentInput:function(){return e.e("components/comment-input/comment-input").then(e.bind(null,"5462"))}},u=function(){var n=this,t=n.$createElement;n._self._c},c=[];e.d(t,"b",(function(){return u})),e.d(t,"c",(function(){return c})),e.d(t,"a",(function(){return o}))},abc2:function(n,t,e){"use strict";e.r(t);var o=e("5ee14"),u=e.n(o);for(var c in o)"default"!==c&&function(n){e.d(t,n,(function(){return o[n]}))}(c);t["default"]=u.a},b6c9:function(n,t,e){"use strict";e.r(t);var o=e("63e3"),u=e("abc2");for(var c in u)"default"!==c&&function(n){e.d(t,n,(function(){return u[n]}))}(c);var i,r=e("f0c5"),s=Object(r["a"])(u["default"],o["b"],o["c"],!1,null,null,null,!1,o["a"],i);t["default"]=s.exports}}]);
;(global["webpackJsonp"] = global["webpackJsonp"] || []).push([
    'components/community-comment/index-create-component',
    {
        'components/community-comment/index-create-component':(function(module, exports, __webpack_require__){
            __webpack_require__('543d')['createComponent'](__webpack_require__("b6c9"))
        })
    },
    [['components/community-comment/index-create-component']]
]);
