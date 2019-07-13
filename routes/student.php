<?php
Route::group(['namespace' => 'Student'], function () {
    Route::get('/', 'HomeController@index')->name('student.dashboard')->middleware('student.status_soal');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('student.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('student.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('student.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('student.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('student.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('student.password.reset');

    // Must verify email
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('student.verification.resend');
    Route::get('email/verify', 'Auth\VerificationController@show')->name('student.verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('student.verification.verify');

    // Students
    Route::group(['middleware' => ['student.auth']], function () {
        Route::get("profil", "HomeController@profil")->name('student.profil')->middleware("student.status_soal");
        Route::post("profil/update", "HomeController@profil_update")->name('student.profil_update');

        Route::get('materi', "MateriController@materi")->name('student.materi')->middleware("student.status_soal");
        Route::get('mentor', "HomeController@mentor")->name('student.mentor');
        Route::get('ikuti/{id}', "HomeController@ikuti")->name('student.ikuti');
        Route::get('materi/read/{id}', "MateriController@materi_read")->name('student.materi_read')->middleware("student.status_soal");

        Route::get('soal', 'SoalController@index')->name('student.soal')->middleware("student.status_soal");

        Route::post('soal/nilai/{id}', 'SoalController@soal_nilai')->name('student.soal_nilai');
        Route::get('soal/nilai/review/{id}', 'SoalController@soal_nilai_review')->name('student.nilai_review');
        
        Route::group(['middleware' => ['student.batas_waktu' , 'student.cek_selesai', 'student.anti_kembali']], function(){
            Route::get('soal/mengerjakan/{id}/{id_param}', 'SoalController@soal_mengerjakan')->name('student.soal_mengerjakan');
            Route::get('soal/hasil/{id}', 'SoalController@soal_hasil')->name('student.soal_hasil');
            Route::get('soal/edit/{id}/{id_param}', 'SoalController@soal_edit')->name('student.soal_edit');
            Route::get('soal/edit/persoal/{id}/{nomor}/{id_param}', 'SoalController@soal_edit_persoal')->name('student.soal_edit_persoal');
            Route::post('soal/update/{id_param}', 'SoalController@soal_update')->name('student.soal_update');
        });
        

        Route::get('soal/nilai/cetak/{id}', 'SoalController@soal_nilai_cetak')->name('student.soal_nilai_cetak');

        Route::get('soal/mengerjakan/{id}/{id_param}/callback', function(){
            return redirect()->route("student.soal");
        });
    });
});
