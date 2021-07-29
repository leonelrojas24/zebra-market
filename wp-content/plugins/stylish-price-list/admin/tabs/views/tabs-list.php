<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<div class="price_wrapper">
<?php
include_once SPL_DIR . '/admin/tabs/views/tabs-form/logo-header.php';
?>
</div>
<style>
    p.free_version {
        font-weight: bold;
        font-size: 17px;
    }
    p.free_version span.highlighted {
        color: #5bb3a7;
    }
    span.highlighted a {
        color: #5bb3a7;
    }
</style>
<div class="wrap">
    <h2><?php _e( 'Lists', 'spl' ); ?> <a href="<?php echo admin_url( 'admin.php?page=spl-tabs-new' ); ?>" class="add-new-h2"><?php _e( 'Add New', 'spl' ); ?></a></h2>
    <?php if (array_key_exists('error', $_GET)): ?>
        <div class="notice notice-error"><p><?php esc_html_e( $_GET['error'], 'text_domain' ); ?></p></div>
    <?php endif; ?>
    <?php if (array_key_exists('success', $_GET)): ?>
        <div class="notice notice-success"><p><?php esc_html_e( $_GET['success'], 'text_domain' ); ?></p></div>
    <?php endif; ?>
    <?php
    /*$opt=get_option('spllk_opt');
         if(empty($opt)){
             echo '<p class="free_version" style="font-size:18px;">You are using the <span class="highlighted">Demo</span> version of the plugin. Click <span class="highlighted"><a href="https://stylishpricelist.com/">here</a></span> to buy the pro version.</p>';
         }*/
         ?>
         <form method="post">
            <input type="hidden" name="page" value="ttest_list_table">
            <?php
            $list_table = new Stylish_Price_List_Tabs_List();
            $list_table->prepare_items();
            $list_table->search_box( 'search', 's' );
            $list_table->display();
            ?>
        </form>
    </div>
    <?php
    include_once SPL_DIR . '/admin/tabs/views/tabs-form/logo-footer.php';
    ?>