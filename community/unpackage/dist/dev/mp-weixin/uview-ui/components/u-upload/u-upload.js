(global["webpackJsonp"] = global["webpackJsonp"] || []).push([["uview-ui/components/u-upload/u-upload"],{

/***/ 200:
/*!******************************************************************!*\
  !*** D:/源码/小程序源码/新朋友圈/uview-ui/components/u-upload/u-upload.vue ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _u_upload_vue_vue_type_template_id_0d33af60_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./u-upload.vue?vue&type=template&id=0d33af60&scoped=true& */ 201);
/* harmony import */ var _u_upload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./u-upload.vue?vue&type=script&lang=js& */ 203);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _u_upload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _u_upload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__[key]; }) }(__WEBPACK_IMPORT_KEY__));
/* harmony import */ var _u_upload_vue_vue_type_style_index_0_id_0d33af60_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./u-upload.vue?vue&type=style&index=0&id=0d33af60&lang=scss&scoped=true& */ 205);
/* harmony import */ var _HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib/runtime/componentNormalizer.js */ 10);

var renderjs





/* normalize component */

var component = Object(_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _u_upload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _u_upload_vue_vue_type_template_id_0d33af60_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _u_upload_vue_vue_type_template_id_0d33af60_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "0d33af60",
  null,
  false,
  _u_upload_vue_vue_type_template_id_0d33af60_scoped_true___WEBPACK_IMPORTED_MODULE_0__["components"],
  renderjs
)

component.options.__file = "uview-ui/components/u-upload/u-upload.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ 201:
/*!*************************************************************************************************************!*\
  !*** D:/源码/小程序源码/新朋友圈/uview-ui/components/u-upload/u-upload.vue?vue&type=template&id=0d33af60&scoped=true& ***!
  \*************************************************************************************************************/
/*! exports provided: render, staticRenderFns, recyclableRender, components */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_16_0_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_template_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_uni_app_loader_page_meta_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_template_id_0d33af60_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--16-0!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/webpack-uni-mp-loader/lib/template.js!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-uni-app-loader/page-meta.js!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib??vue-loader-options!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/webpack-uni-mp-loader/lib/style.js!./u-upload.vue?vue&type=template&id=0d33af60&scoped=true& */ 202);
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_16_0_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_template_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_uni_app_loader_page_meta_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_template_id_0d33af60_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_16_0_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_template_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_uni_app_loader_page_meta_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_template_id_0d33af60_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "recyclableRender", function() { return _HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_16_0_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_template_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_uni_app_loader_page_meta_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_template_id_0d33af60_scoped_true___WEBPACK_IMPORTED_MODULE_0__["recyclableRender"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "components", function() { return _HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_16_0_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_template_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_uni_app_loader_page_meta_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_template_id_0d33af60_scoped_true___WEBPACK_IMPORTED_MODULE_0__["components"]; });



/***/ }),

/***/ 202:
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--16-0!./node_modules/@dcloudio/webpack-uni-mp-loader/lib/template.js!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-uni-app-loader/page-meta.js!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib??vue-loader-options!./node_modules/@dcloudio/webpack-uni-mp-loader/lib/style.js!D:/源码/小程序源码/新朋友圈/uview-ui/components/u-upload/u-upload.vue?vue&type=template&id=0d33af60&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns, recyclableRender, components */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "recyclableRender", function() { return recyclableRender; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "components", function() { return components; });
var components = {
  uIcon: function() {
    return __webpack_require__.e(/*! import() | uview-ui/components/u-icon/u-icon */ "uview-ui/components/u-icon/u-icon").then(__webpack_require__.bind(null, /*! @/uview-ui/components/u-icon/u-icon.vue */ 231))
  },
  uLineProgress: function() {
    return __webpack_require__.e(/*! import() | uview-ui/components/u-line-progress/u-line-progress */ "uview-ui/components/u-line-progress/u-line-progress").then(__webpack_require__.bind(null, /*! @/uview-ui/components/u-line-progress/u-line-progress.vue */ 297))
  }
}
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
}
var recyclableRender = false
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ 203:
/*!*******************************************************************************************!*\
  !*** D:/源码/小程序源码/新朋友圈/uview-ui/components/u-upload/u-upload.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _HBuilderX_plugins_uniapp_cli_node_modules_babel_loader_lib_index_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_12_1_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_script_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/babel-loader/lib!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--12-1!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/webpack-uni-mp-loader/lib/script.js!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib??vue-loader-options!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/webpack-uni-mp-loader/lib/style.js!./u-upload.vue?vue&type=script&lang=js& */ 204);
