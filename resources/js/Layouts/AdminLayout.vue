<script setup>
import PrivateHeader from "@/Layouts/Partials/PrivateHeader.vue";
import Footer from "@/Layouts/Partials/Footer.vue";
</script>

<template>
    <div>
        <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200">
            <PrivateHeader />

            <!-- Page Heading -->
            <header class="bg-white dark:bg-gray-800 shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-grow">
                <slot />
            </main>

            <Footer />
        </div>
    </div>
</template>
