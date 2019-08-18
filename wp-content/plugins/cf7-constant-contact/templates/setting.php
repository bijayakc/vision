<?php
  if ( ! defined( 'ABSPATH' ) ) {
     exit;
 }
 $self_dir=admin_url().'?'.$this->id.'_tab_action=get_code';
  ?><div class="crm_fields_table">
    <div class="crm_field">
  <div class="crm_field_cell1"><label for="vx_name"><?php _e("Account Name",'contact-form-ccontact-crm'); ?></label>
  </div>
  <div class="crm_field_cell2">
  <input type="text" name="crm[name]" value="<?php echo !empty($name) ? $name : 'Account #'.$id; ?>" id="vx_name" class="crm_text">

  </div>
  <div class="clear"></div>
  </div>

<div class="crm_field">
  <div class="crm_field_cell1"><label for="app_id"><?php _e("API Key",'contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2">
     <div class="vx_tr">
  <div class="vx_td">
  <input type="password" id="app_id" name="crm[app_id]" class="crm_text" placeholder="<?php _e("API Key",'contact-form-ccontact-crm'); ?>" value="<?php echo esc_html($this->post('app_id',$info)); ?>">
  </div><div class="vx_td2">
  <a href="#" class="button vx_toggle_btn vx_toggle_key" title="<?php _e('Toggle Consumer Key','contact-form-ccontact-crm'); ?>"><?php _e('Show Key','contact-form-ccontact-crm') ?></a>
  
  </div></div> 
  <div class="howto">
  <ol>
  <li><?php echo sprintf(__('Create New Application %shere%s','contact-form-ccontact-crm'),'<a href="https://app.constantcontact.com/pages/dma/portal/" target="_blank">','</a>'); ?></li>
  <li><?php _e('Enter Application Name(eg. My App)','contact-form-ccontact-crm'); ?></li>
  <li><?php echo sprintf(__('Enter %s in Redirect URI','contact-form-ccontact-crm'),'<code>'.$self_dir.'</code>'); ?>
  </li>
<li><?php _e('Save Application','contact-form-ccontact-crm'); ?></li>
<li><?php echo __('Generate secret and copy it','contact-form-ccontact-crm'); ?></li>
   </ol>
   

  </div>
</div>
  <div class="clear"></div>
  </div>
<div class="crm_field">
  <div class="crm_field_cell1"><label for="app_secret"><?php _e("Secret",'contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2">
       <div class="vx_tr" >
  <div class="vx_td">
 <input type="password" id="app_secret" name="crm[app_secret]" class="crm_text"  placeholder="<?php _e("Secret",'contact-form-ccontact-crm'); ?>" value="<?php echo esc_html($this->post('app_secret',$info)); ?>">
  </div><div class="vx_td2">
  <a href="#" class="button vx_toggle_btn vx_toggle_key" title="<?php _e('Toggle Consumer Secret','contact-form-ccontact-crm'); ?>"><?php _e('Show Key','contact-form-ccontact-crm') ?></a>
  
  </div></div>
  </div>
  <div class="clear"></div>
  </div>
<div class="crm_field">
  <div class="crm_field_cell1"><label for="app_url"><?php _e("Redirect URI",'contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2"><input type="text" id="app_url" name="crm[app_url]" class="crm_text" placeholder="<?php _e("Redirect URI",'contact-form-ccontact-crm'); ?>" value="<?php echo esc_html($this->post('app_url',$info)); ?>"> 

  </div>
  <div class="clear"></div>
  </div>
 <?php
 if(!empty($client['client_id'])){                   
                ?>               
  <div class="crm_field">
  <div class="crm_field_cell1"><label><?php _e('Constant Contact Access','contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2">
  <?php if(isset($info['access_token'])  && $info['access_token']!="") {
  ?>
  <div style="padding-bottom: 8px;" class="vx_green"><i class="fa fa-check"></i> <?php
  echo sprintf(__("Authorized Connection to %s on %s",'contact-form-ccontact-crm'),'<code>Constant Contact</code>',date('F d, Y h:i:s A',$info['_time']));
        ?></div>
  <?php
  }else{
  ?>
  <a class="button button-default button-hero sf_login" data-id="<?php echo esc_html($client['client_id']) ?>" href="https://api.cc.email/v3/idfed?scope=contact_data&response_type=code&state=<?php echo urlencode(str_replace('&','-__-',$link.'&'.$this->id."_tab_action=get_token&vx_action=redirect&id=".$id."&vx_nonce=".$nonce) );?>&client_id=<?php echo $client['client_id'] ?>&redirect_uri=<?php echo urlencode($client['call_back']) ?>"  title="<?php _e("Login with Constant Contact",'contact-form-ccontact-crm'); ?>" > <i class="fa fa-lock"></i> <?php _e("Login with Constant Contact",'contact-form-ccontact-crm'); ?></a>
  <?php
  }
  ?></div>
  <div class="clear"></div>
  </div>                  
    <?php if(isset($info['access_token'])  && $info['access_token']!="") {
  ?>
    <div class="crm_field">
  <div class="crm_field_cell1"><label><?php _e("Revoke Access",'contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2">  <a class="button button-secondary" id="vx_revoke" href="<?php echo $link."&".$this->id."_tab_action=get_token&vx_nonce=".$nonce.'&id='.$id?>"><i class="fa fa-unlock"></i> <?php _e("Revoke Access",'contact-form-ccontact-crm'); ?></a>
  </div>
  <div class="clear"></div>
  </div> 
<div class="crm_field">
  <div class="crm_field_cell1"><label><?php _e("Test Connection",'contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2">      <button type="submit" class="button button-secondary" name="vx_test_connection"><i class="fa fa-refresh"></i> <?php _e("Test Connection",'contact-form-ccontact-crm'); ?></button>
  </div>
  <div class="clear"></div>
  </div>
<?php
    }
 }   
?> 
         
  <div class="crm_field">
  <div class="crm_field_cell1"><label for="vx_error_email"><?php _e("Notify by Email on Errors",'contact-form-ccontact-crm'); ?></label></div>
  <div class="crm_field_cell2"><textarea name="crm[error_email]" id="vx_error_email" placeholder="<?php _e("Enter comma separated email addresses",'contact-form-ccontact-crm'); ?>" class="crm_text" style="height: 70px"><?php echo isset($info['error_email']) ? $info['error_email'] : ""; ?></textarea>
  <span class="howto"><?php _e("Enter comma separated email addresses. An email will be sent to these email addresses if an order is not properly added to Constant Contact. Leave blank to disable.",'contact-form-ccontact-crm'); ?></span>
  </div>
  <div class="clear"></div>
  </div>  
   
 
  <button type="submit" value="save" class="button-primary" title="<?php _e('Save Changes','contact-form-ccontact-crm'); ?>" name="save"><?php _e('Save Changes','contact-form-ccontact-crm'); ?></button>  
  </div>  