<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import {
  Breadcrumb,
  BreadcrumbItem,
  BreadcrumbList,
} from "@/Components/ui/breadcrumb";
import { cn } from "@/lib/utils";
</script>

<template>
  <Head title="Dashboard"/>

  <AuthenticatedLayout>
    <template #breadcrumb>
      <Breadcrumb>
        <BreadcrumbList>
          <BreadcrumbItem class="hidden md:block">
            <Link :href="route('dashboard')" :class="cn('transition-colors hover:text-foreground')">
              Dashboard
            </Link>
          </BreadcrumbItem>
        </BreadcrumbList>
      </Breadcrumb>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div
          class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
        >
          <div class="p-6 text-gray-900 dark:text-gray-100">
            You're logged in!
          </div>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
