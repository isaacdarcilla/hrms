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
      <inertia-link
        class="flex items-center group py-3"
        :href="route('jobs')"
      >
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
