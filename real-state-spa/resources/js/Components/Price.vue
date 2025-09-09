<template>
  <span> {{ formattedPrice }} </span>
</template>

<script setup>
import { computed } from 'vue'
const props = defineProps({
    price: [Number, String],
})

//This format the price based on the locale of the user and the currency
const formattedPrice = computed(
    () => Number(props.price).toLocaleString('en-US',
        {
            style: 'currency',
            currency: 'USD',
            minimumFractionDigits: 2,
        }),
)
</script>
