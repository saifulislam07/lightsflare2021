<?php

defined('BASEPATH') or exit('No direct script access allowed');
//$route['default_controller'] = 'Welcome';
$route['default_controller'] = 'FrontendController/index';

/*Admin*/
$route['admin'] = 'AuthController/login_check';
$route['login'] = 'AuthController/login';


//2021 route list
$route['featuredIn'] = 'FrontendController/featuredIn';
$route['check-Number'] = 'FrontendController/checkNumber';
$route['uploadImages-2021'] = 'FrontendController/uploadImages2021';
$route['submit-photos'] = 'SubmissionController/submit_photos';
$route['publications'] = 'PublicationController/publications';
$route['publications_list'] = 'PublicationController/publications_list';
$route['edit_publication/(:any)'] = 'PublicationController/edit_publication/$1';
$route['delete_publication/(:any)'] = 'PublicationController/delete_publication/$1';



$route['dashboard'] = 'AdminController/dashboard';
$route['about_page'] = 'AdminController/about_page';
$route['home_slider'] = 'AdminController/home_slider';
$route['home_about'] = 'AdminController/home_about';
$route['home_watch'] = 'AdminController/home_watch';
$route['add-User'] = 'AdminController/addUser';
$route['jury'] = 'AdminController/jury';
$route['calendar'] = 'AdminController/calendar';
$route['rules'] = 'AdminController/rule';
$route['question-answers'] = 'AdminController/question_answers';
$route['signout'] = 'AuthController/signout';
$route['ambassador'] = 'AdminController/ambassador';
$route['user-pass-change'] = 'AdminController/user_pass_change';
$route['forgot-password'] = 'FrontendController/forgot_password';
$route['reset-password/(:num)/(:any)'] = 'FrontendController/reset_password/$1/$2';

$route['add-User'] = 'AdminController/addUser';
$route['user-List'] = 'AdminController/userList';
$route['edit-User/(:any)'] = 'AdminController/editUser/$1';

$route['new-use'] = 'AdminController/new_use';
$route['all-user'] = 'AdminController/all_user';
$route['user-edit/(:any)'] = 'AdminController/user_edit/$1';


/*judgeing*/
$route['judges-marking'] = 'JudgingController/judges_marking';
$route['save-data'] = 'JudgingController/save_data';


/*gallery*/
$route['category'] = 'AdminController/category';
$route['gallery'] = 'AdminController/gallery';




/*user details*/
$route['new-submit-2021'] = 'SubmissionController/new_submit2021';
$route['new-submit'] = 'SubmissionController/new_submit';
$route['category-wise'] = 'SubmissionController/category_wise_submit';
$route['all-submission'] = 'SubmissionController/all_submit';
$route['all-submission_2021'] = 'SubmissionController/all_submit2021';
$route['my-profile'] = 'SubmissionController/my_profile';
$route['profile-update'] = 'AdminController/profile_update';
$route['all-detail'] = 'AdminController/all_details';
$route['queries'] = 'AdminController/queries';
$route['all-photos'] = 'AdminController/all_photos';
$route['confirm-email'] = 'AdminController/confirm_email';
$route['alarm-email'] = 'AdminController/alarm_email';
$route['all-marks'] = 'AdminController/all_marks';
$route['all-awarded'] = 'AdminController/all_awarded';

$route['reminder-email'] = 'AdminController/reminder_email';

$route['reply-query/(:any)'] = 'AdminController/reply_query/$1';
$route['reject-reply/(:any)'] = 'AdminController/reject_reply/$1';


$route['accept-paymnet/(:any)'] = 'AdminController/accept_paymnet/$1';
$route['reject-paymnet/(:any)'] = 'AdminController/reject_paymnet/$1';

$route['contact-data'] = 'FrontendController/contact_data';


$route['fileUpload'] = 'SubmissionController/fileUpload';
$route['fileUpload2021'] = 'SubmissionController/fileUpload2021';

$route['payment-details'] = 'SubmissionController/payment_details';
$route['new-payment'] = 'SubmissionController/new_payment';
$route['country-update'] = 'SubmissionController/update_country';
$route['delete-image/(:any)'] = 'SubmissionController/delete_image/$1';
/*FrontEnd*/
$route['home'] = 'FrontendController/index';
$route['about'] = 'FrontendController/about';
$route['jurys'] = 'FrontendController/jurys';
$route['sub-rules'] = 'FrontendController/submission_rules';
$route['contact-us'] = 'FrontendController/contact_us';
$route['user-signin'] = 'FrontendController/user_signin';
$route['user-signup'] = 'FrontendController/user_signup';
$route['2020-winners'] = 'FrontendController/twentytwentywinners';
$route['2020-exhibition'] = 'FrontendController/twentytwentyexhibition';
$route['Frequently-Asked-Questions'] = 'FrontendController/frequently_asked_questions';
$route['our-ambassador'] = 'FrontendController/ambassadors';


$route['new-exhibition-data'] = 'AdminController/add_exhibition_data';
$route['all-exhibition-data'] = 'AdminController/all_exhibition_data';
$route['edit-exhibition-data/(:any)'] = 'AdminController/edit_exhibition_data/$1';

/*extra*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
