<template>
    <div class="chat-app">
        <conversation :contact="selectedContact" :messages="messages" />
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
            axios.get(`/conversation/${contact.id}`)
                .then((response) => {
                    this.messages = response.data;
                    this.selectedContact = contact;
                })
        }
    },
    mounted() {
        axios.get('/api/contacts')
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