/* harmony import */ var _HBuilderX_plugins_uniapp_cli_node_modules_babel_loader_lib_index_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_12_1_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_script_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_HBuilderX_plugins_uniapp_cli_node_modules_babel_loader_lib_index_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_12_1_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_script_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _HBuilderX_plugins_uniapp_cli_node_modules_babel_loader_lib_index_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_12_1_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_script_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _HBuilderX_plugins_uniapp_cli_node_modules_babel_loader_lib_index_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_12_1_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_script_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_HBuilderX_plugins_uniapp_cli_node_modules_babel_loader_lib_index_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_12_1_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_script_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ 204:
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--12-1!./node_modules/@dcloudio/webpack-uni-mp-loader/lib/script.js!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib??vue-loader-options!./node_modules/@dcloudio/webpack-uni-mp-loader/lib/style.js!D:/源码/小程序源码/新朋友圈/uview-ui/components/u-upload/u-upload.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(uni) {Object.defineProperty(exports, "__esModule", { value: true });exports.default = void 0;var _regenerator = _interopRequireDefault(__webpack_require__(/*! ./node_modules/@vue/babel-preset-app/node_modules/@babel/runtime/regenerator */ 46));function _interopRequireDefault(obj) {return obj && obj.__esModule ? obj : { default: obj };}function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) {try {var info = gen[key](arg);var value = info.value;} catch (error) {reject(error);return;}if (info.done) {resolve(value);} else {Promise.resolve(value).then(_next, _throw);}}function _asyncToGenerator(fn) {return function () {var self = this,args = arguments;return new Promise(function (resolve, reject) {var gen = fn.apply(self, args);function _next(value) {asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value);}function _throw(err) {asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err);}_next(undefined);});};} //
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/**
 * upload 图片上传
 * @description 该组件用于上传图片场景
 * @tutorial https://www.uviewui.com/components/upload.html
 * @property {String} action 服务器上传地址
 * @property {String Number} max-count 最大选择图片的数量（默认99）
 * @property {Boolean} custom-btn 如果需要自定义选择图片的按钮，设置为true（默认false）
 * @property {Boolean} show-progress 是否显示进度条（默认true）
 * @property {Boolean} disabled 是否启用(显示/移仓)组件（默认false）
 * @property {String} image-mode 预览图片等显示模式，可选值为uni的image的mode属性值（默认aspectFill）
 * @property {String} del-icon 右上角删除图标名称，只能为uView内置图标
 * @property {String} del-bg-color 右上角关闭按钮的背景颜色
 * @property {String} del-color 右上角关闭按钮图标的颜色
 * @property {Object} header 上传携带的头信息，对象形式
 * @property {Object} form-data 上传额外携带的参数
 * @property {String} name 上传文件的字段名，供后端获取使用（默认file）
 * @property {Array<String>} size-type original 原图，compressed 压缩图，默认二者都有（默认['original', 'compressed']）
 * @property {Array<String>} source-type 选择图片的来源，album-从相册选图，camera-使用相机，默认二者都有（默认['album', 'camera']）
 * @property {Boolean} preview-full-image	是否可以通过uni.previewImage预览已选择的图片（默认true）
 * @property {Boolean} multiple	是否开启图片多选，部分安卓机型不支持（默认true）
 * @property {Boolean} deletable 是否显示删除图片的按钮（默认true）
 * @property {String Number} max-size 选择单个文件的最大大小，单位B(byte)，默认不限制（默认Number.MAX_VALUE）
 * @property {Array<Object>} file-list 默认显示的图片列表，数组元素为对象，必须提供url属性
 * @property {Boolean} upload-text 选择图片按钮的提示文字（默认“选择图片”）
 * @property {Boolean} auto-upload 选择完图片是否自动上传，见上方说明（默认true）
 * @property {Boolean} show-tips 特殊情况下是否自动提示toast，见上方说明（默认true）
 * @property {Boolean} show-upload-list 是否显示组件内部的图片预览（默认true）
 * @event {Function} on-oversize 图片大小超出最大允许大小
 * @event {Function} on-preview 全屏预览图片时触发
 * @event {Function} on-remove 移除图片时触发
 * @event {Function} on-success 图片上传成功时触发
 * @event {Function} on-change 图片上传后，无论成功或者失败都会触发
 * @event {Function} on-error 图片上传失败时触发
 * @event {Function} on-progress 图片上传过程中的进度变化过程触发
 * @event {Function} on-uploaded 所有图片上传完毕触发
 * @event {Function} on-choose-complete 每次选择图片后触发，只是让外部可以得知每次选择后，内部的文件列表
 * @example <u-upload :action="action" :file-list="fileList" ></u-upload>
 */var _default2 =
{
  name: 'u-upload',
  props: {
    //是否显示组件自带的图片预览功能
    showUploadList: {
      type: Boolean,
      default: true },

    // 后端地址
    action: {
      type: String,
      default: '' },

    // 最大上传数量
    maxCount: {
      type: [String, Number],
      default: 52 },

    //  是否显示进度条
    showProgress: {
      type: Boolean,
      default: true },

    // 是否启用
    disabled: {
      type: Boolean,
      default: false },

    // 预览上传的图片时的裁剪模式，和image组件mode属性一致
    imageMode: {
      type: String,
      default: 'aspectFill' },

    // 头部信息
    header: {
      type: Object,
      default: function _default() {
        return {};
      } },

    // 额外携带的参数
    formData: {
      type: Object,
      default: function _default() {
        return {};
      } },

    // 上传的文件字段名
    name: {
      type: String,
      default: 'file' },

    // 所选的图片的尺寸, 可选值为original compressed
    sizeType: {
      type: Array,
      default: function _default() {
        return ['original', 'compressed'];
      } },

    sourceType: {
      type: Array,
      default: function _default() {
        return ['album', 'camera'];
      } },

    // 是否在点击预览图后展示全屏图片预览
    previewFullImage: {
      type: Boolean,
      default: true },

    // 是否开启图片多选，部分安卓机型不支持
    multiple: {
      type: Boolean,
      default: true },

    // 是否展示删除按钮
    deletable: {
      type: Boolean,
      default: true },

    // 文件大小限制，单位为byte
    maxSize: {
      type: [String, Number],
      default: Number.MAX_VALUE },

    // 显示已上传的文件列表
    fileList: {
      type: Array,
      default: function _default() {
        return [];
      } },

    // 上传区域的提示文字
    uploadText: {
      type: String,
      default: '选择图片' },

    // 是否自动上传
    autoUpload: {
      type: Boolean,
      default: true },

    // 是否显示toast消息提示
    showTips: {
      type: Boolean,
      default: true },

    // 是否通过slot自定义传入选择图标的按钮
    customBtn: {
      type: Boolean,
      default: false },

    // 内部预览图片区域和选择图片按钮的区域宽度，高等于宽
    width: {
      type: [String, Number],
      default: 200 },

    // 右上角关闭按钮的背景颜色
    delBgColor: {
      type: String,
      default: '#fa3534' },

    // 右上角关闭按钮的叉号图标的颜色
    delColor: {
      type: String,
      default: '#ffffff' },

    // 右上角删除图标名称，只能为uView内置图标
    delIcon: {
      type: String,
      default: 'close' },

    // 如果上传后的返回值为json字符串，是否自动转json
    toJson: {
      type: Boolean,
      default: true },

    // 上传前的钩子，每个文件上传前都会执行
    beforeUpload: {
      type: Function,
      default: null } },


  mounted: function mounted() {},
  data: function data() {
    return {
      lists: [],
      isInCount: true,
      uploading: false };

  },
  watch: {
    fileList: {
      immediate: true,
      handler: function handler(val) {var _this = this;
        val.map(function (value) {
          // 首先检查内部是否已经添加过这张图片，因为外部绑定了一个对象给fileList的话(对象引用)，进行修改外部fileList
          // 时，会触发watch，导致重新把原来的图片再次添加到this.lists
          // 数组的some方法意思是，只要数组元素有任意一个元素条件符合，就返回true，而另一个数组的every方法的意思是数组所有元素都符合条件才返回true
          var tmp = _this.lists.some(function (val) {
            return val.url == value.url;
          });
          // 如果内部没有这个图片(tmp为false)，则添加到内部
          !tmp && _this.lists.push({ url: value.url, error: false, progress: 100 });
        });
      } },

    // 监听lists的变化，发出事件
    lists: function lists(n) {
      this.$emit('on-list-change', n);
    } },

  methods: {
    // 清除列表
    clear: function clear() {
      this.lists = [];
    },
    // 重新上传队列中上传失败的所有文件
    reUpload: function reUpload() {
      this.uploadFile();
    },
    // 选择图片
    selectFile: function selectFile() {var _this2 = this;
      if (this.disabled) return;var _this$name =
      this.name,name = _this$name === void 0 ? '' : _this$name,maxCount = this.maxCount,multiple = this.multiple,maxSize = this.maxSize,sizeType = this.sizeType,lists = this.lists,camera = this.camera,compressed = this.compressed,maxDuration = this.maxDuration,sourceType = this.sourceType;
      var chooseFile = null;
      var newMaxCount = maxCount - lists.length;
      // 设置为只选择图片的时候使用 chooseImage 来实现
      chooseFile = new Promise(function (resolve, reject) {
        uni.chooseImage({
          count: multiple ? newMaxCount > 9 ? 9 : newMaxCount : 1,
          sourceType: sourceType,
          sizeType: sizeType,
          success: resolve,
          fail: reject });

      });
      chooseFile.
      then(function (res) {
        var file = null;
        var listOldLength = _this2.lists.length;
        res.tempFiles.map(function (val, index) {
          // 如果是非多选，index大于等于1或者超出最大限制数量时，不处理
          if (!multiple && index >= 1) return;
          if (val.size > maxSize) {
            _this2.$emit('on-oversize', val, _this2.lists);
            _this2.showToast('超出允许的文件大小');
          } else {
            if (maxCount <= lists.length) {
              _this2.$emit('on-exceed', val, _this2.lists);
              _this2.showToast('超出最大允许的文件个数');
              return;
            }
            lists.push({
              url: val.path,
              progress: 0,
              error: false });

          }
        });
        // 每次图片选择完，抛出一个事件，并将当前内部选择的图片数组抛出去
        _this2.$emit('on-choose-complete', _this2.lists);
        if (_this2.autoUpload) _this2.uploadFile(listOldLength);
      }).
      catch(function (error) {
        // this.$emit('on-error', error);
      });
    },
    // 提示用户消息
    showToast: function showToast(message) {var force = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      if (this.showTips || force) {
        uni.showToast({
          title: message,
          icon: 'none' });

      }
    },
    // 该方法供用户通过ref调用，手动上传
    upload: function upload() {
      this.uploadFile();
    },
    // 对失败的图片重新上传
    retry: function retry(index) {
      this.lists[index].progress = 0;
      this.lists[index].error = false;
      this.lists[index].response = null;
      uni.showLoading({
        title: '重新上传' });

      this.uploadFile(index);
    },
    // 上传图片
    uploadFile: function uploadFile() {var _arguments = arguments,_this3 = this;return _asyncToGenerator( /*#__PURE__*/_regenerator.default.mark(function _callee() {var index, beforeResponse, task;return _regenerator.default.wrap(function _callee$(_context) {while (1) {switch (_context.prev = _context.next) {case 0:index = _arguments.length > 0 && _arguments[0] !== undefined ? _arguments[0] : 0;if (!
                _this3.disabled) {_context.next = 3;break;}return _context.abrupt("return");case 3:if (!
                _this3.uploading) {_context.next = 5;break;}return _context.abrupt("return");case 5:if (!(

                index >= _this3.lists.length)) {_context.next = 8;break;}
                _this3.$emit('on-uploaded', _this3.lists);return _context.abrupt("return");case 8:if (



                _this3.action) {_context.next = 11;break;}
                _this3.showToast('请配置上传地址', true);return _context.abrupt("return");case 11:if (!(



                _this3.lists[index].progress == 100)) {_context.next = 14;break;}
                if (_this3.autoUpload == false) _this3.uploadFile(index + 1);return _context.abrupt("return");case 14:if (!(



                _this3.beforeUpload && typeof _this3.beforeUpload === 'function')) {_context.next = 23;break;}
                // 执行回调，同时传入索引和文件列表当作参数
                beforeResponse = _this3.beforeUpload(index, _this3.lists);
                // 判断是否返回了promise
                if (!(!!beforeResponse && typeof beforeResponse.then === 'function')) {_context.next = 21;break;}_context.next = 19;return (
                  beforeResponse.then(function (res) {
                    // promise返回成功，不进行动作，继续上传
                  }).catch(function (err) {
                    // 进入catch回调的话，继续下一张
                    return _this3.uploadFile(index + 1);
                  }));case 19:_context.next = 23;break;case 21:if (!(
                beforeResponse === false)) {_context.next = 23;break;}return _context.abrupt("return",

                _this3.uploadFile(index + 1));case 23:


                _this3.lists[index].error = false;
                _this3.uploading = true;
                // 创建上传对象
                task = uni.uploadFile({
                  url: _this3.action,
                  filePath: _this3.lists[index].url,
                  name: _this3.name,
                  formData: _this3.formData,
                  header: _this3.header,
                  success: function success(res) {
                    // 判断是否json字符串，将其转为json格式
                    var data = _this3.toJson && _this3.$u.test.jsonString(res.data) ? JSON.parse(res.data) : res.data;
                    if (![200, 201].includes(res.statusCode)) {
                      _this3.uploadError(index, data);
                    } else {
                      // 上传成功
                      _this3.lists[index].response = data;
                      _this3.lists[index].progress = 100;
                      _this3.lists[index].error = false;
                      _this3.$emit('on-success', data, index, _this3.lists);
                    }
                  },
                  fail: function fail(e) {
                    _this3.uploadError(index, e);
                  },
                  complete: function complete(res) {
                    uni.hideLoading();
                    _this3.uploading = false;
                    _this3.uploadFile(index + 1);
                    _this3.$emit('on-change', res, index, _this3.lists);
                  } });

                task.onProgressUpdate(function (res) {
                  if (res.progress > 0) {
                    _this3.lists[index].progress = res.progress;
                    _this3.$emit('on-progress', res, index, _this3.lists);
                  }
                });case 27:case "end":return _context.stop();}}}, _callee);}))();
    },
    // 上传失败
    uploadError: function uploadError(index, err) {
      this.lists[index].progress = 0;
      this.lists[index].error = true;
      this.lists[index].response = null;
      this.$emit('on-error', err, index, this.lists);
      this.showToast('上传失败，请重试');
    },
    // 删除一个图片
    deleteItem: function deleteItem(index) {var _this4 = this;
      uni.showModal({
        title: '提示',
        content: '您确定要删除此项吗？',
        success: function success(res) {
          if (res.confirm) {
            if (_this4.lists[index].process < 100 && _this4.lists[index].process > 0) {
              typeof _this4.lists[index].uploadTask != 'undefined' && _this4.lists[index].uploadTask.abort();
            }
            _this4.lists.splice(index, 1);
            _this4.$forceUpdate();
            _this4.$emit('on-remove', index, _this4.lists);
            _this4.showToast('移除成功');
          }
        } });

    },
    // 用户通过ref手动的形式，移除一张图片
    remove: function remove(index) {
      // 判断索引的合法范围
      if (index >= 0 && index < this.lists.length) {
        this.lists.splice(index, 1);
        this.$emit('on-list-change', this.lists);
      }
    },
    // 预览图片
    doPreviewImage: function doPreviewImage(url, index) {var _this5 = this;
      if (!this.previewFullImage) return;
      var images = this.lists.map(function (item) {return item.url || item.path;});
      uni.previewImage({
        urls: images,
        current: url,
        success: function success() {
          _this5.$emit('on-preview', url, _this5.lists);
        },
        fail: function fail() {
          uni.showToast({
            title: '预览图片失败',
            icon: 'none' });

        } });

    } } };exports.default = _default2;
