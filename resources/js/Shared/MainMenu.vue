<template>
  <div>
    <div class="mb-4">
      <inertia-link
        class="flex items-center group py-3"
        :href="route('dashboard')"
      >
        <div
          :class="
            isUrl('')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          🏠 Dashboard
        </div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link
        class="flex items-center group py-3"
        :href="route('employees')"
      >
        <div
          :class="
            isUrl('employees')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          👥 Employees
        </div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('jobs')">
        <div
          :class="
            isUrl('jobs')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          💼 Job Posting
        </div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link
        class="flex items-center group py-3"
        :href="route('applicants')"
      >
        <div
          :class="
            isUrl('applicants')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          🤝 Recruitment
        </div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link
        class="flex items-center group py-3"
        :href="route('notices')"
      >
        <div
          :class="
            isUrl('notices')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          📢 Notice Board
        </div>
      </inertia-link>
    </div>
    <div v-if="$page.auth.user.super === true" class="mb-4">
      <inertia-link
        class="flex items-center group py-3"
        :href="route('leaves')"
      >
        <div
          :class="
            isUrl('leaves')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          📤 Leave
          <span
            class="animate-pulse inline-flex items-center justify-center ml-1 px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full"
            >{{ $page.notifiable.leaves }}</span
          >
        </div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('users')">
        <div
          :class="
            isUrl('users')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          👤 HR Staffs
        </div>
      </inertia-link>
    </div>
  </div>
</template>

<script>
import Icon from "@/Shared/Icon";

export default {
  components: {
    Icon,
  },
  props: {
    url: String,
  },
  methods: {
    isUrl(...urls) {
      if (urls[0] === "") {
        return this.url === "";
      }

      return urls.filter((url) => this.url.startsWith(url)).length;
    },
  },
};
</script>
