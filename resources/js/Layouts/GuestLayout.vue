<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import LocaleSwitcher from "@/Components/LocaleSwitcher.vue";
import GuestHeader from "@/Layouts/Partials/GuestHeader.vue";
import Footer from "@/Layouts/Partials/Footer.vue";

import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="min-h-screen flex flex-col w-full bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200">
        <GuestHeader />

        <div class="flex flex-col flex-grow sm:justify-center items-center">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <slot />
            </div>
        </div>

        <Footer/>

    </div>
</template>
