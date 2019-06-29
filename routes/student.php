<?php

Route::group(['namespace' => 'Student'], function () {
    Route::get('/', 'HomeController@index')->name('student.dashboard');

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
        Route::get('materi', "MateriController@materi")->name('student.materi');
        Route::get('mentor', "HomeController@mentor")->name('student.mentor');
        Route::get('ikuti/{id}', "HomeController@ikuti")->name('student.ikuti');
        Route::get('materi/read/{id}', "MateriController@materi_read")->name('student.materi_read');

        Route::get('soal', 'SoalController@index')->name('student.soal');
        Route::get('soal/mengerjakan', 'SoalController@soal_mengerjakan')->name('student.soal_mengerjakan');
        Route::post('soal/update', 'SoalController@soal_update')->name('student.soal_update');
        Route::get('soal/hasil/{id}', 'SoalController@soal_hasil')->name('student.soal_hasil');
    });
});
