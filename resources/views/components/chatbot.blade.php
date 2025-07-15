<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rich Bot</title>
    <!-- Anda mungkin perlu menambahkan link ke Bootstrap CSS dan Icons di sini jika belum ada di layout utama -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<!-- Chat Bubble -->
<div id="chat-bubble" style="position: fixed; bottom: 24px; right: 24px; z-index: 999;">
    <button class="btn btn-primary rounded-circle shadow-lg" style="width: 60px; height: 60px; background-color: #5E96AE; border: none; transition: all 0.3s ease;">
        <i class="bi bi-chat-dots" style="font-size: 24px;"></i>
    </button>
</div>

<!-- Chat Box -->
<div id="chat-box" style="display: none; position: fixed; bottom: 100px; right: 24px; width: 350px; height: 500px; background: white; border-radius: 15px; box-shadow: 0 5px 25px rgba(0,0,0,0.2 ); z-index: 1000; overflow: hidden; opacity: 0; transform: translateY(20px); transition: opacity 0.3s ease, transform 0.3s ease;">
    <div class="p-3 border-bottom" style="background-color: #5E96AE; color: white;">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">Rich Bot</h5>
            </div>
            <div class="d-flex align-items-center">
                <div id="language-display" class="language-display me-2" style="cursor: pointer;">
                    <span id="language-label">IND</span>
                    <span class="dropdown-icon">▼</span>
                </div>
                <button id="refresh-chat-button" class="btn btn-link text-white me-2" style="text-decoration: none;">
                    <i class="bi bi-arrow-clockwise"></i>
                </button>
                <button id="close-chat-button" class="btn-close btn-close-white"></button>
            </div>
        </div>
    </div>
    <div class="p-3" id="chat-content" style="height: calc(100% - 180px); overflow-y: auto; background-color: #f8f9fa;">
        <!-- Pesan selamat datang akan ditambahkan oleh JavaScript -->
    </div>
    <div class="p-3 border-top" style="background-color: white;">
        <div id="faq-buttons-container" style="margin-bottom: 10px;">
            <!-- Tombol FAQ akan dimuat di sini oleh JavaScript -->
        </div>
        <div class="input-group">
            <input type="text" id="custom-message-input" class="form-control" placeholder="Ketik pesan..." style="border-radius: 20px 0 0 20px; border: 1px solid #dee2e6;">
            <button class="btn btn-primary" id="send-message-button" style="border-radius: 0 20px 20px 0; background-color: #5E96AE; border: none;">
                <i class="bi bi-send"></i>
            </button>
        </div>
    </div>
</div>

