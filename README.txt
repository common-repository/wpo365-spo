=== Wordpress + SharePoint Online ===
Contributors: wpo365
Donate link: https://www.wpo365.com
Tags: office 365, O365, sharepoint, sharepoint online, microsoft, collaboration
Requires at least: 4.8.1
Tested up to: 5.0
Stable tag: 2.1
Requires PHP: 5.3.29
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==

THE FEATURES OF THIS PLUGIN HAVE BEEN INTEGRATED WITH [Wordpress + O365 login](https://wordpress.org/plugins/wpo365-login/). THIS PLUGIN IS NO LONGER MAINTAINED. CLICK THE FOLLOWING LINK FOR DETAILS: (SHAREPOINT - CONTENT BY SEARCH)[https://www.wpo365.com/content-by-search/].

= Plugin Features =

- Offers seamless integration between SharePoint Online / Office 365 and WordPress
- Lets users search for content such as workspaces, colleagues, documents and tasks
- A fresh and modern ui with search result cards
- Supports a mobile search experience (depends on your Wordpress theme)
- Offers pagination to help users navigate a large number of search results
- Indictates when no search results are found
- Searches incrementally whilst typing

= Prerequisites =

- [Wordpress + O365 login](https://wordpress.org/plugins/wpo365-login/) to sync Wordpress and Office 365 users
- [Redux Framework Plugin](https://wordpress.org/plugins/redux-framework/) to configure the various options 
- Wordpress >= 4.8.1 
- PHP >= 5.3.29
- You need to be (Office 365) Tenant Administrator to configure both Azure Active Directory and the plugin

= Support =

We will go to great length trying to support you if the plugin doesn't work as expected. Go to our [Support Page](https://www.wpo365.com/how-to-get-support/) to get in touch with us. We haven't been able to test our plugin in all endless possible Wordpress configurations and versions so we are keen to hear from you and happy to learn!

= Feedback =

We are keen to hear from you so share your feedback with us at info@wpo365.com or chat with us on Twitter @WPO365 and help us get better!

== Installation ==

Please refer to [our documentation](https://www.wpo365.com/wpo365-spo-documentation/) for detailed installation and configuration instructions. Once the plugin has been configured you can use the following shortcode [wpo365-content-by-search-sc] to turn any page into a SharePoint Online Search Center.

== Frequently Asked Questions ==

== Screenshots ==

1. Local SharePoint search results

== Upgrade Notice ==

THE FEATURES OF THIS PLUGIN HAVE BEEN INTEGRATED WITH [Wordpress + O365 login](https://wordpress.org/plugins/wpo365-login/). THIS PLUGIN IS NO LONGER MAINTAINED. CLICK THE FOLLOWING LINK FOR DETAILS: (SHAREPOINT - CONTENT BY SEARCH)[https://www.wpo365.com/content-by-search/].

== Changelog ==

= 2.0 =
* Change: The app is now a Pintra Framework app and uses the new AJAX token service from the wpo365-login plugin
* Change: Added a Pintra Framework shortcode generator - Now it's a breeze to configure the app

= 1.3 =
* Fix: Access token will only be requested on pages where the app is added using the shortcode
* Fix: Don't delete plugin version number each time the plugin is loaded
* Refactoring: Standardized the naming of the user meta key used to cache the access token
* Refactoring: Reduced the number of dependencies on the wpo365-login plugin

= 1.2 =
* Fix: item path property was wrongly set to author"

= 1.0 =
* The plugin has been fully modernized and re-written from the ground up to better intergrate with the other WPO365 plugins for user authentication, registration and synchronization
* Using the short code [wpo365-content-by-search-sc] any page can be turned into a SharePoint Online Search Center
* Support for incremental searching

= 0.3 =
* Fixed compatibility issue with wpo365-login-premium plugin

= 0.2 =
* Introduced a custom css stylesheet and removed semantic-ui
* Added awesome font icons
* Removed unused dependencies such as knockout js and corresponding settings
* Removed custom css settings
* Some small code refactoring

= 0.1 =
* Initial version submitted to Wordpress.org