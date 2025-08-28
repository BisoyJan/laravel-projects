<template>
  <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 w-full">
    <div class="container mx-auto">
      <nav class="p-4 flex items-center justify-between">
        <div class="text-lg font-medium">
          <Link :href="route('listing.index')">Listings</Link>
        </div>

        <div class="text-xl text-indigo-600 dark:text-indigo-400 font-bold text-center">
          <Link :href="route('listing.index')">LaraZillow</Link>
        </div>

        <div v-if="user" class="flex items-center gap-4">
          <Link :href="route('listing.create')" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium p-2 rounded-md">➕ New Listing</Link>

          <Link class="text-sm text-gray-300" :href="route('realtor.listing.index')">{{ user.name }}</Link>

          <div>
            <Link :href="route('logout')" method="delete" as="button">Logout</Link>
          </div>
        </div>

        <div v-else class="flex items-center gap-4">
          <Link :href="route('user-account.create')">Register</Link>
          <Link :href="route('login')">Sign-in</Link>
        </div>
      </nav>
    </div>
  </header>

  <main class="container mx-auto p-4 w-full">
    <div v-if="flashSuccess" class="bg-green-100 border border-green-400 text-black dark:text-gray-700 px-4 py-2 rounded relative">
      {{ flashSuccess }}
    </div>
    <slot>Default</slot>
  </main>
</template>

<script setup>
import { computed } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const page = usePage()

const flashSuccess = computed(() => page.props.flash.success)//page.props.flash.success

const user = computed(
    () => page.props.user,
)
</script>
