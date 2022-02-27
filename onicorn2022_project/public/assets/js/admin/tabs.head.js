
$(document).ready(function(){
    $('button[name=btnHead]').each(function(index,value){
        $(this).on('click',function(){
            var div_content_tabs_head = document.querySelector('#content-tabs-head');
            var idTabs = $('input[name=idHead]').eq(index).val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                type: "post",
                url: window.location.protocol + "/admin-page-tabs/"+idTabs+"",
                data: {
                    idTabs : idTabs,
                    _token : _token
                },
                success: function (response) {
                    setTimeout(() => {
                        if(div_content_tabs_head.innerHTML == ""){
                            $('#content-tabs-head').append(response);
                            checkeditor_html();
                            var head_value_id = document.querySelector('#head_value_id');
                            head_value_id.value = idTabs;

                        }
                        else{
                            $('#content-tabs-head').html("");
                        }
                    }, 1000);
                }
            });
             $('#content-tabs-head').html("");

        });
    });
});