/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./node_modules/@dcloudio/uni-mp-weixin/dist/index.js */ 1)["default"]))

/***/ }),

/***/ 205:
/*!****************************************************************************************************************************!*\
  !*** D:/源码/小程序源码/新朋友圈/uview-ui/components/u-upload/u-upload.vue?vue&type=style&index=0&id=0d33af60&lang=scss&scoped=true& ***!
  \****************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _HBuilderX_plugins_uniapp_cli_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_HBuilderX_plugins_uniapp_cli_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_stylePostLoader_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_8_oneOf_1_2_HBuilderX_plugins_uniapp_cli_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_3_HBuilderX_plugins_uniapp_cli_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_4_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_8_oneOf_1_5_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_style_index_0_id_0d33af60_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/mini-css-extract-plugin/dist/loader.js??ref--8-oneOf-1-0!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/css-loader/dist/cjs.js??ref--8-oneOf-1-1!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib/loaders/stylePostLoader.js!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--8-oneOf-1-2!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/postcss-loader/src??ref--8-oneOf-1-3!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/sass-loader/dist/cjs.js??ref--8-oneOf-1-4!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--8-oneOf-1-5!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib??vue-loader-options!../../../../../../安装包/HBuilderX/plugins/uniapp-cli/node_modules/@dcloudio/webpack-uni-mp-loader/lib/style.js!./u-upload.vue?vue&type=style&index=0&id=0d33af60&lang=scss&scoped=true& */ 206);
