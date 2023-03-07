<script setup>
import axios from 'axios';
const props = defineProps([
  'post'
])

defineEmits([
    'deletePost'
])

function test(t){
    ////alert(t)
    if (t=='card') {
        //delete:
        axios.delete(route('services.destroy', props.post))
        .then(res => {
            console.log(res)
        })
    }
}

</script>
<template >
  <div class="flex flex-col gap-3 flex-wrap bg-white rounded-lg p-3 cursor-pointer shadow" @click="test('card')">
    <div class="flex flex-wrap justify-between">
        <div class="flex items-center gap-1 w-fit hover:bg-gray-200 rounded-full p-1 transition-all" @click.stop="test('user')">
            <img :src="post.post.user.profile_photo_url" class="rounded-full h-6"/>
            <div class="text-blue-600">@{{ post.post.user.username }}</div>
        </div>
        <div>
            {{ new Date(post.post.created_at).toLocaleDateString() }}
        </div>
    </div>
    <h2 class="text-3xl">{{ post.post.title }}</h2>
    <p class="text-xl flex-1">{{ post.post.description }}</p>

    <div class="flex flex-wrap mt-3 gap-1">
        <div v-for="category in post.post.categories" class="p-2 text-xs bg-gray-200 rounded-full hover:cursor-pointer hover:bg-gray-300 transition-all" @click.stop="test('cat')">
            {{ category.name }}
        </div>
    </div>
  </div>
</template>
