<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//user
$routes->get('/', 'Home::index');
$routes->get('/aboutus', 'Home::aboutus');
$routes->get('/courses', 'Home::courses');
$routes->get('/teachers', 'Home::teachers');
$routes->get('/contact', 'Home::contact');
$routes->get('/events', 'EventController::eventlist');

//admin
$routes->get('/admin', 'Home::admin');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/allusers', 'SignupController::userdata');
$routes->get('/examinationdata', 'ExamController::getExamData');
$routes->get('/addevents', 'EventController::addevents');
$routes->get('/allevents', 'EventController::allevents');
$routes->post('/eventStore', 'EventController::store');
$routes->get('/subject_list/create', 'SubjectListController::create');
$routes->post('/subject_list/store', 'SubjectListController::store');  // Route for handling the form submission
$routes->get('/subject_list', 'SubjectListController::index'); // Route to display the table
$routes->get('/subject_list/edit/(:num)', 'SubjectListController::edit/$1'); // Edit a subject
$routes->post('/subject_list/update/(:num)', 'SubjectListController::update/$1'); // Update a subject
$routes->post('/subject_list/delete/(:num)', 'SubjectListController::delete/$1'); // Delete a subjec
//adding/retrieving teacher
//
$routes->get('/teacherform', 'TeacherController::teacher');
$routes->get('/allteachers', 'TeacherController::show');
$routes->post('/addteacher', 'TeacherController::insert');



//enrollment
$routes->get('/applicationform', 'ApplicationFormController::applicationform');
$routes->post('/submitApplication', 'ApplicationFormController::submitApplication');
$routes->get('/currentenroll', 'ApplicationFormController::currentenroll');
$routes->match(['get', 'post'],'/sidenav', 'ApplicationFormController::sidenav');

//examcontroller
$routes->post('/submitExam', 'ExamController::submitExam');
$routes->get('/show_result', 'ExamController::showResult');


//login
// $routes->get('/enroll', 'SignupController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);
$routes->post('/profile/uploadImage', 'ProfileController::uploadImage');

$routes->get('/verification_form', 'VerificationController::index');
$routes->post('/verify', 'VerificationController::verify');
$routes->get('/login-register/signin', 'SigninController::index');



// In app/Config/Routes.php

$routes->get('/contact', 'ContactController::index');
$routes->post('/contact/sendEmail', 'ContactController::sendEmail');


$routes->get('profile', 'ProfileController::index');
$routes->post('profile/saveProfile', 'ProfileController::saveProfile');
$routes->post('profile/uploadImage', 'ProfileController::uploadImage');


//forgot password 
$routes->get('/forgot_password', 'ForgotPasswordController::forgotPassword');
$routes->post('/forgot_password/send', 'ForgotPasswordController::sendVerificationCode');
$routes->get('/forgot_password/verify', 'ForgotPasswordController::verifyCode');
$routes->post('/forgot_password/check_code', 'ForgotPasswordController::checkVerificationCode');
$routes->get('/forgot_password/new_password', 'ForgotPasswordController::newPassword');
$routes->post('/forgot_password/update', 'ForgotPasswordController::updatePassword');

//chatbot
$routes->get('chatbot', 'ChatbotController::index');
$routes->post('chatbot/chat', 'ChatbotController::chat');
//faculty list
$routes->get('/faculty', 'FacultyController::index');
$routes->get('/faculty/create', 'FacultyController::create');
$routes->post('/faculty/store', 'FacultyController::store');
$routes->get('/faculty/edit/(:num)', 'FacultyController::edit/$1');
$routes->post('/faculty/update/(:num)', 'FacultyController::update/$1');
$routes->get('/faculty/delete/(:num)', 'FacultyController::delete/$1');

//schedule
$routes->get('/schedule', 'ScheduleController::index');
$routes->match(['get', 'post'], '/schedule/create', 'ScheduleController::create');
$routes->post('/schedule/update/(:num)', 'ScheduleController::update/$1');

//generating report
// $routes->get('/schedule/report/pdf', 'ScheduleController::generatePDF');

//history for schedule
$routes->get('/history', 'ScheduleHistoryController::index');  // This should map to the ScheduleHistoryController and its index method



