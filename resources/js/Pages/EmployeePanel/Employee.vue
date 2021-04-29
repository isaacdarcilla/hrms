<template>
  <div>
    <div class="mb-10 mt-0">
      <div class="mb-6 mt-1 flex justify-between items-center">
        <div class="text-3xl font-bold">Dashboard 🏠</div>
      </div>
      <div
          v-if="notices.length !== 0"
          class="mb-4 flex items-center justify-between rounded"
      >
        <div class="flex items-center">
          <div class="mx-4 pb-4">📢</div>
          <div class="pb-4 text-gray text-sm font-medium">
            {{ format(notices[0].created_at) }} • {{ notices[0].notice_type }} •
            {{ notices[0].notice_subject }} •
            {{ notices[0].notice_description }} •
          <a
            :href="`/storage/` + notices[0].file"
            class="text-blue-600 cursor-pointer"
            >Download Attachment</a
          >
          </div>
        </div>
      </div>
      <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
        <div class="h-full">
          <ul class="flex flex-col bg-white rounded-lg p-4">
            <div class="mb-4 mx-4 flex justify-between items-center">
              <div class="font-semibold">Announcements</div>
            </div>
            <li
                v-for="notice in notices"
                :key="notice.id"
                class="border-gray-400 flex flex-row mb-2"
            >
              <div
                  class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-3 transition duration-500 ease-in-out transform hover:-translate-y-1"
              >
                <div
                    class="flex flex-col rounded-md w-10 h-10 bg-blue-100 justify-center items-center mr-4"
                >
                  📢
                </div>
                <div class="flex-1 pl-1 mr-5">
                  <div class="font-medium">{{ notice.notice_subject }}</div>
                  <div class="text-gray-600 text-sm">
                    {{ truncate(notice.notice_description) }}
                  </div>
                </div>
              </div>
            </li>
            <div v-if="notices.length === 0">
              <div class="mx-auto my-3 text-center items-center">
                <h1 class="text-3xl mb-2">☹️</h1>
                Nothing here yet.
              </div>
            </div>
          </ul>
        </div>
        <div class="h-full">
          <ul class="flex flex-col bg-white rounded-lg p-4">
            <div class="mb-4 mx-4 flex justify-between items-center">
              <div class="font-semibold">Vacant Jobs</div>
              <inertia-link
                  :href="route('jobs.list')"
                  class="text-blue-600 text-sm font-semibold hover:text-blue-700"
              >View more
              </inertia-link
              >
            </div>
            <li
                v-for="job in jobs"
                :key="job.id"
                class="border-gray-400 flex flex-row mb-2"
            >
              <div
                  class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-3 transition duration-500 ease-in-out transform hover:-translate-y-1"
              >
                <div
                    class="flex flex-col rounded-md w-10 h-10 bg-orange-200 justify-center items-center mr-4"
                >
                  💼
                </div>
                <div class="flex-1 pl-1 mr-5">
                  <div class="font-medium">
                    {{ job.position }} at {{ job.department }}
                  </div>
                  <div class="text-gray-600 text-sm" v-html="truncate(job.job_description)">

                  </div>
                </div>
              </div>
            </li>
            <div v-if="jobs.length === 0">
              <div class="mx-auto my-3 text-center items-center">
                <h1 class="text-3xl mb-2">☹️</h1>
                Nothing here yet.
              </div>
            </div>
          </ul>
        </div>
        <div class="h-full">
          <ul class="flex flex-col bg-white rounded-lg p-4">
            <div class="mb-4 mx-4 flex justify-between items-center">
              <div class="font-semibold">My Tasks</div>
            </div>
            <form @submit.prevent="addTask" class="w-full max-w-lg">
              <div class="flex flex-wrap">
                <div class="w-full px-3 mb-3">
                  <input
                      class="form-input block w-full"
                      placeholder="Type new task and press Enter to add."
                      v-model="form.description"
                  />
                </div>
              </div>
            </form>
            <li
                v-for="task in tasks"
                :key="task.id"
                class="border-gray-400 flex flex-row mb-2"
            >
              <div
                  class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-3 transition duration-500 ease-in-out transform hover:-translate-y-1"
              >
                <div
                    class="flex flex-col rounded-md w-10 h-10 bg-yellow-200 justify-center items-center mr-4"
                >
                  ⚡
                </div>
                <div class="flex-1 justify-between items-center">
                  <div v-if="!task.cleared_at" class="font-medium inline">
                    {{ task.description }}
                  </div>
                  <div v-else class="font-semibold line-through inline">
                    {{ task.description }}
                  </div>
                </div>
                <div
                    v-if="!task.cleared_at"
                    @click.prevent="doneTask(task.id)"
                    class="text-sm text-green-600"
                    title="Mark as done"
                >
                  <svg
                      class="w-5 h-5"
                      fill="none"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                      xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                </div>
                <div
                    v-else
                    @click.prevent="undoneTask(task.id)"
                    class="text-sm text-green-600"
                    title="Mark as undone"
                >
                  <svg
                      class="w-5 h-5"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
              </div>
            </li>
            <div class="mx-4 my-2 flex justify-between items-center">
              <div class="text-sm font-semibold inline">
                {{ total.tasks }} task left
              </div>
              <div
                  v-if="tasks.length !== 0"
                  @click="clearTask"
                  class="text-sm font-semibold cursor-pointer text-red-600"
              >
                Clear All
              </div>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from '@/Pages/EmployeePanel/Layout'
import moment from 'moment'

export default {
  metaInfo: {title: 'Dashboard'},
  layout: Layout,
  props: {
    total: Object,
    notices: Array,
    employee: Object,
    jobs: Array,
    tasks: Array,
  },
  data() {
    return {
      form: {
        description: null,
      },
    }
  },
  methods: {
    truncate(input) {
      if (input.length > 50) {
        return input.substring(0, 50) + '...'
      }
      return input
    },
    format(value) {
      if (value) {
        return moment(String(value)).format('MMMM D, YYYY')
      }
    },
    addTask() {
      this.$inertia.post(
          this.route('task.store.employee', this.employee.id),
          this.form,
          {
            onStart: () => (this.sending = true),
            onFinish: () => {
              this.sending = false
              this.form.description = null
            },
          },
      )
    },
    doneTask(id) {
      this.$inertia.put(this.route('task.update.employee', id), {
        onStart: () => (this.sending = true),
        onFinish: () => {
          this.sending = false
        },
      })
    },
    undoneTask(id) {
      this.$inertia.put(this.route('task.update.undone.employee', id), {
        onStart: () => (this.sending = true),
        onFinish: () => {
          this.sending = false
        },
      })
    },
    clearTask() {
      this.$inertia.delete(
          this.route('task.destroy.employee', this.employee.id),
          {
            onStart: () => (this.sending = true),
            onFinish: () => {
              this.sending = false
            },
          },
      )
    },
  },
}
</script>
