<style>
    #assistant-panel {
        position: fixed;
        right: 1.5rem;
        bottom: 5.75rem;
        z-index: 1060;
        width: min(420px, calc(100vw - 2rem));
        height: min(620px, calc(100dvh - 7rem));
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border: 1px solid #e2e8f0;
        border-radius: 1rem;
        background: #fff;
        box-shadow: 0 1rem 3rem rgba(15, 23, 42, .22);
    }

    #assistant-panel[hidden] { display: none; }

    #assistant-panel-backdrop {
        position: fixed;
        inset: 0;
        z-index: 1055;
        background: rgba(15, 23, 42, .28);
        backdrop-filter: blur(2px);
        -webkit-backdrop-filter: blur(2px);
    }

    #assistant-panel-backdrop[hidden] { display: none; }

    .assistant-panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
        color: #fff;
        background: #198754;
    }

    .assistant-panel-messages {
        flex: 1;
        overflow-y: auto;
        padding: 1rem;
        background: #f8fafc;
    }

    .assistant-panel-row { display: flex; margin-bottom: .75rem; }
    .assistant-panel-row.user { justify-content: flex-end; }
    .assistant-panel-row.assistant { justify-content: flex-start; }

    .assistant-panel-bubble {
        max-width: 85%;
        padding: .7rem .85rem;
        border-radius: .9rem;
        white-space: pre-wrap;
        overflow-wrap: anywhere;
    }

    .assistant-panel-row.user .assistant-panel-bubble {
        color: #fff;
        background: #198754;
        border-bottom-right-radius: .25rem;
    }

    .assistant-panel-row.assistant .assistant-panel-bubble {
        color: #334155;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-bottom-left-radius: .25rem;
    }

    .assistant-panel-actions { margin-top: .5rem; text-align: right; }
    .assistant-panel-edit { padding: 0; color: inherit; font-size: .75rem; text-decoration: underline; }

    .assistant-panel-form {
        display: flex;
        gap: .5rem;
        padding: .75rem;
        border-top: 1px solid #e2e8f0;
        background: #fff;
    }

    @media (max-width: 576px) {
        #assistant-panel {
            right: .75rem;
            bottom: 5.25rem;
            width: calc(100vw - 1.5rem);
            height: min(70dvh, 560px);
        }
    }
</style>

<div id="assistant-panel-backdrop" hidden aria-hidden="true"></div>

<section id="assistant-panel"
         hidden
         role="dialog"
         aria-modal="false"
         aria-labelledby="assistant-panel-title"
         data-history-url="{{ route('assistant_messages') }}"
         data-send-url="{{ route('assistant_message') }}"
         data-update-url="{{ route('assistant_message_update', ['message' => '__MESSAGE_ID__']) }}"
         data-csrf-token="{{ csrf_token() }}">
    <header class="assistant-panel-header">
        <div class="fw-bold" id="assistant-panel-title">
            <i class="fas fa-robot me-2" aria-hidden="true"></i>Assistant IA
        </div>
        <button type="button" class="btn btn-sm btn-light" data-assistant-close aria-label="Fermer l'assistant">
            <i class="fas fa-times" aria-hidden="true"></i>
        </button>
    </header>

    <div class="assistant-panel-messages" data-assistant-messages aria-live="polite"></div>

    <form class="assistant-panel-form" data-assistant-form>
        <label class="visually-hidden" for="assistant-panel-input">Votre question</label>
        <input id="assistant-panel-input" class="form-control" maxlength="2000" required
               autocomplete="off" placeholder="Posez votre question…">
        <button class="btn btn-success" type="submit" data-assistant-send aria-label="Envoyer la question">
            <i class="fas fa-paper-plane" aria-hidden="true"></i>
        </button>
    </form>
</section>

