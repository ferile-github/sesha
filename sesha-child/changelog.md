# Sesha Child theme changelog
All notable changes to this project will be documented in this file.

## [Changelog]
## [4.1.4] - September, October, November 2021
### Changed
- Updating to Bootstrap 5.1.3
- Added Widget Search Form styles
- Removed node-sass (deprecated) and replaced with dart-sass
- Updated all node packages
- Added error handling for logo and SVG fetching
- Fix to footer customizer options
- Fix to masthead logo, if no logo is present
- Updated Pattern Library, added better swatches, type, buttons
- Better handling of custom theme colours in dashboard editor
- Moved Bootstrap, Pattern Library and Woocommerce templates to parent theme

## [4.1.3] - June 2021
### Changed
- Added a print Picture element util
- Fix to Page banner slideshow
- Added better headings support
- Updated Cheatsheet with Admin Columns helper
- Cleaned up Blocks CSS and Editor CSS
- Added a Picture element util
- Removed unused color variables
- Updated Node Packages
- Cleaned up variables
- Vastly improved masthead options, better integration with WP Customizer,
- Fixed mobile layout for User Details
- Totally reworked theme masthead variables, incorporating CSS Custom Properties
- Pattern library cleanup
- Commented out unused Boostrap modules
- Fixed Mobile menu variables
- Fix to filters menu on shop page
- Update to GA Event Tracking utility
- Updated Print SVG util to return a string
- Moved responsive plugin HTML to parent theme
- Add Body Class function added to theme
- Better Search page template
- Updated WooCommerce Page templates

## [4.1.2] - March 2021
### Changed
- Fix to Woocommerce PDP grid layout thumbnails
- Fix to Woocommerce PDP mobile thumbnails slideshow
- Fix to Comments form button
- Fix to spacing variables
- Adding REST API customisations
- Updated to Bootstrap v5.0 Beta 2
- Added Stars for product ratings
- Reworked Customizer options, bringing in files from Sesha parent theme into child theme
- File renaming for masthead and footer
- Fixes to archive page titles
- Added local variable to sesha child script
- Updated Cheat Sheet

## [4.1.1] - February 2021

### Changed
- Fix to Woocommerce Ajax Add to cart, updates the counter properly
- Added customizer options for PDP and PLP pages for Add to cart
- Fix to sizing guide modal
- Better Support for post tags
- Cleaned up blog templates
- Header cleanup
- Added baset rename for Woocommerce
- Added Blog Layout options to Customizer : left/right sidebar, post grid/row layout
- Moved Body tag class logic to parent theme


## [4.0.0] - January 2021
### Changed
- Upgraded jQuery Version to 3.5.1
- Upgraded Bootstrap to ver 5.0 Beta
- Adding Bootstrap JS component examples
- Added Bootstrap components demo page template
- Cleaned up Bootstrap elements page template
- Removed custom accordion and replaced with Bootstrap Accordion
- Added fix for Bootstrap Modal display
- Cleaned up Sesha parent theme files, moved some child functions into parent
- Removed LiveReload
- Added better variables for buttons and forms
- Cleaned up Screen Reader text class and mixin
- Using Bootstrap Accordion for PDP
- Font Awesome icons cleanup
- Banner slideshow file rename
- Added santise callbacks for all Customizer settings
- Added new Customizer Theme option for message bar in masthead
- Remove Multiple Checkboxes control

## [3.9.7] - November 2020

### Changed
- Woocommerce login form update
- Added body text utility
- Better Blog Content excerpt with categories shown
- Cleaned up Blog full article template
- Added useful variables
- Added Banner for Blog Posts page support


### Added
- CheatSheet.php
- Custom Post single and archive template example


## [3.9.6] - 2020 August

### Added
- Updating to Bootstrap 4.5.2



## [3.9.5] - 2020 July

### Added
- Social media Youtube link added to masthead
- Added Whatsapp to social media options
- Fix to FTP upload CSS files
- Packages updates
- Added more custom variables


## [3.9.4] - 2020 17 June

### Added
- Fix to slideshow banner
- Converted Custom post type into a class, easier to create custom post types now
- Added customizer options for no Accordion/Tabs for PDP
- Added customizer option for no PDP zoom
- Added customizer option for no search or cart
- Added Grid layout option for PDP thumbnails



## [3.9.3] - 2020 16 February

### Added
- LiveReload makes a comeback, and it works!
- Added WebFont loader back for font customizer options
- Queued up the parent stylesheet correctly
- Added animation base classes, and faded in content pages
- Moved SESHA_THEME_BUILDER to sesha-child, fixed bug with style-parent.css being loaded incorectly
- Added taxonomy filters to custom post type

### Changed
- Fixed the Theme builder customizer panels

## [3.9.2] - 2020 28 January

### Added
- Overlays to search and cart for desktop
- Mobile only main menu
- User details login and social media in header
- Added Social media masthead toggle
- Added Wordpress Gutenberg styling to page editor title
- Option for PDP additional Tab

### Changed
- Fixed PLP banner code, was returning an error for the shop page
- Lost and forgotten password page layouts
- Footer layout when there is nothing to show, ie widgets, contact details, social media
- Improved handling of no values for theme options when there is a fresh install of the theme

## [3.9.1] - 2020 4 January

### Added
- Added FTP deploy facility to gulp.js
- Added Mailchimp Newsletter support

