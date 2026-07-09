<?php

declare(strict_types=1);

// Xot translations — LangServiceProvider SSoT (never ->label() in Filament PHP).
// claude-audit static: split from labels.php for maintainability.
// File: lang/en/labels/frontend.php
return array (
  'auth' => 
  array (
    'login_box_title' => 'Log in to your account',
    'login_button' => 'Login',
    'login_with' => 'Login with :social_media',
    'register_box_title' => 'Register',
    'register_button' => 'Register',
    'remember_me' => 'Remember Me',
  ),
  'passwords' => 
  array (
    'forgot_password' => 'Forgot Your Password?',
    'reset_password_box_title' => 'Forgot Password',
    'reset_password_button' => 'Reset Password',
    'send_password_reset_link_button' => 'Send Password Reset Link',
  ),
  'macros' => 
  array (
    'country' => 
    array (
      'alpha' => 'Country Alpha Codes',
      'alpha2' => 'Country Alpha 2 Codes',
      'alpha3' => 'Country Alpha 3 Codes',
      'numeric' => 'Country Numeric Codes',
    ),
    'macro_examples' => 'Macro Examples',
    'state' => 
    array (
      'mexico' => 'Mexico State List',
      'us' => 
      array (
        'us' => 'US States',
        'outlying' => 'US Outlying Territories',
        'armed' => 'US Armed Forces',
      ),
    ),
    'territories' => 
    array (
      'canada' => 'Canada Province & Territories List',
    ),
    'timezone' => 'Timezone',
  ),
  'user' => 
  array (
    'passwords' => 
    array (
      'change' => 'Change Password',
    ),
    'profile' => 
    array (
      'avatar' => 'Avatar',
      'created_at' => 'Created At',
      'edit_information' => 'Edit Information',
      'email' => 'E-mail',
      'last_updated' => 'Last Updated',
      'name' => 'Name',
      'update_information' => 'Update Information',
      'phone' => 'Phone Number',
      'contact_name' => 'Contact Name',
      'country' => 'Country',
      'street_address' => 'Street Address',
      'city' => 'City',
      'detail' => 'Detail',
      'postcode' => 'Postcode',
      'state_region' => 'State Region',
      'google_lat' => 'Google Latitude',
      'google_lng' => 'Google Longitude',
    ),
  ),
);
