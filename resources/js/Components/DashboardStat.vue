<template>
    <div class="shadow rounded-lg p-4 w-full">
        <div class="flex flex-col justify-between h-full gap-3">
            <div class="text-lg leading-6 font-bold text-gray-600">
                <slot name="title" />
            </div>
            <div class="w-full text-center text-3xl">
                <slot />
            </div>
        </div>
    </div>
</template>
