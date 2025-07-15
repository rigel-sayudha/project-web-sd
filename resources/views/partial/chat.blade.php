{{-- <style>
#chatButton {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #2563eb;
    color: white;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
}

#chatWindow {
    position: fixed;
    bottom: 90px;
    right: 20px;
    width: 320px;
    max-height: 400px;
    background: white;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.3);
    display: none;
    flex-direction: column;
    z-index: 1000;
}

#chatHeader {
    background-color: #2563eb;
    color: white;
    padding: 10px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    font-weight: bold;
}

#chatMessages {
    flex: 1;
    padding: 10px;
    overflow-y: auto;
    font-size: 14px;
}

#chatInputContainer {
    display: flex;
    border-top: 1px solid #ddd;
}

#chatInput {
    flex: 1;
    border: none;
    padding: 10px;
    font-size: 14px;
    border-bottom-left-radius: 10px;
}

#chatSendButton {
    background-color: #2563eb;
    color: white;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    border-bottom-right-radius: 10px;
}

.message {
    margin-bottom: 10px;
}

.message.user {
    text-align: right;
    color: #2563eb;
}

.message.bot {
    text-align: left;
    color: #444;
}
</style>

<button id="chatButton" aria-label="Open chat">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="28" height="28">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4-.8L3 20l1.2-4a8.963 8.963 0 01-1.2-4c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
    </svg>
</button>

<div id="chatWindow" role="dialog" aria-modal="true" aria-labelledby="chatHeader">
    <div id="chatHeader">Layanan Chat AI</div>
    <div id="chatMessages" aria-live="polite" aria-atomic="false"></div>
    <div id="chatInputContainer">
        <input type="text" id="chatInput" placeholder="Tulis pesan..." aria-label="Tulis pesan"/>
        <button id="chatSendButton" aria-label="Kirim pesan">Kirim</button>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatButton = document.getElementById('chatButton');
    const chatWindow = document.getElementById('chatWindow');
    const chatMessages = document.getElementById('chatMessages');
    const chatInput = document.getElementById('chatInput');
    const chatSendButton = document.getElementById('chatSendButton');

    chatButton.addEventListener('click', () => {
        if (chatWindow.style.display === 'flex') {
            chatWindow.style.display = 'none';
        } else {
            chatWindow.style.display = 'flex';
            chatInput.focus();
        }
    });

    function appendMessage(text, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message', sender);
        messageDiv.textContent = text;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    async function sendMessage() {
        const message = chatInput.value.trim();
        if (!message) return;

        appendMessage(message, 'user');
        chatInput.value = '';
        chatInput.disabled = true;
        chatSendButton.disabled = true;

        try {
            const response = await fetch('/api/chat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message })
            });
            const data = await response.json();
            if (data.reply) {
                appendMessage(data.reply, 'bot');
            } else {
                appendMessage('Maaf, terjadi kesalahan pada layanan chat.', 'bot');
            }
        } catch (error) {
            appendMessage('Gagal menghubungi layanan chat.', 'bot');
        } finally {
            chatInput.disabled = false;
            chatSendButton.disabled = false;
            chatInput.focus();
        }
    }

    chatSendButton.addEventListener('click', sendMessage);
    chatInput.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
});
</script> --}}
