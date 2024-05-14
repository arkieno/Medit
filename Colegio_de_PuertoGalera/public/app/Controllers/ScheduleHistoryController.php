<?php

namespace App\Controllers;

use App\Models\ScheduleHistory;  
use CodeIgniter\Controller;

class ScheduleHistoryController extends Controller
{
    public function index()
    {
        $model = new ScheduleHistory();  
        $historyLogs = $model->findAll();

        return view('schedule/history', ['historyLogs' => $historyLogs]); 
    }
}

