<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import {Button} from "@/Components/ui/button";
import {Input} from "@/Components/ui/input";
import {Label} from "@/Components/ui/label";

defineProps<{
  status?: string;
}>();

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const submit = () => {
  form.post(route('login'), {
    onFinish: () => {
      form.reset('password');
    },
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Sign into your account" />

    <div class="mx-auto grid w-[350px] gap-6">
      <div class="grid gap-2 left">
        <h1 class="text-3xl font-bold">
          Sign into your account
        </h1>
        <p class="text-balance text-muted-foreground">
          Enter your email and password below to sign into your account.
        </p>
        <p v-if="status" class="mb-4 text-sm font-medium text-green-600">
          {{ status }}
        </p>
      </div>
      <form @submit.prevent="submit" class="grid gap-4">
        <div class="grid gap-2">
          <Label for="email">Email Address</Label>
          <Input
            id="email"
            type="email"
            placeholder="jon.snow@thewall.io"
            v-model="form.email"
            autofocus
            autocomplete="off"
            required
          />
          <template v-if="form.errors.email">
            <p class="text-destructive">{{ form.errors.email }}</p>
          </template>
        </div>
        <div class="grid gap-2">
          <Label for="password">Password</Label>
          <Input
            id="password"
            type="password"
            placeholder="you-know-nothing-jon-snow"
            v-model="form.password"
            autocomplete="off"
            required
          />
          <template v-if="form.errors.password">
            <p class="text-destructive">{{ form.errors.password }}</p>
          </template>
          <Link
            :href="route('password.request')"
            class="ml-auto inline-block text-sm underline"
          >
            Forgot your password?
          </Link>
        </div>
        <Button
          type="submit"
          class="w-full"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Sign in
        </Button>
      </form>
      <div class="mt-4 left text-sm">
        Haven't signed up yet?
        <Link :href="route('register')" class="underline">
          Create a new account
        </Link>
      </div>
    </div>
  </GuestLayout>
</template>
