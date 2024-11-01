<?php
    /**
     *  Plugin Name: WPO365 SharePoint Online
     *  Plugin URI: http://wordpress.org/plugins/wpo365-spo/
     *  Description: Enrich your corporate Wordpress intranet with a seamlessly integrated SharePoint Online Search Center. Start today and join millions of others by discovering the power of Office 365 and change your corporate intranet into a modern workplace.
     *  Version: 2.0
     *  Author: info@wpo365.com
     *  Author URI: https://www.wpo365.com
     *  License: GPLv2 or later
     */

    namespace Wpo;

    // Prevent public access to this script
    defined( 'ABSPATH' ) or die();

    $GLOBALS[ 'WPO365_SPO_PLUGIN_DIR' ] = __DIR__;
    $GLOBALS[ 'WPO365_SPO_PLUGIN_URL' ] = plugin_dir_url( __FILE__ );
    $GLOBALS[ 'WPO365_SPO_PLUGIN_FILE' ] = __FILE__;
    $GLOBALS[ 'PLUGIN_VERSION_wpo365_spo' ] = '2.0';

    require_once( $GLOBALS[ 'WPO365_SPO_PLUGIN_DIR' ] . '/Wpo/Spo/Wpo365_Spo.php' );
    \Wpo\Spo\Wpo365_Spo::getInstance();