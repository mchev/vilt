<script setup>
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import LocaleSwitcher from "@/Components/LocaleSwitcher.vue";
</script>

<template>
  <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="https://flowbite.com/" class="flex items-center">
        <ApplicationLogo class="w-20" />
      </a>
      <div class="flex items-center md:order-2">
        <LocaleSwitcher/>
      </div>
    </div>
  </nav>
</template>
