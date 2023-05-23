<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Post from '@/Components/Post.vue'
    import CreateFeedback from '@/Components/CreateFeedback.vue'
    import UserLink from '@/Components/UserLink.vue'

    const props = defineProps({
        user: Object
    })

</script>
<template>
    <main class="p-6 container max-w-7xl mx-auto">
        <div class="bg-white rounded-lg p-6 shadow">
            <img :src="user.profile_photo_url" alt="profile photo" class="mx-auto rounded-full" />
            <h1 class="mx-auto text-center text-4xl my-3">{{ user.username }}</h1>
            <!-- desc -->
            <div v-if="user.description">
                <div class="bg-gray-100 rounded-lg p-1">
                </div>
                <p class="text-xl my-3">{{ user.description }}</p>
                <div class="bg-gray-100 rounded-lg p-1">
                </div>
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 pt-6">
            <div v-for="post in user.posts" :key="post.id">
                <Post :post="post" :key="post.id" />
            </div>
        </div>

        <div class="mt-5 p-5 bg-white rounded-lg grid gap-5">

            <CreateFeedback parent_model="User" :parent_id="user.id" class="rounded-lg bg-gray-100 p-3"/>

            <div v-for="feedback in user.feedbacks" :key="feedback.id" class="rounded-lg bg-gray-100 p-3">
                <div class="flex justify-between">
                    <div><UserLink :user="feedback.user"/></div>
                    <div>{{ new Date(feedback.created_at).toLocaleDateString() }}</div>

                </div>
                <!--rating-->
                <div class="star-rating">
                    <span class="star" v-for="i in 5" :key="i" :class="{ 'filled': i <= feedback.rating }">&#9733;</span>
                </div>
                <div>
                    {{ feedback.feedback }}
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
.star-rating {
    display: flex;
}

.star {
    font-size: 2rem;
    color: #aaa;
    transition: color 0.2s ease-out;
    margin-right: 5px;
}

.star.filled {
    color: gold;
}
</style>
