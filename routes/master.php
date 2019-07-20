<?php

Route::group(['namespace' => 'Master'], function() {
    Route::get('/', 'HomeController@index')->name('master.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('master.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('master.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('master.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('master.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('master.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('master.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('master.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('master.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('master.verification.verify');

    Route::get("mentor", "MentorController@mentor")->name("master.mentor");
    Route::post("mentor/delete/{id}", "MentorController@delete_mentor")->name("master.delete_mentor");
    Route::get("student", "StudentController@index")->name("master.student");
    Route::post("student/delete/{id}", "StudentController@delete_student")->name("master.delete_student");

    Route::get("materi", "MateriController@index")->name("master.materi");
    Route::post("materi/delete/{id}", "MateriController@delete_materi")->name("master.delete_materi");
    Route::get("materi/baca/{id}", "MateriController@baca_materi")->name("master.baca_materi");

    Route::get("soal", "SoalController@index")->name("master.soal");
    Route::get("soal/lihat/{id}", "SoalController@lihat_soal")->name("master.lihat_soal");
    Route::post("soal/delete/{id}", "SoalController@delete_soal")->name("master.delete_soal");
    
    Route::post('/password/change', 'HomeController@changePassword')->name('master.password.change');
});