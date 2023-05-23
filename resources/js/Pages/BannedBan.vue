<script setup>
    import { computed } from 'vue';
    const props = defineProps({

        ban: Object
    })


    const banType = computed(() => {
      const parts = props.ban.bannable_type.split('\\');
      const lastPart = parts[parts.length - 1];
      if (lastPart === 'UnBan') {
        return 'unban';
    }
      return lastPart.substring(0, lastPart.length - 3).toLowerCase();
    });

</script>
<template>
    <div  class="my-3 p-3 rounded-lg" :class="{ 'bg-green-200': banType == 'unban', 'bg-red-200': banType == 'permanent', 'bg-orange-200': banType == 'temporary' }">
        <div class="text-2xl"><span class="font-bold">Type: </span> {{ banType }}</div>
        <div class="text-xl"><span class="font-bold">Reason: </span> {{ ban.reason }}</div>
        <div v-if="ban.bannable.until" class="text-xl"><span class="font-bold">Until: </span> {{ new Date(ban.bannable.until).toLocaleString() }}</div>
        <div class="text-lg mt-3"><span class="font-bold">when:</span> {{ new Date(ban.created_at).toLocaleString() }}</div>
    </div>
</template>
