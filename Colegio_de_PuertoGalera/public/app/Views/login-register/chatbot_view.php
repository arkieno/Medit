<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <style>
        /* Styles for the chat interface */
        #chatbox {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        
        #chatlog {
            margin-bottom: 10px;
            max-height: 400px;
            overflow-y: auto;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        
        #userInput {
            width: 80%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        
        button {
            padding: 5px;
            border-radius: 5px;
            border: none;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div id="chatbox">
        <div id="chatlog">
            <!-- Chat messages will be displayed here -->
        </div>
        <input type="text" id="userInput" placeholder="Type your message here..." onkeypress="handleKeyPress(event)">
        <button onclick="sendMessage()">Send</button>
    </div>

    <script>
        function handleKeyPress(event) {
            // Allow user to press Enter to send a message
            if (event.key === 'Enter') {
                sendMessage();
            }
        }

        function sendMessage() {
            // Retrieve the user's message from the input
            const message = document.getElementById('userInput').value.trim();
            document.getElementById('userInput').value = ''; // Clear the input field

            if (message === '') {
                // Don't send empty messages
                return;
            }

            // Display the user's message in the chat log
            addMessageToChatLog('User', message);

            // Send the message to the server
            fetch('/chatbot/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ message: message })
            })
            .then(response => response.json())
            .then(data => {
                // Display the bot's response in the chat log
                addMessageToChatLog('Bot', data.message);
            })
            .catch(error => {
                // Handle any errors that occur
                console.error('Error:', error);
                addMessageToChatLog('Bot', 'Sorry, there was an error processing your request.');
            });
        }

        function addMessageToChatLog(sender, message) {
            // Create a new div element for the message
            const messageDiv = document.createElement('div');
            
            // Add appropriate class for user and bot messages
            if (sender === 'User') {
                messageDiv.style.textAlign = 'right';
                messageDiv.style.color = 'blue';
            } else {
                messageDiv.style.textAlign = 'left';
                messageDiv.style.color = 'green';
            }

            // Sanitize message to prevent XSS
            const sanitizedMessage = document.createTextNode(message);
            
            // Append the sender's label and the sanitized message to the div
            messageDiv.appendChild(document.createTextNode(sender + ': '));
            messageDiv.appendChild(sanitizedMessage);

            // Append the message div to the chat log
            document.getElementById('chatlog').appendChild(messageDiv);

            // Scroll to the bottom of the chat log
            document.getElementById('chatlog').scrollTop = document.getElementById('chatlog').scrollHeight;
        }
    </script>
</body>

</html>
