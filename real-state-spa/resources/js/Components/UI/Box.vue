<template>
  <div class="border border-gray-200 dark:border-gray-800 rounded-md p-4 shadow-sm dark:text-gray-300">
    <div class="text-grey-500 font-medium">
      <slot name="header" />
    </div>
    <slot />
  </div>
</template>
