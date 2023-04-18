<script setup>
    const props = defineProps({
        option: Object,
        modelValue: String,
    })
    defineEmits(['update:modelValue'])
</script>
<template>
    <label class="text-xs bg-gray-200 rounded-full hover cursor-pointer">
        <input :value="modelValue" @input="$emit('update:modelValue', $event.target.value)"
        type="checkbox" class="hidden peer" />
        <div class="p-2 rounded-full peer-checked:bg-lime-300">{{ option.name }}</div>
    </label>
</template>
