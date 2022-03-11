<?php
/*
Plugin Name:  Aloha Checkout Field Extension
Plugin URI: https://aloha-tech.com/
Description: 增加會員欄位，增加訂單查詢介面
Author: Mike Hsu
Version: 1.0.1
Author URI: https://aloha-tech.com/
*/

wp_enqueue_script( 'js-timepicker.js', plugins_url('assets/js/timepicker.js', __FILE__ ),array('jquery'),rand(0,99999) );

require "member/member_page.php";
require "member/checkout_ordernote.php";
require "member/user_data.php";

