(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/client/argon/components/WorldMap/WorldMap.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/client/argon/components/WorldMap/WorldMap.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var d3__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! d3 */ "./node_modules/d3/index.js");
/* harmony import */ var topojson__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! topojson */ "./node_modules/topojson/build/topojson.js");
/* harmony import */ var topojson__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(topojson__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _argon_util_throttle__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @argon/util/throttle */ "./resources/client/argon/util/throttle.js");


function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(source, true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(source).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

//
//
//




/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'world-map',
  props: {
    mapData: {
      type: Object,
      "default": function _default() {
        return {};
      }
    },
    points: {
      type: Array,
      "default": function _default() {
        return [];
      }
    }
  },
  data: function data() {
    return {
      id: this.randomString(),
      color1: '#f6f9fc',
      color2: '#adb5bd',
      highlightFillColor: '#ced4da',
      borderColor: 'white',
      highlightBorderColor: 'white',
      bubbleHighlightFillColor: '#11cdef',
      bubbleFillColor: '#fb6340'
    };
  },
  methods: {
    generateColors: function generateColors(length) {
      return d3__WEBPACK_IMPORTED_MODULE_1__["scaleLinear"]().domain([0, length]).range([this.color1, this.color2]);
    },
    generateMapColors: function generateMapColors() {
      var mapDataValues = Object.values(this.mapData);
      var maxVal = Math.max.apply(Math, _toConsumableArray(mapDataValues));
      var colors = this.generateColors(maxVal);
      var mapData = {};
      var fills = {
        defaultFill: '#EDF0F2'
      };

      for (var key in this.mapData) {
        var val = this.mapData[key];
        fills[key] = colors(val);
        mapData[key] = {
          fillKey: key,
          value: val
        };
      }

      return {
        mapData: mapData,
        fills: fills
      };
    },
    initVectorMap: function initVectorMap() {
      var DataMap, _this$generateMapColo, fills, mapData, worldMap, bubbleOptions, bubblePoints, resizeFunc;

      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.async(function initVectorMap$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              _context.next = 2;
              return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.awrap(__webpack_require__.e(/*! import() */ 2).then(__webpack_require__.t.bind(null, /*! datamaps */ "./node_modules/datamaps/dist/datamaps.all.js", 7)));

            case 2:
              DataMap = _context.sent;
              DataMap = DataMap["default"] || DataMap;
              _this$generateMapColo = this.generateMapColors(), fills = _this$generateMapColo.fills, mapData = _this$generateMapColo.mapData;
              worldMap = new DataMap({
                scope: 'world',
                element: document.getElementById(this.id),
                fills: fills,
                data: mapData,
                responsive: true,
                geographyConfig: {
                  borderColor: this.borderColor,
                  borderWidth: 1,
                  borderOpacity: 1,
                  highlightFillColor: this.highlightFillColor,
                  highlightBorderColor: this.highlightBorderColor,
                  highlightBorderWidth: 1,
                  highlightBorderOpacity: 1
                }
              });
              bubbleOptions = {
                radius: 2,
                borderWidth: 4,
                highlightBorderWidth: 4,
                fillKey: this.bubbleFillColor,
                fillColor: this.bubbleFillColor,
                borderColor: this.bubbleFillColor,
                highlightFillColor: this.bubbleHighlightFillColor,
                highlightBorderColor: this.bubbleHighlightFillColor
              };
              bubblePoints = this.points.map(function (point) {
                return _objectSpread({}, bubbleOptions, {}, point);
              });
              worldMap.bubbles(bubblePoints, {
                popupTemplate: function popupTemplate(geo, data) {
                  return '<div class="hoverinfo">' + data.name;
                }
              });
              resizeFunc = worldMap.resize.bind(worldMap);
              window.addEventListener('resize', function () {
                Object(_argon_util_throttle__WEBPACK_IMPORTED_MODULE_3__["throttle"])(resizeFunc, 40);
              }, false);

            case 11:
            case "end":
              return _context.stop();
          }
        }
      }, null, this);
    },
    randomString: function randomString() {
      var text = "";
      var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

      for (var i = 0; i < 5; i++) {
        text += possible.charAt(Math.floor(Math.random() * possible.length));
      }

      return text;
    }
  },
  mounted: function mounted() {
    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.async(function mounted$(_context2) {
      while (1) {
        switch (_context2.prev = _context2.next) {
          case 0:
            this.initVectorMap();

          case 1:
          case "end":
            return _context2.stop();
        }
      }
    }, null, this);
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/client/argon/components/WorldMap/WorldMap.vue?vue&type=template&id=2f3a250c&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/client/argon/components/WorldMap/WorldMap.vue?vue&type=template&id=2f3a250c& ***!
  \******************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "world-map", attrs: { id: _vm.id } })
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/client/argon/components/WorldMap/WorldMap.vue":
/*!*****************************************************************!*\
  !*** ./resources/client/argon/components/WorldMap/WorldMap.vue ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _WorldMap_vue_vue_type_template_id_2f3a250c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./WorldMap.vue?vue&type=template&id=2f3a250c& */ "./resources/client/argon/components/WorldMap/WorldMap.vue?vue&type=template&id=2f3a250c&");
/* harmony import */ var _WorldMap_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./WorldMap.vue?vue&type=script&lang=js& */ "./resources/client/argon/components/WorldMap/WorldMap.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _WorldMap_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _WorldMap_vue_vue_type_template_id_2f3a250c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _WorldMap_vue_vue_type_template_id_2f3a250c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/client/argon/components/WorldMap/WorldMap.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/client/argon/components/WorldMap/WorldMap.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/client/argon/components/WorldMap/WorldMap.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_WorldMap_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./WorldMap.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/client/argon/components/WorldMap/WorldMap.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_WorldMap_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/client/argon/components/WorldMap/WorldMap.vue?vue&type=template&id=2f3a250c&":
/*!************************************************************************************************!*\
  !*** ./resources/client/argon/components/WorldMap/WorldMap.vue?vue&type=template&id=2f3a250c& ***!
  \************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_WorldMap_vue_vue_type_template_id_2f3a250c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib??vue-loader-options!./WorldMap.vue?vue&type=template&id=2f3a250c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/client/argon/components/WorldMap/WorldMap.vue?vue&type=template&id=2f3a250c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_WorldMap_vue_vue_type_template_id_2f3a250c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_WorldMap_vue_vue_type_template_id_2f3a250c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/client/argon/util/throttle.js":
/*!*************************************************!*\
  !*** ./resources/client/argon/util/throttle.js ***!
  \*************************************************/
/*! exports provided: throttle */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "throttle", function() { return throttle; });
/**
 * Simple throttle function that executes a passed function only once in the specified timeout
 * @param handlerFunc
 * @param [timeout] the throttle interval
 */
function throttle(handlerFunc) {
  var timeout = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 66;
  var resizeTimeout;

  if (!resizeTimeout) {
    resizeTimeout = setTimeout(function () {
      resizeTimeout = null;
      handlerFunc(); // The actualResizeHandler will execute at a rate of 15fps
    }, timeout);
  }
}

/***/ })

}]);