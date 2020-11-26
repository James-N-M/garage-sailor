<template>
    <div class="contacts-list">
        <ul>
            <li v-for="contact in contacts" :key="contact.id">
                <div class="avatar">
                    <img src="https://via.placeholder.com/150C/O https://placeholder.com/" :alt="contact.name">
                </div>
                <div class="contact">
                    <p class="name">{{ contact.name }}</p>
                    <p class="email">{{ contact.email }}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "ContactsList",
    props: {
        contacts: {
            type: Array,
            default: []
        }
    }
}
</script>

<style scoped>

</style>
