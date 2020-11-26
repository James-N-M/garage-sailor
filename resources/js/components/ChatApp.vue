<template>
    <div clas="chat-app">
        <conversation :contact="selectedContact" :messages="messages" />
        <contacts-list :contacts="contacts" />
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
    mounted() {
        axios.get('/api/contacts')
            .then((response) => {
                this.contacts = response.data;
            })
    }
}
</script>

<style scoped>

</style>
