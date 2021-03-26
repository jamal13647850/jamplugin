/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/src/js/home.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/images sync \\.(png|jpe?g|svg|gif)$":
/*!********************************************************************!*\
  !*** ./assets/src/images sync nonrecursive \.(png|jpe?g|svg|gif)$ ***!
  \********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("var map = {\n\t\"./logo 32.png\": \"./assets/src/images/logo 32.png\"\n};\n\n\nfunction webpackContext(req) {\n\tvar id = webpackContextResolve(req);\n\treturn __webpack_require__(id);\n}\nfunction webpackContextResolve(req) {\n\tif(!__webpack_require__.o(map, req)) {\n\t\tvar e = new Error(\"Cannot find module '\" + req + \"'\");\n\t\te.code = 'MODULE_NOT_FOUND';\n\t\tthrow e;\n\t}\n\treturn map[req];\n}\nwebpackContext.keys = function webpackContextKeys() {\n\treturn Object.keys(map);\n};\nwebpackContext.resolve = webpackContextResolve;\nmodule.exports = webpackContext;\nwebpackContext.id = \"./assets/src/images sync \\\\.(png|jpe?g|svg|gif)$\";\n\n//# sourceURL=webpack:///./assets/src/images_sync_nonrecursive_\\.(png%7Cjpe?");

/***/ }),

/***/ "./assets/src/images/logo 32.png":
/*!***************************************!*\
  !*** ./assets/src/images/logo 32.png ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = \"../images/./logo 32.png\";\n\n//# sourceURL=webpack:///./assets/src/images/logo_32.png?");

/***/ }),

/***/ "./assets/src/js/home.js":
/*!*******************************!*\
  !*** ./assets/src/js/home.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _mainclass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./mainclass */ \"./assets/src/js/mainclass.js\");\n/* harmony import */ var _sass_home_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../sass/home.scss */ \"./assets/src/sass/home.scss\");\n/* harmony import */ var _sass_home_scss__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_sass_home_scss__WEBPACK_IMPORTED_MODULE_1__);\n/**\r\n * Created by Jamal on 8/3/2019.\r\n */\r\n\r\n\r\n_mainclass__WEBPACK_IMPORTED_MODULE_0__[\"default\"].importImages();\n\n//# sourceURL=webpack:///./assets/src/js/home.js?");

/***/ }),

/***/ "./assets/src/js/mainclass.js":
/*!************************************!*\
  !*** ./assets/src/js/mainclass.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, \"default\", function() { return mainclass; });\n/**\r\n * Created by Jamal on 8/23/2019.\r\n */\r\nclass mainclass {\r\n    static importImages() {\r\n        const images = mainclass.importAll(__webpack_require__(\"./assets/src/images sync \\\\.(png|jpe?g|svg|gif)$\"));\r\n    }\r\n\r\n    static importAll(r) {\r\n        return r.keys().map(r);\r\n    }\r\n\r\n\r\n};\n\n//# sourceURL=webpack:///./assets/src/js/mainclass.js?");

/***/ }),

/***/ "./assets/src/sass/home.scss":
/*!***********************************!*\
  !*** ./assets/src/sass/home.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./assets/src/sass/home.scss?");

/***/ })

/******/ });