@extends('Accueil.layouts.appp2')

@section('content')

<style>
    .messagerie-wrapper {
        padding: 40px 15px;
        background: #f5f7fb;
        min-height: calc(100vh - 100px);
    }

    .messagerie-card {
        max-width: 1200px;
        height: 700px;
        margin: auto;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 8px 35px rgba(0, 0, 0, 0.08);
        border: 1px solid #e9edf5;
    }

    /* =========================
       COLONNE GAUCHE
    ========================= */

    .contacts-panel {
        height: 100%;
        background: #ffffff;
        border-right: 1px solid #e9edf5;
    }

    .contacts-header {
        padding: 22px 20px;
        border-bottom: 1px solid #edf0f5;
    }

    .contacts-header h5 {
        margin: 0;
        font-size: 20px;
        font-weight: 700;
        color: #1f2937;
    }

    .contacts-header small {
        color: #8a94a6;
    }

    .contact-list {
        height: calc(100% - 82px);
        overflow-y: auto;
    }

    .contact-item {
        display: block;
        padding: 15px 18px;
        text-decoration: none;
        color: #273142;
        border: none !important;
        border-bottom: 1px solid #f1f3f7 !important;
        transition: all 0.25s ease;
    }

    .contact-item:hover {
        background: #f6f8fc;
        color: #273142;
    }

    .contact-item.active {
        background: #eef4ff !important;
        color: #155eef !important;
        border-left: 4px solid #155eef !important;
    }

    .contact-avatar {
        width: 48px;
        height: 48px;
        min-width: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, #155eef, #4f8cff);
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        font-weight: 700;
        margin-right: 13px;
    }

    .contact-name {
        font-size: 15px;
        font-weight: 600;
        display: block;
        margin-bottom: 3px;
    }

    .contact-specialite {
        font-size: 13px;
        color: #8a94a6;
    }

    .contact-item.active .contact-specialite {
        color: #5b7ecb;
    }

    /* =========================
       COLONNE CONVERSATION
    ========================= */

    .conversation-panel {
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #f8faff;
    }


    .conversation-header {
        min-height: 82px;
        padding: 15px 25px;
        background: #ffffff;
        border-bottom: 1px solid #e9edf5;
        display: flex;
        align-items: center;
        gap: 12px;
    }


    .conversation-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, #155eef, #4f8cff);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        margin-right: 13px;
    }

    .conversation-header h5 {
        margin: 0;
        font-size: 17px;
        font-weight: 700;
        color: #1f2937;
    }

    .conversation-header small {
        color: #8a94a6;
    }

    /* =========================
       MESSAGES
    ========================= */

    .messages-container {
        flex: 1;
        padding: 25px;
        overflow-y: auto;
    }

    .message-row {
        display: flex;
        margin-bottom: 16px;
    }

    .message-row.sent {
        justify-content: flex-end;
    }

    .message-row.received {
        justify-content: flex-start;
    }

    .message-bubble {
        max-width: 70%;
        padding: 12px 16px;
        border-radius: 17px;
        font-size: 14px;
        line-height: 1.5;
        word-wrap: break-word;
    }

    .message-row.sent .message-bubble {
        background: #155eef;
        color: white;
        border-bottom-right-radius: 5px;
    }

    .message-row.received .message-bubble {
        background: white;
        color: #374151;
        border: 1px solid #e5e9f0;
        border-bottom-left-radius: 5px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    }

    .message-time {
        display: block;
        margin-top: 5px;
        font-size: 11px;
        opacity: 0.7;
        text-align: right;
    }

    /* =========================
       ZONE ENVOI
    ========================= */

    .message-form {
        padding: 15px 20px;
        background: white;
        border-top: 1px solid #e9edf5;
    }

    .message-input-wrapper {
        display: flex;
        align-items: center;
        background: #f5f7fb;
        border: 1px solid #e3e7ef;
        border-radius: 30px;
        padding: 5px 6px 5px 18px;
        transition: 0.2s;
    }

    .message-input-wrapper:focus-within {
        border-color: #155eef;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(21, 94, 239, 0.08);
    }

    .message-input {
        flex: 1;
        border: none;
        outline: none;
        background: transparent;
        font-size: 14px;
        padding: 9px 10px;
        box-shadow: none !important;
    }

    .send-button {
        width: 44px;
        height: 44px;
        border: none;
        border-radius: 50%;
        background: #155eef;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: 0.25s;
    }

    .send-button:hover {
        background: #0d47c7;
        transform: scale(1.05);
    }

    .send-button i {
        font-size: 16px;
    }

    /* =========================
       ÉCRAN VIDE
    ========================= */

    .empty-conversation {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        color: #8a94a6;
        padding: 30px;
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: #eef4ff;
        color: #155eef;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
        margin-bottom: 20px;
    }

    .empty-conversation h5 {
        color: #374151;
        font-weight: 700;
        margin-bottom: 8px;
    }

    /* =========================
       SCROLLBAR
    ========================= */

    .contact-list::-webkit-scrollbar,
    .messages-container::-webkit-scrollbar {
        width: 5px;
    }

    .contact-list::-webkit-scrollbar-thumb,
    .messages-container::-webkit-scrollbar-thumb {
        background: #d6dce7;
        border-radius: 10px;
    }

    /* =========================
       RESPONSIVE
    ========================= */
    /* =========================
   RESPONSIVE
========================= */

