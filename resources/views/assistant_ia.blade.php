@extends('Accueil.layouts.appp2')

@section('content')

<style>
    .assistant-wrapper {
        max-width: 1000px;
        margin: 0 auto;
    }

    .assistant-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 10px 35px rgba(0, 0, 0, 0.08);
    }

    /* En-tête */
    .assistant-header {
        background: linear-gradient(135deg, #198754, #20c997);
        color: white;
        padding: 25px 30px;
    }

    .assistant-header-content {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .assistant-icon {
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .assistant-title {
        margin: 0;
        font-size: 24px;
        font-weight: 700;
    }

    .assistant-status {
        font-size: 14px;
        opacity: 0.9;
        margin-top: 4px;
    }

    .status-dot {
        display: inline-block;
        width: 9px;
        height: 9px;
        background: #d1fae5;
        border-radius: 50%;
        margin-right: 5px;
    }

    /* Zone de discussion */
    #chat {
        height: 450px;
        overflow-y: auto;
        padding: 25px;
        background: #f8fafc;
    }

    #chat::-webkit-scrollbar {
        width: 6px;
    }

    #chat::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .message-row {
        display: flex;
        margin-bottom: 18px;
    }

    .message-row.user {
        justify-content: flex-end;
    }

    .message-row.assistant {
        justify-content: flex-start;
    }

    .message-bubble {
        width: fit-content;
        max-width: 75%;
        min-width: 0;
        padding: 13px 17px;
        border-radius: 18px;
        line-height: 1.5;
        font-size: 15px;
        white-space: normal;
        overflow-wrap: anywhere;
    }

    .message-content {
        white-space: pre-wrap;
        overflow-wrap: anywhere;
    }

    .user .message-bubble {
        background: #198754;
        color: white;
        border-bottom-right-radius: 5px;
    }

    .assistant .message-bubble {
        background: white;
        color: #334155;
        border: 1px solid #e2e8f0;
        border-bottom-left-radius: 5px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.03);
    }

    .message-name {
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 5px;
        opacity: 0.8;
    }

    .message-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 8px;
    }

    .btn-edit-message {
        padding: 0;
        color: inherit;
        font-size: 12px;
        text-decoration: underline;
        opacity: .85;
    }

    .btn-edit-message:hover {
        color: inherit;
        opacity: 1;
    }

    /* Zone de saisie */
    .assistant-input-area {
        padding: 20px;
        background: white;
        border-top: 1px solid #e5e7eb;
    }

    .assistant-input-group {
        display: flex;
        gap: 10px;
    }

    .assistant-tools {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 10px;
    }

    .assistant-tools select,
    .assistant-tools input {
        min-height: 38px;
    }

    .btn-assistant-tool {
        border: 1px solid #d1d5db;
        border-radius: 10px;
        background: #fff;
        color: #334155;
        padding: 6px 10px;
    }

    #exam-timer {
        align-self: center;
        color: #b45309;
        font-size: 13px;
        font-weight: 700;
    }

    .message-attachment {
        display: block;
        max-width: 100%;
        max-height: 220px;
        margin-top: 8px;
        border-radius: 10px;
    }

    #message {
        border-radius: 12px;
        padding: 13px 16px;
        border: 1px solid #d1d5db;
        box-shadow: none;
    }

    #message:focus {
        border-color: #198754;
        box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.1);
    }

    .btn-assistant {
        border: none;
        border-radius: 12px;
        padding: 0 22px;
        background: #198754;
        color: white;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-assistant:hover {
        background: #157347;
        color: white;
        transform: translateY(-1px);
    }

    .welcome-message {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 15px;
        padding: 18px;
        color: #475569;
    }

    .welcome-message strong {
        color: #198754;
    }

    /* Mobile */
    @media (max-width: 768px) {

        .assistant-wrapper {
            width: 100%;
        }

        .assistant-header {
            padding: 20px;
        }

        #chat {
            height: 400px;
            padding: 18px;
        }

        .message-bubble {
            max-width: 88%;
        }

        .assistant-input-group {
            flex-direction: column;
        }

        .btn-assistant {
            height: 48px;
        }
    }
</style>


