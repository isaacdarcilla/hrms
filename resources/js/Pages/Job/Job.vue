<template>
  <div class="items-center">
    <div class="max-w-4xl mx-auto px-10 py-6">
      <div class="flex justify-between container">
        <div class="w-full">
          <div class="my-10 items-center justify-between">
            <p class="mt-8 text-xl font-bold text-gray-700 md:text-2xl">
              <img width="60" class="my-3" src="/img/transparent.png" />
              <span>CatSU Job Listings</span>
            </p>
            <p class="font-semibold text-sm mt-1">
              Browse and apply for vacant jobs
            </p>
          </div>
          <flash-messages />
          <div v-if="error === 1">
            <p>Job not found.</p>
          </div>
          <ul v-else>
            <li>
              <div class="mt-6 mx-auto">
                <div
                  class="max-w-4xl container mx-auto px-10 py-6 bg-white rounded-lg shadow-md"
                >
                  <div class="flex justify-between items-center">
                    <span class="font-normal text-sm text-gray-600"
                      >Posted on {{ format(jobs.created_at) }}</span
                    >
                    <span
                      ref="link"
                      @click="copy(job.job_link)"
                      class="text-blue-500 cursor-pointer text-sm font-bold hover:underline"
                      ><svg
                        class="w-5 h-5 inline-block"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"
                        ></path>
                      </svg>
                      {{ message }}</span
                    >
                    <!-- <a
                      @click="showApplyModal(jobs)"
                      class="px-2 py-2 cursor-pointer bg-blue-600 text-blue-100 font-semibold text-sm rounded-lg hover:bg-blue-500 transition duration-500 ease-in-out transform hover:-translate-y-1"
                      >Apply</a
                    > -->
                  </div>
                  <div class="mt-2">
                    <a
                      class="text-2xl text-blue-700 capitalize font-bold hover:underline"
                      >{{ jobs.position }},
                      <span class="text-md font-normal">{{
                        jobs.department
                      }}</span></a
                    >
                    <p class="mt-4 mb-2 font-bold">Item Number</p>
                    <p class="mt-2 uppercase text-gray-600">
                      {{ jobs.item_number }}
                    </p>
                    <p class="mt-3 mb-2 font-bold">Qualification Standard</p>
                    <div class="grid gap-2 mb-8 md:grid-cols-2 xl:grid-cols-2">
                      <div class="rounded pl-4 pt-2 mx-4">
                        <ol>
                          <li class="pl-3 mb-1 normal-case">
                            • Education:
                            <span class="text-gray-600 normal-case">{{
                              jobs.education
                            }}</span>
                          </li>
                          <li class="pl-3 mb-1">
                            • Experience:
                            <span class="text-gray-600 normal-case">{{
                              jobs.experience
                                ? jobs.experience
                                : "None required"
                            }}</span>
                          </li>
                        </ol>
                      </div>
                      <div class="rounded pl-4 pt-2 mx-4">
                        <ol>
                          <li class="pl-3 mb-1">
                            • Training:
                            <span class="text-gray-600 normal-case">{{
                              jobs.training ? jobs.training : "None required"
                            }}</span>
                          </li>
                          <li class="pl-3 mb-1">
                            • Eligibility:
                            <span class="text-gray-600 normal-case">{{
                              jobs.eligibility
                                ? jobs.eligibility
                                : "None required"
                            }}</span>
                          </li>
                        </ol>
                      </div>
                    </div>
                    <p class="mt-0 mb-2 font-bold">Job Description</p>
                    <div
                      class="mt-2 ml-4 text-gray-600 normal-case" id="my-list"
                      v-html="jobs.job_description"
                    ></div>
                    <p class="mt-4 mb-2 font-bold">Salary Grade</p>
                    <p class="mt-2 text-gray-600 uppercase">
                      SG-{{ jobs.salary_grade }}
                    </p>
                    <p class="mt-4 mb-2 font-bold">Monthly Salary</p>
                    <p class="mt-2 text-gray-600 uppercase">
                      {{ currency(jobs.monthly_salary) }}
                    </p>
                    <hr class="mt-3" />
                    <p class="mt-3 text-gray-700 text-sm normal-case">
                      Interested and qualified applicants should signify their
                      interest in writing, attach the following documents and
                      send to the address below not later than
                      <span class="font-semibold underline text-red-400">{{
                        formatDate(jobs.deadline_at)
                      }}</span
                      >.
                    </p>
                    <p class="mt-3 text-gray-700 text-sm normal-case">
                      <span class="font-semibold">QUALIFIED APPLICANTS</span>
                      are advised to hand in or send through courier/email their
                      application to:
                    </p>
                    <div class="mt-2 ml-4 text-gray-600 text-sm" id="my-list-2">
                      <ul>
                        <li>Application Letter</li>
                        <li>Letter of Intent and Statement of Authenticity & Veracity of Documents Submitted</li>
                        <li>Fully accomplished & notarized Personal Data Sheet with recent ID picture & Work Experience Sheet</li>
                        <li>Certified true copy of Transcript of Records (High School Diploma, Baccaluareate and Post-graduate studies)</li>
                        <li>Certified true copy of updated Service Record or Certificate of Employment (if applicable)</li>
                        <li>Certified true copy of Certificates of Trainings/Seminars Attended</li>
                        <li>Certified true copy of Performance Rating in the last two rating periods (if applicable)</li>
                        <li>Certified true copy of Certificate of Eligibilty/Rating/License ID</li>
                        <li>Photocopy of Latest Appointment (if applicable)</li>
                        <li>Other documents relevant to the position applied for</li>
                      </ul>
                    </div>
                    <div class="mt-3 text-gray-700 text-sm normal-case">
                      <span class="font-semibold"
                        >MA. SIONNE MAT T. CRISPINO</span
                      >
                      <p>
                        Administrative Officer V, Human Resource Management
                        Services
                      </p>
                      <p>Catanduanes State University</p>
                      <p>Virac, Catanduanes</p>
                      <a
                        href="mailto:csu_hrmservices@yahoo.com"
                        class="text-blue-600"
                        >csu_hrmservices@yahoo.com</a
                      >
                    </div>
                    <div class="mt-6">
                      <a :href="`/storage/${jobs.document}`" target="_blank"
                        class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center"
                      >
                        <svg
                          class="fill-current w-4 h-4 mr-2"
                          xmlns="http://www.w3.org/2000/svg"
                          viewBox="0 0 20 20"
                        >
                          <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                        </svg>
                        <span>Download File</span>
                      </a>
                    </div>
                  </div>
                  <div class="flex justify-between items-center mt-6">
                    <!-- <span
                      ref="link"
                      @click="copy"
                      class="text-blue-500 cursor-pointer text-sm font-bold hover:underline"
                      ><svg
                        class="w-5 h-5 inline-block"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"
                        ></path>
                      </svg>
                      {{ message }}</span
                    > -->
                    <!-- <div>
                      <span class="flex items-center"
                        ><img
                          src="/img/user.png"
                          alt="avatar"
                          class="mx-2 w-5 h-5 object-cover rounded-full hidden sm:block"
                        />
                        <h1
                          v-if="applicants === 0"
                          class="text-gray-700 text-sm font-bold hover:underline"
                        >
                          There are no applications yet
                        </h1>
                        <h1
                          v-else
                          class="text-gray-700 text-sm font-bold hover:underline"
                        >
                          {{ applicants }} applied for this job
                        </h1>
                      </span>
                    </div> -->
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <modal-apply
      :showing="showApply"
      :job="job"
      :applied="applied"
      :modal.sync="showApply"
    ></modal-apply>
  </div>
