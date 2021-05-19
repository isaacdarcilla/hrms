<template>
  <div>
    <div class="mb-4">
      <inertia-link
        class="flex items-center group py-3"
        :href="route('employee.dashboard')"
      >
        <div
          :class="
            isUrl('employee.dashboard')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          🏠 Dashboard
        </div>
      </inertia-link>
    </div>
    <div
      v-if="$page.employee.status_of_appointment === 'Permanent'"
      class="mb-4"
    >
      <inertia-link
        class="flex items-center group py-3"
        :href="route('employee.leave')"
      >
        <div
          :class="
            isUrl('employee.leave')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          📤 Leave Filing
        </div>
      </inertia-link>
    </div>
    <div
      v-if="$page.employee.status_of_appointment === 'Permanent'"
      class="mb-4"
    >
      <inertia-link
        class="flex items-center group py-3"
        :href="route('employee.credit', $page.employee.id)"
      >
        <div
          :class="
            isUrl('employee.credit')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          ❤️ Leave Credits
        </div>
      </inertia-link>
    </div>
    <div
      v-if="$page.employee.status_of_appointment === 'Permanent'"
      class="mb-4"
    >
      <inertia-link
        class="flex items-center group py-3"
        :href="route('employee.service.record', $page.employee.id)"
      >
        <div
          :class="
            isUrl('employee.credit')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          🗂️ Service
        </div>
      </inertia-link>
    </div>
    <div
      v-if="$page.employee.status_of_appointment === 'Permanent'"
      class="mb-4"
    >
      <inertia-link
        class="flex items-center group py-3"
        :href="route('employee.ipcr.index', $page.employee.id)"
      >
        <div
          :class="
            isUrl('employee.ipcr.index')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          🗃️ IPCR/OPCR
        </div>
      </inertia-link>
    </div>
    <div
      v-if="$page.employee.status_of_appointment === 'Permanent'"
      class="mb-4"
    >
      <inertia-link
        class="flex items-center group py-3"
        :href="route('employee.scholarship')"
      >
        <div
          :class="
            isUrl('employee.ipcr.index')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          🎓 Scholarship
        </div>
      </inertia-link>
    </div>
    <div
      v-if="$page.employee.status_of_appointment === 'Permanent'"
      class="mb-4"
    >
      <inertia-link
        class="flex items-center group py-3"
        :href="route('employee.profile.teaching', [$page.employee.id, 'teaching'])"
      >
        <div
          :class="
            isUrl('employee.profile.teaching')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          👩‍🏫 Teaching
        </div>
      </inertia-link>
    </div>
    <div
      v-if="$page.employee.status_of_appointment === 'Permanent'"
      class="mb-4"
    >
      <inertia-link
        class="flex items-center group py-3"
        :href="route('employee.profile.teaching', [$page.employee.id, 'non-teaching'])"
      >
        <div
          :class="
            isUrl('employee.profile.teaching')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          📕 Non Teaching
        </div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link
        class="flex items-center group py-3"
        :href="route('employee.profile', $page.employee.id)"
      >
        <div
          :class="
            isUrl('employee.profile')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          👥 My Profile
        </div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link
        class="flex items-center group py-3"
        :href="route('employee.inquiry')"
      >
        <div
          :class="
            isUrl('employee.inquiry')
              ? 'text-white font-bold'
              : 'text-indigo-300 font-bold group-hover:text-white'
          "
        >
          🎫 My Inquiries
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