<div class="container py-5">

    <div class="assistant-wrapper">

        <div class="assistant-card">

            <!-- EN-TÊTE -->
            <div class="assistant-header">

                <div class="assistant-header-content">

                    <div class="assistant-icon">
                        🤖
                    </div>

                    <div>

                        <h2 class="assistant-title">
                            Assistant IA SkillOra
                        </h2>

                        <div class="assistant-status">
                            <span class="status-dot"></span>
                            Assistant pédagogique en ligne
                        </div>

                    </div>

                </div>

            </div>


            <!-- CHAT -->
            <div id="chat">
                @if($messages->isEmpty())
                <div class="message-row assistant">

                    <div class="message-bubble welcome-message">

                        <div class="message-name">
                            🤖 Assistant IA
                        </div>

                        <strong>Bonjour {{ $user->name ?? '' }} 👋</strong>

                        <br>

                        Je suis votre assistant pédagogique SkillOra.

                        <br><br>

                        Je peux vous aider à comprendre vos cours,
                        vos exercices et les notions qui vous posent
                        des difficultés.

                        <br><br>

                        <strong>Posez-moi votre question pour commencer.</strong>

                    </div>

                </div>
                @else
                    @foreach($messages as $assistantMessage)
                        <div class="message-row {{ $assistantMessage->role === 'user' ? 'user' : 'assistant' }}" data-message-id="{{ $assistantMessage->id }}">
                            <div class="message-bubble">
                                <div class="message-name">
                                    {{ $assistantMessage->role === 'user' ? 'Vous' : '🤖 Assistant IA' }}
                                </div>
                                <div class="message-content">{{ $assistantMessage->content }}</div>
                                @if($assistantMessage->attachment_path)
                                    <img class="message-attachment" src="{{ Storage::disk('public')->url($assistantMessage->attachment_path) }}" alt="Image envoyée pour analyse">
                                @endif
                                @if($assistantMessage->role === 'user')
                                    <div class="message-actions">
                                        <button type="button" class="btn btn-link btn-edit-message" data-edit-message>
                                            Modifier
                                        </button>
                                    </div>
                                @else
                                    <div class="message-actions">
                                        <button type="button" class="btn btn-link btn-edit-message" data-read-message>
                                            Écouter
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>


            <!-- SAISIE -->
            <div class="assistant-input-area">

                <div class="assistant-tools" aria-label="Outils pédagogiques de l'assistant">
                    <select id="assistant-mode" class="form-select form-select-sm" aria-label="Mode d'assistance">
                        <option value="assistant">Question sur ma formation</option>
                        <option value="motivation">Objectif et motivation</option>
                        <option value="exam">Examen blanc</option>
                        <option value="feedback">Corriger un devoir</option>
                        <option value="language">Pratiquer une langue</option>
                        <option value="image">Analyser une photo</option>
                    </select>
                    <select id="assistant-language" class="form-select form-select-sm" aria-label="Langue de la réponse">
                        <option value="fr">Français</option>
                        <option value="en">English</option>
                    </select>
                    <input id="exam-duration" class="form-control form-control-sm" type="number" min="5" max="180" value="30" hidden aria-label="Durée de l'examen blanc en minutes">
                    <span id="exam-timer" hidden aria-live="polite"></span>
                    <label class="btn-assistant-tool" for="assistant-attachment">📷 Photo</label>
                    <input id="assistant-attachment" type="file" accept="image/jpeg,image/png,image/webp" hidden>
                    <button type="button" class="btn-assistant-tool" id="voice-input" aria-label="Dicter votre question">🎙️ Parler</button>
                </div>

                <div class="assistant-input-group">

                    <input
                        type="text"
                        id="message"
                        class="form-control"
                        placeholder="Posez votre question..."
                        autocomplete="off"
                        value="{{ $initialPrompt ?? '' }}"
                    >

                    <button
                        type="button"
                        class="btn-assistant"
                        onclick="envoyerMessage()"
                    >
                        <i class="bi bi-send-fill"></i>
                        Envoyer
                    </button>

                </div>

                <div class="text-muted small mt-2">
                    L'assistant IA peut vous aider dans votre apprentissage.
                </div>

            </div>

        </div>

    </div>

</div>


<script>

let messageEnCoursDeModification = null;
let envoiEnCours = false;
let examTimer = null;

