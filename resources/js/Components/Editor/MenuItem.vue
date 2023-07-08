<script setup>
const icons = import.meta.env.BASE_URL + "fonts/icons.svg";

defineProps({
  icon: {
    type: String,
    required: true,
  },

  title: {
    type: String,
    required: true,
  },

  action: {
    type: Function,
    required: true,
  },

  isActive: {
    type: Function,
    default: null,
  },
});
</script>
<template>
  <button class="menu-item" :class="{ 'is-active': isActive ? isActive() : null }" @click="action" :title="title">
    <svg class="remix">
      <use :xlink:href="`${icons}#ri-${icon}`" />
    </svg>
  </button>
</template>

<style scoped>
.menu-item {
  background: transparent;
  border: none;
  border-radius: 0.4rem;
  color: #fff;
  cursor: pointer;
  height: 1.75rem;
  padding: 0.25rem;
  margin-right: 0.25rem;
  width: 1.75rem;
}

.menu-item svg {
  fill: currentColor;
  height: 100%;
  width: 100%;
}

.menu-item.is-active,
.menu-item:hover {
  background-color: #303030;
}
</style>
