<script setup lang="ts">
import {computed} from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import {Input} from "@/Components/ui/input";
import {Label} from "@/Components/ui/label";
import {Button} from "@/Components/ui/button";

const props = defineProps<{
  status?: string;
}>();

const form = useForm({});

const submit = () => {
  form.post(route('verification.send'));
};

const verificationLinkSent = computed(
  () => props.status === 'verification-link-sent',
);
</script>

<template>
  <GuestLayout>
    <Head title="Email Verification"/>

    <div class="mx-auto grid w-[350px] gap-6">
      <div class="grid gap-2 left">
        <h1 class="text-3xl font-bold">
          Email Verification
        </h1>
        <p class="text-balance text-muted-foreground">
          Thanks for signing up! Before getting started, could you verify your
          email address by clicking on the link we just emailed to you? If you
          didn't receive the email, we will gladly send you another.
        </p>
        <div
          class="mb-4 text-sm font-medium text-green-600 dark:text-green-400"
          v-if="verificationLinkSent"
        >
          A new verification link has been sent to the email address you
          provided during registration.
        </div>
      </div>
      <form @submit.prevent="submit" class="grid gap-4">
        <Button
          type="submit"
          class="w-full"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Resend Verification Email
        </Button>
      </form>
      <div class="mt-4 left text-sm">
        Not ready?
        <Link
          :href="route('logout')"
          method="post"
          as="button"
          class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
        >Log Out
        </Link>
      </div>
    </div>
  </GuestLayout>
</template>
