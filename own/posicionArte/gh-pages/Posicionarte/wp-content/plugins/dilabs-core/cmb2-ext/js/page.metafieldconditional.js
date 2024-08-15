(function($){
    "use strict";
    
    let $dilabs_page_breadcrumb_area      = $("#_dilabs_page_breadcrumb_area");
    let $dilabs_page_settings             = $("#_dilabs_page_breadcrumb_settings");
    let $dilabs_page_breadcrumb_image     = $("#_dilabs_breadcumb_image");
    let $dilabs_page_title                = $("#_dilabs_page_title");
    let $dilabs_page_title_settings       = $("#_dilabs_page_title_settings");

    if( $dilabs_page_breadcrumb_area.val() == '1' ) {
        $(".cmb2-id--dilabs-page-breadcrumb-settings").show();
        if( $dilabs_page_settings.val() == 'global' ) {
            $(".cmb2-id--dilabs-breadcumb-image").hide();
            $(".cmb2-id--dilabs-page-title").hide();
            $(".cmb2-id--dilabs-page-title-settings").hide();
            $(".cmb2-id--dilabs-custom-page-title").hide();
            $(".cmb2-id--dilabs-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--dilabs-breadcumb-image").show();
            $(".cmb2-id--dilabs-page-title").show();
            $(".cmb2-id--dilabs-page-breadcrumb-trigger").show();
    
            if( $dilabs_page_title.val() == '1' ) {
                $(".cmb2-id--dilabs-page-title-settings").show();
                if( $dilabs_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--dilabs-custom-page-title").hide();
                } else {
                    $(".cmb2-id--dilabs-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--dilabs-page-title-settings").hide();
                $(".cmb2-id--dilabs-custom-page-title").hide();
    
            }
        }
    } else {
        $dilabs_page_breadcrumb_area.parents('.cmb2-id--dilabs-page-breadcrumb-area').siblings().hide();
    }


    // breadcrumb area
    $dilabs_page_breadcrumb_area.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--dilabs-page-breadcrumb-settings").show();
            if( $dilabs_page_settings.val() == 'global' ) {
                $(".cmb2-id--dilabs-breadcumb-image").hide();
                $(".cmb2-id--dilabs-page-title").hide();
                $(".cmb2-id--dilabs-page-title-settings").hide();
                $(".cmb2-id--dilabs-custom-page-title").hide();
                $(".cmb2-id--dilabs-page-breadcrumb-trigger").hide();
            } else {
                $(".cmb2-id--dilabs-breadcumb-image").show();
                $(".cmb2-id--dilabs-page-title").show();
                $(".cmb2-id--dilabs-page-breadcrumb-trigger").show();
        
                if( $dilabs_page_title.val() == '1' ) {
                    $(".cmb2-id--dilabs-page-title-settings").show();
                    if( $dilabs_page_title_settings.val() == 'default' ) {
                        $(".cmb2-id--dilabs-custom-page-title").hide();
                    } else {
                        $(".cmb2-id--dilabs-custom-page-title").show();
                    }
                } else {
                    $(".cmb2-id--dilabs-page-title-settings").hide();
                    $(".cmb2-id--dilabs-custom-page-title").hide();
        
                }
            }
        } else {
            $(this).parents('.cmb2-id--dilabs-page-breadcrumb-area').siblings().hide();
        }
    });

    // page title
    $dilabs_page_title.on("change",function(){
        if( $(this).val() == '1' ) {
            $(".cmb2-id--dilabs-page-title-settings").show();
            if( $dilabs_page_title_settings.val() == 'default' ) {
                $(".cmb2-id--dilabs-custom-page-title").hide();
            } else {
                $(".cmb2-id--dilabs-custom-page-title").show();
            }
        } else {
            $(".cmb2-id--dilabs-page-title-settings").hide();
            $(".cmb2-id--dilabs-custom-page-title").hide();

        }
    });

    //page settings
    $dilabs_page_settings.on("change",function(){
        if( $(this).val() == 'global' ) {
            $(".cmb2-id--dilabs-breadcumb-image").hide();
            $(".cmb2-id--dilabs-page-title").hide();
            $(".cmb2-id--dilabs-page-title-settings").hide();
            $(".cmb2-id--dilabs-custom-page-title").hide();
            $(".cmb2-id--dilabs-page-breadcrumb-trigger").hide();
        } else {
            $(".cmb2-id--dilabs-breadcumb-image").show();
            $(".cmb2-id--dilabs-page-title").show();
            $(".cmb2-id--dilabs-page-breadcrumb-trigger").show();
    
            if( $dilabs_page_title.val() == '1' ) {
                $(".cmb2-id--dilabs-page-title-settings").show();
                if( $dilabs_page_title_settings.val() == 'default' ) {
                    $(".cmb2-id--dilabs-custom-page-title").hide();
                } else {
                    $(".cmb2-id--dilabs-custom-page-title").show();
                }
            } else {
                $(".cmb2-id--dilabs-page-title-settings").hide();
                $(".cmb2-id--dilabs-custom-page-title").hide();
    
            }
        }
    });

    // page title settings
    $dilabs_page_title_settings.on("change",function(){
        if( $(this).val() == 'default' ) {
            $(".cmb2-id--dilabs-custom-page-title").hide();
        } else {
            $(".cmb2-id--dilabs-custom-page-title").show();
        }
    });
    
})(jQuery);