<?php

namespace App\Controllers;
use App\Models\TeachersModel;

class Home extends BaseController
{
    public function index(): string
    {
        $teacherModel = new TeachersModel();

        // Fetch all teachers from the database
        $teachers = $teacherModel->findAll();
        return view('userpage/index', ['teachers' => $teachers]);
    }

    public function aboutus()
    {
        $teacherModel = new TeachersModel();

        // Fetch all teachers from the database
        $teachers = $teacherModel->findAll();

        // Pass the teachers data to the view
        return view('userpage/aboutus', ['teachers' => $teachers]);
        
    }

    public function courses()
    {
        return view('userpage/courses');
    }

    public function teachers()
    {
        $teacherModel = new TeachersModel();

        // Fetch all teachers from the database
        $teachers = $teacherModel->findAll();

        return view('userpage/teachers',  ['teachers' => $teachers]);
    }




    //admin

    public function admin()
    {
        return view('admin/index');
    }
    public function addemployee()
    {
        return view('admin/add-employee');
    }

    public function addTeacher()
    {
        $teacherModel = new TeacherModel();

        // Get data from the form
        $data = [
            'first_name'   => $this->request->getPost('first_name'),
            'last_name'    => $this->request->getPost('last_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'sex'          => $this->request->getPost('sex'),
            'role'         => $this->request->getPost('role'),
            'employee_id'  => $this->request->getPost('employee_id'),
            'birth_date'   => $this->request->getPost('birth_date')
        ];

        // Insert data into the database
        if ($teacherModel->insert($data)) {
            // Data inserted successfully
            echo "Teacher details added successfully.";
        } else {
            // Failed to insert data
            echo "Failed to add teacher details.";
        }
    }
}
