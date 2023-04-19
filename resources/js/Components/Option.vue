<script setup>
    const props = defineProps({
        option: Object
    })
</script>
<template>
    <label class="text-xs bg-gray-200 rounded-full hover cursor-pointer">
        <input :value="option.id" @click="$emit('update:option', $event.target.value)"
        type="checkbox" class="hidden peer" />
        <div class="p-2 rounded-full peer-checked:bg-lime-300">{{ option.name }}</div>
    </label>
</template>
