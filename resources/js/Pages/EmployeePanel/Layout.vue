<template>
  <div class="mb-4 mr-4 flex justify-between items-center">
    <h1 class="mb-6 font-bold text-3xl flex items-center">
      <img
        class="w-8 h-8 mx-3 rounded-full"
        :src="
          employee.photo !== null
            ? '/storage/' + employee.photo
            : '/img/user.png'
        "
      />
      <span>{{ employee.first_name }} {{ employee.last_name }}</span>
    </h1>
    <div class="mb-5 items-center">
      <inertia-link inertia-link :href="route('employee.logout')">
        <div
          class="p-2 rounded-full cursor-pointer text-red-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4"
        >
          <svg
            class="w-4 h-4"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
            ></path>
          </svg></div
      ></inertia-link>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    employee: Object,
  },
};
</script>
