<template>
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li v-for="crumb in crumbs" :key="crumb.name"
                    class="breadcrumb-item"
                    v-bind:class="{ active: crumb.active }"
                >
                    <a v-if="!crumb.active" :href="crumb.link"
                    >
                        {{ crumb.name }}
                    </a>
                    <span v-else>{{ crumb.name }}</span>
                </li>
            </ol>
        </nav>
    </div>
</template>

<script>
export default {
    name: "BreadCrumbs",
    props: ['crumbs'],
    data() {
        return {
        }
    },
}
</script>

<style scoped>

</style>
