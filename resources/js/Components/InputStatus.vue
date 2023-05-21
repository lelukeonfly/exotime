<script setup>

    const props = defineProps({
        modelValue: String,
        label: String,
        error: String
    })

    defineEmits(["update:modelValue"]);
</script>
<template>
    <select class="w-full text-xl bg-transparent rounded-lg" @change="$emit('update:modelValue', $event.target.value)">
        <option v-bind:selected="modelValue == 'open'" value="open">open</option>
        <option v-bind:selected="modelValue == 'closed'" value="closed">closed</option>
    </select>
</template>
