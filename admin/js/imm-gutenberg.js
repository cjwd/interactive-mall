(function (wp) {
  var el = wp.element.createElement;
  var i18n = wp.i18n;
  var RichText = wp.editor.RichText;
  var MediaUpload = wp.editor.MediaUpload;
  var registerBlockType = wp.blocks.registerBlockType;
  var TextControl = wp.components.TextControl;
  var ColorPicker = wp.components.ColorPicker;

  registerBlockType('imm/store-phone-block', {
    title: 'Store Phone Number',
    icon: 'phone',
    category: 'common',

    attributes: {
      blockValue: {
        type: 'string',
        source: 'meta',
        meta: 'imm_store_phone'
      }
    },

    edit: function (props) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      function updateBlockValue(blockValue) {
        setAttributes({
          blockValue
        });
      }

      return el(
        'div', {
          className: className
        },
        el(TextControl, {
          label: 'Store Phone Number',
          value: props.attributes.blockValue,
          onChange: updateBlockValue
        })
      );
    },

    // No information saved to the block
    // Data is saved to post meta via attributes
    save: function () {
      return null;
    }
  });

  registerBlockType('imm/store-email-block', {
    title: 'Store Email',
    icon: 'email',
    category: 'common',

    attributes: {
      blockValue: {
        type: 'string',
        source: 'meta',
        meta: 'imm_store_email'
      }
    },

    edit: function (props) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      function updateBlockValue(blockValue) {
        setAttributes({
          blockValue
        });
      }

      return el(
        'div', {
          className: className
        },
        el(TextControl, {
          label: 'Store Email',
          value: props.attributes.blockValue,
          onChange: updateBlockValue
        })
      );
    },

    // No information saved to the block
    // Data is saved to post meta via attributes
    save: function () {
      return null;
    }
  });

  registerBlockType('imm/store-website-block', {
    title: 'Store Website',
    icon: 'admin-links',
    category: 'common',

    attributes: {
      blockValue: {
        type: 'string',
        source: 'meta',
        meta: 'imm_store_website'
      }
    },

    edit: function (props) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      function updateBlockValue(blockValue) {
        setAttributes({
          blockValue
        });
      }

      return el(
        'div', {
          className: className
        },
        el(TextControl, {
          label: 'Store Website',
          value: props.attributes.blockValue,
          onChange: updateBlockValue
        })
      );
    },

    // No information saved to the block
    // Data is saved to post meta via attributes
    save: function () {
      return null;
    }
  });

  registerBlockType('imm/store-facebook-block', {
    title: 'Facebook Page Url',
    icon: 'admin-links',
    category: 'common',

    attributes: {
      blockValue: {
        type: 'string',
        source: 'meta',
        meta: 'imm_store_facebook'
      }
    },

    edit: function (props) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      function updateBlockValue(blockValue) {
        setAttributes({
          blockValue
        });
      }

      return el(
        'div', {
          className: className
        },
        el(TextControl, {
          label: 'Facebook Page Url',
          value: props.attributes.blockValue,
          onChange: updateBlockValue,
          type: 'url'
        })
      );
    },

    // No information saved to the block
    // Data is saved to post meta via attributes
    save: function () {
      return null;
    }
  });

  registerBlockType('imm/store-twitter-block', {
    title: 'Twitter Page Url',
    icon: 'admin-links',
    category: 'common',

    attributes: {
      blockValue: {
        type: 'string',
        source: 'meta',
        meta: 'imm_store_twitter'
      }
    },

    edit: function (props) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      function updateBlockValue(blockValue) {
        setAttributes({
          blockValue
        });
      }

      return el(
        'div', {
          className: className
        },
        el(TextControl, {
          label: 'Twitter Page Url',
          value: props.attributes.blockValue,
          onChange: updateBlockValue,
          type: 'url'
        })
      );
    },

    // No information saved to the block
    // Data is saved to post meta via attributes
    save: function () {
      return null;
    }
  });

  registerBlockType('imm/store-instagram-block', {
    title: 'Instagram Page Url',
    icon: 'admin-links',
    category: 'common',

    attributes: {
      blockValue: {
        type: 'string',
        source: 'meta',
        meta: 'imm_store_instagram'
      }
    },

    edit: function (props) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      function updateBlockValue(blockValue) {
        setAttributes({
          blockValue
        });
      }

      return el(
        'div', {
          className: className
        },
        el(TextControl, {
          label: 'Instagram Page Url',
          value: props.attributes.blockValue,
          onChange: updateBlockValue,
          type: 'url'
        })
      );
    },

    // No information saved to the block
    // Data is saved to post meta via attributes
    save: function () {
      return null;
    }
  });

  registerBlockType('imm/store-floor-block', {
    title: 'Mall Floor',
    icon: 'sort',
    category: 'common',

    attributes: {
      blockValue: {
        type: 'integer',
        source: 'meta',
        meta: 'imm_store_floor'
      }
    },

    edit: function (props) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      function updateBlockValue(blockValue) {
        setAttributes({
          blockValue
        });
      }

      return el(
        'div', {
          className: className
        },
        el(TextControl, {
          label: 'Mall Floor',
          value: props.attributes.blockValue,
          onChange: updateBlockValue
        })
      );
    },

    // No information saved to the block
    // Data is saved to post meta via attributes
    save: function () {
      return null;
    }
  });

  registerBlockType('imm/store-location-block', {
    title: 'Store Location',
    icon: 'location-alt',
    category: 'common',

    attributes: {
      blockValue: {
        type: 'string',
        source: 'meta',
        meta: 'imm_store_location'
      }
    },

    edit: function (props) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      function updateBlockValue(blockValue) {
        setAttributes({
          blockValue
        });
      }

      return el(
        'div', {
          className: className
        },
        el(TextControl, {
          label: 'Store Location',
          value: props.attributes.blockValue,
          onChange: updateBlockValue
        })
      );
    },

    // No information saved to the block
    // Data is saved to post meta via attributes
    save: function () {
      return null;
    }
  });

  registerBlockType('imm/store-hours-block', {
    title: 'Store Opening Hours',
    icon: 'clock',
    category: 'common',

    attributes: {
      blockValue: {
        type: 'array',
        source: 'meta',
        meta: 'imm_store_hours'
      }
    },

    edit: function (props) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      function updateBlockValue(blockValue) {
        setAttributes({
          blockValue
        });
      }

      return el(
        RichText, {
          label: 'Store Opening Hours',
          tagName: 'ul',
          multiline: 'li',
          placeholder: i18n.__('Monday - Friday 10am - 7pm', 'imm'),
          value: props.attributes.blockValue,
          className: className,
          onChange: updateBlockValue
        }
      );
    },

    // No information saved to the block
    // Data is saved to post meta via attributes
    save: function () {
      return null;
    }
  });


  registerBlockType('imm/store-logo-block', {
    title: 'Store Logo',
    icon: 'format-image',
    category: 'common',

    attributes: {
      logoID: {
        type: 'number',
      },
      logoURL: {
        type: 'string',
        source: 'meta',
        meta: 'imm_store_logo'
      }
    },

    edit: function (props) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      var onSelectImage = function (media) {
        return setAttributes({
          logoURL: media.url,
          logoID: media.id,
        });
      }

      return (
        el('h3', {}, i18n.__('Store Logo', 'imm')),
        el(MediaUpload, {
          onSelect: onSelectImage,
          allowedTypes: 'image',
          value: props.attributes.logoID,
          render: function (obj) {
            return el(wp.components.Button, {
                className: props.attributes.logoID ? 'image-button' : 'button button-large',
                onClick: obj.open
              },
              !props.attributes.logoID ? i18n.__('Upload Image', 'imm') : el('img', {
                src: props.attributes.logoURL
              })
            );
          }
        })
      );

    },

    // No information saved to the block
    // Data is saved to post meta via attributes
    save: function () {
      return null;
    }
  });


  registerBlockType('imm/store-map-block', {
    title: 'Store Map',
    icon: 'format-image',
    category: 'common',

    attributes: {
      mapID: {
        type: 'number',
      },
      mapURL: {
        type: 'string',
        source: 'meta',
        meta: 'imm_store_map'
      }
    },

    edit: function (props) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      var onSelectImage = function (media) {
        return setAttributes({
          mapURL: media.url,
          mapID: media.id,
        });
      }

      return (
        el('h3', {}, i18n.__('Store Map', 'imm')),
        el(MediaUpload, {
          onSelect: onSelectImage,
          allowedTypes: 'image',
          value: props.attributes.mapID,
          render: function (obj) {
            return el(wp.components.Button, {
                className: props.attributes.mapID ? 'image-button' : 'button button-large',
                onClick: obj.open
              },
              !props.attributes.mapID ? i18n.__('Upload Image', 'imm') : el('img', {
                src: props.attributes.mapURL
              })
            );
          }
        })
      );

    },

    // No information saved to the block
    // Data is saved to post meta via attributes
    save: function () {
      return null;
    }
  });


  registerBlockType('imm/store-color-block', {
    title: 'Store Brand Color',
    icon: 'admin-appearance',
    category: 'common',

    attributes: {
      blockValue: {
        type: 'string',
        source: 'meta',
        meta: 'imm_store_color',
      }
    },

    edit: function (props) {
      var className = props.className;
      var setAttributes = props.setAttributes;

      function updateBlockValue(blockValue) {
        setAttributes({
          blockValue
        });
      }

      console.log(props.attributes.blockValue);

      return el(
        'div', {
          className: className
        },
        el(ColorPicker, {
          color: '#f00',
          disableAlpha: true,
          value: props.attributes.blockValue,
          onChangeComplete: updateBlockValue
        })
      );

    },

    // No information saved to the block
    // Data is saved to post meta via attributes
    save: function () {
      return null;
    }
  });
})(window.wp);