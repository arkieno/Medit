<?php

namespace App\Controllers;

use App\Models\FacultyModel;
use CodeIgniter\Controller;

class FacultyController extends Controller
{
    protected $facultyModel;

    public function __construct()
    {
        $this->facultyModel = new FacultyModel();
    }

    public function index()
    {
        // Fetch all faculty records from the model
        $data['faculty'] = $this->facultyModel->findAll();

        // Pass the data to the view
        return view('admin/faculty_list', $data);
    }

    public function create()
    {
        return view('admin/faculty_create');
    }

    public function store()
    {
        $this->facultyModel->save([
            'id_no' => $this->request->getPost('id_no'),
            'last_name' => $this->request->getPost('last_name'),
            'first_name' => $this->request->getPost('first_name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'email' => $this->request->getPost('email'),
            'contact' => $this->request->getPost('contact'),
            'gender' => $this->request->getPost('gender'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/faculty');
    }

    public function edit($id)
    {
        $data['faculty'] = $this->facultyModel->find($id);
        return view('admin/faculty_edit', $data);
    }

    public function update($id)
    {
        $this->facultyModel->update($id, [
            'id_no' => $this->request->getPost('id_no'),
            'last_name' => $this->request->getPost('last_name'),
            'first_name' => $this->request->getPost('first_name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'email' => $this->request->getPost('email'),
            'contact' => $this->request->getPost('contact'),
            'gender' => $this->request->getPost('gender'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/faculty');
    }

    public function delete($id)
    {
        $this->facultyModel->delete($id);
        return redirect()->to('/faculty');
    }
}
