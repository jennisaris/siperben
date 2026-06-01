<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/** load the CI class for Modular Extensions **/
require dirname(__FILE__).'/Base.php';

/**
 * Modular Extensions - HMVC
 *
 * Adapted from the CodeIgniter Core Classes
 * @link	http://codeigniter.com
 *
 * Description:
 * This library replaces the CodeIgniter Controller class
 * and adds features allowing use of modules and the HMVC design pattern.
 *
 * Install this file as application/third_party/MX/Controller.php
 *
 * @copyright	Copyright (c) 2015 Wiredesignz
 * @version 	5.5
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/
class MX_Controller 
{
	public $autoload = array();
	
	//my library
	private $ar_is_user;
    private $limit;
    private $prefix;
    private $table;
    private $search_fields = array();
    //protected $dbex;
    private $order_by;
    private $group_by;
    private $list_fields = array();
    private $list_table  = array();
    private $table_list  = array();
    private $list        = array();
    private $table_relations = array();
    private $condition = array();
    private $kriteria = array();
    private $where = array();
    private $type_where = '';
    private $operand_where = '';
    private $offset = 0;
    private $controller;
    private $list_search = array();
    private $where_free=array();
    private $list_box_action = array();
    private $ar_menu_level = array(2=>'second', 3=>'third', 4=>'forth', 5=>'fifth', 6=>'sixth', 7=>'seventh', 8=>'eight', 9=>'ninth', 10=>'tenth');
    private $pk;
    private $orders;

    private $where_having = "";
    //private $where_is_primary_key = "";

    private $table_0;
    private $ismodal = false;
    private $frmodal = 'form-modal';

    private $list_box_align = array('center', 'top');
    
    public $title = " Data";
	
    private $index_form = '';
    private $search_form = '';
    private $list_form = '';
    private $view_form = '';
    private $paramku = array();
	private $foreignKey = '';
	//end my library
	
	public function __construct() 
	{

		$this->session->unset_userdata('isnewwindow');
		
		$class = str_replace(CI::$APP->config->item('controller_suffix'), '', get_class($this));
		log_message('debug', $class." MX_Controller Initialized");
		Modules::$registry[strtolower($class)] = $this;	
		
		/* copy a loader instance and initialize */
		$this->load = clone load_class('Loader');
		$this->load->initialize($this);	
		
		/* autoload module items */
		$this->load->_autoloader($this->autoload);
		
		/* my library */
		$this->load->library('security');
      	$this->ar_is_user = $this->config->item('is_user');
      	$this->limit = $this->config->item('limit');
      	$this->prefix = $this->config->item('dbprefix');
      	$this->order_by = [];
      	$this->group_by = [];
		$this->foreignKey = '';
		/*end mylibrary */
	}
	
	public function __get($class) 
	{
		return CI::$APP->$class;
	}
	
	/* my library */

	protected function _addTable($table, $foreignKey='') {
		$this->list_table[] = $this->db->dbprefix.$table;
		$this->pk[$table] = $this->db->dbprefix.$table.'.id';
		if ( $foreignKey != '') $this->foreignKey = $this->db->dbprefix.$table.'_'.$foreignKey;
	}
	
	protected function _addPrimaryKey($table, $field) { //, $where_is_primary_key='') {
		$this->pk[$table] = $this->db->dbprefix.$table.'.'.$field;
        //if ( $where_is_primary_key != '' ) $this->where_is_primary_key = $where_is_primary_key;
	}

	protected function _addField($table, $field, $alias='', $required=false, $hide=false, $free=false, $width=0, $align='left', $func='', $msg='Lengkapi Isian Anda', $iscontroller=false) {

		//if ( $hide == false ) {
			if ( $func != '' )
				$this->list_fields[$this->db->dbprefix.$table.'.'.$field][] = $func."(".$this->db->dbprefix.$table.".".$field.") as ".$this->db->dbprefix.str_replace('.', '_', $table)."_".$field;
			else $this->list_fields[$this->db->dbprefix.$table.'.'.$field][] = $this->db->dbprefix.str_replace('.', '_', $table).".".$field;

			if ( $alias!='' ) $this->list_fields[$this->db->dbprefix.$table.'.'.$field]['alias'] = $alias;
			else $this->list_fields[$this->db->dbprefix.$table.'.'.$field]['alias'] = '';//$field;
			$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['width'] = $width;
			$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['hide']  = $hide;
			$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['free']  = $free;
			$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['required']  = $required;
			$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['align']  = $align;
			$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['msg'] = $msg;
			$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['func'] = $func;
			$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['iscontroller'] = $iscontroller;
			$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['placeholder'] = $alias;

			if ( !$hide )			
				$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['type'] = 'text';
			else $this->list_fields[$this->db->dbprefix.$table.'.'.$field]['type'] = 'hidden';
		//}
	}

	protected function _setHTMLTemplate($search='', $list='', $view='', $index='') {
	  $this->search_form = $search;
	  $this->list_form = $list;
	  $this->view_form = $view;
	  $this->index_form = $index;
	}

	protected function _setParams($params) {
		$this->paramku = (object)$params;
	}
	
	protected function _setTitle($title='') {
		if ($title != '') $this->title=$title;
	}

	protected function _init($db='default') {
		if ( $db != 'default' ) $this->db = $db;
		
		//print_r($this-db);
		//exit;
		
	}

	protected function _addGroupBy($table, $fields) {
		$table = $this->db->dbprefix.$table;
		$fields = explode(',', $fields);
		foreach ($fields as $f) {
			$this->group_by[] = $table.'.'.$f;
		}
	}

	protected function _addOrderBy($table, $fields, $isfree=false) {
		//$this->order_by[$table] = $fields;
		$table = $this->db->dbprefix.$table;
		foreach ($fields as $f=>$g) {
			if ( !$isfree )
				$this->order_by[] = $table.'.'.$f.' '.$g;
			else $this->order_by[] = $f.' '.$g;	
		}
	}

	protected function _add2ListField($table, $fields) {
		//$this->list[$this->db->dbprefix.$table.'.no'] = 'No.';
		$a = explode(",", $fields);
		foreach($a as $v) {
			//if ($this->list_fields[$this->db->dbprefix.$table.'.'.trim($v)]['hide'] != true) $this->list[$this->db->dbprefix.$table.'.'.trim($v)] = trim($v);
			$this->list[$this->db->dbprefix.$table.'.'.trim($v)] = trim($v);
		}
	}

	protected function _add2SearchField($table, $fields, $isfree=false, $ishide=false, $isIncQ=true) {
		if ( $isfree == false ) {
			$a = explode(",", $fields);
			foreach($a as $v) {
				$tbl = trim($table);
				$fld = trim($v);
				// && $this->list_fields[trim($this->db->dbprefix.$tbl.'.'.$fld)]['hide'] != 1 
				if ( array_key_exists(trim($this->db->dbprefix.$tbl.'.'.$fld), $this->list_fields)) {
					$this->search_fields[$this->db->dbprefix.$tbl.'.'.$fld] = array(
						'table'=>$this->db->dbprefix.$tbl, 
						'isfree'=>$isfree, 'value'=>trim($v), 
						'ishide'=>$ishide, 
						'isinclq'=>$isIncQ,
						'label'=>$this->list_fields[$this->db->dbprefix.$tbl.'.'.$fld]['alias']);
				}
			}
		} else {
			$tbl = trim($table);
			// && $this->list_fields[trim($this->db->dbprefix.$tbl.'.'.$fld)]['hide'] != 1 
			//if ( array_key_exists(trim($this->db->dbprefix.$tbl.'.'.$fields), $this->list_fields) ) {
				$this->search_fields[trim($this->db->dbprefix.$tbl.'.'.$fields)] = array(
					'table'=>$this->db->dbprefix.$tbl, 
					'isfree'=>$isfree, 
					'value'=>trim($fields), 
					'ishide'=>$ishide, 
					'isinclq'=>$isIncQ,
					'label'=>$this->list_fields[$this->db->dbprefix.$tbl.'.'.$fields]['alias']);
			//}
		}
		//print_r($this->search_fields);
	}

	protected function _setModal($_ismodal=true, $_frmodal='form-modal') {
		$this->ismodal = $_ismodal;
		$this->frmodal = $_frmodal;
	}

	protected function _getsearch($params) {
		$dir = APPPATH.substr($this->router->directory, 3);
		$class = ucfirst($this->router->class);
		$method = $this->router->method;
		$cont = $dir.$class;
		require_once $cont.'.php';
		$con = new $class;

		//print_r($this->search_fields);
		//print_r($this->list_fields);
		//exit;
		$search = array();
		$totunhide = 0;
		if ( sizeOf($this->search_fields) > 0 ) {
			//$placeholder = 'Masukkan kriteria pencarian anda';
			foreach($this->search_fields as $k=>$s) {
				//echo $k.' => '.$s['isfree'].', ';
				$fld = str_replace(".", "_", trim($k));
				$fld_ = str_replace('"', '', $fld);
				if ( $s['ishide'] == true ) {
					$type = 'hidden';
				} else {
					$type = 'text';
					$totunhide++;
				}
				
				if ( !$s['isfree'] ) {
					//$placeholder = 'Masukkan '.$this->list_fields[trim($k)]['alias'];
					$placeholder = $this->list_fields[trim($k)]['alias'];
					//echo $placeholder.',';
					//echo $k.' => '.$this->list_fields[trim($k)]['alias'].', ';
					
					switch(trim($this->list_fields[trim($k)]['type'])) {
						case 'combobox' :
							$nilai = "<select 
								class='form-control q_".$fld_."'
								name='q_".$fld_."'
								id='q_".$fld_."'>";
							$nilai .= "<option value=''>ALL</option>";	
							foreach($this->list_fields[trim($k)]['values'] as $a=>$b) {
								$nilai .= "<option {$selected} value='{$a}'>{$b}</option>";
							}	
							
							$nilai .= "</select>";
							$nilai .= "<script type='text/javascript'>
										$('.q_{$fld_}').change(function() {
											reload_grid(\"".base_url().$this->router->fetch_module()."/".$this->router->class."/lists\", \"".strtolower($this->router->class)."\");
											$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();
										});
										$('.q_{$fld_}').select2();
									   </script>";

							break;
						case 'combobox2' :
							$nilai = "<select 
								class='form-control q_".$fld_."'
								name='q_".$fld_."'
								id='q_".$fld_."'>";
							$nilai .= "<option value=''>ALL</option>";	
							foreach($this->list_fields[trim($k)]['values'] as $a=>$b) {
								$nilai .= "<option {$selected} value='{$a}'>{$b}</option>";
							}	
							
							$nilai .= "</select>";
							$nilai .= "<script type='text/javascript'>
										$('.q_{$fld_}').change(function() {
											reload_grid(\"".base_url().$this->router->fetch_module()."/".$this->router->class."/lists\", \"".strtolower($this->router->class)."\");
											$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();
										});
										$('.q_{$fld_}').select2();
										</script>";

							break;
							
						case 'date':
							$nilai = "<input autocomplete='off' 
					            style=\"".$this->list_fields[$fld_]['styles']."\"							
								placeholder='".$placeholder."' 
								class='form-control q_".$fld_." datepicker' 
								type='text' name='q_".$fld_."' 
								id='q_".$fld_."'/>";
							$nilai .= "<script type='text/javascript'>
										$( '#q_".$fld_."' ).datepicker({
											dateFormat: 'dd-mm-yy',
											changeMonth: true,
									  		changeYear: true,
										});
								 	   </script>";
							break;
					    case 'time':
							$nilai = "<input autocomplete='off' 
					            style=\"".$this->list_fields[$fld_]['styles']."\"
								placeholder='".$placeholder."' 
								class='form-control q_".$fld_."' 
								type='text' name='q_".$fld_."' 
								id='q_".$fld_."'/>";
							$nilai .= "<script type='text/javascript'>
										$( '.q_".$fld_."' ).mask('".$this->list_fields[$fld_]['digits']."');
								 	   </script>";
							break;
						default :
							$nilai = "<input autocomplete='off' 
								placeholder='".$placeholder."' 
								class='form-control q_".$fld_."' 
								type='{$type}' name='q_".$fld_."' 
								id='q_".$fld_."'/>";
							$nilai .= "<script type='text/javascript'>
										$('.q_{$fld_}').keypress(function(e) {
											if ( e.which == 13 ) {
												reload_grid(\"".base_url().$this->router->fetch_module()."/".$this->router->class."/lists\", \"".strtolower($this->router->class)."\");
												$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();
											}
										});
									   </script>";
							break;
					}
					
					if ( method_exists($con, "searchBox_".$fld_) ) {
						$method = "searchBox_".$fld_;
						$nilai  =  $con->$method("q_".$fld_, $params);
					}
					
					//echo  $k.' => '.$nilai.', ';
					$search[trim($k)] = array('label'=>$this->list_fields[trim($k)]['alias'], 'crit'=>$nilai, 'hide'=>$s['ishide']);
				} else {
					//$placeholder = 'Masukkan kriteria pencarian anda';
					$placeholder = 'Kriteria pencarian';
					if ( !empty($s['label']) ) {
						$placeholder = $s['label'];
						$alias = $s['label'];
					} else {
						$alias = 'Kriteria';
					}
					$nilai = "<input autocomplete='off' placeholder='".$placeholder."' class='form-control q_".$fld_."' type='{$type}' name='q_".$fld_."' id='q_".$fld_."'/>";
					$nilai .= "<script type='text/javascript'>
									$('.q_{$fld_}').keypress(function(e) {
										if ( e.which == 13 ) {
											reload_grid(\"".base_url().$this->router->fetch_module()."/".$this->router->class."/lists\", \"".strtolower($this->router->class)."\");
											$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();
										}
									});
								</script>";
					if ( method_exists($con, "searchBox_".$fld_) ) {
						$method = "searchBox_".$fld_;
						$nilai  =  $con->$method("q_".$fld_, $params);
					}
					$search[trim($k)] = array('label'=>$alias, 'crit'=>$nilai, 'hide'=>$s['ishide']);
				}
				
			}

			//button pencarian
			$button_search['search'] = "<button type='button' id='".strtolower($this->router->class)."_btn_search' class='btn btn-primary btn-sm btn-flat' onclick='reload_grid(\"".base_url().$this->router->fetch_module()."/".$this->router->class."/lists\", \"".strtolower($this->router->class)."\");$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();'>
				        			<i class='glyphicon glyphicon-search'></i>&nbsp;&nbsp;Cari
							</button>";
							
			//$(\"input[type=hidden]\").val(\"\");
			$button_search['reset']  = "<button type='button' class='btn btn-primary btn-sm btn-flat' 
			                 onclick='$(\"#".strtolower($this->router->class)."_form_search\").trigger(\"reset\");
			                 $(\"#".strtolower($this->router->class)."_form_search select\").val(\"\");$(\"#".strtolower($this->router->class)."_form_search select\").select2().select2(\"val\", null);
			                 reload_grid(\"".base_url().$this->router->fetch_module()."/".$this->router->class."/lists\", \"".strtolower($this->router->class)."\");$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();'>
				        		<i class='glyphicon glyphicon-refresh'></i>&nbsp;&nbsp;Bersihkan Pencarian
				        	</button>";
            //$(\"select\").val(\"\").trigger(\"change\");    
			if ( method_exists($con, "manipulate_search_button") ) {
				$button  =  $con->manipulate_search_button($button_search);
			} else {
				$button = $button_search;
			}

			$search['button'] = $button;
			$search['totunhide'] = $totunhide;
		}

		return $search;
	}


	protected function _getform($json='', $parent_id=array(), $paramku='') {
		//print_r($json);exit;
		$dir = APPPATH.substr($this->router->directory, 3);
		$class = ucfirst($this->router->class);
		$method = $this->router->method;
		$cont = $dir.$class;
		require_once $cont.'.php';
		$con = new $class;

		$placeholder = 'Kriteria pencarian';
		foreach($this->list_fields as $k=>$s) {
			$fld = trim($k);
			$fld_ = str_replace('"', '', $fld);
			$a = explode(".", $fld_);
			$fld__ = str_replace(".", "_", $fld_);
			
			$placeholder = $this->list_fields[$fld]['placeholder'];
			$words = $this->list_fields[$fld]['msg'];
			//$type  = ($this->list_fields[$fld]['hide'] == true ? 'hidden' : 'text');
			$type  = $this->list_fields[$fld]['type'];
			
			if ($this->list_fields[$fld]['hide'] != true ) {
				switch(trim($this->list_fields[$fld_]['type'])) {
					case 'combobox' :
						$nilai = "<select 
							class='form-control ".$fld__."'
							name='".$fld__."'";
							if ( $this->list_fields[$fld_]['event'] !='' ) $nilai .= $this->list_fields[$fld_]['event']." = ";
							if ( $this->list_fields[$fld_]['function'] !='' ) $nilai .= $this->list_fields[$fld_]['function'];
							else $nilai .= "";
	
							$nilai .= " id='".$fld__."'";
							
							if ( $this->list_fields[$fld_]['styles'] !='') $nilai .= $this->list_fields[$fld_]['styles'];
							else $nilai .= "";

							$nilai .= ">";
						foreach($this->list_fields[$fld_]['values'] as $a=>$b) {
							if ( trim($json->$fld__) == trim($a) ) $selected = ' selected';
							else $selected=' ';
							$nilai .= "<option {$selected} value='{$a}'>{$b}</option>";
						}	
						
						$nilai .= "</select>";
						break;
					case 'combobox2' :
						$nilai = "<select 
							class='form-control ".$fld__."'
							name='".$fld__."'";
							if ( $this->list_fields[$fld_]['event'] !='' ) $nilai .= $this->list_fields[$fld_]['event']." = ";
							if ( $this->list_fields[$fld_]['function'] !='' ) $nilai .= $this->list_fields[$fld_]['function'];
							else $nilai .= "";
	
							$nilai .= " id='".$fld__."'"; 
							
							if ( $this->list_fields[$fld_]['styles'] !='') $nilai .= $this->list_fields[$fld_]['styles'];
							else $nilai .= "";
							
							$nilai .= ">";
						foreach($this->list_fields[$fld_]['values'] as $a=>$b) {
							if ( trim($json->$fld__) == trim($a) ) $selected = ' selected';
							else $selected=' ';
							$nilai .= "<option {$selected} value='{$a}'>{$b}</option>";
						}	
						
						$nilai .= "</select>";
						$nilai .= "<script type='text/javascript'>
									 $('#".$fld__."').select2();
								   </script>";
						break;
					case 'textarea' :
						$nilai = "<textarea 
							class='form-control ".$fld__."'
							placeholder='".$placeholder."'
							name='".$fld__."'";

						if ( $this->list_fields[$fld_]['event'] !='' ) $nilai .= $this->list_fields[$fld_]['event']." = ";
						if ( $this->list_fields[$fld_]['function'] !='' ) $nilai .= $this->list_fields[$fld_]['function'];
						else $nilai .= "''";

						$nilai .= "id='".$fld__."' 
							style='".$this->list_fields[$fld_]['styles']."'>".trim($json->$fld__)."</textarea>";
						break;
					case 'html' :
						$nilai = "<textarea 
							class='form-control ".$fld__."'
							name='".$fld__."'
							id='".$fld__."' 
							style='".$this->list_fields[$fld_]['styles']."'>".trim($json->$fld__)."</textarea>";
							
						$nilai .= "<script type='text/javascript'>";
						if ( $this->list_fields[$fld_]['styles'] == true ) {
							$nilai .= "CKEDITOR.replace( '{$fld__}',{
									toolbar: [
										{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', 'Preview' ] },
										{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
										{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
										{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
										'/',
										{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
										{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
										{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
										{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
										'/',
										{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
										{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
										{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
										{ name: 'others', items: [ '-' ] },
										{ name: 'about', items: [ 'About' ] }
									]
								});";
						} else {
							$nilai .= "CKEDITOR.replace( '{$fld__}',{
									toolbar: [
										{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', 'Preview' ] },
										'/',
										{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
										{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
										'/',
										{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
										{ name: 'colors', items: [ 'TextColor', 'BGColor' ] }
									]
								});";
						}
						$nilai .= "</script>";
						break;
					case 'date':
						if ( $this->list_fields[$fld_]['values'] == '' ) {
							$nilainya = trim($json->$fld__);
						} else {
							if ( !empty($json->$fld__) )	
								$nilainya = date($this->list_fields[$fld_]['values'], strtotime(trim($json->$fld__)));
							else $nilainya = trim($json->$fld__);
						}  
						
						$nilai = "<input autocomplete='off' 
							style=\"".$this->list_fields[$fld_]['styles']."\"					
							value=\"".$nilainya."\"
							placeholder='".$placeholder."'
							class='form-control ".$fld__." datepicker'
							type='text'
							name='".$fld__."'
							id='".$fld__."'/>";
						
						if ( $this->list_fields[$fld_]['event'] != '' ) $event = $this->list_fields[$fld_]['event'];
						else $event = "onSelect";

						if ( $this->list_fields[$fld_]['function'] != '' ) $function = $this->list_fields[$fld_]['function'];
						else $function = "";

						$nilai .= "<script type='text/javascript'>
										$( '#".$fld__."' ).datepicker({
											dateFormat: 'dd-mm-yy',
											changeMonth: true,
											changeYear: true,
											//minDate: '+0D',
											".$event." : function(dateText, inst) {
												".$function."
											}
										});
									</script>";
						break;
					case 'time':
						if ( $this->list_fields[$fld_]['values'] == '' ) {
							$nilainya = trim($json->$fld__);
						} else {
							if ( !empty($json->$fld__) )	
								$nilainya = date($this->list_fields[$fld_]['values'], strtotime(trim($json->$fld__)));
							else $nilainya = trim($json->$fld__);
						}  
						
						$nilai = "<input autocomplete='off' 
							style=\"".$this->list_fields[$fld_]['styles']."\"
							value=\"".$nilainya."\"
							placeholder='".$placeholder."'
							class='form-control ".$fld__."'
							type='text'
							name='".$fld__."'
							id='".$fld__."'/>";
						$nilai .= "<script type='text/javascript'>
										$( '#".$fld__."' ).mask('".$this->list_fields[$fld_]['digits']."');
									</script>";
						break;
					case 'password' :
						$nilai = "<input autocomplete='off' 
							value=\"\"
							placeholder='".$placeholder."'
							class='form-control ".$fld__."'
							type='password'
							name='".$fld__."'
							id='".$fld__."'/>";
						break;
					default :
						//echo $fld__."\n";
						//exit;
						$value = trim($json->$fld__);
						if ( sizeOf($parent_id) > 0 ) {
							foreach($parent_id as $v) {
								if ( trim($v) ==  trim($fld__) ) $value = $this->session->$v;
								else $value = trim($json->$fld__);
								
							}
						}
						
						$nilai = "<input autocomplete='off' 
							value=\"".$value."\"
							placeholder='".$placeholder."'
							class='form-control ".$fld__."'
							type='{$type}'
							name='".$fld__."'";
						if ( $this->list_fields[$fld_]['values'] != '' ) $nilai .= $this->list_fields[$fld_]['values']." ";
						if ( $this->list_fields[$fld_]['event'] !='' ) $nilai .= $this->list_fields[$fld_]['event']." = ";
						if ( $this->list_fields[$fld_]['function'] !='' ) $nilai .= $this->list_fields[$fld_]['function'];
						else $nilai .= "";
						$nilai .= "id='".$fld__."'/>";
						break;
					}
				} else {
					$value = trim($json->$fld__);
					if ( sizeOf($parent_id) > 0 ) {
						foreach($parent_id as $v) {
							if ( trim($v) ==  trim($fld__) ) $value = $this->session->$v;
							else $value = trim($json->$fld__);
							
						}
					}
					$nilai = "<input autocomplete='off' value=\"".$value."\" 
							type='hidden'
							name='".$fld__."'
							class='".$fld__."'
							id='".$fld__."'/>";
				}
			
			//echo $nilai."<br/>";

			if ( method_exists($con, "insertBox_".$fld__) && $json==null ) { //&& $this->list_fields[$fld]['hide'] != true 
				$method = "insertBox_".$fld__;
				$nilai  =  $con->$method($fld__, $paramku);
			}

			if ( method_exists($con, "updateBox_".$fld__) && $json!=null ) { //&& $this->list_fields[$fld]['hide'] != true 
				$method = "updateBox_".$fld__;
				$nilai  =  $con->$method($fld__, $json->$fld__, $json, $paramku);
			}

			$search[$fld] = array('label'=>$this->list_fields[$fld]['alias'].' '.($this->list_fields[$fld]['required'] == true ? ' <span style=color:red;>*</span>' : ''), 
							'crit'=>$nilai, 'required'=>$this->list_fields[$fld]['required'], 'hide'=>$this->list_fields[$fld]['hide'], 
							'iscontroller'=>$this->list_fields[$fld]['iscontroller']);
			/* $label_alias = ($this->list_fields[$fld]['required'] == true ? '<span style=color:red;>'.$this->list_fields[$fld]['alias'].'</span>' : '<span style=color:#000000;>'.$this->list_fields[$fld]['alias'].'</span>');
			$search[$fld] = array('label'=>$label_alias.' '.($this->list_fields[$fld]['required'] == true ? ' <span style=color:red;>*</span>' : ''), 
							'crit'=>$nilai, 'required'=>$this->list_fields[$fld]['required'], 'hide'=>$this->list_fields[$fld]['hide'], 
							'iscontroller'=>$this->list_fields[$fld]['iscontroller']); */
		}

		//button pencarian
		$button_form['simpan'] = "<button type='submit' class='btn btn-primary btn_save' onclick='tinyMCE.triggerSave(true,true);'>
											       		<i class='fa fa-save' aria-hidden='true'> </i>
													   Simpan {$this->title}</button>";
													   
		if ( !$this->ismodal ) {
			$button_form['kembali']  = "<button type='button' class='btn btn-default' onclick='$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();'>
											       		<i class='fas fa-window-close' aria-hidden='true'> </i>
													   Tutup</button>";
		} else {
			$button_form['kembali']  = "<button type='button' class='btn btn-default' data-dismiss='modal'
										onclick='$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").removeClass(\"in\");
												$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").attr(\"aria-hidden\",\"true\");
												$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").css(\"display\", \"none\");
												$(\".modal-backdrop\").remove();
												$(\"body\").removeClass(\"modal-open\");
                                                setTimeout(function(){ $(\"body\").css(\"padding-right\", 0); }, 1000);'>
											<i class='fas fa-window-close' aria-hidden='true'> </i>
										Tutup</button>";		
		}


		$save_method['method'] = "save('".base_url().$this->router->fetch_module()."/".$this->router->class."', '".strtolower($this->router->class)."', 'Simpan ".$this->title.". Anda Yakin ?', '{$this->ismodal}', '".strtolower($this->router->class)."_".$this->frmodal."')";

		if ( method_exists($con, "manipulate_insert_button") && $json==null ) {
			$button  =  $con->manipulate_insert_button($button_form);
		} else if ( method_exists($con, "manipulate_update_button") && $json!=null ) {
			$button  =  $con->manipulate_update_button($button_form, $json);
		} else {
			$button = $button_form;
		}

		if ( method_exists($con, 'manipulate_url_save') ) {
			$method = $con->manipulate_url_save($save_method);
		} else {
			$method = $save_method;
		}

		$search['button_form'] = $button;
		$search['method_form'] = $method;

		return $search;
	}

	protected function _getview($json='', $parent_id=array(), $paramku='') {
		$dir = APPPATH.substr($this->router->directory, 3);
		$class = ucfirst($this->router->class);
		$method = $this->router->method;
		$cont = $dir.$class;
		require_once $cont.'.php';
		$con = new $class;

		if ( !empty($json)) {
			foreach($this->list_fields as $k=>$s) {
				$fld = trim($k);
				$fld_ = str_replace('"', '', $fld);
				$a = explode(".", $fld_);
				$fld__ = str_replace(".", "_", $fld_);
				if ($this->list_fields[$fld]['hide'] == true) {
					$nilai = "<input autocomplete='off' value=\"".trim($json->$fld__)."\" 
								type='hidden'
								name='".$fld__."'
								class='".$fld__."'
								id='".$fld__."'/>";
				} else {
					switch(trim($this->list_fields[$fld_]['type'])) {
						case 'combobox' :
							$nilainya = $this->list_fields[$fld_]
							['values'][trim(
								$json->$fld__)];
							break;
						case 'combobox2' :
							$nilainya = $this->list_fields[$fld_]['values'][trim($json->$fld__)];
							break;
						case 'textarea' :
							$nilainya = trim($json->$fld__);
						case 'html' :
							$nilainya = strip_tags(trim($json->$fld__), '<br>');
							break;
						case 'date' :
							if ( $this->list_fields[$fld_]['values'] == '' ) {
								$nilainya = trim($json->$fld__);
							} else {
								if ( !empty($json->$fld__) )	
									$nilainya = date($this->list_fields[$fld_]['values'], strtotime(trim($json->$fld__)));
								else $nilainya = trim($json->$fld__);
							}  
							break;
						case 'time' :
							if ( $this->list_fields[$fld_]['values'] == '' ) {
								$nilainya = trim($json->$fld__);
							} else {
								if ( !empty($json->$fld__) )	
									$nilainya = date($this->list_fields[$fld_]['values'], strtotime(trim($json->$fld__)));
								else $nilainya = trim($json->$fld__);
							}  
							break;
						case 'password' :
							$nilainya = '--password encrypted--';
							break;	
						default :
							$value = trim($json->$fld__);
							if ( sizeOf($parent_id) > 0 ) {
								foreach($parent_id as $v) {
									if ( trim($v) ==  trim($fld__) ) $value = $this->session->$v;
									else $value = trim($json->$fld__);
									
								}
							}
						
							$nilainya = $value;
							break;
					}

					$nilai = "<p class='form-control-static ".$fld__."'>".$nilainya."</p>";
					if ( method_exists($con, "viewBox_".$fld__) && $this->list_fields[$fld]['hide'] != true && $json!=null ) {
						$method = "viewBox_".$fld__;
						$nilai  =  $con->$method($fld__, $json->$fld__, $json, $paramku);
					}
				}

				$search[$fld] = array('label'=>$this->list_fields[$fld]['alias'].' '.($this->list_fields[$fld]['required'] == true ? ' <span style=color:red;>*</span>' : ''), 
								'crit'=>$nilai, 'required'=>$this->list_fields[$fld]['required'], 'hide'=>$this->list_fields[$fld]['hide'], 
								'iscontroller'=>$this->list_fields[$fld]['iscontroller']);
			}
		}

		//button pencarian
		if ( !$this->ismodal ) {
			$button_form['kembali']  = "<button type='button' class='btn btn-default' onclick='$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();'>
											<i class='fas fa-window-close' aria-hidden='true'> </i>
										Tutup</button>";
		} else {
			$button_form['kembali']  = "<button type='button' class='btn btn-default' data-dismiss='modal'>
											       		<i class='fas fa-window-close' aria-hidden='true'> </i>
													   Tutup</button>";
		}

		if ( method_exists($con, "manipulate_view_button") && $json!=null ) {
			$button  =  $con->manipulate_view_button($button_form, $json);
		} else {
			$button = $button_form;
		}

		$search['button_form'] = $button;

		return $search;
	}

	protected function _getform2($json='', $parent_id='', $paramku='') {
		//print_r($json);exit;
		$dir = APPPATH.substr($this->router->directory, 3);
		$class = ucfirst($this->router->class);
		$method = $this->router->method;
		$cont = $dir.$class;
		require_once $cont.'.php';
		$con = new $class;

		$placeholder = 'Kriteria pencarian';
		foreach($this->list_fields as $k=>$s) {			
			$fld = trim($k);
			$fld_ = str_replace('"', '', $fld);
			$a = explode(".", $fld_);
			$fld__ = str_replace(".", "_", $fld_);
			
			//$placeholder = 'Masukkan '.$this->list_fields[$fld]['alias'];
			$placeholder = $this->list_fields[$fld]['placeholder'];
			$words = $this->list_fields[$fld]['msg'];
			//$type  = ($this->list_fields[$fld]['hide'] == true ? 'hidden' : 'text');
			$type = $this->list_fields[$fld]['type'];

			
			if ($this->list_fields[$fld]['hide'] != true ) {
				switch(trim($this->list_fields[$fld_]['type'])) {
					case 'combobox' :
						$nilai = "<select 
							class='form-control ".$fld__."'
							name='".$fld__."'";
							if ( $this->list_fields[$fld_]['event'] !='' ) $nilai .= $this->list_fields[$fld_]['event']." = ";
							if ( $this->list_fields[$fld_]['function'] !='' ) $nilai .= $this->list_fields[$fld_]['function'];
							else $nilai .= "''";
	
							$nilai .= " id='".$fld__."' ";
							
							if ( $this->list_fields[$fld_]['styles'] !='') $nilai .= $this->list_fields[$fld_]['styles'];
							else $nilai .= "''";

							$nilai .= " >";
						foreach($this->list_fields[$fld_]['values'] as $a=>$b) {
							if ( trim($json->$fld__) == trim($a) ) $selected = ' selected';
							else $selected=' ';
							$nilai .= "<option {$selected} value='{$a}'>{$b}</option>";
						}	
						
						$nilai .= "</select>";
						break;
					case 'combobox2' :
						$nilai = "<select 
							class='form-control ".$fld__."'
							name='".$fld__."'";
							if ( $this->list_fields[$fld_]['event'] !='' ) $nilai .= $this->list_fields[$fld_]['event']." = ";
							if ( $this->list_fields[$fld_]['function'] !='' ) $nilai .= $this->list_fields[$fld_]['function'];
							else $nilai .= "";
	
							$nilai .= " id='".$fld__."' "; 
							
							if ( $this->list_fields[$fld_]['styles'] !='') $nilai .= $this->list_fields[$fld_]['styles'];
							else $nilai .= "";
							
							$nilai .= " >";
						foreach($this->list_fields[$fld_]['values'] as $a=>$b) {
							if ( trim($json->$fld__) == trim($a) ) $selected = ' selected';
							else $selected=' ';
							$nilai .= "<option {$selected} value='{$a}'>{$b}</option>";
						}	
						
						$nilai .= "</select>";
						$nilai .= "<script type='text/javascript'>
									 $('#".$fld__."').select2();
								   </script>";
						break;
					case 'textarea' :
						$nilai = "<textarea 
							class='form-control ".$fld__."'
							placeholder='".$placeholder."'
							name='".$fld__."'";
						
						if ( $this->list_fields[$fld_]['event'] !='' ) $nilai .= $this->list_fields[$fld_]['event']." = ";
						if ( $this->list_fields[$fld_]['function'] !='' ) $nilai .= $this->list_fields[$fld_]['function'];
						else $nilai .= "''";

						$nilai .="id='".$fld__."' 
							style='".$this->list_fields[$fld_]['styles']."'>".trim($json->$fld__)."</textarea>";
						break;
					case 'html' :
						$nilai = "<textarea 
							class='form-control ".$fld__."'
							name='".$fld__."'
							id='".$fld__."' 
							style='".$this->list_fields[$fld_]['styles']."'>".trim($json->$fld__)."</textarea>";
							
						$nilai .= "<script type='text/javascript'>";
						if ( $this->list_fields[$fld_]['values'] == true ) {
							$nilai .= "CKEDITOR.replace( '{$fld__}',{
									toolbar: [
										{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', 'Preview' ] },
										{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
										{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
										{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
										'/',
										{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
										{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
										{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
										{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
										'/',
										{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
										{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
										{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
										{ name: 'others', items: [ '-' ] },
										{ name: 'about', items: [ 'About' ] }
									]
								});";
						} else {
							$nilai .= "CKEDITOR.replace( '{$fld__}',{
									toolbar: [
										{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', 'Preview' ] },
										'/',
										{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
										{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
										'/',
										{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
										{ name: 'colors', items: [ 'TextColor', 'BGColor' ] }
									]
								});";
						}
						$nilai .= "</script>";
						break;
					case 'date':

						if ( !empty($json) ) {
							if ( $this->list_fields[$fld_]['values'] == '' ) {
								$nilainya = trim($json->$fld__);
							} else {
								if ( !empty($json->$fld__) )	
									$nilainya = date($this->list_fields[$fld_]['values'], strtotime(trim($json->$fld__)));
								else $nilainya = trim($json->$fld__);
							}  
						} else {
							$nilainya = '';
						}
						
						$nilai = "<input autocomplete='off' 
							style=\"".$this->list_fields[$fld_]['styles']."\"					
							value=\"".$nilainya."\"
							placeholder='".$placeholder."'
							class='form-control ".$fld__." datepicker'
							type='text'
							name='".$fld__."'
							id='".$fld__."'/>";

						if ( $this->list_fields[$fld_]['event'] != '' ) $event = $this->list_fields[$fld_]['event'];
						else $event = "onSelect";

						if ( $this->list_fields[$fld_]['function'] != '' ) $function = $this->list_fields[$fld_]['function'];
						else $function = "";
						$nilai .= "<script type='text/javascript'>
										$( '#".$fld__."' ).datepicker({
											dateFormat: 'dd-mm-yy',
											changeMonth: true,
											changeYear: true,
											//minDate: '+0D',
											".$event." : function(dateText, inst) {
												".$function."
											}
										});
									</script>";
						break;
					case 'time':
						if ( $this->list_fields[$fld_]['values'] == '' ) {
							$nilainya = trim($json->$fld__);
						} else {
							if ( !empty($json->$fld__) )	
								$nilainya = date($this->list_fields[$fld_]['values'], strtotime(trim($json->$fld__)));
							else $nilainya = trim($json->$fld__);
						}  
						
						$nilai = "<input autocomplete='off' 
							style=\"".$this->list_fields[$fld_]['styles']."\"
							value=\"".$nilainya."\"
							placeholder='".$placeholder."'
							class='form-control ".$fld__."'
							type='text'
							name='".$fld__."'
							id='".$fld__."'/>";
						$nilai .= "<script type='text/javascript'>
										$( '.".$fld__."' ).mask('".$this->list_fields[$fld_]['digits']."');
									</script>";
						break;
					case 'password' :
						$nilai = "<input autocomplete='off'
							style=\"".$this->list_fields[$fld_]['styles']."\"
							value=\"\"
							placeholder='".$placeholder."'
							class='form-control ".$fld__."'
							type='password'
							name='".$fld__."'
							id='".$fld__."'/>";
						break;
					default :
						
						$value = trim($json->$fld__);
						if ( sizeOf($parent_id) > 0 ) {
							foreach($parent_id as $v) {
								if ( trim($v) ==  trim($fld__) ) $value = $this->session->$v;
								else $value = trim($json->$fld__);
								
							}
						}
						
						$nilai = "<input autocomplete='off' 
							value=\"".$value."\"
							placeholder='".$placeholder."'
							class='form-control ".$fld__."'
							type='{$type}'
							name='".$fld__."'";
							if ( $this->list_fields[$fld_]['values'] != '' ) $nilai .= $this->list_fields[$fld_]['values']." ";
							if ( $this->list_fields[$fld_]['event'] !='' ) $nilai .= $this->list_fields[$fld_]['event']." = ";
							if ( $this->list_fields[$fld_]['function'] !='' ) $nilai .= $this->list_fields[$fld_]['function'];
							else $nilai .= "";
							$nilai .= "id='".$fld__."'/>";
						break;
					}
				} else {
					$value = trim($json->$fld__);
					if ( sizeOf($parent_id) > 0 ) {
						foreach($parent_id as $v) {
							if ( trim($v) ==  trim($fld__) ) $value = $this->session->$v;
							else $value = trim($json->$fld__);
							
						}
					}
					$nilai = "<input autocomplete='off' value=\"".$value."\" 
							type='hidden'
							name='".$fld__."'
							class='".$fld__."'
							id='".$fld__."'/>";
				}
				
			//}
			if ( method_exists($con, "insertBox_".$fld__) && $json==null ) { //&& $this->list_fields[$fld]['hide'] != true 
				$method = "insertBox_".$fld__;
				$nilai  =  $con->$method($fld__, $paramku);
			}

			if ( method_exists($con, "updateBox_".$fld__) && $json!=null ) { //$this->list_fields[$fld]['hide'] != true && 
				$method = "updateBox_".$fld__;
				$nilai  =  $con->$method($fld__, $json->$fld__, $json, $paramku);
			}

			$search[$fld] = array('label'=>$this->list_fields[$fld]['alias'].' '.($this->list_fields[$fld]['required'] == true ? ' <span style=color:red;>*</span> ' : ''), 'crit'=>$nilai, 'required'=>$this->list_fields[$fld]['required'], 'hide'=>$this->list_fields[$fld]['hide'], 'iscontroller'=>$this->list_fields[$fld]['iscontroller']);
			/* $label_alias = ($this->list_fields[$fld]['required'] == true ? '<span style=color:red;>'.$this->list_fields[$fld]['alias'].'</span>' : '<span style=color:#000000;>'.$this->list_fields[$fld]['alias'].'</span>');
			$search[$fld] = array('label'=>$label_alias.' '.($this->list_fields[$fld]['required'] == true ? ' <span style=color:red;>*</span>' : ''), 
							'crit'=>$nilai, 'required'=>$this->list_fields[$fld]['required'], 'hide'=>$this->list_fields[$fld]['hide'], 
							'iscontroller'=>$this->list_fields[$fld]['iscontroller']); */
		}

		//button pencarian
		$button_form['simpan'] = "<button type='submit' class='btn btn-primary btn_save' onclick='tinyMCE.triggerSave(true,true);'>
							       		<i class='fa fa-save' aria-hidden='true'> </i>
									   Simpan {$this->title}</button>";
		
		if ( !$this->ismodal ) {
			$button_form['kembali']  = "<button type='button' class='btn btn-default' onclick='location.href=\"".base_url().$this->router->fetch_module()."/".$this->router->class."\"'>
							       		<i class='fas fa-window-close' aria-hidden='true'> </i>
									   Tutup</button>";
		} else {
			$button_form['kembali']  = "<button type='button' class='btn btn-default' data-dismiss='modal'>
														<i class='fas fa-window-close' aria-hidden='true'> </i>
													Tutup</button>";
		}


		$save_method['method'] = "save('".base_url().$this->router->fetch_module()."/".$this->router->class."', '".$this->router->class."', 'Simpan ".$this->title.". Anda yakin ?', '{$this->ismodal}', '".strtolower($this->router->class)."_".$this->frmodal."', true)";

		if ( method_exists($con, "manipulate_insert_button") && $json==null ) {
			$button  =  $con->manipulate_insert_button($button_form);
		} else if ( method_exists($con, "manipulate_update_button") && $json!=null ) {
			$button  =  $con->manipulate_update_button($button_form, $json);
		} else {
			$button = $button_form;
		}

		if ( method_exists($con, 'manipulate_url_save') ) {
			$method = $con->manipulate_url_save($save_method);
		} else {
			$method = $save_method;
		}

		$search['button_form'] = $button;
		$search['method_form'] = $method;

		return $search;
	}

	protected function _getview2($json, $parent_id='', $paramku='') {
		$dir = APPPATH.substr($this->router->directory, 3);
		$class = ucfirst($this->router->class);
		$method = $this->router->method;
		$cont = $dir.$class;
		require_once $cont.'.php';
		$con = new $class;

		//print_r($this->list_fields);
		//exit;
		foreach($this->list_fields as $k=>$s) {
			$fld = trim($k);
			$fld_ = str_replace('"', '', $fld);
			$a = explode(".", $fld_);
			$fld__ = str_replace(".", "_", $fld_);
			
			if ($this->list_fields[$fld]['hide'] == true) {
				$nilai = "<input autocomplete='off' value=\"".trim($json->$fld__)."\" 
							type='hidden'
							name='".$fld__."'
							class='".$fld__."'
							id='".$fld__."'/>";
			} else {
				switch(trim($this->list_fields[$fld_]['type'])) {
					case 'combobox' :
						$nilainya = $this->list_fields[$fld_]['values'][trim($json->$fld__)];
						break;
					case 'combobox2' :
						$nilainya = $this->list_fields[$fld_]['values'][trim($json->$fld__)];
						break;
					case 'textarea' :
						$nilainya = trim($json->$fld__);
					case 'html' :
						$nilainya = strip_tags(trim($json->$fld__), '<br>');
						break;
					case 'date' :
						if ( $this->list_fields[$fld_]['values'] == '' ) {
							$nilainya = trim($json->$fld__);
						} else {
							if ( !empty($json->$fld__) )	
								$nilainya = date($this->list_fields[$fld_]['values'], strtotime(trim($json->$fld__)));
							else $nilainya = trim($json->$fld__);
						}   
						break;
					case 'time' :
						if ( $this->list_fields[$fld_]['values'] == '' ) {
							$nilainya = trim($json->$fld__);
						} else {
							if ( !empty($json->$fld__) )	
								$nilainya = date($this->list_fields[$fld_]['values'], strtotime(trim($json->$fld__)));
							else $nilainya = trim($json->$fld__);
						}   
						break;
					default :
						$value = trim($json->$fld__);
						if ( sizeOf($parent_id) > 0 ) {
							foreach($parent_id as $v) {
								if ( trim($v) ==  trim($fld__) ) $value = $this->session->$v;
								else $value = trim($json->$fld__);
								 
							}
						}
						$nilainya = $value;
						break;
				}
				
				$nilai = "<p class='form-control-static ".$fld__."'>".$nilainya."</p>";
				
				if ( method_exists($con, "viewBox_".$fld__) && $this->list_fields[$fld]['hide'] != true && $json!=null ) {
					$method = "viewBox_".$fld__;
					$nilai  =  $con->$method($fld__, $json->$fld__, $json, $paramku);
				}
			}

			$search[$fld] = array('label'=>$this->list_fields[$fld]['alias'].' '.($this->list_fields[$fld]['required'] == true ? ' <span style=color:red;>*</span>' : ''), 'crit'=>$nilai, 'required'=>$this->list_fields[$fld]['required'], 'hide'=>$this->list_fields[$fld]['hide'], 'iscontroller'=>$this->list_fields[$fld]['iscontroller']);
		}

		//button pencarian
		if ( !$this->ismodal ) {
			$button_form['kembali']  = "<button type='button' class='btn btn-default' onclick='location.href=\"".base_url().$this->router->fetch_module()."/".$this->router->class."\"'>
							       		<i class='fas fa-window-close' aria-hidden='true'> </i>
									   Tutup</button>";
		} else {
			$button_form['kembali']  = "<button type='button' class='btn btn-default' data-dismiss='modal'>
											       		<i class='fas fa-window-close' aria-hidden='true'> </i>
													   Tutup</button>";
		}

		if ( method_exists($con, "manipulate_view_button") && $json!=null ) {
			$button  =  $con->manipulate_view_button($button_form, $json);
		} else {
			$button = $button_form;
		}

		$search['button_form'] = $button;

		return $search;
	}

	protected function _addRelation($table, $table2, $on_conditions, $join_type=' left ') {
		//print_r($this->list_table);
		//print_r($on_conditions);
		$sql_relations  = " ".$join_type." join ".$this->db->dbprefix.$table2;
		$i=0;
		foreach($on_conditions as $k=>$v) {
			//echo 'test : '.$this->list_table[$i];
			//echo $i. ' => '.$on;
			$sql_relations .= " on ".$this->db->dbprefix.$table.".".$k.' = '.$this->db->dbprefix.$table2.".".$v;
			$i++;
		}
		$this->table_relations[] = $sql_relations;

	}

	protected function _getTable() {
		return $this->list_table;
	}

	protected function _addQuery($table, $where, $type='or', $operand='%', $is_free=false) {
		if ( !$is_free ) {
			foreach($where as $w) {
				$this->where[] = $this->db->dbprefix.$table.'.'.$w;
			}
			$this->type_where = $type;
			$this->operand_where = $operand;
		} else {
			$this->where_free[] = " ".$type." ".$where;
		}
	}

    protected function _addHaving($query="") {
		if ( !empty(trim($query))) $this->where_having = $query;
	}

	protected function _setPage($page_ke) {

		if ( $this->session->is_save_process != true ) {
			if ( $page_ke == 0 ) {
				 $this->session->{$this->list_table[0].'_page'} = 1;
			} else {
				if ( $this->session->{$this->list_table[0].'_page'} == '' ) {
					$this->session->{$this->list_table[0].'_page'} = 1;
				} else {
					if ( $page_ke != 0 ) $this->session->{$this->list_table[0].'_page'} = $page_ke;
				}
			}
		}

		
		$page = $this->session->{$this->list_table[0].'_page'};

		$this->offset = ($page - 1) * $this->limit;

		$this->session->is_save_process = false;
	}

	protected function _setPlaceholder($table, $field, $string) {
		$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['placeholder'] = $string;
	}
	
	protected function _changeType($table, $field, $type, $values='', $styles='', $digits='00:00', $event='', $function='') {
		if ( array_key_exists($this->db->dbprefix.$table.'.'.$field, $this->list_fields) ) {
			//if ( $this->list_fields[$this->db->dbprefix.$table.'.'.$field]['hide'] == FALSE ) {
				$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['type'] = $type;
				if ( $values != '' ) $this->list_fields[$this->db->dbprefix.$table.'.'.$field]['values'] = $values;
				if ( $styles != '' ) $this->list_fields[$this->db->dbprefix.$table.'.'.$field]['styles'] = $styles;	
				if ( $function != '' ) $this->list_fields[$this->db->dbprefix.$table.'.'.$field]['function'] = $function;
				if ( $event != '' ) $this->list_fields[$this->db->dbprefix.$table.'.'.$field]['event'] = $event;
                $this->list_fields[$this->db->dbprefix.$table.'.'.$field]['digits'] = $digits;				
			//}
		}
	}
	
	protected function _setAlign($table='', $field='', $align='', $valign='') {
		if ($table != '' && $field != '' ) {
			if ( array_key_exists($this->db->dbprefix.$table.'.'.$field, $this->list_fields) ) {
				$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['align']  = $align;
				$this->list_fields[$this->db->dbprefix.$table.'.'.$field]['valign']  = $valign;
			}
		} else $this->list_box_align = array($align, $valign);
	}

	protected function _setController($controller) {
		$this->controller = $controller;
	}
	
	function index() {
	  	if ( !$this->input->is_ajax_request() ) {
			$this->session->unset_userdata(array('_isview'));
		}
		
		$dir = APPPATH.substr($this->router->directory, 3);
		$class = ucfirst($this->router->class);
		$method = $this->router->method;
		$cont = $dir.$class;
		require_once $cont.'.php';
		$con = new $class;
		
		$new_list = array();
		if ( sizeOf($this->list) > 0 ) {
			$new_list['No.'] = array('alias'=>'No.', 'width'=>0);
			foreach($this->list as $key=>$value) {
				//echo $key." => ".$value.'<br/>';
				$new_list[trim($key)] = array(
					'alias'=>$this->list_fields[trim($key)]['alias'], 
					'width'=>$this->list_fields[trim($key)]['width'],
					'free'=>$this->list_fields[trim($key)]['free']
				);
			}
		}
		
		if ( !empty($this->session->userdata['header_controller']) ) access_menu($this->session->userdata['header_controller'], $this->session->userdata['groupid']);
		
		if ( $this->session->allowadd &&  !$this->session->_isview ) {
			$button_list['add'] = "<button type='button' id='btn_new' class='btn btn-primary' data-toggle='modal' data-target='#".strtolower($this->router->class)."_".$this->frmodal."'
						onclick='edit(\"".base_url().$this->router->fetch_module()."/".$this->router->class."/edit/0\", \"".strtolower($this->router->class)."\");'>
						<i class='glyphicon glyphicon-plus'></i>&nbsp;Tambah {$this->title}
					</button>";

			if ( method_exists($con, 'manipulate_list_button') ) {
				$button = $con->manipulate_list_button($button_list);
			} else $button = $button_list;
		} else {
			if ( method_exists($con, 'manipulate_list_button') ) {
				$button = $con->manipulate_list_button($button_list);
			} else $button = $button_list;
		}

		if ( $this->paramku != '' ) $params['paramku'] = $this->paramku;
    
    	$params['title'] = $this->title;
		$params['button_add'] = $button;
		$params['search'] = $this->_getsearch($this->paramku);
		$params['list']   = $new_list;
		$params['form']   = $this->_getform();
		$params['view']   = $this->_getview();
		$params['table']  = $this->list_table[0];
		$params['js']     = $this->_addjs($con, $this->list_table[0]);
		$params['controller'] = ucfirst($this->router->class);
    /**/
     
		//tambahan
		$params['view_search'] = $this->search_form;
		$params['view_list'] = $this->list_form;
		$params['view_form'] = $this->view_form;
    /**/
    
		$this->session->set_userdata(array('view_form'=>$this->view_form));

		if ( $this->index_form != '' ) $this->template->display($this->index_form,$params); 
		else $this->template->display('output/index',$params);
	}

	private function _addjs($con, $table) {
		if ( method_exists($con, $this->list_table[0]."_output") ) {
			$method = $this->list_table[0]."_output";
			$js =  $con->$method();
		}

		return $js;
	}

	function lists($page_ke=0) {
		
		/*$this->load->driver('cache');
		$memcached_enabled = $this->cache->memcached->is_supported();
		if(!$memcached_enabled) {  
			echo "Memcached is not installed";  die; 
		} 

		$json = $this->cache->memcached->get('cache');

		if ( !$json ) {*/

			$post = $_POST;
			$total = 0;
			$this->_setPage($page_ke);
			foreach ($post as $k=>$v) {
				$krit = str_replace("q_", "", $k);
				$this->kriteria[$krit] = $post[$k];
				
				$subs = substr($krit, strlen($this->list_table[0])+1);
				
				if ( $this->search_fields[$this->list_table[0].".".$subs]['ishide'] == TRUE ) {
					$this->session->set_userdata(array($krit=>$post[$k]));
				}
			}
			//dapetin recordsnya
			$sql = "SELECT ";
			foreach ($this->list_fields as $f=>$v) {
				$f_ = str_replace(".", "_", $v[0]);
				$f_ = str_replace('"', '', $f_);
				$f_ = strtolower($f_);
				if ( $v['free'] == true ) {
					$sql .= "'' as ".$f_.",";	
				} else {
					if ( $v['func'] == '' ) $sql .= $f." as ".$f_.",";
					else $sql .= $v[0].",";
				}
			}
			$sql = substr($sql, 0, strlen($sql)-1);

			$sql .= " from ".$this->list_table[0];

			foreach ($this->table_relations as $f) {
				$sql  .= $f;
			}
			$ex_kriteria  = "";
			$sql_kriteria = "";
			$fields = array();

			$nama_tabel = "";
			$nama_field = "";
			foreach($this->search_fields as $k=>$v) {
				$kk = explode(".", $k);
				if (sizeOf($kk) > 2 )
					$kk_check = $kk[2];
				else $kk_check = $kk[1];
				
				$pattern = '/"/';
				$ispreg_match = preg_match($pattern, $kk_check);

				$k = str_replace("\"", "", $k);
				$tbl = explode(".", $k);

				//print_r($tbl);
				if ( sizeOf($tbl) > 2 ) {
					$nama_tabel = $tbl[1];
					$nama_field = $tbl[2];
				} else {
					$nama_tabel = $tbl[0];
					$nama_field = $tbl[1];
				}

				$key = str_replace(".", "_", $k);
				$fields = $this->_get_list_fields($nama_tabel);
				if ( in_array($nama_field, $fields) ) {
					if ( $this->kriteria[$key] != '' && $v['isinclq'] == true ) $sql_kriteria .= $this->_getDataType($nama_tabel, $nama_field, $this->kriteria[$key], $ispreg_match);
				} else {
					if ( $this->kriteria[$key] != '' && $v['isinclq'] == true ) $ex_kriteria = $this->kriteria[$key];
				}
			}

			$i=0;
			$where_pk = 0;
			foreach($this->pk as $k=>$v) {
				if ($i==0) {
					$where_pk = $v;
					$kk = explode(".", $where_pk);
					if (sizeOf($kk) > 2 )
						$kk_check = $kk[2];
					else $kk_check = $kk[1];

					$pattern = '/"/';
					$ispreg_match = preg_match($pattern, $kk_check);
					$kk_check = str_replace("\"", "", $kk_check);
					$sql .= " where ".$this->_getDataType($kk[0], $kk_check, '', $ispreg_match, '!=', '');
					break;
				}
				$i++;
			}
			//$sql .= " where ".$where_pk." != 0 ";

			if ( $ex_kriteria != '' && $ex_kriteria != 'undefined' ) {
				$sql_where = " and ";
				if ( $this->type_where == 'or') $sql_where .= " (";

				foreach ($this->where as $w) {
					if ( $this->operand_where == '%' ) {
						$sql_where .= "lower({$w}) like '%".strtolower($ex_kriteria)."%' ".$this->type_where." ";
					} else {
						$sql_where .= $w." ".$this->operand_where." '".$ex_kriteria."' ".$this->type_where." ";
					}
				}

				$sql_where = substr($sql_where, 0, strlen($sql_where)-4);

				if ( $this->type_where == 'or' ) $sql_where .= " )";

				$sql .= $sql_where;
			}

			$sql  .= $sql_kriteria;
		
			if ( sizeOf($this->where_free) != 0 ) {
				foreach ($this->where_free as $v) {
					$sql .= $v;
				}
			}
			
			$sql_group = '';
			if ( sizeOf($this->group_by) != 0 ) {
				$sql_group .=' group by ';
				foreach ($this->group_by as $g) {
					$sql_group .= $g.',';
				}
				$sql_group = substr($sql_group, 0, strlen($sql_group)-1);

				$sql  .= $sql_group;
			}

			if ( !empty(trim($post['order_by'])) ) {
				if ($this->session->userdata['orders']['order_by'] == $post['order_by'] ) {
					if ( $this->session->userdata['orders']['order_dir'] == 'desc' )
						$this->session->userdata['orders']['order_dir'] = 'asc';
					else $this->session->userdata['orders']['order_dir'] = 'desc';
				} else {
					if ( $this->session->userdata['orders']['order_dir'] == 'desc' ) $this->session->userdata['orders'] = array('order_by'=>$post['order_by'], 'order_dir'=>'asc');
					else $this->session->userdata['orders'] = array('order_by'=>$post['order_by'], 'order_dir'=>'desc');
				}
				
				$sql_order  = ' order by ';
				$sql_order .= $this->session->userdata['orders']['order_by'].' '.$this->session->userdata['orders']['order_dir'];
				$sql .= $sql_order;
			} else {
				if ( $page_ke != 0 ) {
					if (empty($this->session->userdata['orders']['order_by'])) {
						if ( sizeOf($this->order_by) != 0 ) {
							$sql_order =' order by ';
							foreach ($this->order_by as $key=>$value) {
								$sql_order .= $value.',';
							}

							$sql_order = substr($sql_order, 0, strlen($sql_order)-1);
							$sql .= $sql_order;
						}
					} else {
						$sql_order  = ' order by ';
						$sql_order .= $this->session->userdata['orders']['order_by'].' '.$this->session->userdata['orders']['order_dir'];
						$sql .= $sql_order;
					}
				} else {
					if ( sizeOf($this->order_by) != 0 ) {
						$sql_order =' order by ';
						foreach ($this->order_by as $key=>$value) {
							$sql_order .= $value.',';
						}

						$sql_order = substr($sql_order, 0, strlen($sql_order)-1);
						$sql .= $sql_order;
					}
				} 
			}

			//having
			if ( $this->where_having != "") $sql .= " having ".$this->where_having." ";
			//end having

			$sqlc = $sql;
			$sql .= " limit {$this->limit} offset {$this->offset}";
			//echo $sql;
			//echo $sqlc;
			//exit;

			$query = $this->db->query($sql);
			$json = array();
			if ( $query ) {
				$rows = $query->result();
			}

			$query = $this->db->query($sqlc);
			if ( $query ) {
				$total = $query->num_rows();
			}

			$this->session->jum_rec  = $total;
			$this->session->jum_page = ceil($total/$this->limit);
			$just_controller = explode("/", $this->controller);
			$pagination = $this->_ajaxPagination(base_url().$this->controller.'/lists', $this->kriteria, strtolower($just_controller[1]));

			$json['html']  = $this->_getlist($rows);
			$json['total'] = $total;
			$json['pagination'] = $pagination;

			/*$this->cache->memcached->save('cache', $json, 3600);
		}*/

		echo json_encode($json);
  	}

	protected function _getlist($rows) {
		$dir = APPPATH.substr($this->router->directory, 3);
		$class = ucfirst($this->router->class);
		$method = $this->router->method;
		$cont = $dir.$class;
		require_once $cont.'.php';
		$con = new $class;

		$ar_table = array();
		foreach($this->list as $a=>$b) {
			if (!in_array($a, $ar_table)) array_push($ar_table, $a);
		}
		
		//print_r($ar_table);exit;

		$html = "";
		$list = array();
		$i = 1;
		$no=0;
		
		$primary_key = str_replace('.', '_', strtolower($this->pk[$this->list_table[0]]));
		if ( sizeOf($rows) > 0 ) {
			$row_ = array();
			foreach ($rows as $r) {
			  if ( $i%2 ) $class = '';
			  else $class = 'info';

			  foreach($r as $a=>$b) {
			  	$row_[trim($a)] = $b;
			  }

				$tr_html = "<tr class='".$class."'>";
				if ( method_exists($con, "listBox_redecorate") ) {
					$tr_html  =  $con->listBox_redecorate($tr_html, (object)$row_);
				}

				$html .= $tr_html;

				$html .= "<td style='text-align:".$this->list_box_align[0].";vertical-align:".$this->list_box_align[1].";'>";

				if ( $this->session->_isview ) {
					if ( $this->session->allowview  ) {
						$button_list['lihat'] = "<span style='text-align: center;cursor:pointer;' onclick=\"view('".base_url().$this->router->fetch_module()."/".$this->router->class."/view/".$r->$primary_key."', '".strtolower($this->router->class)."');\" data-toggle='modal' data-target='#".strtolower($this->router->class)."_".$this->frmodal."'>
							<i class='fas fa-search' title='Lihat'></i>
						</span>";
					} else $button_list['lihat'] = "";//&nbsp;
				} else {
					if ( $this->session->allowview  ) {
						$button_list['lihat'] = "<span style='text-align: center;cursor:pointer;' onclick=\"view('".base_url().$this->router->fetch_module()."/".$this->router->class."/view/".$r->$primary_key."', '".strtolower($this->router->class)."');\" data-toggle='modal' data-target='#".strtolower($this->router->class)."_".$this->frmodal."'>
							<i class='fas fa-search' title='Lihat'></i>
						</span>";
					} else $button_list['lihat'] = "";//&nbsp;

					if ( $this->session->allowedit ) { // && !$this->session->_isview
						$button_list['ubah'] = "<span style='text-align: center;cursor:pointer;' onclick=\"edit('".base_url().$this->router->fetch_module()."/".$this->router->class."/edit/".$r->$primary_key."', '".strtolower($this->router->class)."');\" data-toggle='modal' data-target='#".strtolower($this->router->class)."_".$this->frmodal."'>
							<i class='glyphicon glyphicon-edit' title='Ubah'></i>
						</span>";
					} else $button_list['ubah'] = "";//&nbsp;

					if ( $this->session->allowdelete ) { // && !$this->session->_isview
						$button_list['hapus'] = "<span style='text-align: center;cursor:pointer;' 
								onclick=\"hapus('".base_url().$this->router->fetch_module()."/".$this->router->class."/delete/".$r->$primary_key."', 'Hapus Record ".$this->title."', '".strtolower($this->router->class)."', '".base_url().$this->router->fetch_module()."/".$this->router->class."/lists/".$this->session->{$this->list_table[0].'_page'}."', 'kriteria');\">
							<i class='glyphicon glyphicon-trash' title='Hapus'></i>
						</span>";
					} else $button_list['hapus'] = "";//
				}

				if ( method_exists($con, "listBox_action") ) {
					$button  =  $con->listBox_action($button_list, (object)$row_);
				} else $button = $button_list;

				foreach($button as $b) {
					$html .= $b." &nbsp; ";
				}

				//$html['button'] = $button;

				$html .= "</td>";
				
				
				if ( $this->offset == 0 ) $norut = $i;
				else $norut = ($i+$this->offset);
				
				$html .= "<td style='text-align:center;'>".$norut."</td>";
						
				foreach($this->list as $a=>$k) {
					$fld = trim($k);
					
					$a_  = explode(".", $a);
					$a__ = str_replace(".", "_", $a);
					//$a__ = strtolower(str_replace('"', '', $a__));
					$a__ = str_replace('"', '', $a__);
					$a__ = strtolower($a__);
					//print_r($a_);
					//if (!in_array($a_[0], $ar_table)) array_push($ar_table, $a_[0]);

					//echo $a_[1].'<br/>';
					if ( sizeOf($a_) > 2 ) $kolom = trim($a_[2]);
					else $kolom = trim($a_[1]);
					
					//echo $kolom.',';
					
					//if ( $kolom != "no" ) {
						$nilai = $r->{$a__};
						
						switch(trim($this->list_fields[trim($a)]['type'])) {
							case 'date' :
								if ( !empty($this->list_fields[trim($a)]['values'])) {
									$format = $this->list_fields[trim($a)]['values'];
									if ( $nilai != null ) { 
										$nilai = date($format, strtotime($nilai));
										$nilai_ = $nilai;
									} else $nilai_ = '-';
								} 
								break;
							case 'time' :
								if ( !empty($this->list_fields[trim($a)]['values'])) {
									$format = $this->list_fields[trim($a)]['values'];
									if ( $nilai != null ) { 
										$nilai = date($format, strtotime($nilai));
										$nilai_ = $nilai;
									}
								} 
								break;
							case 'combobox' :
								if ( !empty($this->list_fields[trim($a)]['values'])) {
									$nilaii = $this->list_fields[trim($a)]['values'];
									$nilai_ = $nilaii[trim($nilai)];
								} 
								break;
							case 'combobox2' :
								if ( !empty($this->list_fields[trim($a)]['values'])) {
									$nilaii = $this->list_fields[trim($a)]['values'];
									$nilai_ = $nilaii[trim($nilai)];
								} 
								break; 
							default :
								//do nothing
								$nilai_ = $nilai;
								break;
						}
						
						if ( method_exists($con, "listBox_".$a__) ) {
							$method = "listBox_".$a__;
							$nilai_  =  $con->$method($nilai, (object)$row_);
						}

						//echo $a__.' => '.$nilai_;
						$html .= "<td style='text-align:".$this->list_fields[$a]['align'].";vertical-align:".$this->list_fields[$a]['valign'].";'>".$nilai_."</td>";
				}
				
			  	$html .= "</tr>";
			  		$i++;
			}

		} else {
			$html = "<tr><td colspan='100'>
					record tidak ditemukan
					</td></tr>";
			$button = "";
		}

		//echo $html;

		$list['html'] = $html;
		return $list;
	}

	protected function _ajaxpagination($url, $kriteria, $div="menu", $offset=NULL, $limit=NULL) {
		if ( $limit != NULL ) $this->limit = $limit;
		$showPage=0;
		$page = $this->session->{$this->list_table[0].'_page'};
		$pagingku = "<nav style='text-align:left'>";
		$pagingku .= "<ul class='pagination'>";

		$numrows = $this->session->jum_rec;
		$jumPage = $this->session->jum_page;

		//echo 'jumPage : '.$jumPage;

		if ($offset == NULL) $offset = $this->offset;

		if ( $numrows <= $this->limit && $page > 1 ) {
			 $page   = 1;
			 //$offset = 0;
		}

		if ($page > 1)
			$pagingku .= "<li><a style='color:#86B6D9;cursor:pointer;' onclick='get_paging(\"".$url."\", \"".$div."\", \"".($page-1)."\");'>Prev</a> ";

			// memunculkan nomor halaman dan linknya

		for($page1 = 1; $page1 <= $jumPage; $page1++)
		{
			//echo "Jum Page : ".$jumPage;
			 if ((($page1 >= $page - 3) && ($page1 <= $page + 3)) || ($page1 == 1) || ($page1 == $jumPage))
			 {
				if (($showPage == 1) && ($page1 != 2))  $pagingku .= "<li><a style='color:#000000;'>...</a></li>";
				if (($showPage != ($jumPage - 1)) && ($page1 == $jumPage))  $pagingku .= "<li><a style='color:#000000;'>...</a></li>";
				if ($page1 == $page) $pagingku .= "<li><a style='color:#000000;'>".$page1."</a></li> ";
				else $pagingku .= "<li><a style='color:#86B6D9;cursor:pointer;' onclick='get_paging(\"".$url."\", \"".$div."\", \"".($page1)."\");'>".$page1."</a></li> ";
				$showPage = $page1;
			 }
		}
		if ($page < $jumPage)
			$pagingku .= "<li><a style='color:#86B6D9;cursor:pointer;' onclick='get_paging(\"".$url."\", \"".$div."\", \"".($page+1)."\");'>Next</a></li>";

		$pagingku .= "</ul>";

		//echo 'page : '.$page;

		$jml_rows = ($page == $jumPage ? $numrows : ($page * $this->limit));

		if ( $numrows > 0 ) $pagingku .= "<div class='ajax_pagination'>&nbsp;".($offset + 1)." - ".$jml_rows." of ".$numrows." record(s)</div>";

		$pagingku .= "</nav>";

		return $pagingku;
	}

	function _get_list_fields($table) {
		$result = $this->db->list_fields($table);

		$fields = array();
		foreach ($result as $field) {
			$fields[] = $field;
		}

		return $fields;
	}

	function _get_field_data($table) {
		$result = $this->db->field_data($table);
		//print_r($this->db->last_query());exit;

		$fields = array();
		foreach ($result as $field) {
			$fields[$field->name] = $field->type;
		}

		return $fields;
	}

    protected function _getDataType($table, $key, $val, $ispreg_match, $isequal='=', $isfirst='and') {
    		$fields_type = $this->_get_field_data($table);
      		$sql = "";

    		$numeric  = array('integer', 'smallint', 'tinyint', 'int', 'bigint', 'numeric', 'bigint', 'mediumint');
			$datetime = array('timestamp', 'datetime', 'timestamp without time zone', 'timestamp with time zone');
			$date     = array('date');
			$time	  = array('time', 'time without time zone', 'time with time zone');
			$boolean  = array('boolean');
			$decimal  = array('decimal', 'float', 'double');
			$blob     = array('tinyblob', 'blob', 'mediumblob', 'longblob');			

			if ( $ispreg_match ) $key_ = '"'.$key.'"';
			else $key_ = $key;

			if ( in_array($fields_type[$key], $numeric)) {
				 $sql .= " {$isfirst} ".$table.".".$key_." {$isequal} ".(int)$val;
			} else if ( in_array($fields_type[$key], $datetime)) {
				$sql .= " {$isfirst} ".$table.".".$key_." {$isequal} '".date('Y-m-d H:i:s', strtotime($val))."'";
			} else if ( in_array($fields_type[$key], $date) ) {
				$sql .= " {$isfirst} ".$table.".".$key_." {$isequal} '".date('Y-m-d', strtotime($val))."'";
			} else if ( in_array($fields_type[$key], $time) ) {
				$sql .= " {$isfirst} ".$table.".".$key_." {$isequal} '".date('H:i:s', strtotime($val))."'";
			/*} else if ( in_array($fields_type[$key], $decimal) ) {
				$sql .= " and ".$table.".".$key_." = '".$this->stripCharacters($val)."'";*/
			} else if ( in_array($fields_type[$key], $boolean) ) {
				$sql .= " {$isfirst} ".$table.".".$key_." {$isequal} ".($val == 0 ? 'FALSE' : 'TRUE');
			} else {
				$sql .= " {$isfirst} lower(".$table.".".$key_.") like '%".strtolower($val)."%'";
			}

			return $sql;
    }

    protected function _reformat($key, $val) {
    	$numeric  = array('integer', 'smallint', 'tinyint', 'int', 'numeric', 'bigint', 'mediumint');
		$datetime = array('timestamp', 'datetime', 'timestamp without time zone', 'timestamp with time zone');
		$date     = array('date');
		$time	  = array('time', 'time without time zone', 'time with time zone');
		//$decimal  = array('decimal', 'float', 'double');
		$blob     = array('tinyblob', 'blob', 'mediumblob', 'longblob');

		$val = trim($val);
		
		if ( in_array($key, $numeric)) {
			 return (int)$val;
		} else if ( in_array($key, $datetime)) {
			if ( $val != null ) return date('Y-m-d H:i:s', strtotime($val));
			else return null;
		} else if ( in_array($key, $date) ) {
			if ( $val != null ) return date('Y-m-d', strtotime($val));
            else return null;
		} else if ( in_array($key, $time) ) {
			if ( $val != null ) return date('H:i:s', strtotime($val));
            else return null;
		/*} else if ( in_array($key, $decimal) ) {
			return $this->stripCharacters($val);*/
		} else return $val;
    }

    function save() {
			$ispk = end(explode(".", $this->pk[$this->list_table[0]]));
			$posts = $_POST;
    		$this->is_save_process = true;

			$dir = APPPATH.substr($this->router->directory, 3);
			$class = ucfirst($this->router->class);
			$method = $this->router->method;
			$cont = $dir.$class;
			require_once $cont.'.php';
			$con = new $class;

			$table = trim($this->list_table[0]);

  	  $fields_type = $this->_get_field_data($this->list_table[0]);

			$id = (int)$posts[$this->list_table[0]."_".$ispk];
			$gen_arr = array();
			$gen_arr_add = array();
			$data = array();
			$added = array();

			$fields = $this->_get_list_fields($this->list_table[0]);

			$new_post = array();
			foreach($posts as $key=>$val) {
				$key2 = substr($key, 0, strlen(trim($table)));
				//echo $key2;
				//exit;
				if ( trim($key2) == trim($table) ) {
					$new_key = substr($key, strlen(trim($table))+1);
					if (in_array($new_key, $fields)) {
						if ( $new_key != $ispk ) {
							if ( is_array($val) ) {
								$gen_arr[$key2.'_'.$new_key] = $val;
								$new_post[$key2.'_'.$new_key] = $val;
							} else {
							  
							  $gen_arr[$key2.'_'.$new_key] = $this->_reformat($fields_type[$new_key], $this->security->xss_clean($val));
								$new_post[$key2.'_'.$new_key] = $this->_reformat($fields_type[$new_key], $this->security->xss_clean($val));

								//$gen_arr[$key2.'_'.$new_key]  = $this->security->xss_clean($val);
								//$new_post[$key2.'_'.$new_key] = $this->security->xss_clean($val);
							}	
						}
					}
				}	
			}
			$post = $new_post;
			//$after_post = $posts;
			
			$data['status'] = true;

			//UPDATE NILAI DULU DI BEFORE_xxx_PROCESSOR
			if ( $data['status'] == TRUE ) {
				if ( $id == 0 ) {
					if ( method_exists($con, 'before_insert_processor') && $id == 0 ) {
						//lakukan sebelum proses insert
						$data1 = (array)$con->before_insert_processor((object)$gen_arr);
						$gen_arr = array();
						foreach($data1 as $k1=>$v1) {
							if ( $k1 != $ispk ) $gen_arr[$k1] = $v1;
							//$posts[$k1] = $v1;
						}
					}
				} else {
					if ( method_exists($con, 'before_update_processor') && $id != 0 ) {
						//lakukan sebelum proses update
						$this->db->select('*');
						$this->db->where(array($ispk=>$id));
						$query = $this->db->get($this->list_table[0]);
						//echo $this->db->last_query();
						//exit;
						if ( $query ) {
							$qr=$query->row_array();
							foreach($qr as $k1=>$v1){
								$oldpost[$this->list_table[0].'_'.$k1] = trim($v1);
							}
						}

						foreach ($oldpost as $k1=>$v1) {
							if ( !array_key_exists($k1, $gen_arr) ) {
								//$oldpost[$k] = $v;
								unset($oldpost[$k1]);
							}
						}

						$data1 = (array)$con->before_update_processor($id, (object)$gen_arr, (object)$oldpost);
						$gen_arr = array();
						foreach($data1 as $k1=>$v1) {
						   if ( $k1 != $ispk ) $gen_arr[$k1] = $v1;
						   //$posts[$k1] = $v1;
						}
					}
				}
			}
			$posts = $gen_arr;
			//print_r($posts);
			//END UPDATE NILAI DULU DI BEFORE_xxx_PROCESSOR
			$after_post = $posts;

			foreach($this->list_fields as $k=>$v) {
				$fld = str_replace('"', '', trim($k));
				$pieces1 = explode(".", $fld);
				
				//get PK of 1st table
				$ii=0;
				$pieces2 = array();
				foreach($this->pk as $pk) {
					if ( $ii == 0 ) {
						$pieces2 = explode(".", $pk); 
						$pk_save = str_replace(".", "_", $pk);
					}
					$ii++;
				}
				
				$fld_ = str_replace(".", "_", $fld);
				if ( $v['required'] == true ) {
					if ( $id == 0 ) {
						if ( trim($fld_) != trim($pk_save) ) {

							if ( trim($posts[$fld_]) == '' && $pieces1[1] != $pieces2[1] && $v['free'] != true ) {
								$data['status'] = false;
								$data['msg'] = 'Lengkapi isian kolom '.$v['alias'];
								$data['obj'] = $fld_;
								echo json_encode($data);
								exit;
							}else { 
								if ( method_exists($con, "insertCheck_".$fld_)) {
									$method = "insertCheck_".$fld_;
									$data = $con->$method($posts[$fld_], (object)$posts);
									if ( $data == null ) {
										continue; 
									} else {
										if ($data['status'] == false) {
											if ( $data['obj'] == null ) {
												$data['obj'] = $fld_;
											}
											echo json_encode($data);
											exit;
										}
									}
								} 
							}
						}
					} else {
						if ( trim($fld_) != trim($pk_save) ) {

							if ( trim($posts[$fld_]) == '' && $v['free'] != true ) {
								$data['status'] = false;
								$data['msg'] = 'Lengkapi isian kolom '.$v['alias'];
								$data['obj'] = $fld_; 	
								echo json_encode($data);
								exit;
							} else {
								if ( method_exists($con, "updateCheck_".$fld_) ) {
									$method = "updateCheck_".$fld_;
									$data = $con->$method($posts[$fld_], (object)$posts, $id);
									if ( $data == null ) {
										continue; 
									} else {
										if ($data['status'] == false) {
											if ( $data['obj'] == null ) {
												$data['obj'] = $fld_;
											}
											echo json_encode($data);
											exit;
										}
									}
								}	
							}
						}
					}
				}
			}
			
			//print_r($posts);exit;

			$new_post = array();
			foreach($posts as $key=>$val) {
				$key2 = substr($key, 0, strlen(trim($table)));
				if ( trim($key2) == trim($table) ) {
					$new_key = substr($key, strlen(trim($table))+1);
					if (in_array($new_key, $fields)) {
						if ( $new_key != $ispk ) {
							if ( is_array($val) ) {
								$gen_arr[$key2.'_'.$new_key] = $val;
								$new_post[$key2.'_'.$new_key] = $val;
							} else {
								$gen_arr[$key2.'_'.$new_key] = $this->_reformat($fields_type[$new_key], $this->security->xss_clean($val));
								$new_post[$key2.'_'.$new_key] = $this->_reformat($fields_type[$new_key], $this->security->xss_clean($val));

								//$gen_arr[$key2.'_'.$new_key]  = $this->security->xss_clean($val);
								//$new_post[$key2.'_'.$new_key] = $this->security->xss_clean($val);
							}	
						}
					}
				}	
			}
			$post = $new_post;

			
      		
			if ( $data['status'] == TRUE ) {
				if ( $id == 0 ) {
					$gen_arr2 = $gen_arr;
					$gen_arr = array();
					foreach($gen_arr2 as $key=>$val) {
						$new_key = substr($key, strlen(trim($table))+1);
						if ( (string)$val != '') $gen_arr[$new_key] = $val;
					}
					
					$this->db->trans_start();
					$this->db->trans_strict(FALSE);
					
					$this->db->set($gen_arr);
					$this->db->insert($this->list_table[0]);

					//echo $this->db->last_query();exit;

					$this->db->trans_complete();
				
					if ( $this->db->trans_status() === FALSE ) {
						$this->db->trans_rollback();
						$data['status'] = FALSE;
						$data['msg'] = sprintf('%s : %s : DB transaction failed. Error no: %s, Error msg:%s, Last query: %s', __CLASS__, __FUNCTION__, $e->getCode(), $e->getMessage(), print_r($this->db->last_query(), TRUE));
					} else {	
						$this->db->trans_commit();
						if ( method_exists($con, 'after_insert_processor') && $id == 0 ) {
							$id = $this->db->insert_id();
							if ( $id == 0 ) {
								$row =  $this->db->query('SELECT LAST_INSERT_ID()')->row_array();
								$id = $row['LAST_INSERT_ID()'];
							}
							$con->after_insert_processor($id, (object)$after_post);
						} else {
							$id = $this->db->insert_id();
							if ( $id == 0 ) {
								$row =  $this->db->query('SELECT LAST_INSERT_ID()')->row_array();
								$id = $row['LAST_INSERT_ID()'];
							}
						}
					}	
				} else {
					$gen_arr2 = $gen_arr;
					$gen_arr = array();
					foreach($gen_arr2 as $key=>$val) {
						$new_key = substr($key, strlen(trim($table))+1);
						//if ( $val != '') $gen_arr[$new_key] = $val;
						$gen_arr[$new_key] = $val;
					}
					
					$this->db->trans_start();
					$this->db->trans_strict(FALSE);
					
					$this->db->where($ispk, $id);
					$this->db->update($this->list_table[0], $gen_arr);
					
					//echo $this->db->last_query();exit;
					
					$this->db->trans_complete();
				
					if ( $this->db->trans_status() === FALSE ) {
						$this->db->trans_rollback();
						$data['status'] = FALSE;
						//$data['msg'] = 'UPDATE FAILED. '.$this->db->_error_message().' ['.$this->db->_error_number();
						$data['msg'] = sprintf('%s : %s : DB transaction failed. Error no: %s, Error msg:%s, Last query: %s', __CLASS__, __FUNCTION__, $e->getCode(), $e->getMessage(), print_r($this->db->last_query(), TRUE));
					} else {	
						$this->db->trans_commit();
						if ( method_exists($con, 'after_update_processor') && $id != 0 ) {
							//lakukan setelah semua selesai
							$con->after_update_processor($id, (object)$after_post, (object)$oldpost);
						}
						
						$data['status'] = TRUE;
					}
				}
			}

			write_log($this->db->last_query());

			$data['id'] = $id;

			$this->session->is_save_process = TRUE;

			echo json_encode($data);
	}

	protected function rekursifMenu($parentId, $groupId, $level) {
		if ( $groupId == '' ) $groupId = 0;
		$sql2 = "SELECT a.id, a.iparentid, a.cmenuparent, a.cmenuname as title, a.cmenucontroller as link, deriv1.count
				FROM {$this->prefix}t_menu a LEFT OUTER JOIN (SELECT iparentid, COUNT(*) AS count FROM {$this->prefix}t_menu GROUP BY iparentid) deriv1
				ON a.id = deriv1.iparentid LEFT JOIN {$this->prefix}t_menu_group_privileges b
				ON a.id = b.imenuid AND b.igroupid IN (".$groupId.")
				WHERE a.iparentid={$parentId} and a.ldeleted = 0
				AND b.iallowview = 1 
				group by a.id, a.iparentid, a.cmenucode, a.cmenuparent, a.cmenuname, a.cmenucontroller, a.cmenuicon, deriv1.count 
				ORDER BY a.cmenuurut";
		$query = $this->db->query($sql2);
		$menu = "";
		foreach($query->result_array() as $r2) {

			if ($r2['count'] > 0) {

				if ( $r2['iparentid'] == '0' ) $menu .= "<li class='dropdown'>";
				else $menu .= "<li class='dropdown-submenu'>";

				if ( $r2['link'] == '#' ) {
					$added = " class='dropdown-toggle' data-toggle='dropdown'";
					if ( $r2['iparentid'] == 0 )
						$caret = "<span class='caret'></span>";
					else $caret = "";
				} else {
					$added = " ";
					$caret = "";
				}

				$menu .= "<a title='".$r2['title']."' href='".base_url().$r2['link']."' {$added}>" .(strlen($r2['title']) <= 22 ? $r2['title'] : substr($r2['title'],0, 22).' ...') . "{$caret}</a>";
				$menu .= "<ul class='dropdown-menu'>";
				$menu .= $this->rekursifMenu($r2['id'], $groupId, $level + 1);
				$menu .= "</ul>";
				$menu .= "</li>";

			} elseif ($r2['count']==0) {
				$menu .= "<li class='dropdown'>";
				$menu .= "<a title='".$r2['title']."' href='".base_url().$r2['link']."'>" . (strlen($r2['title']) <= 22 ? $r2['title'] : substr($r2['title'],0, 22).' ...') . "</a>";
				$menu .= "</li>";
			} else;
			}

		return $menu;
	}

	protected function rekursifSBAdmin($parentId, $groupId, $level) {
		if ( $groupId == '' ) $groupId = 0;
		$sql2 = "SELECT a.id, a.iparentid, a.cmenuparent, a.cmenuname as title, a.cmenucontroller as link, a.cmenuicon, deriv1.count
				FROM {$this->prefix}t_menu a LEFT OUTER JOIN (SELECT iparentid, COUNT(*) AS count FROM {$this->prefix}t_menu GROUP BY iparentid) deriv1
				ON a.id = deriv1.iparentid LEFT JOIN {$this->prefix}t_menu_group_privileges b
				ON a.id = b.imenuid AND b.igroupid IN (".$groupId.")
				WHERE a.iparentid={$parentId} and a.ldeleted = 0
				AND b.iallowview = 1
				group by a.id, a.iparentid, a.cmenucode, a.cmenuparent, a.cmenuname, a.cmenucontroller, a.cmenuicon, deriv1.count 
				ORDER BY a.cmenuurut";
		$query = $this->db->query($sql2);
		$menu = "";
		foreach($query->result_array() as $r2) {

			if ($r2['count'] > 0) {

				if ( $r2['iparentid'] == '0' ) $menu .= "<li class='dropdown'>";
				else $menu .= "<li>";

				if ( $r2['link'] == '#' ) {
					$added = " data-toggle='collapse' data-target='#submenu_".($level)."'";
					if ( $r2['iparentid'] == 0 )
						$caret = "<span class='caret'></span>";
					else $caret = "";
				} else {
					$added = " ";
					$caret = "";
				}

				$menu .= "<a title='".$r2['title']."' href='#' {$added}>" .(strlen($r2['title']) <= 22 ? $r2['title'] : substr($r2['title'],0, 22).' ...') ." {$caret}</a>";
				$menu .= "<ul id='submenu_".($level)."' class='collapse'>";
				$menu .= $this->rekursifSBAdmin($r2['id'], $groupId, $level + 1);
				$menu .= "</ul>";
				$menu .= "</li>";

			} elseif ($r2['count']==0) {
				$menu .= "<li>";
				$menu .= "<a title='".$r2['title']."' href='".base_url().$r2['link']."'>" . (strlen($r2['title']) <= 22 ? $r2['title'] : substr($r2['title'],0, 22).' ...') . "</a>";
				$menu .= "</li>";
			} else;
			}

		return $menu;
	}

	protected function rekursifSBAdmin2($parentId, $groupId, $level) {
		if ( $groupId == '' ) $groupId = 0;
		$sql2 = "SELECT a.id, a.iparentid, a.cmenuparent, a.cmenuname as title, a.cmenucontroller as link, a.cmenuicon, deriv1.count
				FROM {$this->prefix}t_menu a LEFT OUTER JOIN (SELECT iparentid, COUNT(*) AS count FROM {$this->prefix}t_menu GROUP BY iparentid) deriv1
				ON a.id = deriv1.iparentid LEFT JOIN {$this->prefix}t_menu_group_privileges b
				ON a.id = b.imenuid AND b.igroupid IN (".$groupId.")
				WHERE a.iparentid={$parentId} and a.ldeleted = 0
				AND b.iallowview = 1 
				group by a.id, a.iparentid, a.cmenucode, a.cmenuparent, a.cmenuname, a.cmenucontroller, a.cmenuicon, deriv1.count 
				ORDER BY a.cmenuurut";
		$query = $this->db->query($sql2);
		$menu = "";
		foreach($query->result_array() as $r2) {

			if ($r2['count'] > 0) {

				if ( $r2['iparentid'] == '0' ) $menu .= "<li>";
				else $menu .= "<li>";

				if ( $r2['link'] == '#' ) {
					$added = " class='dropdown-toggle' data-toggle='dropdown'";
					//if ( $r2['iparentid'] == 0 )
						$caret = "<span class='fa arrow'></span>";
					//else $caret = "";
				} else {
					$added = " ";
					$caret = "";
				}

				$menu .= "<a title='".$r2['title']."' href='".base_url().$r2['link']."' {$added}>" .(strlen($r2['title']) <= 22 ? $r2['title'] : substr($r2['title'],0, 22).' ...') . "{$caret}</a>";
				$menu .= "<ul class='nav nav-".$this->ar_menu_level[$level + 1]."-level'>";
				$menu .= $this->rekursifSBAdmin2($r2['id'], $groupId, $level + 1);
				$menu .= "</ul>";
				$menu .= "</li>";

			} elseif ($r2['count']==0) {
				$menu .= "<li>";
				$menu .= "<a title='".$r2['title']."' href='".base_url().$r2['link']."'>" . (strlen($r2['title']) <= 22 ? $r2['title'] : substr($r2['title'],0, 22).' ...') . "</a>";
				$menu .= "</li>";
			} else;
			}

		return $menu;
	}

	protected function rekursifAdminLTE($parentId, $groupId, $level) {
		if ( $groupId == '' ) $groupId = 0;
		$sql2 = "SELECT a.id, a.iparentid, a.cmenucode, a.cmenuparent, 
		    a.cmenuname as title, a.cmenucontroller as link, a.cmenuicon, deriv1.count
				FROM {$this->prefix}t_menu a LEFT OUTER JOIN (SELECT iparentid, COUNT(*) AS count FROM {$this->prefix}t_menu GROUP BY iparentid) deriv1
				ON a.id = deriv1.iparentid LEFT JOIN {$this->prefix}t_menu_group_privileges b
				ON a.id = b.imenuid AND b.igroupid IN (".$groupId.")
				WHERE a.iparentid={$parentId} and a.ldeleted = 0
				AND b.iallowview = 1 
				group by a.id, a.iparentid, a.cmenucode, a.cmenuparent, a.cmenuname, a.cmenucontroller, a.cmenuicon, deriv1.count 
				ORDER BY a.cmenuurut";
		//echo $sql2;exit;
		$query = $this->db->query($sql2);
		$rows = $query->result_array();

		$menu = "";
		foreach($rows as $r2) {
			$added = "";
			if ($r2['count'] > 0) {

				//if ( $r2['iparentid'] == '0' ) $menu .= "<li class='treeview'>";
				//else $menu .= "<li class='treeview'>";
				$menu .= "<li class='treeview' id='".$r2['id']."' parentid='".$r2['iparentid']."' url='".$r2['link']."'>";

				if ( $r2['link'] == '#' ) {
					$link = $r2['link'];
					$added = "<span class='pull-right-container'>
					              <i class='fa fa-angle-left pull-right'></i>
					            </span>";
				} else $link = base_url().$r2['link'];

				$menu .= "<a title='".$r2['title']."' href='".$link."'> ".$r2['cmenuicon']."<span>" .$r2['title']."</span>".$added."</a>";
				$menu .= "<ul class='treeview-menu'>";
				$menu .= $this->rekursifAdminLTE($r2['id'], $groupId, $level + 1);
				$menu .= "</ul>";
				$menu .= "</li>";

			} elseif ($r2['count']==0) {
				$menu .= "<li class='' id='".$r2['id']."' parentid='".$r2['iparentid']."' url='".$r2['link']."'>";
				$menu .= "<a title='".$r2['title']."' href='".base_url().$r2['link']."'> ".$r2['cmenuicon']. "<span>".$r2['title']."</span>".$added."</a>";
				$menu .= "</li>";
			} else;
			}

		return $menu;
	}

	function edit($where_=0) {
		$dir = APPPATH.substr($this->router->directory, 3);
		$class = ucfirst($this->router->class);
		$method = $this->router->method;
		$cont = $dir.$class;
		require_once $cont.'.php';
		$con = new $class;

		$params['title'] = $this->title;
		$params['table']  = $this->list_table[0];
		$params['controller'] = ucfirst($this->router->class);
		$params['js']     = $this->_addjs($con, $this->list_table[0]);

		$where = array($this->pk[$this->list_table[0]]=>$where_);
		if ( method_exists($con, "before_render_create") && $where[$this->pk[$this->list_table[0]]] == 0 ) {
			$data = array();
			$data = $con->before_render_create();
		} 
		
		if ( method_exists($con, "before_render_update") && $where[$this->pk[$this->list_table[0]]] != 0 ) {
			$data = array();
			$data = $con->before_render_update($where[$this->pk[$this->list_table[0]]]);
		} 

		//print_r($data);

		if ( !empty($data) ) {
			$view_notallowed = $data['msg'][2];
			$msg['msg'] = $data['msg'][0];
			$msg['title'] = $data['msg'][1];

			if ( $this->input->is_ajax_request() ) {	
				if ( isset($view_notallowed) ) {
					$params['form'] = $this->load->view($view_notallowed, $msg, true);
					if ( $this->ismodal) {
						$button_form['kembali']  = "<button type='button' class='btn btn-default' data-dismiss='modal'
												onclick='$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").removeClass(\"in\");
														$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").attr(\"aria-hidden\",\"true\");
														$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").css(\"display\", \"none\");
														$(\".modal-backdrop\").remove();
														$(\"body\").removeClass(\"modal-open\");
														setTimeout(function(){ $(\"body\").css(\"padding-right\", 0); }, 1000);'>
													<i class='fas fa-window-close' aria-hidden='true'> </i>
												Tutup</button>";
						$params['ismodal'] = $this->ismodal;
						$params['button_form'] = $button_form;
						$result['html'] = $this->load->view('output/notallowed_modal', $params , true);
					} else  {
						$button_form['kembali']  = "<button type='button' class='btn btn-default' onclick='$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();'>
																   <i class='fas fa-window-close' aria-hidden='true'> </i>
															   Tutup</button>";
						$params['button_form'] = $button_form;
						$result['html'] = $this->load->view('output/notallowed', $params, true);
					}
				} else { 
					$params['form'] = $this->load->view('page_missing/index', $msg, true);
					if ( $this->ismodal) {
						$button_form['kembali']  = "<button type='button' class='btn btn-default' data-dismiss='modal'
												onclick='$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").removeClass(\"in\");
														$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").attr(\"aria-hidden\",\"true\");
														$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").css(\"display\", \"none\");
														$(\".modal-backdrop\").remove();
														$(\"body\").removeClass(\"modal-open\");
														setTimeout(function(){ $(\"body\").css(\"padding-right\", 0); }, 1000);'>
													<i class='fas fa-window-close' aria-hidden='true'> </i>
												Tutup</button>";
						$params['ismodal'] = $this->ismodal;
						$params['button_form'] = $button_form;						
						$result['html'] = $this->load->view('output/notallowed_modal', $params, true);
					} else { 
						$button_form['kembali']  = "<button type='button' class='btn btn-default' onclick='$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();'>
																   <i class='fas fa-window-close' aria-hidden='true'> </i>
															   Tutup</button>";
						$params['button_form'] = $button_form;															   
						$result['html'] = $this->load->view('output/notallowed', $params, true);
					}
				}
				$this->output->set_output( json_encode( $result ) );
			} else {
				if ( isset($view_notallowed) ) {
					$params['form'] = $this->load->view($view_notallowed, $msg, true);
					$this->template->display('output/notallowed', $params, true);
				} else {
					$params['form'] = $this->load->view('page_missing/index', $msg, true);
					$this->template->display('output/notallowed', $params, true);
				}
			}
		} else {
			$this->session->unset_userdata('orders');
			$this->session->set_userdata(array('_isview'=>false));
			
			$ar_hide_search = array();
			foreach($this->search_fields as $k=>$v) {
					if ( $v['ishide'] == TRUE ) {
						$k_ = str_replace(".", "_", $k);
						if ( trim($k_) == trim($this->foreignKey) ) $ar_hide_search[] = $k_;
				}
			}

			$sql = "SELECT ";
			foreach ($this->list_fields as $f=>$v) {
				$f_ = str_replace(".", "_", $v[0]);
				$f_ = str_replace('"', '', $f_);
				if ( $v['free'] == true ) {
					$sql .= "'' as ".$f_.",";	
				} else {
					if ( $v['func'] == '' ) $sql .= $f." as ".$f_.",";
					else $sql .= $v[0].",";
				}
			}
			$sql = substr($sql, 0, strlen($sql)-1);

			$sql .= " from ".$this->list_table[0];
			
			foreach ($this->table_relations as $f) {
				$sql  .= $f;
			}
			
			$where_session = array();
			$sql .= " WHERE ";
			foreach ($where as $k=>$v) {
				$sql .= $k.' =  '.$v;
				$where_session[str_replace(".", "_", $k)] = $v;
			}

			$this->session->set_userdata($where_session);

			if ( sizeOf($this->group_by) != 0 ) {
				$sql_group .=' group by ';
				foreach ($this->group_by as $g) {
					$sql_group .= $g.',';
				}
				$sql_group = substr($sql_group, 0, strlen($sql_group)-1);

				$sql  .= $sql_group;
			}

			$query = $this->db->query($sql);
			if ( $query ) {
				$json = $query->row();
			} else $json = null;
			
			if ( trim($this->view_form) != '' ) $view = trim($this->view_form);
			else $view = $this->session->view_form;

			if ( $this->paramku != '' ) $params['paramku'] = $this->paramku;

			if ( $this->input->is_ajax_request() ) {
			  if ($json == null && $where_ !=0) {
			  		if ( isset($view_notallowed) )
      					$params['form'] = $this->load->view($view_notallowed, $msg, true);
      			else $params['form'] = $this->load->view('page_missing/index', $msg, true);
      			
      			$result['html'] = $this->load->view('output/notallowed', $params, true);
			  } else {
  				$params['form']   = $this->_getform($json, $ar_hide_search, $this->paramku);
  				if ( trim($view) == '' ) {
  					if ($this->ismodal) {
  						$params['ismodal'] = $this->ismodal;
  						$result['html'] = $this->load->view('output/form_modal', $params, true);
  					} else $result['html'] = $this->load->view('output/form', $params, true);
  				} else {
  					if ($this->ismodal) $params['ismodal'] = $this->ismodal;
  					$result['html'] = $this->load->view($view, $params, true);
  				}
			  }
				$this->output->set_output( json_encode( $result ) );
			} else {
			  if ($json == null && $where_!=0) {
  			  if ( isset($view_notallowed) )
  					$params['form'] = $this->load->view($view_notallowed, $msg, true);
  				else $params['form'] = $this->load->view('page_missing/index', $msg, true);
  				
  				if ( trim($view) == '' ) $view = 'output/notallowed';
  				$this->template->display($view, $params);
			  } else {
  				$params['form']   = $this->_getform2($json, $ar_hide_search, $this->paramku);
  				if ( trim($view) == '' ) $this->template->display('output/form2',$params);
  				else  $this->template->display($view,$params);
			  }
			}
		}
	}

	function view($where_=0) {
		
		$dir = APPPATH.substr($this->router->directory, 3);
		$class = ucfirst($this->router->class);
		$method = $this->router->method;
		$cont = $dir.$class;
		require_once $cont.'.php';
		$con = new $class;

		$params['title'] = $this->title;
		$params['table']  = $this->list_table[0];
		$params['controller'] = ucfirst($this->router->class);
		$params['js']     = $this->_addjs($con, $this->list_table[0]);

		$where = array($this->pk[$this->list_table[0]]=>$where_);
		
		if ( method_exists($con, "before_render_view") && $where[$this->pk[$this->list_table[0]]] != 0 ) {
			$data = array();
			$data = $con->before_render_view($where[$this->pk[$this->list_table[0]]]);
		} 
		
		if ( !empty($data) ) {
			$view_notallowed = $data['msg'][2];
			$msg['msg'] = $data['msg'][0];
			$msg['title'] = $data['msg'][1];

			if ( $this->input->is_ajax_request() ) {	
				if ( isset($view_notallowed) ) {
					$params['form'] = $this->load->view($view_notallowed, $msg, true);
					if ( $this->ismodal) {
						$button_form['kembali']  = "<button type='button' class='btn btn-default' data-dismiss='modal'
												onclick='$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").removeClass(\"in\");
														$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").attr(\"aria-hidden\",\"true\");
														$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").css(\"display\", \"none\");
														$(\".modal-backdrop\").remove();
														$(\"body\").removeClass(\"modal-open\");
														setTimeout(function(){ $(\"body\").css(\"padding-right\", 0); }, 1000);'>
													<i class='fas fa-window-close' aria-hidden='true'> </i>
												Tutup</button>";
						$params['ismodal'] = $this->ismodal;
						$params['button_form'] = $button_form;
						$result['html'] = $this->load->view('output/notallowed_modal', $params , true);
					} else  {
						$button_form['kembali']  = "<button type='button' class='btn btn-default' onclick='$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();'>
																   <i class='fas fa-window-close' aria-hidden='true'> </i>
															   Tutup</button>";
						$params['button_form'] = $button_form;
						$result['html'] = $this->load->view('output/notallowed', $params, true);
					}
				} else { 
					$params['form'] = $this->load->view('page_missing/index', $msg, true);
					if ( $this->ismodal) {
						$button_form['kembali']  = "<button type='button' class='btn btn-default' data-dismiss='modal'
												onclick='$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").removeClass(\"in\");
														$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").attr(\"aria-hidden\",\"true\");
														$(\"".strtolower($this->router->class)."_".$this->frmodal." .modal\").css(\"display\", \"none\");
														$(\".modal-backdrop\").remove();
														$(\"body\").removeClass(\"modal-open\");
														setTimeout(function(){ $(\"body\").css(\"padding-right\", 0); }, 1000);'>
													<i class='fas fa-window-close' aria-hidden='true'> </i>
												Tutup</button>";
						$params['ismodal'] = $this->ismodal;
						$params['button_form'] = $button_form;						
						$result['html'] = $this->load->view('output/notallowed_modal', $params, true);
					} else { 
						$button_form['kembali']  = "<button type='button' class='btn btn-default' onclick='$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();'>
																   <i class='fas fa-window-close' aria-hidden='true'> </i>
															   Tutup</button>";
						$params['button_form'] = $button_form;															   
						$result['html'] = $this->load->view('output/notallowed', $params, true);
					}
				}
				$this->output->set_output( json_encode( $result ) );
			} else {
				if ( isset($view_notallowed) ) {
					$params['form'] = $this->load->view($view_notallowed, $msg, true);
					$this->template->display('output/notallowed', $params, true);
				} else {
					$params['form'] = $this->load->view('page_missing/index', $msg, true);
					$this->template->display('output/notallowed', $params, true);
				}
			}
		} else {
			$this->session->unset_userdata('orders');
			$this->session->set_userdata(array('_isview'=>true));
			
			$ar_hide_search = array();
			foreach($this->search_fields as $k=>$v) {
				if ( $v['ishide'] == TRUE ) {
					$k_ = str_replace(".", "_", $k);
					$ar_hide_search[] = $k_;
				}
			}

			/*$this->db->select('*');
			$this->db->from($this->list_table[0]);
			$this->db->where($where);
			$query = $this->db->get();*/
			
			$sql = "SELECT ";
			foreach ($this->list_fields as $f=>$v) {
				$f_ = str_replace(".", "_", $v[0]);
				$f_ = str_replace('"', '', $f_);
				if ( $v['free'] == true ) {
					$sql .= "'' as ".$f_.",";	
				} else {
					if ( $v['func'] == '' ) $sql .= $f." as ".$f_.",";
					else $sql .= $v[0].",";
				}
			}
			$sql = substr($sql, 0, strlen($sql)-1);

			$sql .= " from ".$this->list_table[0];
			
			//print_r($this->table_relations);
			foreach ($this->table_relations as $f) {
				$sql  .= $f;
			}
			
			$sql .= " WHERE ";
			foreach ($where as $k=>$v) {
				$sql .= $k.' =  '.$v;
				$where_session[str_replace(".", "_", $k)] = $v;
			}
			$this->session->set_userdata($where_session);
			
			if ( sizeOf($this->group_by) != 0 ) {
				$sql_group .=' group by ';
				foreach ($this->group_by as $g) {
					$sql_group .= $g.',';
				}
				$sql_group = substr($sql_group, 0, strlen($sql_group)-1);

				$sql  .= $sql_group;
				//$sqlc .= $sql_group;
			}
			
			//echo $sql;
			$query = $this->db->query($sql);

			if ( $query ) {
				$json = $query->row();
			} else $json = null;
			
			if ( trim($this->view_form) != '' ) $view = trim($this->view_form);
			else $view = $this->session->view_form;

			if ( $this->paramku != '' ) $params['paramku'] = $this->paramku;


			
			if ( $this->input->is_ajax_request() ) {
			  if ($json == null) {
			  		if ( isset($view_notallowed) )
      					$params['form'] = $this->load->view($view_notallowed, $msg, true);
      			else $params['form'] = $this->load->view('page_missing/index', $msg, true);
      			
      			$result['html'] = $this->load->view('output/notallowed', $params, true);
			  } else {
  				$params['form']   = $this->_getview($json, $ar_hide_search, $this->paramku);
  				if ( trim($view) == '' ) {
  					if ( $this->ismodal ) {
  						$params['ismodal']	= $this->ismodal;
  						$result['html'] = $this->load->view('output/view_modal', $params, true);
  					} else $result['html'] = $this->load->view('output/view', $params, true);
  				} else {
  					if ($this->ismodal) $params['ismodal'] = $this->ismodal;
  					$result['html'] = $this->load->view($view, $params, true);
  				}
			  }
				$this->output->set_output( json_encode( $result ) );
			} else {
			  if ($json == null) {
  			  if ( isset($view_notallowed) )
  					$params['form'] = $this->load->view($view_notallowed, $msg, true);
  				else $params['form'] = $this->load->view('page_missing/index', $msg, true);
  				
  				if ( trim($view) == '' ) $view = 'output/notallowed';
  				$this->template->display($view, $params);
			  } else {
  				$params['form']   = $this->_getview2($json, $ar_hide_search, $this->paramku);
  				if ( trim($view) == '' ) $this->template->display('output/view2',$params);
  				else  $this->template->display($view,$params);
			  }
			}
		}
	}

	function delete($id) {
        
        $dir = APPPATH.substr($this->router->directory, 3);
        $class = ucfirst($this->router->class);
        $method = $this->router->method;
        $cont = $dir.$class;
        require_once $cont.'.php';
        $con = new $class;
		
		
		if ( method_exists($con, "before_render_delete") && $id != 0 ) {
			$data = array();
			$data = $con->before_render_delete($id);
		} 

		if ( empty($data) ) {
			//before delete
			$oldpost = array();
			if ( method_exists($con, 'before_delete_processor') && $id != 0 ) {
				$oldpost = $con->before_delete_processor($id);
			} else {
				$sql = "SELECT ";
				foreach ($this->list_fields as $f=>$v) {
					if ( explode('.', $f)[0] == $this->list_table[0] ) {
						$f_ = str_replace(".", "_", $v[0]);
						$f_ = str_replace('"', '', $f_);
						$f_ = strtolower($f_);
						if ( $v['free'] == true ) {
							$sql .= "'' as ".$f_.",";	
						} else {
							if ( $v['func'] == '' ) $sql .= $f." as ".$f_.",";
							else $sql .= $v[0].",";
						}
					}
				}
				$sql = substr($sql, 0, strlen($sql)-1);

				$sql .= " from ".$this->list_table[0];
				$sql .= " where id={$id}";
				$oldpost = $this->db->query($sql)->row();
			}
			// end before
					
			$this->db->delete($this->list_table[0], array('id' => $id));
			write_log($this->db->last_query());
			
			if ( $this->db->affected_rows() > 0 ) {
					$this->session->unset_userdata('orders');
				if ( method_exists($con, "after_delete_processor")) {
					try {
						$con->after_delete_processor($id, $oldpost);
					} catch(Exception $e) {
					  $data['status'] = FALSE;
					  $data['msg'] = $e->getMessage();
					}
				}
				$data['status'] = TRUE;
				$data['msg'] = 'Hapus berhasil.';
			} else {
				$data['status'] = FALSE;
				$data['msg'] = 'Unknown Error';
			}
		}

		echo json_encode($data);
	}

	protected function getrow($conn='', $table, $fields='*', $where=[], $group_by='', $order_by=array(), $limit='', $is_array=false) {
		if ($conn == '')
		  $dbs = $this->db;
		else $dbs = $conn;
		
		$dbs->select($fields);
		
		if ($where != '' ) {
			foreach($where as $key=>$value) {
				if ( is_array($value) ) {
					$mode = strval($value['mode']);
					if ( !empty($mode) ) $dbs->$mode($key, $value['value']);
				} else $dbs->where($key, $value);
			}
		}

		if ($group_by != '' ) $dbs->group_by($group_by);
		if ($order_by != '') {
		  foreach($order_by as $k=>$v) {
		      $dbs->order_by($k, $v);
		  }
		}
		if ($limit != '') $dbs->limit($limit);
		$query = $dbs->get($table);
		//write_log(json_encode($this->dbex->last_query()));
		//echo $dbs->last_query();exit;
		if ( $query ) {
			if (!$is_array) return $query->row();
			else return $query->row_array();
		} else return null;
	}

	protected function getall($conn='', $table, $fields='*', $where=[], $group_by='', $order_by=array(), $limit='', $is_array=false) {
		if ($conn == '')
		  $dbs = $this->db;
		else $dbs = $conn;
		
		$dbs->select($fields);
		
		if ($where != '' ) {
			foreach($where as $key=>$value) {
				if ( is_array($value) ) {
					$mode = strval($value['mode']);
					if ( !empty($mode) ) $dbs->$mode($key, $value['value']);
				} else $dbs->where($key, $value);
			}
		}
		if ($group_by != '' ) $dbs->group_by($group_by);
		if ($order_by != '') {
		  foreach($order_by as $k=>$v) {
		    $dbs->order_by($k, $v);
		   }
		}
		if ($limit != '') $dbs->limit($limit);
		$query = $dbs->get($table);
		//echo $this->dbex->last_query();
		//exit;
		//write_log($this->dbex->last_query());
		if ( $query ) {
			if ( !$is_array ) return $query->result();
			else return $query->result_array();
		} else return null;
	}
	
	protected function getnamahari($day) {
		$nama_hari = array(
			'Minggu', 
			'Senin', 
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu'
		);
	  
	  return $nama_hari[$day];
	}

	function _dateDifferences($date1, $date2, $differenceFormat = '%d Day %h Hours %i Minute %s Seconds') {
        $datetime1 = date_create($date1);
        $datetime2 = date_create($date2);

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format($differenceFormat);
	}

	function _penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->_penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->_penyebut($nilai/10)." puluh". $this->_penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . $this->_penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->_penyebut($nilai/100) . " ratus" . $this->_penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . $this->_penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->_penyebut($nilai/1000) . " ribu" . $this->_penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->_penyebut($nilai/1000000) . " juta" . $this->_penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->_penyebut($nilai/1000000000) . " milyar" . $this->_penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->_penyebut($nilai/1000000000000) . " trilyun" . $this->_penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
	
	function _terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->_penyebut($nilai));
		} else {
			$hasil = trim($this->_penyebut($nilai));
		}     		
		return $hasil;
	}
	
	function getSysparam($isall='', $ckode='') {
		if ( $isall != '*' ) {
			return (object)(json_decode("[".str_replace('""', '', $this->getrow('', 'sysparam', 'visi', 
				($ckode == '' ? array('ldeleted'=>0) : array('ckode'=>$ckode, 'ldeleted'=>0))
			)->visi)."]"))[0];
		} else { 
			$rs_sysparam = $this->getall('', 'sysparam', 'ckode, visi', 
						($ckode == '' ? array('ldeleted'=>0) : array('ckode'=>$ckode, 'ldeleted'=>0))
					);
			$sysparam = array();
			foreach($rs_sysparam as $rs) {
				$sysparam[trim($rs->ckode)] = (array)(json_decode("[".str_replace('""', '', trim($rs->visi))."]"))[0];
			}
			return (object)$sysparam;
		}
	}
	
	public function uploadfiles($files, $check=true) {
		$tmp_name = '';
		$rel_name = '';
		$err_name = '';
		$typ_name = '';
		$siz_name = '';

		foreach ($files as $key=>$values) {

			if (preg_match('/^name(.*)$/', $key, $match)) {
				$rel_name = $values;
			}

			if (preg_match('/^tmp_name(.*)$/', $key, $match)) {
				$tmp_name = $values;

			}

			if (preg_match('/^error(.*)$/', $key, $match)) {
				$err_name = $values;
			}

			if (preg_match('/^type(.*)$/', $key, $match)) {
				$typ_name = $values;
			}

			if (preg_match('/^size(.*)$/', $key, $match)) {
				$siz_name = $values;
			}
		}

    $data = array();
  	if ( $check && $siz_name <= (int) $this->session->sysparam->max_size_upload[0] ) {
  		
  			$file    = file_get_contents(realpath($tmp_name));
  			$escaped = base64_encode($file);//pg_escape_bytea($data);
  			$type    = $typ_name;
  			
  			$data['file'] = $escaped;
  			//$data['tmp'] = $tmp_name;
  	}
  	
  	$data['name'] = $rel_name;
  	$data['tmp'] = $tmp_name;
		$data['type'] = $typ_name;
		$data['size'] = $siz_name;

		return (object)$data;
	}
	
	/* end my library */
}
