
; /* Start:"a:4:{s:4:"full";s:84:"/local/components/test/request.send.mail/templates/.default/script.js?17002004882124";s:6:"source";s:69:"/local/components/test/request.send.mail/templates/.default/script.js";s:3:"min";s:0:"";s:3:"map";s:0:"";}"*/
$(document).ready(function() {
    $('.orderItems').on('click', '.addItem', function() {
        var newItem = $('.orderItem:first').clone(true);
        newItem.find('input').val('');
        $('.orderItems').append(newItem);
    });

    $('.orderItems').on('click', '.removeItem', function() {
        if ($('.orderItem').length > 1) {
            $(this).closest('.orderItem').remove();
        } else {
            alert('Вы не можете удалить последний элемент.');
        }
    });

    $('form').on('submit', function(e){
        e.preventDefault();
        var $form = $(this);
        var formData = new FormData(this);
        
        // Блокируем кнопку перед отправкой
        $form.find('button[type="submit"]').prop('disabled', true);

        $.ajax({
            url: this.action,
            type: this.method,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status === 'success') {
                    $('#successMessage').text(response.message);
                    $('#formSuccessModal').modal('show');
                } else {
                    // обработка ошибок, если необходимо
                    $('#formErrorModal').modal('show');
                    console.error('Ошибка при отправке формы:\n', response.message);
                }
            },
            error: function(xhr, status, error) {
                var errorMessage = "Ошибка при отправке формы. Пожалуйста, попробуйте снова.";
                if (xhr.responseText) {
                    errorMessage += "\n" + xhr.responseText;
                }
                alert(errorMessage);
            },
            complete: function() {
                // Разблокируем кнопку после завершения запроса
                $form.find('button[type="submit"]').prop('disabled', false);
            }
        });
    });
});
/* End */
;; /* /local/components/test/request.send.mail/templates/.default/script.js?17002004882124*/
