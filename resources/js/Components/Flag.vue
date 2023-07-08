<script setup>
defineProps({
  iso: {
    type: String,
    required: true,
  },
});
</script>
<template>
  <!-- SVG Icons from https://flagicons.lipis.dev/ -->

  <!-- English (US) -->
  <svg v-if="iso === 'en'" :class="$attrs.class" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
    <path fill="#bd3d44" d="M0 0h512v512H0" />
    <path stroke="#fff" stroke-width="40" d="M0 58h512M0 137h512M0 216h512M0 295h512M0 374h512M0 453h512" />
    <path fill="#192f5d" d="M0 0h390v275H0z" />
    <marker id="a" markerHeight="30" markerWidth="30">
      <path fill="#fff" d="m15 0 9.3 28.6L0 11h30L5.7 28.6" />
    </marker>
    <path
      fill="none"
      marker-mid="url(#a)"
      d="m0 0 18 11h65 65 65 65 66L51 39h65 65 65 65L18 66h65 65 65 65 66L51 94h65 65 65 65L18 121h65 65 65 65 66L51 149h65 65 65 65L18 177h65 65 65 65 66L51 205h65 65 65 65L18 232h65 65 65 65 66L0 0"
    />
  </svg>

  <!-- Deutsh -->
  <svg v-else-if="iso === 'de'" :class="$attrs.class" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
    <path fill="#ffce00" d="M0 341.3h512V512H0z" />
    <path d="M0 0h512v170.7H0z" />
    <path fill="#d00" d="M0 170.7h512v170.6H0z" />
  </svg>

  <!-- Français -->
  <svg v-else-if="iso === 'fr'" :class="$attrs.class" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
    <path fill="#fff" d="M0 0h512v512H0z" />
    <path fill="#002654" d="M0 0h170.7v512H0z" />
    <path fill="#ce1126" d="M341.3 0H512v512H341.3z" />
  </svg>
</template>
