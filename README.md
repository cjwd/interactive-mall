# Interactive Mall Plugin

Requires at least: 5.0.0
Tested up to: 5.2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

# Description

Interactive 3D mall plugin based on the Codrops mall demo - https://tympanus.net/Development/Interactive3DMallMap/

# Installation

1. Upload `imm.php` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create a page for your mall map and keep the page id in mind
4. Go to settings and configure the map

# Shortcodes

Display a list of stores anywhere in your website using the `[imm_stores]` shortcode

## Shortcode Attributes

### Store List Layout

Set the layout of the store list between grid or vertical list. Default value is grid.

Example:

```
[imm_stores view="list"]
```

### Title

Displays a title above the list of stores.
Default value is an empty string.

Example:

```
[imm_stores title="My Stores"]
```

### Map

Show map location image.
Default value is false.

Example:

```
[imm_stores map="true"]
```

### Size

Show square footage of store space.
Default value is false.

Example:

```
[imm_stores size="true"]
```

### Floor

Show mall floor or level where store is located.
Default value is false.

Example:

```
[imm_stores floor="true"]
```

### Image

Show store featured image.
Default value is true.

Example:

```
[imm_stores image="true"]
```

### Description

Show store description.
Default value is false.

Example:

```
[imm_stores description="true"]
```

### Show Categories

Show assigned store categories.
Default value is false.

Example:

```
[imm_stores show_categories="true"]
```

### Categories

Limit the displayed stores to specific categories.
Default value is an empty string. Value should be a comma separated list of category IDs.

Example:

```
[imm_stores categories="5,6,7"]
```

### Exclude Categories

Exclude stores that belong to specific categories.
Default value is an empty string. Value should be a comma separated list of category IDs.

Example:

```
[imm_stores exclude_categories="5,6,7"]
```

### Show Pagination

Display pagination, works in conjunction with _num_stores_ attribute.
Default value is true.

Example:

```
[imm_stores show_pagination="false"]
```

### Button Text

Text for the button for each store
Default value is View Store.

Example:

```
[imm_stores btn_text="Lease Shop"]
```

### Button URL

The link for the store button
Default value is permalink to the store page.

Example:

```
[imm_stores btn_url="/tenancy-application-form"]
```

### Link Text

Text for the link that appear after the store list. The link is only displayed if link_url is set.
Default value is View All.

Example:

```
[imm_stores link_text="View All Stores"]
```

### Link URL

The URL for the link displayed after the store list.
Default value is an empty string which causes the link not to show.

Example:

```
[imm_stores link_url="/all-stores"]
```
