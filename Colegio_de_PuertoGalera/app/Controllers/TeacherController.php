<?php

namespace App\Controllers;

use App\Models\TeachersModel;
use App\Controllers\BaseController;

class TeacherController extends BaseController
{

    public function teacher()
    {
      
        return view('admin/addteachers');
    }

    public function index()
    {
        $teacherModel = new TeachersModel();

        // Fetch all teachers from the database
        $teachers = $teacherModel->findAll();

        // Pass the teachers data to the view
        return view('userpage/aboutus', ['teachers' => $teachers]);
    }

    public function insert()
{
    $teacherModel = new TeachersModel();

    // Handle image upload
    $file = $this->request->getFile('image');
    $newName = $file->getRandomName();
    $file->move('./uploads', $newName);

    // Example data, replace this with actual data received from form inputs
    $data = [
        'name' => $this->request->getPost('name'),
        'designation' => $this->request->getPost('designation'),
        'description' => $this->request->getPost('description'),
        'image' => $newName, // Store the image name in the database
        // Add other fields as needed
    ];

    // Insert teacher data into the database
    $teacherModel->insert($data);

    // Redirect back to the teacher listing page
    return redirect()->to('/teacherform');
}

}
