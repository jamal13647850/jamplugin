/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./assets/src/images sync \\.(png|jpe?g|svg|gif)$":
/*!*********************************************************************!*\
  !*** ./assets/src/images/ sync nonrecursive \.(png|jpe?g|svg|gif)$ ***!
  \*********************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

eval("var map = {\n\t\"./logo 32.png\": \"./assets/src/images/logo 32.png\"\n};\n\n\nfunction webpackContext(req) {\n\tvar id = webpackContextResolve(req);\n\treturn __webpack_require__(id);\n}\nfunction webpackContextResolve(req) {\n\tif(!__webpack_require__.o(map, req)) {\n\t\tvar e = new Error(\"Cannot find module '\" + req + \"'\");\n\t\te.code = 'MODULE_NOT_FOUND';\n\t\tthrow e;\n\t}\n\treturn map[req];\n}\nwebpackContext.keys = function webpackContextKeys() {\n\treturn Object.keys(map);\n};\nwebpackContext.resolve = webpackContextResolve;\nmodule.exports = webpackContext;\nwebpackContext.id = \"./assets/src/images sync \\\\.(png|jpe?g|svg|gif)$\";\n\n//# sourceURL=webpack://jamplugin/./assets/src/images/_sync_nonrecursive_\\.(png%7Cjpe?");

/***/ }),

/***/ "./assets/src/js/home.js":
/*!*******************************!*\
  !*** ./assets/src/js/home.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _mainclass__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./mainclass */ \"./assets/src/js/mainclass.js\");\n/* harmony import */ var _sass_home_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../sass/home.scss */ \"./assets/src/sass/home.scss\");\n/**\r\n * Created by Jamal on 8/3/2019.\r\n */\r\n\r\n\r\n\r\n_mainclass__WEBPACK_IMPORTED_MODULE_0__.default.importImages();\n\n//# sourceURL=webpack://jamplugin/./assets/src/js/home.js?");

/***/ }),

/***/ "./assets/src/js/mainclass.js":
/*!************************************!*\
  !*** ./assets/src/js/mainclass.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (/* binding */ mainclass)\n/* harmony export */ });\n/**\r\n * Created by Jamal on 8/23/2019.\r\n */\r\nclass mainclass {\r\n    static importImages() {\r\n        const images = mainclass.importAll(__webpack_require__(\"./assets/src/images sync \\\\.(png|jpe?g|svg|gif)$\"));\r\n    }\r\n\r\n    static importAll(r) {\r\n        return r.keys().map(r);\r\n    }\r\n\r\n\r\n};\n\n//# sourceURL=webpack://jamplugin/./assets/src/js/mainclass.js?");

/***/ }),

/***/ "./assets/src/images/logo 32.png":
/*!***************************************!*\
  !*** ./assets/src/images/logo 32.png ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (\"../images/./logo 32.png\");\n\n//# sourceURL=webpack://jamplugin/./assets/src/images/logo_32.png?");

/***/ }),

/***/ "./assets/src/sass/home.scss":
/*!***********************************!*\
  !*** ./assets/src/sass/home.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n// extracted by mini-css-extract-plugin\n\n\n//# sourceURL=webpack://jamplugin/./assets/src/sass/home.scss?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	var __webpack_exports__ = __webpack_require__("./assets/src/js/home.js");
/******/ 	
/******/ })()
;