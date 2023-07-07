<script setup>
import { router } from "@inertiajs/vue3";
import Dropdown from "@/Components/Dropdown.vue";

const setLocale = (locale) => {
	router.visit(route("locale", { locale }, { only: ["localization"] }));
};
</script>
<template>
	<div class="flex items-center justify-end space-x-8">
		<Dropdown>
			<template #trigger>
				{{ $page.props.localization.currentLocale }}
			</template>
			<template #content>
				<div v-for="locale in $page.props.localization.locales" :key="locale" class="flex flex-col gap-2">
					<button
						@click="setLocale(locale)"
						:class="{
							'text-blue-600 dark:text-blue-400 font-semibold': locale === $page.props.localization.currentLocale,
							'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300': locale !== $page.props.localization.currentLocale,
						}"
					>
						{{ locale }}
					</button>
				</div>
			</template>
		</Dropdown>
	</div>
</template>
