<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class MessengerController extends Controller
{
    public function webhook()
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        // Validate incoming webhook request
        $hubVerifyToken = ''; // Your verify token
        $token = $data['hub_verify_token'];
        $challenge = $data['hub_challenge'];
        if ($token === $hubVerifyToken) {
            echo $challenge;
            exit;
        }

        // Handle incoming messages
        foreach ($data['entry'] as $entry) {
            foreach ($entry['messaging'] as $messaging) {
                $senderId = $messaging['sender']['id'];
                $message = $messaging['message']['text'];

                // Process incoming message and send response
                $response = $this->processMessage($message);

                // Send response to the user
                $this->sendMessage($senderId, $response);
            }
        }
    }

    private function processMessage($message)
    {
        // Your logic to process the incoming message and generate a response
        return 'Received: ' . $message;
    }

    private function sendMessage($recipientId, $message)
    {
        // Your code to send a message back to the user
        // Use the Facebook Graph API to send messages
        // Example code: https://developers.facebook.com/docs/messenger-platform/send-messages
    }
}
