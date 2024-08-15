<?php
/**
 * @Packge     : Dilabs
 * @Version    : 1.0
 * @Author     : Dilabs
 * @Author URI : https://themeforest.net/user/validthemes/portfolio
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function dilabs_core_essential_scripts( ) {
    wp_enqueue_script('dilabs-ajax',DILABS_PLUGDIRURI.'assets/js/dilabs.ajax.js',array( 'jquery' ),'1.0',true);
    wp_localize_script(
    'dilabs-ajax',
    'dilabsajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'nonce'	     => wp_create_nonce( 'dilabs-nonce' ),
        )
    );
}

add_action('wp_enqueue_scripts','dilabs_core_essential_scripts');


// dilabs Section subscribe ajax callback function
add_action( 'wp_ajax_dilabs_subscribe_ajax', 'dilabs_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_dilabs_subscribe_ajax', 'dilabs_subscribe_ajax' );

function dilabs_subscribe_ajax( ){
  $apiKey = dilabs_opt('dilabs_subscribe_apikey');
  $listid = dilabs_opt('dilabs_subscribe_listid');
   if( ! wp_verify_nonce($_POST['security'], 'dilabs-nonce') ) {
    echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('You are not allowed.', 'dilabs').'</div>';
   }else{
       if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);
           if ($MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__('Thank you, you have been added to our mailing list.', 'dilabs').'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('This Email address is already exists.', 'dilabs').'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Sorry something went wrong.', 'dilabs').'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Apikey Or Listid Missing.', 'dilabs').'</div>';
        }
   }

   wp_die();

}