<script>
    (() => {
        const panel = document.getElementById('assistant-panel');
        const backdrop = document.getElementById('assistant-panel-backdrop');
        const toggles = document.querySelectorAll('[data-assistant-toggle]');
        const closeButton = panel.querySelector('[data-assistant-close]');
        const messagesContainer = panel.querySelector('[data-assistant-messages]');
        const form = panel.querySelector('[data-assistant-form]');
        const input = document.getElementById('assistant-panel-input');
        const sendButton = panel.querySelector('[data-assistant-send]');
        let messageBeingEdited = null;

        const scrollToBottom = () => {
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        };

        const appendMessage = (role, content, id = null) => {
            const row = document.createElement('div');
            const bubble = document.createElement('div');
            row.className = `assistant-panel-row ${role}`;
            if (id) row.dataset.messageId = id;
            bubble.className = 'assistant-panel-bubble';
            bubble.textContent = content;

            if (role === 'user') {
                const actions = document.createElement('div');
                const editButton = document.createElement('button');
                actions.className = 'assistant-panel-actions';
                editButton.type = 'button';
                editButton.className = 'btn btn-link assistant-panel-edit';
                editButton.dataset.assistantEdit = '';
                editButton.textContent = 'Modifier';
                actions.appendChild(editButton);
                bubble.appendChild(actions);
            }

            row.appendChild(bubble);
            messagesContainer.appendChild(row);
            return row;
        };

        const renderMessages = (messages) => {
            messagesContainer.replaceChildren();

            if (!messages.length) {
                appendMessage('assistant', 'Bonjour ! Je peux vous aider à comprendre votre formation. Posez-moi votre question.');
            } else {
                messages.forEach((message) => appendMessage(message.role, message.content, message.id));
            }

            scrollToBottom();
        };

        const loadMessages = async () => {
            const response = await fetch(panel.dataset.historyUrl, {
                headers: { 'Accept': 'application/json' },
                credentials: 'same-origin',
            });

            if (!response.ok) {
                throw new Error('Impossible de charger la conversation.');
            }

            const data = await response.json();
            renderMessages(data.messages || []);
        };

        const openPanel = async () => {
            backdrop.hidden = false;
            panel.hidden = false;
            input.focus();

            try {
                await loadMessages();
            } catch (error) {
                messagesContainer.replaceChildren();
                appendMessage('assistant', 'La conversation est indisponible pour le moment. Veuillez réessayer.');
            }
        };

        const closePanel = () => {
            panel.hidden = true;
            backdrop.hidden = true;
        };

        toggles.forEach((toggle) => toggle.addEventListener('click', (event) => {
            event.preventDefault();
            if (panel.hidden) {
                openPanel();
            } else {
                closePanel();
            }
        }));

        closeButton.addEventListener('click', closePanel);

        document.addEventListener('click', (event) => {
            const clickedToggle = Array.from(toggles).some((toggle) => toggle.contains(event.target));
            if (!panel.hidden && !panel.contains(event.target) && !clickedToggle) {
                closePanel();
            }
        });

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            const message = input.value.trim();
            if (!message) return;

            const editing = messageBeingEdited;
            const row = editing ? editing.row : appendMessage('user', message);
            const previousContent = editing ? editing.content : null;
            input.value = '';
            input.disabled = true;
            sendButton.disabled = true;
            scrollToBottom();

            try {
                const response = await fetch(editing
                    ? panel.dataset.updateUrl.replace('__MESSAGE_ID__', editing.id)
                    : panel.dataset.sendUrl, {
                    method: editing ? 'PATCH' : 'POST',
                    credentials: 'same-origin',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': panel.dataset.csrfToken,
                    },
                    body: JSON.stringify({ message }),
                });

                if (!response.ok) throw new Error('Erreur lors de l’envoi.');

                const data = await response.json();
                if (editing) {
                    row.querySelector('.assistant-panel-bubble').childNodes[0].textContent = message;
                    while (row.nextElementSibling) row.nextElementSibling.remove();
                    messageBeingEdited = null;
                    sendButton.setAttribute('aria-label', 'Envoyer la question');
                } else {
                    row.dataset.messageId = data.message_id;
                }
                appendMessage('assistant', data.reponse);
            } catch (error) {
                if (editing) {
                    input.value = message;
                    row.querySelector('.assistant-panel-bubble').childNodes[0].textContent = previousContent;
                } else {
                    row.remove();
                    input.value = message;
                }
                appendMessage('assistant', 'Désolé, une erreur est survenue. Veuillez réessayer.');
            } finally {
                input.disabled = false;
                sendButton.disabled = false;
                input.focus();
                scrollToBottom();
            }
        });

        messagesContainer.addEventListener('click', (event) => {
            const editButton = event.target.closest('[data-assistant-edit]');
            if (!editButton || input.disabled) return;

            const row = editButton.closest('.assistant-panel-row.user');
            const bubble = row.querySelector('.assistant-panel-bubble');
            const content = bubble.childNodes[0].textContent;

            messageBeingEdited = { id: row.dataset.messageId, row, content };
            input.value = content;
            input.focus();
            sendButton.setAttribute('aria-label', 'Renvoyer la question modifiée');
        });
    })();
</script>
