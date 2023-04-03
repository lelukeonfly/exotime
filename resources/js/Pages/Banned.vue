<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import BannedBan from './BannedBan.vue';

const props = defineProps([
  'previous',
  'current'
])

</script>

<template>
  <AppLayout title="Banned">
  <div>{{ previous }}</div>
  <div>{{ current }}</div>
    <div class="py-6">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-10 bg-white overflow-hidden shadow-xl sm:rounded-lg">

          <Head title="Banned" />
          <h1 v-if="current.ban_type == 'Permanent'" class="mb-10 text-4xl font-bold text-center">YOU ARE PERMANENTLY BANNED</h1>
          <h1 v-else class="mb-10 text-4xl font-bold text-center">YOU ARE BANNED</h1>

          <h2 class="my-3 text-3xl font-bold">Current Ban</h2>
          <BannedBan :key="current.id" :ban="current" />

          <p class="my-6 text-xl">Do you think this decision was wrong by the Administrators? Submit an unban request</p>

          <h2 class="my-3 text-3xl font-bold">Previous Bans</h2>
          <BannedBan v-for="ban in previous" :key="ban.id" :ban="ban" />
        </div>
      </div>
    </div>
  </AppLayout>
</template>
<style scoped>

</style>
