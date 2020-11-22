<template>
    <div class="panel panel-default">
        <div class="panel-heading">Chats</div>

        <div class="panel-body">
            <chat-messages :messages="messages"></chat-messages>
        </div>
        <div class="panel-footer">
            <chat-form
                v-on:messagesent="addMessage"
                :user="this.user"
            ></chat-form>
        </div>
    </div>
</template>

<script>

import ChatForm from "./ChatForm";
import ChatMessages from "./ChatMessages";
export default {
    components: {ChatForm, ChatMessages},
    props: ['user'],

    data() {
        return {
            messages: []
        }
    },

    created() {
        this.fetchMessages();

        Echo.private('chat').listen('MessageSent', (e) => {
            this.messages.push({
                message: e.message.message,
                user: e.user
            });
        });
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post('/messages', message).then(response => {
                console.log(response.data);
            });
        }
    }
}
</script>

<style scoped>

</style>
