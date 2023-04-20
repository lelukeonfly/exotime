<script setup>

    const props = defineProps({
        modelValue: String,
        label: String,
        error: String
    })

    defineEmits(["update:modelValue"]);
</script>
<template>
    <label>{{ label }}</label>
    <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" @change="$emit('update:modelValue', $event.target.value)">
        <option v-bind:selected="modelValue == 'open'" value="open">open</option>
        <option v-bind:selected="modelValue == 'closed'" value="closed">closed</option>
    </select>
</template>
