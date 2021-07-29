<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class Stylish_Price_List_Settings {
    // var $license_return ='';
    public function __construct() { 
        add_action( 'admin_init', array($this,'admin_init') );
        add_action( 'admin_menu', array($this,'admin_menu'), 90 );
        $this->license_return =get_option('spl_license_return');
    }
    function admin_init()
    {
        register_setting('stylishpl_options','stylishpl_license_key',array($this,'process_key'));
    // register_setting('stylishpl_options','stylishpl_license_key');
    }
    function process_key($key)
    {
        // ob_start();
        // print_r($_REQUEST);
        // $data=ob_get_clean();
        // file_put_contents(dirname(__FILE__) . '/_REQUEST.log',$data,FILE_APPEND);
        // ob_start();
        // print_r($key);
        // echo PHP_EOL;
        // $data=ob_get_clean();
        // file_put_contents(dirname(__FILE__) . '/key.log',$data,FILE_APPEND);
        // $key=$in['stylishpl_license_key'];
        if(isset($_REQUEST['df-spl-activate'])){
            $license_return=$this->activate($key);
        }else if(isset($_REQUEST['df-spl-deactivate'])){
            $license_return=$this->deactivate($key);
        }
        update_option('spl_license_return',$license_return);
        // set_option();
        // ob_start();
        // print_r($this->license_return);
        // $data=ob_get_clean();
        // file_put_contents(dirname(__FILE__) . '/license_return.log',$data,FILE_APPEND);
        return $key;
    }
    function checkbox($name, $options=array(),$current_value_arr=array())
    {
        ob_start();
        ?>
        <div class="checkbox">
            <?php foreach ($options as $value => $label): 
                $checked='';
        if(in_array($value,$current_value_arr) != false){//find the value
            $checked=' checked="checked"';
        }
        ?>
        <label>
            <input name="<?php echo $name . '[]'; ?>" type="checkbox" value="<?php echo $value; ?>" <?php echo $checked; ?>>
            <?php echo $label; ?>
        </label>
    <?php endforeach ?>
</div>
<?php
$html=ob_get_clean();
return $html;
}
function select($name, $options=array(),$current_value='')
{
    ob_start();
    ?>
    <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-control">
        <?php foreach ($options as $value => $label): 
            $selected='';
            if($current_value==$value){
                $selected=' selected="selected"';
            }
            ?>
            <option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $label; ?></option>
        <?php endforeach ?>
    </select>
    <?php
    $html=ob_get_clean();
    return $html;
}
function option_page()
{
    ob_start();
    echo "<div class=\"price_wrapper\">";
    include_once SPL_DIR . '/admin/tabs/views/tabs-form/logo-header.php';
    echo "</div>";
    $stylishpl_license_key=get_option('stylishpl_license_key');
    $icon_class='dashicons-no';
    $icon_style='color:red;';
    $opt=get_option('spllk_opt');
    if(!empty($opt)){
        $icon_class='dashicons-yes';
        $icon_style='color:green;';
    }
// ob_start();
// print_r($_REQUEST);
// $data=ob_get_clean();
// file_put_contents(dirname(__FILE__) . '/_POST.log',$data,FILE_APPEND);
// if(isset($_REQUEST['activate'])){
//     $license_return=$this->activate($stylishpl_license_key);
// }else if(isset($_REQUEST['deactivate'])){
//     $license_return=$this->deactivate($stylishpl_license_key);
// }
    if( isset($_GET['settings-updated']) && !empty($opt)) { ?>
        <div id="message" class="updated">
            <p><strong><?php _e('Settings saved.') ?></strong></p>
        </div>
    <?php } ?>
    <style>
        body{font-family: 'Lato', sans-serif;font-weight: 400;-webkit-font-smoothing: antialiased;text-rendering: optimizeLegibility;}
    </style>
    <div class="wrap"><?php screen_icon(); ?>
    <h3 style="padding-top:50px;font-size: 24px;font-weight: 900;margin-bottom: 10px;">Stylish Price Premium License</h3>
    <p style=" font-size: 18px; font-weight: 300;line-height: 20px;  margin-bottom: 30px;">Please enter the license that you received by email.<Br> You can purchase a license <a href="https://stylishpricelist.com/" target="_blank">here</a></p>
    <form action="options.php" method="post" id=stylishpl-admin-options-form"> 
        <?php settings_fields('stylishpl_options'); ?>
        <?php if(isset($opt['result']) && $opt['result'] != 'success'){ $class = 'spl_disabled'; }else{ $class = '';} ?>
        <style type="text/css">
            input.button.button-default.spl_disabled {
                pointer-events: none;
                cursor: default;
                text-decoration: none;
                opacity: 0.5;
            }
            .dashicons-no::before,
            .dashicons-yes::before {
                font-size: 45px;
            }
        </style>
        <label for="stylishpl_license_key"></label><br/>
        <input type="password" id="stylishpl_license_key" name="stylishpl_license_key" style="width:390px;padding: 9px 20px;text-align: left;border: 0;
        outline: 0;border-radius: 6px; background-color: #fff; font-size: 15px; font-weight: 300; color: #8D8D8D; -webkit-transition: all 0.3s ease; transition: all 0.3s ease;margin-bottom: 14px;" value="<?php echo $stylishpl_license_key; ?>" /><span class="<?php echo $icon_class; ?> dashicons-before" style="<?php echo $icon_style; ?>"></span><br/>
        <p>
            <input type="submit" style="height:30px;width:100px;border-radius: 6px;border: 0;color: #fff;font-size: 14px;font-weight: 600;text-decoration: none;cursor: pointer;margin-right: 10px;outline: none;-webkit-transition: all 0.3s ease;transition: all 0.3s ease;-webkit-box-shadow: 0 0 0 rgba(0, 0, 0, 0.16);box-shadow: 0 0 0 rgba(0, 0, 0, 0.16);" name="df-spl-activate" value="Activate" class="spl_btn_primary button button-primary"  />
            <input type="submit" style="height:30px;width:100px;border-radius: 6px;border: 0;font-size: 14px;font-weight: 300;text-decoration: none;cursor: pointer;margin-right: 10px;outline: none;-webkit-transition: all 0.3s ease;transition: all 0.3s ease;-webkit-box-shadow: 0 0 0 rgba(0, 0, 0, 0.16);box-shadow: 0 0 0 rgba(0, 0, 0, 0.16);" name="df-spl-deactivate" value="Deactivate" class="button button-default <?php echo $class; ?>" /></p>
            <?php 
            if(empty($opt) && $this->license_return != "1"){
              echo $this->license_return;
          }
          ?>
      </form>
  </div>
  <div style="padding:20px 20px 20px 20px ; font-size: 14px; font-weight: 300;line-height: 20px;margin-top:50px;border-radius:10px;border: 1px solid #aaaaaa;font-weight:300;width:350px;">
    <div style="padding-bottom:10px;font-size:18px;font-weight: 700;">Note</div>
    Are you activating your license on a localhost? If yes, please remember to deactivate the license (and backup your Price List) before migrating to another domain. If you have lost your license key, you can use our <a href="https://stylishpricelist.com/get-your-license/" target="_blank">lookup tool</a>. 
</div>
<?php    
$html_1=ob_get_clean();
echo $html_1;
}
function include_license_settings(){
    $license_settings=SPL_DIR . '/license-settings.php';
    if(file_exists($license_settings)){
        require_once $license_settings;
        return true;
    }else{
        return 'cannot find the license-settings.php file in folder ' . SPL_DIR;
    }   
}
function update_opt($opt){
    update_option('spllk_opt',$opt);
}
function activate($key){
  ob_start();
  if(!empty($key)){
    $license_data=$this->get_license_data($key,'slm_activate');
    if(isset($license_data->result)){
            if($license_data->result == 'success'){//Success was returned for the license activation
                // update_option('sample_license_key', '');
                $opt=get_object_vars($license_data);
                // ob_start();
                // print_r($opt);
                // $data=ob_get_clean();
                // file_put_contents(dirname(__FILE__) . '/opt.log',$data,FILE_APPEND);
                $this->update_opt($opt);
                return true;
            }
            if($license_data->result == 'error'){
                $message="Your license has reached the maximum amount of domains. Please note, this error message might appear by accident if you pressed the enter button twice, in this case you can just ignore this error message. If there's a green check-mark beside your serial that means your pro version has been activated. If you're moving domains, then just de-activate your license on your first domain before activating SPL on another domain.";
                //Uncomment the followng line to see the message that returned from the license server
                // return $license_data->message;
                //return '<p style="color:red;"> Error: '.$license_data->message . '</p>';
                return '<p style="color:red;"> Error: '.$message . '</p>';
            }
        }else{
            return $license_data;
        }
    }else{
        $this->update_opt('');
        return 'The license key is empty';
    }
}
function deactivate($key){
    if(!empty($key)){
        $license_data=$this->get_license_data($key,'slm_deactivate');
        if(isset($license_data->result)){
            if($license_data->result == 'success'){//Success was returned for the license activation
                // update_option('sample_license_key', '');
                $this->update_opt('');
                return true;
            }
            else{
                //Uncomment the followng line to see the message that returned from the license server
                // return $license_data->message;
                return '<p style="color:red;"> Error: '.$license_data->message . '</p>';
            }
        }else{
            return $license_data;
        }
    }else{
        $this->update_opt('');
        return 'The license key is empty';
    }
}
//     function activate_b0($key)
//     {
//         if(!empty($key)){
//             $include_license=$this->include_license_settings();
//             if($include_license !== true){
//                 return $include_license;
//             }
// //             $license_settings=SPL_DIR . '/license-settings.php';
// // // define('SPL_SPECIAL_SECRET_KEY', '5421048138b321.90068894');
// // // define('SPL_LICENSE_SERVER_URL', 'http://localhost/mass_products/site');
// // // define('SPL_ITEM_REFERENCE', 'stylish-price-list');
// //             if(file_exists($license_settings)){
// //                 require_once $license_settings;
// //             }else{
// //                 return 'cannot find the license-settings.php file in folder ' . SPL_DIR;
// //             }
//             // API query parameters
//             $api_params = array(
//                 'slm_action' => 'slm_activate',
//                 'secret_key' => SPL_SPECIAL_SECRET_KEY,
//                 'license_key' => $key,
//                 'registered_domain' => $_SERVER['SERVER_NAME'],
//                 'item_reference' => urlencode(SPL_ITEM_REFERENCE),
//             );
//             // Send query to the license manager server
//             $query = esc_url_raw(add_query_arg($api_params, SPL_LICENSE_SERVER_URL));
//             $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));
//             // Check for error in the response
//             if (is_wp_error($response)){
//                 return "Unexpected Error! The query returned with an error.";
//             }
//             //var_dump($response);//uncomment it if you want to look at the full response
//             // License data.
//             $license_data = json_decode(wp_remote_retrieve_body($response));
//             // ob_start();
//             // print_r($license_data);
//             // $data=ob_get_clean();
//             // file_put_contents(dirname(__FILE__) . '/license_data.log',$data,FILE_APPEND);
//             // TODO - Do something with it.
//             //var_dump($license_data);//uncomment it to look at the data
//             if($license_data->result == 'success'){//Success was returned for the license activation
//                 $opt=get_object_vars($license_data);
//                 // unset();
//                 // //Uncomment the followng line to see the message that returned from the license server
//                 // echo '<br />The following message was returned from the server: '.$license_data->message;
//                 // //Save the license key in the options table
//                 // update_option('sample_license_key', $license_key); 
//                 // $opt['google_fonts_preview_out']='google_fonts_preview';
//                 // $opt['html_out']='select_html';
//                 // $opt['get_fonts_options']='get_fonts_options';
//                 // $opt['max_cat_count']=999;
//                 // $opt['max_service_count']=999;
//                 // $opt['max_list_count']=999;
//                 update_option('spllk_opt',$opt);
//                 return true;
//             }
//             else{
//                 //Show error to the user. Probably entered incorrect license key.
//                 //Uncomment the followng line to see the message that returned from the license server
//                 return '<p style="color:red;"> Error: '.$license_data->message . '</p>';
//             }
//             // return true;
//         }else{
//             delete_option('spllk_opt');
//             return 'The license key is empty';
//         }
//     }
function get_license_data($key,$action)
{
    $include_license=$this->include_license_settings();
    if($include_license !== true){
        return $include_license;
    }
    // API query parameters
    $api_params = array(
        'slm_action' => $action,
        'secret_key' => SPL_SPECIAL_SECRET_KEY,
        'license_key' => $key,
        'registered_domain' => $_SERVER['SERVER_NAME'],
        'item_reference' => urlencode(SPL_ITEM_REFERENCE),
        // 'secret_key' => YOUR_SPECIAL_SECRET_KEY,
        // 'license_key' => $license_key,
        // 'registered_domain' => $_SERVER['SERVER_NAME'],
        // 'item_reference' => urlencode(YOUR_ITEM_REFERENCE),
    );
    // Send query to the license manager server
    $query = esc_url_raw(add_query_arg($api_params, SPL_LICENSE_SERVER_URL));
    $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));
    // Check for error in the response
    if (is_wp_error($response)){
        update_option('act_ser_conn_refused',"connection refused");
        return "Unexpected Error! The query returned with an error.";
    }
    //var_dump($response);//uncomment it if you want to look at the full response
    // License data.
    $license_data = json_decode(wp_remote_retrieve_body($response));
    return $license_data;
}
// function deactivate_b0($key)
// {
//     if(!empty($key)){
//         // $include_license=$this->include_license_settings();
//         // if($include_license !== true){
//         //     return $include_license;
//         // }
//         // // API query parameters
//         // $api_params = array(
//         //     'slm_action' => 'slm_deactivate',
//         //     'secret_key' => YOUR_SPECIAL_SECRET_KEY,
//         //     'license_key' => $license_key,
//         //     'registered_domain' => $_SERVER['SERVER_NAME'],
//         //     'item_reference' => urlencode(YOUR_ITEM_REFERENCE),
//         // );
//         // // Send query to the license manager server
//         // $query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL));
//         // $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));
//         // // Check for error in the response
//         // if (is_wp_error($response)){
//         //     echo "Unexpected Error! The query returned with an error.";
//         // }
//         // //var_dump($response);//uncomment it if you want to look at the full response
//         // // License data.
//         // $license_data = json_decode(wp_remote_retrieve_body($response));
//         // TODO - Do something with it.
//         //var_dump($license_data);//uncomment it to look at the data
//         $license_data=$this->get_license_data($key,'slm_deactivate');
//         if(isset($license_data->result)){
//             if($license_data->result == 'success'){//Success was returned for the license activation
//                 //Uncomment the followng line to see the message that returned from the license server
//                 echo '<br />The following message was returned from the server: '.$license_data->message;
//                 //Remove the licensse key from the options table. It will need to be activated again.
//                 update_option('sample_license_key', '');
//             }
//             else{
//                 //Show error to the user. Probably entered incorrect license key.
//                 //Uncomment the followng line to see the message that returned from the license server
//                 echo '<br />The following message was returned from the server: '.$license_data->message;
//             }
//         }else{
//             return $license_data;
//         }
//     }else{
//         delete_option('spllk_opt');
//         return 'The license key is empty';
//     }
// }
//Add Help Content //
function help_page()
{
    wp_enqueue_script('spl-bootstrap-min');
    ?>
    <div class="price_wrapper">
    <?php
    include_once SPL_DIR . '/admin/tabs/views/tabs-form/logo-header.php';
    ?>
    </div>
    <style>
     .panel-group .panel {
      border: 2px black;
      border-radius: 10px!important;
      background-color: #F8F8F8;
      padding: 10px;
      margin-left: 25px;
      margin-bottom: 20px!important;
      max-width: 700px;
      box-shadow: 1px 1px 5px gray;
  }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="wrap"><?php screen_icon(); ?>
<h1 style="margin-top:100px;background:#f9f9f9;padding-left:25px;padding-bottom:25px;padding-top:25px;font-weight:600px;font-size:35px;font-weight: bold;">Help &amp; F.A.Q's</h1>
<div class="foot-url" style="font-size:24px;margin-top:20px">
    <span class="col-me"><a href="https://designful.freshdesk.com/en/support/solutions/folders/48000670844" target="_blank" style="text-decoration: none!important;">User Guides</a></span>
    <span> | </span>
    <span class="col-me" ><a style="text-decoration: none!important;" href="https://designful.freshdesk.com/en/support/solutions/folders/48000670795" target="_blank">FAQs</a></span>
    <span> | </span>
    <span><a href="https://stylishpricelist.com/support/" target="_blank" style="text-decoration: none!important;">Contact Support</a></span>
</div>
<!-- Question end -->
</div>
</div>
<?php
}
// End Help Content
// Start Video Content
function video_page(){
    echo "<div class=\"price_wrapper\">";
    include_once SPL_DIR . '/admin/tabs/views/tabs-form/logo-header.php';
    ?>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <h1 style="padding-left:25px;padding-bottom:50px;padding-top:30px;font-weight:800px;">Video Tutorials </h1>
    <div class="youtube_video" style="padding-left:10px;">
     <iframe width="920" height="520" src="https://www.youtube.com/embed/tq8SE1HC7g0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
 </div><br><Br>
 <div class="youtube_video" style="padding-left:10px;">
     <iframe width="920" height="520" src="https://www.youtube.com/embed/dwICOx4Jhv4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br><br>
 </div><br><Br>
 <div class="youtube_video" style="padding-left:10px;">
     <iframe width="920" height="520" src="https://www.youtube.com/embed/zB6kz2nKxoI/?rel=0" frameborder="0" allowfullscreen></iframe>
 </div>
 <?php
}
function admin_menu()
{
    // add_management_page('Stylish Price List','Stylish Price List', 'manage_options', 'stylish_price_list_settings', array($this,'option_page'));
 add_submenu_page( 'spl-tabs', __( 'Help', 'stylishpl' ), __( 'Help', 'stylishpl' ), 'manage_options', 'stylish_price_list_help', array( $this, 'help_page' ) );
 add_submenu_page( 'spl-tabs', __( 'Video Tutorials', 'stylishpl' ), __( 'Video Tutorials', 'stylishpl' ), 'manage_options', 'stylish_price_list_video', array( $this, 'video_page' ) );
 add_submenu_page( 'spl-tabs', __( 'Settings & License', 'stylishpl' ), __( 'Settings & License', 'stylishpl' ), 'manage_options', 'stylish_price_list_settings', array( $this, 'option_page' ) );
}
}
$stylish_price_list_settings = new Stylish_Price_List_Settings();
?>