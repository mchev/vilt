<script setup>
import { Link } from "@inertiajs/vue3";
defineProps(["links"]);
</script>

<template>
	<div v-if="links.length > 3">
		<div class="flex flex-wrap -mb-1">
			<template v-for="(link, key) in links">
				<div v-if="link.url === null" :key="key" class="mb-1 mr-1 px-3 py-2 text-gray-400 text-sm leading-4 border dark:border-gray-700 rounded" v-html="link.label" />
				<Link
					v-else
					:key="`link-${key}`"
					class="mb-1 mr-1 px-3 py-2 focus:text-gray-500 text-sm leading-4 hover:bg-white dark:hover:bg-gray-700 border dark:border-gray-700 focus:border-gray-500 rounded"
					:class="{ 'bg-white dark:bg-gray-800': link.active }"
					:href="link.url"
					v-html="link.label"
				/>
			</template>
		</div>
	</div>
</template>
