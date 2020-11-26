<template>
    <div class="chat-app">
        <conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
        <contacts-list :contacts="contacts" @selected="startConversationWith"/>
    </div>
</template>

<script>
import ContactsList from "./ContactsList";
import Conversation from "./Conversation";

export default {
    name: "ChatApp",
    components: {ContactsList, Conversation},

    props: {
      user: {
          type: Object,
          required: true
      }
    },
    data() {
        return {
            selectedContact: null,
            messages: [],
            contacts: []
        };
    },
    methods: {
        startConversationWith(contact) {
            axios.get(`/conversations/${contact.id}`)
                .then((response) => {
                    this.messages = response.data;
                    this.selectedContact = contact;
                })
        },
        saveNewMessage(message) {
            this.messages.push(message);
        },
        handleIncoming(message) {
            if (this.selectedContact && message.from_id === this.selectedContact.id) {
                this.saveNewMessage(message);
                return;
            }

            alert(message.text)
        }
    },
    mounted() {
        Echo.private(`messages.${this.user.id}`)
        .listen('NewMessage', (e) => {
            this.handleIncoming(e.message);
        })

        axios.get('/contacts')
            .then((response) => {
                this.contacts = response.data;
            })
    }
}
</script>

<style lang="scss" scoped>
.chat-app {
    display: flex;
}
</style>
