<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
  <AppLayout title="Benned">
    <div class="py-12 bg-pink-200">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

          <Head title="Banned" />
          <h1 class="text-4xl font-bold text-center m-4">YOU ARE BENNED</h1>
          <p v-if="permanent" class="m-4">You are permanently banned</p>
          <p v-else class="m-4">You will be banned until: {{ bans[bans.length - 1].banned_until }}</p>
          <p></p>
          <hr />
          <p class="m-4">Do you think this decition was wrong by the Administrators? Submit an unban request</p>
          <h2 class="m-4 text-2xl">Bans</h2>
          <div v-for="ban in bans" class="bg-red-200 m-4 rounded-lg">
            <div>reason: {{ ban.ban_reason }}</div>
            <div>banned until: {{ ban.banned_until }}</div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
  test
</template>
<script>
export default {
  props: {
    //'ban_count': Object,
    //'is_banned': Object,
    'bans': Object,
    'permanent': Object,
  }
}
</script>
