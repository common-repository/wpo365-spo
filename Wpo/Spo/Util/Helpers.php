<?php

    namespace Wpo\Spo\Util;

    // Prevent public access to this script
    defined( 'ABSPATH' ) or die();

    use \Wpo\Spo\Util\Logger;

    if( !class_exists( '\Wpo\Spo\Util\Helpers' ) ) {
            
        class Helpers {
            /**
             * Checks plugin version 
             *
             * @since 0.1
             *
             * @return  Current URL as string without query string
             */
            public static function check_version() {
                
                // Get plugin version from db
                $plugin_db_version = get_site_option( 'wpo365-spo-version' );

                // Add new option if not yet existing
                if( false === $plugin_db_version ) {

                    update_site_option( 'wpo365-spo-version', $GLOBALS[ 'PLUGIN_VERSION_wpo365_spo' ] );
                    self::track( 'install' );
                    return;
                }
                // Compare plugin version with db version and track in case of update
                elseif( $plugin_db_version != $GLOBALS[ 'PLUGIN_VERSION_wpo365_spo' ] ) {

                    update_site_option( 'wpo365-spo-version', $GLOBALS[ 'PLUGIN_VERSION_wpo365_spo' ] );
                    self::track( 'update' );
                }

            }

            /**
             * Sends an anonoymous event to google to track plugin installation or update
             *
             * @since 0.1
             *
             * @param   string  Name of event to track (default is install)
             * @return  Current URL as string without query string
             */
            public static function track( $event ) {

                $plugin_version = $GLOBALS[ 'PLUGIN_VERSION_wpo365_spo' ];
                $event .= '_spo';

                $ga = "https://www.google-analytics.com/collect?v=1&tid=UA-5623266-11&aip=1&cid=bb923bfc-cae8-11e7-abc4-cec278b6b50a&t=event&ec=alm&ea=$event&el=wpo365-spo_$plugin_version";

                $curl = curl_init();

                curl_setopt( $curl, CURLOPT_URL, $ga );
                curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );

                curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 ); 
                curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 0 ); 
                
                $result = curl_exec( $curl ); // result holds the keys
                if( curl_error( $curl ) ) {
                    
                    // TODO handle error
                    Logger::write_log( 'ERROR', 'error occured whilst tracking an alm event: ' . curl_error( $curl ) );

                }
                
                curl_close( $curl );

            }
        }
    }
?>