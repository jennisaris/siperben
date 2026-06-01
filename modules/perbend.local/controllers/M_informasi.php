<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//phpword
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class M_informasi extends MX_Controller {
  var $prefix = 'app';
  var $table;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/m_informasi";
		$this->table  = $this->prefix."_m_informasi"; 

    $this->_setTitle('Informasi');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		$this->_addField($this->table, 'title', 'Judul', true);
		$this->_addField($this->table, 'isi', 'Isi', true);
		$this->_addField($this->table, 'lampiran', 'Lampiran', false);
		$this->_addField($this->table, 'type', 'vtype', false, true);
		$this->_addField($this->table, 'mulai', 'Tgl. Tayang', false);
		$this->_addField($this->table, 'selesai', 'Sampai dengan', false);
		$this->_addField($this->table, 'deleted', 'Status Record', true);
		
		$this->_add2ListField($this->table, 'title, isi, mulai, selesai, deleted');
		
		$this->_add2SearchField($this->table, 'title');

    $this->_changeType($this->table, 'deleted', 'combobox', $this->session->sysparam->ldeleted);
    $this->_changeType($this->table, 'mulai', 'date', 'd-m-Y');
    $this->_changeType($this->table, 'selesai', 'date', 'd-m-Y');
    
    $this->_setAlign($this->table, 'deleted', 'center');
    $this->_setAlign($this->table, 'mulai', 'center');
    $this->_setAlign($this->table, 'selesai', 'center');
    
		//clear session header_controller
		$this->session->unset_userdata('header_controller'); 
	}
	
	/*function insertBox_app_m_informasi_isi($name) {
	  $input = "<div style=''>";
	  
	  if (!empty($datas->app_m_informasi_vtype)) $checked= ' checked ';
	  else $checked = ' ';
	  
	  $input .= "<div>";
	  $input .= "<div style='align:left;'>";
	  $input .= "<input onchange='change_tipe(this);' {$checked} type='checkbox' name='{$name}_chk' class='{$name}_chk' id='{$name}' /> 
	  </div>";
	  $input .= "<div style='align:left;margin-top:-30px!important;margin-left:20px;'>
	  Upload File ? 
	  </div>";
	  $input .= "</div>";
	  
	  $input .= "<div id='div_txt' style='display:none;'>";
		$input .= "<textarea class='form-control {$name}' name='{$name}' id='{$name}'></textarea>";
		$input .="</div>";
		
	  $input .= "<div id='div_upload'>";
	  $input .= "<input type='file' name='{$name}' id='{$name}' class='form-control {$name}' />";
	  $input .= "</div>";
	  
		$input .="</div>";
		
		return $input;
	}*/

	function updateBox_app_m_informasi_isi($name, $value, $datas) {
		$input = "<textarea class='form-control {$name}' name='{$name}' id='{$name}'>{$value}</textarea>";
		return $input;
	}
	
	function insertBox_app_m_informasi_isi($name) {
		return $this->updateBox_app_m_informasi_isi($name, '', '');
	}
	
	function updateBox_app_m_informasi_lampiran($name, $value, $datas) {
	  $bfile = $value;
	  $vtype = $datas->app_m_informasi_type;
	  //onchange='readURL(this);' 
		$input = "<input type='file' class='form-control {$name}' name='{$name}' id='{$name}' accept='application/vnd.openxmlformats-officedocument.wordprocessingml.document' />";
		
		if ($value != NULL) {
			$input .= "<span data-toggle='modal' data-target='#myPreview' style='cursor:pointer;' class='label label-primary'>
						<b>Lampiran</b>
						</span>";

  		$input .= "<div class='modal fade' id='myPreview' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
  					<div class='modal-dialog' role='document' style='width:65%;'>
  						<div class='modal-content'>
  						<div class='modal-header'>
  							<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Lampiran </h4>
  						</div>
  						<div class='modal-body' id='modal-body'>
  							<div class='form-group'>
  								<div id='html_telusuri'>";
  
  		$vtype='application/pdf';$height='100%';$width='700';
  
  		//$input .= "<embed src='data:{$vtype};base64,{$bfile}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>";
  		$input .= "<iframe src='data:{$vtype};base64,{$bfile}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>PDF tidak bisa ditinjau</iframe>";
  
  
  		$input .= "</div>
  							</div>
  							<center>
  							<button type='button' class='btn btn-warning' 
  								onclick=\"$('#myPreview').modal('hide').appendTo('.div_app_m_informasi_lampiran');$('#{$this->router->class}_form-modal').css('overflow', 'scroll');\">
  										Tutup</button>
  						</center>
  						</div>
  					</div>
  				</div>
  			</div>";
		}
		
		return $input;
	}
	
	function insertBox_app_m_informasi_lampiran($name) {
		return '<p>-</p>';
	}
	
  function app_m_informasi_output() {
        $js = "<script type='text/javascript'>
                    $(document).ready(function() {
                    
                    $.fn.modal.Constructor.prototype.enforceFocus = function() {};

                    tinymce.remove();
                    tinymce.init({
                        selector: 'textarea#{$this->table}_isi',
                        plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable',
                        menubar: 'file edit view insert format tools table tc help',
                        toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview | a11ycheck ltr rtl',
                        height:800,
                        setup :
                        function(ed) {
                            ed.on('init', function()
                            {
                                    this.getDoc().body.style.fontSize = '12px';
                            });
                        }
                    });
                  });
                  
                  function change_tipe(dis) {
                    alert($(dis).is(':checked'));
                  }

				  /*function readURL(input) {
					let file = input.files[0];
					let ext = input.value.substring(input.value.lastIndexOf('.') + 1).toLowerCase();
					let reader = new FileReader();
					let id = $('#app_m_informasi_id').val();

					reader.onabort = function(e) {
						bootbox_alert('', '', 'Upload file dibatalkan', false, false);
					}

					if ( file && !['docx'].includes(ext) ) {
						bootbox_alert('', '', 'Tipe file tidak sesuai', false, false);
						return false;
					}

					reader.readAsDataURL(file);
				
					reader.onload = function() {
						let readURL_ = reader.result;
						$.post('".base_url()."perbend/m_informasi/generateURL', {readURL_:readURL_, id:id}, function(data) {
							if ( reader.readyState == 2 ) {
								if ( isloading==true ) $('#divLoading').removeClass('show');
							}
						});
					};

					reader.onloadstart = function(e) {
						if ( isloading==true ) $('#divLoading').addClass('show');
					};
				
					reader.onerror = function () {
						bootbox_alert('', '', 'There was an issue reading the file.' + reader.error, false, false);
					 };
				  }*/
                </script>
            ";

        return $js;
  }
  
  function after_insert_processor($id, $post) {

    $new_post = array();
		$new_post['created']   = date('Y-m-d H:i:s');
		$new_post['createdby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->table, $new_post);
		
	}

	public function after_update_processor($id, $post) {

		$new_post = array();
		$new_post['updated']   = date('Y-m-d H:i:s');
		$new_post['updatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->table, $new_post);
	}
    
  function before_insert_processor($post) {
    //print_r($_FILES);
    //exit;
      $files = $this->uploadfiles($_FILES['app_m_informasi_lampiran']);
  		if ( !empty($files->file) ) {
  			$post->app_m_informasi_lampiran = $files->file;
  			$post->app_m_informasi_type = $files->type;
  		}
  		
  		if ($post->app_m_informasi_mulai != '')
  		  $post->app_m_informasi_mulai = date('Y-m-d', strtotime($post->app_m_informasi_mulai));
  		if ($post->app_m_informasi_selesai != '')
  		$post->app_m_informasi_selesai = date('Y-m-d', strtotime($post->app_m_informasi_selesai));
  		
  		return $post;
  }
    
  function before_update_processor($id, $post, $oldpost){
      return $this->before_insert_processor($post);
  }

  function generateURL() {
	$post = (object)$_POST;
	$this->_create_file_from_base64('docx', $post);
  }

  function _create_file_from_base64($type='pdf', $post) {

		//ini_set('display_errors', 1);
		//error_reporting(E_ALL);

		$datax = explode(';',$post->readURL_);
		$datax2 = explode(',', $datax[1]);
		
		//create_file_from_base64_encode
		$b_type = $type;
		$p_type = 'pdf';
		$b_file = base64_decode($datax2[1]);

		$id = $post->id;


		$upload_path = $this->session->sysparam->upload_path[0];
		$new_path = $upload_path.'tmp';
		if ( !file_exists($new_path) ) { 
			mkdir($new_path);
			chmod($new_path, 0777);  //changed to add the zero
		}
		
		$file_name_docx = $id.'.'.$b_type;
		$output_file = realpath($new_path).'/'.$file_name_docx;
		
		if ( file_exists($output_file) ) unlink($output_file);
		$file = fopen($output_file, 'wb');
		fwrite($file, $b_file); 
		fclose($file);
		
		$tempLibreOfficeProfile = realpath($new_path);
		$convert_path = $this->session->sysparam->convert_home[0]; 
		$tempLibreOfficeProfile = realpath($new_path);
        $cmd = "sh \"".$convert_path."\" \"".$tempLibreOfficeProfile."\" \"".$file_name_docx."\"";
		//echo $cmd;
		exec($cmd);
		//exit;


		$file_name_pdf = $id.'.'.$p_type;
		$output_file_pdf = realpath($new_path).'/'.$file_name_pdf; 

		//convert to pdf
		$file    = file_get_contents($output_file_pdf);
		$escaped = base64_encode($file);

		//unlink($output_file);
		//unlink($output_file_pdf);

		$data = [
			'lampiran' => $datax2[1],
			'lampiran_pdf' => $escaped,
			'type' => 'application/pdf'
		];

		$where = [
			'id' => $id
		];

		$this->db->where($where);
		$this->db->update($this->table, $data);
	}

}