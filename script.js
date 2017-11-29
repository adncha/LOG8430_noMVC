$(function () {



    // Event listener to submit parent form trough ajax
    $('.auto-submit').on('change click input', function () {
        var form = $(this).closest('form');


        // if confirmation is need a for a form
        if (form.data('confirm'))
        {
            if (!confirm(form.data('confirm')))
            {
                return;
            }
        };
        //submit form
        $.post(form.prop('action'), form.serialize(),
            function (data) {
                // on success
                //reload current page to update information
                if (form.data('reload'))
                {
                    location.reload();
                }
            }
        );

    });
});

