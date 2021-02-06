<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Employees 👥</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
        <label class="block text-gray-700">Trashed:</label>
        <select v-model="form.trashed" class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="with">With Trashed</option>
          <option value="only">Only Trashed</option>
        </select>
      </search-filter>
      <inertia-link class="btn-indigo" :href="route('employees.create')">
        <span>➕ Create</span>
        <span class="hidden md:inline">Employee</span>
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
              Employee Name
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Department
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Position
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Phone
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Status
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
            v-for="contact in contacts.data"
            :key="contact.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td class="border-t">
              <inertia-link
                class="px-6 py-4 flex items-center focus:text-indigo-500"
                :href="route('employees.edit', contact.id)"
              >
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img
                      class="h-10 w-10 rounded-full"
                      src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=4&amp;w=256&amp;h=256&amp;q=60"
                      alt=""
                    />
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium text-gray-900">
                      {{ contact.name }}
                    </div>
                    <div class="text-sm text-gray-500">
                      jane.cooper@example.com
                    </div>
                  </div>
                </div>
                <icon
                  v-if="contact.deleted_at"
                  name="trash"
                  class="flex-shrink-0 w-3 h-3 fill-gray-400 ml-2"
                />
              </inertia-link>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('employees.edit', contact.id)"
                tabindex="-1"
              >
                <div v-if="contact.organization">
                  {{ contact.organization.name }}
                </div>
                <div class="text-sm text-gray-500">Job Order</div>
              </inertia-link>
            </td>
            <td class="border-t">
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                :href="route('employees.edit', contact.id)"
                tabindex="-1"
              >
                {{ contact.city }}
              </inertia-link>
            </td>
            <td class="border-t">
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                :href="route('employees.edit', contact.id)"
                tabindex="-1"
              >
                {{ contact.phone }}
              </inertia-link>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <span
                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-300 text-green-800"
              >
                Active
              </span>
            </td>
            <td class="border-t w-px">
              <inertia-link
                class="px-4 flex items-center"
                :href="route('employees.edit', contact.id)"
                tabindex="-1"
              >
                👁️‍🗨️
              </inertia-link>
            </td>
          </tr>
        </tbody>
        <tr v-if="contacts.data.length === 0">
          <td class="border-t px-6 py-4 font-bold" colspan="4">
            ☹️ No employees found.
          </td>
        </tr>
      </table>
    </div>
    <pagination :links="contacts.links" />
  </div>
</template>

<script>
import Icon from "@/Shared/Icon";
import Layout from "@/Shared/Layout";
import mapValues from "lodash/mapValues";
import Pagination from "@/Shared/Pagination";
import pickBy from "lodash/pickBy";
import SearchFilter from "@/Shared/SearchFilter";
import throttle from "lodash/throttle";

export default {
  metaInfo: { title: "Employees" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
  },
  props: {
    contacts: Object,
    filters: Object,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
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
            "employees",
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
