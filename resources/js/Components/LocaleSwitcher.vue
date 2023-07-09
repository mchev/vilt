<script setup>
import { computed } from "vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import Flag from "@/Components/Flag.vue";
import Dropdown from "@/Components/Dropdown.vue";

const setLocale = (locale) => {
	router.visit(route("locale", { locale }, { only: ["localization"] }));
};

const localization = usePage().props.localization;

const currentLocale = computed(() => {
	return localization.locales.find((x) => x.iso === localization.currentLocale);
});
</script>
<template>
	<div v-if="currentLocale" class="flex items-center justify-end space-x-8">
		<Dropdown>
			<template #trigger>
				<div
					class="inline-flex items-center gap-2 font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white"
				>
					<Flag :iso="currentLocale.iso" class="w-5 h-5 rounded-full"/>
					{{ currentLocale.label }}
				</div>
			</template>
			<template #content>
				<ul class="font-medium" role="none">
					<li v-for="locale in $page.props.localization.locales.filter((x) => x.iso !== currentLocale.iso)" :key="locale">
						<button
							type="button"
							@click="setLocale(locale.iso)"
							class="inline-flex items-center w-full gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
							role="menuitem"
						>
							<Flag :iso="locale.iso" class="w-5 h-5 rounded-full"/>
							{{ locale.label }}
						</button>
					</li>
				</ul>
			</template>
		</Dropdown>
	</div>
</template>
