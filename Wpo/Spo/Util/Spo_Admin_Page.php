<?php

    namespace Wpo\Spo\Util;
        
    // Prevent public access to this script
    defined( 'ABSPATH' ) or die();

    if( !class_exists( '\Wpo\Spo\Util\Spo_Admin_Page' ) ) {

        class Spo_Admin_Page {

            public function __construct() {
                add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
            }

            /**
             * Definition of the Options page (following default Wordpress practice).
             * 
             * @since 2.0
             * 
             * @return void
             */
            public function add_plugin_page() {

                // This page will be under "Plugins"
                add_management_page(
                    'WPO365 SharePoint',                        // page title
                    'WPO365 SharePoint',                        // menu title
                    'edit_posts',                               // capabilities
                    'wpo365-spo-admin',                         // page slug
                    array( $this, 'wpo365_spo_admin_page' )     // callback to render page
                );
            }

            /**
             * 
             */
            public function wpo365_spo_admin_page() {

                ?>

                <!-- Dependencies -->
                <script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
                <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>

                <!-- Main -->
                <div>
                    <script src="<?php echo $GLOBALS[ 'WPO365_SPO_PLUGIN_URL' ] ?>apps/dist/cfg.js"
                            data-nonce="<?php echo wp_create_nonce( 'wpo365_fx_nonce' ) ?>"
                            data-wpajaxadminurl="<?php echo admin_url() . '/admin-ajax.php' ?>">
                            data-props="">
                    </script>
                    <!-- react root element will be added here -->
                </div>

                <div class="">
                    <div class="notice notice-info is-dismissible" style="margin-top: 25px;">
                        <article style="display: flex; flex-wrap: wrap;">
                            <div style="flex-grow: 0.1; flex-shrink: 0.9;">
                                <img width="256" height="256" src="https://www.wpo365.com/wp-content/uploads/2018/08/spo-premium-icon-256x256.png">
                            </div>
                            <div style="flex-grow: 0.9; flex-shrink: 0.1; padding-left: 10px;">
                                <div>
                                    <h2>WPO365 SharePoint Online (premium)</h2>
                                </div>
                                <div>
                                    <p><strong><a href="https://www.wpo365.com/downloads/wordpress-sharepoint-online-premium/" target="_blank">Upgrade</a></strong> today and unlock the following premium features</p>
                                    <ul style="list-style: inherit; margin-left: 20px;">
                                        <li>Enhanced <strong>user result cards</strong> displaying a user's profile picture (from Microsoft Graph) and detailed job and contact information</li>
                                        <li>Number of <strong>results per page</strong> can be configured</li>
                                        <li>The <strong>number of columns</strong> on a result page can be changed (two, three or four columns)</li>
                                        <li>The <strong>result source id</strong> (default: Local SharePoint Results) can be changed e.g. to "Local SharePoint People"</li>
                                        <li>Default <strong>sorting</strong> (by Rank, descending) can be overridden</li>
                                        <li><strong>Query template</strong> can added to limit search results contextually e.g. "Department:Marketing {searchterms}*"</li>
                                        <li>Behavior of <strong>incremental search</strong> can be adjusted</li>
                                        <li>One <strong>support</strong> item included</li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                <?php
            }
        }
    }
