<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import {Breadcrumb, BreadcrumbItem, BreadcrumbList, BreadcrumbSeparator} from "@/Components/ui/breadcrumb";
import {Link} from "@inertiajs/vue3";
</script>

<template>
  <AuthenticatedLayout>
    <template #breadcrumb>
      <Breadcrumb>
        <BreadcrumbList>
          <BreadcrumbItem class="hidden md:block">
            <Link :href="route('dashboard')" class="transition-colors hover:text-foreground">
              Dashboard
            </Link>
          </BreadcrumbItem>
          <BreadcrumbSeparator />
          <BreadcrumbItem class="hidden md:block">
            <Link :href="route('projects:index')" class="transition-colors hover:text-foreground">
              Projects
            </Link>
          </BreadcrumbItem>
        </BreadcrumbList>
      </Breadcrumb>
    </template>

    main content

  </AuthenticatedLayout>
</template>
