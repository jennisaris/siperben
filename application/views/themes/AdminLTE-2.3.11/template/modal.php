<?php
$CI =&get_instance();
?>
<!-- Modal -->
<div class="modal fade" id="myModal_confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style='width:50%'>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-envelope'></i> Informasi </h4>
      </div>
      <div class="modal-body" id='modal-body' style='overflow-x: auto;'>
    	<div class='form-group'>
    		<div id='modal-isi'></div>
    	</div>
    	
    	<div class="modal-footer">
	       <button type="button" class="btn btn-default" data-dismiss="modal">
	       	<i class="fa fa-close" aria-hidden="true"> </i>
	       	Tutup</button>
	    </div>
      </div>            
    </div>
  </div>
</div>