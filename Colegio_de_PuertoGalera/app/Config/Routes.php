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

//admin
$routes->get('/admin', 'Home::admin');
$routes->get('/addemployee', 'Home::addemployee');
$routes->post('/teacher/add', 'Home::addTeacher');


//enrollment
$routes->get('/applicationform', 'ApplicationFormController::applicationform');
$routes->post('/submitApplication', 'ApplicationFormController::submitApplication');
$routes->get('/currentenroll', 'ApplicationFormController::currentenroll');
$routes->match(['get', 'post'],'/sidenav', 'ApplicationFormController::sidenav');

//examcontroller
$routes->post('/submitExam', 'ExamController::submitExam');
$routes->get('/show_result', 'ExamController::showResult');


//
// $routes->get('/enroll', 'SignupController::index');
$routes->get('/signup', 'SignupController::index');
$routes->match(['get', 'post'], 'SignupController/store', 'SignupController::store');
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
$routes->get('/signin', 'SigninController::index');
$routes->get('/profile', 'ProfileController::index',['filter' => 'authGuard']);
$routes->post('/profile/uploadImage', 'ProfileController::uploadImage');



//adding/retrieving teacher
//
$routes->get('/teacherform', 'TeacherController::teacher');
$routes->post('/addteacher', 'TeacherController::insert');



