<script setup lang="ts">
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
</script>

<template>
  <div class="w-full lg:grid min-h-screen lg:grid-cols-2">
    <div class="flex items-center justify-center py-12">
      <slot />
    </div>
    <div class="hidden bg-muted lg:block">
      <img
        src="https://www.shadcn-vue.com/placeholder.svg"
        alt="Image"
        width="1920"
        height="1080"
        class="h-full w-full object-cover dark:brightness-[0.2] dark:grayscale"
      >
    </div>
  </div>
</template>
