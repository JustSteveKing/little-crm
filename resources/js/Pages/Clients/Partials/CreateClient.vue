<script setup lang="ts">
import {Link, useForm} from "@inertiajs/vue3";
import {Label} from "@/Components/ui/label";
import {Input} from "@/Components/ui/input";
import {Button} from "@/Components/ui/button";
import {DrawerContent, DrawerDescription, DrawerFooter, DrawerHeader, DrawerTitle} from "@/Components/ui/drawer";

const form = useForm({
  name: '',
  website: '',
});

const submit = () => {
  form.post(route('client:store'), {
    onSuccess: () => {
      form.reset();
    },
  })
};

</script>

<template>
  <DrawerContent>
    <DrawerHeader>
      <DrawerTitle>Create a new Client</DrawerTitle>
      <DrawerDescription>Use the following form to create a new client for your workspace.</DrawerDescription>
    </DrawerHeader>
    <DrawerFooter>
      <form @submit.prevent="submit" class="grid gap-4">
        <div class="grid gap-2">
          <Label for="name">Name</Label>
          <Input
            id="name"
            type="text"
            placeholder="The Wall"
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
          <Label for="website">Website</Label>
          <Input
            id="website"
            type="url"
            placeholder="https://www.thewall.io/"
            v-model="form.website"
            autocomplete="off"
            required
          />
          <template v-if="form.errors.website">
            <p class="text-destructive">{{ form.errors.website }}</p>
          </template>
        </div>
        <Button
          type="submit"
          class="w-full"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing"
        >
          Create new Client
        </Button>
      </form>
    </DrawerFooter>
  </DrawerContent>
</template>