</template>
<script>
import ModalApply from "@/Pages/Job/ModalApply";
import moment from "moment";
import FlashMessages from "@/Shared/FlashMessages";
import swal from "sweetalert";

export default {
  components: {
    FlashMessages,
    ModalApply,
  },
  props: {
    jobs: Object,
    applicants: Number,
    error: Number,
  },
  data() {
    return {
      message: "Copy link",
      url: null,
      job: null,
      applied: false,
      showApply: false,
    };
  },
  mounted() {
    this.url = window.location.href;
  },
  methods: {
    copy() {
      this.$copyText(this.url);
      this.message = "Link copied to clipboard";
      swal({
        text: `Link copied to clipboard`,
        buttons: false,
      });
    },
    showApplyModal(item) {
      this.job = item;
      this.showApply = true;

      localStorage.getItem(item.id)
        ? (this.applied = true)
        : (this.applied = false);
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY h:mm A");
      }
    },
    formatDate(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
    currency(price, sign = "₱ ") {
      const pieces = parseFloat(price).toFixed(2).split("");
      let ii = pieces.length - 3;
      while ((ii -= 3) > 0) {
        pieces.splice(ii, 0, ",");
      }
      return sign + pieces.join("");
    },
  },
};
</script>

<style>
#my-list > ul > li {
  list-style-type: disc;
}
#my-list-2 > ul > li {
  list-style-type: decimal;
}
</style>
