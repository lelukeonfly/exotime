<template>
  <label class="text-xs bg-gray-200 rounded-full hover cursor-pointer">
    <input :checked="isChecked" @input="toggleChecked" type="checkbox" class="hidden peer" />
    <div class="p-2 rounded-full peer-checked:bg-lime-300">{{ option.name }}</div>
  </label>
</template>

<script setup>
import { defineEmits } from 'vue';

const props = defineProps({
  option: Object,
  modelValue: Array
});

const emits = defineEmits(['update:modelValue']);

const isChecked = props.modelValue.includes(props.option.id);

const toggleChecked = () => {

  const selectedSupplies = [...props.modelValue];

  if (selectedSupplies.includes(props.option.id)) {

    const index = selectedSupplies.indexOf(props.option.id);

    selectedSupplies.splice(index, 1);

  } else {

    selectedSupplies.push(props.option.id);

  }

  emits('update:modelValue', selectedSupplies);
};
</script>
