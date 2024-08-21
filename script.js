document.querySelectorAll('.question-btn').forEach(button => {
    button.addEventListener('click', function() {
        const keyword = this.getAttribute('data-keyword');
        let response;

        switch (keyword) {
            case 'hours':
                response = 'Our hours of operation are Monday to Friday, 10 AM to 5 PM.';
                break;
            case 'location':
                response = 'We are located at VBEST, THIRUVALLUVAR SALAI, P. VELUR';
                break;
            case 'contact':
                response = 'You can contact us at vbest.velur@gmail.com or call us at +91 94891 82727.';
                break;
            default:
                response = 'For further queries, please contact our admin';
                break;
        }

        const chatBox = document.getElementById('chat-box');
        const botMessage = document.createElement('div');
        botMessage.className = 'chat-message bot-message';
        botMessage.textContent = response;
        chatBox.appendChild(botMessage);
        chatBox.scrollTop = chatBox.scrollHeight;
    });
})