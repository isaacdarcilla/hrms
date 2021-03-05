<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Leave Filing 📤</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
        <label class="block text-gray-700">Filter Leave</label>
        <select v-model="form.trashed" class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="with">Active</option>
          <option value="only">Inactive</option>
        </select>
      </search-filter>
      <button
        @click="showCreateModal"
        class="btn-indigo rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
      >
        <span>➕ Apply</span>
        <span class="hidden md:inline">Leave</span>
      </button>
    </div>
    <div
      class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg overflow-x-auto"
    >
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              ID
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Leave Type
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Date of Filing
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Working Days
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Inclusive Dates
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
          <tr class="hover:bg-gray-100 focus-within:bg-gray-100"></tr>
        </tbody>
        <tr v-if="leaves.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No leave found.
          </td>
        </tr>
      </table>
    </div>
    <create-modal :showing="showCreate" :modal.sync="showCreate"></create-modal>
    <pagination :links="leaves.links" />
  </div>
</template>

<script>
import Layout from "@/Pages/EmployeePanel/Layout";
import Icon from "@/Shared/Icon";
import mapValues from "lodash/mapValues";
import Pagination from "@/Shared/Pagination";
import pickBy from "lodash/pickBy";
import SearchFilter from "@/Shared/SearchFilter";
import throttle from "lodash/throttle";
import CreateModal from "@/Pages/EmployeePanel/Leave/CreateModal";
import moment from "moment";

export default {
  metaInfo: { title: "Leave Filing" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
    CreateModal,
  },
  props: {
    filters: Object,
    leaves: Object,
  },
  data() {
    return {
      showCreate: false,
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    };
  },
  methods: {
    showCreateModal() {
      this.showCreate = true;
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
  },
};
</script>