function demarrerChronometreExamen(minutes) {
    if (examTimer !== null) return;

    const timer = document.getElementById('exam-timer');
    let secondesRestantes = Number(minutes) * 60;
    timer.hidden = false;

    const afficher = () => {
        const minutesRestantes = Math.floor(secondesRestantes / 60);
        const secondes = String(secondesRestantes % 60).padStart(2, '0');
        timer.textContent = `Examen : ${minutesRestantes}:${secondes}`;
    };

    afficher();
    examTimer = window.setInterval(() => {
        secondesRestantes -= 1;
        afficher();

        if (secondesRestantes <= 0) {
            window.clearInterval(examTimer);
            examTimer = null;
            timer.textContent = 'Temps écoulé : préparation du bilan…';
            document.getElementById('message').value = 'Le temps est écoulé. Corrige mes réponses et prépare mon bilan par compétence.';
            envoyerMessage();
        }
    }, 1000);
}

function ajouterMessage(role, contenu, messageId = null, attachmentUrl = null) {

    const chat = document.getElementById('chat');
    const row = document.createElement('div');
    const bubble = document.createElement('div');
    const name = document.createElement('div');
    const content = document.createElement('div');

    row.className = `message-row ${role}`;
    bubble.className = 'message-bubble';
    name.className = 'message-name';
    content.className = 'message-content';
    name.textContent = role === 'user' ? 'Vous' : '🤖 Assistant IA';
    content.textContent = contenu;

    if (messageId) {
        row.dataset.messageId = messageId;
    }

    if (role === 'user') {
        const actions = document.createElement('div');
        const editButton = document.createElement('button');

        actions.className = 'message-actions';
        editButton.type = 'button';
        editButton.className = 'btn btn-link btn-edit-message';
        editButton.dataset.editMessage = '';
        editButton.textContent = 'Modifier';
        actions.appendChild(editButton);
        bubble.appendChild(name);
        bubble.appendChild(content);
        bubble.appendChild(actions);
    } else {
        bubble.appendChild(name);
        bubble.appendChild(content);

        const actions = document.createElement('div');
        const readButton = document.createElement('button');
        actions.className = 'message-actions';
        readButton.type = 'button';
        readButton.className = 'btn btn-link btn-edit-message';
        readButton.dataset.readMessage = '';
        readButton.textContent = 'Écouter';
        actions.appendChild(readButton);
        bubble.appendChild(actions);
    }

    if (attachmentUrl) {
        const image = document.createElement('img');
        image.className = 'message-attachment';
        image.src = attachmentUrl;
        image.alt = 'Image envoyée pour analyse';
        bubble.appendChild(image);
    }

    row.appendChild(bubble);
    chat.appendChild(row);

    return row;
}

