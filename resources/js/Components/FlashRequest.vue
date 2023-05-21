<template>
    <div v-if="$page.props.flash.message || $page.props.errors.request" class="fixed bottom-0 right-0 m-6">
        <div :class="{ 'bg-green-200': $page.props.flash.message, 'bg-red-200': $page.props.errors.request }" class="text-gray-900 rounded-lg shadow-md p-6 pr-10" style="min-width: 240px">
            <div class="flex items-center">
                {{ $page.props.flash.message || $page.props.errors.request }}
            </div>
        </div>
    </div>
</template>
