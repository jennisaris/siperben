function getHTML(url, kriteria, page) {
 
 return $.ajax({
		type: 'POST',
		url: url+'/'+page,
		data:kriteria,
		async: false
			
	}).responseText
}

function save_confirm(url, form, pesan, table_id, callback) {	
	var jwb = confirm(pesan);
	if ( jwb == 1 ) {
		$.ajax({
			url: url,
			type: 'post',
			data: form,
			beforeSend: function() {
	            //alert('sending data');
	            // do some loading options
	            $("#divLoading").addClass('show');
	        },
	        success: function(data) {
	            callback(data); // return data in callback
				$("#divLoading").removeClass('show');
	        },
	 
	        complete: function() {
	            //alert('ajax call complete');
	            // success alerts				
	        },
	 
	        error: function(xhr, status, error) {
	            alert(xhr.responseText); // error occur 
	        }
		});		
	}
}

function hapus_confirm(url, pesan, div, url2, kriteria) {		
	hapus(url, pesan, div, function(output) {
		if ( output > 0 ) {
			reload_grid(url2, div, $('#'+kriteria).val());
			$('#panel-body-form').hide();	
		}
	})
}

function hapus(url, pesan, table_id, callback) {
	var jwb = confirm(pesan);
	if ( jwb == 1 ) {
		$.ajax({
			url: url,
			type: 'post',
			beforeSend: function() {
	            //alert('sending data');
	            // do some loading options
	            $("#divLoading").addClass('show');
	        },
	        success: function(data) {
	            callback(data); // return data in callback
	            $("#divLoading").removeClass('show');
	        },
	 
	        complete: function() {
	            //alert('ajax call complete');
	            // success alerts
	        },
	 
	        error: function(xhr, status, error) {
	            alert(xhr.responseText); // error occur 
	        }
		})
	}
}

//reload grid - FIXED: async agar tidak freeze browser
function reload_grid(url, table_id, page, frm='') {
	if ( page == '' || page === undefined || page === null ) page = 0;

	// OPTIMIZED: tanpa spinner/placeholder loading; biarkan data lama sampai data baru masuk
	$('#'+table_id+'_paging-table-data').html('');

	var form_search = $('#'+table_id+'_form_search').serializeArray();

	$.ajax({
		type: 'POST',
		url: url + '/' + page,
		data: form_search,
		success: function(responseText) {
			try {
				var o = jQuery.parseJSON(responseText);
				var html = (o.html && o.html.html !== undefined) ? o.html.html : (o.html || '');
				$('#'+table_id+'_table-data').html(html);
				$('#'+table_id+'_paging-table-data').html(o.pagination || '');
				if ( frm != '' ) {
					$('html,body').animate({
						scrollTop: $("#"+frm).offset().top
					},'slow');
				}
			} catch(e) {
				$('#'+table_id+'_table-data').html(
					"<div style='padding:20px;color:red;'>"
					+ "<b>Gagal memuat data.</b> Silakan refresh halaman.<br/>"
					+ "<small>" + responseText.substring(0, 200) + "</small>"
					+ "</div>"
				);
			}
		},
		error: function(xhr, status, error) {
			$('#'+table_id+'_table-data').html(
				"<div style='padding:20px;color:red;'>"
				+ "<b>Error memuat data:</b> " + error
				+ "</div>"
			);
		}
	});
}

//get paging data
function get_paging(url, table_id, page) {		
	reload_grid(url, table_id, page);
}

//getZendLuceneSearch
function doZendLuceneSearch(url, jenis, kriteria) {
	$('#display_zend_result').html('');
	$.post(url, {jns:jenis, krit:kriteria}, function(data) {
		var rslt = jQuery.parseJSON(data);
		$('#display_zend_result').html(rslt.html);
	});
}

function updateUnreadChat(url, id, is_petugas) {
		return $.ajax({
		type: 'POST',
		url: url,
		data:'id='+id+'&is_petugas='+is_petugas,
		async: false			
	}).responseText
}

function getRole(url, id) {
	return $.ajax({
		type: 'POST',
		url: url,	
		data:'id='+id,		
		async: false
			
	}).responseText
}

function getStatusLayanan(url, id) {
	return $.ajax({
		type: 'POST',
		url: url,	
		data:'id='+id,		
		async: false
			
	}).responseText
}

function getStatusRequest(url, id) {	
	return $.ajax({
		type: 'POST',
		url: url,	
		data:'id='+id,		
		async: false
			
	}).responseText
}
	  	
function getStatusTanya12(url, id) {
	return $.ajax({
		type: 'POST',
		url: url,	
		data:'id='+id,		
		async: false
			
	}).responseText
}	

function checkDanUpdateStatusLapor(url, id) {
	$.post(url, {id:id}, function(data) {
		
	});
} 

function scrollToBottom(id) {
	var scroll = document.getElementById(id);
	scroll.scrollTop = scroll.scrollHeight;
	scroll.animate({scrollTop: scroll.scrollHeight});
}

function stopDefaultBackspaceBehaviour(event) {
  var event = event || window.event;
  //alert(event.keyCode);
  if (event.keyCode == 8) {
    var elements = "HTML, BODY, TABLE, TBODY, TR, TD, DIV, TEXTAREA";//, INPUT
    var d = event.srcElement || event.target;
    var regex = new RegExp(d.tagName.toUpperCase());
    if (regex.test(elements)) {
      event.preventDefault ? event.preventDefault() : event.returnValue = false;
    }
  }
}

function stopDefaultBackspaceBehaviourM(event, id) {
	var event = event || window.event;
	//alert(event.keyCode);
	//alert(id);
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

function updateNotifOnlineChat(url) {
	return $.ajax({
		type: 'POST',
		url: url,	
		data:'id=1',		
		async: false			
	}).responseText
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
