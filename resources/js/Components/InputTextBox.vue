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
        <textarea class="block w-full rounded-lg bg-transparent text-xl resize-none mt-3" @input="$emit('update:modelValue', $event.target.value)" :placeholder="label">{{ modelValue }}</textarea>
        <p v-if="error">{{ error }}</p>
    </div>
</template>
