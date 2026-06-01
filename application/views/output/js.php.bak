<?php ?>
<script type='text/javascript'>
    var debug =false;
    var isloading = true;

    //var debug =true;
    //var isloading = false;

    var color_success = '#078236';
    var color_failed  = '#940d0d';

    /*setInterval(async () => {
        const result = await checkOnlineStatus();
        const statusDisplay = document.getElementById("network_status");
        statusDisplay.textContent = result ? "Online" : "OFFline";
    }, 3000); // probably too often, try 30000 for every 30 seconds*/

    function getHTML2(url_, kriteria, page) {
	    return $.ajax({
		    type: 'POST',
		    url: url_+'/'+page,
		    data:kriteria,
		    async: false

	    }).responseText
    }

    function getHTML3(url_, kriteria, page) {
      var btn_save_label = $('.btn_save').html();
	    return $.ajax({
		    type: 'POST',
		    url: url_+'/'+page,
		    data:kriteria,
		    async: false,
		    beforeSend: function() {
                // alert('sending data');
                // do some loading options
			    //alert('test');
			    
                if ( isloading==true ) $("#divLoading").addClass('show');
                if ( !debug ) {
                    $('button').attr('disabled', true);
                    $('.btn_save').html("<i class='fas fa-cog fa-spin'> </i> Mohon Tunggu...");
                }
            },
            success: function(data) {
            	hasil = data;
            	if ( hasil == '' ) {
            		bootbox.alert('Sesi anda sudah habis. Silahkan login kembali. ');
            		if ( !debug ) location.reload(true);
            	}
                if ( isloading==true ) $("#divLoading").removeClass('show');
			    if ( !debug ) {
				    $('button').removeAttr('disabled');
				    //$('.btn_save').html("<i class='fa fa-save' aria-hidden='true'> </i> Simpan");
				    $('.btn_save').html(btn_save_label);
			    }
            },

            error: function(xhr, status, error) {
                bootbox.alert(xhr.responseText); // error occur
			    if ( !debug ){
				    $('button').removeAttr('disabled');
				    //$('.btn_save').html("<i class='fa fa-save' aria-hidden='true'> </i> Simpan");
				    $('.btn_save').html(btn_save_label);
			    }
            }
	    }).responseText
    }

    function getHTML(url_, kriteria, page, isloading=true) {
      var btn_save_label = $('.btn_save').html();
	    var hasil = '';
        $.ajax({
		    type: 'POST',
		    url: url_+'/'+page,
		    data:kriteria,
		    async: false,
		    beforeSend: function() {
                // alert('sending data');
                // do some loading options
		    //	alert('test');
          if ( isloading==true ) $("#divLoading").addClass('show');
			    if ( !debug ) {
				    $('button').attr('disabled', true);
				    $('.btn_save').html("<i class='fas fa-cog fa-spin'> </i> Mohon Tunggu...");
			    }
            },
            success: function(data) {
            	//alert('success');
                //callback(data); // return data in callback
                //alert(url+'/'+page);
                //alert(data);
            	hasil = data;
            	if ( hasil == '' ) {
            		bootbox.alert('Sesi anda sudah habis. Silahkan login kembali. ');
            		if ( !debug ) location.reload(true);
            	}
                if ( isloading==true ) $("#divLoading").removeClass('show');
                if ( !debug ) {
									    $('button').removeAttr('disabled');
									    //$('.btn_save').html("<i class='fa fa-save' aria-hidden='true'> </i> Simpan");
									    $('.btn_save').html(btn_save_label);
						    }
            },

            complete: function() {
            	//alert('complete');
                // alert('ajax call complete');
                // success alerts
			    if ( !debug ) $('button').removeAttr('disabled');
            },

            error: function(xhr, status, error) {
                bootbox.alert(xhr.responseText); // error occur
			    if ( !debug ){
				    $('button').removeAttr('disabled');
				    //$('.btn_save').html("<i class='fa fa-save' aria-hidden='true'> </i> Simpan");
				    $('.btn_save').html(btn_save_label);
			    }
            }

	    });
       return hasil;
    }
	
	function save_confirm(url_, form, pesan, table_id, _ismodal=false, callback, _isOldFashion=false) {
	  var btn_save_label = $('.btn_save').html();
		if (!_isOldFashion) {
			bootbox.confirm({
				message: pesan,
				buttons: {
					confirm: {
						label: '<i class="fa fa-check" aria-hidden="true">&nbsp;</i>Yes',
						className: 'btn-success'
					},
					cancel: {
						label: '<i class="fa fa-close" aria-hidden="true">&nbsp;</i>No',
						className: 'btn-danger'
					}
				},
				callback: function(jwb) {
					if ( jwb ) {
						$.ajax({
							url: url_,
							data: form,
							cache: false,
							contentType: false,
							processData: false,
							type: 'post',
							beforeSend: function() {
								// alert('sending data');
								// do some loading options
								if ( isloading==true ) $("#divLoading").addClass('show');
								if ( !debug ) {
									$('button').attr('disabled', true);
									$('.btn_save').html("<i class='fas fa-cog fa-spin'> </i> Mohon Tunggu...");
								}
							},
							success: function(data) {
								if ( data == '' ) {
									bootbox.alert('Sesi anda sudah habis. Silahkan login kembali. ');
									if ( !debug ) location.reload(true);
								} else {
									callback(data); // return data in callback
									if ( isloading==true ) $("#divLoading").removeClass('show');
									if ( !debug ) {
										$('button').removeAttr('disabled');
										//$('.btn_save').html("<i class='fa fa-save' aria-hidden='true'> </i> Simpan");
										$('.btn_save').html(btn_save_label);
									}
								}
							},

							complete: function() {
								// alert('ajax call complete');
								// success alerts
								if ( !debug ) $('button').removeAttr('disabled');
							},

							error: function(xhr, status, error) {
								bootbox.alert(xhr.responseText); // error occur
								if ( !debug ){
									$('button').removeAttr('disabled');
									//$('.btn_save').html("<i class='fa fa-save' aria-hidden='true'> </i> Simpan");
									$('.btn_save').html(btn_save_label);
								}
							}
						});
					} 
				}
			});
		} else {
			var jwb = confirm(pesan);
			if (jwb) {
				$.ajax({
					url: url_,
					data: form,
					cache: false,
					contentType: false,
					processData: false,
					type: 'post',
					beforeSend: function() {
						// alert('sending data');
						// do some loading options
						if ( isloading==true ) $("#divLoading").addClass('show');
						if ( !debug ) {
							$('button').attr('disabled', true);
							$('.btn_save').html("<i class='fas fa-cog fa-spin'> </i> Mohon Tunggu...");
						}
					},
					success: function(data) {
						if ( data == '' ) {
							bootbox.alert('Sesi anda sudah habis. Silahkan login kembali. ');
							if ( !debug ) location.reload(true);
						} else {
							callback(data); // return data in callback
							if ( isloading==true ) $("#divLoading").removeClass('show');
							if ( !debug ) {
								$('button').removeAttr('disabled');
								//$('.btn_save').html("<i class='fa fa-save' aria-hidden='true'> </i> Simpan");
								$('.btn_save').html(btn_save_label);
							}
						}
					},

					complete: function() {
						// alert('ajax call complete');
						// success alerts
						if ( !debug ){
							$('button').removeAttr('disabled');
							//$('.btn_save').html("<i class='fa fa-save' aria-hidden='true'> </i> Simpan");
							$('.btn_save').html(btn_save_label);
						}
					},

					error: function(xhr, status, error) {
						bootbox.alert(xhr.responseText); // error occur
						if ( !debug ) $('button').removeAttr('disabled');
					}
				});
			}
		}
	}

    function hapus(url, pesan, div, url2, kriteria, _msg='Hapus berhasil.') {

        hapus_confirm(url, pesan, div, function(output) {
            var o = jQuery.parseJSON(output);
            if ( o.status > 0 ) {
                //bootbox.alert(msg);
                if ( typeof(o.msg) != 'undefined' ) _msg = o.msg;
                bootbox_alert('', '', _msg, true);
                reload_grid(url2, div, $('#'+kriteria).val());
                $('#'+div+'-panel-default-form').hide();
            } else {
                $("#divLoading").removeClass('show');
                if ( typeof(o.msg) != 'undefined' ) {
                    bootbox_alert('', '', o.msg, false, false);//bootbox.alert(o.msg);
                }
            }
        })
    }

    function hapus_confirm(url_, pesan, table_id, callback) {
        bootbox.confirm({
            message: pesan,
            buttons: {
                confirm: {
                    label: '<i class="fa fa-check" aria-hidden="true">&nbsp;</i>Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: '<i class="fa fa-close" aria-hidden="true">&nbsp;</i>No',
                    className: 'btn-danger'
                }
            }, 
            callback: function(jwb) {
                if ( jwb ) {
                    $.ajax({
                        url: url_,
                        type: 'post',
                        beforeSend: function() {
                            // alert('sending data');
                            // do some loading options
                            if ( isloading==true ) $("#divLoading").addClass('show');
                            if ( !debug ) $('button').attr('disabled', true);
                        },
                        success: function(data) {
                            if ( data == '' ) {
                                bootbox.alert('Sesi anda sudah habis. Silahkan login kembali. ');
                                location.reload(true);
                            } else {
                                callback(data); // return data in callback
                                if ( isloading==true ) $("#divLoading").removeClass('show');
                                if ( !debug ) $('button').removeAttr('disabled');
                            }
                        },

                        complete: function() {
                            // alert('ajax call complete');
                            // success alerts
                        },

                        error: function(xhr, status, error) {
                            bootbox.alert(xhr.responseText); // error occur
                            if ( !debug ) $('button').removeAttr('disabled');
                        }
                    })
                }
            }
        });
    }

    // reload grid
    function reload_grid(url, table_id, page, frm='', order_by='', is_loading=true, is_window_opener=false) {
        //alert('url : '+url);
        //return false;
        // $("#divLoading").addClass('show');
        if (is_loading) $('#'+table_id+'_table-data').html("<tr><td colspan='100'>Mohon tunggu....</td></tr>");

        if ( page == '' || page === undefined || page === null ) page = 0;

        var form_search;
        if ( !is_window_opener )
            form_search = $('#'+table_id+'_form_search').serializeArray();
        else form_search = $('#'+table_id+'_form_search', window.opener.document).serializeArray();
        
        form_search.push({name: 'order_by', value: order_by});
        var o = jQuery.parseJSON(getHTML(url, form_search, page, is_loading));

        if ( !is_window_opener ) {
            $('#'+table_id+'_table-data').html(o.html.html);
            $('#'+table_id+'_paging-table-data').html(o.pagination);
        } else {
            $('#'+table_id+'_table-data', window.opener.document).html(o.html.html);
            $('#'+table_id+'_paging-table-data', window.opener.document).html(o.pagination);
        }

        if ( frm != '' ) {
            $('html,body').animate({
                scrollTop: $("#"+frm).offset().top
            },'slow');

            //$('#panel-body-form').hide();
        } else {
            // do nothing
            //$('#panel-default-form').hide();
        }
        // $("#divLoading").removeClass('show');
    }

    // get paging data
    function get_paging(url, table_id, page) {
        //alert(table_id+' '+page);
        reload_grid(url, table_id, page);
        $('#'+table_id+'-panel-default-form').hide();
    }

    function ordering(url, table_id, fields) {
        reload_grid(url, table_id, 0, '', fields, '', false);
        $('#'+table_id+'-panel-default-form').hide();
    }

    // getZendLuceneSearch
    function doZendLuceneSearch(url, jenis, kriteria) {
        $('#display_zend_result').html('Mohon tunggu.. sedang melakukan query');
        $.post(url, {jns:jenis, krit:kriteria}, function(data) {
            var rslt = jQuery.parseJSON(data);
            $('#display_zend_result').html(rslt.html);
        });
    }

    function getRole(url_, id) {
        return $.ajax({
            type: 'POST',
            url: url_,
            data:'id='+id,
            async: false

        }).responseText
    }

    function scrollToBottom(id) {
        var scroll = document.getElementById(id);
        scroll.scrollTop = scroll.scrollHeight;
        scroll.animate({scrollTop: scroll.scrollHeight});
    }

    function stopDefaultBackspaceBehaviour(event) {
    var event = event || window.event;
    // alert(event.keyCode);
    if (event.keyCode == 8) {
        var elements = "HTML, BODY, TABLE, TBODY, TR, TD, DIV, TEXTAREA";// ,
                                                                            // INPUT
        var d = event.srcElement || event.target;
        var regex = new RegExp(d.tagName.toUpperCase());
        if (regex.test(elements)) {
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        }
    }
    }

    function stopDefaultBackspaceBehaviourM(event, id) {
        var event = event || window.event;
        // alert(event.keyCode);
        // alert(id);
        $('body').keydown(function (e) {
            if ($('#'+id).is(':visible')) {
                var rx = /INPUT|SELECT|TEXTAREA/i;
                if (e.keyCode == 8) {
                    if(!rx.test(e.target.tagName) || e.target.disabled || e.target.readOnly ){
                        e.preventDefault();
                    }
                }
            }
        });
    }

    function setup_tinymce() {
        var url = base_url+'processor/smsc/master/imagegallery_popup';
        tinymce.init({
            theme:"advanced",
            width : 870,
            selector: "textarea.html",
            "theme_advanced_toolbar_location":"top",
            "theme_advanced_toolbar_align":"left",
            "theme_advanced_path_location":"bottom",
            "theme_advanced_buttons1_add":"fontsizeselect,pagebreak",
            "theme_advanced_buttons2_add":"imagegallery",
            "cleanup":true,
            "setup":function(ed) {
                ed.addButton("imagegallery",{title:"Image Gallery",image:"/erp/assets/images/imagegallery.gif",
                    onclick:function(){
                        browse(url+'?company_id=3&modul_id=2696&group_id=60','Image Gallery');
                    }
                });
            }
        });
    }
    function changeValueAndState(id, txt, state) {
        $('#'+id).prop('disabled', state);
        if ( txt != '' ) $('#'+id).html(txt);
    }

    function reformat_date(val) {
        return $.datepicker.formatDate('dd-mm-yy', new Date(val));
    }

    function fill_the_div(url, kriteria, divid) {
        var html = getHTML(url, kriteria);
        $('#'+divid).html(html);
    }

    function showDivConfirm(url) {
        var a_href = (location.href).split('/');
        var o = jQuery.parseJSON(getHTML(url));

        if ( o.total > 0 && jQuery.inArray(a_href[5], o.url) == -1 ) {
            $('#myModal_confirm #modal-isi').html(o.html);
            $('#myModal_confirm').modal('show');
        }
    }

    function edit(url, table_id, _ismodal=false, _modals='') {
        var data = jQuery.parseJSON(getHTML(url));
        if ( !_ismodal ) {
            $('#'+table_id+'-panel-default-form').show();
            //$('#panel-default-view').hide();

            $('#'+table_id+'-panel-default-form').html(data['html']);

            if ( $('#'+table_id+'-panel-body-form').is(':hidden') ) $('#'+table_id+'-panel-body-form').toggle();

            $('html,body').animate({
                scrollTop: $("#"+table_id+"-panel-default-form").offset().top
            },'slow');
        } else {
            $('#'+table_id+'-panel-default-form').html(data['html']);
            $('#'+_modals).modal('toggle');
        }
    }

    function view(url, table_id) {
        var data = jQuery.parseJSON(getHTML(url));
        $('#'+table_id+'-panel-default-form').show();

        $('#'+table_id+'-panel-default-form').html(data['html']);

        if ( $('#'+table_id+'-panel-body-form').is(':hidden') ) $('#'+table_id+'-panel-body-form').toggle();

        $('html,body').animate({
            scrollTop: $("#"+table_id+"-panel-default-form").offset().top
        },'slow');
    }
	
	function save(url, table_id, default_txt_confirm='', _ismodal=false, _modals='form-modal', _islochref=false, _isneedrefresh=true, _isneededit=false, _isOldFashion=false, _msg='Simpan berhasil.', table_id2) {
		//var form = $('#'+table_id+'_form-edit').serialize();
		if ( default_txt_confirm == '' ) default_txt_confirm='Simpan. Anda yakin?';
		if ( _modals == '' ) _modals='form-modal';
        if ( table_id2 == '' || typeof(table_id2) == 'undefined' ) table_id2 = table_id;

		var form_name = table_id+'_form-edit';
		var formData = new FormData(jQuery('#'+form_name)[0]);
		save_confirm(url+"/save", formData, default_txt_confirm, table_id, _ismodal, function(output) {
			var o = jQuery.parseJSON(output);
			$('div').removeClass('has-error');
			if ( o.status == true ) {
			  
				if ( o.msg != '' && typeof(o.msg) != 'undefined' ) bootbox_alert('', '', o.msg, true);
				else bootbox_alert('', '', _msg, true);
				
				if ( _islochref == false ) {
					if ( _isneedrefresh ) reload_grid(url+"/lists", table_id, '', table_id+'-panel-default-form');
                    if ( _isneededit ) { 
                        edit(url+"/edit/"+o.id, table_id, _ismodal, _modals);
                        setTimeout(function(){ $('body').css('padding-right', 0); }, 1000);
                    } else {
                        if ( _ismodal ) {
                            $('#'+table_id2+'_form-modal').hide();
                            $(table_id2+'_form-modal .modal').removeClass('in');
                            $(table_id2+'_form-modal .modal').attr('aria-hidden','true');
                            $(table_id2+'_form-modal .modal').css('display', 'none');
                            $('.modal-backdrop').remove();
                            $('body').removeClass('modal-open');
                            setTimeout(function(){ $('body').css('padding-right', 0); }, 1000);                            
                        } else {
                            $('#'+table_id+'-panel-default-form').hide();
                        }
                    }
				} else {
				  setTimeout(function(){ location.href = url+'/edit/'+o.id; }, 2000);
					//location.href = url+'/edit/'+o.id;
				}
			} else {
				if (_modals == '') _modals='form-modal';
				if ( o.msg != undefined) {
                    bootbox_alert('', '', o.msg, false, false);//bootbox.alert(o.msg);
                }
				$('.'+o.obj).focus();
				$('div .div_'+o.obj).addClass('has-error');
				if ( _ismodal ) $('#'+_modals).css('overflow', 'scroll')
				return false;
			}
		}, _isOldFashion);
	}

    function ucwords(str) {
        str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        
        return str;
    }

    function _browse(url, _id='#myModal_browse #html_telusuri') {
        var url1 = url;
        var o = getHTML(url1);
        $(_id).html(o);
    }

    function bootbox_alert(milliseconds='', title='', message='', timeout=false, isok=true){
        if (milliseconds=='') milliseconds=2000;

        var _successmessage = '<div style="text-align:center;">';
            _successmessage += '<span style="vertical-align:4px;font-size: 48px; color: ___color___;">';
            _successmessage += '<i class="___icon___"></i>';
            _successmessage += '</span>';
            _successmessage += '</div>';
            _successmessage += '<div style="text-align:center;">';
            _successmessage += '<span style="color:___colortxt___;font-weight:bold;">';
            _successmessage += '___message___';
            _successmessage += '</span>';
            _successmessage += '</div>';

        var color = color_success;
        var icon  = 'fas fa-check-circle';
        if ( !isok ) {
            color = color_failed;
            icon = 'fas fa-times-circle';
        }

        _successmessage = _successmessage.replace('___color___', color);
        _successmessage = _successmessage.replace('___colortxt___', color);
        _successmessage = _successmessage.replace('___icon___', icon);
        _successmessage = _successmessage.replace('___message___', message);
        

        if ( !timeout ) {
            var dialog = bootbox.dialog({
                title:title,
                message: _successmessage,
                closeButton: false,
                buttons: {
                    cancel:{
                        label:"<i class=\"fas fa-times-circle\"'></i> Tutup",
                        className: "btn btn-danger"
                    }
                }
            });
        } else {
            var dialog = bootbox.dialog({
                title:title,
                message: _successmessage,
                closeButton: false
            });
        }


        if ( timeout ) {
            setTimeout(function(){ 
                dialog.modal('hide');
            }, milliseconds);
        }


        setTimeout(function(){ 
            console.log('>>> reset_width <<<<');
            $('body').css('padding-right', 0);
        }, 3000); 
    }
    
</script>
