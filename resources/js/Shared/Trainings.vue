<template>
  <div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
        >
          <div class="flex items-center justify-between mb-0">
            <h5 class="mx-6 my-5 font-semibold font bg-white">
              📚 Learning and Development Programs Attended
            </h5>
            <button
              @click="showTrainingModal"
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
                  Training Name
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  From
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  To
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Number of Hours
                </th>
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
                  Venue
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                >
                  Sponsored By
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
                v-for="t in trainings"
                :key="t.id"
              >
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ t.trainings_name }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">
                    {{ format(t.trainings_from) }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">
                    {{ format(t.trainings_to) }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900">
                    {{ t.trainings_number_of_hours }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ t.trainings_type }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ t.trainings_venue }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900 capitalize">
                    {{ t.trainings_sponsored_by }}
                  </div>
                </td>
                <td class="px-1 py-4 whitespace-nowrap text-sm font-medium">
                  <span 
                    @click="showTrainingEditModal(t)"
                    class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                    >✏️ Edit</span
                  >
                  <span
                    @click="destroy(t.id, t.trainings_name)"
                    class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                    >🗑️ Delete</span
                  >
                </td>
              </tr>
              <tr v-if="trainings.length === 0">
                <td
                  class="border-t text-red-500 text-sm px-6 py-4 font-bold"
                  colspan="4"
                >
                  ☹️ No trainings added.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <training-add-modal
      :showing="showTraining"
      :employee="employeeId"
      :modal.sync="showTraining"
    ></training-add-modal>
    <training-edit-modal
      :showing="showTrainingEdit"
      :employee="employeeId"
      :training="trainingItems"
      :modal.sync="showTrainingEdit"
    ></training-edit-modal>
  </div>
</template>
<script>
import TrainingAddModal from "@/Shared/Modals/TrainingAddModal.vue";
import TrainingEditModal from "@/Shared/Modals/TrainingEditModal.vue";
import moment from "moment";

export default {
  components: { 
    TrainingAddModal,
    TrainingEditModal
  },
  inject: ["employeeId"],
  props: {
    trainings: Array,
  },
  data() {
    return {
      trainingItems: null,
      showTraining: false,
      showTrainingEdit: false,
    };
  },
  methods: {
    format(value) {
      if (value) {
        return moment(String(value)).format("MMM D, YYYY");
      }
    },
    showTrainingModal() {
      this.showTraining = true;
    },
    showTrainingEditModal(item) {
      this.trainingItems = item;
      this.showTrainingEdit = true;
    },
    destroy(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("training.destroy", id));
        }
      });
    },
  },
};
</script>
