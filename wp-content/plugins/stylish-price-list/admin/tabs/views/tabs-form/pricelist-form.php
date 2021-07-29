<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
wp_enqueue_style( 'wp-color-picker' );
wp_enqueue_script('spl-bootstrap-min');
wp_enqueue_script('spl-pricelist-admin-core');
wp_enqueue_script('spl-pricelist-admin');
wp_enqueue_style('spl-bootstrap-min');
wp_enqueue_style('spl-list-style');
wp_enqueue_style('spl-admin-style');
$id='';
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
?>
<!--Include library sortable-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->
<?php
$list_count=spl_get_tabs_count();
$opt=spl_get_options();
$google_fonts_preview_out=$opt['google_fonts_preview_out'];
$opt['html_out'] = 'select_html';
$html_out=$opt['html_out'];
$opt['get_fonts_options'] = 'get_fonts_options';
$get_fonts_options=$opt['get_fonts_options'];
$max_cat_count=$opt['max_cat_count'];
$max_service_count=$opt['max_service_count'];
$max_list_count=$opt['max_list_count'];
if($list_count>=$max_list_count && empty($id)){echo want_more_lists(); return;};
// $want_more_lists=$opt['want_more_lists'];
?>
<?php
$cats_data=array();
$_init_service=array(
    'service_name' =>'',
    'service_regular_price' => '',
    'service_price' => '',
    'service_desc' => '',
    'service_button' => '',
    'service_button_url' => '',
    'service_image' => ''
//      'service_url'  => ''
);
$init_cat=array(
    'name'=>'',
    0=>$_init_service
);
$cats_data['category'][1]=array(
    'name'=>'',
    1=>$_init_service
);
$list_name='';
$hover_color='';
$title_color='';
$title_color_top='';
$price_color='';
$service_description_color='';
$tab_description_color='';
$service_color='';
$list_name_font='';
$title_font='';
$price_font='';
$service_description_font='';
$tab_description_font='';
$desc_font='';
$optionArr = array('Thin'=>100,'Extra_Light'=>200,'Light'=>300,'Normal'=>400,'Medium'=>500,'Semi_Bold'=>600,'Bold'=>700,'Extra_Bold'=>800,'Ultra_Bold'=>900);
if(!empty($id)){
    $cats_data=spl_get_option($id);
    /*echo "<pre>";
    print_r($cats_data);
    echo "</pre>";*/
    $list_name= isset($cats_data['list_name']) ? $cats_data['list_name'] : ''; //$cats_data['list_name']
    $all_tab= isset($cats_data['all_tab']) ? $cats_data['all_tab'] : ''; //$cats_data['all_tab']
    $style_cat_tab_btn= isset($cats_data['style_cat_tab_btn']) ? $cats_data['style_cat_tab_btn'] : ''; //$cats_data['style_cat_tab_btn']
    $spl_remove_title= isset($cats_data['spl_remove_title']) ? $cats_data['spl_remove_title'] : '';
    $style= isset($cats_data['tab_style']) ? $cats_data['tab_style'] : '';
    $style5_category= isset($cats_data['style5_category']) ? $cats_data['style5_category'] : '';
     //$cats_data['tab_style']
    $hover_color= isset($cats_data['hover_color']) ? $cats_data['hover_color'] : ''; //$cats_data['hover_color']
    $service_color= isset($cats_data['service_color']) ? $cats_data['service_color'] : ''; //$cats_data['service_color']
    $title_color= isset($cats_data['title_color']) ? $cats_data['title_color'] : ''; //$cats_data['title_color']
    $price_color= isset($cats_data['price_color']) ? $cats_data['price_color'] : ''; //$cats_data['price_color']
    $service_description_color= isset($cats_data['service_description_color']) ? $cats_data['service_description_color'] : ''; //$cats_data['service_description_color']
    $tab_description_color= isset($cats_data['tab_description_color']) ? $cats_data['tab_description_color'] : ''; //$cats_data['service_description_color']
    $title_size= isset($cats_data['title_font_size']) ? $cats_data['title_font_size'] : ''; //$cats_data['title_font_size']
    $title_color_top= isset($cats_data['title_color_top']) ? $cats_data['title_color_top'] : ''; //$cats_data['title_color_top']
    $select_price= isset($cats_data['service_price_font_size']) ? $cats_data['service_price_font_size'] : ''; //$cats_data['service_price_font_size']
    $list_name_font= isset($cats_data['list_name_font']) ? $cats_data['list_name_font'] : ''; //$cats_data['list_name_font']
    $title_font= isset($cats_data['title_font']) ? $cats_data['title_font'] : ''; //$cats_data['title_font']
    $price_font= isset($cats_data['price_font']) ? $cats_data['price_font'] : ''; //$cats_data['price_font']
    $service_description_font= isset($cats_data['service_description_font']) ? $cats_data['service_description_font'] : ''; //$cats_data['service_description_font']
    $tab_description_font= isset($cats_data['tab_description_font']) ? $cats_data['tab_description_font'] : ''; //$cats_data['service_description_font']
    $desc_font= isset($cats_data['desc_font']) ? $cats_data['desc_font'] : ''; //$cats_data['desc_font']
    $toggle= isset($cats_data['toggle']) ? $cats_data['toggle'] : ''; //$cats_data['toggle']
    $toggle_all_tab= isset($cats_data['toggle_all_tab']) ? $cats_data['toggle_all_tab'] : ''; //$cats_data['toggle_all_tab']
    $price_list_desc= isset($cats_data['price_list_desc']) ? $cats_data['price_list_desc'] : ''; //$cats_data['price_list_desc']
    $brack_title_desktop = isset($cats_data['brack_title_desktop']) ? $cats_data['brack_title_desktop'] : ''; //$cats_data['brack_title_desktop']
    $brack_title_tablets = isset($cats_data['brack_title_tablets']) ? $cats_data['brack_title_tablets'] : ''; //$cats_data['brack_title_tablets']
}
$id=isset($_GET['id']) ? $_GET['id'] : '';
$cats_data1=spl_get_option($id);
//echo '<pre>'; print_r($cats_data1); echo '</pre>';
$lang_obj= new convert_lang;
if(isset($_REQUEST['lang'])){
    $Select_Language = $lang_obj->convert_lang_function($_REQUEST['lang'],'Select_Language');
    $Select_Column = $lang_obj->convert_lang_function($_REQUEST['lang'],'Select_Column');
    $Max_Width = $lang_obj->convert_lang_function($_REQUEST['lang'],'Max_Width');
    $Save = $lang_obj->convert_lang_function($_REQUEST['lang'],'Save');
    $Price_List_Name = $lang_obj->convert_lang_function($_REQUEST['lang'],'Price_List_Name');
    $Select_Style = $lang_obj->convert_lang_function($_REQUEST['lang'],'Select_Style');
    $More_Settings = $lang_obj->convert_lang_function($_REQUEST['lang'],'More_Settings');
    $Default_Tab = $lang_obj->convert_lang_function($_REQUEST['lang'],'Default_Tab');
    $Change_All_word_for_Categories = $lang_obj->convert_lang_function($_REQUEST['lang'],'Change_All_word_for_Categories');
    $different_languages = $lang_obj->convert_lang_function($_REQUEST['lang'],'different_languages');
    $Remove_title = $lang_obj->convert_lang_function($_REQUEST['lang'],'Remove_title');
    $Display_the_All_word = $lang_obj->convert_lang_function($_REQUEST['lang'],'Display_the_All_word');
    $Category_Separator_Symbol = $lang_obj->convert_lang_function($_REQUEST['lang'],'Category_Separator_Symbol');
    $Stylish_Category_Tabs_Buttons = $lang_obj->convert_lang_function($_REQUEST['lang'],'Stylish_Category_Tabs_Buttons');
    $Open_Buy_Btn_Link_In_New_Tab = $lang_obj->convert_lang_function($_REQUEST['lang'],'Open_Buy_Btn_Link_In_New_Tab');
    $Add_Search_Bar = $lang_obj->convert_lang_function($_REQUEST['lang'],'Add_Search_Bar');
    $Break_title_of_Service = $lang_obj->convert_lang_function($_REQUEST['lang'],'Break_title_of_Service');
    $Break_line_of_categories_on_Desktop = $lang_obj->convert_lang_function($_REQUEST['lang'],'Break_line_of_categories_on_Desktop');
    $Break_line_of_categories_on_Tablets = $lang_obj->convert_lang_function($_REQUEST['lang'],'Break_line_of_categories_on_Tablets');
    $Price_List_Description = $lang_obj->convert_lang_function($_REQUEST['lang'],'Price_List_Description');
    $Title = $lang_obj->convert_lang_function($_REQUEST['lang'],'Title');
    $Category_Tabs = $lang_obj->convert_lang_function($_REQUEST['lang'],'Category_Tabs');
    $Category_description_Tabs = $lang_obj->convert_lang_function($_REQUEST['lang'],'Category_description_Tabs');
    $Service_Name = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Name');
    $Service_Price = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Price');
    $Service_Description = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Description');
    $Category_description_Tabs = $lang_obj->convert_lang_function($_REQUEST['lang'],'Category_description_Tabs');
    $Font_Size = $lang_obj->convert_lang_function($_REQUEST['lang'],'Font_Size');
    $Font_Color = $lang_obj->convert_lang_function($_REQUEST['lang'],'Font_Color');
    $Font_Style = $lang_obj->convert_lang_function($_REQUEST['lang'],'Font_Style');
    $Font_Weight = $lang_obj->convert_lang_function($_REQUEST['lang'],'Font_Weight');
    $Hover_Color = $lang_obj->convert_lang_function($_REQUEST['lang'],'Hover_Color');
    $GLOBALS['Category_Name']= $lang_obj->convert_lang_function($_REQUEST['lang'],'Category_Name');
    $GLOBALS['Category_Description'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Category_Description');
    $GLOBALS['Service_Name'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Name');
    $GLOBALS['Service_Regular_Price'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Regular_Price');
    $GLOBALS['Service_Price'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Price');
    $GLOBALS['Service_Description_Length'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Description_Length');
    $GLOBALS['Service_Button'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Button');
    $GLOBALS['Service_Button_URL'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Button_URL');
    $GLOBALS['Service_Image'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_Image');
        // $GLOBALS['Service_URL'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Service_URL');
    $GLOBALS['Remove_Service'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Remove_Service');
    $GLOBALS['Add_Service'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Add_Service');
    $GLOBALS['Add_Category'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Add_Category');
    $GLOBALS['Remove_Category'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'Remove_Category');
    $Restore = $lang_obj->convert_lang_function($_REQUEST['lang'],'Restore');
    $Backup = $lang_obj->convert_lang_function($_REQUEST['lang'],'Backup');
    $Preview_List = $lang_obj->convert_lang_function($_REQUEST['lang'],'Preview_List');
    $FONT_SETTINGS = $lang_obj->convert_lang_function($_REQUEST['lang'],'FONT_SETTINGS');
    $ADD_TO_WEBPAGE = $lang_obj->convert_lang_function($_REQUEST['lang'],'ADD_TO_WEBPAGE');
    $GLOBALS['CATEGORY'] = $lang_obj->convert_lang_function($_REQUEST['lang'],'CATEGORY');
}
else{
    if(isset($cats_data1['select_lang']) && $cats_data1['select_lang']!=''){
        $Select_Language = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Select_Language');
        $Select_Column = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Select_Column');
        $Max_Width = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Max_Width');
        $Save = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Save');
        $Price_List_Name = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Price_List_Name');
        $Select_Style = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Select_Style');
        $More_Settings = $lang_obj->convert_lang_function($cats_data1['select_lang'],'More_Settings');
        $Default_Tab = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Default_Tab');
        $Change_All_word_for_Categories = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Change_All_word_for_Categories');
        $different_languages = $lang_obj->convert_lang_function($cats_data1['select_lang'],'different_languages');
        $Remove_title = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Remove_title');
        $Display_the_All_word = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Display_the_All_word');
        $Category_Separator_Symbol = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Category_Separator_Symbol');
        $Stylish_Category_Tabs_Buttons = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Stylish_Category_Tabs_Buttons');
        $Open_Buy_Btn_Link_In_New_Tab = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Open_Buy_Btn_Link_In_New_Tab');
        $Add_Search_Bar = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Add_Search_Bar');
        $Break_title_of_Service = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Break_title_of_Service');
        $Break_line_of_categories_on_Desktop = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Break_line_of_categories_on_Desktop');
        $Break_line_of_categories_on_Tablets = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Break_line_of_categories_on_Tablets');
        $Price_List_Description = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Price_List_Description');
        $Title = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Title');
        $Category_Tabs = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Category_Tabs');
        $Service_Name = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Name');
        $Service_Price = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Price');
        $Service_Description = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Description');
        $Category_description_Tabs = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Category_description_Tabs');
        $Font_Size = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Font_Size');
        $Font_Color = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Font_Color');
        $Font_Style = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Font_Style');
        $Font_Weight = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Font_Weight');
        $Hover_Color = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Hover_Color');
        $GLOBALS['Category_Name']= $lang_obj->convert_lang_function($cats_data1['select_lang'],'Category_Name');
        $GLOBALS['Category_Description'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Category_Description');
        $GLOBALS['Service_Name'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Name');
        $GLOBALS['Service_Regular_Price'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Regular_Price');
        $GLOBALS['Service_Price'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Price');
        $GLOBALS['Service_Description_Length'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Description_Length');
        $GLOBALS['Service_Button'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Button');
        $GLOBALS['Service_Button_URL'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Button_URL');
        $GLOBALS['Service_Image'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_Image');
        // $GLOBALS['Service_URL'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Service_URL');
        $GLOBALS['Remove_Service'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Remove_Service');
        $GLOBALS['Add_Service'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Add_Service');
        $GLOBALS['Add_Category'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Add_Category');
        $GLOBALS['Remove_Category'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Remove_Category');
        $Restore = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Restore');
        $Backup = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Backup');
        $Preview_List = $lang_obj->convert_lang_function($cats_data1['select_lang'],'Preview_List');
        $FONT_SETTINGS = $lang_obj->convert_lang_function($cats_data1['select_lang'],'FONT_SETTINGS');
        $ADD_TO_WEBPAGE = $lang_obj->convert_lang_function($cats_data1['select_lang'],'ADD_TO_WEBPAGE');
        $GLOBALS['CATEGORY'] = $lang_obj->convert_lang_function($cats_data1['select_lang'],'CATEGORY');
    }
    else{
        $Select_Language = $lang_obj->convert_lang_function('EN','Select_Language');
        $Select_Column = $lang_obj->convert_lang_function('EN','Select_Column');
        $Max_Width = $lang_obj->convert_lang_function('EN','Max_Width');
        $Save = $lang_obj->convert_lang_function('EN','Save');
        $Price_List_Name = $lang_obj->convert_lang_function('EN','Price_List_Name');
        $Select_Style = $lang_obj->convert_lang_function('EN','Select_Style');
        $More_Settings = $lang_obj->convert_lang_function('EN','More_Settings');
        $Default_Tab = $lang_obj->convert_lang_function('EN','Default_Tab');
        $Change_All_word_for_Categories = $lang_obj->convert_lang_function('EN','Change_All_word_for_Categories');
        $different_languages = $lang_obj->convert_lang_function('EN','different_languages');
        $Remove_title = $lang_obj->convert_lang_function('EN','Remove_title');
        $Display_the_All_word = $lang_obj->convert_lang_function('EN','Display_the_All_word');
        $Category_Separator_Symbol = $lang_obj->convert_lang_function('EN','Category_Separator_Symbol');
        $Stylish_Category_Tabs_Buttons = $lang_obj->convert_lang_function('EN','Stylish_Category_Tabs_Buttons');
        $Open_Buy_Btn_Link_In_New_Tab = $lang_obj->convert_lang_function('EN','Open_Buy_Btn_Link_In_New_Tab');
        $Add_Search_Bar = $lang_obj->convert_lang_function('EN','Add_Search_Bar');
        $Break_title_of_Service = $lang_obj->convert_lang_function('EN','Break_title_of_Service');
        $Break_line_of_categories_on_Desktop = $lang_obj->convert_lang_function('EN','Break_line_of_categories_on_Desktop');
        $Break_line_of_categories_on_Tablets = $lang_obj->convert_lang_function('EN','Break_line_of_categories_on_Tablets');
        $Price_List_Description = $lang_obj->convert_lang_function('EN','Price_List_Description');
        $Title = $lang_obj->convert_lang_function('EN','Title');
        $Category_Tabs = $lang_obj->convert_lang_function('EN','Category_Tabs');
        $Service_Name = $lang_obj->convert_lang_function('EN','Service_Name');
        $Service_Price = $lang_obj->convert_lang_function('EN','Service_Price');
        $Service_Description = $lang_obj->convert_lang_function('EN','Service_Description');
        $Category_description_Tabs = $lang_obj->convert_lang_function('EN','Category_description_Tabs');
        $Font_Size = $lang_obj->convert_lang_function('EN','Font_Size');
        $Font_Color = $lang_obj->convert_lang_function('EN','Font_Color');
        $Font_Style = $lang_obj->convert_lang_function('EN','Font_Style');
        $Font_Weight = $lang_obj->convert_lang_function('EN','Font_Weight');
        $Hover_Color = $lang_obj->convert_lang_function('EN','Hover_Color');
        $GLOBALS['Category_Name']= $lang_obj->convert_lang_function('EN','Category_Name');
        $GLOBALS['Category_Description'] = $lang_obj->convert_lang_function('EN','Category_Description');
        $GLOBALS['Service_Name'] = $lang_obj->convert_lang_function('EN','Service_Name');
        $GLOBALS['Service_Regular_Price'] = $lang_obj->convert_lang_function('EN','Service_Regular_Price');
        $GLOBALS['Service_Price'] = $lang_obj->convert_lang_function('EN','Service_Price');
        $GLOBALS['Service_Description_Length'] = $lang_obj->convert_lang_function('EN','Service_Description_Length');
        $GLOBALS['Service_Button'] = $lang_obj->convert_lang_function('EN','Service_Button');
        $GLOBALS['Service_Button_URL'] = $lang_obj->convert_lang_function('EN','Service_Button_URL');
        $GLOBALS['Service_Image'] = $lang_obj->convert_lang_function('EN','Service_Image');
        // $GLOBALS['Service_URL'] = $lang_obj->convert_lang_function('EN','Service_URL');
        $GLOBALS['Remove_Service'] = $lang_obj->convert_lang_function('EN','Remove_Service');
        $GLOBALS['Add_Service'] = $lang_obj->convert_lang_function('EN','Add_Service');
        $GLOBALS['Add_Category'] = $lang_obj->convert_lang_function('EN','Add_Category');
        $GLOBALS['Remove_Category'] = $lang_obj->convert_lang_function('EN','Remove_Category');
        $Restore = $lang_obj->convert_lang_function('EN','Restore');
        $Backup = $lang_obj->convert_lang_function('EN','Backup');
        $Preview_List = $lang_obj->convert_lang_function('EN','Preview_List');
        $FONT_SETTINGS = $lang_obj->convert_lang_function('EN','FONT_SETTINGS');
        $ADD_TO_WEBPAGE = $lang_obj->convert_lang_function('EN','ADD_TO_WEBPAGE');
        $GLOBALS['CATEGORY'] = $lang_obj->convert_lang_function('EN','CATEGORY');
    }
}
/*function global_lang(){
    return 'hello';
}*/
function want_more_lists(){
    ob_start();
    include_once dirname(__FILE__) . '/logo-header.php';
    ?>
    <div class="body-inner container-fluid" style="max-width:900px;margin-left:0px;">
        <div class="df-spl-row cats-row">
            You're using the free version of this plugin, you can only use a maximum of 2 lists, 3 categories and 4 services. You can purchase a license to add unlimited lists and services. and categories. <a href="http://designful.ca/apps/stylish-price-list-wordpress/"> Purchase Here</a>
        </div>
    </div>
    <?php
    $html=ob_get_clean();
    return $html;
}//end want_more_lists()
if(!function_exists('color_out')){
    function color_out($id,$value="",$title=""){
        ob_start();
        ?>
        <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="<?php echo $id; ?>"><?php echo $title; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
                <input type="text" name="<?php echo $id; ?>" id="<?php echo $id; ?>" class="form-control <?php echo $id; ?> color-picker" value="<?php echo $value; ?>" title="<?php echo $title; ?>">
            </div>
        </div> <!-- <?php echo $title; ?> -->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end color_out()
}//end if !function_exists('color_out')
if(!function_exists('how_to_get_google_fonts')){
    function how_to_get_google_fonts(){
        ob_start();
        ?>
        <div class="df-spl-row cats-row font_setting_container">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                Enter your <b>license key</b> to get Google fonts,
                how Google fonts look like? check <a href="https://fonts.google.com/">Google fonts preview</a>
            </div>
        </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end how_to_get_google_fonts()
}//end if !function_exists('how_to_get_google_fonts')
if(!function_exists('google_fonts_preview')){
    function google_fonts_preview(){
        ob_start();
        ?>
        <!--<div class="df-spl-row cats-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="google">
                <b>How Google font looks like? check </b> <a href="https://fonts.google.com/">google fonts preview</a>
                </div>
            </div>
        </div>-->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end google_fonts_preview()
}//end if !function_exists('google_fonts_preview')
if(!function_exists('html_out')){
    function html_out($name, $options=array(),$current_value='',$title=""){
        $html_out='hidden_html';//
        ob_start();
        ?>
        <div class="df-spl-row cats-row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?php echo $html_out($name,$options,$current_value); ?>
            </div>
        </div> <!-- List Name Font -->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end html_out()
}//end if !function_exists('html_out')
if(!function_exists('hidden_html')){
    function hidden_html($name, $options=array(),$current_value='',$title="")
    {
        ob_start();
        ?>
        <input type="hidden" name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-control" value="<?php echo $current_value; ?>">
        <?php
        $html=ob_get_clean();
        return $html;
    }
}//end if !function_exists('hidden_html')
?>
<?php
if(!function_exists('select_html')){
    function select_html($name, $options=array(),$current_value='',$title="")
    {
        ob_start();
        ?>
        <div class="df-spl-row cats-row" style="margin-bottom:0;">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="<?php echo $name; ?>"><?php echo $title; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
                <select name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="form-control" style="box-shadow: 2px 2px 0px #888;">
                    <?php foreach ($options as $value => $label): ?>
                        <?php
                        $selected='';
                        if($current_value==$value){
                            $selected=' selected="selected"';
                        }
                        if($current_value==''){
                          if($label=='Open Sans'){
                            $selected=' selected="selected"';
                        }
                    }
                    ?>
                    <option value="<?php echo $value; ?>"<?php echo $selected; ?>><?php echo $label; ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div> <!-- <?php echo $title; ?> -->
    <?php
    $html=ob_get_clean();
    return $html;
}
}//end if !function_exists('select_html')
?>
<?php
if(!function_exists('service_items_html')){
    function service_items_html($cat_id=0,$service_id=0,$service=null){
        ob_start();
        $items=array(
            array(
                'title'=>$GLOBALS['Service_Name'],
                'id'=>'service_name',
            ),
            array(
                'title'=>$GLOBALS['Service_Regular_Price'],
                'id'=>'service_regular_price',
            ),
            array(
                'title'=>$GLOBALS['Service_Price'],
                'id'=>'service_price',
            ),
            array(
                'title'=>$GLOBALS['Service_Description_Length'],
                'id'=>'service_desc',
            ),
            array(
                'title'=>$GLOBALS['Service_Button'],
                'id'=>'service_button',
            ),
            array(
                'title'=>$GLOBALS['Service_Button_URL'],
                'id'=>'service_button_url',
            ),
            array(
                'title'=>$GLOBALS['Service_Image'],
                'id'=>'service_image',
            ),
//  array(
//                     'title'=>$GLOBALS['Service_URL'],
//                     'id'=>'service_url',
//                     ),
        );
        // $cat_id=0;
        // $service_id=0;
        foreach ($items as $key => $item) {
            $item['cat_id']=$cat_id;
            $item['service_id']=$service_id;
            $item['value']=$service[$item['id']] ? $service[$item['id']] : false;
            echo service_item($item);
        }
        $html=ob_get_clean();
        return $html;
    }//end service_items_html()
}//end if !function_exists('service_items_html')
if(!function_exists('add_remove_service')){
    function add_remove_service($max_service_count){
        ob_start();
        ?>
        <div class="df-spl-row add-remove-service custom-mobile">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 remove-service">
                <a href="javascript:void(0);" onclick="remove_service(this)" class="remove-service add-remove-service"><?php echo $GLOBALS['Remove_Service']; ?> [-] </a>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 add-service">
                <a href="javascript:void(0);" onclick="add_service(this)" class="add-service add-remove-service"><?php echo $GLOBALS['Add_Service']; ?> [+] </a>
            </div>
        </div>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end add_remove_service()
}//end if !function_exists('add_remove_service')
if(!function_exists('service_item')){
    function service_item($item){
        /*
        $item=array(
            'cat_id'=>0,
            'service_id'=>0,
            'title'=>'Service Name',
            'id'=>'service_name',
        );
        */
        ob_start();
        extract($item);
        $title="$title($service_id)";
        $name="category[{$cat_id}][{$service_id}][{$id}]";
        $html_id="category_{$cat_id}_{$service_id}_{$id}";
        //$title=remove_slash_quotes($title);
        $value=remove_slash_quotes($value);
        ?>
        <div class="df-spl-row service-price-length <?php if($id == 'service_regular_price' || $id == 'service_image'){ echo 'spl_style6_element'; } ?>">
            <div class="col-xs-6 col-sm-5 col-md-5 col-lg-5 lbl">
                <label for="<?php echo $html_id; ?>"><?php echo $title; ?></label>
            </div>
            <div class="col-xs-6 col-sm-7 col-md-7 col-lg-7">
                <?php if($id == 'service_button'){ ?>
                    <div class="col-md-2 col-xs-4 padding_zero_spl">
                        <div class="custom-control custom-checkbox <?php echo $id; ?>">
                           <?php if($value != ''){ ?>
                              <input type="checkbox" data-id="<?php echo "category_{$cat_id}_{$service_id}"; ?>" name="<?php echo "category[{$cat_id}][{$service_id}][service_button_enable]"; ?>" class="custom-control-input spl_service_button_enable" checked="checked">
                          <?php }else{ ?>
                            <input type="checkbox" data-id="<?php echo "category_{$cat_id}_{$service_id}"; ?>" name="<?php echo "category[{$cat_id}][{$service_id}][service_button_enable]"; ?>" class="custom-control-input spl_service_button_enable">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-10 col-xs-8 padding_zero_spl">
                    <input type="text" name="<?php echo $name; ?>" id="<?php echo $html_id; ?>" class="form-control <?php echo $id; ?>" value="<?php echo $value; ?>" placeholder="Button Title" title="">
                </div>
            <?php }else if($id == 'service_button_url'){ ?>
                <input type="text" name="<?php echo $name; ?>" id="<?php echo $html_id; ?>" class="form-control <?php echo $id; ?> <?php echo "category_{$cat_id}_{$service_id}_service_button_url"; ?>" value="<?php echo $value; ?>" title="">
            <?php }elseif($id == 'service_image'){ ?>
                <img src="<?php echo empty($value) ? SPL_DEFAULT_THUMBNAIL: $value; ?>" width="45px;" height="45px;" />
                <input type="file" name="<?php echo $name; ?>" class="form-control <?php echo $id; ?>" value="<?php echo $value; ?>" title="" id="<?php echo $html_id; ?>">
                <input type="hidden" name="<?php echo $name; ?>" id="<?php echo $html_id; ?>" class="form-control <?php echo $id; ?>" value="<?php echo $value; ?>" title="">
            <?php }else{ ?>
                <input type="text" name="<?php echo $name; ?>" id="<?php echo $html_id; ?>" class="form-control <?php echo $id; ?>" value="<?php echo $value; ?>" title="">
            <?php } ?>
        </div>
        </div>  <?php echo '<!-- ' . $title . ' -->'; ?>
        <?php
        $html=ob_get_clean();
        return $html;
    }//end service_item()
}//end if !function_exists('service_item')
if(!function_exists('category_name_row')){
    function category_name_row($cat_id,$cat_name="",$cat_description){
        $cat_name=remove_slash_quotes($cat_name);
        ob_start();
        ?>
        <div class="categor-sec-first" style="background: none;">
         <div class="heading-catag">
             <div><i class="fa fa-arrows" aria-hidden="true" style="float: right;margin: 11px;font-size: 19px;"></i></div>
             <span><?php echo $GLOBALS['CATEGORY']; ?></span>
             <?php
                 //if($service_id > 1){
             ?>
             <a href="javascript:void(0);" id="remove-category-row" class="remove-category" onclick=""><?php echo $GLOBALS['Remove_Category']; ?> [-]</a>
             <?php //} ?>
         </div>
         <div class="df-spl-row category-name-row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 lbl">
                <label for="category_<?php echo $cat_id; ?>_name"><?php echo $GLOBALS['Category_Name']; ?>(<?php echo $cat_id; ?>)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 ini">
                <input type="text" name="category[<?php echo $cat_id; ?>][name]" id="category_<?php echo $cat_id; ?>_name" class="form-control category_name" value="<?php echo $cat_name; ?>" title="">
            </div>
        </div> <!-- Category Name -->
        <!--Category Description-->
        <div class="df-spl-row category-description-row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 lbl">
                <label for="category_<?php echo $cat_id; ?>_description"><?php echo $GLOBALS['Category_Description']; ?>(<?php echo $cat_id; ?>)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 ini">
                <textarea name="category[<?php echo $cat_id; ?>][description]" id="category_<?php echo $cat_id; ?>_description" class="form-control category_description" rows="2" cols="50"><?php echo remove_slash_quotes($cat_description); ?></textarea>
            </div>
        </div>
    </div>
    <!--End Category Description-->
    <?php
    $html=ob_get_clean();
    return $html;
    }//end category_name_row()
}//end if !function_exists('category_name_row')
if(!function_exists('category_row')){
    function category_row($cat_id,$cat=null,$max_service_count=3){
        //echo $cat_id;
        ob_start();
        $cat_name="";
        if(!is_null($cat)){
            $cat_name=$cat['name'];
            unset($cat['name']);//remove the name items, so, we can use foreach to process
        }
        $cat_description="";
        if(!is_null($cat)){
            //$cat_description=$cat['description'];
            $cat_description=isset($cat['description']) ? $cat['description'] : '';
            unset($cat['description']);//remove the name items, so, we can use foreach to process
        }
        ?>
        <div id="sortable" class="df-spl-row category-row ui-widget-content" style="margin:0;padding:0;margin-top:20px">
            <?php
                    // $cat_id=0;
                    // $service_id=0;
            echo category_name_row($cat_id,$cat_name,$cat_description);
            ?>
            <?php
            foreach ($cat as $service_id => $service):
                ?>
                <!-- echo category_row($cat_id,$service_id,$cat_name); -->
                <div class="service-price-length-rows-wrapper">
                    <div class="spl_ser_sec_ico"><i class="fa fa-arrows" aria-hidden="true" style="float: right;margin: 11px;font-size: 19px;"></i></div>
                    <?php
                    echo service_items_html($cat_id,$service_id,$service);
                    echo add_remove_service($max_service_count);
                    ?>
                </div> <!-- service-price-length-rows-wrapper -->
                <?php
            endforeach;
            if($service_id > 1){
                ?>
                <!--<a href="javascript:void(0);" id="remove-category-row" class="remove-category" onclick=""><?php echo $GLOBALS['Remove_Category']; ?></a>-->
            <?php } ?>
        </div> <!-- category-row -->
        <?php
        $html=ob_get_clean();
        return $html;
    }//end category_row()
}//end if !function_exists('category_row')
?>
<?php if (array_key_exists('error', $_GET)): ?>
    <div class="notice notice-error"><p><?php esc_html_e( $_GET['error'], 'text_domain' ); ?></p></div>
<?php endif; ?>
<?php if (array_key_exists('success', $_GET)): ?>
    <div class="notice notice-success"><p><?php esc_html_e( $_GET['success'], 'text_domain' ); ?></p></div>
<?php endif; ?>
<div class="price_wrapper">
    <?php
    include_once dirname(__FILE__) . '/logo-header.php';
    ?>
</div>
<?php
global $spl_googlefonts_var;
$google_fonts=$spl_googlefonts_var->$get_fonts_options();
            // $google_fonts=array(
            //         ''=>'Select a Google Font',
            //     );
            // $gf_fonts=$spl_googlefonts_var->get_fonts();
            // foreach($gf_fonts as $font){
            //     $class = array();
            //     $has_variants = false;
            //     $has_subsets = false;
            //     $normalized_name = $spl_googlefonts_var->gf_normalize_font_name($font->family);
            //     $class[] = $normalized_name;
            //     if(count($font->variants)>1){
            //         $class[] = "has-variant";
            //     }
            //     if(count($font->subsets)>1){
            //         $class[] = "has-subsets";
            //     }
            //     $google_fonts[$normalized_name]=$font->family;
            // }
?>
<div class="body-inner price_wrapper" style="padding-right: 15px">
    <!---// INNER FORM IN ONE ROW --->
    <div class="form-save-and-restore">
        <form action="" method="POST" enctype="multipart/form-data" role="form">
            <div style="">
                <nav class="navbar navbar-secondary df-spl-edit-nav"> <!-- Start of Price List Title, Style, Save Button-->
                    <div class="container-fluid">
                        <div class="navbar-collapse collapse">
                            <div class="col-sm-3 col-md-3" style="padding: 28px 0;margin-right: 5px;">
                                <?php $list_name=remove_slash_quotes($list_name) ?>
                                <input type="text" name="list_name" id="list_name" class="form-control list_name" placeholder="<?php echo $Price_List_Name; ?>" required="" value="<?php echo $list_name; ?>" title="">
                            </div>
                            <div class="col-sm-3 col-md-3" style="padding: 28px 0;max-width: 250px;">
                                <select class="form-control sel1" name="tab_style" style="max-width:100% !important;height:40px;">
                                  <option class="form-control default_tab" value="">Select Style</option>
                                  <option class="form-control default_tab" value="with_tab" <?php echo isset($style) && $style =='with_tab' ? "selected": ""; ?> >Style #1</option>
                                  <option class="form-control default_tab" value="without_tab" <?php echo isset($style) && $style =='without_tab' ? "selected": ""; ?>>Style #2</option>
                                  <option class="form-control default_tab" value="without_tab_single_column" <?php echo isset($style) && $style=='without_tab_single_column' ? "selected": ""; ?>>Style #2 (Single Column)</option>
                                  <option class="form-control default_tab" value="style_3" <?php echo isset($style) && $style=='style_3' ? "selected": ""; ?>>Style #3</option>
                                  <option class="form-control default_tab" value="style_4" <?php echo isset($style) && $style=='style_4' ? "selected": ""; ?>>Style #4</option>
                                  <option class="form-control default_tab" value="style_5" <?php echo isset($style) && $style=='style_5' ? "selected": ""; ?>>Style #5</option>
                                  <option class="form-control default_tab" value="style_6" <?php echo isset($style) && $style=='style_6' ? "selected": ""; ?>>Style #6</option>
                                  <option class="form-control default_tab" value="style_7" <?php echo isset($style) && $style=='style_7' ? "selected": ""; ?>>Style #7</option>
                              </select>
                              <div class="select-right-icon"><span class="df-scc-eui-FormControlLayoutCustomIcon"><svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="df-scc-eui-Icon df-scc-eui-Icon--medium df-scc-eui-FormControlLayoutCustomIcon__icon" focusable="false" role="img" aria-hidden="true">
                                <path fill-rule="non-zero" d="M13.069 5.157L8.384 9.768a.546.546 0 01-.768 0L2.93 5.158a.552.552 0 00-.771 0 .53.53 0 000 .759l4.684 4.61c.641.631 1.672.63 2.312 0l4.684-4.61a.53.53 0 000-.76.552.552 0 00-.771 0z">
                                </path>
                            </svg></span></div>
                        </div>
                        <ul class="nav navbar-nav edit-page-nav navbar-right">
                            <li style="margin-right:30px;"><a name="add_to_webpage" value="" class="add_to_webpage"><i class="fa fa-desktop" aria-hidden="true" style="font-size:20px;padding-right:10px;"></i> <?php echo $ADD_TO_WEBPAGE; ?></a></li>
                            <li style="margin-right:30px;"><a name="load_template" value="" class="advance_setting"><i class="fa fa-cog" aria-hidden="true" style="font-size:20px;padding-right:10px;"></i><?php echo $More_Settings; ?></a></li>
                            <li style="margin-right:30px;"><a name="font_settitng" value="" class="font_settitng"><i class="fa fa-text-height" aria-hidden="true" style="font-size:20px;padding-right:10px;"></i><?php echo $FONT_SETTINGS; ?></a></li>
                            <li style="margin-right:30px;"><span class="main-save spl_btn_primary" >
                               <?php submit_button( __( $Save, 'spl' ), 'primary', null, true, array('onClick' => 'javascript:splHandleFormSubmit()')); ?>
                           </span></li>
                       </ul>
                   </div>
               </div>
           </nav><!--End of Nav 2 --- Price List Title, Style, Save Button-->
           <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="style5_category_container" style="display:none">
            <div class="form-group" style="padding: 10px;border-radius: 5px;">
                <label for="exampleInputEmail1" style="padding-bottom:10px;">Nav-Bar Style  | Category Tabs</label>
                <select class="form-control" id="style5_category" name="style5_category" style="max-width:200px!important;margin-top:5px">
                    <option class="form-control default_tab" value="style5_category_1" <?php echo isset($style5_category) && $style5_category =='style5_category_1' ? "selected": ""; ?> >Style 1 | Right Side</option>
                    <option class="form-control default_tab" value="style5_category_2" <?php echo isset($style5_category) && $style5_category =='style5_category_2' ? "selected": ""; ?> >Style 2 | Thicker</option>
                </select>
            </div>
        </div>
        <!--Section for Change Style
        <div class="df-spl-row cats-row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="default_tab"><?php echo $Select_Style; ?></label>
            </div>
        </div>
        End Section for Change Style-->
        <div class="df-spl-row cats-row show_hide_shortcode" style="display:none;">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="background: #fff;padding: 30px;border-radius: 10px;">
              <div style="font-size:30px;font-weight:400">Shortcode</div>
              <div style="font-size:20px;padding-top:15px;"><b>[pricelist id="<?php esc_html_e( $id, 'text_domain' );?>"]</b></div><br><br>
              <span style=""><a href="https://designful.freshdesk.com/en/support/solutions/articles/48001081305-important-adding-the-price-list-to-your-web-page-shortcode-" target="_blank">Important tutorial for adding the shortcode</a></span>
          </div>
      </div>
      <?php
  /*$opt=get_option('spllk_opt');
     if(empty($opt)){
       echo '<p class="free_version">You are using the <span class="highlighted">Demo</span> version of the plugin. Click <span class="highlighted"><a href="https://stylishpricelist.com/">here</a></span> to buy the pro version.</p>';
   }*/
   ?>
   <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 cats-row more_setting" style="background-color:#f8faf9;padding:20px;border-radius:5px;margin-top:10px;"><!-- START of Left Price List Settings-->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- START of Dashboard Settings Category-->
        <div class="df-spl-pl-settings-title">Dashboard Settings</div>
        <hr class="df-spl-pl-settings-hr">
        <div class="df-spl-row cats-row more_setting" style="clear:both;"><!-- Add Select Language-->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
                <label for="select_lang"><?php echo $Select_Language; ?></label>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 no-pa">
                <select style="max-width:400px;" class="form-control" id="select_lang" name="select_lang">
                    <?php if(isset($_REQUEST['lang'])){ ?>
                      <option  value="EN" <?php if($_REQUEST['lang']=='EN' ){ echo "selected"; } ?> >EN</option>
                      <option  value="SP" <?php if($_REQUEST['lang']=='SP'){ echo "selected"; } ?> >SP</option>
                      <option  value="FR" <?php if($_REQUEST['lang']=='FR'){ echo "selected"; } ?> >FR</option>
                      <option  value="DE" <?php if($_REQUEST['lang']=='DE'){ echo "selected"; } ?> >DE</option>
                  <?php }
                  else{
                    ?>
                    <option  value="EN" <?php if(isset($cats_data1['select_lang']) && $cats_data1['select_lang']=='EN'){ echo "selected"; } ?> >EN</option>
                    <option  value="SP" <?php if(isset($cats_data1['select_lang']) && $cats_data1['select_lang']=='SP'){ echo "selected"; } ?> >SP</option>
                    <option  value="FR" <?php if(isset($cats_data1['select_lang']) && $cats_data1['select_lang']=='FR'){ echo "selected"; }?> >FR</option>
                    <option  value="DE" <?php if(isset($cats_data1['select_lang']) && $cats_data1['select_lang']=='DE'){ echo "selected"; } ?> >DE</option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div><!--End Select language-->
</div><!-- End of Dashboard Settings Category-->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- START of Columns Settings Category-->
    <div class="df-spl-pl-settings-title">Columns Settings</div>
    <hr class="df-spl-pl-settings-hr">
    <!-- START Select Column Count -->
    <div class="df-spl-row cats-row more_setting">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
            <label for="select_lang"><?php echo $Select_Column; ?></label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 no-pa">
            <select style="max-width:400px;" class="form-control" id="select_column" name="select_column">
                <option><?php echo $Select_Column; ?></option>
                <option  value="One" <?php if(isset($cats_data1['select_column']) && $cats_data1['select_column'] =='One'){ echo "selected"; } ?> >One</option>
                <option  value="Two" <?php if(isset($cats_data1['select_column']) && $cats_data1['select_column']=='Two'){ echo "selected"; } ?> >Two</option>
            </select>
        </div>
    </div>
    <!-- End Select Column Count -->
    <!-- START Max Width Box -->
    <div class="df-spl-row cats-row more_setting">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
            <label for="select_lang"><?php echo $Max_Width; ?></label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 no-pa">
            <input style="max-width:400px;" type="text" name="spl_container_max_width" placeholder="Example : 1200px" value="<?php echo isset($cats_data['spl_container_max_width']) ? $cats_data['spl_container_max_width'] : '' ; ?>" id="spl_container_max_width" class="form-control spl_container_max_width" />
        </div>
    </div>
    <!-- END Max Width Box -->
</div><!-- START of Columns Settings Category-->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- START of Category (Tab) Settings Category-->
    <div class="df-spl-pl-settings-title">Category (Tab) Settings</div>
    <hr class="df-spl-pl-settings-hr">
    <!--Change All Tab name-->
    <div class="df-spl-row cats-row more_setting">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
            <label for="all_tab"><?php echo $Change_All_word_for_Categories; ?> <span class="all_tab_span">(<?php echo $different_languages; ?>)</span></label>
        </div>
        <?php
        $all_tab= isset($cats_data['all_tab']) ? $cats_data['all_tab'] : '';
        if($all_tab!='' && isset($all_tab)){$all_tab=$all_tab;}else{$all_tab="All";}
        ?>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 no-pa">
            <input style="max-width:400px;" type="text" name="all_tab" id="all_tab" class="form-control all_tab" value="<?php echo $all_tab; ?>" title="">
        </div>
    </div>
    <!--End Change All Tab name-->
    <!-- Start of Change DEFAULT Tab name-->
    <div class="df-spl-row more_setting">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
            <label for="default_tab"><?php echo $Default_Tab; ?></label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 no-pa">
            <select style="max-width:400px" class="form-control sel1" name="default_tab">
                <?php
                if(isset($all_tab) && $all_tab !=''){
                    $all=$all_tab;
                }else{
                    $all="All";
                }
                ?>
                <option style="max-width:400px;" class="form-control default_tab" value=""><?php echo $all?></option>
                <?php
                if(isset($cats_data1) && is_array($cats_data1)) {
                   foreach($cats_data1['category'] as $key => $cats_datas['category']){
                     if(strtolower($key)== strtolower($cats_data['default_tab']))
                         {$sel="Selected"; } else{$sel="";} ?>
                     <option class="form-control default_tab <?php if($cats_datas['category']['name']==""){echo " hidden";}?>" value="<?php echo $key;?>" <?php echo $sel;?>><?php echo $cate_name=$cats_datas['category']['name'];?></option>
                 <?php } }
                 ?>
             </select>
         </div>
     </div>
     <!-- END of Change DEFAULT Tab name-->
     <!--Start Hide All Tab-->
     <div class="df-spl-row cats-row more_setting">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
            <label for="default_tab"><?php echo $Display_the_All_word; ?> <span class="all_tab_span" style="color:red"></span></label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <?php
          $toggle_all_tab= isset($cats_data['toggle_all_tab']) ? $cats_data['toggle_all_tab'] : '';
          $checked="checked";
          $unchecked="";
          ?>
          <div class="custom_radio_btn"><input type="radio" name="toggle_all_tab" class="toggle_all_tab" required="" value="0" <?php if($toggle_all_tab==0 ){ echo $checked;} else{echo $unchecked; }?>>Off<label class="radio-inline"><span></span></label></div>
          <div class="custom_radio_btn"><input type="radio" name="toggle_all_tab" class="toggle_all_tab" required="" value="1" <?php if($toggle_all_tab==1 || $toggle_all_tab==''){ echo $checked;} else{echo $unchecked; }?>>On<label class="radio-inline"><span></span></label></div>
      </div>
  </div>
  <!--End Hide All Tab-->
  <!-- Start of Stylish Category Tab Button-->
  <div class="df-spl-row cats-row more_setting">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
        <label for="category_tab_button"><?php echo $Stylish_Category_Tabs_Buttons; ?><span class="category_tab_button" style="color:red"></span></label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 no-pa">
      <?php
      $style_cat_tab_btn= isset($cats_data['style_cat_tab_btn']) ? $cats_data['style_cat_tab_btn'] : '';
      $checked="checked";
      $unchecked="";
      ?>
      <div class="custom_radio_btn"><input type="radio" name="style_cat_tab_btn" class="style_cat_tab_btn" required="" value="0" <?php if($style_cat_tab_btn==0 || $toggle_all_tab==''){ echo $checked;} else{echo $unchecked; }?>>Off<label class="radio-inline"><span></span></label></div>
      <div class="custom_radio_btn"><input type="radio" name="style_cat_tab_btn" class="style_cat_tab_btn" required="" value="1" <?php if($style_cat_tab_btn==1 ){ echo $checked;} else{echo $unchecked; }?>>On<label class="radio-inline"><span></span></label></div>
  </div>
</div>
<!--End of Stylish Category Tab Button-->
<!--Start of Category Separator setting-->
<div class="df-spl-row cats-row more_setting">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
        <label for="default_tab"><?php echo $Category_Separator_Symbol; ?><span class="category_separator_symbol" style="color:red"></span></label>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
      <?php
      $toggle= isset($cats_data['toggle']) ? $cats_data['toggle'] : '';
      $checked="checked";
      $unchecked="";
      ?>
      <div class="custom_radio_btn"><input type="radio" name="toggle" class="toggle" required="" value="0" <?php if($toggle== '0' || $toggle==''){ echo $checked;}?> >Off<label class="radio-inline"><span></span></label></div>
      <div class="custom_radio_btn"><input type="radio" name="toggle" class="toggle" required="" value="1" <?php if($toggle == '1' ){ echo $checked; }?> >On<label class="radio-inline"><span></span></label></div>
  </div>
</div>
<!--End of Category Separator setting-->
</div><!-- End of Category (Tab) Settings Category-->
</div><!-- END of Left Price List Settings-->
<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 cats-row more_setting" style="background-color:#f8faf9;padding:20px;border-radius:5px;margin-top:10px;"><!-- START of Right Price List Settings-->
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- START of Title Settings Category-->
        <div class="df-spl-pl-settings-title">Title Settings</div>
        <hr class="df-spl-pl-settings-hr">
        <!--START remove title-->
        <div class="df-spl-row cats-row more_setting">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
                <label for="remove_title_tab"><?php echo $Remove_title; ?> ? </label>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <?php
                $spl_remove_title= isset($cats_data['spl_remove_title']) ? $cats_data['spl_remove_title'] : '';
                $checked="checked";
                $unchecked="";
                ?>
                <div class="custom_radio_btn"><input type="radio" name="spl_remove_title" class="spl_remove_title" required="" value="0" <?php if( empty($spl_remove_title) ){ echo $checked;} else{echo $unchecked; }?> >Off<label class="radio-inline"><span></span></label></div>
                <div class="custom_radio_btn"><input type="radio" name="spl_remove_title" class="spl_remove_title" required="" value="1" <?php if( !empty($spl_remove_title) ){ echo $checked;} else{echo $unchecked; }?> >On<label class="radio-inline"><span></span></label></div>
            </div>
        </div><!--END remove title-->
        <!--Start Break Title of Service Name-->
        <div class="df-spl-row cats-row more_setting">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
                <label for="category_tab_button"><?php echo $Break_title_of_Service; ?></label>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <?php
                $brack_title_desktop = isset($cats_data['brack_title_desktop']) ? $cats_data['brack_title_desktop'] : '';
                $brack_title_tablets = isset($cats_data['brack_title_tablets']) ? $cats_data['brack_title_tablets'] : '';
                if($brack_title_desktop!='' && $brack_title_desktop==1){
                   $desktop_check='checked="checked"';
               }else{
                   $desktop_check="";
               }
               if($brack_title_tablets != "" && $brack_title_tablets==1){
                   $tab_check='checked="checked"';
               }else{
                   $tab_check="";
               }
               ?>
               <div class="checkbox">
                  <label><input name="brack_title_desktop" type="checkbox" value="1" <?php echo $desktop_check; ?> ><?php echo $Break_line_of_categories_on_Desktop; ?> </label>
              </div>
              <div class="checkbox">
                  <label><input name="brack_title_tablets" type="checkbox" value="1" <?php echo $tab_check; ?> ><?php echo $Break_line_of_categories_on_Tablets; ?> </label>
              </div>
          </div>
      </div>
      <!--End of Break Title of Service-->
  </div><!-- End of Title Settings Category-->
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- START of Buy Buttons Settings Category-->
    <div class="df-spl-pl-settings-title">Buy Button Settings</div>
    <hr class="df-spl-pl-settings-hr">
    <!--Open Buy now links in new tab-->
    <div class="df-spl-row cats-row more_setting">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
            <label for="category_tab_button"><?php echo $Open_Buy_Btn_Link_In_New_Tab; ?><span class="category_tab_button" style="color:red"></span></label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <?php
          $style_buy_btn_newtab = isset($cats_data['style_buy_btn_newtab']) ? $cats_data['style_buy_btn_newtab'] : '';
          $checked="checked";
          $unchecked="";
          ?>
          <div class="custom_radio_btn"><input type="radio" name="style_buy_btn_newtab" class="style_buy_btn_newtab" required="" value="0" <?php if($style_buy_btn_newtab==0 || $toggle_all_tab==''){ echo $checked;} else{echo $unchecked; }?>>Off<label class="radio-inline"><span></span></label></div>
          <div class="custom_radio_btn"><input type="radio" name="style_buy_btn_newtab" class="style_buy_btn_newtab" required="" value="1" <?php if($style_buy_btn_newtab==1 ){ echo $checked;} else{echo $unchecked; }?>>On<label class="radio-inline"><span></span></label></div>
      </div>
  </div>
  <!--End Open Buy now links in new tab-->
</div><!-- End  of Buy Buttons Settings Category-->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- START of Search & Filter Settings Category-->
    <div class="df-spl-pl-settings-title">Search & Filter Feature</div>
    <hr class="df-spl-pl-settings-hr">
    <!-- Start of Search & Filter Settings -->
    <div class="df-spl-row cats-row more_setting">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
            <label for="category_tab_button"><?php echo $Add_Search_Bar; ?><span class="category_tab_button" style="color:red"></span></label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
          <?php
          $enable_searchbar = isset($cats_data['enable_searchbar']) ? $cats_data['enable_searchbar'] : '';
          $checked="checked";
          $unchecked="";
          ?>
          <div class="custom_radio_btn"><input type="radio" name="enable_searchbar" class="enable_searchbar" required="" value="0" <?php if(empty($enable_searchbar)){ echo $checked;} else{echo $unchecked; }?>>Off<label class="radio-inline"><span></span></label></div>
          <div class="custom_radio_btn"><input type="radio" name="enable_searchbar" class="enable_searchbar" required="" value="1" <?php if(!empty($enable_searchbar)){ echo $checked;} else{echo $unchecked; }?>>On<label class="radio-inline"><span></span></label></div>
      </div>
  </div>
  <!-- End of Search & Filter Settings -->
</div><!-- End of Search & Filter Settings Category-->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><!-- START of Misc Settings Category-->
    <div class="df-spl-pl-settings-title">Misc Settings</div>
    <hr class="df-spl-pl-settings-hr">
    <!--Add Textarea for price list description-->
    <div class="df-spl-row cats-row more_setting">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 lbl">
            <label for="all_tab"><?php echo stripslashes($Price_List_Description); ?></label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <textarea name="price_list_desc" id="price_list_desc" class="form-control price_list_desc" rows="2" cols="50"><?php if(isset($price_list_desc)){ echo str_replace('\"','"',str_replace("\'","'",stripslashes($price_list_desc))); } ?></textarea>
        </div>
    </div><!--End of Add Textarea for price list description-->
</div><!-- End of Misc Settings Category-->
</div><!-- END of Right Price List Settings-->

<div style="max-width:900px;margin-left:0px;">
    <?php
    global $spl_googlefonts_var;
    $google_fonts=$spl_googlefonts_var->$get_fonts_options();
            // $google_fonts=array(
            //         ''=>'Select a Google Font',
            //     );
            // $gf_fonts=$spl_googlefonts_var->get_fonts();
            // foreach($gf_fonts as $font){
            //     $class = array();
            //     $has_variants = false;
            //     $has_subsets = false;
            //     $normalized_name = $spl_googlefonts_var->gf_normalize_font_name($font->family);
            //     $class[] = $normalized_name;
            //     if(count($font->variants)>1){
            //         $class[] = "has-variant";
            //     }
            //     if(count($font->subsets)>1){
            //         $class[] = "has-subsets";
            //     }
            //     $google_fonts[$normalized_name]=$font->family;
            // }
    ?>
    <?php //echo $google_fonts_preview_out(); ?>
    <?php //if(false): ?>
        <!--<div class="df-spl-row cats-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="google">
                <b>How Google font looks like? check </b> <a href="https://fonts.google.com/">google fonts preview</a>
                </div>
            </div>
        </div>-->
        <?php //endif;//end false ?>
        <?php //echo $html_out('list_name_font',$google_fonts,$list_name_font,'Title (Font Style)'); ?>
        <?php //echo $html_out('title_font',$google_fonts,$title_font,'Service Categories (Font Style)'); ?>
        <?php //echo $html_out('price_font',$google_fonts,$price_font,'Price (Font Style)'); ?>
        <?php //echo $html_out('desc_font',$google_fonts,$desc_font,'Description (Font Style)'); ?>
    </div>
    <div class="container font_setting_container" style="margin-top:30px;max-width:900px;margin-left:0px; display:none;">
     <div class="df-spl-row">
      <div class="col-md-5">
          <div class="title-list-style">
              <div class="col-md-12" style="background: #5bb3a7;border-radius: 10px 10px 0 0;">
                <h4 class="title-font"><b><?php echo $Title; ?></b></h4>
            </div>
            <div class="df-spl-row cats-row">
                <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                    <label for="title_font_size"><?php echo $Font_Size; ?></label>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
                    <select class="form-control sel1" name="title_font_size" style="box-shadow: 2px 2px 0px #888;">
                      <option class="form-control title_size" value="">Size</option>
                      <?php
                      for($i=1; $i<=100; $i++){
                        if(array_key_exists('title_font_size', $cats_data)) {
                            if($i.'px'== $cats_data['title_font_size']){
                                $select_ser = "selected";
                            }
                            else{
                                $select_ser = "";
                            }
                        }
                        else{
                            $select_ser = "";
                        }
                        ?>
                        <option class="form-control title_font_size" value="<?php echo $i ?>px" <?php echo isset($select_ser) ? $select_ser : ''; ?>><?php echo $i ?>px</option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <?php if($title_color_top == ''){ echo color_out('title_color_top','#000',$Font_Color); }?>
        <?php if($title_color_top != ''){ echo color_out('title_color_top',$title_color_top,$Font_Color); }?>
        <?php echo $html_out('list_name_font',$google_fonts,$list_name_font,$Font_Style); ?>
        <!--start spl font weight setting for title-->
        <div class="df-spl-row cats-row font-weight-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
                <label for="title_font_weight">Font Weight</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8 padl-align">
                <select class="form-control" id="title_font-weight" name="title_font-weight" style="box-shadow: 2px 2px 0px #888;">
                    <option class="form-control title_weight" value="">Font Weight</option>
                    <?php
                    foreach($optionArr as $key => $value){
                   $isSelected =""; //added this line
                   if(isset($cats_data['title_font-weight']) && $cats_data['title_font-weight'] == $value){
                     $isSelected = "selected";
                 }
                 echo '<option class="form-control title_font-weight" value="'.$value.'"'.$isSelected.'>'.str_replace("_"," ",$key).'</option>';
             }
             ?>
         </select>
     </div>
 </div>
 <!--end spl font weight setting for title-->
</div>
</div>
<div class="col-md-5">
    <div class="title-list-style">
        <div class="col-md-12" style="background: #5bb3a7;border-radius: 10px 10px 0 0;">
            <h4 class="title-font"><b><?php echo $Category_Tabs; ?></b></h4>
        </div>
        <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="tab_font_size"><?php echo $Font_Size; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
                <select class="form-control sel1" name="tab_font_size" style="box-shadow: 1px 1px 0px #888;">
                    <option class="form-control tab_size" value="">Size</option>
                    <?php
                    for($j=1; $j<=100; $j++){
                        if(array_key_exists('tab_font_size', $cats_data)) {
                            if($j.'px'== $cats_data['tab_font_size']){
                                $select_ser = "selected";
                            }
                            else{
                                $select_ser = "";
                            }
                        }
                        else{
                            $select_ser = "";
                        }
                        ?>
                        <option class="form-control tab_font_size" value="<?php echo isset($j) ? $j : '' ;?>px" <?php echo isset($select_ser) ? $select_ser : ''; ?>><?php echo isset($j) ? $j : '';?>px</option>
                    <?php }
                    ?>
                </select>
            </div>
        </div>
        <?php if($title_color == ''){ echo color_out('title_color','#000',$Font_Color); }?>
        <?php if($title_color != ''){ echo color_out('title_color',$title_color,$Font_Color); }?>
        <?php echo $html_out('title_font',$google_fonts,$title_font,$Font_Style); ?>
        <?php if(false): ?>
          <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="title_color_top">Title (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="title_color_top" id="title_color_top" class="form-control title_color_top color-picker" value="<?php echo $title_color_top; ?>" title="">
            </div>
        </div>
        <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="title_color">Service Categories (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="title_color" id="title_color" class="form-control title_color color-picker" value="<?php echo $title_color; ?>" title="">
            </div>
        </div> <!-- Title Color -->
        <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="price_color"><?php echo $Font_Color; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8">
                <input type="text" name="price_color" id="price_color" class="form-control price_color color-picker" value="<?php echo $price_color; ?>" title="">
            </div>
        </div> <!-- Price Color -->
        <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="hover_color"><?php echo $Hover_Color; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="hover_color" id="hover_color" class="form-control hover_color color-picker" value="<?php echo $hover_color; ?>" title="">
            </div>
        </div>
        <!-- Hover Color -->
        <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="service_color">Service Description (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="service_color" id="service_color" class="form-control service_color color-picker" value="<?php echo $service_color; ?>" title="">
            </div>
        </div>
    <?php endif;//end false ?>
    <script type="text/javascript">
      jQuery(function($){
       jQuery('.color-picker').wpColorPicker();
   });
      function splHandleFormSubmit() {
          event.preventDefault();
          jQuery('#submit_tabs').click();
      }
  </script>
  <!--start spl font weight setting for category tabs-->
  <div class="df-spl-row cats-row font-weight-row">
    <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
        <label for="tab_font_weight">Font Weight</label>
    </div>
    <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8 padl-align">
        <select class="form-control" id="catrgories-font-weight" name="tab_font-weight" style="box-shadow: 2px 2px 0px #888;">
            <option class="form-control tab_weight" value="">Font Weight</option>
            <?php
            foreach($optionArr as $key => $value){
                   $isSelected =""; //added this line
                   if(isset($cats_data['tab_font-weight']) && $cats_data['tab_font-weight'] == $value){
                     $isSelected = "selected";
                 }
                 echo '<option class="form-control tab_font-weight" value="'.$value.'"'.$isSelected.'>'.str_replace("_"," ",$key).'</option>';
             }
             ?>
         </select>
     </div>
 </div>
 <!--end spl font weight setting for category tabs-->
</div>
</div>
</div>
<div class="df-spl-row">
  <div class="col-md-5">
      <div class="title-list-style">
          <div class="col-md-12" style="background: #5bb3a7;border-radius: 10px 10px 0 0;">
            <h4 class="title-font"><b><?php echo $Service_Name; ?></B></h4>
            </div>
            <div class="df-spl-row cats-row">
                <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                    <label for="tab_font_size"><?php echo $Font_Size; ?></label>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
                    <select class="form-control sel1" name="service_font_size" style="box-shadow: 2px 2px 0px #888;">
                      <option class="form-control service_size" value="">Size</option>
                      <?php
                      for($k=1; $k<=100; $k++){
                        if(array_key_exists('service_font_size', $cats_data)) {
                            if($k.'px'== $cats_data['service_font_size']){
                                $select_ser = "selected";
                            }
                            else{
                                $select_ser = "";
                            }
                        }
                        else{
                            $select_ser = "";
                        }
                        ?>
                        <option class="form-control service_font_size" value="<?php echo $k ;?>px" <?php echo $select_ser; ?>><?php echo $k ;?>px</option>
                    <?php }
                    ?>
                </select>
            </div>
        </div>
        <?php if($service_color == ''){ echo color_out('service_color','#000',$Font_Color); }?>
        <?php if($service_color != ''){echo color_out('service_color',$service_color,$Font_Color); }?>
        <?php echo $html_out('desc_font',$google_fonts,$desc_font,$Font_Style); ?>
        <?php if($hover_color == ''){ echo color_out('hover_color','#000',$Hover_Color); } ?>
        <?php if($hover_color != ''){ echo color_out('hover_color',$hover_color,$Hover_Color); }?>
        <!--start spl font weight setting for services-->
        <div class="df-spl-row cats-row font-weight-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
                <label for="service_font_weight">Font Weight</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8 padl-align">
                <select class="form-control" id="service-font-weight" name="service_font-weight" style="box-shadow: 2px 2px 0px #888;">
                    <option class="form-control service_weight" value="">Font Weight</option>
                    <?php
                    foreach($optionArr as $key => $value){
                   $isSelected =""; //added this line
                   if(isset($cats_data['service_font-weight']) && $cats_data['service_font-weight'] == $value){
                     $isSelected = "selected";
                 }
                 echo '<option class="form-control service_font-weight" value="'.$value.'"'.$isSelected.'>'.str_replace("_"," ",$key).'</option>';
             }
             ?>
         </select>
     </div>
 </div>
 <!--end spl font weight setting for services-->
</div>
</div>
<div class="col-md-5">
    <div class="title-list-style">
      <div class="col-md-12" style="background: #5bb3a7;border-radius: 10px 10px 0 0;">
        <h4 class="title-font"><b><?php echo $Service_Price; ?></b></h4>
    </div>
    <div class="df-spl-row cats-row">
        <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
            <label for="tab_font_size"><?php echo $Font_Size; ?></label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
            <select class="form-control sel1" name="service_price_font_size" style="box-shadow: 2px 2px 0px #888;">
              <option class="form-control service_price_font_size" value="">Size</option>
              <?php
              for($n=1; $n<=100; $n++){
                $change_lang_value = '';
                if(array_key_exists('service_price_font_size', $cats_data)) {
                    if($n.'px'== $cats_data['service_price_font_size']){
                        $select_ser = "selected";
                    }
                    else{
                      $select_ser = "";
                  }
              }else{
                $select_ser = "";
            }
            ?>
            <option class="form-control service_price_font_size" value="<?php echo $n ;?>px" <?php echo $select_ser; ?>><?php echo $n ;?>px</option>
        <?php }
        ?>
    </select>
</div>
</div>
<?php if($price_color == ''){ echo color_out('price_color','#000',$Font_Color); }?>
<?php if($price_color != ''){ echo color_out('price_color',$price_color,$Font_Color); }?>
<?php echo $html_out('price_font',$google_fonts,$price_font,$Font_Style); ?>
<?php if(false): ?>
    <div class="df-spl-row cats-row">
        <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl">
            <label for="title_color">Service Categories (Font Color)</label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
            <input type="text" name="title_color" id="title_color" class="form-control title_color color-picker" value="<?php echo $title_color; ?>" title="">
        </div>
    </div> <!-- Title Color -->
    <div class="df-spl-row cats-row">
        <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
            <label for="price_color"><?php echo $Font_Color; ?></label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8">
            <input type="text" name="price_color" id="price_color" class="form-control price_color color-picker" value="<?php echo $price_color; ?>" title="">
        </div>
    </div> <!-- Price Color -->
    <div class="df-spl-row cats-row">
        <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
            <label for="hover_color"><?php echo $Hover_Color; ?></label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
            <input type="text" name="hover_color" id="hover_color" class="form-control hover_color color-picker" value="<?php echo $hover_color; ?>" title="">
        </div>
    </div>
    <!-- Hover Color -->
    <div class="df-spl-row cats-row">
        <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
            <label for="service_color">Service Description (Font Color)</label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
            <input type="text" name="service_color" id="service_color" class="form-control service_color color-picker" value="<?php echo $service_color; ?>" title="">
        </div>
    </div>
<?php endif;//end false ?>
<script type="text/javascript">
  jQuery(function($){
   jQuery('.color-picker').wpColorPicker();
});
</script>
<!--start spl font weight setting for service price-->
<div class="df-spl-row cats-row font-weight-row">
    <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
        <label for="service_price_font_weight">Font Weight</label>
    </div>
    <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8 padl-align">
        <select class="form-control" id="srv-price-font-weight" name="service_price_font-weight" style="box-shadow: 2px 2px 0px #888;">
            <option class="form-control service_price_weight" value="">Font Weight</option>
            <?php
            foreach($optionArr as $key => $value){
                   $isSelected =""; //added this line
                   if(isset($cats_data['service_price_font-weight']) && ($cats_data['service_price_font-weight'] == $value)){
                     $isSelected = "selected";
                 }
                 echo '<option class="form-control service_price_font-weight" value="'.$value.'"'.$isSelected.'>'.str_replace("_"," ",$key).'</option>';
             }
             ?>
         </select>
     </div>
 </div>
 <!--end spl font weight setting for service price-->
</div>
</div>
</div>
<div class="df-spl-row">
  <div class="col-md-5">
    <div class="title-list-style">
      <div class="col-md-12" style="background: #5bb3a7;border-radius: 10px 10px 0 0;">
        <h4 class="title-font"><b><?php echo $Service_Description; ?></b></h4>
    </div>
    <div class="df-spl-row cats-row">
        <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
            <label for="tab_font_size"><?php echo $Font_Size; ?></label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
            <select class="form-control sel1" name="service_description_font_size" style="box-shadow: 2px 2px 0px #888;">
              <option class="form-control service_description_font_size" value="">Size</option>
              <?php
              for($n=1; $n<=100; $n++){
                if(array_key_exists('service_description_font_size', $cats_data)) {
                    if($n.'px'== $cats_data['service_description_font_size']){
                        $select_ser = "selected";
                    }
                    else{
                        $select_ser = "";
                    }
                }
                else{
                    $select_ser = "";
                }
                ?>
                <option class="form-control service_description_font_size" value="<?php echo $n ;?>px" <?php echo $select_ser; ?>><?php echo $n ;?>px</option>
            <?php }
            ?>
        </select>
    </div>
</div>
<?php if($service_description_color == ''){ echo color_out('service_description_color','#000',$Font_Color); }?>
<?php if($service_description_color != ''){ echo color_out('service_description_color',$service_description_color,$Font_Color); }?>
<?php echo $html_out('service_description_font',$google_fonts,$service_description_font,$Font_Style); ?>
<?php if(false): ?>
    <div class="df-spl-row cats-row">
        <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl">
            <label for="title_color">Service Categories (Font Color)</label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
            <input type="text" name="title_color" id="title_color" class="form-control title_color color-picker" value="<?php echo $title_color; ?>" title="">
        </div>
    </div> <!-- Title Color -->
    <div class="df-spl-row cats-row">
        <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
            <label for="price_color"><?php echo $Font_Color; ?></label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8">
            <input type="text" name="price_color" id="price_color" class="form-control price_color color-picker" value="<?php echo $price_color; ?>" title="">
        </div>
    </div> <!-- Price Color -->
    <div class="df-spl-row cats-row">
        <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
            <label for="hover_color"><?php echo $Hover_Color; ?></label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
            <input type="text" name="hover_color" id="hover_color" class="form-control hover_color color-picker" value="<?php echo $hover_color; ?>" title="">
        </div>
    </div>
    <!-- Hover Color -->
    <div class="df-spl-row cats-row">
        <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
            <label for="service_color">Service Description (Font Color)</label>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
            <input type="text" name="service_color" id="service_color" class="form-control service_color color-picker" value="<?php echo $service_color; ?>" title="">
        </div>
    </div>
<?php endif;//end false ?>
<script type="text/javascript">
  jQuery(function($){
   jQuery('.color-picker').wpColorPicker();
});
</script>
<!--start spl font weight setting for description-->
<div class="df-spl-row cats-row font-weight-row">
    <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
        <label for="description_font_weight">Font Weight</label>
    </div>
    <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8 padl-align">
        <select class="form-control" id="description_font-weight" name="description_font-weight" style="box-shadow: 2px 2px 0px #888;">
            <option class="form-control description_weight" value="">Font Weight</option>
            <?php
            foreach($optionArr as $key => $value){
                   $isSelected =""; //added this line
                   if(isset($cats_data['description_font-weight']) && ($cats_data['description_font-weight'] == $value)){
                     $isSelected = "selected";
                 }
                 echo '<option class="form-control description_font-weight" value="'.$value.'"'.$isSelected.'>'.str_replace("_"," ",$key).'</option>';
             }
             ?>
         </select>
     </div>
 </div>
 <!--end spl font weight setting for description-->
</div>
</div>
<!--START  spl CATEGORY DESCRIPTIONS !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!-->
<div class="col-md-5">
    <div class="title-list-style">
        <div class="col-md-12" style="background: #5bb3a7;border-radius: 10px 10px 0 0;">
            <h4 class="title-font"><b><?php echo $Category_description_Tabs; ?></b></h4>
        </div>
        <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="tab_description_font_size"><?php echo $Font_Size; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8  col-lg-8 padl-align">
                <select class="form-control sel1" name="tab_description_font_size" style="box-shadow: 1px 1px 0px #888;">
                    <option class="form-control tab_description_size" value="">Size</option>
                    <?php
                    for($j=1; $j<=100; $j++){
                        if(array_key_exists('tab_description_font_size', $cats_data)) {
                            if($j.'px'== $cats_data['tab_description_font_size']){
                                $select_ser = "selected";
                            }
                            else{
                                $select_ser = "";
                            }
                        }
                        else{
                            $select_ser = "";
                        }
                        ?>
                        <option class="form-control tab_description_font_size" value="<?php echo isset($j) ? $j : '' ;?>px" <?php echo isset($select_ser) ? $select_ser : ''; ?>><?php echo isset($j) ? $j : '';?>px</option>
                    <?php }
                    ?>
                </select>
            </div>
        </div>
        <?php if($tab_description_color == ''){ echo color_out('tab_description_color','#000',$Font_Color); }?>
        <?php if($tab_description_color != ''){ echo color_out('tab_description_color',$tab_description_color,$Font_Color); }?>
        <?php echo $html_out('tab_description_font',$google_fonts,$tab_description_font,$Font_Style); ?>
        <?php if(false): ?>
          <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="title_color_top">Title (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="title_color_top" id="title_color_top" class="form-control title_color_top color-picker" value="<?php echo $title_color_top; ?>" title="">
            </div>
        </div>
        <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="title_color">Service Categories (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="title_color" id="title_color" class="form-control title_color color-picker" value="<?php echo $title_color; ?>" title="">
            </div>
        </div> <!-- Title Color -->
        <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4 lbl">
                <label for="price_color"><?php echo $Font_Color; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8">
                <input type="text" name="price_color" id="price_color" class="form-control price_color color-picker" value="<?php echo $price_color; ?>" title="">
            </div>
        </div> <!-- Price Color -->
        <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="hover_color"><?php echo $Hover_Color; ?></label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="hover_color" id="hover_color" class="form-control hover_color color-picker" value="<?php echo $hover_color; ?>" title="">
            </div>
        </div>
        <!-- Hover Color -->
        <div class="df-spl-row cats-row">
            <div class="col-xs-5 col-sm-3 col-md-5 col-lg-5 lbl text-right">
                <label for="service_color">Service Description (Font Color)</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-6">
                <input type="text" name="service_color" id="service_color" class="form-control service_color color-picker" value="<?php echo $service_color; ?>" title="">
            </div>
        </div>
    <?php endif;//end false ?>
    <script type="text/javascript">
      jQuery(function($){
       jQuery('.color-picker').wpColorPicker();
   });
</script>
<!--start spl font weight setting for category tabs-->
<div class="df-spl-row cats-row font-weight-row">
    <div class="col-xs-5 col-sm-3 col-md-4 col-lg-4">
        <label for="tab_font_weight">Font Weight</label>
    </div>
    <div class="col-xs-7 col-sm-7 col-md-8 col-lg-8 padl-align">
        <select class="form-control" id="cat-tabs-font-weight" name="tab_description_font-weight" style="box-shadow: 2px 2px 0px #888;">
            <option class="form-control tab_weight" value="">Font Weight</option>
            <?php
            foreach($optionArr as $key => $value){
                   $isSelected =""; //added this line
                   if(isset($cats_data['tab_description_font-weight']) && ($cats_data['tab_description_font-weight'] == $value)){
                     $isSelected = "selected";
                 }
                 echo '<option class="form-control tab_description_font-weight" value="'.$value.'"'.$isSelected.'>'.str_replace("_"," ",$key).'</option>';
             }
             ?>
         </select>
     </div>
 </div>
 <!--end spl font weight setting for category tabs-->
</div>
</div>
</div>
</div>
<div style="max-width:900px;margin-left:0px;">
    <?php
    global $spl_googlefonts_var;
    $google_fonts=$spl_googlefonts_var->$get_fonts_options();
            // $google_fonts=array(
            //         ''=>'Select a Google Font',
            //     );
            // $gf_fonts=$spl_googlefonts_var->get_fonts();
            // foreach($gf_fonts as $font){
            //     $class = array();
            //     $has_variants = false;
            //     $has_subsets = false;
            //     $normalized_name = $spl_googlefonts_var->gf_normalize_font_name($font->family);
            //     $class[] = $normalized_name;
            //     if(count($font->variants)>1){
            //         $class[] = "has-variant";
            //     }
            //     if(count($font->subsets)>1){
            //         $class[] = "has-subsets";
            //     }
            //     $google_fonts[$normalized_name]=$font->family;
            // }
    ?>
    <?php //echo $google_fonts_preview_out(); ?>
    <?php //if(false): ?>
        <!--<div class="df-spl-row cats-row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="google">
                <b>How Google font looks like? check </b> <a href="https://fonts.google.com/">google fonts preview</a>
                </div>
            </div>
        </div>-->
        <?php //endif;//end false ?>
        <?php //echo $html_out('list_name_font',$google_fonts,$list_name_font,'Title (Font Style)'); ?>
        <?php //echo $html_out('title_font',$google_fonts,$title_font,'Service Categories (Font Style)'); ?>
        <?php //echo $html_out('price_font',$google_fonts,$price_font,'Price (Font Style)'); ?>
        <?php //echo $html_out('desc_font',$google_fonts,$desc_font,'Description (Font Style)'); ?>
    </div>
    <?php if(false): ?>
        <div class="df-spl-row cats-row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="list_name_font">Title (Font Style)</label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?php echo $html_out('list_name_font',$google_fonts,$list_name_font); ?>
            </div>
        </div> <!-- List Name Font -->
        <div class="df-spl-row cats-row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="title_font">Service Categories (Font Style)</label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?php echo $html_out('title_font',$google_fonts,$title_font); ?>
            </div>
        </div> <!-- Title Font -->
        <div class="df-spl-row cats-row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="price_font">Price (Font Style)</label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?php echo $html_out('price_font',$google_fonts,$price_font); ?>
            </div>
        </div> <!-- Price Font -->
        <div class="df-spl-row cats-row">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 lbl">
                <label for="desc_font">Description (Font Style)</label>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <?php echo $html_out('desc_font',$google_fonts,$desc_font); ?>
            </div>
            <!-- Description Font -->
        <?php endif;//end false ?>
        <div id="category-row-template" style="display:none;float: left;width: 100%;max-width: 900px;">
            <?php
            echo category_row(0,$init_cat,$max_service_count);
            ?>
        </div> <!-- category-row-template -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php
            $opt=get_option('spllk_opt');
            if(empty($opt)){
                echo '<p class="free_version">You are using the <span class="highlighted">free (demo)</span> version of the plugin. Click <span class="highlighted"><a href="https://stylishpricelist.com/">here</a></span> to buy the pro version.</p>';
            }
            ?>
        </div>
        <div class="category-rows-master-cls">
            <div id="category-rows-wrapper" style="float: left;width: 100%;max-width: 900px;">
                <?php
                $cats=$cats_data['category'];
                foreach ($cats as $cat_id => $cat) {
                    // $cat_name=$cat['name'];
                    echo category_row($cat_id,$cat,$max_service_count);
                    // unset($cat['name']);//remove the name items, so, we can use foreach to process
                    // foreach ($cat as $service_id => $service) {
                    //     echo category_row($cat_id,$service_id,$cat_name);
                    // }
                }
                ?>
            </div> <!-- category-rows-wrapper -->
            <div style="float: left;width: 100%;max-width: 800px;">
                <div class="heading-catag" style="margin-top:28px;color:white"> PREVIEW </div>
                <?php
                if($id!=''){
                    ?>
                    <div class="df-spl-row" id="preview_content" style="margin:0;padding:0;border-radius: 0;"><?php echo do_shortcode('[pricelist id="'.$_REQUEST["id"].'"]');?></div>
                <?php }
                ?>
            </div>
        </div>
        <div class="df-spl-row" style="clear:both;">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 add-category-row-lbl">
                <div class="add-new-cat" style="border: none;margin: 20px 0 20px 0;padding:0;">
                    <a href="javascript:void(0);" style="color: white;font-weight: 700;background: #5bb3a7;padding: 15px 30px 15px 30px;border-radius: 5px;text-decoration:none;" id="add-category-row" class="add-category-row" onclick="add_category(this)"><?php echo $GLOBALS['Add_Category']; ?></a>
                </div>
            </div>
        </div>
        <input type="hidden" name="field_id" class="form-control" value="<?php esc_html_e( $id, 'text_domain' ); ?>">
        <?php wp_nonce_field( 'spl_nonce' ); ?>
        <input type="hidden" name="spl_nonce" value="<?php echo wp_create_nonce( 'spl_nonce' ) ?>">
        <div class="df-spl-row df-spl-edit-nav">
            <div class="col-md-12" style="display:flex;align-items: center">
                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                    <div class="bottom-save spl_btn_primary"><!----Start of Save Button (Bottom) ---->
                        <?php submit_button( __( $Save, 'spl' ), 'primary', 'submit_tabs' ); ?>
                    </div><!----End of Save Button (Bottom) ---->
                </div>
                <!--Start of BackUp Button-->
                <?php
                if($id!=''){
                    if(!empty($opt) && (isset($opt['result']) && $opt['result'] =='success')){
                        $AddClass='';
                        ?>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                         <button type="button" name="backup" value="" class="spl_btn_primary button button-primary backup" style="height: 45px;"><i class="fa fa-file" aria-hidden="true" style="font-size:18px;margin-right:15px;"></i><?php echo $Backup; ?></button>
                     </div>
                     <?php
                 }
             }
             if($id=='' || $id!=''){
                if(!empty($opt) && (isset($opt['result']) && $opt['result'] =='success')){
                    ?>
                    <div class="col-md-2">
                       <button type="button" name="restore" value="" class="spl_btn_primary button button-primary restore" style="height: 45px;margin-right:15px;"><i class="fa fa-refresh" aria-hidden="true" style="font-size:18px;margin-right:15px;"></i><?php echo $Restore; ?></button>
                   </div>
                   <?php
        //endif;
               }
           }
           ?>
           <!--End of BackUp Button-->
       </div>
   </div>
</div>
</form><!----Preview, Restore & Backup Section---->
<!----Preview, Restore & Backup Section---->
<div class="df-spl-row">
</div>
<?php
if($id=='' || $id!=''){
    if(!empty($opt) && (isset($opt['result']) && $opt['result'] =='success')){
        ?>
        <div class="df-spl-row restore_content" style="display:none">
            <div class="col-md-12">
                <div class="back-up">
                    <form class="custom-backup-restore" method="post" action="<?php echo site_url()?>/wp-admin/admin.php?page=backup-restore.php" enctype="multipart/form-data">
                        <input type="hidden" name="list_id" value="<?php esc_html_e( $id, 'text_domain' ); ?>">
                        <input type="file" name="importtocsv" id="fileupload">
                        <button type="submit" name="restore" value="restore" class="spl_btn_primary button button-primary" style="width:200px;background:orange!important;"><?php echo $Restore; ?> Now</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
        //endif;
    }
}
if($id!=''){
    if(!empty($opt) && (isset($opt['result']) && $opt['result'] =='success')){
        $AddClass='';
        ?>
        <?php
    }
}
?>
<!--End Preview, Restore & Backup Section-->
<?php
if($id!=''){
    if(!empty($opt) && (isset($opt['result']) && $opt['result'] =='success')){
        $AddClass='';
        ?>
        <div class="df-spl-row backup_content" style="display:none;">
            <div class="col-md-12">
                <div class="back-up">
                    <form class="panel_accordian" method="post" action="<?php echo site_url()?>/wp-admin/admin.php?page=backup-restore.php">
                        <input type="hidden" name="list_id" value="<?php echo htmlentities($id); ?>">
                        <button type="submit" name="backup" value="<?php echo urlencode(htmlspecialchars($list_name)); ?>" class="spl_btn_primary button button-primary" style="width: 200px;background: orange!important;"><?php echo $Backup; ?> Now</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
} ?>
</div>
<input type="hidden" class="save_lang" value="<?php echo isset($cats_data1['select_lang']) ? $cats_data1['select_lang'] : 'EN' ; ?> ">
<?php
$change_lang_value = '';
if(array_key_exists('lang', $_REQUEST)) {
    $change_lang_value = esc_html_e( $_REQUEST['lang'], 'text_domain' );
}
?>
<input type="hidden" class="change_lang" value="<?php echo $change_lang_value ?>">
<div class="modal df-spl-modal" id="userSurvey">
    <div class="df-spl-euiOverlayMask df-spl-euiOverlayMask--aboveHeader">
        <div class="df-spl-euiModal df-spl-euiModal--maxWidth-default df-spl-euiModal--confirmation">
            <button class="df-spl-euiButtonIcon df-spl-euiButtonIcon--text df-spl-euiModal__closeIcon" type="button" data-dismiss="modal" aria-label="Closes this modal window"><svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="df-spl-euiIcon df-spl-euiIcon--medium df-spl-euiButtonIcon__icon" focusable="false" role="img" aria-hidden="true"><path d="M7.293 8L3.146 3.854a.5.5 0 11.708-.708L8 7.293l4.146-4.147a.5.5 0 01.708.708L8.707 8l4.147 4.146a.5.5 0 01-.708.708L8 8.707l-4.146 4.147a.5.5 0 01-.708-.708L7.293 8z"></path></svg></button>
            <div class="df-spl-euiModal__flex">
                <div class="df-spl-euiModalHeader">
                    <div class="df-spl-euiModalHeader__title trn">Satisfaction Survey</div>
                </div>
                <div class="df-spl-euiModalBody">
                    <div class="df-spl-euiModalBody__overflow">
                        <div class="df-spl-euiText df-spl-euiText--medium">
                            <p>Please take a quick moment to tell us how we are doing. The development team strive to make the best plugin for you and your visitors.</p>
                        </div>
                    </div>
                </div>
                <div class="df-spl-euiModalFooter">
                    <a class="df-spl-euiButton df-spl-euiButton--primary" href="https://stylishpricelist.com/how-can-we-be-better" onClick="handleFeedbackButtons(this, event)" data-btn-type="yes" target="_blank">
                        <span class="df-spl-euiButtonContent df-spl-euiButton__content">
                            <span class="df-spl-euiButton__text">It Could Be Better</span>
                        </span>
                    </a>
                    <a class="df-spl-euiButton df-spl-euiButton--primary df-spl-euiButton--fill" href="https://stylishpricelist.com/please-leave-a-review" onClick="handleFeedbackButtons(this, event)" data-btn-type="no" target="_blank">
                        <span class="df-spl-euiButtonContent df-spl-euiButton__content">
                            <span class="df-spl-euiButton__text">I’m Loving It!</span>
                        </span>
                    </a>
                    <button class="df-spl-euiButton df-spl-euiButton--primary" onClick="handleFeedbackButtons(this, event)" data-btn-type="skip">
                        <span class="df-spl-euiButtonContent df-spl-euiButton__content">
                            <span class="df-spl-euiButton__text">I’m Still Getting Used To It</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .df-spl-pl-settings-title{
        font-size:18px;
        color:#5bb3a7;
        font-weight:bold;
        margin-top:20px;
    }
    .df-spl-pl-settings-hr{
        color:#5bb3a7;
        height:1px;
    }
    a.add-service.add-remove-service {
        color: #5bb3a7;
    }
    a.remove-service.add-remove-service {
        color: grey;
    }
    p.submit input.button {
        padding-right: 30px;
        padding-left: 30px;
    }
    .df-spl-euiOverlayMask {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      display: -webkit-flex;
      display: flex;
      -webkit-align-items: center;
      align-items: center;
      -webkit-justify-content: center;
      justify-content: center;
      padding-bottom: 10vh;
      background: rgba(255,255,255,0.8);
  }
  .df-spl-euiModal--confirmation {
      min-width: 400px;
  }
  .df-spl-euiModal--maxWidth-default {
      max-width: 768px;
  }
  .df-spl-euiModal {
      border: 1px solid #D3DAE6;
      box-shadow: 0 40px 64px 0 rgba(65,78,101,0.1), 0 24px 32px 0 rgba(65,78,101,0.1), 0 16px 16px 0 rgba(65,78,101,0.1), 0 8px 8px 0 rgba(65,78,101,0.1), 0 4px 4px 0 rgba(65,78,101,0.1), 0 2px 2px 0 rgba(65,78,101,0.1);
      border-color: #c6cad1;
      border-top-color: #e3e4e8;
      border-bottom-color: #aaafba;
      display: -webkit-flex;
      display: flex;
      position: relative;
      background-color: #fff;
      border-radius: 4px;
      z-index: 8000;
      min-width: 400px;
      -webkit-animation: euiModal 350ms cubic-bezier(0.34, 1.61, 0.7, 1);
      animation: euiModal 350ms cubic-bezier(0.34, 1.61, 0.7, 1);
  }
  .df-spl-euiModal__closeIcon {
      background-color: rgba(255,255,255,0.9);
      position: absolute;
      right: 4px;
      top: 4px;
      z-index: 3;
  }
  .df-spl-euiModal__closeIcon {
      background-color: rgba(255,255,255,0.9);
      position: absolute;
      right: 4px;
      top: 4px;
      z-index: 3;
  }
  .df-spl-euiButtonIcon--text {
      color: #343741;
  }
  .df-spl-euiButtonIcon {
      display: inline-block;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      cursor: pointer;
      height: 40px;
      line-height: 40px;
      text-align: center;
      white-space: nowrap;
      max-width: 100%;
      vertical-align: middle;
      font-family: "Inter UI",-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
      font-weight: 400;
      letter-spacing: -.005em;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
      -webkit-font-kerning: normal;
      font-kerning: normal;
      font-size: 16px;
      font-size: 1rem;
      line-height: 1.5;
      text-decoration: none;
      border: solid 1px transparent;
      transition: all 250ms ease-in-out;
      border: none;
      background-color: transparent;
      box-shadow: none;
      height: auto;
      min-height: 24px;
      min-width: 24px;
      line-height: 0;
      padding: 4px;
      border-radius: 4px;
  }
  .df-spl-euiModal .df-spl-euiModal__flex {
      -webkit-flex: 1 1 auto;
      flex: 1 1 auto;
      display: -webkit-flex;
      display: flex;
      -webkit-flex-direction: column;
      flex-direction: column;
      max-height: 75vh;
      overflow: hidden;
  }
  .df-spl-euiModalHeader {
      display: -webkit-flex;
      display: flex;
      -webkit-justify-content: space-between;
      justify-content: space-between;
      -webkit-align-items: center;
      align-items: center;
      padding: 24px 40px 16px 24px;
      -webkit-flex-grow: 0;
      flex-grow: 0;
      -webkit-flex-shrink: 0;
      flex-shrink: 0;
  }
  .df-spl-euiModalHeader__title {
      color: #1a1c21;
      font-size: 28px;
      font-size: 1.75rem;
      line-height: 2.5rem;
      font-weight: 300;
      letter-spacing: -.04em;
  }
  .df-spl-euiModalBody {
      -webkit-flex-grow: 1;
      flex-grow: 1;
      overflow: hidden;
      display: -webkit-flex;
      display: flex;
      -webkit-flex-direction: column;
      flex-direction: column;
  }
  .df-spl-euiModalBody .df-spl-euiModalBody__overflow {
      scrollbar-width: thin;
      height: 100%;
      overflow-y: auto;
      -webkit-mask-image: linear-gradient(to bottom, rgba(255,0,0,0.1) 0%,red 7.5px,red calc(100% - 7.5px),rgba(255,0,0,0.1) 100%);
      mask-image: linear-gradient(to bottom, rgba(255,0,0,0.1) 0%,red 7.5px,red calc(100% - 7.5px),rgba(255,0,0,0.1) 100%);
      padding: 8px 24px;
  }
  .df-spl-euiText {
      color: #343741;
      font-weight: 400;
      font-size: 16px;
      font-size: 1rem;
      line-height: 1.5;
      color: inherit;
      line-height: 1.5rem;
  }
  .df-spl-euiText p {
      margin-bottom: 1.5rem;
      font-size: inherit;
  }
  .df-spl-euiModalFooter {
      display: -webkit-flex;
      display: flex;
      -webkit-justify-content: flex-end;
      justify-content: flex-end;
      padding: 16px 24px 24px;
      -webkit-flex-grow: 0;
      flex-grow: 0;
      -webkit-flex-shrink: 0;
      flex-shrink: 0;
  }
  .df-spl-euiButtonEmpty--primary {
      color: #006BB4;
  }
  .df-spl-euiButtonEmpty {
      display: inline-block;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      cursor: pointer;
      height: 40px;
      line-height: 40px;
      text-align: center;
      white-space: nowrap;
      max-width: 100%;
      vertical-align: middle;
      font-family: "Inter UI",-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
      font-weight: 400;
      letter-spacing: -.005em;
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
      -webkit-font-kerning: normal;
      font-kerning: normal;
      font-size: 16px;
      font-size: 1rem;
      line-height: 1.5;
      text-decoration: none;
      border: solid 1px transparent;
      transition: all 250ms ease-in-out;
      border-color: transparent;
      background-color: transparent;
      box-shadow: none;
      -webkit-transform: none !important;
      transform: none !important;
      -webkit-animation: none !important;
      animation: none !important;
      transition-timing-function: ease-in;
      transition-duration: 150ms;
  }
  .df-spl-euiButtonEmpty .df-spl-euiButtonEmpty__content {
      padding: 0 8px;
  }
  .df-spl-euiButtonContent {
      height: 100%;
      width: 100%;
      vertical-align: middle;
      display: -webkit-flex;
      display: flex;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-align-items: center;
      align-items: center;
  }
  .df-spl-euiButton .df-spl-euiButton__content {
    padding: 0 12px;
}
.df-spl-euiButtonEmpty .df-spl-euiButtonEmpty__text {
  text-overflow: ellipsis;
  overflow: hidden;
}
.df-spl-euiButton {
  display: inline-block;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  cursor: pointer;
  height: 40px;
  line-height: 40px;
  text-align: center;
  white-space: nowrap;
  max-width: 100%;
  vertical-align: middle;
  font-family: "Inter UI",-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-weight: 400;
  letter-spacing: -.005em;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-font-kerning: normal;
  font-kerning: normal;
  font-size: 16px;
  font-size: 1rem;
  line-height: 1.5;
  text-decoration: none;
  border: solid 1px transparent;
  transition: all 250ms ease-in-out;
  box-shadow: 0 2px 2px -1px rgba(152,162,179,0.3);
  border-radius: 4px;
  min-width: 112px;
}
.df-spl-euiButton--primary:enabled {
  box-shadow: 0 2px 2px -1px rgba(54,97,126,0.3);
}
.df-spl-euiButton--primary.df-spl-euiButton--fill {
  background-color: #006BB4;
  border-color: #006BB4;
  color: #fff;
}
.df-spl-euiButton--primary {
  color: #006BB4;
  border-color: #006BB4;
}
.df-spl-euiModalFooter>*+* {
  margin-left: 16px;
}
.df-spl-euiFormRow+.df-spl-euiFormRow, .df-spl-euiFormRow+.df-spl-euiButton {
  margin-top: 16px;
}
.df-spl-euiFormRow {
  display: -webkit-flex;
  display: flex;
  -webkit-flex-direction: column;
  flex-direction: column;
  max-width: 400px;
}
.df-spl-euiFormControlLayout {
  max-width: 400px;
  width: 100%;
  height: 40px;
}
.df-spl-euiFormControlLayout__childrenWrapper {
  position: relative;
}
.df-spl-euiFieldText {
  max-width: 400px;
  width: 100%;
  height: 40px;
  background-color: #fbfcfd;
  background-repeat: no-repeat;
  background-size: 0% 100%;
  box-shadow: 0 1px 1px -1px rgba(152,162,179,0.2), 0 3px 2px -2px rgba(152,162,179,0.2), inset 0 0 0 1px rgba(15,39,118,0.1);
  transition: box-shadow 150ms ease-in,background-image 150ms ease-in,background-size 150ms ease-in,background-color 150ms ease-in;
  font-family: "Inter UI",-apple-system,BlinkMacSystemFont,"Segoe UI",Helvetica,Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
  font-weight: 400;
  letter-spacing: -.005em;
  -webkit-text-size-adjust: 100%;
  -ms-text-size-adjust: 100%;
  -webkit-font-kerning: normal;
  font-kerning: normal;
  font-size: 14px;
  color: #343741;
  border: none;
  border-radius: 0;
  padding: 12px;
}
</style>
<footer id="admin_footer">
    <?php
    include_once dirname(__FILE__) . '/logo-footer.php';
    ?>
</footer>
<script>
    jQuery(document).ready(function(){
        <?php if ((get_option('spl_save_count') == $this->feedback_invokation('form')) && $this->feedback_invokation('form') != 0) echo "jQuery('#userSurvey').modal('show').show();" ?>
        window.splSettings = JSON.parse(jQuery('#spl_settings').html());
        styleDropdown = jQuery('.sel1');
        styleDropdown.data('prev', styleDropdown.val());
        applyDemoFonts = true;
        if(jQuery('.sel1').val() === "style_5"){
            jQuery('#style5_category_container').css('display', 'block')
        }
        jQuery('#select_lang').change(function(){
            var lang= jQuery(this).val();
            var url= "<?php echo esc_url_raw($_SERVER['REQUEST_URI']).'&lang='?>"+lang;
            window.location.href = url;
        });
        jQuery('.remove-category').click(function(){
            jQuery(this).closest('.category-row').remove();
        });
    });
</script>
<script>
    jQuery(document).ready(function(){
        var spl_styl = jQuery('select[name="tab_style"]') .val();
        if(spl_styl == 'style_6'){
           jQuery('.spl_style6_element').show();
       }else{
        jQuery('.spl_style6_element').hide();
    }
});
</script>
<script>
    var isStyleChangeAccepted = true;
    jQuery(".sel1").change(function (e) {
    // check for isNoModal variable sent from trigger events
    var isNoModal = e.noModal ? e.noModal : false
    if (jQuery(this).val() == "with_tab") {
        false == isNoModal && jQuery('#sell1').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'none')
    }
    if (jQuery(this).val() == "without_tab") {
        !(isNoModal) && jQuery('#sell2').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'none')
    }
    if (jQuery(this).val() == "without_tab_single_column") {
        !(isNoModal) && jQuery('#sell2').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'none')
    }
    if (jQuery(this).val() == "style_3") {
        !(isNoModal) && jQuery('#sell3').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'none')
    }
    if (jQuery(this).val() == "style_4") {
        !(isNoModal) && jQuery('#sell4').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'none')
    }
    if (jQuery(this).val() == "style_5") {
        !(isNoModal) && jQuery('#sell5').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'block')
    }
    if (jQuery(this).val() == "style_6") {
        !(isNoModal) && jQuery('#sell6').modal('show');
        jQuery('.spl_style6_element').show();
        jQuery('#style5_category_container').css('display', 'none')
    }
    if (jQuery(this).val() == "style_7") {
        !(isNoModal) && jQuery('#sell7').modal('show');
        jQuery('.spl_style6_element').hide();
        jQuery('#style5_category_container').css('display', 'none')
    }
});
    function handleFeedbackButtons(btn, event) {
      event.preventDefault();
      console.log();
      jQuery.post(ajaxurl, {
        'action': 'feedback_manage',
        'btn-type': jQuery(btn).data('btnType')
    }, function(response) {
        jQuery('#userSurvey').modal('hide');
        var link = jQuery(btn).attr('href');
        if (link) {
            window.open(link, '_blank');
        }
    });
  }
// Register modals and the buttons inside it functions
var modalTags = ['#sell1', '#sell2', '#sell3', '#sell4', '#sell5', '#sell6', '#sell7'];
;(function(elements) {
    elements.forEach(e => {
        jQuery(e).on('show.bs.modal', function (e) {
            var previousStyleValue = styleDropdown.data('prev');
            jQuery(this).find('.cancel-btn').on('click', ee => {
                isStyleChangeAccepted = false;
                jQuery(this).modal('hide');
                jQuery(ee.target).unbind();
                // set previous selected style and stop popup from invoking
                styleDropdown.val(previousStyleValue)
                .trigger({
                    type: 'change',
                    noModal: true
                });
            });
            jQuery(this).find('[data-btnType="keep-current"]').on('click', ee => {
                jQuery(this).modal('hide');
                jQuery(ee.target).unbind();
            });
            jQuery(this).find('[data-btnType="use-demo"]').on('click', ee => {
                jQuery(this).modal('hide');
                // sending events so the events function will execute
                styleDropdown.trigger('load-demo-settings');
                jQuery(ee.target).unbind();
            });
        });
        jQuery(e).on('hide.bs.modal', function (e) {
            isStyleChangeAccepted && styleDropdown.data('prev', styleDropdown.val());
            // reset style change value
            isStyleChangeAccepted = true;
        });
    })
})(modalTags);
</script>
<!-- JS for Video Tutorials BTN --->
<script>
// Get the modal
var modalvideo = document.getElementById('myModalVideos');
// Get the button that opens the modal
var btnvideo = document.getElementById("myBtnVideos");
// Get the <span> element that closes the modal
var spanvideo = document.getElementsByClassName("closevideo")[0];
// When the user clicks the button, open the modal
// btnvideo?.onclick = function() {
//     modalvideo.style.display = "block";
// }
// When the user clicks on <span> (x), close the modal
spanvideo.onclick = function() {
    modalvideo.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalvideo) {
        modalvideo.style.display = "none";
    }
}
</script>
<script>
// Get the modal
var modalsupport = document.getElementById('myModalSupport');
// Get the button that opens the modal
var btnsupport = document.getElementById("myBtnSupport");
// Get the <span> element that closes the modal
var spansupport = document.getElementsByClassName("closesupport")[0];
// When the user clicks the button, open the modal
btnsupport.onclick = function(event) {
    event.preventDefault();
    modalsupport.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
spansupport.onclick = function() {
    modalsupport.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalsupport) {
        modalsupport.style.display = "none";
    }
}
</script>
<script>
 window.onload = function() {
//   jQuery('.service-price-length-rows-wrapper').sortable();
// jQuery(".service-price-length-rows-wrapper").droppable({
//     accept: '.service-price-length-rows-wrapper',
//     greedy: false,
//     containment: jQuery('#sortable'),
//     helper: 'clone',
//     hoverClass: "highlight",
//     revert: "valid",
//     drop: function (e, ui) {
//         jQuery(this).addClass("dropped-elemet-service");
//         jQuery(ui.draggable).addClass('dragged-elemet-service');
//         var dragged_ser_name = jQuery('.dropped-elemet-service').find('.service_name').attr('id');
//         var dragged_ser_pric = jQuery('.dropped-elemet-service').find('.service_price').attr('id');
//         var dragged_ser_des = jQuery('.dropped-elemet-service').find('.service_desc').attr('id');
//         var dragged_ser_btnn = jQuery('.dropped-elemet-service').find('.service_button').attr('id');
//         var dragged_ser_btn_enable = jQuery('.dropped-elemet-service').find('.spl_service_button_enable').attr('id');
//         var dragged_ser_btn_urls = jQuery('.dropped-elemet-service').find('.service_button_url').attr('id');
//         var dragged_ser_num = dragged_ser_name.split("_");
//         var dragged_cat_number = dragged_ser_num[1];
//         var dragged_ser_number = dragged_ser_num[2];
//         var dropped_ser_name = jQuery('.dragged-elemet-service').find('.service_name').attr('id');
//         var dropped_ser_pric = jQuery('.dragged-elemet-service').find('.service_price').attr('id');
//         var dropped_ser_des = jQuery('.dragged-elemet-service').find('.service_desc').attr('id');
//         var dropped_ser_btnn = jQuery('.dragged-elemet-service').find('.service_button').attr('id');
//         var dropped_ser_btn_enable = jQuery('.dragged-elemet-service').find('.spl_service_button_enable').attr('id');
//         var dropped_ser_btn_urls = jQuery('.dragged-elemet-service').find('.service_button_url').attr('id');
//         var dropped_ser_num = dropped_ser_name.split("_");
//         var dropped_cat_number = dropped_ser_num[1];
//         var dropped_ser_number = dropped_ser_num[2];
//         //assign dropped and dragged cat ids
//         // service name
//         jQuery('.dragged-elemet-service').find('.service_name').attr('id',dragged_ser_name);
//         jQuery('.dragged-elemet-service').find('.service_name').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_name]');
//         jQuery('.dropped-elemet-service').find('.service_name').attr('id',dropped_ser_name);
//         jQuery('.dropped-elemet-service').find('.service_name').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_name]');
//         // service description
//         jQuery('.dragged-elemet-service').find('.service_desc').attr('id',dragged_ser_des);
//         jQuery('.dragged-elemet-service').find('.service_desc').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_desc]');
//         jQuery('.dropped-elemet-service').find('.service_desc').attr('id',dropped_ser_des);
//         jQuery('.dropped-elemet-service').find('.service_desc').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_desc]');
//         // service price
//         jQuery('.dragged-elemet-service').find('.service_price').attr('id',dragged_ser_pric);
//         jQuery('.dragged-elemet-service').find('.service_price').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_price]');
//         jQuery('.dropped-elemet-service').find('.service_price').attr('id',dropped_ser_pric);
//         jQuery('.dropped-elemet-service').find('.service_price').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_price]');
//         // service button enable
//         jQuery('.dragged-elemet-service').find('.spl_service_button_enable').attr('id',dragged_ser_btn_enable);
//         jQuery('.dragged-elemet-service').find('.spl_service_button_enable').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_button_enable]');
//         jQuery('.dropped-elemet-service').find('.spl_service_button_enable').attr('id',dropped_ser_btn_enable);
//         jQuery('.dropped-elemet-service').find('.spl_service_button_enable').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_button_enable]');
//         // service button
//         jQuery('.dragged-elemet-service').find('.service_button').attr('id','category_'+dragged_cat_number+'_'+dragged_ser_number+'_service_button');
//         jQuery('.dragged-elemet-service').find('.service_button').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_button]');
//         jQuery('.dropped-elemet-service').find('.service_button').attr('id','category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_button');
//         jQuery('.dropped-elemet-service').find('.service_button').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_button]');
//         // service button url
//         jQuery('.dragged-elemet-service').find('.service_button_url').attr('id',dragged_ser_btn_urls);
//         jQuery('.dragged-elemet-service').find('.service_button_url').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_button_url]');
//         jQuery('.dropped-elemet-service').find('.service_button_url').attr('id',dropped_ser_btn_urls);
//         jQuery('.dropped-elemet-service').find('.service_button_url').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_button_url]');
//         // service image
//         jQuery('.dragged-elemet-service').find('.service_image').attr('id','category_'+dragged_cat_number+'_'+dragged_ser_number+'_service_image');
//         jQuery('.dragged-elemet-service').find('.service_image').attr('name','category['+dragged_cat_number+']['+dragged_ser_number+'][service_image]');
//         jQuery('.dropped-elemet-service').find('.service_image').attr('id','category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_image');
//         jQuery('.dropped-elemet-service').find('.service_image').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_image]');
//             jQuery(this).removeClass("dropped-elemet-service");
//             jQuery(ui.draggable).removeClass('dragged-elemet-service');
//         var $this = jQuery(this);
//         jQuery(".service-price-length-rows-wrapper").removeClass("highlight");
//         jQuery(ui.draggable).animate({
//         "left": jQuery(ui.draggable).data("left"),
//         "top": jQuery(ui.draggable).data("top"),
//         }, "fast");
//     }
// });
//   jQuery(".categor-sec-first").droppable({
//     accept: '.categor-sec-first',
//     greedy: true,
//     hoverClass: "highlight",
//     revert: "valid",
//     drop: function (e, ui) {
//         jQuery(this).addClass("dropped-elemet");
//         jQuery(ui.draggable).addClass('dragged-elemet');
//         var dragged_cat_name = jQuery('.dropped-elemet').find('.category_name').attr('id');
//         var dragged_cat_des = jQuery('.dropped-elemet').find('.category_description').attr('id');
//         var dragged_cat_num = dragged_cat_name.split("_");
//         var dragged_cat_number = dragged_cat_num[1];
//         var dropped_cat_name = jQuery('.dragged-elemet').find('.category_name').attr('id');
//         var dropped_cat_des = jQuery('.dragged-elemet').find('.category_description').attr('id');
//         var dropped_cat_num = dropped_cat_name.split("_");
//         var dropped_cat_number = dropped_cat_num[1];
//         //assign dropped and dragged cat ids
//         //category name
//         jQuery('.dragged-elemet').find('.category_name').attr('id',dragged_cat_name);
//         jQuery('.dragged-elemet').find('.category_name').attr('name','category['+dragged_cat_number+'][name]');
//         jQuery('.dropped-elemet').find('.category_name').attr('id',dropped_cat_name);
//         jQuery('.dropped-elemet').find('.category_name').attr('name','category['+dropped_cat_number+'][name]');
//         //category description
//         jQuery('.dragged-elemet').find('.category_description').attr('id',dragged_cat_des);
//         jQuery('.dragged-elemet').find('.category_description').attr('name','category['+dragged_cat_number+'][description]');
//         jQuery('.dropped-elemet').find('.category_description').attr('id',dropped_cat_des);
//         jQuery('.dropped-elemet').find('.category_description').attr('name','category['+dropped_cat_number+'][description]');
//         // remove the classes
//         jQuery(this).removeClass("dropped-elemet");
//         jQuery(ui.draggable).removeClass('dragged-elemet');
//         var $this = jQuery(this);
//         jQuery(".service-price-length-rows-wrapper").removeClass("highlight");
//         jQuery(ui.draggable).animate({
//         "left": jQuery(ui.draggable).data("left"),
//         "top": jQuery(ui.draggable).data("top"),
//         }, "fast");
//     }
//   });
 // });
//  jQuery( "#category-rows-wrapper" ).sortable({
//     items: '#sortable,.categor-sec-first,.service-price-length-rows-wrapper',
//     helper: 'clone',
//     cursor: 'move',
//     connectWith: "#sortable",
//     // cancel: '.categor-sec-first',
//  placeholder : "ui-state-highlight",
//  update  : function(event, ui)
//  {
//      jQuery('#category-rows-wrapper #sortable').each(function(){
//      });
//  }
//  });
// Start 12th November 2019
jQuery( ".category-rows-master-cls" ).sortable({
    items: '.service-price-length-rows-wrapper',
    handle: '.spl_ser_sec_ico',
    cursor: 'move',
    //helper: 'clone',
    dropOnEmpty: true,
    placeholder : "ui-state-highlight",
    start: function(event, ui){
      jQuery('#sortable.category-row').removeClass('highlight');
      jQuery('.service-price-length-rows-wrapper').removeClass('highlight_ser');
      ui.item.addClass('highlight_ser');
  },
    // remove: function(event, ui) {
    //         ui.item.clone().remove();
    //   },
    stop  : function(event, ui)
    {
     var last_ser_col_id = jQuery('.highlight_ser').parent().children().last().find('.service_name').attr('id');
     var sortable_cat_num = jQuery('.highlight_ser').find('.service_name').attr('id');
     var sortable_cat_num = sortable_cat_num.split("_");
     var sortable_cat_number = sortable_cat_num[1];
     var dropped_cat_num = last_ser_col_id.split("_");
     var dropped_cat_number = dropped_cat_num[1];
     var dropped_ser_number = jQuery('.highlight_ser').parent().children('.service-price-length-rows-wrapper').length;
     var service_name_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_name';
     var service_price_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_price';
     var service_desc_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_desc';
     var ser_btn_enable_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_ser_btn_enable';
     var service_button_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_button';
     var service_button_url_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_button_url';
     var service_image_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_image';
     var service_regular_price_id = 'category_'+dropped_cat_number+'_'+dropped_ser_number+'_service_regular_price';
     if(sortable_cat_number != dropped_cat_number){
        jQuery('.highlight_ser').children().find('.service_name').attr('id',service_name_id);
        jQuery('.highlight_ser').children().find('.service_name').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_name]');
        jQuery('.highlight_ser').children().find('.service_price').attr('id',service_price_id);
        jQuery('.highlight_ser').children().find('.service_price').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_price]');
        jQuery('.highlight_ser').children().find('.service_regular_price').attr('id',service_regular_price_id);
        jQuery('.highlight_ser').children().find('.service_regular_price').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_regular_price]');
        jQuery('.highlight_ser').children().find('.service_desc').attr('id',service_desc_id);
        jQuery('.highlight_ser').children().find('.service_desc').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_desc]');
        jQuery('.highlight_ser').children().find('.spl_service_button_enable').attr('id',ser_btn_enable_id);
        jQuery('.highlight_ser').children().find('.spl_service_button_enable').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_button_enable]');
        jQuery('.highlight_ser').children().find('.service_button').attr('id',service_button_id);
        jQuery('.highlight_ser').children().find('.service_button').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_button]');
        jQuery('.highlight_ser').children().find('.service_button_url').attr('id',service_button_url_id);
        jQuery('.highlight_ser').children().find('.service_button_url').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_button_url]');
        jQuery('.highlight_ser').children().find('.service_image').attr('id',service_image_id);
        jQuery('.highlight_ser').children().find('.service_image').attr('name','category['+dropped_cat_number+']['+dropped_ser_number+'][service_image]');
        update_all_service_rows_html_in_wrapper(jQuery('.highlight_ser').parent());
    }
    update_all_service_rows_html_in_wrapper(jQuery('.highlight_ser').parent());
    setTimeout(function(){
     jQuery('.service-price-length-rows-wrapper').removeClass('highlight_ser');
 },3000);
}
});
// End 12th November 2019
// jQuery( ".category-row" ).sortable({
//     items: '.service-price-length-rows-wrapper',
//     handle: '.spl_ser_sec_ico',
//     cursor: 'move',
//     cancel: '.categor-sec-first',
//     placeholder : "ui-state-highlight",
//     //connectWith: "#sortable",
//     start: function(event, ui){
//           jQuery('.service-price-length-rows-wrapper').removeClass('highlight_ser');
//           ui.item.addClass('highlight_ser');
//     },
//  update  : function(event, ui)
//  {
//       setTimeout(function(){
//           jQuery('.service-price-length-rows-wrapper').removeClass('highlight_ser');
//       },3000);
//  }
// });
jQuery( "#category-rows-wrapper" ).sortable({
    items: '#sortable',
    handle: '.categor-sec-first',
    helper: 'clone',
    cursor: 'move',
    connectWith: "#sortable",
    placeholder : "ui-state-highlight",
    start: function(event, ui){
      jQuery('.service-price-length-rows-wrapper').removeClass('highlight_ser');
      jQuery('#sortable.category-row').removeClass('highlight');
      ui.item.addClass('highlight');
  },
  update  : function(event, ui)
  {
     setTimeout(function(){
         jQuery('#sortable.category-row').removeClass('highlight');
     },3000);
 }
});
}
</script>
<script>
    jQuery(".service-price-length-rows-wrapper").mouseenter(function() {
        jQuery(this).css('box-shadow','0px 1px 6px rgba(17, 17, 17, 0.18)');
    }).mouseleave(function() {
        jQuery(this).css('box-shadow','none');
    });
</script>
<script>
    jQuery("document").ready(function(){
        jQuery(document).on('change', '.service_image', function() {
            debugger;
            var form_data = new FormData();
            var file_data = jQuery(this).prop('files')[0];
            var id = jQuery(this).attr('id');
            form_data.append('file', file_data);
            form_data.append('action', 'spl_upload_ser_img');
            var adminurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
            jQuery.ajax({
                url: adminurl,
                type: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    var spl_ser_id = document.getElementById(id);
                    jQuery(spl_ser_id).parent().find('img').attr('src',data);
                    jQuery( spl_ser_id ).parent().find( 'input:hidden' ).val(data);
                }
            });
        });
    });
</script>
<script type="application/json" id="spl_settings">
    <?php echo json_encode(array(
        "maxCats" => $max_cat_count,
        "maxService" => $max_service_count
    )); ?>
</script>
<!--- TIDIO CUTSOM BUTTON CHAT HELP -->
<!---<script>
function chatShow(e) {
tidioChatApi.method('popUpOpen');
}
</script> -->
<!--- TIDIO CHAT HELP -->
<!--- TIDIO CHAT HELP -->
<!----<script src="//code.tidio.co/rjrinwxitmkczxakuxdvtzalnbxi1f1x.js"></script>-->
<!--- END TIDIO CHAT HELP -->