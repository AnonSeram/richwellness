@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chat dengan RichBot</div>
                <div class="card-body">
                    <!-- Welcome Message -->
                    <div class="welcome-message mb-4">
                        <div class="message bot-message">
                            <div class="message-content">
                                <p>Selamat datang di Rich Wellness Chatbot! 👋</p>
                                <p>Saya adalah asisten virtual yang siap membantu Anda dengan informasi tentang layanan kami.</p>
                                <p>Anda dapat bertanya tentang:</p>
                                <ul>
                                    <li>Layanan yang tersedia</li>
                                    <li>Ketersediaan kamar</li>
                                    <li>Harga dan paket</li>
                                    <li>Dan informasi lainnya</li>
                                </ul>
                                <p>Apa yang ingin Anda tanyakan?</p>
                            </div>
                        </div>
                    </div>

                    <!-- Chat Container -->
                    <div class="chat-container">
                        <div class="chat-messages p-4" id="chat-messages">
                            <!-- Chat messages will appear here -->
                        </div>
                        <chat-box></chat-box>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.chat-container {
    height: 500px;
    display: flex;
    flex-direction: column;
}

.welcome-message {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 20px;
}

.welcome-message .message-content {
    color: #333;
}

.welcome-message ul {
    margin-left: 20px;
    margin-bottom: 15px;
}

.welcome-message li {
    margin-bottom: 5px;
}

.chat-messages {
    flex: 1;
    overflow-y: auto;
    padding: 1rem;
}

.message {
    margin-bottom: 1rem;
    max-width: 80%;
    padding: 0.5rem 1rem;
    border-radius: 1rem;
}

.message.user {
    margin-left: auto;
    background-color: #007bff;
    color: white;
}

.message.bot {
    margin-right: auto;
    background-color: #f1f1f1;
    color: black;
}

.message-time {
    font-size: 0.8rem;
    margin-top: 0.25rem;
    opacity: 0.7;
}

.chat-input {
    display: flex;
    padding: 1rem;
    border-top: 1px solid #dee2e6;
}

.chat-input input {
    flex: 1;
    margin-right: 0.5rem;
    padding: 0.5rem;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
}

.chat-input button {
    padding: 0.5rem 1rem;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 0.25rem;
    cursor: pointer;
}

.chat-input button:disabled {
    background-color: #6c757d;
    cursor: not-allowed;
}
</style>
@endpush 