<?php

Route::group(['namespace' => 'Mentor'], function () {
    Route::get('/', 'HomeController@index')->name('mentor.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('mentor.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('mentor.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('mentor.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('mentor.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('mentor.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('mentor.password.reset');

    // Must verify email
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('mentor.verification.resend');
    Route::get('email/verify', 'Auth\VerificationController@show')->name('mentor.verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('mentor.verification.verify');

    // Students
    Route::group(['middleware' => ['mentor.auth']], function () {

        // Route::get('wkwk', "StudentController@wkwk");
        // Route::get('data', "StudentController@getDataStudent");
        Route::get('student', "StudentController@index")->name('mentor.student');
        Route::post('student/destroy', 'StudentController@destroy')->name('mentor.student_destroy');

        // Route::post('addItem', 'StudentController@addItem');

        Route::get('materi', 'MateriController@index')->name('mentor.materi');
        Route::get('materi/upload', 'MateriController@materi_upload')->name('mentor.materi_upload');
        Route::post('materi/upload_aksi', 'MateriController@materi_upload_aksi')->name('mentor.materi_upload_aksi');
        Route::get('materi/edit/{id}', 'MateriController@materi_edit')->name('mentor.materi_edit');
        Route::post('materi/update', 'MateriController@materi_update')->name('mentor.materi_update');
        Route::post('materi/delete/{id}', 'MateriController@materi_destroy')->name('mentor.materi_delete');
        Route::get("downloadPDF/{id}", "MateriController@downloadPDF");

        Route::get('soal', 'SoalController@index')->name('mentor.soal');
        Route::post('soal/create/title', 'SoalController@question_create_title')->name('mentor.question_create_title');
        Route::post('soal/create/question', 'SoalController@question_create_questions')->name('mentor.question_create_questions');
        Route::get('soal/read/{id}', 'SoalController@soal_read')->name('mentor.soal_read');
        Route::get('soal/edit/{id}', 'SoalController@soal_edit')->name('mentor.soal_edit');
        Route::post('soal/update', 'SoalController@soal_update')->name('mentor.soal_update');
        Route::get('soal/hapus/{id}', 'SoalController@soal_hapus')->name('mentor.soal_hapus');
        Route::post('soal/delete/{id}', 'SoalController@soal_delete')->name('mentor.soal_delete');

        Route::get('profil', 'HomeController@profil')->name('mentor.profil');
        Route::post('profil/update', 'HomeController@profil_update')->name('mentor.profil_update');
    });
});
