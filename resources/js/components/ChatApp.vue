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
      },
        selectedUser: {
            type: Object,
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
            this.updateUnreadCount(contact, true);
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

            this.updateUnreadCount(message.from_contact, false);
        },
        updateUnreadCount(contact, reset) {
            this.contacts = this.contacts.map((single) => {
                if (single.id !== contact.id) {
                    return single;
                }
                if (reset)
                    single.unread = 0;
                else
                    single.unread += 1;
                return single;
            })
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

        if (this.selectedUser) {
            this.selectedContact = this.selectedUser;
            this.startConversationWith(this.selectedContact);
        }
    }
}
</script>

<style lang="scss" scoped>
.chat-app {
    display: flex;
}
</style>
