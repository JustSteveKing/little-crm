<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import {Head, Link} from '@inertiajs/vue3';
import {cn} from "@/lib/utils";
import {Breadcrumb, BreadcrumbItem, BreadcrumbList, BreadcrumbSeparator} from "@/Components/ui/breadcrumb";

defineProps<{
  mustVerifyEmail?: boolean;
  status?: string;
}>();
</script>

<template>
  <Head title="Profile"/>

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
            <Link :href="route('profile.edit')" class="transition-colors hover:text-foreground">
              Profile Settings
            </Link>
          </BreadcrumbItem>
        </BreadcrumbList>
      </Breadcrumb>
    </template>

    <div class="py-12">
      <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
        <div
          class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800"
        >
          <UpdateProfileInformationForm
            :must-verify-email="mustVerifyEmail"
            :status="status"
            class="max-w-xl"
          />
        </div>

        <div
          class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800"
        >
          <UpdatePasswordForm class="max-w-xl"/>
        </div>

        <div
          class="bg-white p-4 shadow sm:rounded-lg sm:p-8 dark:bg-gray-800"
        >
          <DeleteUserForm class="max-w-xl"/>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>
