<script setup>
const props = defineProps({
    postable: Object
})
</script>
<template>
    test 123 SERVICE
    {{ postable }}
    <p>{{ postable.name }}</p>
    <p>{{ postable.duration_min }}</p>
</template>
