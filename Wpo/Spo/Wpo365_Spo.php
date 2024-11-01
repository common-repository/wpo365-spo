<?php

    namespace Wpo\Spo;

    // Prevent public access to this script
    defined( 'ABSPATH' ) or die();

    use Wpo\Spo\Util\Spo_Admin_Page;
    use Wpo\Spo\Util\Helpers;

    if( !class_exists( '\Wpo\Spo\Wpo365_Spo' ) ) {

        class Wpo365_Spo {

            private static $instance;

            public static function getInstance() {

                if( empty( self::$instance ) ) {

                    self::$instance = new Wpo365_Spo();
                }
            }

            private function __construct() {
                require $GLOBALS[ 'WPO365_SPO_PLUGIN_DIR' ] . '/vendor/autoload.php';
                new Spo_Admin_Page();

                add_action( 'plugins_loaded', function() {

                    if( is_admin() ) {
                        
                        if( false === self::required_plugins() )
                            return;

                        Helpers::check_version();
                    }

                    

                }, 1 ); // Must load with highest priority
            }
    
            /**
             * Checks for the minimal required version of wpo365-login(-premium)
             * 
             * @since 1.0
             * 
             * @return boolean true if found otherwise false
             */
            private static function required_plugins() {

                require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

                $dependency_error = false;

                // wpo365-login must be installed and activated
                if( false === self::plugin_exists( 'wpo365-login/wpo365-login.php', true, '6.1' ) 
                    && false === self::plugin_exists( 'wpo365-login-premium/wpo365-login.php', false, '5.2' ) ) {
                    self::show_incompatibility_warning( '<strong>WPO365 SharePoint Online</strong> plugin has been deactivated: Please install and activate <strong>WPO365 Login (personal use)</strong> plugin (version >= 6.1) or <strong>WPO365 Login (premium)</strong> plugin (version >= 5.2) first.' );
                    $dependency_error = true;
                }

                if( true === $dependency_error ) {
                    $plugin_file =  $GLOBALS[ 'WPO365_SPO_PLUGIN_DIR' ] . '/wpo365-spo.php';
                    deactivate_plugins( $plugin_file );
                    return false;
                }

                return true;
            }

            /**
             * Shows a warning that the plugin is not working correctly until the latest version of the
             * wpo365-login is installed
             * 
             * @since 1.0
             * 
             * @return void
             */
            private static function show_incompatibility_warning( $warning ) {

                add_action( 'admin_notices', function() use ( $warning ) {

                    echo '<div class="notice notice-error"><p>' . $warning . '</p></div>';
                }, 10, 0 );
            }

            /**
             * Checks for a plugin and its version
             * 
             * @since 1.0
             * 
             * @param string $plugin_id plugin slug and file e.g. wpo365-login/wpo365-login.php
             * @param string $version_string minimal required plugin version e.g. '5'
             */
            private static function plugin_exists( $plugin_id, $is_activated, $version_string ) {

                if ( ! function_exists( 'get_plugins' ) ) {

                    require_once ABSPATH . 'wp-admin/includes/plugin.php';
                }
            
                $plugins = get_plugins();

                $exists = array_key_exists( $plugin_id, $plugins ) 
                          && array_key_exists( 'Version', $plugins[ $plugin_id ] ) 
                          && floatval( $plugins[ $plugin_id ][ 'Version' ] ) >= floatval( $version_string );

                if( false === $is_activated ) 
                    return $exists;
                else
                    return $exists && is_plugin_active( $plugin_id );
            }
        }
    }