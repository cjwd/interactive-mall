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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
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
/******/ 	return __webpack_require__(__webpack_require__.s = "./admin/js/imm-gutenberg.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./admin/js/blocks/meta/deal.js":
/*!**************************************!*\
  !*** ./admin/js/blocks/meta/deal.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);




/***/ }),

/***/ "./admin/js/blocks/meta/store.js":
/*!***************************************!*\
  !*** ./admin/js/blocks/meta/store.js ***!
  \***************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/editor */ "@wordpress/editor");
/* harmony import */ var _wordpress_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);





Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-phone-block", {
  title: "Store Phone Number",
  icon: "phone",
  category: "imm-store-meta-blocks-category",
  attributes: {
    blockValue: {
      type: "string",
      source: "meta",
      meta: "imm_store_phone"
    }
  },
  edit: function edit(_ref) {
    var className = _ref.className,
        setAttributes = _ref.setAttributes,
        attributes = _ref.attributes;

    function updateBlockValue(blockValue) {
      setAttributes({
        blockValue: blockValue
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: className
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Store Phone Number", "imm"),
      value: attributes.blockValue,
      onChange: updateBlockValue
    }));
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-email-block", {
  title: "Store Email",
  icon: "email",
  category: "imm-store-meta-blocks-category",
  attributes: {
    blockValue: {
      type: "string",
      source: "meta",
      meta: "imm_store_email"
    }
  },
  edit: function edit(_ref2) {
    var className = _ref2.className,
        setAttributes = _ref2.setAttributes,
        attributes = _ref2.attributes;

    function updateBlockValue(blockValue) {
      setAttributes({
        blockValue: blockValue
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: className
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Store Email", "imm"),
      value: attributes.blockValue,
      onChange: updateBlockValue
    }));
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-website-block", {
  title: "Store Website",
  icon: "admin-links",
  category: "imm-store-meta-blocks-category",
  attributes: {
    blockValue: {
      type: "string",
      source: "meta",
      meta: "imm_store_website"
    }
  },
  edit: function edit(_ref3) {
    var className = _ref3.className,
        setAttributes = _ref3.setAttributes,
        attributes = _ref3.attributes;

    function updateBlockValue(blockValue) {
      setAttributes({
        blockValue: blockValue
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: className
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Store Website", "imm"),
      value: attributes.blockValue,
      onChange: updateBlockValue,
      type: "url"
    }));
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-facebook-block", {
  title: "Facebook Page Url",
  icon: "admin-links",
  category: "imm-store-meta-blocks-category",
  attributes: {
    blockValue: {
      type: "string",
      source: "meta",
      meta: "imm_store_facebook"
    }
  },
  edit: function edit(_ref4) {
    var className = _ref4.className,
        setAttributes = _ref4.setAttributes,
        attributes = _ref4.attributes;

    function updateBlockValue(blockValue) {
      setAttributes({
        blockValue: blockValue
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: className
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Facebook Page URL", "imm"),
      value: attributes.blockValue,
      onChange: updateBlockValue,
      type: "url"
    }));
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-twitter-block", {
  title: "Twitter Page Url",
  icon: "admin-links",
  category: "imm-store-meta-blocks-category",
  attributes: {
    blockValue: {
      type: "string",
      source: "meta",
      meta: "imm_store_twitter"
    }
  },
  edit: function edit(_ref5) {
    var className = _ref5.className,
        setAttributes = _ref5.setAttributes,
        attributes = _ref5.attributes;

    function updateBlockValue(blockValue) {
      setAttributes({
        blockValue: blockValue
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: className
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Twitter Page URL", "imm"),
      value: attributes.blockValue,
      onChange: updateBlockValue,
      type: "url"
    }));
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-instagram-block", {
  title: "Instagram Page Url",
  icon: "admin-links",
  category: "imm-store-meta-blocks-category",
  attributes: {
    blockValue: {
      type: "string",
      source: "meta",
      meta: "imm_store_instagram"
    }
  },
  edit: function edit(_ref6) {
    var className = _ref6.className,
        setAttributes = _ref6.setAttributes,
        attributes = _ref6.attributes;

    function updateBlockValue(blockValue) {
      setAttributes({
        blockValue: blockValue
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: className
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Instagram Page URL", "imm"),
      value: attributes.blockValue,
      onChange: updateBlockValue,
      type: "url"
    }));
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-floor-block", {
  title: "Mall Floor",
  icon: "sort",
  category: "imm-store-meta-blocks-category",
  attributes: {
    blockValue: {
      type: "integer",
      source: "meta",
      meta: "imm_store_floor"
    }
  },
  edit: function edit(_ref7) {
    var className = _ref7.className,
        setAttributes = _ref7.setAttributes,
        attributes = _ref7.attributes;

    function updateBlockValue(blockValue) {
      setAttributes({
        blockValue: blockValue
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: className
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Mall Floor", "imm"),
      value: attributes.blockValue,
      onChange: updateBlockValue,
      type: "number"
    }));
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-location-block", {
  title: "Store Location",
  icon: "location-alt",
  category: "imm-store-meta-blocks-category",
  attributes: {
    blockValue: {
      type: "number",
      source: "meta",
      meta: "imm_store_location"
    }
  },
  edit: function edit(_ref8) {
    var className = _ref8.className,
        setAttributes = _ref8.setAttributes,
        attributes = _ref8.attributes;

    function updateBlockValue(blockValue) {
      setAttributes({
        blockValue: blockValue
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: className
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Store Location", "imm"),
      value: attributes.blockValue,
      onChange: updateBlockValue,
      type: "number"
    }));
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-size-block", {
  title: "Store Size",
  icon: "editor-expand",
  category: "imm-store-meta-blocks-category",
  attributes: {
    blockValue: {
      type: "number",
      source: "meta",
      meta: "imm_store_size"
    }
  },
  edit: function edit(_ref9) {
    var className = _ref9.className,
        setAttributes = _ref9.setAttributes,
        attributes = _ref9.attributes;

    function updateBlockValue(blockValue) {
      setAttributes({
        blockValue: blockValue
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: className
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["TextControl"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Store Size", "imm"),
      value: attributes.blockValue,
      onChange: updateBlockValue,
      type: "number"
    }));
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-hours-block", {
  title: "Store Opening Hours",
  icon: "clock",
  category: "imm-store-meta-blocks-category",
  attributes: {
    blockValue: {
      type: "array",
      source: "meta",
      meta: "imm_store_hours"
    }
  },
  edit: function edit(_ref10) {
    var className = _ref10.className,
        setAttributes = _ref10.setAttributes,
        attributes = _ref10.attributes;

    function updateBlockValue(blockValue) {
      setAttributes({
        blockValue: blockValue
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["RichText"], {
      label: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Store Opening Hours", "imm"),
      tagName: "ul",
      multiline: "li",
      placeholder: Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Monday - Friday 10am - 7pm", "imm"),
      value: attributes.blockValue,
      className: className,
      onChange: updateBlockValue
    });
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-logo-block", {
  title: "Store Logo",
  icon: "format-image",
  category: "imm-store-meta-blocks-category",
  attributes: {
    logoID: {
      type: "number"
    },
    logoURL: {
      type: "string",
      source: "meta",
      meta: "imm_store_logo"
    }
  },
  edit: function edit(_ref11) {
    var setAttributes = _ref11.setAttributes,
        attributes = _ref11.attributes;

    function onSelectImage(media) {
      return setAttributes({
        logoURL: media.url,
        logoID: media.id
      });
    }

    ;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h3", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Store Logo", "imm")), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      onSelect: onSelectImage,
      allowedTypes: "image",
      value: attributes.logoID,
      render: function render(obj) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: attributes.logoID ? "image-button" : "button button-large",
          onClick: obj.open
        }, !attributes.logoID ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Upload Image", "imm") : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: attributes.logoURL
        }));
      }
    }));
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-map-block", {
  title: "Store Map",
  icon: "format-image",
  category: "imm-store-meta-blocks-category",
  attributes: {
    mapID: {
      type: "number"
    },
    mapURL: {
      type: "string",
      source: "meta",
      meta: "imm_store_map"
    }
  },
  edit: function edit(_ref12) {
    var setAttributes = _ref12.setAttributes,
        attributes = _ref12.attributes;

    function onSelectImage(media) {
      return setAttributes({
        mapURL: media.url,
        mapID: media.id
      });
    }

    ;
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["Fragment"], null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h3", null, Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Store Map", "imm")), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_editor__WEBPACK_IMPORTED_MODULE_3__["MediaUpload"], {
      onSelect: onSelectImage,
      allowedTypes: "image",
      value: attributes.mapID,
      render: function render(obj) {
        return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["Button"], {
          className: attributes.mapID ? "image-button" : "button button-large",
          onClick: obj.open
        }, !attributes.mapID ? Object(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_1__["__"])("Upload Image", "imm") : Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("img", {
          src: attributes.mapURL
        }));
      }
    }));
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});
Object(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__["registerBlockType"])("imm/store-color-block", {
  title: "Store Brand Color",
  icon: "admin-appearance",
  category: "imm-store-meta-blocks-category",
  attributes: {
    blockValue: {
      type: "string",
      source: "meta",
      meta: "imm_store_color"
    }
  },
  edit: function edit(_ref13) {
    var className = _ref13.className,
        setAttributes = _ref13.setAttributes,
        attributes = _ref13.attributes;

    function updateBlockValue(blockValue) {
      setAttributes({
        blockValue: blockValue
      });
    }

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: className
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__["ColorPicker"], {
      color: "#f00",
      disableAlpha: true,
      value: attributes.blockValue,
      onChangeComplete: updateBlockValue
    }));
  },
  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function save() {
    return null;
  }
});

/***/ }),

/***/ "./admin/js/imm-gutenberg.js":
/*!***********************************!*\
  !*** ./admin/js/imm-gutenberg.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _blocks_meta_store__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./blocks/meta/store */ "./admin/js/blocks/meta/store.js");
/* harmony import */ var _blocks_meta_deal__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./blocks/meta/deal */ "./admin/js/blocks/meta/deal.js");



/***/ }),

/***/ "@wordpress/blocks":
/*!*****************************************!*\
  !*** external {"this":["wp","blocks"]} ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["blocks"]; }());

/***/ }),

/***/ "@wordpress/components":
/*!*********************************************!*\
  !*** external {"this":["wp","components"]} ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["components"]; }());

/***/ }),

/***/ "@wordpress/editor":
/*!*****************************************!*\
  !*** external {"this":["wp","editor"]} ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["editor"]; }());

/***/ }),

/***/ "@wordpress/element":
/*!******************************************!*\
  !*** external {"this":["wp","element"]} ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["element"]; }());

/***/ }),

/***/ "@wordpress/i18n":
/*!***************************************!*\
  !*** external {"this":["wp","i18n"]} ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = this["wp"]["i18n"]; }());

/***/ })

/******/ });
//# sourceMappingURL=editor.js.map