function loadmessages() {
    $.ajax({
        type: "GET",
        url: "/admin/spravy/fetch-messages",
        dataType: "json",
        success: function (response) {
            console.log(response);
            $('tbody').html("");
            $.each(response.spravas, function (key, item) {
                $('tbody').append('<tr>\
                            <td>' + item.id + '</td>\
                            <td>' + item.email + '</td>\
                            <td>' + item.predmet + '</td>\
                            <td><button type="button" value="' + item.id + '" class="btn btn-primary replybtn btn-sm">Reply</button></td>\
                        \</tr>');
            });
        }
    });
}

$(document).ready(function () {
    loadmessages();
    $(document).on('click', '.replybtn', function (e) {
        e.preventDefault();
        var mess_id = $(this).val();
        // alert(stud_id);
        $('#replyModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/admin/spravy/reviewMessage/" + mess_id,
            success: function (response) {
                if (response.status == 404) {
                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#editModal').modal('hide');
                } else {
                    document.getElementById('meno').innerHTML = 'Meno: ' + response.sprava.meno;
                    document.getElementById('priezvisko').innerHTML = 'Priezvisko: ' + response.sprava.priezvisko;
                    document.getElementById('telefon').innerHTML = 'Telefon: ' + response.sprava.telefon;
                    document.getElementById('e-mail').innerHTML = 'Email: ' + response.sprava.email;
                    document.getElementById('obsah').innerHTML = 'Obsah: ' + response.sprava.obsah;
                    $('#predmet').val(response.sprava.predmet);
                    $('#ziadost_id').val(mess_id);
                }
            }
        });
        $('.btn-close').find('input').val('');

    });
    //

    $(document).on('click', '.send_email', function (e) {
        e.preventDefault();

        $(this).text('Sending email..');
        var id = $('#ziadost_id').val();
        // alert(id);

        var data = {
            'obsah': $('#odpoved').val(),
            'predmet': $('#predmet').val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "PUT",
            url: "/admin/spravy/sendEmail/" + id,
            data: data,
            dataType: "json",
            success: function (response) {
                if (response.status == 400) {
                    $('#rply_msgList').html("");
                    $('#rply_msgList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_value) {
                        $('#update_msgList').append('<li>' + err_value +
                            '</li>');
                    });
                    $('.update_student').text('Update');
                } else {
                    $('#update_msgList').html("");

                    $('#success_message').addClass('alert alert-success');
                    $('#success_message').text(response.message);
                    $('#replyModal').find('input').val('');
                    $('.send_email').text('Send');
                    $('#replyModal').modal('hide');
                    loadmessages();
                }
            }
        });

    });
});
