<?php
$CI =&get_instance();
$sysparam = (object)$CI->session->sysparam;
?>
<!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <?=$sysparam->nama_app[0];?>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?=date('Y');?> <a href="#"><?=$sysparam->nama_app[0];?></a>.</strong> All rights reserved.
    <input type='hidden' 
         name='session_header_controller' 
         class='form-control session_header_controller' 
         id='session_header_controller' 
         value = '<?=$CI->session->header_controller;?>'/>
  </footer>

