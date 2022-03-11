<?php

add_action('show_user_profile', 'my_user_profile_edit_action');
add_action('edit_user_profile', 'my_user_profile_edit_action');
function my_user_profile_edit_action($user) {
  // $checked = (isset($user->artwork_approved) && $user->artwork_approved) ? ' checked="checked"' : '';

  $sata_name = (isset($user->sata_name) && $user->sata_name) ? $user->sata_name : '';
  $cert_name_type = (isset($user->cert_name_type) && $user->cert_name_type) ? $user->cert_name_type : '';
  $mb_type = (isset($user->mb_type) && $user->mb_type) ? $user->mb_type : '';
  $mb_type = explode(",", $mb_type);

  $sata_sex = (isset($user->sata_sex) && $user->sata_sex) ? $user->sata_sex : '';

  $wechat_id = (isset($user->wechat_id) && $user->wechat_id) ? $user->wechat_id : '';

  $line_id = (isset($user->line_id) && $user->line_id) ? $user->line_id : '';

  #level
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
  #sata_member{ 
    padding:10px 0px;
    margin:0px 20px 20px;
  }
  #sata_member h3{ 
    font-size:30px; 
    line-height: 1em;
    
  }
  #sata_member  .helper{
    font-size: 15px;
    color:#444;
  }
  #sata_member label{ 
    font-weight: 600;
    color: #23282d;
    font-size:17px;
    margin-right:20px;
   }
  #sata_member .input_field{
     margin-bottom:30px;
   }
  #sata_member .head{ margin-right:20px; }
  #sata_member textarea{ 
     display:block;
     width:100%;
     max-width:800px;
   }
  #sata_member .newline{
     margin-top:15px;
     width: 300px;;
   }
   #sata_member .newline2{
      margin-top:15px;     
   }
   #_unique_name88_button{
      width: 80px;
   }
</style>
  
  <hr/>
  <div id="sata_member">
    <h3>SATA 會員相關資料</h3>

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
      <label for="" class="head">是否參加過 SATA 課程</label>
      <label for="mp1">
          <input type="checkbox"  id="mp1"   name="mb_type[]" value="m1"  <?php if(in_array('m1',$mb_type)){ echo 'checked'; } ?> > 非會員
      </label>
      <label for="mp2">
          <input type="checkbox" id="mp2"  name="mb_type[]" value="m2"  <?php if(in_array('m2',$mb_type)){ echo 'checked'; } ?>  > SATA核心課程會員
      </label>
      <label for="mp3">
          <input type="checkbox" id="mp3"  name="mb_type[]" value="m3"  <?php if(in_array('m3',$mb_type)){ echo 'checked'; } ?>  > SATA工作坊會員
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
        微信 ID：  <span class="helper">(無微信ID請輸入1)</span><br/>
        <input type="text" name="wechat_id" id="wechat_id"  class="newline"  value="<?php  echo $wechat_id; ?>" />
      </label>
    </div>


    <div class="input_field">
      <label for="line_id">
        Line ID： <span class="helper">(無Line ID請輸入1)</span><br/>
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
        <input type="date" id="bdate"  name="bdate" class="newline"  value="<?php  echo $bdate; ?>" />
      </label>
    </div>


    <div class="input_field">
      <label for="btime">
        出生時間（課程需要，如實填寫）： <span class="helper">(精確到分，例如19:45)</span><br/>
        
        <input type="text" id="btime"  name="btime"    data-timepicker  value="<?php  echo $btime; ?>"  class="newline" />
      </label>
    </div>


    <div class="input_field">
      <label for="time_exactly">
        時間準確性（課程需要，如實填寫）： <br/>
        <select name="time_exactly" id="time_exactly" class="newline">
          <option value="t1" <?php if($time_exactly=='t1'){ echo 'selected'; } ?> >父母書面記錄/醫院出生記錄</option>
          <option value="t2" <?php if($time_exactly=='t2'){ echo 'selected'; } ?> >父母記憶(偏差在15分鐘之內)</option>
          <option value="t3" <?php if($time_exactly=='t3'){ echo 'selected'; } ?> >父母記憶(偏差在半個小時之內)</option>
          <option value="t4" <?php if($time_exactly=='t4'){ echo 'selected'; } ?> >父母記憶(偏差在2個小時之內)</option>
          <option value="t5" <?php if($time_exactly=='t5'){ echo 'selected'; } ?> >父母記憶(偏差在半天之內)</option>
          <option value="t6" <?php if($time_exactly=='t6'){ echo 'selected'; } ?> >父母記憶(偏差在一天之內)</option>
          <option value="t7" <?php if($time_exactly=='t7'){ echo 'selected'; } ?> >日期偏差在一天以上</option>
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
      <label for="sata_img">
        上傳圖檔 Size 300*300<br/>
        <div class="newline2">
          <div id="preview_img">
              <?php if($sata_img){ 
                        $url = wp_get_attachment_image_url($sata_img,'full');                       
                ?>
                  
                  <img src="<?php echo $url; ?>" />
              <?php } ?>
          </div>
          <input id="_unique_name88" class="form-control " name="sata_img" type="hidden" value="<?php echo $sata_img; ?>"/>
          <input id="_unique_name88_button" class="button _unique_name_button" name="_unique_name_button" type="button" value="上傳圖檔" />
          <input id="clear_img" value="清除"  class="button" type="button" />
        </div>
      </label>



    </div>
    <?php 
      wp_enqueue_script('thickbox');
      wp_enqueue_media();
      wp_enqueue_script('media-upload');
    ?>
    <script>
