<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import {Input} from "@/Components/ui/input";
import {Label} from "@/Components/ui/label";
import {Button} from "@/Components/ui/button";

defineProps<{
  status?: string;
}>();

const form = useForm({
  email: '',
});

const submit = () => {
  form.post(route('password.email'));
};
</script>

<template>
  <GuestLayout>
    <Head title="Forgot Password" />

    <div class="mx-auto grid w-[350px] gap-6">
      <div class="grid gap-2 left">
        <h1 class="text-3xl font-bold">
          Forgot Password
        </h1>
        <p class="text-balance text-muted-foreground">
          Forgot your password? No problem. Just let us know your email
          address and we will email you a password reset link that will allow
          you to choose a new one.
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
        <Button
          type="submit"
          class="w-full"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Email Password Reset Link
        </Button>
      </form>
    </div>
  </GuestLayout>
</template>
