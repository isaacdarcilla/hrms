<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">HR Staffs 👤</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
        <label class="mt-0 block text-gray-700">Filter Staff</label>
        <select v-model="form.trashed" class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="with">Active</option>
          <option value="only">Inactive</option>
        </select>
      </search-filter>
      <inertia-link class="btn-indigo" :href="route('users.create')">
        <span>➕ Create</span>
        <span class="hidden md:inline">Staff</span>
      </inertia-link>
    </div>
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Staff Name
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Email Address
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              User Type
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Action
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr
            v-for="user in users"
            :key="user.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td class="px-6 py-4 whitespace-nowrap">
              <inertia-link
                class="px-0 py-0 flex items-center focus:text-indigo-500"
                :href="route('users.edit', user.id)"
              >
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img
                      class="h-10 w-10 rounded-full"
                      :src="user.photo === null ? `/img/user.png` : user.photo"
                    />
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium capitalize text-gray-900">
                      {{ user.name }}
                    </div>
                  </div>
                </div>
                <icon
                  v-if="user.deleted_at"
                  name="trash"
                  class="flex-shrink-0 w-3 h-3 fill-gray-600 ml-2"
                />
              </inertia-link>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <inertia-link
                class="px-0 py-4 whitespace-nowrap text-blue-600 text-sm"
                :href="route('users.edit', user.id)"
                tabindex="-1"
              >
                {{ user.email }}
              </inertia-link>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <inertia-link
                class="px-0 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('users.edit', user.id)"
                tabindex="-1"
              >
                {{ user.owner ? "Owner" : "User" }}
              </inertia-link>
            </td>
            <td class="border-t w-px">
              <inertia-link
                class="px-4 flex items-center"
                :href="route('users.edit', user.id)"
                tabindex="-1"
              >
                <span
                  class="text-indigo-600 cursor-pointer font-semibold hover:text-indigo-900"
                  >✏️ Edit</span
                >
              </inertia-link>
            </td>
          </tr>
        </tbody>
        <tr v-if="users.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No staffs found.
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import Icon from "@/Shared/Icon";
import Layout from "@/Shared/Layout";
import mapValues from "lodash/mapValues";
import pickBy from "lodash/pickBy";
import SearchFilter from "@/Shared/SearchFilter";
import throttle from "lodash/throttle";

export default {
  metaInfo: { title: "Users" },
  layout: Layout,
  components: {
    Icon,
    SearchFilter,
  },
  props: {
    users: Array,
    filters: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
        role: this.filters.role,
        trashed: this.filters.trashed,
      },
    };
  },
  watch: {
    form: {
      handler: throttle(function () {
        let query = pickBy(this.form);
        this.$inertia.replace(
          this.route(
            "users",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null);
    },
  },
};
</script>
