
$(document).ready(function(){
    $('button[name=btnSLideOfBanner]').each(function(index,value){
        $(this).on('click',function(){
            var div_content_tabs_banner = document.querySelector('#content-tabs-banner');
            //
            var idBanner = $('input[name=idSlideOfBanner]').eq(index).val();
            // console.log(input_banner_id);
            var _token = $('input[name=_token]').val();
            $.ajax({
                type: "post",
                url: window.location.protocol + "/admin-page-banner-slide/"+idBanner+"",
                data: {
                    idBanner : idBanner,
                    _token : _token
                },
                success: function (response) {
                    setTimeout(() => {
                        if(div_content_tabs_banner.innerHTML == ""){
                            $('#content-tabs-banner').append(response);
                            checkeditor_html();
                            //put value to input
                             var input_banner_id = document.querySelector('#banner_id_value');
                             input_banner_id.value = idBanner;
                        }
                        else{
                            $('#content-tabs-banner').html("");
                        }
                    }, 1000);
                }
            });
             $('#content-tabs-banner').html("");

        });
    });
});
