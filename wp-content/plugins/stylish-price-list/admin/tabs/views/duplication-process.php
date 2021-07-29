<?php
$rand_num = rand( (int) 1000000000 , (int) 9999999999);
if (isset($_GET['id']) && $_GET['id']) {
    $cats_data=spl_get_option($id);
    $data = $cats_data;
    $data['list_name'] = $data['list_name'].' (copy)';
    $data['field_id'] = $rand_num;
    $data['id'] = $rand_num;
    $updateStatus = update_option( 'spl_cats_'.$rand_num, $data );
}
if ($updateStatus) {
    $url = admin_url().'admin.php?page=spl-tabs&action=edit&id='.$rand_num;
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    echo "<meta http-equiv = \"refresh\" content = \"2; url = $url\" />";
    // header("Location: " . $url);
    ?>
    <div class="wrap">
        <h2 style="text-align: center;">Creating a duplicate. Please wait...</h2>
    </div>
    <?php
} else {
    ?>
    <div class="wrap">
        <h2 style="text-align: center;">
            There has been an error. Please try again.
        </h2>
    </div>
    <?php
}
?>