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
    min-height:100%!important;
    margin:0;
    background:
      radial-gradient(circle at top left, rgba(125, 211, 252, .55) 0, rgba(125, 211, 252, 0) 34%),
      radial-gradient(circle at bottom right, rgba(191, 219, 254, .7) 0, rgba(191, 219, 254, 0) 36%),
      linear-gradient(135deg, #e0f2fe 0%, #f8fbff 48%, #ffffff 100%);
    background-attachment: fixed;
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

  .panel.panel-default {
    border: 0;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 18px 45px rgba(0,0,0,.22);
  }
  .panel-heading {
    border-bottom: 1px solid #eef2f7;
  }
  .login-alert {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    text-align: left;
    margin: 0 0 16px 0;
    padding: 14px 15px;
    border-radius: 14px;
    border: 1px solid transparent;
    box-shadow: 0 10px 25px rgba(15,23,42,.08);
    animation: loginAlertIn .28s ease-out;
  }
  .login-alert-icon {
    width: 36px;
    height: 36px;
    min-width: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    margin-top: 1px;
  }
  .login-alert-content strong {
    display: block;
    font-size: 14px;
    line-height: 1.35;
    margin-bottom: 3px;
  }
  .login-alert-content p {
    margin: 0;
    font-size: 12px;
    line-height: 1.45;
    color: #1e293b;
  }
  .login-alert-content ul {
    margin: 7px 0 0 16px;
    padding: 0;
    color: #334155;
    font-size: 12px;
    line-height: 1.5;
  }
  .login-alert-danger {
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    border-color: #fecaca;
  }
  .login-alert-danger .login-alert-icon {
    background: linear-gradient(135deg, #ef4444, #b91c1c);
  }
  .login-alert-danger strong { color: #991b1b; }
  .login-alert-warning {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border-color: #fde68a;
  }
  .login-alert-warning .login-alert-icon {
    background: linear-gradient(135deg, #f59e0b, #d97706);
  }
  .login-alert-warning strong { color: #92400e; }
  .panel-body .alert-danger {
    text-align: left;
    border-radius: 14px;
    border-color: #fecaca;
    background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
    color: #991b1b;
    box-shadow: 0 10px 25px rgba(15,23,42,.08);
  }
  @keyframes loginAlertIn {
    from { opacity: 0; transform: translateY(-6px); }
    to { opacity: 1; transform: translateY(0); }
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
	    <form class="form-horizontal" method='post' action='<?php echo base_url();?>privileges/user_authentication/dologin'>			    	<?php
						if (isset($error_message)) {
							echo $error_message;
						} else {
							echo validation_errors();
						}
					?>
		    <div class="form-group">
    			<div class="col-sm-12">
    				<div class="input-group">
						<input type='hidden' name='doLogin' id='doLogin' value='doLogin'/>
						<div class="input-group-addon"><i class='fa fa-user fa-fw'></i></div>
			    		<input type="text" class="form-control" placeholder="Masukkan Username / Email" id="username" name="username">
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
