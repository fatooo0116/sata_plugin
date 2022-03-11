<?php
add_action( 'woocommerce_after_order_notes', 'bbloomer_add_custom_checkout_field' );

function bbloomer_add_custom_checkout_field( $checkout ) { 
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
 

   /*
   woocommerce_form_field( 'license_no', array(        
      'type' => 'text',        
      'class' => array( 'form-row-wide' ),        
      'label' => 'License Number',        
      'placeholder' => 'CA12345678',        
      'required' => true,        
      'default' => $saved_license_no,        
   ), $checkout->get_value( 'license_no' ) ); 
   */

   ?><style>
        #sata_member .input_field{
            margin-bottom:30px;
         }
         .reqx{
             color:#e42234;
         }
         #sata_member .helper{ display:block; }
         #sata_member .input_field input[type="checkbox"]{ margin:0 3px 0 3px; }
         #form_actions{position: relative;}
         #form_actions .block123{ cursor:pointer; position:absolute; width:50%;height:100%; width:110px; right:0;top:0; }
   </style>
   <script>

        let langx = '<?php echo ICL_LANGUAGE_CODE ?>'; 

       (function($){
        $(document).ready(function(){


            
            $('input[name="checkout_prev_step"],input[name="checkout_next_step"]').on('click',function(e){
                
                // console.log("active...");
                
                let it =0;
                let max =10;
                let tx = setInterval(() => {

                   // console.log('count');

                    if(it>0){
                        if($("#timeline-2").hasClass('active')){
                            console.log("current page vaild start"); 
                            
                           $("#form_actions").append('<div class="block123"></div>');
                          listen_vaild();
                            clearInterval(tx);
                            it=0;
                        }  
                    }else{
                        $("#form_actions .block123").remove();
                    }



                    if(it>max){
                        it = 0;
                        clearInterval(tx);
                    }
                    it++;
                }, 1000);                                                         
            });


            


            let listen_vaild = function(){
                $("#form_actions .block123").on('click',function(){

                    // console.log(langx);
                    
                    let msg = '';
                    let errorchk = [];

                    let rq,pn1,pn2,pn3,pn4,pn5,pn6,pn7,pn8,pn9,pn10,pn11,pn12,pn13;

                    if(langx=='zh-hans'){
                        rq = ' 为必填栏位';
                        pn1 = '英文名/中文拼音';
                        pn2 = '证书登记名字';
                        pn3 = '是否参加过SATA课程';
                        pn4 = '你的占星程度';
                        pn5 = '性別';
                        pn6 = '微信 ID';
                        pn7 = 'Line ID';
                        pn8 = '出生地点';
                        pn9 = '目前居住地';
                        pn10 = '出生日期（阳历）';
                        pn11 = '出生时间';
                        pn12 = '目前所属职业';          
                        pn13 = '已阅读以上说明';                  

                    }else if(langx=='en'){
                        rq = ' is a required field';
                        pn1 = 'Full Name';
                        pn2 = 'Name on Certificate';
                        pn3 = 'Have you taken a SATA course';
                        pn4 = 'Experiences of Astrology Learning';
                        pn5 = 'Gender';
                        pn6 = 'Wechat ID';
                        pn7 = 'Line ID';
                        pn8 = 'Place of Birth';
                        pn9 = 'Place of Living';
                        pn10 = 'Date of Birth';
                        pn11 = 'Time of Birth';
                        pn12 = 'Occupation';    
                        pn13 = 'Have read the above instructions';                         
                    }else{
                        rq = ' 為必填欄位';
                        pn1 = '英文名/中文拼音';
                        pn2 = '證書登記名字';
                        pn3 = '是否參加過 SATA 課程';
                        pn4 = '你的占星程度';
                        pn5 = '性別';
                        pn6 = '微信 ID';
                        pn7 = 'Line ID';
                        pn8 = '出生地點';
                        pn9 = '目前居住地';
                        pn10 = '出生日期（陽曆)';
                        pn11 = '出生時間';
                        pn12 = '目前所屬職業';
                        pn13 = '已閱讀以上說明';     
                    }

                    let  sata_name = $("#sata_name").val();
                    if(!sata_name){                        
                        msg+='<li><strong>'+pn1+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    }


                    let  cert_name_type = $('input[name="cert_name_type"]:checked').val();
                    if(!cert_name_type){
                        msg+='<li><strong>'+pn2+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    }


                    let mb_type = $('input[name="mb_type[]"]:checked').val();
                    if(!mb_type){
                        msg+='<li><strong>'+pn3+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    }

                    let level = $('#level').val();
                    if(!level){
                        msg+='<li><strong>'+pn4+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    }


                    let  sata_sex = $('input[name="sata_sex"]:checked').val();
                    if(!sata_sex){
                        msg+='<li><strong>'+pn5+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    }


                    let  wechat_id = $('#wechat_id').val();
                    if(!wechat_id){
                        msg+='<li><strong>'+pn6+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    }      

                    let  line_id = $('#line_id').val();
                    if(!line_id){
                        msg+='<li><strong>'+pn7+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    }     

                    let  bcity = $('#bcity').val();
                    if(!bcity){
                        msg+='<li><strong>'+pn8+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    }                               


                    let  live_place = $('#live_place').val();
                    if(!live_place){
                        msg+='<li><strong>'+pn9+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    } 

                    let  bdate = $('#bdate').val();
                    if(!bdate){
                        msg+='<li><strong>'+pn10+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    } 
                    
                    let  btime = $('#btime').val();
                    if(!btime){
                        msg+='<li><strong>'+pn11+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    }

                    let  myjob = $('#myjob').val();
                    if(!myjob){
                        msg+='<li><strong>'+pn12+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    }


                    if(!$("#check_final:checked").val()){
                        msg+='<li><strong>'+pn13+'</strong> '+rq+'</li>';
                        errorchk.push('1');
                    }

                    // console.log($("#check_final:checked").val());
                    // console.log(mb_type);



                   // console.log(errorchk.length);

                    $("#checkout-wrapper > form .woocommerce-NoticeGroup").remove();
                    let tpl = '<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-checkout"><ul class="woocommerce-error" role="alert">'+msg+'</ul></div>';
                    $("#checkout-wrapper > form").prepend(tpl);

                    if(!errorchk.length){
                        $("#checkout-wrapper > form .woocommerce-NoticeGroup").remove();
                        $("#form_actions .block123").remove();
                        $('input[name="checkout_next_step"]').trigger('click');
                    }else{ /* 有錯誤 */

                            window.scrollTo({
                            top: 0,
                            left: 0,
                            behavior: 'smooth'
                            });
                    }
                });
            };

      


        });
       })(jQuery);
   </script>
