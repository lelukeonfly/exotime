<script setup>
    import ApplicationLogo from '@/Components/ApplicationLogo.vue';
    import DashboardStat from '@/Components/DashboardStat.vue';

const props = defineProps({
    userFeedbacksMade: Number,
    userFeedbacksGot: Number,
    postFeedbacks: Number,
    postCount: Number
})
</script>

<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <ApplicationLogo class="block h-36 mx-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Welcome to your ExoTime application!
            </div>

            <div class="mt-6 text-gray-500">
                Where time is the currency. Create service posts or requests, earn time credits upon completion, and exchange them for services. Join our community to redefine value and unleash your potential. Experience a unique platform where talents shine and collaboration thrives. Start your journey today and embrace the power of time at ExoTime. Welcome aboard!
            </div>
        </div>

    </div>
    <!-- component -->
    <div class="max-w-full mx-4 py-6 sm:mx-auto sm:px-6 lg:px-8">
        <div class="sm:flex sm:space-x-4">
            <DashboardStat>
                <template #title>
                    Feedbacks on other users profile by you
                </template>
                <template #default>
                    {{ userFeedbacksMade }}
                </template>
            </DashboardStat>
            <DashboardStat>
                <template #title>
                    Feedbacks by other users on your profile
                </template>
                <template #default>
                    {{ userFeedbacksGot }}
                </template>
            </DashboardStat>
            <DashboardStat>
                <template #title>
                    Feedbacks on your posts
                </template>
                <template #default>
                    {{ postFeedbacks }}
                </template>
            </DashboardStat>
            <DashboardStat>
                <template #title>
                    Posts made by you
                </template>
                <template #default>
                    {{ postCount }}
                </template>
            </DashboardStat>
        </div>
    </div>
</template>
