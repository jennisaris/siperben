<div class="container-fluid" style='' id='<?php echo $md_name;?>'>
	<h3 style="margin-top: 0;">
        <div><i class='fa fa-exclamation-triangle'></i> <?=(!empty($title) ? $title : 'Halaman tidak ditemukan');?></div>                
    </h3>
    <hr>
    <div>
        <?php if(!empty($msg)) { ?>
        <?=$msg;?>
        <?php } else { ?>
        Mohon maaf. Halaman yang anda cari tidak ada atau anda tidak mempunyai hak untuk mengakses module ini.<br/>
    	Harap hubungi administrator anda. Terima kasih.
        <?php }?>
    </div>
</div>