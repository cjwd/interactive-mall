import { registerBlockType } from "@wordpress/blocks";
import { __ } from "@wordpress/i18n";
import { DateTimePicker } from "@wordpress/components";

registerBlockType("imm/deal-expirydate-block", {
  title: __("Deal Expiry Date", "imm"),
  icon: "admin-tools",
  category: "common",
  attributes: {
    blockValue: {
      type: "string",
      source: "meta",
      meta: "_imm_deal_expirydate"
    }
  },
  edit({ attributes, setAttributes }) {
    function onChange(value) {
      setAttributes({ blockValue: value });
    }
    return (
      <DateTimePicker currentDate={new Date()} onChange={onChange} />
    );
  },
  save() {
    return null;
  }
});