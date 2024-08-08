<script setup>

</script>

<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li v-for="(crumb, index) in crumbs" :key="index" class="breadcrumb-item" :class="{ 'active': index === crumbs.length - 1 }">
                <a v-if="index !== crumbs.length - 1" :href="crumb.href">{{ crumb.text }}</a>
                <span v-else>{{ crumb.text }}</span>
            </li>
        </ol>
    </nav>
</template>

<style scoped>

</style>
