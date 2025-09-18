<template>
  <div class="min-h-100 flex items-center justify-center bg-gray-50 dark:bg-gray-900 px-4">
    <div class="max-w-md w-full bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8">
      <div class="text-center">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
          Verify Your Email
        </h1>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
          Before proceeding, please check your email for a verification link.
          If you did not receive the email, click below to request another.
        </p>
      </div>

      <div class="mt-6">
        <Link
          :href="route('verification.send')"
          method="post"
          as="button"
          class="w-full inline-flex justify-center py-2 px-4 border border-transparent
                   rounded-md shadow-sm text-sm font-medium text-white
                   bg-indigo-600 hover:bg-indigo-700 focus:outline-none
                   focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Resend Verification Email
        </Link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'


</script>
