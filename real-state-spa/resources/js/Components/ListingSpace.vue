<template>
  <div>
    <span class="font-bold">{{ listing.beds }}</span> beds <span class="text-grey-400">| </span>
    <span class="font-bold">{{ listing.baths }}</span> baths <span class="text-grey-400">| </span>
    <span class="font-bold">{{ listing.area }}</span> sqft
  </div>
</template>

<script setup>
defineProps({
    listing: Object,
})
</script>
