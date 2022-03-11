<?php

// Add the custom field "favorite_color"
add_action( 'woocommerce_edit_account_form', 'add_favorite_color_to_edit_account_form' );
function add_favorite_color_to_edit_account_form() {

    $user = wp_get_current_user();


    if(isset($_POST['sata_name'])){ $sata_name = $_POST['sata_name']; }
    if(isset($user->sata_name) && $user->sata_name) { $sata_name = $user->sata_name; };

    if(isset($_POST['cert_name_type'])){ $cert_name_type = $_POST['cert_name_type']; }
    if(isset($user->cert_name_type) && $user->cert_name_type) { $cert_name_type = $user->cert_name_type; }


   
    $mb_type = array();
    if(isset($_POST['mb_type'])){ 
        $mb_type  = $_POST['mb_type']; 
    }else{
        if(isset($user->mb_type) && $user->mb_type){
            $mb_type =  $user->mb_type;
            $mb_type = explode(",", $mb_type);
        }
    }
    /*
    if($mb_type){
        $mb_type = explode(",", $mb_type);
    }
    */
    
    // print_r($_POST['mb_type']);
    // print_r($mb_type);


    if(isset($_POST['sata_sex'])){ $sata_sex = $_POST['sata_sex']; }
    if(isset($user->sata_sex) && $user->sata_sex) {$sata_sex =  $user->sata_sex; }

    if(isset($_POST['wechat_id'])){ $wechat_id = $_POST['wechat_id']; }
    if(isset($user->wechat_id) && $user->wechat_id) { $wechat_id = $user->wechat_id; }

    if(isset($_POST['line_id'])){ $line_id = $_POST['line_id']; }
    if(isset($user->line_id) && $user->line_id) { $line_id =  $user->line_id; }

    if(isset($_POST['level'])){ $level = $_POST['level']; }
    if(isset($user->level) && $user->level){  $level =  $user->level; }

    if(isset($_POST['bcity'])){ $bcity = $_POST['bcity']; }
    if(isset($user->bcity) && $user->bcity) { $bcity =  $user->bcity; }

    if(isset($_POST['live_place'])){ $live_place = $_POST['live_place']; }
    if(isset($user->live_place) && $user->live_place) { $live_place =  $user->live_place; }

    if(isset($_POST['bdate'])){ $bdate = $_POST['bdate']; }
    if(isset($user->bdate) && $user->bdate) { $bdate =   $user->bdate; }

    if(isset($_POST['btime'])){ $btime = $_POST['btime']; }
    if(isset($user->btime) && $user->btime) { $btime = $user->btime; }

    if(isset($_POST['time_exactly'])){ $time_exactly = $_POST['time_exactly']; }
    if(isset($user->time_exactly) && $user->time_exactly){ $time_exactly =  $user->time_exactly; }

    if(isset($_POST['myjob'])){ $myjob = $_POST['myjob']; }
    if(isset($user->myjob) && $user->myjob) { $myjob = $user->myjob; }


    if(isset($_POST['recommender'])){ $recommender = $_POST['recommender']; }
    if(isset($user->recommender) && $user->recommender) {$recommender =  $user->recommender; }

    $sata_img = (isset($user->sata_img) && $user->sata_img) ? $user->sata_img : '';

    ?>
    <style>
        .pflex{ display:flex; flex-wrap:wrap;}
          #sata_member .input_field{
                    margin-bottom:30px;
            }
        .reqx{
             color:#e42234;
         }
         .input_field label.head{min-height:25px; display:inline-flex; ;}
         label[for="sex1"],
         label[for="sex2"],
         label[for="mp1"],
         label[for="mp2"],
         label[for="mp3"],
         label[for="tp1"],
         label[for="tp2"],
         label[for="tp3"],
         label[for="tp4"]{margin-left:15px; display:inline-flex;align-items: center;}
         #tp1,#tp2,#tp3,#tp4,#sex1,#sex2,#mp1,#mp2,#mp3{margin-right:5px;}
         .color_rd{
            color: #d4a207;           
            padding: 2px 10px
         }
         /* The container */
        .xcontainer {
        display: block;
        position: relative;
        padding-left: 25px;
        margin-bottom: 12px;
        margin-right: 10px;           
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        }

        label.xcontainer{
            line-height:20px;            
            font-size: 14px;
        }

        /* Hide the browser's default radio button */
        .xcontainer input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        }

        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 18px;
            width: 18px;
            background-color: #f6f6f6;
            border-radius: 50%;
            border: 1px solid #666;
        }

        /* On mouse-over, add a grey background color */
        .xcontainer:hover input ~ .checkmark {
        background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .xcontainer input:checked ~ .checkmark {
        background-color: #fff;;
        border: 1px solid #d4a207;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
        content: "";
        position: absolute;
        display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .xcontainer input:checked ~ .checkmark:after {
            background-color: #d4a207;           
            display:block;
        }

        /* Style the indicator (dot/circle) */
        .xcontainer .checkmark:after {
            top: 3px;
            left: 3px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #d4a207;
        }
    </style>

<?php if(ICL_LANGUAGE_CODE=='zh-hans'){  /* 簡體中文 */  ?>


        <script>
            (function($){
                $(document).ready(function(){
                    $(".woocommerce-MyAccount-content").prepend('<h3 class="color_rd">建议使用浏览器Chrome、Microsoft Edge 和 Safari ，以获得最佳使用体验</h3>');
                    $('label[for="country_code"]').html('国码<span class="required">*</span> (大陆国码：+86 台湾国码：+886)');
                });
            })(jQuery);
        </script>


        <fieldset id="sata_member" >
        <legend><span class="reqx">*</span>SATA 会员资料：</legend>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
      
        <div class="input_field">
            <label for="sata_name">
            <span class="reqx">*</span>英文名/中文拼音：
                <input type="text" id="sata_name"  name="sata_name"  value="<?php echo $sata_name;  ?>" />
            </label>
        </div>

        <div class="input_field  pflex">
            <label for="" class="head"><span class="reqx">*</span>证书登记名字：</label>
            <label for="tp1" class="xcontainer" >
                <input type="radio" name="cert_name_type" id="tp1"  value="n1" <?php if($cert_name_type=='n1'){ echo 'checked';}  ?> > 中文名(繁體) <span class="checkmark"></span>
            </label>
            <label for="tp2" class="xcontainer" >
                <input type="radio" name="cert_name_type" id="tp2" value="n2" <?php if($cert_name_type=='n2'){ echo 'checked';}  ?> > 中文名(简体) <span class="checkmark"></span>
            </label>
            <label for="tp3" class="xcontainer" >
                <input type="radio" name="cert_name_type" id="tp3" value="n3"  <?php if($cert_name_type=='n3'){ echo 'checked';}  ?> > 英文名 <span class="checkmark"></span>
            </label>
            <label for="tp4" class="xcontainer" >
                <input type="radio" name="cert_name_type" id="tp4" value="n4"  <?php if($cert_name_type=='n4'){ echo 'checked';}  ?> > 中文拼音 <span class="checkmark"></span>
            </label>
        </div>    


        <strong>说明</strong>
        <ul>
            <li><b>①毕业证书：</b><br/>
                -完成全三阶所有作业并通过最终毕业考核的学员，由SATA颁发职业占星师毕业证书。<br/>
                -完成工作坊作业的学员，颁发对应工作坊修业证书（线上课程证书为电子版）;<br/>
                -前导课/占星软件工作坊/行星排列工作坊无证书。
            </li>
            <li>
                <b>②毕业福利：</b><br/>
                -核心课程毕业学员可免费参加所有核心课程的助教研讨会，并且不定期开放单元课程，让旧学员重新复训课程。<br/>               
            </li>
        </ul>
        <br/>


        <div class="input_field pflex">
            <label for="" class="head"><span class="reqx">*</span>是否参加过SATA课程：</label>&nbsp;
            <label for="mp1" >
                <input type="checkbox"  id="mp1"   name="mb_type[]" value="m1"  <?php if(in_array('m1',$mb_type)){ echo 'checked'; } ?> >非学员 
            </label>
            <label for="mp2" >
                <input type="checkbox" id="mp2"  name="mb_type[]" value="m2"  <?php if(in_array('m2',$mb_type)){ echo 'checked'; } ?>  >SATA核心课程学员 
            </label>
            <label for="mp3" >
                <input type="checkbox" id="mp3"  name="mb_type[]" value="m3"  <?php if(in_array('m3',$mb_type)){ echo 'checked'; } ?>  >SATA工作坊学员 
            </label>
        </div>


        
        <div class="input_field">
            <label for="" class="head"><span class="reqx">*</span>你的占星程度：</label>
            <p class="helper">（现占&古占？ 占星小白&占星老司机？ 学过几年…等等)</p>
            <textarea name="level" id="level" cols="30" rows="10" ><?php  echo $level; ?></textarea>
        </div>   
        
        
        <div class="input_field">
            <label for="" class="head"><span class="reqx">*</span>性別：</label>
            <label for="sex1" class="xcontainer">
                <input type="radio" name="sata_sex" id="sex1" value="male"  <?php if($sata_sex=='male'){ echo 'checked'; } ?> > 男 <span class="checkmark"></span>
            </label>

            <label for="sex2" class="xcontainer">
                <input type="radio" name="sata_sex" id="sex2" value="female"  <?php if($sata_sex=='female'){ echo 'checked'; } ?> > 女 <span class="checkmark"></span>
            </label>
        </div>    
        
        <div class="input_field">
            <label for="wechat_id">
            <span class="reqx">*</span>微信 ID：  <span class="helper">(无微信ID请输入1)</span><br/>
                <input type="text" name="wechat_id" id="wechat_id"  class="newline"  value="<?php  echo $wechat_id; ?>" />
            </label>
        </div>      
        
        
        <div class="input_field">
            <label for="line_id">
            <span class="reqx">*</span>Line ID： <span class="helper">(无Line ID请输入1)</span><br/>
                <input type="text" name="line_id" id="line_id" class="newline"  value="<?php  echo $line_id; ?>" />
            </label>
        </div>       
        
        <div class="input_field">
        <label for="bcity">
        <span class="reqx">*</span>出生地点（课程需要，如实填写）： <span class="helper">(精确到市，例如广东省广州市)</span><br/>
            <input type="text" id="bcity"  name="bcity" class="newline" value="<?php  echo $bcity; ?>" />
        </label>
        </div>


        <div class="input_field">
        <label for="live_place">
            <span class="reqx">*</span>目前居住地（课程需要，如实填写）： <span class="helper">(精确到市，例如台湾台北)</span><br/>
            <input type="text" id="live_place"  name="live_place" class="newline"  value="<?php  echo $live_place; ?>" />
        </label>
        </div>


        <div class="input_field">
        <label for="bdate">
             <span class="reqx">*</span>出生日期（阳历）（课程需要，如实填写）： <span class="helper">(请按格式YYYY-MM-DD填写)</span><br/>
            <input type="date" id="bdate"  name="bdate" class="newline"  value="<?php  echo $bdate; ?>" />
        </label>
        </div>


        <div class="input_field">
        <label for="btime">
            <span class="reqx">*</span>出生时间（课程需要，如实填写）： <span class="helper">(精确到分，例如19:45)</span><br/>      
            <input id="btime"  name="btime" class="input-element" placeholder="hh:mm" type="tel" value="<?php  echo $btime; ?>">
            <!--     
                <input type="text" id="btime"  name="btime"  style="ime-mode:disabled"  data-timepicker  value="<?php // echo $btime; ?>"  class="newline" />
            -->
        </label>
        </div>      
        
        
        <div class="input_field">
        <label for="time_exactly">
        <span class="reqx">*</span>时间准确性（课程需要，如实填写）： <br/>
            <select name="time_exactly" id="time_exactly" class="newline">
            <option value="t1" <?php if($time_exactly=='t1'){ echo 'selected'; } ?> >父母书面记录/医院出生记录</option>
            <option value="t2" <?php if($time_exactly=='t2'){ echo 'selected'; } ?> >父母记忆（偏差在15分钟之内）</option>
            <option value="t3" <?php if($time_exactly=='t3'){ echo 'selected'; } ?> >父母记忆（偏差在半个小时之内）</option>
            <option value="t4" <?php if($time_exactly=='t4'){ echo 'selected'; } ?> >父母记忆（偏差在2个小时之内）</option>
            <option value="t5" <?php if($time_exactly=='t5'){ echo 'selected'; } ?> >父母记忆（偏差在半天之内）</option>
            <option value="t6" <?php if($time_exactly=='t6'){ echo 'selected'; } ?> >父母记忆（偏差在一天之内）</option>
            <option value="t7" <?php if($time_exactly=='t7'){ echo 'selected'; } ?> >日期偏差在一天以上</option>
            </select>
        </label>
        </div>


        <div class="input_field">
        <label for="myjob">
        <span class="reqx">*</span>目前所属职业：<br/>
            <input type="text" id="myjob"  name="myjob" class="newline" value="<?php  echo $myjob; ?>" />
        </label>
        </div>



        <div class="input_field">
        <label for="recommender">
        推荐人（如有，请填写）：<br/>
            <input type="text" id="recommender"  name="recommender" class="newline"  value="<?php  echo $recommender; ?>"/>
        </label>
        </div>     
        

        <div class="input_field">
            <div class="newline2">
                <label for="">专属星盘 ： <?php if(!$sata_img){ ?><span class="helper" style="color:#d4a207" >(完成以上资料并购买课程/咨商，通知SATA小伙伴后，将课前与咨商前，给予专属于您的星盘)</span> <?php } ?> </label>
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

<?php }else if(ICL_LANGUAGE_CODE=='en'){  ?>    


    <script>
            (function($){
                $(document).ready(function(){
                    $(".woocommerce-MyAccount-content").prepend('<h3 class="color_rd">Browsers Chrome, Microsoft Edge and Safari are recommended for the best experience</h3>');
                    $('label[for="country_code"]').html('Country Code<span class="required">*</span> (China：+86 Taiwan：+886)');
                });
            })(jQuery);
        </script>


        <fieldset id="sata_member" >
        <legend><span class="reqx">*</span>SATA Member Information：</legend>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
      
        <div class="input_field">
            <label for="sata_name">
            <span class="reqx">*</span>Full Name:
                <input type="text" id="sata_name"  name="sata_name"  value="<?php echo $sata_name;  ?>" />
            </label>
        </div>

        <div class="input_field pflex">
            <label for="" class="head"><span class="reqx">*</span>Name on Certificate:</label>
            <label for="tp1" class="xcontainer">
                <input type="radio" name="cert_name_type" id="tp1"  value="n1" <?php if($cert_name_type=='n1'){ echo 'checked';}  ?> > Chinese Name (Traditional) <span class="checkmark"></span>
            </label>
            <label for="tp2" class="xcontainer">
                <input type="radio" name="cert_name_type" id="tp2" value="n2" <?php if($cert_name_type=='n2'){ echo 'checked';}  ?> > Chinese Name (Simplied) <span class="checkmark"></span>
            </label>
            <label for="tp3" class="xcontainer">
                <input type="radio" name="cert_name_type" id="tp3" value="n3"  <?php if($cert_name_type=='n3'){ echo 'checked';}  ?> > English Name <span class="checkmark"></span>
            </label>
            <label for="tp4" class="xcontainer">
                <input type="radio" name="cert_name_type" id="tp4" value="n4"  <?php if($cert_name_type=='n4'){ echo 'checked';}  ?> > Chinese by English spelling <span class="checkmark"></span>
            </label>
        </div>    


        <strong>Remark:</strong>
        <ul>
            <li><b>①Certificate:</b><br/>
                -Students who complete the homework of Core Course level1-3 will receive a certificate upon graduation at the 3rd level;<br/>
                -Students who complete the homework of workshops will be issued the corresponding workshop certificate (the online course certificate is an electronic version);<br/>
                -There is no certificate for the introductory class / astrology software workshop / family constellation with traditional astrology and healing workshop.
            </li>
            <li>
                <b>②Graduation benefits:</b><br/>
                -Graduates of Core Course can participate in group discussing seminars free of charge, and some classes will be reopen to old students for reviewing.<br/>               
            </li>
        </ul>
        <br/>


        <div class="input_field pflex">
            <label for="" class="head"><span class="reqx">*</span>Have you taken a SATA course?</label>&nbsp;
            <label for="mp1">
                <input type="checkbox"  id="mp1"   name="mb_type[]" value="m1"  <?php if(in_array('m1',$mb_type)){ echo 'checked'; } ?> >Non-member 
            </label>
            <label for="mp2">
                <input type="checkbox" id="mp2"  name="mb_type[]" value="m2"  <?php if(in_array('m2',$mb_type)){ echo 'checked'; } ?>  >SATA’s Core Course 
            </label>
            <label for="mp3">
                <input type="checkbox" id="mp3"  name="mb_type[]" value="m3"  <?php if(in_array('m3',$mb_type)){ echo 'checked'; } ?>  >SATA’s workshops 
            </label>
        </div>


        
        <div class="input_field">
            <label for="" class="head"><span class="reqx">*</span>Experiences of Astrology Learning</label>
            <p class="helper">Traditional or Modern Astrology? Beginner or intermediate level? Years of learning?</p>
            <textarea name="level" id="level" cols="30" rows="10" ><?php  echo $level; ?></textarea>
        </div>   
        
        
        <div class="input_field">
            <label for="" class="head"><span class="reqx">*</span>Gender</label>
            <label for="sex1" class="xcontainer">
                <input type="radio" name="sata_sex" id="sex1" value="male"  <?php if($sata_sex=='male'){ echo 'checked'; } ?> > Male <span class="checkmark"></span>
            </label>

            <label for="sex2" class="xcontainer">
                <input type="radio" name="sata_sex" id="sex2" value="female"  <?php if($sata_sex=='female'){ echo 'checked'; } ?> > Female <span class="checkmark"></span>
            </label>
        </div>    
        
        <div class="input_field">
            <label for="wechat_id">
            <span class="reqx">*</span>Wechat ID：  <span class="helper">(Please input 1 if you do not have one)</span><br/>
                <input type="text" name="wechat_id" id="wechat_id"  class="newline"  value="<?php  echo $wechat_id; ?>" />
            </label>
        </div>      
        
        
        <div class="input_field">
            <label for="line_id">
            <span class="reqx">*</span>Line ID： <span class="helper">(Please input 1 if you do not have one)</span><br/>
                <input type="text" name="line_id" id="line_id" class="newline"  value="<?php  echo $line_id; ?>" />
            </label>
        </div>       
        
        <div class="input_field">
        <label for="bcity">
        <span class="reqx">*</span>Place of Birth (required)： <span class="helper">(Please specify the city, e.g. New York City)</span><br/>
            <input type="text" id="bcity"  name="bcity" class="newline" value="<?php  echo $bcity; ?>" />
        </label>
        </div>


        <div class="input_field">
        <label for="live_place">
            <span class="reqx">*</span>Place of Living (required)： <span class="helper">(Please specify the city, e.g. New York City)</span><br/>
            <input type="text" id="live_place"  name="live_place" class="newline"  value="<?php  echo $live_place; ?>" />
        </label>
        </div>


        <div class="input_field">
        <label for="bdate">
             <span class="reqx">*</span>Date of Birth (required)： <span class="helper">(YYYY-MM-DD)</span><br/>
            <input type="date" id="bdate"  name="bdate" class="newline"  value="<?php  echo $bdate; ?>" />
        </label>
        </div>


        <div class="input_field">
        <label for="btime">
            <span class="reqx">*</span>Time of Birth (required)： <span class="helper">(Please specify to the minute, e.g. 19:45)</span><br/>            
            <input id="btime"  name="btime" class="input-element" placeholder="hh:mm" type="tel" value="<?php  echo $btime; ?>">
            <!--
            <input type="text" id="btime"  name="btime"  style="ime-mode:disabled"  data-timepicker  value="<?php // echo $btime; ?>"  class="newline" />
            -->
            
        </label>
        </div>      
        
        
        <div class="input_field">
        <label for="time_exactly">
        <span class="reqx">*</span>Accuracy of time (required)： <br/>
            <select name="time_exactly" id="time_exactly" class="newline">
            <option value="t1" <?php if($time_exactly=='t1'){ echo 'selected'; } ?> >From birth certificate/written record</option>
            <option value="t2" <?php if($time_exactly=='t2'){ echo 'selected'; } ?> >From memory (discrepancy less than 15 minutes)</option>
            <option value="t3" <?php if($time_exactly=='t3'){ echo 'selected'; } ?> >From memory (discrepancy less than 30 minutes)</option>
            <option value="t4" <?php if($time_exactly=='t4'){ echo 'selected'; } ?> >From memory (discrepancy less than 2 hours)</option>
            <option value="t5" <?php if($time_exactly=='t5'){ echo 'selected'; } ?> >From memory (discrepancy less than half day)</option>
            <option value="t6" <?php if($time_exactly=='t6'){ echo 'selected'; } ?> >From memory (discrepancy less than one day)</option>
            <option value="t7" <?php if($time_exactly=='t7'){ echo 'selected'; } ?> >From memory (discrepancy more than one day)</option>
            </select>
        </label>
        </div>


        <div class="input_field">
        <label for="myjob">
        <span class="reqx">*</span>Occupation<br/>
            <input type="text" id="myjob"  name="myjob" class="newline" value="<?php  echo $myjob; ?>" />
        </label>
        </div>



        <div class="input_field">
        <label for="recommender">
        Who recommends SATA to you<br/>
            <input type="text" id="recommender"  name="recommender" class="newline"  value="<?php  echo $recommender; ?>"/>
        </label>
        </div>     
        

        <div class="input_field">
            <div class="newline2">
                <label for=""> <?php if(!$sata_img){ ?><span class="helper" style="color:#d4a207" >After filling in above columns and informing the SATA Astrology Assistant you will soon receive the natal chart exclusive to you.</span> <?php } ?> </label>
            <div id="preview_img">
                <?php if($sata_img){ 
                            $url = wp_get_attachment_image_url($sata_img,'full');                       
                    ?><img src="<?php echo $url; ?>" />
                <?php } ?>
            </div>  
            </div>      
        </div>        
        </fieldset>

<?php }else{ ?>    

    <script>
            (function($){
                $(document).ready(function(){
                    $(".woocommerce-MyAccount-content").prepend('<h3 class="color_rd">建議使用瀏覽器Chrome、Microsoft Edge 和 Safari ，以獲得最佳使用體驗</h3>');
                    $('label[for="country_code"]').html('國碼<span class="required">*</span> (大陸國碼：+86 台灣國碼：+886)');
                });
            })(jQuery);
        </script>


    <fieldset id="sata_member" >
        <legend><span class="reqx">*</span>SATA 會員資料：</legend>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
      
        <div class="input_field">
            <label for="sata_name">
            <span class="reqx">*</span>英文名/中文拼音：
                <input type="text" id="sata_name"  name="sata_name"  value="<?php echo $sata_name;  ?>" />
            </label>
        </div>

        <div class="input_field pflex">
            <label for="" class="head"><span class="reqx">*</span>證書登記名字：</label>
            <label for="tp1" class="xcontainer" >
                <input type="radio" name="cert_name_type" id="tp1"  value="n1" <?php if($cert_name_type=='n1'){ echo 'checked';}  ?> > 中文名(繁體)<span class="checkmark" ></span>
            </label>
            <label for="tp2" class="xcontainer">
                <input type="radio" name="cert_name_type" id="tp2" value="n2" <?php if($cert_name_type=='n2'){ echo 'checked';}  ?> > 中文名(簡體)<span class="checkmark" ></span>
            </label>
            <label for="tp3" class="xcontainer">
                <input type="radio" name="cert_name_type" id="tp3" value="n3"  <?php if($cert_name_type=='n3'){ echo 'checked';}  ?> > 英文名<span class="checkmark" ></span>
            </label>
            <label for="tp4" class="xcontainer">
                <input type="radio" name="cert_name_type" id="tp4" value="n4"  <?php if($cert_name_type=='n4'){ echo 'checked';}  ?> > 中文拼音<span class="checkmark" ></span>
            </label>
        </div>    


        <strong>說明</strong>
        <ul>
            <li><b>①畢業證書：</b><br/>
                -完成全三階所有作業並通過最終畢業考核的學員，由SATA頒發職業占星師畢業證書。<br/>
                -完成工作坊作業的學員，頒發對應工作坊修業證書（線上課程證書為電子版）；<br/>
                -前導課/占星軟件工作坊/行星排列工作坊無證書。
            </li>
            <li>
                <b>②畢業福利：</b><br/>
                -核心課程畢業學員可免費參加所有核心課程的助教研討會，並且不定期開放單元課程，讓舊學員重新複訓課程。<br/>               
            </li>
        </ul>
        <br/>


        <div class="input_field pflex">
            <label for="" class="head"><span class="reqx">*</span>是否參加過 SATA 課程：</label>&nbsp;
            <label for="mp1">
                <input type="checkbox"  id="mp1"   name="mb_type[]" value="m1"  <?php if(in_array('m1',$mb_type)){ echo 'checked'; } ?> >非會員 
            </label>
            <label for="mp2">
                <input type="checkbox" id="mp2"  name="mb_type[]" value="m2"  <?php if(in_array('m2',$mb_type)){ echo 'checked'; } ?>  >SATA核心課程會員 
            </label>
            <label for="mp3">
                <input type="checkbox" id="mp3"  name="mb_type[]" value="m3"  <?php if(in_array('m3',$mb_type)){ echo 'checked'; } ?>  >SATA工作坊會員 
            </label>
        </div>


        
        <div class="input_field">
            <label for="" class="head"><span class="reqx">*</span>你的占星程度：</label>
            <p class="helper">(現占＆古占？占星小白＆占星老司機？學過幾年…等等)</p>
            <textarea name="level" id="level" cols="30" rows="10" ><?php  echo $level; ?></textarea>
        </div>   
        
        
        <div class="input_field">
            <label for="" class="head"><span class="reqx">*</span>性別：</label>
            <label for="sex1" class="xcontainer" >
                <input type="radio" name="sata_sex" id="sex1" value="male"  <?php if($sata_sex=='male'){ echo 'checked'; } ?> > 男 <span class="checkmark"></span>
            </label>

            <label for="sex2" class="xcontainer" >
                <input type="radio" name="sata_sex" id="sex2" value="female"  <?php if($sata_sex=='female'){ echo 'checked'; } ?> > 女 <span class="checkmark"></span>
            </label>
        </div>    
        
        <div class="input_field">
            <label for="wechat_id">
            <span class="reqx">*</span>微信 ID：  <span class="helper">(無微信ID請輸入1)</span><br/>
                <input type="text" name="wechat_id" id="wechat_id"  class="newline"  value="<?php  echo $wechat_id; ?>" />
            </label>
        </div>      
        
        
        <div class="input_field">
            <label for="line_id">
            <span class="reqx">*</span>Line ID： <span class="helper">(無Line ID請輸入1)</span><br/>
                <input type="text" name="line_id" id="line_id" class="newline"  value="<?php  echo $line_id; ?>" />
            </label>
        </div>       
        
        <div class="input_field">
        <label for="bcity">
        <span class="reqx">*</span>出生地點（課程需要，如實填寫）： <span class="helper">(精確到市，例如廣東省廣州市)</span><br/>
            <input type="text" id="bcity"  name="bcity" class="newline" value="<?php  echo $bcity; ?>" />
        </label>
        </div>


        <div class="input_field">
        <label for="live_place">
            <span class="reqx">*</span>目前居住地（課程需要，如實填寫）： <span class="helper">(精確到市，例如台灣台北)</span><br/>
            <input type="text" id="live_place"  name="live_place" class="newline"  value="<?php  echo $live_place; ?>" />
        </label>
        </div>


        <div class="input_field">
        <label for="bdate">
             <span class="reqx">*</span>出生日期（陽曆）（課程需要，如實填寫）： <span class="helper">(請按格式YYYY-MM-DD填寫)</span><br/>
            <input type="date" id="bdate"  name="bdate" class="newline"  value="<?php  echo $bdate; ?>" />
        </label>
        </div>


        <div class="input_field">
        <label for="btime">
            <span class="reqx">*</span>出生時間（課程需要，如實填寫）： <span class="helper">(精確到分，例如19:45)</span><br/>

            <input id="btime"  name="btime" class="input-element" placeholder="hh:mm" type="tel" value="<?php  echo $btime; ?>">  
            <!--
            <input type="text" id="btime"  name="btime"  style="ime-mode:disabled"    data-timepicker  value="<?php  // echo $btime; ?>"  class="newline" />
            -->
           
        </label>
        </div>      
        
        
        <div class="input_field">
        <label for="time_exactly">
        <span class="reqx">*</span>時間準確性（課程需要，如實填寫）： <br/>
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
        <span class="reqx">*</span>目前所屬職業：<br/>
            <input type="text" id="myjob"  name="myjob" class="newline" value="<?php  echo $myjob; ?>" />
        </label>
        </div>



        <div class="input_field">
        <label for="recommender">
        推薦人（如有，請填寫）:<br/>
            <input type="text" id="recommender"  name="recommender" class="newline"  value="<?php  echo $recommender; ?>"/>
        </label>
        </div>     
        

        <div class="input_field">
            <div class="newline2">
                <label for="">專屬星盤 <?php if(!$sata_img){ ?><span class="helper" style="color:#d4a207" >(完成以上資料並購買課程/諮商，通知SATA小夥伴後，將課前與諮商前，給予專屬於您的星盤)</span><?php } ?>
            </label>
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

    <?php } ?>  


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



/**
 * Step 3. Make it required
 */
add_filter('woocommerce_save_account_details_required_fields', 'misha_make_field_required');
function misha_make_field_required( $required_fields ){

    if(ICL_LANGUAGE_CODE=='zh-hans'){
        $required_fields['sata_name'] = '英文名/中文拼音';
        $required_fields['cert_name_type'] = '证书登记名字';
        $required_fields['mb_type'] = '是否参加过SATA课程';
        $required_fields['level'] = '你的占星程度';
        $required_fields['sata_sex'] = '性別';
    

            $required_fields['wechat_id'] = '微信 ID';

            $required_fields['line_id'] = 'Line ID';
        
        
        $required_fields['bcity'] = '出生地点';
        $required_fields['live_place'] = '目前居住地';
    
        $required_fields['bdate'] = '出生日期（阳历）';
        $required_fields['btime'] = '出生时间';
        $required_fields['myjob'] = '目前所属职业';

    }else if(ICL_LANGUAGE_CODE=='en'){

        $required_fields['sata_name'] = 'Full Name';
        $required_fields['cert_name_type'] = 'Name on Certificate';
        $required_fields['mb_type'] = 'Have you taken a SATA course';
        $required_fields['level'] = 'Experiences of Astrology Learning';
        $required_fields['sata_sex'] = 'Gender';
    
        $required_fields['wechat_id'] = 'Wechat ID';
        $required_fields['line_id'] = 'Line ID';
        $required_fields['bcity'] = 'Place of Birth';
        $required_fields['live_place'] = 'Place of Living';
    
        $required_fields['bdate'] = 'Date of Birth';
        $required_fields['btime'] = 'Time of Birth';
        $required_fields['myjob'] = 'Occupation';


    }else{


        $required_fields['sata_name'] = '英文名/中文拼音';
        $required_fields['cert_name_type'] = '證書登記名字';
        $required_fields['mb_type'] = '是否參加過 SATA 課程';
        $required_fields['level'] = '你的占星程度';
        $required_fields['sata_sex'] = '性別';
    
        $required_fields['wechat_id'] = '微信 ID';
        $required_fields['line_id'] = 'Line ID';
        $required_fields['bcity'] = '出生地點';
        $required_fields['live_place'] = '目前居住地';
    
        $required_fields['bdate'] = '出生日期';
        $required_fields['btime'] = '出生時間';
        $required_fields['myjob'] = '目前所屬職業';

    }

	return $required_fields;	
}
?>