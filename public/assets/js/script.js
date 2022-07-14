$(document).ready(function() {
    // Merubah Form Login
    $('#formMode').click(function() {
        if ( $(this).attr('data-form') == 'up' ) {
            $(this).attr('data-form', 'in');
            $('#formSignIn').hide();
            $('#formSignUp').show();
    
            $(this).text('Masuk');
            $('#formSubmit').attr('form', 'formSignUp');
        } else {
            $(this).attr('data-form', 'up');
            $('#formSignIn').show();
            $('#formSignUp').hide();

            $(this).text('Daftar Akun');
            $('#formSubmit').attr('form', 'formSignIn');
        }
    })

});

function formAJAX(form, method, uri, successMessage, modalId, fnHandler)
{

    $(form).submit(function(e){

        // Nonaktifkan pengalihan form
        e.preventDefault();

        // Elemen form yang digunakan
        let form = $(this);

        // Tampilkan tombol loading
        showLoader();


        /** 
         * Kirim data form dengan AJAX
        */
        $.ajax({

            // Metode permintaan ke server
            type: method,

            // Url halaman AJAX
            url: uri,

            // Format data input
            data: form.serialize(),

            // Fungsi success untuk mengatasi data ketika permintaan AJAX berhasil
            success: function(success) {
                
                // Kosongkan Semua input di dalam form
                $.each($(`.form-control`), function() {
                    let input = $(`.form-control`);
                    input.removeClass('is-invalid');

                    input.siblings('.invalid-feedback').empty();
                })


                /** 
                 * Memeriksa validasi form
                 */ 
                if ( !success.validation ) {

                    /** 
                     * Munculkan pesan kesalahan
                    */
                    $.each(success[0], function(data) {

                        let input = $(`.form-control[name=${data}]`);
                        
                        input.addClass('is-invalid');

                        input.siblings('.invalid-feedback').text(success[0][data]);
                    })

                    // Sembunyikan tombol loading
                    hideLoader()
                } else {

                    // Periksa apakah form menggunakan modal
                    if ( modalId != '' ) {
                        $(modalId).modal('hide');
                    }

                    // Munculkan pesan keberhasilan
                    Swal.fire({
                        title: successMessage[0],
                        text: successMessage[1],
                        icon: successMessage[2],
                        timer: 3500,
                        timerProgressBar: true,
                        showConfirmButton: false
                    });

                    // Kosongkan input di dalam form
                    $.each($(`.form-control`), function() {
                        let input = $(`.form-control`);
                        input.removeClass('is-invalid');
                        input.val('');
                        input.siblings('.invalid-feedback').empty();
                    })

                    // Sembunyikan tombol loading
                    hideLoader()

                    // Melakukan suatu fungsi ketika kondisi berhasil dilakukan
                    return fnHandler;
                }
            } ,

            // Fungsi error untuk mengatasi kesalahan pada server atau client
            error: function(error) {

                // Sembunyikan tombol loading
                hideLoader();

                /** 
                 * Tampilkan pesan kesalahan error server & client
                */
                if ( error.status ) {
                    Swal.fire({
                        title: 'Oops, Kesalahan konfigurasi',
                        html: `Error: ${error.status} ${error.statusText}`,
                        timer: 3500,
                        timerProgressBar: true,
                        showConfirmButton: false
                    })
                }
            }
        });
    });
}

// Sembunyikan tombol loading
function hideLoader()
{
    $('#formSubmit').removeClass('disabled');
    $('#formSubmit').children('.spinner-border').addClass('d-none');
}
// Tampilan tombol loading
function showLoader()
{
    $('#formSubmit').addClass('disabled')
    $('#formSubmit').children('.spinner-border').removeClass('d-none');
}