<script setup>
    import { useForm } from '@inertiajs/vue3'
    import InputTextBox from '@/Components/InputTextBox.vue'

    const props = defineProps({
        parent_model: String,
        parent_id: Number,
    })

    const form = useForm({
        rating: null,
        feedback: '',
        feedbackable_type: 'App\\Models\\' + props.parent_model,
        feedbackable_id: props.parent_id,
    })

    const createFeedback = () => {
        form.post(route('feedbacks.store'), {preserveScroll:true})
        form.feedback = ''
        form.rating = null
    }
</script>
<template>
    <form @submit.prevent="createFeedback">
    <label for="rating">Rating:</label>
    <div class="star-rating">
        <span class="star cursor-pointer" v-for="i in 5" :key="i" :class="{ 'filled': i <= form.rating }" @click="form.rating = i">&#9733;</span>
    </div>
    <InputTextBox v-model="form.feedback" label="Feedback" :error="form.errors.feedback" />
    <button class="block bg-transparent font-semibold hover:text-white py-2 px-4 border hover:border-transparent rounded hover:bg-[#4d6ed3] border-[#4d6ed3] w-full sm:w-auto mt-3" type="submit">sumbit</button>
    </form>
</template>
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
