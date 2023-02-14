<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
</script>
<template>
  <AppLayout>
  <main class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-6 container max-w-7xl mx-auto">
    <slot />
  </main>
  </AppLayout>
</template>
<script>
</script>
