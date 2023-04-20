<script setup>

    const props = defineProps({
        modelValue: [String,Number],
        label: String,
        error: String,
        type: String
    })

    defineEmits(["update:modelValue"]);
</script>
<template>
    <div>
        <label>{{ label }}</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
        :type="type"
        :placeholder="label"
        :value="modelValue"
        @input="$emit('update:modelValue',
        $event.target.value)" />
        <p v-if="error">{{ error }}</p>
    </div>
</template>
