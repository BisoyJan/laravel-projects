<template>
  <Link href="/">Go to Main</Link>&nbsp;
  <Link href="/hello">Go to Hello</Link>

  <div v-if="flashSuccess" class="success">
    {{ flashSuccess }}
  </div>
  <slot>Default</slot>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()

const flashSuccess = computed(() => page.props.flash.success)//page.props.flash.success
</script>

<style scope>
.success {
    background-color: green;
    color: white;
}
</style>
