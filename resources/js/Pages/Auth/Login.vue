<script setup>
import PublicLayout from "@/Layouts/PublicLayout.vue";
import LoginForm from "@/Pages/Auth/Partials/LoginForm.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
});
</script>

<template>
    <PublicLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <LoginForm :can-reset-password="canResetPassword" />
    </PublicLayout>
</template>
