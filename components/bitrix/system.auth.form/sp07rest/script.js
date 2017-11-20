$('#bx-system-auth-form').on('submit','form',function(){

        //var form_action = $(this).attr('action');
        var form_backurl = $(this).find('input[name="backurl"]').val();

        $.ajax({
            type: "POST",
            url: '/login/auth.php',
            data: $(this).serialize(),
            timeout: 3000,
            error: function(request,error) {
                if (error == "timeout") {
                    alert('timeout');
                }
                else {
                    alert('Error! Please try again!');
                }
            },
            success: function(data) {
                $('#bx-system-auth-form').html(data);
            }
        });

        return false;
});