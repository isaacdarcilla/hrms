<template>
  <div class="flex flex-col mt-0">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
        >
          <div class="flex items-center justify-between mb-0">
            <h5 class="mx-6 my-5 font-semibold font bg-white">
              👶 Name of Childrens
            </h5>
            <button
              @click="showAddModal"
              v-if="family !== null"
              class="h-8 text-sm items-center text-blue-600 font-semibold rounded-lg my-2 mx-6"
            >
              ➕ Add
            </button>
          </div>
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-white">
              <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Name of Children
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Date of Birth
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
                class="transition-all hover:bg-gray-100 hover:shadow-lg"
                v-for="c in childrens"
                :key="c.id"
              >
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ c.children_name }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900">
                    {{ format(c.children_birth_date) }}
                  </div>
                </td>
                <td class="px-1 py-4 whitespace-nowrap text-sm font-medium">
                  <span
                    @click="
                      showChildrenModal({
                        id: c.id,
                        name: c.children_name,
                        birthday: c.children_birth_date,
                      })
                    "
                    class="text-indigo-600 mx-2 cursor-pointer hover:text-indigo-900"
                    >✏️ Edit</span
                  >
                  <span
                    @click="destroy(c.id, c.children_name)"
                    class="text-red-600 cursor-pointer inline-flex mt-2 hover:text-red-900"
                    >🗑️ Delete</span
                  >
                </td>
              </tr>
              <tr v-if="childrens === null || childrens.length === 0">
                <td
                  class="border-t text-red-500 text-sm px-6 py-4 font-bold"
                  colspan="4"
                >
                  ☹️ No childrens added.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <children-add-modal
      :showing="showAdd"
      :background="family"
      :modal.sync="showAdd"
    ></children-add-modal>
    <children-edit-modal
      :showing="showModal"
      :child.sync="children"
      :modal.sync="showModal"
    ></children-edit-modal>
  </div>
</template>
<script>
import ChildrenEditModal from "@/Shared/Modals/ChildrenEditModal.vue";
import ChildrenAddModal from "@/Shared/Modals/ChildrenAddModal.vue";
import moment from "moment";

export default {
  props: {
    childrens: Array,
    family: Object,
  },
  components: {
    ChildrenEditModal,
    ChildrenAddModal,
  },
  data() {
    return {
      showModal: false,
      showAdd: false,
      children: null,
    };
  },
  methods: {
    showChildrenModal(item) {
      this.children = item;
      this.showModal = true;
    },
    showAddModal() {
      this.showAdd = true;
    },
    destroy(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("children.destroy", id));
        }
      });
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
  },
};
</script>
