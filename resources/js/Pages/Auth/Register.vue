<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    username: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const register = () => {
    form.post(route('fastregister'), {
        onFinish: () => window.location.href = route('dashboard'),
    });
};
</script>

<template>
    <Head title="Register" />

        <div class="grid h-screen place-items-center">
        <form @submit.prevent="register">
            <button class="bg-blue-400 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded-lg w-full" type="submit">fast register</button>
        </form>
    </div>
</template>
