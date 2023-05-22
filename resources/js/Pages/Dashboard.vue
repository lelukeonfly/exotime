<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';

const props = defineProps({
    userFeedbacksMade: Number,
    userFeedbacksGot: Number,
    postFeedbacks: Number
})
</script>

<template>
  <AppLayout title="Dashboard">

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <Welcome :userFeedbacksMade="userFeedbacksMade" :userFeedbacksGot="userFeedbacksGot" :postFeedbacks="postFeedbacks"/>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
