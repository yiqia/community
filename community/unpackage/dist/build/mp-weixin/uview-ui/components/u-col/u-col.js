(global["webpackJsonp"]=global["webpackJsonp"]||[]).push([["uview-ui/components/u-col/u-col"],{"0828":function(t,n,e){"use strict";var u;e.d(n,"b",(function(){return i})),e.d(n,"c",(function(){return f})),e.d(n,"a",(function(){return u}));var i=function(){var t=this,n=t.$createElement,e=(t._self._c,Number(t.gutter));t.$mp.data=Object.assign({},{$root:{m0:e}})},f=[]},"932d":function(t,n,e){"use strict";e.r(n);var u=e("0828"),i=e("df29");for(var f in i)"default"!==f&&function(t){e.d(n,t,(function(){return i[t]}))}(f);e("a6fe");var r,a=e("f0c5"),s=Object(a["a"])(i["default"],u["b"],u["c"],!1,null,null,null,!1,u["a"],r);n["default"]=s.exports},a6fe:function(t,n,e){"use strict";var u=e("f796"),i=e.n(u);i.a},a84a:function(t,n,e){"use strict";Object.defineProperty(n,"__esModule",{value:!0}),n.default=void 0;var u={name:"u-col",props:{span:{type:[Number,String],default:12},offset:{type:[Number,String],default:0},justify:{type:String,default:"start"},align:{type:String,default:"center"}},inject:["gutter"],computed:{uJustify:function(){return"end"==this.justify||"start"==this.justify?"flex-"+this.justify:"around"==this.justify||"between"==this.justify?"space-"+this.justify:this.justify},uAlignItem:function(){return"top"==this.align?"flex-start":"bottom"==this.align?"flex-end":this.align}},methods:{click:function(){this.$emit("click")}}};n.default=u},df29:function(t,n,e){"use strict";e.r(n);var u=e("a84a"),i=e.n(u);for(var f in u)"default"!==f&&function(t){e.d(n,t,(function(){return u[t]}))}(f);n["default"]=i.a},f796:function(t,n,e){}}]);
;(global["webpackJsonp"] = global["webpackJsonp"] || []).push([
    'uview-ui/components/u-col/u-col-create-component',
    {
        'uview-ui/components/u-col/u-col-create-component':(function(module, exports, __webpack_require__){
            __webpack_require__('543d')['createComponent'](__webpack_require__("932d"))
        })
    },
    [['uview-ui/components/u-col/u-col-create-component']]
]);
