<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Breadcrumb, BreadcrumbItem, BreadcrumbList, BreadcrumbSeparator} from "@/Components/ui/breadcrumb";
import {Link} from "@inertiajs/vue3";
import {Client} from "@/types";
import { Button } from '@/components/ui/button'
import {
  Card,
  CardTitle,
  CardContent,
  CardHeader,
  CardDescription,
} from "@/Components/ui/card";
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/Components/ui/table'
import {
  DollarSign,
  PersonStanding,
  BriefcaseBusiness,
} from "lucide-vue-next";
import {
  Drawer,
  DrawerContent,
  DrawerHeader,
  DrawerTitle,
  DrawerClose,
  DrawerFooter,
  DrawerDescription,
  DrawerTrigger,
} from "@/Components/ui/drawer";
import CreateClient from "@/Pages/Clients/Partials/CreateClient.vue";

const props = defineProps<{
  clients: Client[],
}>();
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
            <Link :href="route('clients:index')" class="transition-colors hover:text-foreground">
              Clients
            </Link>
          </BreadcrumbItem>
        </BreadcrumbList>
      </Breadcrumb>
    </template>

    <Drawer>

      <div class="flex flex-1 flex-col gap-4 p-4 pt-0">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
          <Card class="rounded-xl bg-muted/50">
            <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
              <CardTitle class="text-sm font-medium">
                Total Clients
              </CardTitle>
              <BriefcaseBusiness class="h-4 w-4 text-muted-foreground" />
            </CardHeader>
            <CardContent>
              <div class="text-2xl font-bold">
                {{ clients.length }}
              </div>
            </CardContent>
          </Card>
          <Card class="rounded-xl bg-muted/50">
            <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
              <CardTitle class="text-sm font-medium">
                Total Contacts
              </CardTitle>
              <PersonStanding class="h-4 w-4 text-muted-foreground" />
            </CardHeader>
            <CardContent>
              <div class="text-2xl font-bold">
                {{ props.clients.reduce((acc, client) => acc + client.contacts.length, 0) }}
              </div>
            </CardContent>
          </Card>
          <Card class="rounded-xl bg-muted/50">
            <CardHeader class="flex flex-row items-center justify-between space-y-0 pb-2">
              <CardTitle class="text-sm font-medium">
                Total Revenue
              </CardTitle>
              <DollarSign class="h-4 w-4 text-muted-foreground" />
            </CardHeader>
            <CardContent>
              <div class="text-2xl font-bold">
                $45,231.89
              </div>
              <p class="text-xs text-muted-foreground">
                +20.1% from last month
              </p>
            </CardContent>
          </Card>
        </div>
        <div class="flex-1">
          <Card class="xl:col-span-2">
            <CardHeader class="flex flex-row items-center">
              <div class="grid gap-2">
                <CardTitle>Clients</CardTitle>
                <CardDescription>
                  A list of clients that you have for your workspace.
                </CardDescription>
              </div>
              <DrawerTrigger class="ml-auto gap-1">
                <Button as-child size="sm">
                  <a href="#">
                    Create Client
                  </a>
                </Button>
              </DrawerTrigger>

            </CardHeader>
            <CardContent>
              <Table>
                <TableHeader>
                  <TableRow>
                    <TableHead>Client Name</TableHead>
                    <TableHead class="text-right">
                      Total Contacts
                    </TableHead>
                  </TableRow>
                </TableHeader>
                <TableBody>
                  <template v-for="client in clients" :key="client.id">
                    <TableRow>
                      <TableCell>
                        <div class="font-medium">
                          {{ client.name}}
                        </div>
                        <div v-if="client.website" class="hidden text-sm text-muted-foreground md:inline">
                          {{ client.website }}
                        </div>
                      </TableCell>
                      <TableCell class="text-right">
                        {{ client.contacts.length }}
                      </TableCell>
                    </TableRow>
                  </template>

                </TableBody>
              </Table>
            </CardContent>
          </Card>
        </div>
      </div>
      <CreateClient />
    </Drawer>


  </AuthenticatedLayout>
</template>
