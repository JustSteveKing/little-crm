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

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
});

const submit = () => {
  form.post(route('register'), {
    onFinish: () => {
      form.reset('password', 'password_confirmation');
    },
  });
};
</script>

<template>
  <GuestLayout>
    <Head title="Create a new account" />

    <div class="mx-auto grid w-[350px] gap-6">
      <div class="grid gap-2 left">
        <h1 class="text-3xl font-bold">
          Create a new account
        </h1>
        <p class="text-balance text-muted-foreground">
          Enter your details below to create a new account.
        </p>
      </div>
      <form @submit.prevent="submit" class="grid gap-4">
        <div class="grid gap-2">
          <Label for="name">Name</Label>
          <Input
            id="name"
            type="text"
            placeholder="Jon Snow"
            v-model="form.name"
            autofocus
            autocomplete="off"
            required
          />
          <template v-if="form.errors.name">
            <p class="text-destructive">{{ form.errors.name }}</p>
          </template>
        </div>
        <div class="grid gap-2">
          <Label for="email">Email Address</Label>
          <Input
            id="email"
            type="email"
            placeholder="jon.snow@thewall.io"
            v-model="form.email"
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
            placeholder="you-still-know-nothing-jon-snow"
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
          Register
        </Button>
      </form>
      <div class="mt-4 left text-sm">
        Already registered?
        <Link :href="route('login')" class="underline">
          Sign into your account
        </Link>
      </div>
    </div>
  </GuestLayout>
<!--  <GuestLayout>-->
<!--    <Head title="Register"/>-->

<!--    <form @submit.prevent="submit">-->
<!--      <div>-->
<!--        <InputLabel for="name" value="Name"/>-->

<!--        <TextInput-->
<!--          id="name"-->
<!--          type="text"-->
<!--          class="mt-1 block w-full"-->
<!--          v-model="form.name"-->
<!--          required-->
<!--          autofocus-->
<!--          autocomplete="name"-->
<!--        />-->

<!--        <InputError class="mt-2" :message="form.errors.name"/>-->
<!--      </div>-->

<!--      <div class="mt-4">-->
<!--        <InputLabel for="email" value="Email"/>-->

<!--        <TextInput-->
<!--          id="email"-->
<!--          type="email"-->
<!--          class="mt-1 block w-full"-->
<!--          v-model="form.email"-->
<!--          required-->
<!--          autocomplete="username"-->
<!--        />-->

<!--        <InputError class="mt-2" :message="form.errors.email"/>-->
<!--      </div>-->

<!--      <div class="mt-4">-->
<!--        <InputLabel for="password" value="Password"/>-->

<!--        <TextInput-->
<!--          id="password"-->
<!--          type="password"-->
<!--          class="mt-1 block w-full"-->
<!--          v-model="form.password"-->
<!--          required-->
<!--          autocomplete="new-password"-->
<!--        />-->

<!--        <InputError class="mt-2" :message="form.errors.password"/>-->
<!--      </div>-->

<!--      <div class="mt-4">-->
<!--        <InputLabel-->
<!--          for="password_confirmation"-->
<!--          value="Confirm Password"-->
<!--        />-->

<!--        <TextInput-->
<!--          id="password_confirmation"-->
<!--          type="password"-->
<!--          class="mt-1 block w-full"-->
<!--          v-model="form.password_confirmation"-->
<!--          required-->
<!--          autocomplete="new-password"-->
<!--        />-->

<!--        <InputError-->
<!--          class="mt-2"-->
<!--          :message="form.errors.password_confirmation"-->
<!--        />-->
<!--      </div>-->

<!--      <div class="mt-4 flex items-center justify-end">-->
<!--        <Link-->
<!--          :href="route('login')"-->
<!--          class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"-->
<!--        >-->
<!--          Already registered?-->
<!--        </Link>-->

<!--        <PrimaryButton-->
<!--          class="ms-4"-->
<!--          :class="{ 'opacity-25': form.processing }"-->
<!--          :disabled="form.processing"-->
<!--        >-->
<!--          Register-->
<!--        </PrimaryButton>-->
<!--      </div>-->
<!--    </form>-->
<!--  </GuestLayout>-->
</template>
