<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			        <a data-parent="#accordion" href='<?php echo base_url();?>surat/masuk'>
			          Beranda
			        </a>
			      </h4>
			    </div>
			  </div>
			  
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingTwo">
			      <h4 class="panel-title">
			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          Hak Akses
			        </a>
			      </h4>
			    </div>
			    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			      <ul class="list-group">
			      	<li class='list-group-item'>Menu</li>
			      	<li class='list-group-item'>Group</li>
			      	<li class='list-group-item'>Pengguna</li>
			      </ul>
			    </div>
			  </div>
			  
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingThree">
			      <h4 class="panel-title">
			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			          Master
			        </a>
			      </h4>
			    </div>
			    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			      <ul class="list-group">
			      	<li class='list-group-item'>Disposisi</li>
			      	<div class="panel panel-default">
				    <div class="list-group-item" role="tab" id="headingTwo">
				      <h4 class="panel-title">
			      		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#collapseThree" href="#collapsex" aria-expanded="false" aria-controls="collapseThree">
			      			Kepegawaian
			      		</a>
			      	  </h4>
			      	</div>
		      		<div id="collapsex" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">			      	  
				      	<ul class="list-group collapse">			      	
					      	<li class='list-group-item'>Organisasi</li>
					      	<li class='list-group-item'>Pegawai</li>
				      	</ul>
				    </div>				      			      	
				    </li>
			      </ul>
			    </div>
			    
			  </div>			  
		  </div>
			 <?php /*
			 <ul id="" class="panel-heading">
                <li>
                    <a href="#">
                        <span class="sidebar-icon"><i class="fa fa-dashboard"></i></span>
                        <span class="sidebar-title">Beranda</span>
                    </a>
                </li>
                <li>
                    <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-2">
                        <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                        <span class="sidebar-title">Hak Akses</span>
                        <b class="caret"></b>
                    </a>
                    <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
                        <li><a href="#"><i class="fa fa-caret-right"></i>Hak Akses-1</a></li>
                        <li><a href="#"><i class="fa fa-caret-right"></i>Hak Akses-2</a></li>
                    </ul>
               </li>
               <li>
                    <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-3">
                        <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                        <span class="sidebar-title">Master</span>
                    </a>
                    <ul id="submenu-3" class="panel-collapse collapse panel-switch" role="menu">
                        <li>
                        	<a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-4"><i class="fa fa-caret-right"></i>Master-1</a>
                        	<ul id="submenu-4" class="panel-collapse collapse panel-switch" role="menu">
		                        <li>
		                        	<a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-7">Master-1-1</a>
		                        	<ul id="submenu-7" class="panel-collapse collapse panel-switch" role="menu">
				                        <li><a href="#"><i class="fa fa-caret-right"></i>Master-1-1-1</a></li>
				                        <li><a href="#"><i class="fa fa-caret-right"></i>Master-1-1-2</a></li>
				                        <li><a href="#"><i class="fa fa-caret-right"></i>Master-1-1-3</a></li>
				                        <li><a href="#"><i class="fa fa-caret-right"></i>Master-1-1-4</a></li>
				                    </ul>		                        	
		                        </li>
		                        <li><a href="#"><i class="fa fa-caret-right"></i>Master-1-2</a></li>
		                    </ul>
                        </li>
                        <li>
                        	<a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-5"><i class="fa fa-caret-right"></i>Master-2</a>
                        	<ul id="submenu-5" class="panel-collapse collapse panel-switch" role="menu">
		                        <li>
		                        	<a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-6"><i class="fa fa-caret-right"></i>Master-2-1</a>
		                        	<ul id="submenu-6" class="panel-collapse collapse panel-switch" role="menu">
				                        <li>
				                        	<a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-9"><i class="fa fa-caret-right"></i>Master-2-1-1</a>
				                        	<ul id="submenu-9" class="panel-collapse collapse panel-switch" role="menu">
						                        <li><a href="#"><i class="fa fa-caret-right"></i>Master-2-1-1-1</a></li>
						                        <li><a href="#"><i class="fa fa-caret-right"></i>Master-2-1-1-2</a></li>
						                        <li><a href="#"><i class="fa fa-caret-right"></i>Master-2-1-1-3</a></li>
						                        <li><a href="#"><i class="fa fa-caret-right"></i>Master-2-1-1-4</a></li>
						                    </ul>
			                        	</li>
				                        <li><a href="#"><i class="fa fa-caret-right"></i>Master-2-1-2</a></li>
				                    </ul>
		                        </li>
		                        <li><a href="#"><i class="fa fa-caret-right"></i>Master-2-2</a></li>
		                    </ul>
                        </li>
                    </ul>
               </li>
            </ul>		
		  * */
		?>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
