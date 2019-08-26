!function(e){var t={};function o(r){if(t[r])return t[r].exports;var a=t[r]={i:r,l:!1,exports:{}};return e[r].call(a.exports,a,a.exports,o),a.l=!0,a.exports}o.m=e,o.c=t,o.d=function(e,t,r){o.o(e,t)||Object.defineProperty(e,t,{configurable:!1,enumerable:!0,get:r})},o.r=function(e){Object.defineProperty(e,"__esModule",{value:!0})},o.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return o.d(t,"a",t),t},o.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},o.p="",o(o.s=5)}([function(e,t){!function(){e.exports=this.wp.element}()},function(e,t){!function(){e.exports=this.wp.i18n}()},function(e,t){!function(){e.exports=this.wp.blocks}()},function(e,t){!function(){e.exports=this.wp.components}()},function(e,t){!function(){e.exports=this.wp.editor}()},function(e,t,o){"use strict";o.r(t);var r=o(0),a=o(1),c=o(2),n=o(4),l=o(3);Object(c.registerBlockType)("imm/store-phone-block",{title:"Store Phone Number",icon:"phone",category:"imm-store-meta-blocks-category",attributes:{blockValue:{type:"string",source:"meta",meta:"imm_store_phone"}},edit:function(e){var t=e.className,o=e.setAttributes,c=e.attributes;return Object(r.createElement)("div",{className:t},Object(r.createElement)(l.TextControl,{label:Object(a.__)("Store Phone Number","imm"),value:c.blockValue,onChange:function(e){o({blockValue:e})}}))},save:function(){return null}}),Object(c.registerBlockType)("imm/store-website-block",{title:"Store Website",icon:"admin-links",category:"imm-store-meta-blocks-category",attributes:{blockValue:{type:"string",source:"meta",meta:"imm_store_website"}},edit:function(e){var t=e.className,o=e.setAttributes,c=e.attributes;return Object(r.createElement)("div",{className:t},Object(r.createElement)(l.TextControl,{label:Object(a.__)("Store Website","imm"),value:c.blockValue,onChange:function(e){o({blockValue:e})},type:"url"}))},save:function(){return null}}),Object(c.registerBlockType)("imm/store-facebook-block",{title:"Facebook Page Url",icon:"admin-links",category:"imm-store-meta-blocks-category",attributes:{blockValue:{type:"string",source:"meta",meta:"imm_store_facebook"}},edit:function(e){var t=e.className,o=e.setAttributes,c=e.attributes;return Object(r.createElement)("div",{className:t},Object(r.createElement)(l.TextControl,{label:Object(a.__)("Facebook Page URL","imm"),value:c.blockValue,onChange:function(e){o({blockValue:e})},type:"url"}))},save:function(){return null}}),Object(c.registerBlockType)("imm/store-twitter-block",{title:"Twitter Page Url",icon:"admin-links",category:"imm-store-meta-blocks-category",attributes:{blockValue:{type:"string",source:"meta",meta:"imm_store_twitter"}},edit:function(e){var t=e.className,o=e.setAttributes,c=e.attributes;return Object(r.createElement)("div",{className:t},Object(r.createElement)(l.TextControl,{label:Object(a.__)("Twitter Page URL","imm"),value:c.blockValue,onChange:function(e){o({blockValue:e})},type:"url"}))},save:function(){return null}}),Object(c.registerBlockType)("imm/store-instagram-block",{title:"Instagram Page Url",icon:"admin-links",category:"imm-store-meta-blocks-category",attributes:{blockValue:{type:"string",source:"meta",meta:"imm_store_instagram"}},edit:function(e){var t=e.className,o=e.setAttributes,c=e.attributes;return Object(r.createElement)("div",{className:t},Object(r.createElement)(l.TextControl,{label:Object(a.__)("Instagram Page URL","imm"),value:c.blockValue,onChange:function(e){o({blockValue:e})},type:"url"}))},save:function(){return null}}),Object(c.registerBlockType)("imm/store-floor-block",{title:"Mall Floor",icon:"sort",category:"imm-store-meta-blocks-category",attributes:{blockValue:{type:"integer",source:"meta",meta:"imm_store_floor"}},edit:function(e){var t=e.className,o=e.setAttributes,c=e.attributes;return Object(r.createElement)("div",{className:t},Object(r.createElement)(l.TextControl,{label:Object(a.__)("Mall Floor","imm"),value:c.blockValue,onChange:function(e){o({blockValue:e})},type:"number"}))},save:function(){return null}}),Object(c.registerBlockType)("imm/store-location-block",{title:"Store Location",icon:"location-alt",category:"imm-store-meta-blocks-category",attributes:{blockValue:{type:"number",source:"meta",meta:"imm_store_location"}},edit:function(e){var t=e.className,o=e.setAttributes,c=e.attributes;return Object(r.createElement)("div",{className:t},Object(r.createElement)(l.TextControl,{label:Object(a.__)("Store Location","imm"),value:c.blockValue,onChange:function(e){o({blockValue:e})},type:"number"}))},save:function(){return null}}),Object(c.registerBlockType)("imm/store-size-block",{title:"Store Size",icon:"editor-expand",category:"imm-store-meta-blocks-category",attributes:{blockValue:{type:"number",source:"meta",meta:"imm_store_size"}},edit:function(e){var t=e.className,o=e.setAttributes,c=e.attributes;return Object(r.createElement)("div",{className:t},Object(r.createElement)(l.TextControl,{label:Object(a.__)("Store Size","imm"),value:c.blockValue,onChange:function(e){o({blockValue:e})},type:"number"}))},save:function(){return null}}),Object(c.registerBlockType)("imm/store-hours-block",{title:"Store Opening Hours",icon:"clock",category:"imm-store-meta-blocks-category",attributes:{blockValue:{type:"array",source:"meta",meta:"imm_store_hours"}},edit:function(e){var t=e.className,o=e.setAttributes,c=e.attributes;return Object(r.createElement)(n.RichText,{label:Object(a.__)("Store Opening Hours","imm"),tagName:"ul",multiline:"li",placeholder:Object(a.__)("Monday - Friday 10am - 7pm","imm"),value:c.blockValue,className:t,onChange:function(e){o({blockValue:e})}})},save:function(){return null}}),Object(c.registerBlockType)("imm/store-logo-block",{title:"Store Logo",icon:"format-image",category:"imm-store-meta-blocks-category",attributes:{logoID:{type:"number"},logoURL:{type:"string",source:"meta",meta:"imm_store_logo"}},edit:function(e){var t=e.setAttributes,o=e.attributes;return Object(r.createElement)(r.Fragment,null,Object(r.createElement)("h3",null,Object(a.__)("Store Logo","imm")),Object(r.createElement)(n.MediaUpload,{onSelect:function(e){return t({logoURL:e.url,logoID:e.id})},allowedTypes:"image",value:o.logoID,render:function(e){return Object(r.createElement)(l.Button,{className:o.logoID?"image-button":"button button-large",onClick:e.open},o.logoID?Object(r.createElement)("img",{src:o.logoURL}):Object(a.__)("Upload Image","imm"))}}))},save:function(){return null}}),Object(c.registerBlockType)("imm/store-map-block",{title:"Store Map",icon:"format-image",category:"imm-store-meta-blocks-category",attributes:{mapID:{type:"number"},mapURL:{type:"string",source:"meta",meta:"imm_store_map"}},edit:function(e){var t=e.setAttributes,o=e.attributes;return Object(r.createElement)(r.Fragment,null,Object(r.createElement)("h3",null,Object(a.__)("Store Map","imm")),Object(r.createElement)(n.MediaUpload,{onSelect:function(e){return t({mapURL:e.url,mapID:e.id})},allowedTypes:"image",value:o.mapID,render:function(e){return Object(r.createElement)(l.Button,{className:o.mapID?"image-button":"button button-large",onClick:e.open},o.mapID?Object(r.createElement)("img",{src:o.mapURL}):Object(a.__)("Upload Image","imm"))}}))},save:function(){return null}}),Object(c.registerBlockType)("imm/store-color-block",{title:"Store Brand Color",icon:"admin-appearance",category:"imm-store-meta-blocks-category",attributes:{blockValue:{type:"string",source:"meta",meta:"imm_store_color"}},edit:function(e){var t=e.className,o=e.setAttributes,a=e.attributes;return Object(r.createElement)("div",{className:t},Object(r.createElement)(l.ColorPicker,{color:"#f00",disableAlpha:!0,value:a.blockValue,onChangeComplete:function(e){o({blockValue:e})}}))},save:function(){return null}})}]);