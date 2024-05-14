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






