<?php

namespace App\Controllers;

use App\Models\Schedule;
use App\Models\ScheduleHistory; 
use CodeIgniter\Controller;

class ScheduleController extends Controller
{
    public function index()
    {
        $model = new Schedule();
        $schedules = $model->findAll();

        return view('schedule/index', ['schedules' => $schedules]);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $model = new Schedule();

            $data = [
                'faculty_name' => $this->request->getPost('faculty_name'),
                'days_of_week' => $this->request->getPost('days_of_week'),
                'title' => $this->request->getPost('title'),
                'time_from' => $this->request->getPost('time_from'),
                'time_to' => $this->request->getPost('time_to'),
                'schedule_type' => $this->request->getPost('schedule_type'),
                'sem' => $this->request->getPost('sem'),
                'room' => $this->request->getPost('room'),
                'description' => $this->request->getPost('description'),
            ];  

            $model->insert($data);

            return redirect()->to('/schedule');
        }

        return view('schedule/create');
    }
    public function update($id)
    {
        if ($this->request->getMethod() === 'post') {
            $model = new Schedule();
            $historyModel = new ScheduleHistory();
    
            $data = [
                'faculty_name' => $this->request->getPost('faculty_name'),
                'days_of_week' => $this->request->getPost('days_of_week'),
                'title' => $this->request->getPost('title'),
                'time_from' => $this->request->getPost('time_from'),
                'time_to' => $this->request->getPost('time_to'),
                'schedule_type' => $this->request->getPost('schedule_type'),
                'sem' => $this->request->getPost('sem'),
                'room' => $this->request->getPost('room'),
                'description' => $this->request->getPost('description'),
            ];
    
            $model->update($id, $data);
    
            // Log the update into the history model
            $historyData = [
                'schedule_id' => $id,
                'updated_by' => 'admin', // Update to reflect the actual user
                'update_time' => date('Y-m-d H:i:s'),
            ];
    
            $historyModel->insert($historyData);
    
            // Set a flash message to indicate success
            session()->setFlashdata('update_success', 'Schedule updated successfully.');
    
            return redirect()->to('/schedule');
        }
    
        return view('schedule/edit', ['id' => $id]);
    }
    
    public function delete($id)
    {
        $model = new Schedule();
        $model->delete($id);

        return redirect()->to('/schedule');
    }
}
