

$('.del-item').on('click', function(){
    var res = confirm('Подтвердите действие');
    var url =  $(this).data('url')
    if(!res) return false;
    var $this = $(this),
        id = $this.data('id'),
        src = $this.data('src');



    $.ajax({
        url: url,
        data: {id: id, src: src,"_token": $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        beforeSend: function(){
            $this.closest('.file-upload').find('.overlay').css({'display':'block'});
        },
        success: function(res){
            setTimeout(function(){
                $this.closest('.file-upload').find('.overlay').css({'display':'none'});
                if(res == 1){
                    $this.fadeOut();
                }
            }, 1000);
        },
        error: function(){
            setTimeout(function(){
                $this.closest('.file-upload').find('.overlay').css({'display':'none'});
                alert('Ошибка');
            }, 1000);
        }
    });
});

if($('div').is('#single')){
    var buttonSingle = $("#single"),
        buttonMulti = $("#multi"),
        file;
}


if(buttonSingle) {
    new AjaxUpload(buttonSingle, {
        action: buttonSingle.data('url'),

        data: {name: buttonSingle.data('name'), "_token": $('meta[name="csrf-token"]').attr('content')},
        name: buttonSingle.data('name'),
        onSubmit: function (file, ext) {
            if (!(ext && /^(jpg|png|jpeg|gif)$/i.test(ext))) {
                alert('Ошибка! Разрешены только картинки');
                return false;
            }
            buttonSingle.closest('.file-upload').find('.overlay').css({'display': 'block'});

        },

        onComplete: function (file, response) {

            setTimeout(function () {
                buttonSingle.closest('.file-upload').find('.overlay').css({'display': 'none'});

                response = JSON.parse(response);


                $('.' + buttonSingle.data('name')).html('<img src="/public/uploads/products/' + response.file + '" style="max-height: 150px; ">');
            }, 1000);
        }
    });
}

if(buttonMulti) {
    new AjaxUpload(buttonMulti, {
        action: buttonMulti.data('url'),

        data: {name: buttonMulti.data('name'), "_token": $('meta[name="csrf-token"]').attr('content')},
        name: buttonMulti.data('name'),
        onSubmit: function (file, ext) {
            if (!(ext && /^(jpg|png|jpeg|gif)$/i.test(ext))) {
                alert('Ошибка! Разрешены только картинки');
                return false;
            }
            buttonMulti.closest('.file-upload').find('.overlay').css({'display': 'block'});

        },
        onComplete: function (file, response) {

            setTimeout(function () {
                buttonMulti.closest('.file-upload').find('.overlay').css({'display': 'none'});

                response = JSON.parse(response);


                //  for (var i in response.file) {
                //console.log(i + ' ' + response.file[i]);
                //  $('.' + buttonMulti.data('name')).append('<img src="/public/uploads/products/' + response.file[i]+ '" style="max-height: 150px;">');
                // }
                $('.' + buttonMulti.data('name')).append('<img src="/public/uploads/products/' + response.file + '" style="max-height: 150px; margin-left: 5px">');

            }, 1000);
        }
    });

}
