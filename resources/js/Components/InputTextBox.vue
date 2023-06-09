<script setup>

    const props = defineProps({
        modelValue: String,
        label: String,
        error: String
    })

    defineEmits(["update:modelValue"]);
</script>
<template>
        <textarea class="block w-full rounded-lg bg-transparent text-xl resize-none m-0 mt-3" @input="$emit('update:modelValue', $event.target.value)" :placeholder="label" :value="modelValue"/>
        <p v-if="error">{{ error }}</p>
</template>
