<template>
  <div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div
          class="shadow overflow-hidden border-b bg-white border-gray-200 sm:rounded-lg"
        >
          <div class="flex items-center justify-between mb-0">
            <h5 class="mx-6 my-5 font-semibold font bg-white">
              Voluntary Work Involvement
            </h5>
            <inertia-link
              class="h-8 text-xs items-center btn-indigo my-2 mx-6"
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
                  Organization Name
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
                  Nature of Work
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
                v-for="volunteer in volunteers"
                :key="volunteer.id"
              >
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">
                    {{ volunteer.volunteers_organization }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">
                    {{ volunteer.volunteers_from }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm text-gray-900">
                    {{ volunteer.volunteers_to }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900">
                    {{ volunteer.volunteers_number_of_hours }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <div class="text-sm text-gray-900">
                    {{ volunteer.volunteers_nature_of_work }}
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                  <inertia-link
                    href="#"
                    class="text-indigo-600 hover:text-indigo-900"
                    >✏️ Edit</inertia-link
                  >
                </td>
              </tr>
              <tr v-if="volunteers.length === 0">
                <td class="border-t px-6 py-4 font-bold" colspan="4">
                  ☹️ No voluntary work added.
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
  props: { volunteers: Array },
};
</script>
