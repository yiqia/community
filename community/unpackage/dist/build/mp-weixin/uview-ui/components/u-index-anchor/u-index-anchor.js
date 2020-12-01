(global["webpackJsonp"]=global["webpackJsonp"]||[]).push([["uview-ui/components/u-index-anchor/u-index-anchor"],{"0921":function(t,n,e){"use strict";e.r(n);var u=e("3fdd"),r=e.n(u);for(var a in u)"default"!==a&&function(t){e.d(n,t,(function(){return u[t]}))}(a);n["default"]=r.a},"3fdd":function(t,n,e){"use strict";Object.defineProperty(n,"__esModule",{value:!0}),n.default=void 0;var u={name:"u-index-anchor",props:{useSlot:{type:Boolean,default:!1},index:{type:String,default:""},customStyle:{type:Object,default:function(){return{}}}},data:function(){return{active:!1,wrapperStyle:{},anchorStyle:{}}},inject:["UIndexList"],mounted:function(){this.UIndexList.children.push(this),this.UIndexList.updateData()},computed:{customAnchorStyle:function(){return Object.assign(this.anchorStyle,this.customStyle)}}};n.default=u},6705:function(t,n,e){},7468:function(t,n,e){"use strict";var u=e("6705"),r=e.n(u);r.a},b3cd:function(t,n,e){"use strict";e.r(n);var u=e("f27a"),r=e("0921");for(var a in r)"default"!==a&&function(t){e.d(n,t,(function(){return r[t]}))}(a);e("7468");var c,i=e("f0c5"),o=Object(i["a"])(r["default"],u["b"],u["c"],!1,null,"2768f8ba",null,!1,u["a"],c);n["default"]=o.exports},f27a:function(t,n,e){"use strict";var u,r=function(){var t=this,n=t.$createElement,e=(t._self._c,t.__get_style([t.wrapperStyle])),u=t.$u.guid(),r=t.__get_style([t.customAnchorStyle]);t.$mp.data=Object.assign({},{$root:{s0:e,g0:u,s1:r}})},a=[];e.d(n,"b",(function(){return r})),e.d(n,"c",(function(){return a})),e.d(n,"a",(function(){return u}))}}]);
;(global["webpackJsonp"] = global["webpackJsonp"] || []).push([
    'uview-ui/components/u-index-anchor/u-index-anchor-create-component',
    {
        'uview-ui/components/u-index-anchor/u-index-anchor-create-component':(function(module, exports, __webpack_require__){
            __webpack_require__('543d')['createComponent'](__webpack_require__("b3cd"))
        })
    },
    [['uview-ui/components/u-index-anchor/u-index-anchor-create-component']]
]);
