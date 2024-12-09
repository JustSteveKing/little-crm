<script setup lang="ts">
import {
  useForm,
  usePage,
} from '@inertiajs/vue3';
import {
  Card,
  CardHeader,
  CardTitle,
  CardDescription,
  CardContent,
  CardFooter,
} from "@/Components/ui/card";
import {Label} from "@/Components/ui/label";
import {Input} from "@/Components/ui/input";
import {Button} from "@/Components/ui/button";
import {User} from "@/types";

defineProps<{
  mustVerifyEmail?: Boolean;
  status?: String;
}>();

const user: User = usePage().props.auth.user;

const form = useForm({
  name: user.name,
  email: user.email.address,
});
</script>

<template>
  <Card class="max-w-full">
    <CardHeader>
      <CardTitle>
        Profile Information
      </CardTitle>
      <CardDescription>
        Update your account's profile information and email address.
      </CardDescription>
    </CardHeader>
    <form @submit.prevent="form.patch(route('profile.update'))">
      <CardContent>
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
      </CardContent>
      <CardFooter class="border-t px-6 py-4">
        <Button
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >Save</Button>
      </CardFooter>
    </form>
  </Card>
</template>
