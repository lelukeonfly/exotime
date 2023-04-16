<script setup>
    import { useForm } from '@inertiajs/vue3'

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
        form.post(route('feedbacks.store'))
    }
</script>
<template>
    <form @submit.prevent="createFeedback">
        <input v-model="form.rating" type="number">
        <input v-model="form.feedback" type="text">
        <button type="submit">sumbit</button>
    </form>
</template>
