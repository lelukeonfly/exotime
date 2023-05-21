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
        <input class="w-full text-xl bg-transparent rounded-lg"
        :type="type"
        :placeholder="label"
        :value="modelValue"
        @input="$emit('update:modelValue',
        $event.target.value)" />
        <p v-if="error">{{ error }}</p>
    </div>
</template>
