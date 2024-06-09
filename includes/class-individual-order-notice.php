<?php
defined( 'ABSPATH' ) || exit;
/*
 * Class Individual_Order_Notice.
 * @since 1.0.0
 * */
class Individual_Order_Notice {
    /**
     * File.
     *
     * @var string $file File.
     *
     * @since 1.0.0
     */
    public string $file;
    /**
     * Plugin Version.
     *
     * @var mixed|string $version Version.
     *
     * @since 1.0.0
     */
    public $version='1.0.0';
    /**
     * Constructor.
     *
     * @since 1.0.0
     */
    public function __construct($file, $version = '1.0.0') {
        $this->file = $file;
        $this->version = $version;
        $this->define_constant();
        $this->activation();
        $this->init_hooks();

    }
    /**
     * Constant Define.
     *
     * @since 1.0.0
     * @return void
     */
    public function define_constant() {
        define("IDON_VERSION", $this->version);
        define("IDON_FILE", $this->file);
        define("IDON_URI", plugin_dir_url($this->file));
        define("IDON_BASE", plugin_basename($this->file));
    }

    /**
     * Activation.
     *
     * @since 1.0.0
     * @return void
     */
    public function activation(){
        register_activation_hook(__FILE__,array( $this,'activation_hook'));
    }
    /**
     * Activations Hook.
     *
     * @since 1.0.0
     * @return void
     */
    public function activation_hook(){
       update_option(IDON_VERSION, $this->version);
    }
    /**
     * Init Hooks.
     *
     * @since 1.0.0
     * @return void
     */
    public function init_hooks(){
        add_action('plugins_loaded', array($this, 'load_textdomain'));
        add_action('admin_notices', array($this, 'show_notice'));
        add_action('woocommerce_after_add_to_cart_quantity' ,array($this,'show_sold_notice'));
    }
    /**
     * Load textdomain.
     *
     * @since 1.0.0
     * @return void
     */
    public function load_textdomain(){
        load_plugin_textdomain('individual-order-notice', false, plugin_basename($this->file));
    }
    /**
     * show admin notice.
     *
     * @since 1.0.0
     * @return void
     */
    public  function show_notice(){
        if ( !class_exists( 'WooCommerce' ) ) {
            printf( '<div id="message" class="notice is-dismissible notice-warning"><p>%s</p></div>', 'Individual order notice plugin" is required to use WooCommerce plugin.' );
        }
    }
    /**
     * show sold notice.
     *
     * @since 1.0.0
     * @return void
     */

public function  show_sold_notice(){
    global $product;
    if ($product->is_sold_individually()) {
        echo '<p class="sold-individually-message">Note: This item is sold individually. You can only purchase one per order.</p>';
    }
}

}



