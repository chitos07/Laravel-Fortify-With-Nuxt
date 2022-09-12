<template>

    <div class="flex flex-col justify-between min-h-screen">
        <div class="flex-1 flex flex-col justify-center items-start  ml-10">
            <h1 class="text-white text-3xl">
                Welcome to Coder's Conduct
            </h1>
            <div class="flex space-x-12">
                <NuxtLink to="/auth/register" class="text-white text-2xl hover:text-blue-500">
                    REGISTER
                </NuxtLink>
                <NuxtLink to="/auth/login" class="text-white text-2xl hover:text-blue-500">
                    LOGIN
                </NuxtLink>
            </div>
        </div>
    </div>
</template>
