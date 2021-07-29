<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<nav class="navbar navbar-default df-spl-edit-nav">
       <!--<br><br>
       <a href="http://designful.ca/apps/stylish-price-list-wordpress/" class="spl-header logo">
            <img src="<?php //echo SPL_URL . '/assets/images/logo.png'; ?>" class="img-responsive1" alt="Image" style="height:42px">
        </a>
        <br>-->
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="http://designful.ca/apps/stylish-price-list-wordpress/" class="spl-header">
                    <!--<img src="<?php echo SPL_URL . '/assets/images/list-header.png'; ?>" class="img-responsive1" alt="Image">-->
                    <img src="<?php echo SPL_URL . '/assets/images/Stylish-Price-List-Logo-418x134.png'; ?>" class="img-responsive1" alt="Image" style="max-height: 40px;margin-top:20px;">
                </a>
                <?php
                $opt=get_option('spllk_opt');
                if(empty($opt)){
                    ?>
                    <span class="spl_plug_ver">Demo</span>
                <?php }
                if(!empty($opt)){
                    ?>
                    <span class="spl_plug_ver">Premium</span>
                <?php } ?>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav edit-page-nav navbar-right">
                <li style="margin-right:15px;" class=""><a href="https://designful.freshdesk.com/support/solutions/48000446986" target="_blank" id="myBtnSupport">KNOWLEDGE BASE</a></li>
                <li style="margin-right:15px;"class=""><a href="https://designful.freshdesk.com/support/solutions/articles/48001184064-basics-explained-how-do-i-use-stylish-price-list-" id="myBtnSupport" target="_blank">VIDEO TUTORIAL</a></li>
                <li style="margin-right:15px;"><a href="https://stylishpricelist.com/live-preview/" target="_blank">LIVE DEMO</a></li>
                <li style="margin-right:15px;"><a href="https://stylishpricelist.com/support" target="_blank">CCONTRACT SUPPORT</a></li>
                </ul>
            </div>
        </div>
</nav>
<style type="text/css">
    .spl_plug_ver{
        position: relative;
        top: -6px;
        font-weight: 700;
        font-size: 16px;
        color: #5bb3a7;
        text-transform: uppercase;
    }
    .spl-header{
        display: inline-block;
    }
    .spl-header.logo{
        position: relative;
        top: -20px;
    }
    img.img-responsive1 {
        max-width: 80%;
        height: auto;
    }
    .inner-footer-logo-section h4 {
        float: left;
        margin-right: 16px;
    }
    .inner-footer-logo-section {
        float: right;
    }
    .inner-footer-logo-section {
        margin-top: 26px;
    }
    .inner-footer-logo-section img {
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
    }
    .inner-footer-logo-section img {
        width: 47%;
    }
    .inner-footer-logo-section {
        width: 200px;
    }
</style>