<?php if(ICL_LANGUAGE_CODE=='zh-hans'){  /* 簡體中文 */  ?>
    
   <div id="sata_member">
        <h3>SATA 会员资料</h3>

        <div class="input_field">
            <label for="sata_name">
                <span class="reqx">*</span>英文名/中文拼音：
                <input type="text" id="sata_name"  name="sata_name"  value="<?php echo $sata_name; ?>" />
            </label>
        </div>

       <div class="input_field">
            <label for="" class="head"><span class="reqx">*</span>证书登记名字</label>
            <label for="tp1">
                <input type="radio" name="cert_name_type" id="tp1"  value="n1" <?php if($cert_name_type=='n1'){ echo 'checked';}  ?> > 中文名(繁體)
            </label>
            <label for="tp2">
                <input type="radio" name="cert_name_type" id="tp2" value="n2" <?php if($cert_name_type=='n2'){ echo 'checked';}  ?> > 中文名(简体) 
            </label>
            <label for="tp3">
                <input type="radio" name="cert_name_type" id="tp3" value="n3"  <?php if($cert_name_type=='n3'){ echo 'checked';}  ?> > 英文名
            </label>
            <label for="tp4">
                <input type="radio" name="cert_name_type" id="tp4" value="n4"  <?php if($cert_name_type=='n4'){ echo 'checked';}  ?> > 中文拼音
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



        <div class="input_field">
            <label for="" class="head"><span class="reqx">*</span>是否参加过SATA课程</label>&nbsp;
            <label for="mp1">
                <input type="checkbox"  id="mp1"   name="mb_type[]" value="m1"  <?php if(in_array('m1',$mb_type)){ echo 'checked'; } ?> >非学员             
            </label>
            <label for="mp2">
                <input type="checkbox" id="mp2"  name="mb_type[]" value="m2"  <?php if(in_array('m2',$mb_type)){ echo 'checked'; } ?>  >SATA核心课程学员 
            </label>
            <label for="mp3">
                <input type="checkbox" id="mp3"  name="mb_type[]" value="m3"  <?php if(in_array('m3',$mb_type)){ echo 'checked'; } ?>  >SATA工作坊学员 
            </label>
        </div>


        
        <div class="input_field">
            <label for="" class="head"><span class="reqx">*</span>你的占星程度</label>
            <p class="helper">（现占&古占？ 占星小白&占星老司机？ 学过几年…等等)</p>
            <textarea name="level" id="level" cols="30" rows="10" ><?php  echo $level; ?></textarea>
        </div>   
        
        
        <div class="input_field">
            <label for="" class="head"><span class="reqx">*</span>性別</label>
            <label for="sex1">
                <input type="radio" name="sata_sex" id="sex1" value="male"  <?php if($sata_sex=='male'){ echo 'checked'; } ?> > 男
            </label>

            <label for="sex2">
                <input type="radio" name="sata_sex" id="sex2" value="female"  <?php if($sata_sex=='female'){ echo 'checked'; } ?> > 女
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
        <span class="reqx">*</span>出生时间（课程需要，如实填写）： <span class="helper">(精确到分，例如19：45)</span><br/>

        <input id="btime"  name="btime" class="input-element" placeholder="hh:mm" type="tel" value="<?php  echo $btime; ?>">  
        <!--
        <input type="text" id="btime"  name="btime" style="ime-mode:disabled"  data-timepicker  value="<?php // echo $btime; ?>"  class="newline" />
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
        <span class="reqx">*</span>目前所属职业<br/>
            <input type="text" id="myjob"  name="myjob" class="newline" value="<?php  echo $myjob; ?>" />
        </label>
        </div>



        <div class="input_field">
        <label for="recommender">
        推荐人（如有，请填写）<br/>
            <input type="text" id="recommender"  name="recommender" class="newline"  value="<?php  echo $recommender; ?>"/>
        </label>
        </div>     


        <h4>参与课程的学员将视为同意以下报名条款：</h4>
        <ul>
            <li>
            <b>我（此处指报名课程的学员）愿意加入星空凝视古典占星学院（以下简称[SATA]）学员并愿意遵守以下所写的条款：</b><br/>
            【一】本人同意接收SATA所发布的学习、活动等相关信息及通知。<br/>
            【二】愿意提供个人出生时间制作星盘，而个人资料仅供课程使用，并且对于"与会学员"彼此的资料保密。 课程中禁止私自录影。<br/>
            【三】凡SATA于课程中所提供之各类信息及内容，包括文字、影音、图形、资料编辑、书籍、讲义、课程内容、课程录音及课程大纲等，均受当地著作权及其他相关知识产权之保护，未经SATA合法授权，不得以任何方式抄袭、重制、改作、散布、发行、公开发表、公开口述、公开传输、公开播送或为其他不合法之利用。 若发现有违反侵害SATA之著作权及其他相关知识产权的规范，SATA将依法追究，并请求法律上之救济（相关赔偿责任等）。 声明：SATA学院拥有所有课程调整与变动以及决定学员名单之最终修改之权利。 我们期许大家的热情参与共同努力，为大家营造一个联谊、互助并促进交流的和谐环境。<br/>
            </li>
        </ul>

        
        <div class="input_field">
            <label for="check_final">
                <input type="checkbox" id="check_final"  name="check_final" class="newline"  value="1"/> 已阅读以上说明
            </label>
        </div>
    </div><!-- sata_member -->
    <?php }else if(ICL_LANGUAGE_CODE=='en'){  ?>
            <div id="sata_member">
                    <h3>SATA Member Information：</h3>

                    <div class="input_field">
                        <label for="sata_name">
                            <span class="reqx">*</span>Full Name:
                            <input type="text" id="sata_name"  name="sata_name"  value="<?php echo $sata_name; ?>" />
                        </label>
                    </div>

                <div class="input_field">
                        <label for="" class="head"><span class="reqx">*</span>Name on Certificate:</label>
                        <label for="tp1">
                            <input type="radio" name="cert_name_type" id="tp1"  value="n1" <?php if($cert_name_type=='n1'){ echo 'checked';}  ?> > Chinese Name (Traditional)
                        </label>
                        <label for="tp2">
                            <input type="radio" name="cert_name_type" id="tp2" value="n2" <?php if($cert_name_type=='n2'){ echo 'checked';}  ?> > Chinese Name (Simplied)
                        </label>
                        <label for="tp3">
                            <input type="radio" name="cert_name_type" id="tp3" value="n3"  <?php if($cert_name_type=='n3'){ echo 'checked';}  ?> > English Name
                        </label>
                        <label for="tp4">
                            <input type="radio" name="cert_name_type" id="tp4" value="n4"  <?php if($cert_name_type=='n4'){ echo 'checked';}  ?> > Chinese by English spelling
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



                    <div class="input_field">
                        <label for="" class="head"><span class="reqx">*</span>Have you taken a SATA course?</label>&nbsp;
                        <label for="mp1">
                            <input type="checkbox"  id="mp1"   name="mb_type[]" value="m1"  <?php if(in_array('m1',$mb_type)){ echo 'checked'; } ?> >Non-member 
                        </label>
                        <label for="mp2">
                            <input type="checkbox" id="mp2"  name="mb_type[]" value="m2"  <?php if(in_array('m2',$mb_type)){ echo 'checked'; } ?>  >SATA’s Core Course 
                        </label>
                        <label for="mp3">
                            <input type="checkbox" id="mp3"  name="mb_type[]" value="m3"  <?php if(in_array('m3',$mb_type)){ echo 'checked'; } ?>  >SATA’s Core workshops 
                        </label>
                    </div>


                    
                    <div class="input_field">
                        <label for="" class="head"><span class="reqx">*</span>Experiences of Astrology Learning:</label>
                        <p class="helper">(Traditional or Modern Astrology? Beginner or intermediate level? Years of learning?)</p>
                        <textarea name="level" id="level" cols="30" rows="10" ><?php  echo $level; ?></textarea>
                    </div>   
                    
                    
                    <div class="input_field">
                        <label for="" class="head"><span class="reqx">*</span>Gender</label>
                        <label for="sex1">
                            <input type="radio" name="sata_sex" id="sex1" value="male"  <?php if($sata_sex=='male'){ echo 'checked'; } ?> > Male
                        </label>

                        <label for="sex2">
                            <input type="radio" name="sata_sex" id="sex2" value="female"  <?php if($sata_sex=='female'){ echo 'checked'; } ?> > Female
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


                    <h4>Participants participating in the course will be deemed to agree to the following terms of enrolment:</h4>
                    <ul>
                        <li>
                        <b>I (here refers to the student who signed up for the course) would like to join the Skygaze Academy of Traditional Astrology (hereinafter referred to as SATA) and abide by the terms written below:</b><br/>
                        [1] I agree to receive relevant information and notices such as learning information and activities published by SATA.<br/>
                        [2] I am willing to provide the personal birth time for SATA to make the natal chart, and the personal information is only used for the course, and the information of the "participating students" will be kept confidential. Private video recording is prohibited during the course.<br/>
                        [3] All kinds of information and content provided by SATA in the course, including text, video, graphics, data editing, books, handouts, course content, course recordings and course outlines, etc., are subject to local copyrights and other related intellectual property rights. Without the legal authorization of SATA, no plagiarism, reproduction, modification, distribution, publication, dictation, transmission, broadcast in public or other illegal use are allowed in any way. If it is found that there is a violation of SATA's copyright and other related intellectual property rights, SATA will investigate according to law and request legal relief (related compensation liability, etc.).<br/>
                        </li>
                        <li>
                            <b>Statement: SATA reserves the right to adjust and change all courses and decide the final revision of the student list.</b><br/>
                            We look forward to your enthusiastic participation and joint efforts to create a harmonious environment for you to link with each other, and promote knowledge exchange.
                        </li>
                    </ul>

                    
                    <div class="input_field">
                        <label for="check_final">
                            <input type="checkbox" id="check_final"  name="check_final" class="newline"  value="1"/> Have read the above instructions
                        </label>
                    </div>
                </div><!-- sata_member -->
<?php }else{ ?>    
                <div id="sata_member">
                    <h3>SATA 會員相關資料</h3>

                    <div class="input_field">
                        <label for="sata_name">
                            <span class="reqx">*</span>英文名/中文拼音：
                            <input type="text" id="sata_name"  name="sata_name"  value="<?php echo $sata_name; ?>" />
                        </label>
                    </div>

                <div class="input_field">
                        <label for="" class="head"><span class="reqx">*</span>證書登記名字</label>
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



                    <div class="input_field">
                        <label for="" class="head"><span class="reqx">*</span>是否參加過 SATA 課程</label>&nbsp;
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
                        <label for="" class="head"><span class="reqx">*</span>你的占星程度</label>
                        <p class="helper">(現占＆古占？占星小白＆占星老司機？學過幾年…等等)</p>
                        <textarea name="level" id="level" cols="30" rows="10" ><?php  echo $level; ?></textarea>
                    </div>   
                    
                    
                    <div class="input_field">
                        <label for="" class="head"><span class="reqx">*</span>性別</label>
                        <label for="sex1">
                            <input type="radio" name="sata_sex" id="sex1" value="male"  <?php if($sata_sex=='male'){ echo 'checked'; } ?> > 男
                        </label>

                        <label for="sex2">
                            <input type="radio" name="sata_sex" id="sex2" value="female"  <?php if($sata_sex=='female'){ echo 'checked'; } ?> > 女
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
                        <input type="text" id="btime"  name="btime"  onpaste="return false" ondragenter="return false" oncontextmenu="return false;"  style="ime-mode:disabled"   data-timepicker  value="<?php // echo $btime; ?>"  class="newline" />
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
                    <span class="reqx">*</span>目前所屬職業<br/>
                        <input type="text" id="myjob"  name="myjob" class="newline" value="<?php  echo $myjob; ?>" />
                    </label>
                    </div>



                    <div class="input_field">
                    <label for="recommender">
                    推薦人（如有，請填寫）<br/>
                        <input type="text" id="recommender"  name="recommender" class="newline"  value="<?php  echo $recommender; ?>"/>
                    </label>
                    </div>     


                    <h4>參與課程的學員將視為同意以下報名條款：</h4>
                    <ul>
                        <li>
                        <b>我（此處指報名課程的學員）願意加入星空凝視古典占星學院(以下簡稱［SATA］)學員並願意遵守以下所寫的條款：</b><br/>
                        【一】本人同意接收SATA所發佈的學習、活動等相關信息及通知。<br/>
                        【二】願意提供個人出生時間製作星盤，而個人資料僅供課程使用，並且對於"與會學員"彼此的資料保密。課程中禁止私自錄影。<br/>
                        【三】凡SATA於課程中所提供之各類資訊及內容，包括文字、影音、圖形、資料編輯、書籍、講義、課程內容、課程錄音及課程大綱等，均受當地著作權及其他相關智慧財產權之保護，未經SATA合法授權，不得以任何方式抄襲、重制、改作、散布、發行、公開發表、公開口述、公開傳輸、公開播送或為其他不合法之利用。若發現有違反侵害SATA之著作權及其他相關智慧財產權的規範，SATA將依法追究，並請求法律上之救濟(相關賠償責任等)。<br/>
                        </li>
                        <li>
                            <b>聲明：SATA學院擁有所有課程調整與變動以及決定學員名單之最終修改之權利。</b><br/>
                            我們期許大家的熱情參與共同努力，為大家營造一個聯誼、互助並促進交流的和諧環境。
                        </li>
                    </ul>

                    
                    <div class="input_field">
                        <label for="check_final">
                            <input type="checkbox" id="check_final"  name="check_final" class="newline"  value="1"/> 已閱讀以上說明
                        </label>
                    </div>
                </div><!-- sata_member -->
                <?php
         } 
     } 

