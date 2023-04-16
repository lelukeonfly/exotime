<script setup>
const props = defineProps({
    categories: Object
})
</script>
<template>
    <ul>
        <li v-for="category in categories">
            {{ category.name }}
        </li>
    </ul>
</template>
