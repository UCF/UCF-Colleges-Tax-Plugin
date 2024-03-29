# UCF College Taxonomy Plugin #

Provides a custom taxonomy for describing UCF Colleges.


## Description ##

Provides a custom taxonomy for describing UCF Colleges. Designed to leverage default WordPress templates and be overridden by taxonomy specific templates.


## Installation ##

### Manual Installation ###
1. Upload the plugin files (unzipped) to the `/wp-content/plugins` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the "Plugins" screen in WordPress

### WP CLI Installation ###
1. `$ wp plugin install --activate https://github.com/UCF/UCF-Colleges-Tax-Plugin/archive/master.zip`.  See [WP-CLI Docs](http://wp-cli.org/commands/plugin/install/) for more command options.


## Changelog ##

### 2.0.1 ###
Enhancements:
* Added composer file.

### 2.0.0 ###
Enhancements:
* Modified college slugs to be singular (`/college/`) instead of plural (`/colleges/`).  Note that this is a breaking change, and requires flushing permalink settings manually to take effect.

### 1.0.1 ###
Enhancements:
* Added rest api endpoint.
* Added alias custom term meta to api endpoint.

### 1.0.0 ###
* Initial Release

## Upgrade Notice ##

### 2.0.0 ###
Taxonomy permalinks have been modified (`colleges` -> `college`).  Permalink settings must be flushed manually for this change to take effect when upgrading from v1.0.x.


## Installation Requirements ##

None


## Development & Contributing ##

NOTE: this plugin's readme.md file is automatically generated.  Please only make modifications to the readme.txt file, and make sure the `gulp readme` command has been run before committing readme changes.

### Wishlist/TODOs ###
* Provide simple default templates that can be overridden in the theme.