/*  is_required */
add_action('woocommerce_checkout_process', function () {


    if(ICL_LANGUAGE_CODE=='zh-hans'){  /** 簡體中文 */

        if ( ! $_POST['sata_name'] )
        wc_add_notice( __( '<strong>英文名/中文拼音</strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['cert_name_type'] )
        wc_add_notice( __( '<strong>證書登記名字</strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['mb_type'] )
        wc_add_notice( __( '<strong>是否參加過 SATA 課程 </strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['level'] )
        wc_add_notice( __( '<strong>你的占星程度 </strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['sata_sex'] )
        wc_add_notice( __( '<strong>性別 </strong> 為必填欄位' ), 'error' );

        if(!$_POST['wechat_id'])
        wc_add_notice( __( '<strong>微信 ID </strong> 為必填欄位' ), 'error' );

        if(!$_POST['line_id'])
        wc_add_notice( __( '<strong>Line ID </strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['bcity'] )
        wc_add_notice( __( '<strong>出生地點 </strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['live_place'] )
        wc_add_notice( __( '<strong>目前居住地 </strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['bdate'] )
        wc_add_notice( __( '<strong>出生日期 </strong> 為必填欄位' ), 'error' );     

        if ( ! $_POST['myjob'] )
        wc_add_notice( __( '<strong>目前所屬職業 </strong> 為必填欄位' ), 'error' );     
        
        if ( ! $_POST['check_final'] )
        wc_add_notice( __( '請勾選 <strong>已閱讀報名條款說明 </strong> ' ), 'error' );

    }else if(ICL_LANGUAGE_CODE=='en'){     /**  英文 */

        if ( ! $_POST['sata_name'] )
        wc_add_notice( __( '<strong>Full Name</strong> is a required field.' ), 'error' );

        if ( ! $_POST['cert_name_type'] )
        wc_add_notice( __( '<strong>Name on Certificate</strong> is a required field.' ), 'error' );

        if ( ! $_POST['mb_type'] )
        wc_add_notice( __( '<strong>Have you taken a SATA course </strong> is a required field.' ), 'error' );

        if ( ! $_POST['level'] )
        wc_add_notice( __( '<strong>Experiences of Astrology Learning </strong> is a required field.' ), 'error' );

        if ( ! $_POST['sata_sex'] )
        wc_add_notice( __( '<strong>Gender </strong> is a required field.' ), 'error' );

        if(!$_POST['wechat_id'])
        wc_add_notice( __( '<strong>Wechat ID </strong> is a required field.' ), 'error' );

        if(!$_POST['line_id'])
        wc_add_notice( __( '<strong>Line ID </strong> is a required field.' ), 'error' );

        if ( ! $_POST['bcity'] )
        wc_add_notice( __( '<strong>Place of Birth </strong> is a required field.' ), 'error' );

        if ( ! $_POST['live_place'] )
        wc_add_notice( __( '<strong>Place of Living </strong> is a required field.' ), 'error' );

        if ( ! $_POST['bdate'] )
        wc_add_notice( __( '<strong>Date of Birth </strong> is a required field.' ), 'error' );     

        
        if ( ! $_POST['btime'] )
        wc_add_notice( __( '<strong>Time of Birth </strong> is a required field.' ), 'error' );    


        if ( ! $_POST['myjob'] )
        wc_add_notice( __( '<strong>Occupation </strong> is a required field.' ), 'error' );     
        
        if ( ! $_POST['check_final'] )
        wc_add_notice( __( '<strong>Have read the above instructions </strong> is a required field.' ), 'error' );

    }else{

        if ( ! $_POST['sata_name'] )
        wc_add_notice( __( '<strong>英文名/中文拼音</strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['cert_name_type'] )
        wc_add_notice( __( '<strong>證書登記名字</strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['mb_type'] )
        wc_add_notice( __( '<strong>是否參加過 SATA 課程 </strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['level'] )
        wc_add_notice( __( '<strong>你的占星程度 </strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['sata_sex'] )
        wc_add_notice( __( '<strong>性別 </strong> 為必填欄位' ), 'error' );

        if(!$_POST['wechat_id'])
        wc_add_notice( __( '<strong>微信 ID </strong> 為必填欄位' ), 'error' );

        if(!$_POST['line_id'])
        wc_add_notice( __( '<strong>Line ID </strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['bcity'] )
        wc_add_notice( __( '<strong>出生地點 </strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['live_place'] )
        wc_add_notice( __( '<strong>目前居住地 </strong> 為必填欄位' ), 'error' );

        if ( ! $_POST['bdate'] )
        wc_add_notice( __( '<strong>出生日期 </strong> 為必填欄位' ), 'error' );     

        if ( ! $_POST['myjob'] )
        wc_add_notice( __( '<strong>目前所屬職業 </strong> 為必填欄位' ), 'error' );     
        
        if ( ! $_POST['check_final'] )
        wc_add_notice( __( '請勾選 <strong>已閱讀報名條款說明 </strong> ' ), 'error' );

    }
 } );

/*  save */
add_action( 'woocommerce_checkout_update_order_meta', function ( $order_id ) {

    $order = wc_get_order( $order_id );
    $user_id = $order->get_user_id();

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
 });




