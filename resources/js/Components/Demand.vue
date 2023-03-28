<script setup>
const props = defineProps({
    postable: Object
})
</script>
<template>
    test 123 DEMAND
    {{ postable }}
    <p>{{ postable.location }}</p>
    <p>{{ postable.duration_min }}</p>
    <p>{{ postable.starting_at }}</p>
    <p>{{ postable.ending_at }}</p>
</template>
