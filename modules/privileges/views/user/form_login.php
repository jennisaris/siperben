<?php
$_CI =&get_instance();
$sysparam = array();
$rs_sysparam = $_CI->db->query("SELECT ckode, visi from sysparam 
where ldeleted=0")->result();
foreach($rs_sysparam as $rs) {
	$sysparam[trim($rs->ckode)] = (array)(json_decode("[".str_replace('""', '', trim($rs->visi))."]"));
}
$sysparam = (object)$sysparam;
//print_r($sysparam);
//$nosert = $sysparam->nosertifikat[0];
//echo $nosert->{2};
//exit;
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perbendaharaan</title> <!-- Title ini akan muncul di tab browser -->
</head>
<style type="text/css">
  body,html {
    height:100%!important;
    margin:0;
    background-image:url('<?=base_url();?>assets/images/bg23.jpg');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
  .form-signin {
    max-width: 300px;
    padding: 19px 29px 29px;
    margin: 0 auto 20px;
    background-color: #fff;
    border: 1px solid #e5e5e5;
    -webkit-border-radius: 5px;
       -moz-border-radius: 5px;
            border-radius: 5px;
    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
       -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
  }
  .form-signin .form-signin-heading,
  .form-signin .checkbox {
    margin-bottom: 10px;
  }
  .form-signin input[type="text"],
  .form-signin input[type="password"] {
    font-size: 12px!important;
    font-family:Verdana!important;
    height: auto!important;
    margin-bottom: 15px;
    padding: 7px 9px;
  }
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
  		<br/><br/><br/><br/>
  	</div>
  	<div class="col-md-8 col-md-offset-2">
  		<br/><br/><br/>
  	</div>
   <div class="col-md-4 col-md-offset-4">
   	<div class="panel panel-default">
	  <div class="panel-heading" style='background-color:#fff;'>
	     <center>
         <img src='<?=base_url();?>assets/images/logo_dikbud.png' height='120' />
       </center>
       <br/>
	    <h3 class="panel-title">
	    	<b><?=$sysparam->nama_pt[0];?></b>
	    </h3>
	  </div>
	  <div class="panel-body">
	    <form class="form-horizontal" method='post' action='<?php echo base_url();?>privileges/user_authentication/dologin'>
		    	<?php
					if (isset($error_message)) {
						echo $error_message;
					}		
					echo validation_errors();	
				?>
		    <div class="form-group">
    			<div class="col-sm-12">
    				<div class="input-group">
						<input type='hidden' name='doLogin' id='doLogin' value='doLogin'/>
						<div class="input-group-addon"><i class='fa fa-user fa-fw'></i></div>
			    		<input type="text" class="form-control" placeholder="Masukkan Username" id="username" name="username">
			    	</div>
		    	</div>
		    </div>
		    <div class='form-group'>
		    	<div class="col-sm-12">
		    		<div class="input-group">		    		
			    		<div class="input-group-addon"><i class='fa fa-key fa-fw'></i></div>
			    		<input type="password" class="form-control" placeholder="Masukkan Kata Sandi" id="password" name="password">
		    		</div>
		    	</div>
		   	</div>
			   <div class='form-group'>
		    	<div class="col-sm-12">
		    		<div class="input-group">
						<?php echo $cap;?>
		    		</div>
		    	</div>
		   	</div>

			   <div class='form-group'>
		    	<div class="col-sm-12">
		    		<div class="input-group">		    		
			    		<div class="input-group-addon"><i class='fa fa-key fa-fw'></i></div>
			    		<input type="captcha" class="form-control" placeholder="Masukkan Kode Captcha" id="captcha" name="captcha" title='Kode Captcha'/>
		    		</div>
		    	</div>
		   	</div>
		   	<div class="form-group">
    			<div class="col-sm-offset-0 col-sm-12">
				    <button class="btn btn-md btn-info btn-block" type="submit" id="signin">				    	
				    	<span>Masuk</span>
				    </button>
				  </div>
				  
				  <div class="col-sm-offset-0 col-sm-12" style='text-align:left;margin-top:5px;'>
				    <span ostyle="cursor:pointer;color:#34bdeb">Jika Lupa Kata Sandi Silakan Klik Tautan
				      <a href='<?=base_url();?>nologin/reset_password' target='_blank' rel='noopener noreferrer' >
				         Lupa Kata Sandi
				      </a>
				    </span>
				</div> 
				</div>
			</div>
			<!--<div class="col-sm-offset-0 col-sm-12"> 
				<center>
					<span id='network_status'>Status</span>
				</center>
			</div>-->
	    </form>
	    </div>
	  </div>
	</div>
   </div>
  </div>
  </div>
  </div>
</div>
