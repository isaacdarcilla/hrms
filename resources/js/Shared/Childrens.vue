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
            <inertia-link
              v-if="family !== null"
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
                  <div class="text-sm text-gray-900">
                    {{ c.children_name }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900">
                    {{ c.children_birth_date }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <inertia-link
                    href="#"
                    class="text-indigo-600 mx-2 cursor-pointer hover:text-indigo-900"
                    >✏️ Edit</inertia-link
                  >
                  <inertia-link
                    @click="destroy(c.id, c.children_name)"
                    class="text-red-600 cursor-pointer hover:text-red-900"
                    >🗑️ Delete</inertia-link
                  >
                </td>
              </tr>
              <tr v-if="childrens === null">
                <td class="border-t px-6 py-4 font-bold" colspan="4">
                  ☹️ No childrens added.
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  props: {
      childrens: Array,
      family: Object,
  },
  methods: {
      destroy: function (id, name) {
      if (confirm("Are you sure you want to delete this contact?" + id)) {
        this.$inertia.delete(this.route("employees.destroy", this.contact.id));
      }
    },
  }
};
</script>
