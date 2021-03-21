<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Support Inquiries 🎫</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
        <label class="block text-gray-700">Filter Inquiries</label>
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
        <span>➕ Submit</span>
        <span class="hidden md:inline">Inquiry</span>
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
              Inquiry Type
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Date Submitted
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Description of Problem
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Image
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
              Priority
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
            v-for="inquiry in inquiries.data"
            :key="inquiry.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.inquiry')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="font-semibold text-blue-600">
                  #{{ inquiry.inquiry_number }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.inquiry')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-700"
              >
                <div class="normal-case font-semibold">
                  {{ inquiry.type }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.inquiry')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="normal-case font-normal">
                  {{ format(inquiry.created_at) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.inquiry')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="normal-case font-normal">
                  {{ inquiry.description }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <button class="px-0 py-2 whitespace-nowrap text-sm text-gray-900">
                <div class="normal-case font-normal">
                  <img
                    hidden
                    v-viewer="options"
                    :id="'p' + `${inquiry.id}`"
                    :src="
                      inquiry.image === null
                        ? `/img/no-image.png`
                        : `/storage/` + inquiry.image
                    "
                  />
                  <span
                    @click="image(inquiry.id)"
                    class="text-blue-600 font-semibold inline-flex mt-0 cursor-pointer hover:text-blue-900"
                    >View image</span
                  >
                </div>
              </button>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.inquiry')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div
                  v-if="inquiry.status === 'Open'"
                  class="normal-case font-semibold text-green-600"
                >
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-green-600 rounded-full"
                    >{{ inquiry.status }}</span
                  >
                </div>
                <div v-else class="normal-case font-semibold text-red-600">
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full"
                    >{{ inquiry.status }}</span
                  >
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.inquiry')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div
                  v-if="inquiry.priority === 'High'"
                  class="normal-case font-semibold text-red-600"
                >
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full"
                    >{{ inquiry.priority }}</span
                  >
                </div>
                <div v-else class="normal-case font-semibold text-yellow-600">
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-yellow-600 rounded-full"
                    >{{ inquiry.priority }}</span
                  >
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <div v-if="inquiry.status !== 'Close'">
                <span
                  v-if="inquiry.deleted_at === null"
                  @click="destroy(inquiry.id, inquiry.inquiry_number)"
                  class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                  >🗑️ Delete</span
                >
                <span
                  v-else
                  @click="restore(inquiry.id, inquiry.inquiry_number)"
                  class="text-yellow-600 inline-flex mt-2 cursor-pointer hover:text-yellow-900"
                  >♻️ Restore</span
                >
              </div>
              <div v-else>
                <span
                  class="text-green-600 inline-flex mt-2 cursor-pointer hover:text-green-900"
                  >✨ Solution</span
                >
              </div>
            </td>
          </tr>
        </tbody>
        <tr v-if="inquiries.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No inquiry found.
          </td>
        </tr>
      </table>
    </div>
    <create-modal
      :showing="showCreate"
      :employee="employee"
      :modal.sync="showCreate"
    ></create-modal>
    <pagination :links="inquiries.links" />
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
import CreateModal from "@/Pages/EmployeePanel/Inquiry/CreateModal";
import moment from "moment";
import $ from "jquery";
import "viewerjs/dist/viewer.css";
import Viewer from "v-viewer";
import Vue from "vue";

Vue.use(Viewer);

export default {
  metaInfo: { title: "Inquiry" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
    CreateModal,
  },
  props: {
    filters: Object,
    inquiries: Object,
    employee: Object,
  },
  data() {
    return {
      showCreate: false,
      options: { movable: false, toolbar: false, navbar: false, title: false },
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
            "employee.inquiry",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    image(value) {
      let image = `#p${value}`;
      const viewer = this.$el.querySelector(image).$viewer;
      viewer.show();
    },
    showCreateModal() {
      this.showCreate = true;
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
    truncate(input) {
      if (input.length > 50) {
        return input.substring(0, 50) + "...";
      }
      return input;
    },
    destroy(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("employee.inquiry.destroy", id));
        }
      });
    },
    restore(id, name) {
      swal({
        title: "Restore",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: false,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.put(this.route("employee.inquiry.restore", id));
        }
      });
    },
  },
};
</script>
