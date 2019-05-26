$(function(){
    $('#register-form').on('submit', function(e){
        e.preventDefault();
        var $that = $(this),
            formData = new FormData($that.get(0));
        $.ajax({
            url: '/register',
            type: 'POST',
            dataType : 'JSON',
            contentType: false,
            processData: false,
            data: formData,
            success: function(data){

                if(data.status === 'error'){
                    toastr.warning(data.message);
                }else{
                    toastr.info(data.message);
                    window.location.replace("/login");
                }

            },
            error: function (data) {
                console.log(data);
            }
        });
    });
});