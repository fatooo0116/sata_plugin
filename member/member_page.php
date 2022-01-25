  

<?php

// Add the custom field "favorite_color"
add_action( 'woocommerce_edit_account_form', 'add_favorite_color_to_edit_account_form' );
function add_favorite_color_to_edit_account_form() {
    $user = wp_get_current_user();

    $sata_name = (isset($user->sata_name) && $user->sata_name) ? $user->sata_name : '';
    $cert_name_type = (isset($user->cert_name_type) && $user->cert_name_type) ? $user->cert_name_type : '';
    $mb_type = (isset($user->mb_type) && $user->mb_type) ? $user->mb_type : '';
    $mb_type = explode(",", $mb_type);
    $sata_sex = (isset($user->sata_sex) && $user->sata_sex) ? $user->sata_sex : '';
    $wechat_id = (isset($user->wechat_id) && $user->wechat_id) ? $user->wechat_id : '';
    $line_id = (isset($user->line_id) && $user->line_id) ? $user->line_id : '';
    $level = (isset($user->level) && $user->level) ? $user->level : '';
    $bcity = (isset($user->bcity) && $user->bcity) ? $user->bcity : '';
    $live_place = (isset($user->live_place) && $user->live_place) ? $user->live_place : '';
    $bdate = (isset($user->bdate) && $user->bdate) ? $user->bdate : '';
    $btime = (isset($user->btime) && $user->btime) ? $user->btime : '';
    $time_exactly = (isset($user->time_exactly) && $user->time_exactly) ? $user->time_exactly : '';
    $myjob = (isset($user->myjob) && $user->myjob) ? $user->myjob : '';
    $recommender = (isset($user->recommender) && $user->recommender) ? $user->recommender : '';
    $sata_img = (isset($user->sata_img) && $user->sata_img) ? $user->sata_img : '';
  

    ?>

    <style>
          #sata_member .input_field{
                    margin-bottom:30px;
            }
    </style>

    <fieldset id="sata_member" >
        <legend>SATA 會員資料</legend>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
      
        <div class="input_field">
            <label for="sata_name">
                英文名/中文拼音：
                <input type="text" id="sata_name"  name="sata_name"  value="<?php echo $sata_name; ?>" />
            </label>
        </div>

        <div class="input_field">
            <label for="" class="head">證書登記名字</label>
            <label for="tp1">
                <input type="radio" name="cert_name_type" id="tp1"  value="n1" <?php if($cert_name_type=='n1'){ echo 'checked';}  ?> > 中文名(繁體)
            </label>
            <label for="tp2">
                <input type="radio" name="cert_name_type" id="tp2" value="n2" <?php if($cert_name_type=='n2'){ echo 'checked';}  ?> > 中文名(簡體)
            </label>
            <label for="tp3">
                <input type="radio" name="cert_name_type" id="tp3" value="n3"  <?php if($cert_name_type=='n3'){ echo 'checked';}  ?> > 英文名
            </label>
            <label for="tp4">
                <input type="radio" name="cert_name_type" id="tp4" value="n4"  <?php if($cert_name_type=='n4'){ echo 'checked';}  ?> > 中文拼音
            </label>
        </div>    
        
        <div class="input_field">
            <label for="" class="head">你的占星程度</label>
            <p class="helper">(現占＆古占？占星小白＆占星老司機？學過幾年…等等)</p>
            <textarea name="level" id="level" cols="30" rows="10" ><?php  echo $level; ?></textarea>
        </div>   
        
        
        <div class="input_field">
            <label for="" class="head">性別</label>
            <label for="sex1">
                <input type="radio" name="sata_sex" id="sex1" value="male"  <?php if($sata_sex=='male'){ echo 'checked'; } ?> > 男
            </label>

            <label for="sex2">
                <input type="radio" name="sata_sex" id="sex2" value="female"  <?php if($sata_sex=='female'){ echo 'checked'; } ?> > 女
            </label>
        </div>    
        
        <div class="input_field">
            <label for="wechat_id">
                微信 ID：  <span class="helper">(無微信ID請輸入0)</span><br/>
                <input type="text" name="wechat_id" id="wechat_id"  class="newline"  value="<?php  echo $wechat_id; ?>" />
            </label>
        </div>      
        
        
        <div class="input_field">
            <label for="line_id">
                Line ID： <span class="helper">(無Line ID請輸入0)</span><br/>
                <input type="text" name="line_id" id="line_id" class="newline"  value="<?php  echo $line_id; ?>" />
            </label>
        </div>       
        
        <div class="input_field">
        <label for="bcity">
            出生地點（課程需要，如實填寫）： <span class="helper">(精確到市，例如廣東省廣州市)</span><br/>
            <input type="text" id="bcity"  name="bcity" class="newline" value="<?php  echo $bcity; ?>" />
        </label>
        </div>


        <div class="input_field">
        <label for="live_place">
            目前居住地（課程需要，如實填寫）： <span class="helper">(精確到市，例如台灣台北)</span><br/>
            <input type="text" id="live_place"  name="live_place" class="newline"  value="<?php  echo $live_place; ?>" />
        </label>
        </div>


        <div class="input_field">
        <label for="bdate">
            出生日期（陽曆）（課程需要，如實填寫）： <span class="helper">(請按格式YYYY-MM-DD填寫)</span><br/>
            <input type="text" id="bdate"  name="bdate" class="newline"  value="<?php  echo $bdate; ?>" />
        </label>
        </div>


        <div class="input_field">
        <label for="btime">
            出生時間（課程需要，如實填寫）： <span class="helper">(精確到分，例如19:45)</span><br/>
            <input type="text" id="btime"  name="btime"  value="<?php  echo $btime; ?>"  class="newline" />
        </label>
        </div>      
        
        
        <div class="input_field">
        <label for="time_exactly">
            時間準確性（課程需要，如實填寫）： <br/>
            <select name="time_exactly" id="time_exactly" class="newline">
            <option value="t1" <?php if($time_exactly=='t1'){ echo 'checked'; } ?> >父母書面記錄/醫院出生記錄</option>
            <option value="t2" <?php if($time_exactly=='t2'){ echo 'checked'; } ?> >父母記憶(偏差在15分鐘之內)</option>
            <option value="t3" <?php if($time_exactly=='t3'){ echo 'checked'; } ?> >父母記憶(偏差在半個小時之內)</option>
            <option value="t4" <?php if($time_exactly=='t4'){ echo 'checked'; } ?> >父母記憶(偏差在2個小時之內)</option>
            <option value="t5" <?php if($time_exactly=='t5'){ echo 'checked'; } ?> >父母記憶(偏差在半天之內)</option>
            <option value="t6" <?php if($time_exactly=='t6'){ echo 'checked'; } ?> >父母記憶(偏差在一天之內)</option>
            <option value="t7" <?php if($time_exactly=='t7'){ echo 'checked'; } ?> >日期偏差在一天以上</option>
            </select>
        </label>
        </div>


        <div class="input_field">
        <label for="myjob">
        目前所屬職業<br/>
            <input type="text" id="myjob"  name="myjob" class="newline" value="<?php  echo $myjob; ?>" />
        </label>
        </div>



        <div class="input_field">
        <label for="recommender">
        推薦人（如有，請填寫）<br/>
            <input type="text" id="recommender"  name="recommender" class="newline"  value="<?php  echo $recommender; ?>"/>
        </label>
        </div>     
        
        
        <div class="input_field">
            <div class="newline2">
            <div id="preview_img">
                <?php if($sata_img){ 
                            $url = wp_get_attachment_image_url($sata_img,'full');                       
                    ?>
                    
                    <img src="<?php echo $url; ?>" />
                <?php } ?>
            </div>  
            </div>      
        </div>
        

    </fieldset>
    <?php
}

