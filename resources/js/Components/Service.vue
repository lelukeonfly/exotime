<script setup>
const props = defineProps({
    postable: Object
})
</script>
<template>
    {{ postable }}
    <p>{{ postable.name }}</p>
    <p>{{ postable.duration_min }}</p>
</template>
