var $=jQuery.noConflict();
function add_service(service_link) {
    service_link = $(service_link);
    var category_row = get_category_row_from_add_remove_service_link(service_link);
    var service_rows = category_row.find('.service-price-length-rows-wrapper');
    var service_rows_count = service_rows.length;
    var evaluation = splEvaluate(service_rows_count, 'service');
    if (evaluation) {
        service_link.html('need license to add more services')
    } else {
        var service_rows_clone = $('#category-row-template .service-price-length-rows-wrapper').clone();
        var service_rows_wrapper = get_service_rows_from_add_remove_service_link(service_link);
        service_rows_wrapper.after(service_rows_clone);
        update_all_service_rows_html_in_wrapper(category_row)
    }
}



function remove_service(service_link){service_link=$(service_link);var category_row=get_category_row_from_add_remove_service_link(service_link);var service_row=get_service_rows_from_add_remove_service_link(service_link);service_row.remove();update_all_service_rows_html_in_wrapper(category_row);var service_rows=category_row.find('.service-price-length-rows-wrapper');if(0==service_rows.length){category_row.remove()}}



function update_all_service_rows_html_in_wrapper(category_row){var service_rows=category_row.find('.service-price-length-rows-wrapper');if(0<service_rows.length){cat_id=get_category_id(category_row);for(var i=0;i<service_rows.length;i++){service_id=i+1;update_service_rows_html($(service_rows[i]),cat_id,service_id)}}}



function add_category(add_cat_row_ele) {
    var cat_clone = $('#category-row-template .category-row').clone();
    var cat_id = parseInt(get_category_id($('#category-rows-wrapper'))) + 1;
    var cat_count = parseInt(get_category_count($('#category-rows-wrapper')));
    var service_id = 1;
    var evaluation = splEvaluate(cat_count, 'category');
    if (evaluation) {
        show_license_tips_for_category(add_cat_row_ele)
    } else {
        update_category_row_html(cat_clone, cat_id, service_id);
        cat_clone.appendTo('#category-rows-wrapper');
        cat_count = parseInt(get_category_count($('#category-rows-wrapper')));
        if (cat_count >= splSettings.maxCats) {
            show_license_tips_for_category(add_cat_row_ele)
        }
    }
}

function splEvaluate(count, type) {
    if (type == "category") return count >= splSettings.maxCats;
    if (type == "service") return count >= splSettings.maxService;
}



function show_license_tips_for_category(add_cat_row_ele){$(add_cat_row_ele).html('need license to add more categories');$(add_cat_row_ele).parent().removeClass('col-xs-3 col-sm-3 col-md-3 col-lg-3');$(add_cat_row_ele).parent().addClass('col-xs-5 col-sm-5 col-md-5 col-lg-5')}





jQuery(document).on("click",".spl_service_button_enable",function(){if(this.checked){var e=jQuery(this).data("id");jQuery("."+e+"_service_button_url").css("display","block"),jQuery("."+e+"_service_button_url").parent().parent().css("display","block")}else{e=jQuery(this).data("id");jQuery("."+e+"_service_button").val(""),jQuery("."+e+"_service_button_url").css("display","none"),jQuery("."+e+"_service_button_url").parent().parent().css("display","none")}});

jQuery("input[type='checkbox']").each(function(){if(jQuery(this).attr("checked")){var e=jQuery(this).data("id");jQuery("."+e+"_service_button_url").css("display","block"),jQuery("."+e+"_service_button_url").parent().parent().css("display","block")}else{e=jQuery(this).data("id");jQuery("."+e+"_service_button").val(""),jQuery("."+e+"_service_button_url").css("display","none"),jQuery("."+e+"_service_button_url").parent().parent().css("display","none")}});