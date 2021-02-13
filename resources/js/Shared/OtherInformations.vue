<template>
  <div class="grid gap-8 mb-8 md:grid-cols-3 xl:grid-cols-3">
    <div class="flex flex-col mt-6">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
          >
            <div class="flex items-center justify-between mb-0">
              <h5 class="mx-6 my-5 font-semibold font bg-white">
                🤹 Special Skills and Hobbies
              </h5>
              <inertia-link
                class="h-8 text-xs items-center rounded-lg btn-indigo my-2 mx-6"
                :href="route('employees.create')"
              >
                ➕ Add
              </inertia-link>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-white">
                <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Skill and Hobbies
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
                  v-for="skill in skills"
                  :key="skill.id"
                >
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ skill.skills_name }}
                    </div>
                  </td>
                  <td class="px-1 py-4 whitespace-nowrap text-sm font-medium">
                    <span class="text-indigo-600 hover:text-indigo-900"
                      >✏️ Edit</span
                    >
                    <span
                      @click="destroySkill(skill.id, skill.skills_name)"
                      class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                      >🗑️ Delete</span
                    >
                  </td>
                </tr>
                <tr v-if="skills.length === 0">
                  <td
                    class="border-t px-6 py-4 text-red-500 text-sm font-bold"
                    colspan="4"
                  >
                    ☹️ No skills or hobbies added.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col mt-6">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
          >
            <div class="flex items-center justify-between mb-0">
              <h5 class="mx-6 my-5 font-semibold font bg-white">
                📣 Non-Academic Recognitions
              </h5>
              <inertia-link
                class="h-8 text-xs items-center rounded-lg btn-indigo my-2 mx-6"
                :href="route('employees.create')"
              >
                ➕ Add
              </inertia-link>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-white">
                <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Recognition
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
                  v-for="recognition in recognitions"
                  :key="recognition.id"
                >
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ recognition.recognitions_name }}
                    </div>
                  </td>
                  <td class="px-1 py-4 whitespace-nowrap text-sm font-medium">
                    <span class="text-indigo-600 hover:text-indigo-900"
                      >✏️ Edit</span
                    >
                    <span
                      @click="
                        destroyRecognition(
                          recognition.id,
                          recognition.recognitions_name
                        )
                      "
                      class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                      >🗑️ Delete</span
                    >
                  </td>
                </tr>
                <tr v-if="recognitions.length === 0">
                  <td
                    class="border-t px-6 text-red-500 text-sm py-4 font-bold"
                    colspan="4"
                  >
                    ☹️ No recognitions added.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col mt-6">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
          >
            <div class="flex items-center justify-between mb-0">
              <h5 class="mx-6 my-5 font-semibold font bg-white">
                🤝 Membership in Organizations
              </h5>
              <inertia-link
                class="h-8 text-xs items-center rounded-lg btn-indigo my-2 mx-6"
                :href="route('employees.create')"
              >
                ➕ Add
              </inertia-link>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-white">
                <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
                  <th
                    scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Organization
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
                  v-for="membership in memberships"
                  :key="membership.id"
                >
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                    <div class="text-sm text-gray-900">
                      {{ membership.memberships_name }}
                    </div>
                  </td>
                  <td class="px-1 py-4 whitespace-nowrap text-sm font-medium">
                    <span class="text-indigo-600 hover:text-indigo-900"
                      >✏️ Edit</span
                    >
                    <span
                      @click="
                        destroyMembership(
                          membership.id,
                          membership.memberships_name
                        )
                      "
                      class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                      >🗑️ Delete</span
                    >
                  </td>
                </tr>
                <tr v-if="memberships.length === 0">
                  <td
                    class="border-t px-6 text-red-500 text-sm py-4 font-bold"
                    colspan="4"
                  >
                    ☹️ No memberships added.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
    skills: Array,
    recognitions: Array,
    memberships: Array,
  },
  methods: {
    destroySkill(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("skill.destroy", id));
        }
      });
    },
    destroyRecognition(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("recognition.destroy", id));
        }
      });
    },
    destroyMembership(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("membership.destroy", id));
        }
      });
    },
  },
};
</script>
