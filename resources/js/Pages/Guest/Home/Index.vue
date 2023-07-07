<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import LoginForm from '@/Pages/Auth/Partials/LoginForm.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head :title="__('Login')" />

    <GuestLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Login') }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    Locale : {{ $page.props.localization.currentLocale }}
                    <LoginForm/>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
