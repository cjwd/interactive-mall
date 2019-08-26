import { __ } from "@wordpress/i18n";
import { registerBlockType } from "@wordpress/blocks";
import { RichText, MediaUpload } from "@wordpress/editor";
import { TextControl, ColorPicker, Button } from "@wordpress/components";

registerBlockType("imm/store-phone-block", {
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

  edit({ className, setAttributes, attributes }) {
    function updateBlockValue(blockValue) {
      setAttributes({ blockValue });
    }

    return (
      <div className={className}>
        <TextControl
          label={__("Store Phone Number", "imm")}
          value={attributes.blockValue}
          onChange={updateBlockValue}
        />
      </div>
    );
  },

  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function () {
    return null;
  }
});


registerBlockType("imm/store-website-block", {
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

  edit({ className, setAttributes, attributes }) {
    function updateBlockValue(blockValue) {
      setAttributes({ blockValue });
    }

    return (
      <div className={className}>
        <TextControl
          label={__("Store Website", "imm")}
          value={attributes.blockValue}
          onChange={updateBlockValue}
          type="url"
        />
      </div>
    );
  },

  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function () {
    return null;
  }
});

registerBlockType("imm/store-facebook-block", {
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

  edit({ className, setAttributes, attributes }) {
    function updateBlockValue(blockValue) {
      setAttributes({ blockValue });
    }

    return (
      <div className={className}>
        <TextControl
          label={__("Facebook Page URL", "imm")}
          value={attributes.blockValue}
          onChange={updateBlockValue}
          type="url"
        />
      </div>
    );
  },

  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function () {
    return null;
  }
});

registerBlockType("imm/store-twitter-block", {
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

  edit({ className, setAttributes, attributes }) {
    function updateBlockValue(blockValue) {
      setAttributes({ blockValue });
    }

    return (
      <div className={className}>
        <TextControl
          label={__("Twitter Page URL", "imm")}
          value={attributes.blockValue}
          onChange={updateBlockValue}
          type="url"
        />
      </div>
    );
  },

  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function () {
    return null;
  }
});

registerBlockType("imm/store-instagram-block", {
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

  edit({ className, setAttributes, attributes }) {
    function updateBlockValue(blockValue) {
      setAttributes({ blockValue });
    }

    return (
      <div className={className}>
        <TextControl
          label={__("Instagram Page URL", "imm")}
          value={attributes.blockValue}
          onChange={updateBlockValue}
          type="url"
        />
      </div>
    );
  },

  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function () {
    return null;
  }
});

registerBlockType("imm/store-floor-block", {
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

  edit({ className, setAttributes, attributes }) {
    function updateBlockValue(blockValue) {
      setAttributes({ blockValue });
    }

    return (
      <div className={className}>
        <TextControl
          label={__("Mall Floor", "imm")}
          value={attributes.blockValue}
          onChange={updateBlockValue}
          type="number"
        />
      </div>
    );
  },

  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function () {
    return null;
  }
});

registerBlockType("imm/store-location-block", {
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

  edit({ className, setAttributes, attributes }) {
    function updateBlockValue(blockValue) {
      setAttributes({ blockValue });
    }

    return (
      <div className={className}>
        <TextControl
          label={__("Store Location", "imm")}
          value={attributes.blockValue}
          onChange={updateBlockValue}
          type="number"
        />
      </div>
    );
  },

  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function () {
    return null;
  }
});

registerBlockType("imm/store-size-block", {
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

  edit({ className, setAttributes, attributes }) {
    function updateBlockValue(blockValue) {
      setAttributes({ blockValue });
    }

    return (
      <div className={className}>
        <TextControl
          label={__("Store Size", "imm")}
          value={attributes.blockValue}
          onChange={updateBlockValue}
          type="number"
        />
      </div>
    );
  },

  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function () {
    return null;
  }
});

registerBlockType("imm/store-hours-block", {
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

  edit({ className, setAttributes, attributes }) {
    function updateBlockValue(blockValue) {
      setAttributes({ blockValue });
    }

    return (
      <RichText
        label={__("Store Opening Hours", "imm")}
        tagName="ul"
        multiline="li"
        placeholder={__("Monday - Friday 10am - 7pm", "imm")}
        value={attributes.blockValue}
        className={className}
        onChange={updateBlockValue}
      />
    );
  },

  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function () {
    return null;
  }
});

registerBlockType("imm/store-logo-block", {
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

  edit({ setAttributes, attributes }) {
    function onSelectImage(media) {
      return setAttributes({
        logoURL: media.url,
        logoID: media.id
      });
    };

    return (
      <>
        <h3>{__("Store Logo", "imm")}</h3>
        <MediaUpload
          onSelect={onSelectImage}
          allowedTypes="image"
          value={attributes.logoID}
          render={(obj) => {
            return (
              <Button
                className={attributes.logoID ? "image-button" : "button button-large"}
                onClick={obj.open}
              >
                {!attributes.logoID ? __("Upload Image", "imm") : <img src={attributes.logoURL} />}
              </Button>
            );
          }}
        />
      </>
    );
  },

  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function () {
    return null;
  }
});

registerBlockType("imm/store-map-block", {
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

  edit({ setAttributes, attributes }) {
    function onSelectImage(media) {
      return setAttributes({
        mapURL: media.url,
        mapID: media.id
      });
    };

    return (
      <>
        <h3>{__("Store Map", "imm")}</h3>
        <MediaUpload
          onSelect={onSelectImage}
          allowedTypes="image"
          value={attributes.mapID}
          render={(obj) => {
            return (
              <Button
                className={attributes.mapID ? "image-button" : "button button-large"}
                onClick={obj.open}
              >
                {!attributes.mapID ? __("Upload Image", "imm") : <img src={attributes.mapURL} />}
              </Button>
            );
          }}
        />
      </>
    );
  },

  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function () {
    return null;
  }
});

registerBlockType("imm/store-color-block", {
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

  edit({ className, setAttributes, attributes }) {
    function updateBlockValue(blockValue) {
      setAttributes({
        blockValue
      });
    }

    return (
      <div className={className}>
        <ColorPicker
          color="#f00"
          disableAlpha={true}
          value={attributes.blockValue}
          onChangeComplete={updateBlockValue}
        />
      </div>
    );
  },

  // No information saved to the block
  // Data is saved to post meta via attributes
  save: function () {
    return null;
  }
});