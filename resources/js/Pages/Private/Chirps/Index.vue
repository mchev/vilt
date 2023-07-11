<script setup>
import PrivateLayout from "@/Layouts/PrivateLayout.vue";
import Chirp from "./Partials/Chirp.vue";
import Pagination from "@/Components/Pagination.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { useForm, Head } from "@inertiajs/vue3";

defineProps(["chirps"]);

const form = useForm({
    message: "",
});
</script>

<template>
    <Head title="Chirps" />

    <PrivateLayout>
        <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <form @submit.prevent="form.post(route('chirps.store'), { onSuccess: () => form.reset() })">
                <textarea
                    v-model="form.message"
                    placeholder="What's on your mind?"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                ></textarea>
                <InputError :message="form.errors.message" class="mt-2" />
                <PrimaryButton class="mt-4">Chirp</PrimaryButton>
            </form>
            <div class="mt-6 bg-white dark:bg-gray-700 shadow-sm rounded-lg divide-y">
                <Chirp v-for="chirp in chirps.data" :key="chirp.id" :chirp="chirp" />
            </div>
            <Pagination :links="chirps.links" class="mt-6" />
        </div>
    </PrivateLayout>
</template>
