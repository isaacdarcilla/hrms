<template>
  <div class="items-center">
    <div class="max-w-4xl mx-auto px-10 py-8">
      <div class="flex justify-between container">
        <div class="w-full">
          <div class="my-10 items-center justify-between">
            <p class="mt-10 text-xl font-bold text-gray-700 md:text-2xl">
              💼 Job Listings
            </p>
            <p class="font-semibold text-sm mt-1">
              Browse and apply for vacant jobs
            </p>
          </div>
          <ul v-for="job in jobs" :key="job.id">
            <li>
              <div class="mt-6 mx-auto">
                <div
                  class="max-w-4xl container mx-auto px-10 py-6 bg-white rounded-lg shadow-md"
                >
                  <div class="flex justify-between items-center">
                    <span class="font-normal text-sm text-gray-600">Posted on {{
                      format(job.created_at)
                    }}</span
                    ><a
                      href="#"
                      class="px-2 py-2 bg-blue-600 text-blue-100 font-semibold text-sm rounded-lg hover:bg-blue-500"
                      >Apply</a
                    >
                  </div>
                  <div class="mt-2">
                    <a
                      class="text-2xl text-blue-700 capitalize font-bold hover:underline"
                      >{{ job.position }},
                      <span class="text-md font-normal">{{
                        job.department
                      }}</span></a
                    >
                    <p class="mt-4 mb-2 font-bold">Item Number</p>
                    <p class="mt-2 uppercase text-gray-600">
                      {{ job.item_number }}
                    </p>
                    <p class="mt-3 mb-2 font-bold">Qualification Standard</p>
                    <div class="grid gap-2 mb-8 md:grid-cols-2 xl:grid-cols-2">
                      <div class="rounded pl-4 pt-2 mx-4">
                        <ol>
                          <li class="pl-3 mb-1 normal-case">
                            • Education:
                            <span class="text-gray-600 normal-case">{{
                              job.education
                            }}</span>
                          </li>
                          <li class="pl-3 mb-1">
                            • Experience:
                            <span class="text-gray-600 normal-case">{{
                              job.experience
                            }}</span>
                          </li>
                        </ol>
                      </div>
                      <div class="rounded pl-4 pt-2 mx-4">
                        <ol>
                          <li class="pl-3 mb-1">
                            • Training:
                            <span class="text-gray-600 normal-case">{{
                              job.training
                            }}</span>
                          </li>
                          <li class="pl-3 mb-1">
                            • Eligibility:
                            <span class="text-gray-600 normal-case">{{
                              job.eligibility
                            }}</span>
                          </li>
                        </ol>
                      </div>
                    </div>
                    <p class="mt-0 mb-2 font-bold">Job Description</p>
                    <p class="mt-2 text-gray-600 normal-case">
                      {{ job.job_description }}
                    </p>
                    <p class="mt-4 mb-2 font-bold">Salary Grade</p>
                    <p class="mt-2 text-gray-600 uppercase">
                      SG-{{ job.salary_grade }}
                    </p>
                  </div>
                  <div class="flex justify-between items-center mt-4">
                    <a class="text-blue-500 hover:underline">Easy Apply</a>
                    <div>
                      <a href="#" class="flex items-center"
                        ><img
                          src="/img/user.png"
                          alt="avatar"
                          class="mx-2 w-5 h-5 object-cover rounded-full hidden sm:block"
                        />
                        <h1 class="text-gray-700 font-bold hover:underline">
                          There are 2 applicants
                        </h1>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import moment from "moment";

export default {
  props: {
    jobs: Array,
  },
  methods: {
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY, h:mm a");
      }
    },
  },
};
</script>
