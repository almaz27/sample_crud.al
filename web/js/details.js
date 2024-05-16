$( document ).ready(function() {
    $('#stock-group ').on('beforeSubmit', function () {
        var $form = $(this);
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serializeArray(),
            success: function (data) {
                $('#result-of-query').html(data);
            }
        }
        )
        return false;
    });
    $('#stock-group ').on('beforeSubmit', function () {
        var $form = $(this);
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serializeArray(),
            success: function (data) {
                $('#result-of-query').html(data);
            }
        }
        )
        return false;
    });
});