/* harmony import */ var _HBuilderX_plugins_uniapp_cli_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_HBuilderX_plugins_uniapp_cli_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_stylePostLoader_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_8_oneOf_1_2_HBuilderX_plugins_uniapp_cli_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_3_HBuilderX_plugins_uniapp_cli_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_4_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_8_oneOf_1_5_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_style_index_0_id_0d33af60_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_HBuilderX_plugins_uniapp_cli_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_HBuilderX_plugins_uniapp_cli_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_stylePostLoader_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_8_oneOf_1_2_HBuilderX_plugins_uniapp_cli_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_3_HBuilderX_plugins_uniapp_cli_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_4_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_8_oneOf_1_5_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_style_index_0_id_0d33af60_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _HBuilderX_plugins_uniapp_cli_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_HBuilderX_plugins_uniapp_cli_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_stylePostLoader_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_8_oneOf_1_2_HBuilderX_plugins_uniapp_cli_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_3_HBuilderX_plugins_uniapp_cli_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_4_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_8_oneOf_1_5_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_style_index_0_id_0d33af60_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _HBuilderX_plugins_uniapp_cli_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_HBuilderX_plugins_uniapp_cli_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_stylePostLoader_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_8_oneOf_1_2_HBuilderX_plugins_uniapp_cli_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_3_HBuilderX_plugins_uniapp_cli_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_4_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_8_oneOf_1_5_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_style_index_0_id_0d33af60_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_HBuilderX_plugins_uniapp_cli_node_modules_mini_css_extract_plugin_dist_loader_js_ref_8_oneOf_1_0_HBuilderX_plugins_uniapp_cli_node_modules_css_loader_dist_cjs_js_ref_8_oneOf_1_1_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_loaders_stylePostLoader_js_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_8_oneOf_1_2_HBuilderX_plugins_uniapp_cli_node_modules_postcss_loader_src_index_js_ref_8_oneOf_1_3_HBuilderX_plugins_uniapp_cli_node_modules_sass_loader_dist_cjs_js_ref_8_oneOf_1_4_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_webpack_preprocess_loader_index_js_ref_8_oneOf_1_5_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_vue_cli_plugin_uni_packages_vue_loader_lib_index_js_vue_loader_options_HBuilderX_plugins_uniapp_cli_node_modules_dcloudio_webpack_uni_mp_loader_lib_style_js_u_upload_vue_vue_type_style_index_0_id_0d33af60_lang_scss_scoped_true___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ 206:
/*!******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/mini-css-extract-plugin/dist/loader.js??ref--8-oneOf-1-0!./node_modules/css-loader/dist/cjs.js??ref--8-oneOf-1-1!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--8-oneOf-1-2!./node_modules/postcss-loader/src??ref--8-oneOf-1-3!./node_modules/sass-loader/dist/cjs.js??ref--8-oneOf-1-4!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/webpack-preprocess-loader??ref--8-oneOf-1-5!./node_modules/@dcloudio/vue-cli-plugin-uni/packages/vue-loader/lib??vue-loader-options!./node_modules/@dcloudio/webpack-uni-mp-loader/lib/style.js!D:/源码/小程序源码/新朋友圈/uview-ui/components/u-upload/u-upload.vue?vue&type=style&index=0&id=0d33af60&lang=scss&scoped=true& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin
    if(false) { var cssReload; }
  

/***/ })

}]);
//# sourceMappingURL=../../../../.sourcemap/mp-weixin/uview-ui/components/u-upload/u-upload.js.map
;(global["webpackJsonp"] = global["webpackJsonp"] || []).push([
    'uview-ui/components/u-upload/u-upload-create-component',
    {
        'uview-ui/components/u-upload/u-upload-create-component':(function(module, exports, __webpack_require__){
            __webpack_require__('1')['createComponent'](__webpack_require__(200))
        })
    },
    [['uview-ui/components/u-upload/u-upload-create-component']]
]);
