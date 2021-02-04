<template>
  <div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('dashboard')">
        <div :class="isUrl('') ? 'text-white font-bold' : 'text-indigo-300 font-bold group-hover:text-white'">🏠 Dashboard</div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('contacts')">
        <div :class="isUrl('contacts') ? 'text-white font-bold' : 'text-indigo-300 font-bold group-hover:text-white'">👥 Employees</div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('organizations')">
        <div :class="isUrl('organizations') ? 'text-white font-bold' : 'text-indigo-300 font-bold group-hover:text-white'">💰 Payroll</div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('organizations')">
        <div :class="isUrl('organizations') ? 'text-white font-bold' : 'text-indigo-300 font-bold group-hover:text-white'">⏰ Attendance</div>
      </inertia-link>
    </div>
    <div class="mb-4">
      <inertia-link class="flex items-center group py-3" :href="route('reports')">
        <div :class="isUrl('reports') ? 'text-white font-bold' : 'text-indigo-300 font-bold group-hover:text-white'">📰 Reports</div>
      </inertia-link>
    </div>
  </div>
</template>

<script>
import Icon from '@/Shared/Icon'

export default {
  components: {
    Icon,
  },
  props: {
    url: String,
  },
  methods: {
    isUrl(...urls) {
      if (urls[0] === '') {
        return this.url === ''
      }

      return urls.filter(url => this.url.startsWith(url)).length
    },
  },
}
</script>
