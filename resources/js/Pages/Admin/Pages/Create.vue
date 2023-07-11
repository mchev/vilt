<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import CreatePageForm from '@/Pages/Admin/Pages/Partials/CreatePageForm.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head :title="__('Create')" />

    <AdminLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Create') }}</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <CreatePageForm />
            </div>
        </div>
    </AdminLayout>
</template>
