<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

const props = defineProps({
    userFeedbacksMade: Number,
    userFeedbacksGot: Number,
    postFeedbacks: Number
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
Welcome to ExoTime, where time is the currency. Create service posts or requests, earn time credits upon completion, and exchange them for services. Join our community to redefine value and unleash your potential. Experience a unique platform where talents shine and collaboration thrives. Start your journey today and embrace the power of time at ExoTime. Welcome aboard!
      </div>
    </div>

  </div>
<!-- component -->
<div class="max-w-full mx-4 py-6 sm:mx-auto sm:px-6 lg:px-8">
    <div class="sm:flex sm:space-x-4">
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
            <div class="bg-white p-5">
                <div class="sm:flex sm:items-start">
                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                        <h3 class="text-sm leading-6 font-medium text-gray-400"><b>Feedbacks by other users on your profile</b></h3>
                        <p class="text-3xl font-bold text-black">{{ userFeedbacksMade }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
            <div class="bg-white p-5">
                <div class="sm:flex sm:items-start">
                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                        <h3 class="text-sm leading-6 font-medium text-gray-400"><b>Your feedback on other users profiles</b></h3>
                        <p class="text-3xl font-bold text-black">{{ userFeedbacksMade }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow transform transition-all mb-4 w-full sm:w-1/3 sm:my-8">
            <div class="bg-white p-5">
                <div class="sm:flex sm:items-start">
                    <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
                        <h3 class="text-sm leading-6 font-medium text-gray-400"><b>Feedbacks of other users on your posts</b></h3>
                        <p class="text-3xl font-bold text-black">{{ postFeedbacks }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