/* =========================
   TABLETTES
========================= */

    @media (max-width: 991px) {

        .messagerie-wrapper {
            padding: 25px 12px;
        }

        .messagerie-card {
            height: 650px;
        }

        .contacts-panel {
            border-right: 1px solid #e9edf5;
        }

        .contacts-header {
            padding: 18px 15px;
        }

        .contact-item {
            padding: 13px 12px;
        }

        .contact-avatar {
            width: 42px;
            height: 42px;
            min-width: 42px;
            font-size: 16px;
            margin-right: 10px;
        }

        .contact-name {
            font-size: 14px;
        }

        .contact-specialite {
            font-size: 11px;
        }

        .conversation-header {
            padding: 12px 18px;
        }

        .messages-container {
            padding: 20px;
        }

        .message-bubble {
            max-width: 80%;
        }
    }


    /* =========================
    TELEPHONES
    ========================= */

    @media (max-width: 767px) {

        .messagerie-wrapper {
            padding: 10px 5px;
            min-height: calc(100vh - 80px);
        }

        .messagerie-card {
            width: 100%;
            height: auto;
            min-height: 0;
            margin: 0;
            border-radius: 12px;
            overflow: hidden;
        }

        .messagerie-card > .row {
            height: auto !important;
        }


        /* =====================
        LISTE DES FORMATEURS
        ===================== */

        .contacts-panel {
            height: 230px;
            border-right: none;
            border-bottom: 1px solid #e9edf5;
        }

        .contacts-header {
            padding: 15px 16px;
        }

        .contacts-header h5 {
            font-size: 18px;
        }

        .contacts-header small {
            font-size: 12px;
        }

        .contact-list {
            height: 165px;
            overflow-y: auto;
        }

        .contact-item {
            padding: 11px 13px;
        }

        .contact-avatar {
            width: 40px;
            height: 40px;
            min-width: 40px;
            font-size: 15px;
            margin-right: 10px;
        }

        .contact-name {
            font-size: 14px;
            max-width: 150px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .contact-specialite {
            font-size: 11px;
            max-width: 180px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }


        /* =====================
        CONVERSATION
        ===================== */

        .conversation-panel {
            height: 560px;
            min-height: 560px;
        }

        .conversation-header {
            min-height: 70px;
            padding: 12px 14px;
            gap: 8px;
        }

        .conversation-avatar {
            width: 42px;
            height: 42px;
            min-width: 42px;
            margin-right: 4px;
            font-size: 15px;
        }

        .conversation-header h5 {
            font-size: 15px;
        }

        .conversation-header small {
            display: block;
            max-width: 180px;
            font-size: 11px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .conversation-header .btn {
            width: 34px;
            height: 34px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }


        /* =====================
        MESSAGES
        ===================== */

        .messages-container {
            padding: 15px 12px;
        }

        .message-row {
            margin-bottom: 12px;
        }

        .message-bubble {
            max-width: 88%;
            padding: 10px 13px;
            font-size: 13px;
            line-height: 1.45;
        }

        .message-time {
            font-size: 10px;
            margin-top: 4px;
        }


        /* =====================
        FORMULAIRE
        ===================== */

        .message-form {
            padding: 10px;
        }

        .message-input-wrapper {
            padding: 4px 5px 4px 12px;
        }

        .message-input {
            font-size: 13px;
            padding: 8px 6px;
            min-width: 0;
        }

        .send-button {
            width: 40px;
            height: 40px;
            min-width: 40px;
        }


        /* =====================
        ÉCRAN VIDE
        ===================== */

        .empty-conversation {
            padding: 20px 15px;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            font-size: 25px;
            margin-bottom: 15px;
        }

        .empty-conversation h5 {
            font-size: 16px;
        }

        .empty-conversation p {
            font-size: 13px;
            margin-bottom: 0;
        }
    }


    /* =========================
    PETITS TELEPHONES
    ========================= */

    @media (max-width: 480px) {

        .messagerie-wrapper {
            padding: 5px 3px;
        }

        .messagerie-card {
            border-radius: 8px;
        }

        .contacts-panel {
            height: 210px;
        }

        .contact-list {
            height: 150px;
        }

        .contact-item {
            padding: 9px 10px;
        }

        .contact-avatar {
            width: 36px;
            height: 36px;
            min-width: 36px;
            font-size: 14px;
            margin-right: 8px;
        }

        .contact-name {
            font-size: 13px;
            max-width: 130px;
        }

        .contact-specialite {
            font-size: 10px;
            max-width: 145px;
        }

        .conversation-panel {
            height: 520px;
            min-height: 520px;
        }

        .conversation-header {
            min-height: 65px;
            padding: 10px;
        }

        .conversation-avatar {
            width: 38px;
            height: 38px;
            min-width: 38px;
        }

        .conversation-header h5 {
            font-size: 14px;
        }

        .conversation-header small {
            max-width: 140px;
        }

        .messages-container {
            padding: 12px 9px;
        }

        .message-bubble {
            max-width: 92%;
            padding: 9px 11px;
            font-size: 12px;
        }

        .message-form {
            padding: 8px;
        }

        .message-input-wrapper {
            padding-left: 10px;
        }

        .message-input {
            font-size: 12px;
        }

        .send-button {
            width: 37px;
            height: 37px;
            min-width: 37px;
        }
    }
</style>


<div class="messagerie-wrapper">

    <div class="messagerie-card">

        <div class="row g-0 h-100">

            {{-- =========================
                 COLONNE GAUCHE
            ========================== --}}

            <div class="col-md-4 contacts-panel">

                <div class="contacts-header">

                    <h5>Mes formateurs</h5>

                    <small>
                        {{ $formateurs->count() }}
                        formateur(s)
                    </small>

                </div>


                <div class="contact-list">

                    <div class="list-group list-group-flush">

                        @forelse($formateurs as $f)

                            <a href="{{ route('messages.apprenant.conversation', $f->id) }}"
                               class="contact-item
                               {{ $formateur && $formateur->id == $f->id ? 'active' : '' }}">

                                <div class="d-flex align-items-center">

                                    <div class="contact-avatar">

                                        {{ strtoupper(substr($f->user->name, 0, 1)) }}

                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="contact-name">
                                                {{ $f->user->name }}
                                            </span>

                                            @if(($f->messages_non_lus ?? 0) > 0)
                                                <span class="badge rounded-pill bg-primary">
                                                    {{ $f->messages_non_lus }}
                                                </span>
                                            @endif
                                        </div>

                                        <span class="contact-specialite">
                                            {{ $f->specialite }}
                                        </span>
                                    </div>

                                </div>

                            </a>

                        @empty

                            <div class="p-4 text-center text-muted">

                                <i class="bi bi-people fs-2 d-block mb-2"></i>

                                Aucun formateur disponible.

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>


            {{-- =========================
                 CONVERSATION
            ========================== --}}

            <div class="col-md-8 conversation-panel">

                @if($formateur)

                    {{-- EN-TÊTE --}}

                    <div class="conversation-header">

                        <div class="conversation-avatar">
                            {{ strtoupper(substr($formateur->user->name, 0, 1)) }}
                        </div>

                        <div class="flex-grow-1">
                            <h5>{{ $formateur->user->name }}</h5>
                            <small>{{ $formateur->specialite }}</small>
                        </div>

                        <a href="{{ route('messages.apprenant') }}"
                        class="btn btn-light btn-sm"
                        title="Fermer la conversation">
                            <i class="bi bi-x-lg"></i>
                        </a>

                    </div>


                    {{-- MESSAGES --}}

                    <div class="messages-container">

                        @forelse($messages as $message)

                            @if($message->expediteur_id == Auth::id())

                                {{-- MESSAGE APPRENANT --}}

                                <div class="message-row sent">

                                    <div class="message-bubble">

                                        {{ $message->message }}

                                        <span class="message-time">

                                            {{ $message->created_at->format('H:i') }}

                                        </span>

                                    </div>

                                </div>

                            @else

                                {{-- MESSAGE FORMATEUR --}}

                                <div class="message-row received">

                                    <div class="message-bubble">

                                        {{ $message->message }}

                                        <span class="message-time">

                                            {{ $message->created_at->format('H:i') }}

                                        </span>

                                    </div>

                                </div>

                            @endif

                        @empty

                            <div class="empty-conversation">

                                <div class="empty-icon">

                                    <i class="bi bi-chat-dots"></i>

                                </div>

                                <h5>Aucun message pour le moment</h5>

                                <p>
                                    Commencez la conversation avec votre formateur.
                                </p>

                            </div>

                        @endforelse

                    </div>


                    {{-- FORMULAIRE --}}

                    <div class="message-form">

                        <form method="POST"
                                action="{{ route('messages.envoyer') }}"
                                id="messageForm">

                            @csrf

                            <input type="hidden"
                                   name="apprenant_id"
                                   value="{{ Auth::id() }}">

                            <input type="hidden"
                                   name="formateur_id"
                                   value="{{ $formateur->id }}">


                            <div class="message-input-wrapper">

                                <input type="text"
                                    name="message"
                                    id="messageInput"
                                    class="message-input"
                                    placeholder="Écrire un message..."
                                    autocomplete="off"
                                    required>

                                <button type="submit"
                                        class="send-button">

                                    <i class="bi bi-send-fill"></i>

                                </button>

                            </div>

                        </form>

                    </div>

                @else

                    <div class="empty-conversation">

                        <div class="empty-icon">

                            <i class="bi bi-chat-square-text"></i>

                        </div>

                        <h5>Sélectionnez un formateur</h5>

                        <p>
                            Choisissez un formateur dans la liste
                            pour commencer une conversation.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</div>


@if($formateur)
<script>
document.addEventListener('DOMContentLoaded', function () {

    const messageForm = document.getElementById('messageForm');
    const messageInput = document.getElementById('messageInput');

    messageForm.addEventListener('submit', function (event) {
        event.preventDefault();

        if (messageForm.dataset.sending === 'true') {
            return;
        }

        messageForm.dataset.sending = 'true';

        const formData = new FormData(messageForm);

        fetch(messageForm.action, {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erreur lors de l’envoi du message.');
            }

            messageInput.value = '';

            setTimeout(() => {
                messageForm.dataset.sending = 'false';
            }, 500);
        })
        .catch(error => {
            console.error(error);
            messageForm.dataset.sending = 'false';
        });
    });

    if (!window.Echo) {
        console.error('Echo n’est pas chargé.');
        return;
    }

    const apprenantId = {{ Auth::id() }};
    const formateurId = {{ $formateur->id }};
    const currentUserId = {{ Auth::id() }};

    const messagesContainer = document.querySelector('.messages-container');

    if (!messagesContainer) {
        return;
    }

    window.Echo.private(`conversation.${apprenantId}.${formateurId}`)
        .listen('.message.envoye', function (e) {

            console.log('Nouveau message reçu :', e);

            // Éviter d'afficher deux fois le même message
            if (messagesContainer.querySelector(`[data-message-id="${e.id}"]`)) {
                return;
            }

            // Supprimer le message "Aucun message"
            const emptyConversation =
                messagesContainer.querySelector('.empty-conversation');

            if (emptyConversation) {
                emptyConversation.remove();
            }

            // Ligne du message
            const row = document.createElement('div');

            row.className = e.expediteur_id == currentUserId
                ? 'message-row sent'
                : 'message-row received';

            row.dataset.messageId = e.id;

            // Bulle
            const bubble = document.createElement('div');
            bubble.className = 'message-bubble';

            // Texte du message
            const text = document.createTextNode(e.message);

            // Heure
            const time = document.createElement('span');
            time.className = 'message-time';

            const date = new Date(
                e.created_at.replace(' ', 'T')
            );

            time.textContent = date.toLocaleTimeString('fr-FR', {
                hour: '2-digit',
                minute: '2-digit'
            });

            // Construction
            bubble.appendChild(text);
            bubble.appendChild(time);

            row.appendChild(bubble);

            messagesContainer.appendChild(row);

            // Descendre automatiquement vers le dernier message
            messagesContainer.scrollTop =
                messagesContainer.scrollHeight;
        });

    // Afficher directement le bas de la conversation
    messagesContainer.scrollTop =
        messagesContainer.scrollHeight;

});
</script>
@endif

@endsection