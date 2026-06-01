<?php
$CI =&get_instance();
?>
<!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <?=$CI->config->item('nama_app');?>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?=date('Y');?> <a href="#"><?=$CI->config->item('nama_app');?></a>.</strong> All rights reserved.
    <input type='hidden' 
         name='session_header_controller' 
         class='form-control session_header_controller' 
         id='session_header_controller' 
         value = '<?=$CI->session->header_controller;?>'/>
  </footer>
