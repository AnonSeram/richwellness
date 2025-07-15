<template>
  <div class="chat-container">
    <div class="chat-messages" ref="messagesContainer">
      <div v-for="(message, index) in messages" :key="index">
        <div :class="['message', message.type]">
          <div class="message-content" v-html="formatMessage(message.message)"></div>
          <div class="message-time">{{ formatTime(message.time) }}</div>
        </div>
      </div>
    </div>
    <div class="chat-input">
      <input 
        type="text" 
        v-model="newMessage" 
        @keyup.enter="sendMessage"
        placeholder="Ketik pesan..."
        :disabled="loading"
      >
      <button @click="sendMessage" :disabled="loading || !newMessage.trim()">
        {{ loading ? 'Mengirim...' : 'Kirim' }}
      </button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      messages: [],
      newMessage: '',
      loading: false
    }
  },
  async mounted() {
    await this.loadWelcomeMessage()
    await this.loadChatHistory()
  },
  methods: {
    async loadWelcomeMessage() {
      try {
        const response = await fetch('/chat/welcome')
        const data = await response.json()
        if (data.success && data.message) {
          this.messages.push({
            message: data.message.text,
            type: 'bot',
            time: new Date()
          })
        }
      } catch (error) {
        console.error('Error loading welcome message:', error)
      }
    },
    formatMessage(message) {
      // Ganti newline dengan <br>
      return message.replace(/\n/g, '<br>')
    },
    async loadChatHistory() {
      try {
        const response = await fetch('/chat/history')
        const data = await response.json()
        if (data.history && data.history.length > 0) {
          this.messages = data.history
        }
        this.scrollToBottom()
      } catch (error) {
        console.error('Error loading chat history:', error)
      }
    },
    async sendMessage() {
      if (!this.newMessage.trim() || this.loading) return

      const message = this.newMessage.trim()
      this.newMessage = ''
      this.loading = true

      // Add user message
      this.messages.push({
        message,
        type: 'user',
        time: new Date()
      })

      try {
        const response = await fetch('/chat/send', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          body: JSON.stringify({ message })
        })

        const data = await response.json()
        
        // Add bot response with quick replies
        this.messages.push({
          message: data.response,
          type: 'bot',
          time: new Date(),
          quickReplies: this.getQuickReplies(data.response)
        })

        this.scrollToBottom()
      } catch (error) {
        console.error('Error sending message:', error)
        // Add error message with default quick replies
        this.messages.push({
          message: 'Maaf, terjadi kesalahan. Silakan coba lagi.',
          type: 'bot',
          time: new Date(),
          quickReplies: [
            'Apa saja layanan yang tersedia?',
            'Bagaimana cara reservasi?',
            'Dimana lokasi Rich Wellness?'
          ]
        })
      } finally {
        this.loading = false
      }
    },
    sendQuickReply(reply) {
      this.newMessage = reply
      this.sendMessage()
    },
    getQuickReplies(message) {
      const lowerMessage = message.toLowerCase()
      
      if (lowerMessage.includes('layanan') || lowerMessage.includes('fasilitas')) {
        return [
          'Apa saja fasilitas kamar?',
          'Berapa harga kamar?',
          'Bagaimana cara reservasi?'
        ]
      } else if (lowerMessage.includes('reservasi') || lowerMessage.includes('pesan')) {
        return [
          'Berapa lama proses reservasi?',
          'Apa saja syarat reservasi?',
          'Bagaimana cara pembayaran?'
        ]
      } else if (lowerMessage.includes('lokasi') || lowerMessage.includes('alamat')) {
        return [
          'Bagaimana akses ke Rich Wellness?',
          'Apa saja fasilitas di sekitar?',
          'Apakah ada transportasi dari bandara?'
        ]
      } else if (lowerMessage.includes('harga') || lowerMessage.includes('biaya')) {
        return [
          'Apakah ada promo khusus?',
          'Bagaimana cara mendapatkan diskon?',
          'Apakah ada paket hemat?'
        ]
      } else if (lowerMessage.includes('fasilitas kamar')) {
        return [
          'Apakah ada WiFi di kamar?',
          'Apakah ada TV di kamar?',
          'Apakah ada AC di kamar?'
        ]
      } else {
        return [
          'Apa saja layanan yang tersedia?',
          'Bagaimana cara reservasi?',
          'Dimana lokasi Rich Wellness?'
        ]
      }
    },
    scrollToBottom() {
      this.$nextTick(() => {
        const container = this.$refs.messagesContainer
        container.scrollTop = container.scrollHeight
      })
    },
    formatTime(date) {
      return new Date(date).toLocaleTimeString('id-ID', {
        hour: '2-digit',
        minute: '2-digit'
      })
    }
  }
}
</script>

<style scoped>
.chat-container {
  height: 500px;
  display: flex;
  flex-direction: column;
  background-color: #f8f9fa;
}

.chat-messages {
  flex: 1;
  overflow-y: auto;
  padding: 1rem;
}

.message {
  margin-bottom: 1rem;
  max-width: 80%;
  padding: 0.75rem 1rem;
  border-radius: 1rem;
  box-shadow: 0 1px 2px rgba(0,0,0,0.1);
}

.message.user {
  margin-left: auto;
  background-color: #007bff;
  color: white;
}

.message.bot {
  margin-right: auto;
  background-color: white;
  color: #212529;
  border: 1px solid #dee2e6;
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
  background-color: white;
}

.chat-input input {
  flex: 1;
  margin-right: 0.5rem;
  padding: 0.75rem;
  border: 1px solid #ced4da;
  border-radius: 0.5rem;
  font-size: 0.95rem;
}

.chat-input input:focus {
  outline: none;
  border-color: #007bff;
  box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
}

.chat-input button {
  padding: 0.75rem 1.5rem;
  background-color: #007bff;
  color: white;
  border: none;
  border-radius: 0.5rem;
  cursor: pointer;
  font-weight: 500;
  transition: all 0.2s;
}

.chat-input button:hover:not(:disabled) {
  background-color: #0056b3;
  transform: translateY(-1px);
}

.chat-input button:disabled {
  background-color: #6c757d;
  cursor: not-allowed;
  opacity: 0.65;
}
</style> 