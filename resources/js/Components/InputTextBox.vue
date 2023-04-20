<script setup>

    const props = defineProps({
        modelValue: String,
        label: String,
        error: String,
        type: String
    })

    defineEmits(["update:modelValue"]);
</script>
<template>
    <div>
        <label>{{ label }}</label>
        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" @input="$emit('update:modelValue', $event.target.value)">{{ modelValue }}</textarea>
        <p v-if="error">{{ error }}</p>
    </div>
</template>
