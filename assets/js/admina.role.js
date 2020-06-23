var table = '';
var selectParent = '';
var selectDepartment = '';

$('a[href="#menuTim"]').attr('aria-expanded', 'true');
$('#menuTim').addClass('show');
$('#li-role').addClass('active');

$(document).ready(function(){
	table = $('#tableRole').DataTable({
		'processing'	: true,
        'serverSide'	: true,

        'ajax' : {
        	'url'	: baseurl + 'role/datatable/',
            'type'	: 'GET',
            'dataSrc' : function(response){
            	var i = response.start;
            	var row = new Array();
            	if (response.result) {
            		for(var x in response.data){
            			var button = '<button id="'+ response.data[x].id +'" name="btn_edit" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-edit"></i></button> <button id="'+ response.data[x].id +'" name="btn_delete" class="btn btn-danger btn-sm" title="Hapus Data"><i class="fa fa-trash"></i></button>';

	            		row.push({
	            			'no'                : i,
                            'name'              : response.data[x].name,
                            'display_name'      : response.data[x].display_name,
                            'parent_name'       : response.data[x].parent_name,
                            'department_name'   : response.data[x].department_name,
                            'description'       : response.data[x].description,
	            			'aksi'	             : button
	            		});
	            		i = i + 1;
	            	}

	            	response.data = row;
            		return row;
            	} else{
            		response.draw = 0;
            		return [];
            	}
            }
        },

        'columns' : [
        	{ 'data' : 'no' },
            { 'data' : 'name' },
            { 'data' : 'display_name' },
            { 'data' : 'parent_name' },
            { 'data' : 'department_name' },
            { 'data' : 'description' },
        	{ 'data' : 'aksi' }
        ],

        'order' 	: [[ 1, 'ASC' ]],

		'columnDefs': [
    		{
    			'orderable'	: false,
    			'targets'	: [ 0, 6 ]
    		}
  		]
	});

    $.ajax({
        type: 'GET',
        url: baseurl + 'role/select-parent/',
        dataType: 'json',
        success: function(response){
            if(response.result){
                $('select[name="id_parent"]').append('<option value="0">- Pilih Parent -</option>');
                for(var x in response.data){
                    $('select[name="id_parent"]').append('<option value="'+ response.data[x].id +'">'+response.data[x].name+'</option>');
                }
            } else{
                $('select[name="id_parent"]').append('<option value="0">- Pilih Parent -</option>');
            }
        }
    });
    selectParent = $('select[name="id_parent"]').select2({
        'theme': 'bootstrap4'
    });

    $.ajax({
        type: 'GET',
        url: baseurl + 'role/select-department/',
        dataType: 'json',
        success: function(response){
            if(response.result){
                $('select[name="id_dept"]').append('<option value="0">- Pilih Department -</option>');
                for(var x in response.data){
                    $('select[name="id_dept"]').append('<option value="'+ response.data[x].id +'">'+response.data[x].name+'</option>');
                }
            } else{
                $('select[name="id_dept"]').append('<option value="0">- Pilih Department -</option>');
            }
        }
    });
    selectDepartment = $('select[name="id_dept"]').select2({
        'theme': 'bootstrap4'
    });
});

$('button[name="btn_add"]').click(function(){
	$('button[name="btn_save"]').attr('id', '0');
    $('input[name="name"]').val('');
    $('input[name="display_name"]').val('');
    $('input[name="description"]').val('');
    $(selectParent).val('0').trigger('change');
    $(selectDepartment).val('0').trigger('change');
    $('#formTitle').text('Tambah Data');

	$('#table').hide();
	setTimeout(function(){
		$('#form').fadeIn()
	}, 100);
});

$('#tableRole').on('click', 'button[name="btn_edit"]', function(){
	var id = $(this).attr('id');
	var name = '';
    var display_name = '';
    var description = '';
    var parent = '';
    var department = '';
	$('#tableRole tbody tr').each(function(){
		var selected = $(this).find(':button').attr('id');
		if (selected == id) {
			name = $(this).find('td:eq(1)').text();
            display_name = $(this).find('td:eq(2)').text();
            parent = $(this).find('td:eq(3)').text();
            department = $(this).find('td:eq(4)').text();
            description = $(this).find('td:eq(5)').text();
		}
	});

	$('button[name="btn_save"]').attr('id', id);
	$('input[name="name"]').val(name);
    $('input[name="display_name"]').val(display_name);
    $('input[name="description"]').val(description);
    $(selectParent).find('option').each(function(){
        if ($(this).text() == parent) {
            $(selectParent).val($(this).val()).trigger('change');
        }
    });
    $(selectDepartment).find('option').each(function(){
        if ($(this).text() == department) {
            $(selectDepartment).val($(this).val()).trigger('change');
        }
    });
    $('#formTitle').text('Edit Data');

	$('#table').hide();
	setTimeout(function(){
		$('#form').fadeIn()
	}, 100);
});

