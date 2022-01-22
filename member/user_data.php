<?php 

add_action('show_user_profile', 'my_user_profile_edit_action');
add_action('edit_user_profile', 'my_user_profile_edit_action');
function my_user_profile_edit_action($user) {
  $checked = (isset($user->artwork_approved) && $user->artwork_approved) ? ' checked="checked"' : '';
?>

  

  <h3>Other</h3>
  <label for="artwork_approved">
    <input name="artwork_approved" type="checkbox" id="artwork_approved" value="1"<?php echo $checked; ?>>
    Artwork approved
  </label>
<?php 
}



add_action('personal_options_update', 'my_user_profile_update_action');
add_action('edit_user_profile_update', 'my_user_profile_update_action');
function my_user_profile_update_action($user_id) {
  update_user_meta($user_id, 'artwork_approved', isset($_POST['artwork_approved']));
}