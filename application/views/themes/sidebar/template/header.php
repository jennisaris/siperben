<style>
	 #headerku img {
        float: left;
        width: 100px;
    }
    #headerku h1 {
        position: relative;
        color: white;
        font-size: 18px;
        margin: 0 0 0 80px;
        padding-top: 5px;
    }    
    #headerku h1 small {
        color: white;
        font-size: 14px;
    }
    
    .dropdown-submenu {
	    position: relative;
	}
	
	.dropdown-submenu > .dropdown-menu {
	    top: 0;
	    left: 100%;
	    margin-top: -5px;
	    margin-left: -1px;
	    -webkit-border-radius: 0 6px 6px 6px;
	    -moz-border-radius: 0 6px 6px;
	    border-radius: 0 6px 6px 6px;
	}
	
	.dropdown-submenu:hover > .dropdown-menu {
	    display: block;
	}
	
	.dropdown-submenu > a:after {
	    display: block;
	    content: " ";
	    float: right;
	    width: 0;
	    height: 0;
	    border-color: transparent;
	    border-style: solid;
	    border-width: 5px 0 5px 5px;
	    border-left-color: #ccc;
	    margin-top: 5px;
	    margin-right: -10px;
	}
	
	.dropdown-submenu:hover > a:after {
	    border-left-color: #fff;
	}
	
	.dropdown-submenu.pull-left {
	    float: none;
	}
	
	.dropdown-submenu.pull-left > .dropdown-menu {
	    left: -100%;
	    margin-left: 10px;
	    -webkit-border-radius: 6px 0 6px 6px;
	    -moz-border-radius: 6px 0 6px 6px;
	    border-radius: 6px 0 6px 6px;
	}
	
	/* FLOATING MENU */
	.floating-menu-kanan {
		font-family: sans-serif;
		font-size: 20px;
		background: #FFFFFF;
		padding: 1px;
		width: auto;
		z-index: 999;
		position: fixed;
		bottom: 0;
		right: 0;
	}
	
	.floating-menu-kanan a, 
	.floating-menu-kanan h3 {
		font-size: 0.9em;
		display: block;
		margin: 0 0.5em;
		color: white;
	}
	
	.floating-menu-kiri {
		font-family: sans-serif;
		font-size: 12px;
		background: #FFFFFF;
		padding: 1px;
		width: auto;
		z-index: 999;
		position: fixed;
		bottom: 0;
		left: 0;
	}
	
	.floating-menu-kiri span, 
	.floating-menu-kiri h3 {
		font-size: 0.9em;
		display: block;
		margin: 0 0.5em;
		color: white;
	}
	
	.main {
	  /*padding: 10px;*/
	}
	@media (min-width: 768px) {
	  .main {
	    padding-right: 40px;
	    padding-left: 10px;
	  }
	}
	.main {
	  margin-top: 0px;
	}
	
	/*
	 * Sidebar
	 */
	
	/* Hide for mobile, show later */
	.sidebar {
	  display: none;
	}
	@media (min-width: 768px) {
	  .sidebar {
	    position: absolute;
	    top: 90px;
	    bottom: 65px;
	    left: 0;
	    z-index: 1000;
	    display: block;
	    padding: 20px;
	    overflow-x: hidden;
	    overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
	    background-color: #f5f5f5;
	    border-right: 1px solid #eee;
	  }
	}
	
	.footer {
		background-color: #f5f5f5;
		position:fixed;
		bottom: 0;
		width:100%;
		left: 0;		
		/* Set the fixed height of the footer here */
		height: 60px;
	}
	
	/* END FLOATING MENU */
    </style>
<div class="navbar topnav" style="z-index:1;">	
	<nav class="navbar navbar-inverse topnav">
 		<div class="container-fluid" style='background-color:#3498DB;padding: 10px 20px 10px 40px;'>
    		<div id="headerku" class="navbar-header">   
      		 <img  class="img-responsive" src="<?php echo $_theme;?>template/assets/images/logo_tutwuri.png" style="width: 60px; margin: 0 auto;"/>
      		 <h1><?php echo strtoupper("Sistem Informasi Penyelesaian Dokumen");?> <br/>
      		 	<small>BIRO KEPEGAWAIAN SEKRETARIAT JENDERAL </small><br/>
      		 	<small>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN REPUBLIK INDONESIA</small>
      		 </h1>    			
    		</div>
    	</div>		