jQuery(document).ready(function($){
    var _custom_media = true,
        _orig_send_attachment = wp.media.editor.send.attachment;

    $('._unique_name_button').click(function(e) {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);
        var id = button.attr('id').replace('_button', '');
        _custom_media = true;
        wp.media.editor.send.attachment = function(props, attachment){
            if ( _custom_media ) {
          
                $("#preview_img").html('<img src="'+attachment.url+'"/>');

                $("#"+id).val(attachment.id);
            } else {
                return _orig_send_attachment.apply( this, [props, attachment] );
            };
        }

        wp.media.editor.open(button);
        return false;
    });

    $('.add_media2').on('click', function(){
        _custom_media = false;
    });


    $('._unique_name_button2').click(function(e) {
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);
        var id = button.attr('id').replace('_button', '');
        _custom_media = true;
        wp.media.editor.send.attachment = function(props, attachment){
            if ( _custom_media ) {
                $("#"+id).val(attachment.url);
            } else {
                return _orig_send_attachment.apply( this, [props, attachment] );
            };
        }
        wp.media.editor.open(button);
        return false;
    });

    $("#clear_img").on("click",function(){
        $("#preview_img").html('');
        $("#_unique_name88").val('');
    });
});

</script>


  </div>  
  <hr/>
<?php 
}


add_action('personal_options_update', 'my_user_profile_update_action');
add_action('edit_user_profile_update', 'my_user_profile_update_action');
function my_user_profile_update_action($user_id) {

  // update_user_meta($user_id, 'artwork_approved', isset($_POST['artwork_approved']));

  
  update_user_meta($user_id, 'sata_name', $_POST['sata_name']);
  update_user_meta($user_id, 'cert_name_type', $_POST['cert_name_type']);
  update_user_meta($user_id, 'mb_type', implode(",",$_POST['mb_type']));
  update_user_meta($user_id, 'level', $_POST['level']);
  
  update_user_meta($user_id, 'sata_sex', $_POST['sata_sex']);
  update_user_meta($user_id, 'wechat_id', $_POST['wechat_id']);
  update_user_meta($user_id, 'line_id', $_POST['line_id']);
  update_user_meta($user_id, 'bcity', $_POST['bcity']);
  update_user_meta($user_id, 'live_place', $_POST['live_place']);

  update_user_meta($user_id, 'bdate', $_POST['bdate']);
  update_user_meta($user_id, 'btime', $_POST['btime']);
  update_user_meta($user_id, 'time_exactly', $_POST['time_exactly']);

  update_user_meta($user_id, 'myjob', $_POST['myjob']);

  update_user_meta($user_id, 'recommender', $_POST['recommender']);
  update_user_meta($user_id, 'sata_img', $_POST['sata_img']);

}?>