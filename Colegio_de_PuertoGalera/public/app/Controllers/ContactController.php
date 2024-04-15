<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ContactController extends BaseController
{
    public function sendEmail()
    {
        $validation = \Config\Services::validation();
        $email = \Config\Services::email();

        $validation->setRules([
            'name' => 'required',
            'email' => 'required|valid_email',
            'subject' => 'required',
            'msg' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // Validation failed, handle errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $name = $this->request->getPost('name');
        $emailAddress = $this->request->getPost('email');
        $subject = $this->request->getPost('subject');
        $message = $this->request->getPost('msg');

        $email->setTo('dextherbdelmonte@gmail.com');
        $email->setFrom($emailAddress, $name);
        $email->setSubject($subject);
        $email->setMessage($message);

        if ($email->send()) {
            // Email sent successfully
            return redirect()->back()->with('success', 'Your message has been sent successfully.');
        } else {
            // Email sending failed
            return redirect()->back()->with('error', 'Failed to send email. Please try again later.');
        }
    }
}