### Changed
- Moved gulp.js to root
- Fixed a bug with the sizing guide on PDP

## [3.9] - 2019 26 December


### Added
- Added new blocks, Video, Adaptive image and Slideshow
- Added animation.css library
- Added Default Google font, removed font loader
- PDP page layout engine added, with overall better responsive layout
- Better PDP Image gallery and preview for mobile and desktop
- Added Accordion and Tabs to PDP
- Added Alternate Image rollover for PLP

### Changed
- Updated WooCommerce templates - 3.8.1
- Fixed PDP layout
- Sizing guide page template and modal added
- Footer titles added for each section
- Fix to search forms buttons
- Converted responsive.js to a jquery plugin
- Refactored scripts to accommodate this change
- Moved WooCommerce related scripts to seperate file, enqueued as needed
- Updated Bootstrap Scripts
- Removed button outline default
- Slick slideshow defaults added
- Reviews layout fixed
- Hidden cart count on cart page
- Moved products upsell in cart to bottom of page
- Fix to PDP upsells
- Removed content-product template
- Updated Quantity Stepper
- Better Cart Drop down menu
- Fix to product layout on mobile

## [3.8.0] - 2019 28 October

### Changed
- Updating to Gulp 4, new gulp.js file and dependancies
- Fixed some deprecated SASS lines


## [3.7.1] - 2019 14 September

### Changed
- Better Search drop down in masthead
- Font sizes for headings
- Masthead code improvements
- Lazy loading added to thumbnails
- Removed unused partials
- Adding Gutenberg color picker support
- Added Aria roles for buttons

## [3.7.0] - 2019 4 August

### Changed
- Added ACF blocks support

## [3.6.0] - 2019 28 July

### Changed
- Updated to Bootstrap 4.3

## [3.5.4] - 2019 15 July

### Changed
- Added support for custom post type pagination
- Page layout improvements
- Woocommerce bug fix to banner
- Added responsive text mixin
- Added support for categories and taxonomies for banner slideshow
- Added custom taxonomy columns to example csutompost type

## [3.5.3] - 2019 8 July

### Changed
- Custom Post Type Cleanup, added renaming of Featured Image

## [3.5.2] - 2019 7 May

### Changed
- Removed Google+ from social customizer options. Added Youtube in place


## [3.5.1] - 2019 28 February

### Added
- Masthead and Footer templates updated
- Base HTML for contact and signup forms
- Contact Us page template
- FAQ page template
- Added text colours to MCE
- New customizer option
- Better Page struture and layout wrappers
- Added Terms and Conditions SCSS


## [3.5.0] - 2018 27 November

### Added
- Created parent style sheet for theme builder styles
- Organised masthead and footer SCSS in child theme
- General styles cleanup for Development theme
- Woocommerce Mesasging bar customizer option
- Woocommerce My Account banner customizer option



## [3.4.2] - 2018 20 November

### Added
- Added WooCommerce patterns to pattern library
- Added sizing guide button to PDP
- Added customizer options for development theme


### Changed
- Checkout and Cart layout improved
- Fix to dynamic fonts loader
- WooCommerce templates updated
- Minor bug fixes
- Removed live reload
- WooCommerce information tabs moved
- Updated Gulp file with nano

## [3.4.1] - 2018 10 October

### Changed
- Site search fix for all headers
- Added templates for search and toggle button
- Updated zoom plugin
- Removed Modernizer, it was buggy and dont need touch events detection
- Updated responsive.js, removing Modernizr references

## [3.4.0] - 2018 1 October

### Added
- More footer variations for theme builder, added widget area
- Updated Bootstrap to 4.1.3

### Changed
- Fixed button styling to work better with theme builder
- Fixes to My Account layout
- Added ACF.json for standard custom fields
- Comments form fixes
- Fixes to banner slideshow and PLP banner
- Some filename housecleaning
- Blog listing layout
- Added Woocommerce thumbnails and SKU to emails

## [3.3.0] - 2018 18 September

### Added
- Theme options for header and footer variations
- Added SESHA_THEME_BUILDER constant to toggle theme builder options
- Split out Theme Builder template files into parent theme


## [3.2.1] - 2018 6 June

### Changed

- Updated WooCommerce templates : 3.4.0
- Fix to Cart Billing page layout

## [3.2.0] - 2018 30 May

### Added

- Added BODY class for banner presence, improved handling of CSS for banner
- Added LiveReload for CSS, JS and PHP
- Added Footer Widget area for content Widgets
- Added missing spinner for loading on Contact Form

### Changed

- Contact Form layout improvements, added Radio buttons support
- Improved Slideshow banner, now uses responsive background images

## [3.1.0] - 2018 7 May

### Added

- My Account, Login/Register screen layout and messaging
- Single column product layout added
- Added Sesha logo to footer
- Collapsible filters on PLP
- Product excerpt on PLP items

### Changed

- Updated to Bootstrap 4.1
- PDP and PLP Layout enhancements
- Updated Slick Slider plugin, and base styling
- Minicart remove products bug fix
- Fix to Customiser, added a better gulp build for these scripts
- Fix to PLP banner
- Featured Products template part
- Various visual tweaks

## [3.0.0] - 2018-07-05

### Started a changelog

- Better now than never!
- Updated to Bootstrap 4
- Added Woocommerce features


The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).
