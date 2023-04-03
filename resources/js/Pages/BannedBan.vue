<script setup>
const props = defineProps([
'ban'
])
</script>
<template>
    <div>{{ ban }}</div>
<div  class="my-3 p-3 rounded-lg" :class="{ 'bg-green-200': ban.ban_type == 'Unban', 'bg-red-200': ban.ban_type == 'Permanent', 'bg-orange-200': ban.ban_type == 'Temporary' }">
            <div class="text-2xl"><span class="font-bold">Type: </span> {{ ban.ban_type }}</div>
            <div class="text-xl"><span class="font-bold">Reason: </span> {{ ban.reason }}</div>
            <div v-if="ban.bannable.until" class="text-xl"><span class="font-bold">Until: </span> {{ new Date(ban.bannable.until).toLocaleString() }}</div>
            <div class="text-lg mt-3"><span class="font-bold">when:</span> {{ new Date(ban.created_at).toLocaleString() }}</div>
</div>
</template>
