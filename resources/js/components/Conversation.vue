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
            if (!this.contact) {
                return;
            }

            axios.post('/conversations/send', {
                contact_id : this.contact.id,
                text: text
            }).then((response) => {
                this.$emit('new', response.data);
            })

        }
    }
}
</script>

<style lang="scss" scoped>
.conversation {
    flex: 5;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    h1 {
        font-size: 20px;
        padding: 10px;
        margin: 0;
        border-bottom: 1px dashed lightgray;
    }
}
</style>
