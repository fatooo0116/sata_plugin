<?php
/*
Plugin Name: Aloha Extension
Plugin URI: https://aloha-tech.com/
Description: 增加會員欄位，增加訂單查詢介面
Author: Mike Hsu
Version: 1.0.1
Author URI: https://aloha-tech.com/
*/



/*  Add field to checkout  */

/* Add field to member page */

/* Add  field to Wp User page */

require "option_order.php";

require "member/member_page.php";
require "member/user_data.php";

require "member/checkout_ordernote.php";