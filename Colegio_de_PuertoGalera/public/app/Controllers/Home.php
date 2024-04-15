<?php

namespace App\Controllers;
use App\Models\TeachersModel;
use App\Models\EventsModel;

class Home extends BaseController
{
    public function index()
    {
        $teacherModel = new TeachersModel();
        $teachers = $teacherModel->findAll(); // Fetch all teachers from the database
    
        // Fetch upcoming events
        $eventModel = new EventsModel();
        $events = $eventModel->where('event_date >=', date('Y-m-d'))
                            ->orderBy('event_date', 'asc')
                            ->findAll(4); // Fetch 4 upcoming events
    
        // Format the event time to display as a range
        foreach ($events as &$event) {
            $event['event_time'] = date('h:i A', strtotime($event['event_start_time'])) . ' - ' . date('h:i A', strtotime($event['event_end_time']));
        }
    
        return view('userpage/index', ['teachers' => $teachers, 'events' => $events]);
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

//contact
        public function contact()
            {
                return view('userpage/contact');
            }


    //admin

    public function admin()
    {
        
        return view('admin/index');
    }
    public function dashboard()
    {
        return view('admin/dashboard');
    }
    public function upcomingEvents()
        {
            $eventModel = new \App\Models\EventsModel();
            $data['events'] = $eventModel->where('event_date >=', date('Y-m-d'))->orderBy('event_date', 'asc')->findAll(4); // Fetch 4 upcoming events
            
            // Load view with upcoming events
            return view('upcoming_events', $data);
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
