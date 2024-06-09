<?php
/*
 * Plugin Name:       Individual Order Notice
 * Plugin URI:        https://woocopilot.com/plugins/woo-custom-price/
 * Description:       The Individual Order Notice plugin is designed to enhance the customer experience on your WooCommerce store by enforcing a strict order limit and providing clear notifications when the limit is exceeded. This plugin ensures that customers can only place one order at a time, preventing multiple orders and potential stock issues.
 * Version:           1.0.1
 * Requires at least: 6.5
 * Requires PHP:      7.2
 * Author:            WooCopilot
 * Author URI:        https://woocopilot.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       individual-order-notice
 * Domain Path:       /languages
 */
/*
Individual Order Notice is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Individual Order Notice is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Individual Order Notice. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

defined( 'ABSPATH' ) || exit;

//includes class.
require_once __DIR__ .'/includes/class-individual-order-notice.php';
/**
 * Initializing plugin.
 *
 * @since 1.0.0
 * @return Object Plugin object.
 */
function individual_order_notice() {

    return new Individual_Order_Notice (__FILE__,'1.0.0');
}

individual_order_notice();