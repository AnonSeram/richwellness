@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chat</div>

                <div class="card-body">
                    <div id="chat-messages" class="mb-3" style="height: 400px; overflow-y: auto;">
                        @foreach($chats as $chat)
                            <div class="message {{ $chat->is_bot ? 'bot' : 'user' }}">
                                <div class="message-content">
                                    {{ $chat->message }}
                                </div>
                                @if($chat->is_bot && $chat->language)
                                    <small class="text-muted">
                                        {{ $chat->language === 'en' ? 'English' : 'Indonesia' }}
                                    </small>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <form id="chat-form">
                        <div class="input-group">
                            <input type="text" id="message" class="form-control" placeholder="Type your message...">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.message {
    margin-bottom: 10px;
    padding: 10px;
    border-radius: 5px;
}

.message.user {
    background-color: #e3f2fd;
    margin-left: 20%;
}

.message.bot {
    background-color: #f5f5f5;
    margin-right: 20%;
}

.message-content {
    margin-bottom: 5px;
}

.notification {
    background-color: #fff3cd;
    text-align: center;
    font-style: italic;
    margin: 10px 0;
    padding: 5px;
    border-radius: 5px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatForm = document.getElementById('chat-form');
    const messageInput = document.getElementById('message');
    const chatMessages = document.getElementById('chat-messages');
    let currentLanguage = 'id';

    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const message = messageInput.value.trim();
        if (!message) return;

        // Add user message
        addMessage(message, false);
        messageInput.value = '';

        // Send to server
        fetch('/chat/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ message: message })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Check if language changed
                if (data.languageChanged) {
                    const languageText = data.language === 'en' ? 'English' : 'Indonesia';
                    addNotification(`Switched to ${languageText}`);
                    currentLanguage = data.language;
                }
                addMessage(data.response, true, data.language);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            addMessage('Sorry, an error occurred.', true);
        });
    });

    function addMessage(text, isBot, language = null) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${isBot ? 'bot' : 'user'}`;
        
        const contentDiv = document.createElement('div');
        contentDiv.className = 'message-content';
        contentDiv.textContent = text;
        messageDiv.appendChild(contentDiv);

        if (isBot && language) {
            const languageSpan = document.createElement('small');
            languageSpan.className = 'text-muted';
            languageSpan.textContent = language === 'en' ? 'English' : 'Indonesia';
            messageDiv.appendChild(languageSpan);
        }

        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function addNotification(text) {
        const notificationDiv = document.createElement('div');
        notificationDiv.className = 'notification';
        notificationDiv.textContent = text;
        chatMessages.appendChild(notificationDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
});
</script>
@endsection 