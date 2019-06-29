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

});