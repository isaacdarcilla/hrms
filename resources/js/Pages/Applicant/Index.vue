<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Recruitments 🤝</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
        <label class="block text-gray-700">Filter Applicants</label>
        <select v-model="form.trashed" class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="with">Active</option>
          <option value="only">Inactive</option>
        </select>
      </search-filter>
    </div>
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Applicant Name
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
              Phone Number
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Experience
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Education
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Eligibility
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Training
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
            v-for="applicant in applicants.data"
            :key="applicant.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td class="border-t">
              <inertia-link
                class="px-6 py-4 flex items-center focus:text-indigo-500"
                :href="route('applicants')"
              >
                <div class="flex items-center">
                  <div class="ml-0">
                    <div class="text-sm font-medium capitalize text-gray-900">
                      {{ applicant.first_name }} {{ applicant.middle_name }}
                      {{ applicant.sur_name }}
                    </div>
                    <div
                      class="text-sm lowercase text-blue-500"
                    >
                      {{ applicant.email }}
                    </div>
                  </div>
                </div>
              </inertia-link>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('applicants')"
                tabindex="-1"
              >
                <div v-if="applicant.position !== null" class="capitalize text-gray-900">
                  {{ applicant.position.position }}
                </div>
                <div v-else class="capitalize text-red-600">
                  No data available
                </div>
              </inertia-link>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <inertia-link
                class="whitespace-nowrap text-sm text-gray-900"
                :href="route('applicants')"
                tabindex="-1"
              >
                <a
                  :href="'tel:' + applicant.phone"
                  class="lowercase text-blue-600"
                >
                  {{ applicant.phone }}
                </a>
              </inertia-link>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <inertia-link
                class="whitespace-nowrap text-sm text-gray-900"
                :href="route('applicants')"
                tabindex="-1"
              >
                <a v-if="applicant.qualification_experience === '1'"
                  class="capitalize text-blue-600"
                >
                  Yes
                </a>
                <a v-else
                  class="capitalize text-red-600"
                >
                  No
                </a>
              </inertia-link>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <inertia-link
                class="whitespace-nowrap text-sm text-gray-900"
                :href="route('applicants')"
                tabindex="-1"
              >
                <a v-if="applicant.qualification_education === '1'"
                  class="capitalize text-blue-600"
                >
                  Yes
                </a>
                <a v-else
                  class="capitalize text-red-600"
                >
                  No
                </a>
              </inertia-link>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <inertia-link
                class="whitespace-nowrap text-sm text-gray-900"
                :href="route('applicants')"
                tabindex="-1"
              >
                <a v-if="applicant.qualification_eligibility === '1'"
                  class="capitalize text-blue-600"
                >
                  Yes
                </a>
                <a v-else
                  class="capitalize text-red-600"
                >
                  No
                </a>
              </inertia-link>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              <inertia-link
                class="whitespace-nowrap text-sm text-gray-900"
                :href="route('applicants')"
                tabindex="-1"
              >
                <a v-if="applicant.qualification_training === '1'"
                  class="capitalize text-blue-600"
                >
                  Yes
                </a>
                <a v-else
                  class="capitalize text-red-600"
                >
                  No
                </a>
              </inertia-link>
            </td>
            <td v-if="applicant.position !== null" class="px-6 py-4 whitespace-nowrap text-sm font-medium">
              <a
                class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                tabindex="-1"
              >
                <span>👏 Recruit</span>
              </a>
            </td>
            <td v-else class="px-6 py-4 whitespace-nowrap text-sm font-medium">
              <a title="This position has been filled"
                class="text-gray-600"
                tabindex="-1"
              >
                <span>👏 Recruit</span>
              </a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <pagination :links="applicants.links" />
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
  metaInfo: { title: "Recruitments" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
  },
  props: {
    filters: Object,
    applicants: Object,
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
            "applicants",
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
