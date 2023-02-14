<script setup>
import AppLayout from '../Layouts/AppLayout.vue';

defineProps([
  'demands'
])

function say(text){
  alert(text)
}

</script>
<template>
  <main class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-6 container max-w-7xl mx-auto">
    <div v-for="demand in demands" class="flex flex-col gap-3 flex-wrap bg-white rounded-lg p-3 cursor-pointer hover:bg-gray-50 shadow shadow-lg transition-all transition" @click="say('parent')">
      <div class="flex items-center gap-1 w-fit hover:bg-gray-200 rounded-full p-1" @click.stop="say('user')"> 
        <img :src="demand.post.user.profile_photo_url" class="rounded-full h-6"/>
        <div class="text-blue-600">@{{ demand.post.user.username }}</div>
      </div>
      <h2 class="text-3xl">{{ demand.post.title }}</h2>
      <p class="text-xl flex-1">{{ demand.post.description }}</p>

      <div class="flex flex-wrap mt-3 gap-1">
        <div v-for="category in demand.post.categories" class="p-2 text-xs bg-gray-200 rounded-full hover:cursor-pointer hover:shadow" @click.stop="say('child')">
          {{ category.name }}
        </div>
      </div>
    </div>
  </main>
</template>
<script>
export default{
  layout: AppLayout
}
</script>
<style scoped>
</style>
