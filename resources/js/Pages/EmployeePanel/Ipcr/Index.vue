<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">IPCR/OPCR 🗃️</h1>
    <div class="mb-6 flex items-center justify-between">
      <button @click="showCreateModal" class="btn-indigo rounded-lg">
        <span>⬆️ Upload</span>
        <span class="hidden md:inline">IPCR/OPCR</span>
      </button>
    </div>

    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Type
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              File Name
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Uploaded On
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Actions
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr
            v-for="document in documents.data"
            :key="document.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.ipcr.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ document.type }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.ipcr.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ document.file_name }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.ipcr.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ formatDate(document.created_at) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <a
                :href="`/storage/`+document.file_path"
                class="text-blue-600 inline-flex mt-2 cursor-pointer hover:text-blue-900"
                >💾 Download</a
              >
              <span
              @click="destroy(document.id)"
                class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                >🗑️ Delete</span
              >
            </td>
          </tr>
        </tbody>
        <tr v-if="documents.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No ipcr/opcr found.
          </td>
        </tr>
      </table>
    </div>
    <Create
      :showing="showCreate"
      :employee="employee"
      :modal.sync="showCreate"
    ></Create>
  </div>
</template>

<script>
import Icon from "@/Shared/Icon";
import Layout from "@/Pages/EmployeePanel/Layout";
import mapValues from "lodash/mapValues";
import Pagination from "@/Shared/Pagination";
import moment from "moment";
import Create from "@/Pages/EmployeePanel/Ipcr/Upload";

export default {
  metaInfo: { title: "IPCR/OPCR" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    Create,
  },
  props: {
    employee: Object,
    documents: Object,
  },
  data() {
    return {
      showCreate: false,
      showEdit: false,
      service: null,
    };
  },
  methods: {
    showEditModal(item) {
      this.service = item;
      this.showEdit = true;
    },
    showCreateModal() {
      this.showCreate = true;
    },
    round(number) {
      return Math.round((number + Number.EPSILON) * 10000) / 10000;
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MM/DD/YYYY");
      }
    },
    formatDate(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
    currency(price, sign = "₱ ") {
      const pieces = parseFloat(price).toFixed(2).split("");
      let ii = pieces.length - 3;
      while ((ii -= 3) > 0) {
        pieces.splice(ii, 0, ",");
      }
      return sign + pieces.join("");
    },
    destroy(id) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete document?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("employee.ipcr.delete", id));
        }
      });
    },
  },
};
</script>