function envoyerMessage() {

    if (envoiEnCours) {
        return;
    }

    let input = document.getElementById('message');

    let message = input.value.trim();

    if (message === "" && !document.getElementById('assistant-attachment').files[0]) {
        return;
    }


    let chat = document.getElementById('chat');


    const messageModifie = messageEnCoursDeModification;
    const attachment = document.getElementById('assistant-attachment').files[0];
    const mode = document.getElementById('assistant-mode').value;
    const language = document.getElementById('assistant-language').value;
    const examDuration = document.getElementById('exam-duration').value;
    const messageRow = messageModifie ? messageModifie.row : ajouterMessage('user', message);
    const previousContent = messageModifie ? messageModifie.content : null;
    const sendButton = document.querySelector('.btn-assistant');

    envoiEnCours = true;
    input.value = "";
    input.disabled = true;
    sendButton.disabled = true;

    if (!messageModifie && mode === 'exam') {
        demarrerChronometreExamen(examDuration);
    }


    // Descendre automatiquement
    chat.scrollTop = chat.scrollHeight;


    const url = messageModifie
        ? "{{ route('assistant_message_update', ['message' => '__MESSAGE_ID__']) }}".replace('__MESSAGE_ID__', messageModifie.id)
        : "{{ route('assistant_message') }}";

    const formData = new FormData();
    formData.append('message', message);
    if (!messageModifie) {
        formData.append('mode', mode);
        formData.append('language', language);
        if (mode === 'exam') formData.append('exam_duration', examDuration);
        if (attachment) formData.append('attachment', attachment);
    }

    fetch(url, {

        method: messageModifie ? "PATCH" : "POST",

        headers: {

            "X-CSRF-TOKEN":
                "{{ csrf_token() }}",

            "Accept": "application/json"

        },

        body: formData

    })


    .then(response => {

        if (!response.ok) {

            throw new Error(
                "Erreur lors de la communication avec l'assistant."
            );

        }

        return response.json();

    })


    .then(data => {

        if (messageModifie) {
            messageRow.querySelector('.message-content').textContent = message;

            while (messageRow.nextElementSibling) {
                messageRow.nextElementSibling.remove();
            }

            messageEnCoursDeModification = null;
            sendButton.innerHTML = '<i class="bi bi-send-fill"></i> Envoyer';
        } else {
            messageRow.dataset.messageId = data.message_id;
            if (data.attachment_url) {
                const image = document.createElement('img');
                image.className = 'message-attachment';
                image.src = data.attachment_url;
                image.alt = 'Image envoyée pour analyse';
                messageRow.querySelector('.message-bubble').appendChild(image);
            }
            document.getElementById('assistant-attachment').value = '';
        }

        ajouterMessage('assistant', data.reponse);


        chat.scrollTop = chat.scrollHeight;

    })


    .catch(error => {

        console.error(error);

        if (messageModifie) {
            input.value = message;
            messageRow.querySelector('.message-content').textContent = previousContent;
        } else {
            messageRow.remove();
            input.value = message;
        }

        ajouterMessage('assistant', 'Désolé, une erreur est survenue. Veuillez réessayer.');

        chat.scrollTop = chat.scrollHeight;

    })
    .finally(() => {
        envoiEnCours = false;
        input.disabled = false;
        sendButton.disabled = false;
        input.focus();
    });

}


/* Envoyer avec la touche Entrée */

document.getElementById('message').addEventListener(
    'keydown',
    function(event) {

        if (event.key === 'Enter') {

            event.preventDefault();

            envoyerMessage();

        }

    }
);

document.getElementById('chat').scrollTop =
    document.getElementById('chat').scrollHeight;

document.getElementById('chat').addEventListener('click', function(event) {
    const readButton = event.target.closest('[data-read-message]');

    if (readButton) {
        const text = readButton.closest('.message-bubble').querySelector('.message-content').textContent;
        if (!('speechSynthesis' in window)) {
            return;
        }
        window.speechSynthesis.cancel();
        const utterance = new SpeechSynthesisUtterance(text);
        utterance.lang = document.getElementById('assistant-language').value === 'en' ? 'en-US' : 'fr-FR';
        window.speechSynthesis.speak(utterance);
        return;
    }

    const editButton = event.target.closest('[data-edit-message]');

    if (!editButton || envoiEnCours) {
        return;
    }

    const row = editButton.closest('.message-row.user');
    const content = row.querySelector('.message-content').textContent;

    messageEnCoursDeModification = {
        id: row.dataset.messageId,
        row: row,
        content: content,
    };

    const input = document.getElementById('message');
    input.value = content;
    input.focus();
    document.querySelector('.btn-assistant').innerHTML = '<i class="bi bi-send-fill"></i> Renvoyer';
});

document.getElementById('assistant-mode').addEventListener('change', function() {
    const isExam = this.value === 'exam';
    document.getElementById('exam-duration').hidden = !isExam;
    document.querySelector('label[for="assistant-attachment"]').hidden = this.value !== 'image';
});

document.getElementById('voice-input').addEventListener('click', function() {
    const Recognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    if (!Recognition) {
        alert('La dictée vocale n’est pas prise en charge par ce navigateur.');
        return;
    }

    const recognition = new Recognition();
    recognition.lang = document.getElementById('assistant-language').value === 'en' ? 'en-US' : 'fr-FR';
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;
    this.disabled = true;
    this.textContent = '🎙️ Écoute…';
    recognition.onresult = (event) => {
        document.getElementById('message').value = event.results[0][0].transcript;
    };
    recognition.onerror = () => alert('La dictée n’a pas pu être réalisée. Réessayez ou écrivez votre question.');
    recognition.onend = () => {
        this.disabled = false;
        this.textContent = '🎙️ Parler';
    };
    recognition.start();
});

</script>

@endsection