// Save the custom field 'favorite_color' 
add_action( 'woocommerce_save_account_details', 'save_favorite_color_account_details', 12, 1 );
function save_favorite_color_account_details( $user_id ) {
    // For Favorite color
    if( isset( $_POST['favorite_color'] ) )
        update_user_meta( $user_id, 'favorite_color', sanitize_text_field( $_POST['favorite_color'] ) );

    // For Billing email (added related to your comment)
    if( isset( $_POST['account_email'] ) )
        update_user_meta( $user_id, 'billing_email', sanitize_text_field( $_POST['account_email'] ) );


    if( isset( $_POST['sata_name'] ) )
        update_user_meta($user_id, 'sata_name', $_POST['sata_name']);

    if( isset( $_POST['cert_name_type'] ) )
        update_user_meta($user_id, 'cert_name_type', $_POST['cert_name_type']);

    if( isset( $_POST['mb_type'] ) )    
        update_user_meta($user_id, 'mb_type', implode(",",$_POST['mb_type']));

    if( isset( $_POST['level'] ) )    
        update_user_meta($user_id, 'level', $_POST['level']);
    
    if( isset( $_POST['sata_sex'] ) )        
        update_user_meta($user_id, 'sata_sex', $_POST['sata_sex']);

    if( isset( $_POST['wechat_id'] ) )        
        update_user_meta($user_id, 'wechat_id', $_POST['wechat_id']);

    if( isset( $_POST['line_id'] ) )        
        update_user_meta($user_id, 'line_id', $_POST['line_id']);

    if( isset( $_POST['bcity'] ) )        
        update_user_meta($user_id, 'bcity', $_POST['bcity']);

    if( isset( $_POST['live_place'] ) )        
        update_user_meta($user_id, 'live_place', $_POST['live_place']);
      
    if( isset( $_POST['bdate'] ) )        
        update_user_meta($user_id, 'bdate', $_POST['bdate']);

    if( isset( $_POST['btime'] ) )        
        update_user_meta($user_id, 'btime', $_POST['btime']);

    if( isset( $_POST['time_exactly'] ) )        
        update_user_meta($user_id, 'time_exactly', $_POST['time_exactly']);

    if( isset( $_POST['myjob'] ) )
        update_user_meta($user_id, 'myjob', $_POST['myjob']);

    if( isset( $_POST['recommender'] ) )  
        update_user_meta($user_id, 'recommender', $_POST['recommender']);
  

}