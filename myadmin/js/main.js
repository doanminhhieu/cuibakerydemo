function previewImg(event) {
    var files = document.getElementById('img_file').files; 
    $('#formUpload .box-preview-img').show();
    $('#formUpload .box-preview-img').html('<p>Ảnh đang chọn</p>');
    for (i = 0; i < files.length; i++)
    {
        $('#formUpload .box-preview-img').append('<img src="" id="' + i +'">');
        $('#formUpload .box-preview-img img:eq('+i+')').attr('src', URL.createObjectURL(event.target.files[i]));
    }   
}

$('#formUpload .btn-reset').on('click', function() {
	$('#formUpload .box-preview-img').html('');
	$('#formUpload .box-preview-img').hide();
	$('#formUpload .output').hide();
});

$('#formUpload .btn-submit').on('click', function() {
	$img_file = $('#formUpload #img_file').val();
	$type_img_file = $('#formUpload #img_file').val().split('.').pop().toLowerCase();
	if ($img_file == '')
	{
		$('#formUpload .output').show();
		$('#formUpload .output').html('Vui lòng chọn ít nhất một file ảnh.');
	}
	else if ($.inArray($type_img_file, ['png', 'jpeg', 'jpg', 'gif']) == -1)
	{
		$('#formUpload .output').show();
		$('#formUpload .output').html('File ảnh không hợp lệ với các đuôi .png, .jpeg, .jpg, .gif.');
	}
	else
	{
		$(".ajax_send_img").val('1');
		$('#formUpload').ajaxSubmit({ 
	        beforeSubmit: function() {
	            target:   '#formUpload .output',
	            $('#formUpload .output').hide();
	            $("#formUpload .progress").show();
	            $("#formUpload .progress-bar").width('0');
	        },
	        uploadProgress: function(event, position, total, percentComplete){ 
	            $("#formUpload .progress-bar").css('width', percentComplete + '%');
	            $("#formUpload .progress-bar").html(percentComplete + '%');
	        },
	        success: function(data) {
	        	$('#formUpload .output').show();
	        	$('#formUpload .output').addClass('success');
	        	$('#formUpload .output').html('Upload ảnh thành công.');
	        	console.log(data)
	        	setTimeout(function(){ window.location.reload() }, 1000);
	        },
	        error : function() {
	            $('#formUpload .output').show();
	            $('#formUpload .output').html('Không thể upload ảnh vào lúc này, hãy thử lại sau.');
	        }

	    }); 
	    $(".ajax_send_img").val('0');
	    return false; 
	}
	return false; 
});
function CHECK_all_checkbox(obj) {
	if($('.check_all_anh').length > 0){
		$('.box-body-upload-message input[type="checkbox"]').prop('checked',false); 
		$(obj).removeClass('check_all_anh');
		$(".icheckbox_minimal-blue").removeClass("checked"); 
	}else{
		$(obj).addClass('check_all_anh');
		$('.box-body-upload-message input[type="checkbox"]').prop('checked',true); 
		$(".icheckbox_minimal-blue").addClass("checked");
	}
	
}