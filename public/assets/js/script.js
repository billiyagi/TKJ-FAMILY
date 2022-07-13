$(document).ready(function() {
    // Merubah Form Login
    $('#formMode').click(function() {
        if ( $(this).attr('data-form') == 'up' ) {
            $(this).attr('data-form', 'in');
            $('#formSignIn').hide();
            $('#formSignUp').show();
    
            $(this).text('Masuk');
        } else {
            $(this).attr('data-form', 'up');
            $('#formSignIn').show();
            $('#formSignUp').hide();

            $(this).text('Daftar Akun');
        }
    })
});