<style>
    /* Chat bubble animation */
    #chat-bubble button { animation: pulse 2s infinite; }
    @keyframes pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.1); } }

    /* Chat box styling */
    #chat-box { transition: all 0.3s ease; }
    #chat-content::-webkit-scrollbar { width: 6px; }
    #chat-content::-webkit-scrollbar-track { background: #f1f1f1; }
    #chat-content::-webkit-scrollbar-thumb { background: #5E96AE; border-radius: 3px; }

    /* Message bubbles */
    .message-bubble { max-width: 85%; padding: 10px 15px; margin: 8px 0; border-radius: 18px; position: relative; animation: fadeIn 0.4s ease; word-wrap: break-word; }
    .message-bubble.user { background-color: #5E96AE; color: white; margin-left: auto; border-bottom-right-radius: 5px; }
    .message-bubble.bot { background-color: #e9ecef; color: #212529; margin-right: auto; border-bottom-left-radius: 5px; }
    .message-bubble.error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

    /* FAQ buttons */
    .faq-button { display: inline-block; padding: 8px 12px; margin: 0; background-color: #f8f9fa; border: 1px solid #dee2e6; border-radius: 20px; transition: all 0.3s ease; cursor: pointer; font-size: 12px; white-space: nowrap; flex-shrink: 0; }
    .faq-button:hover { background-color: #5E96AE; color: white; transform: translateY(-2px); border-color: #5E96AE; }
    
    /* FAQ Container */
    .faq-container { display: flex; gap: 8px; overflow-x: auto; padding: 5px 0; scrollbar-width: thin; scrollbar-color: #5E96AE #f1f1f1; }
    .faq-container::-webkit-scrollbar { height: 4px; }
    .faq-container::-webkit-scrollbar-track { background: #f1f1f1; }
    .faq-container::-webkit-scrollbar-thumb { background: #5E96AE; }

    /* Loading animation */
    .typing-indicator { display: inline-flex; align-items: center; }
    .typing-indicator span { display: inline-block; width: 8px; height: 8px; background-color: #666; border-radius: 50%; margin: 0 2px; animation: typing 1s infinite; }
    .typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
    .typing-indicator span:nth-child(3) { animation-delay: 0.4s; }
    @keyframes typing { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-5px); } }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

    /* Language Display */
    .language-display { padding: 5px 10px; border: 1px solid rgba(255, 255, 255, 0.3); border-radius: 6px; transition: all 0.3s ease; }
    .language-display:hover { background: rgba(255, 255, 255, 0.2); }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // --- Elemen-elemen DOM ---
    const chatBox = document.getElementById('chat-box');
    const chatContent = document.getElementById('chat-content');
    const messageInput = document.getElementById('custom-message-input');
    const sendButton = document.getElementById('send-message-button');
    const faqContainer = document.getElementById('faq-buttons-container');
    const langLabel = document.getElementById('language-label');

    // --- Variabel State ---
    let currentLang = 'id';
    let defaultFAQs = {
        id: ['Apa saja layanan yang tersedia?', 'Cek ketersediaan kamar', 'Dimana lokasi Rich Wellness?'],
        en: ['What services are available?', 'Check room availability', 'Where is Rich Wellness located?']
    };

    // --- Fungsi Utama ---

    /**
     * Mengirim pesan ke server (dipicu oleh user)
     */
    async function handleSendMessage() {
        const message = messageInput.value.trim();
        if (!message) return;

        addMessageToUI(message, 'user');
        messageInput.value = ''; // Langsung kosongkan input
        showTypingIndicator();
        toggleInput(false); // Nonaktifkan input

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
            const response = await fetch('/api/chat/send', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ message: message })
            });

            if (!response.ok) {
                // Coba baca error dari server, jika gagal, buat pesan error umum
                const errorText = await response.text();
                throw new Error(`HTTP ${response.status}: ${errorText || 'Server returned an error'}`);
            }

            const data = await response.json();
            
            hideTypingIndicator();
            addMessageToUI(data.response, 'bot');

            // Perbarui bahasa jika server mendeteksi perubahan
            if (data.language && data.language !== currentLang) {
                updateLanguage(data.language, false); // false = jangan panggil API lagi
            }
            
            // Tampilkan quick replies dari server jika ada, jika tidak, tampilkan default
            const quickReplies = data.quickReplies && data.quickReplies.length > 0 ? data.quickReplies : defaultFAQs[currentLang];
            displayFAQButtons(quickReplies);

        } catch (error) {
            console.error('SendMessage Error:', error);
            hideTypingIndicator();
            addMessageToUI(`Error: ${error.message}`, 'bot error');
        } finally {
            toggleInput(true); // Selalu aktifkan kembali input
        }
    }

    /**
     * Menginisialisasi atau mereset chat ke keadaan awal
     */
    function initializeChat() {
        chatContent.innerHTML = ''; // Kosongkan chat
        const welcomeMessage = currentLang === 'id' 
            ? 'Halo! Saya RichBot, asisten virtual dari Rich Wellness. Ada yang bisa saya bantu?'
            : 'Hello! I am RichBot, a virtual assistant from Rich Wellness. How can I help you?';
        
        addMessageToUI(welcomeMessage, 'bot');
        displayFAQButtons(defaultFAQs[currentLang]);
        toggleInput(true);
    }

    // --- Fungsi Helper ---

    function addMessageToUI(message, type) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message-bubble ${type}`;
        messageDiv.innerHTML = message.replace(/\n/g, '<br>');
        chatContent.appendChild(messageDiv);
        chatContent.scrollTop = chatContent.scrollHeight;
    }

    function showTypingIndicator() {
        const indicator = document.createElement('div');
        indicator.id = 'typing-indicator';
        indicator.className = 'message-bubble bot';
        indicator.innerHTML = '<div class="typing-indicator"><span></span><span></span><span></span></div>';
        chatContent.appendChild(indicator);
        chatContent.scrollTop = chatContent.scrollHeight;
    }

    function hideTypingIndicator() {
        const indicator = document.getElementById('typing-indicator');
        if (indicator) indicator.remove();
    }

    function displayFAQButtons(faqList) {
        faqContainer.innerHTML = '';
        const listWrapper = document.createElement('div');
        listWrapper.className = 'faq-container';

        faqList.forEach(question => {
            const button = document.createElement('button');
            button.className = 'faq-button';
            button.textContent = question;
            button.onclick = () => {
                messageInput.value = question;
                handleSendMessage();
            };
            listWrapper.appendChild(button);
        });
        faqContainer.appendChild(listWrapper);
    }

    function toggleInput(enable) {
        messageInput.disabled = !enable;
        sendButton.disabled = !enable;
        if (enable) {
            messageInput.focus();
        }
    }

    function toggleChatBox() {
        const isHidden = chatBox.style.display === 'none' || chatBox.style.opacity === '0';
        if (isHidden) {
            chatBox.style.display = 'block';
            setTimeout(() => {
                chatBox.style.opacity = '1';
                chatBox.style.transform = 'translateY(0)';
            }, 10);
        } else {
            chatBox.style.opacity = '0';
            chatBox.style.transform = 'translateY(20px)';
            setTimeout(() => { chatBox.style.display = 'none'; }, 300);
        }
    }

    async function updateLanguage(lang, callApi = true) {
        currentLang = lang;
        langLabel.textContent = lang === 'en' ? 'ENG' : 'IND';
        
        if (callApi) {
            try {
                await fetch('/api/chat/change-language', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ language: lang })
                });
                initializeChat(); // Reset chat dengan bahasa baru
            } catch (error) {
                console.error('Failed to update language on server:', error);
            }
        } else {
            // Jika tidak panggil API, cukup reset UI
            initializeChat();
        }
    }

    // --- Pemasangan Event Listeners ---
    sendButton.addEventListener('click', handleSendMessage);
    messageInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault(); // Mencegah form submit jika ada
            handleSendMessage();
        }
    });

    document.getElementById('chat-bubble').addEventListener('click', toggleChatBox);
    document.getElementById('close-chat-button').addEventListener('click', toggleChatBox);
    document.getElementById('refresh-chat-button').addEventListener('click', initializeChat);
    document.getElementById('language-display').addEventListener('click', () => {
        const newLang = currentLang === 'id' ? 'en' : 'id';
        updateLanguage(newLang, true);
    });

    // --- Inisialisasi Awal ---
    initializeChat();
});
</script>

</body>
</html>
