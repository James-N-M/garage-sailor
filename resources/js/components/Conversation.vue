<template>
    <div class="conversation">
        <h1>{{ contact ? contact.name : 'Select a Contact' }}</h1>
        <messages-feed :contact="contact" :messages="messages" />
        <message-composer @send="sendMessage" />
    </div>
</template>

<script>
import MessagesFeed from "./MessagesFeed";
import MessageComposer from "./MessageComposer";
export default {
    name: "Conversation",
    components: {MessageComposer, MessagesFeed},
    props: {
        contact: {
            type: Object,
            default: null
        },
        messages: {
            type: Array,
            default: []
        }
    },
    methods: {
        sendMessage(text) {
            console.log(text);
        }
    }
}
</script>

<style lang="scss" scoped>
.conversation {
    flex: 5;
}
</style>
