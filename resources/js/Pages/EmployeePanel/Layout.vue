<template>
  <div>
    <div class="flex-1 flex flex-col">
      <nav class="px-4 flex justify-between bg-indigo-800 h-16">
        <ul class="flex items-center">
          <li class="h-8 w-8 mx-3">
            <img class="h-full w-full mx-auto" src="/img/logo.png" />
          </li>
        </ul>

        <ul class="flex items-center">
          <li>
            <h1 class="pl-8 lg:pl-0 font-semibold text-white">HRMS</h1>
          </li>
        </ul>

        <ul class="flex items-center">
          <li class="h-8 w-8">
            <img
              class="h-full w-full rounded-full mx-auto"
              :src="
                employee.photo !== null
                  ? '/storage/' + employee.photo
                  : '/img/user.png'
              "
            />
          </li>
          <li class="mx-3">
            <span
              class="text-white cursor-pointer font-medium hover:font-semibold hover:text-blue-600"
              >Profile</span
            >
          </li>
          <li class="mr-3">
            <inertia-link
              :href="route('employee.logout')"
              class="text-red-500 cursor-pointer font-medium hover:font-semibold hover:text-red-600"
              >Logout</inertia-link
            >
          </li>
        </ul>
      </nav>
    </div>
    <flash-messages class="mx-10 my-10" />
  </div>
</template>
<script>
import FlashMessages from "@/Shared/FlashMessages";

export default {
  components: {
    FlashMessages,
  },
  props: {
    employee: Object,
  },
};
</script>
