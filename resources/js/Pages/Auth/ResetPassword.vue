<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import {Input} from "@/Components/ui/input";
import {Label} from "@/Components/ui/label";
import {Button} from "@/Components/ui/button";

const props = defineProps<{
  email: string;
  token: string;
}>();

const form = useForm({
  token: props.token,
  email: props.email,
  password: '',
  password_confirmation: '',
});

const submit = () => {
  form.post(route('password.store'), {
    onFinish: () => {
      form.reset('password', 'password_confirmation');
    },
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Reset Password" />

    <div class="mx-auto grid w-[350px] gap-6">
      <div class="grid gap-2 left">
        <h1 class="text-3xl font-bold">
          Reset Password
        </h1>
        <p class="text-balance text-muted-foreground">
          Enter your email and password below to sign into your account.
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
        </div>
        <div class="grid gap-2">
          <Label for="password_confirmation">Confirm Password</Label>
          <Input
            id="password_confirmation"
            type="password"
            placeholder="you-know-nothing-jon-snow"
            v-model="form.password_confirmation"
            autocomplete="off"
            required
          />
          <template v-if="form.errors.password_confirmation">
            <p class="text-destructive">{{ form.errors.password_confirmation }}</p>
          </template>
        </div>
        <Button
          type="submit"
          class="w-full"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Reset Password
        </Button>
      </form>
    </div>
  </GuestLayout>
</template>