$('#tableRole').on('click', 'button[name="btn_delete"]', function(){
	if (!confirm('Apakah anda yakin?')) {
		return;
	}

	var id = $(this).attr('id');

	$.ajax({
        type: 'POST',
        url: baseurl + 'role/delete/',
        data: {
        	'id': id
        },
        dataType: 'json',
        success: function(response){
            if(response.result){
            	$.notify({
                    icon: "now-ui-icons ui-1_bell-53",
                    message: response.msg
                }, {
                    type: 'primary',
                    delay: 3000,
                    timer: 1000,
                    placement: {
                      from: 'top',
                      align: 'center'
                    }
                });
                table.ajax.reload(null, false);
            } else{
                $.notify({
                    icon: "now-ui-icons ui-1_bell-53",
                    message: response.msg
                }, {
                    type: 'danger',
                    delay: 3000,
                    timer: 1000,
                    placement: {
                      from: 'top',
                      align: 'center'
                    }
                });
            }
        }
    });
});

$('button[name="btn_cancel"]').click(function(){
	$('button[name="btn_save"]').attr('id', '0');
	$('input[name="name"]').val('');
    $('input[name="display_name"]').val('');
    $('input[name="description"]').val('');
    $(selectParent).val('0').trigger('change');
    $(selectDepartment).val('0').trigger('change');

	$('#form').hide();
	setTimeout(function(){
		$('#table').fadeIn();
	}, 100);
});

$('button[name="btn_save"]').click(function(){
	$(this).attr('disabled', 'disabled');
    var missing = false;
    $('#formData').find('input').each(function(){
        if($(this).prop('required')){
            if($(this).val() == ''){
                var placeholder = $(this).attr('placeholder');
                $.notify({
                    icon: 'now-ui-icons ui-1_bell-53',
                    message: 'Kolom '+ placeholder +' tidak boleh kosong.'
                }, {
                    type: 'warning',
                    delay: 1000,
                    timer: 500,
                    placement: {
                      from: 'top',
                      align: 'center'
                    }
                });
                $(this).focus();
                missing = true;
                return false;
            }
        }
    });

    $(this).removeAttr('disabled');
    if(missing){
        return;
    }

    if ($('select[name="id_parent"]').val() == 0) {
        $.notify({
            icon: 'now-ui-icons ui-1_bell-53',
            message: 'Silakan pilih parent role terlebih dahulu.'
        }, {
            type: 'warning',
            delay: 1000,
            timer: 500,
            placement: {
              from: 'top',
              align: 'center'
            }
        });
        $(this).focus();
        return;
    }

    if ($('select[name="id_dept"]').val() == 0) {
        $.notify({
            icon: 'now-ui-icons ui-1_bell-53',
            message: 'Silakan pilih department terlebih dahulu.'
        }, {
            type: 'warning',
            delay: 1000,
            timer: 500,
            placement: {
              from: 'top',
              align: 'center'
            }
        });
        $(this).focus();
        return;
    }

    $.ajax({
        type: 'POST',
        url: baseurl + 'role/save/',
        data: {
        	'id': $(this).attr('id'),
        	'form': $('#formData').serialize()
        },
        dataType: 'json',
        success: function(response){
            if(response.result){
            	$.notify({
                    icon: "now-ui-icons ui-1_bell-53",
                    message: response.msg
                }, {
                    type: 'primary',
                    delay: 3000,
                    timer: 1000,
                    placement: {
                      from: 'top',
                      align: 'center'
                    }
                });
                table.ajax.reload(null, false);
                $('#form').hide();
				setTimeout(function(){
					$('#table').fadeIn();
				}, 100);
            } else{
                $.notify({
                    icon: "now-ui-icons ui-1_bell-53",
                    message: response.msg
                }, {
                    type: 'danger',
                    delay: 3000,
                    timer: 1000,
                    placement: {
                      from: 'top',
                      align: 'center'
                    }
                });
            }
        }
    });
});