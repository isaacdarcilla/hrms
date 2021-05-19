<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      <inertia-link
        class="text-indigo-400 hover:text-indigo-600"
        :href="route('employee.scholarship')"
        >Scholarship</inertia-link
      >
      <span class="text-indigo-400 font-medium">/</span> Documentary
      Requirements 🎓
    </h1>
    <div class="bg-white rounded shadow overflow-hidden">
      <form @submit.prevent="submit">
        <div class="ml-8 mt-6 text-blue-600 font-semibold">
          Note: You can upload scanned documents. You can skip a document by
          selecting the checkbox option below. However, if documents was not
          followed and completed, this can have conflict.
        </div>
        <div>
          <!-- First 4-1 -->
          <div
            class="pl-8 pr-8 pt-8 -mr-6 flex flex-wrap"
            v-if="scholar.scholarship_type == '4' && scholar.plan == '1'"
          >
            <file-input
              v-model="form.item_number_2"
              :error="errors.item_number_2"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of Good Moral *"
            />
            <file-input
              v-if="!form.doc3"
              v-model="form.item_number_3"
              :error="errors.item_number_3"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of No Pending Administrative Case *"
            />
            <file-input
              v-if="!form.doc4"
              v-model="form.item_number_4"
              :error="errors.item_number_4"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of I/OPCRF Rating *"
            />
            <file-input
              v-model="form.item_number_5"
              :error="errors.item_number_5"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Updated Service Record *"
            />
            <file-input
              v-model="form.item_number_6"
              :error="errors.item_number_6"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Photocopy of PSA Birth Certificate *"
            />
            <file-input
              v-if="!form.doc7"
              v-model="form.item_number_7"
              :error="errors.item_number_7"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certification as to scholastic standing of last educational attainment (TOR) *"
            />
            <file-input
              v-model="form.item_number_8"
              :error="errors.item_number_8"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Medical Certificate *"
            />
            <file-input
              v-if="!form.doc9"
              v-model="form.item_number_9"
              :error="errors.item_number_9"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Copy of Letter of Admission/Certificate of Enrolment *"
            />
          </div>
          <div
            v-if="scholar.scholarship_type == '4' && scholar.plan == '1'"
            class="flex-row ml-10 mb-6"
          >
            <div class="my-5 text-yellow-800 font-semibold">
              Check the box below if you want the corresponding documents to be
              uploaded later.
            </div>

            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc3"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certificate of No Pending Administrative Case</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc4"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certificate of I/OPCRF Rating</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc7"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certification as to scholastic standing of last educational
                attainment (TOR)</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc9"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Copy of Letter of Admission/Certificate of Enrolment</label
              >
            </div>
          </div>
          <!-- End first -->

          <!-- Second -->
          <div
            class="pl-8 pr-8 pt-8 -mr-6 flex flex-wrap"
            v-if="scholar.scholarship_type == '4' && scholar.plan == '2'"
          >
            <file-input
              v-model="form.item_number_2"
              :error="errors.item_number_2"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of Good Moral *"
            />
            <file-input
              v-if="!form.doc3"
              v-model="form.item_number_3"
              :error="errors.item_number_3"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of No Pending Administrative Case *"
            />
            <file-input
              v-if="!form.doc4"
              v-model="form.item_number_4"
              :error="errors.item_number_4"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of I/OPCRF Rating *"
            />
            <file-input
              v-model="form.item_number_5"
              :error="errors.item_number_5"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Updated Service Record *"
            />
            <file-input
              v-model="form.item_number_6"
              :error="errors.item_number_6"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Photocopy of PSA Birth Certificate *"
            />
            <file-input
              v-if="!form.doc7"
              v-model="form.item_number_7"
              :error="errors.item_number_7"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certification as to scholastic standing of last educational attainment (TOR) *"
            />
            <file-input
              v-model="form.item_number_8"
              :error="errors.item_number_8"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Medical Certificate *"
            />
            <file-input
              v-if="!form.doc9"
              v-model="form.item_number_9"
              :error="errors.item_number_9"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Copy of Letter of Admission/Certificate of Enrolment *"
            />
          </div>
          <div
            v-if="scholar.scholarship_type == '4' && scholar.plan == '2'"
            class="flex-row ml-10 mb-6"
          >
            <div class="my-5 text-yellow-800 font-semibold">
              Check the box below if you want the corresponding documents to be
              uploaded later.
            </div>

            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc3"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certificate of No Pending Administrative Case</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc4"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certificate of I/OPCRF Rating</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc7"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certification as to scholastic standing of last educational
                attainment (TOR)</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc9"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Copy of Letter of Admission/Certificate of Enrolment</label
              >
            </div>
          </div>
          <!-- End second -->

          <!-- Third -->
          <div
            class="pl-8 pr-8 pt-8 -mr-6 flex flex-wrap"
            v-if="scholar.scholarship_type == '4' && scholar.plan == '3'"
          >
            <file-input
              v-model="form.item_number_2"
              :error="errors.item_number_2"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of Good Moral *"
            />
            <file-input
              v-if="!form.doc3"
              v-model="form.item_number_3"
              :error="errors.item_number_3"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of No Pending Administrative Case *"
            />
            <file-input
              v-if="!form.doc4"
              v-model="form.item_number_4"
              :error="errors.item_number_4"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of I/OPCRF Rating *"
            />
            <file-input
              v-model="form.item_number_5"
              :error="errors.item_number_5"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Updated Service Record *"
            />
            <file-input
              v-model="form.item_number_6"
              :error="errors.item_number_6"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Photocopy of PSA Birth Certificate *"
            />
            <file-input
              v-if="!form.doc7"
              v-model="form.item_number_7"
              :error="errors.item_number_7"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certification as to scholastic standing of last educational attainment (TOR) *"
            />
            <file-input
              v-model="form.item_number_8"
              :error="errors.item_number_8"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Medical Certificate *"
            />
            <file-input
              v-if="!form.doc9"
              v-model="form.item_number_9"
              :error="errors.item_number_9"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Copy of Letter of Admission/Certificate of Enrolment *"
            />
            <file-input
              v-model="form.item_number_10"
              :error="errors.item_number_10"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certification that the employee undergone Proposal Defense *"
            />
            <!-- <file-input
              v-model="form.item_number_11"
              :error="errors.item_number_11"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Copy of Approved Research Proposal *"
            />
            <file-input
              v-model="form.item_number_12"
              :error="errors.item_number_12"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Copy of Approved Program of Work *"
            /> -->
          </div>
          <div
            v-if="scholar.scholarship_type == '4' && scholar.plan == '3'"
            class="flex-row ml-10 mb-6"
          >
            <div class="my-5 text-yellow-800 font-semibold">
              Check the box below if you want the corresponding documents to be
              uploaded later.
            </div>

            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc3"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certificate of No Pending Administrative Case</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc4"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certificate of I/OPCRF Rating</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc7"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certification as to scholastic standing of last educational
                attainment (TOR)</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc9"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Copy of Letter of Admission/Certificate of Enrolment</label
              >
            </div>
          </div>
          <!-- End third -->

          <!-- Fourth -->
          <div
            class="pl-8 pr-8 pt-8 -mr-6 flex flex-wrap"
            v-if="scholar.scholarship_type == '4' && scholar.plan == '4'"
          >
            <file-input
              v-model="form.item_number_2"
              :error="errors.item_number_2"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of Good Moral *"
            />
            <file-input
              v-if="!form.doc3"
              v-model="form.item_number_3"
              :error="errors.item_number_3"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of No Pending Administrative Case *"
            />
            <file-input
              v-if="!form.doc4"
              v-model="form.item_number_4"
              :error="errors.item_number_4"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of I/OPCRF Rating *"
            />
            <file-input
              v-model="form.item_number_5"
              :error="errors.item_number_5"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Updated Service Record *"
            />
            <file-input
              v-model="form.item_number_6"
              :error="errors.item_number_6"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Photocopy of PSA Birth Certificate *"
            />
            <file-input
              v-model="form.item_number_10"
              :error="errors.item_number_10"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certification that the employee undergone Proposal Defense *"
            />
            <file-input
              v-model="form.item_number_11"
              :error="errors.item_number_11"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Copy of Approved Research Proposal *"
            />
            <file-input
              v-model="form.item_number_12"
              :error="errors.item_number_12"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Copy of Approved Program of Work *"
            />
            <file-input
              v-model="form.item_number_13"
              :error="errors.item_number_13"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certification that the employee did not previously enjoy scholarship grant from CatSU *"
            />
            <file-input
              v-if="!form.doc14"
              v-model="form.item_number_14"
              :error="errors.item_number_14"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certification on Completion of Academic Requirements (CAR) *"
            />
            <file-input
              v-if="!form.doc15"
              v-model="form.item_number_15"
              :error="errors.item_number_15"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certification that the employee is done with Comprehensive Exam *"
            />
          </div>
          <div
            v-if="scholar.scholarship_type == '4' && scholar.plan == '4'"
            class="flex-row ml-10 mb-6"
          >
            <div class="my-5 text-yellow-800 font-semibold">
              Check the box below if you want the corresponding documents to be
              uploaded later.
            </div>

            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc3"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certificate of No Pending Administrative Case</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc4"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certificate of I/OPCRF Rating</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc14"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certification on Completion of Academic Requirements
                (CAR)</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc15"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certification that the employee is done with Comprehensive
                Exam</label
              >
            </div>
          </div>
          <!-- End forth -->

          <!-- Sabbatical -->
          <div
            class="pl-8 pr-8 pt-8 -mr-6 flex flex-wrap"
            v-if="scholar.scholarship_type == '3'"
          >
            <file-input
              v-model="form.item_number_2"
              :error="errors.item_number_2"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of Good Moral *"
            />
            <file-input
              v-if="!form.doc3"
              v-model="form.item_number_3"
              :error="errors.item_number_3"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of No Pending Administrative Case *"
            />
            <file-input
              v-if="!form.doc4"
              v-model="form.item_number_4"
              :error="errors.item_number_4"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of I/OPCRF Rating *"
            />
            <file-input
              v-model="form.item_number_5"
              :error="errors.item_number_5"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Updated Service Record *"
            />
            <file-input
              v-model="form.item_number_6"
              :error="errors.item_number_6"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Photocopy of PSA Birth Certificate *"
            />
          </div>
          <div
            v-if="scholar.scholarship_type == '3'"
            class="flex-row ml-10 mb-6"
          >
            <div class="my-5 text-yellow-800 font-semibold">
              Check the box below if you want the corresponding documents to be
              uploaded later.
            </div>

            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc3"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certificate of No Pending Administrative Case</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc4"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certificate of I/OPCRF Rating</label
              >
            </div>
          </div>
          <!-- End -->

          <!-- Abroad -->
          <div
            class="pl-8 pr-8 pt-8 -mr-6 flex flex-wrap"
            v-if="scholar.scholarship_type == '2'"
          >
            <file-input
              v-model="form.item_number_2"
              :error="errors.item_number_2"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of Good Moral *"
            />
            <file-input
              v-if="!form.doc3"
              v-model="form.item_number_3"
              :error="errors.item_number_3"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of No Pending Administrative Case *"
            />
            <file-input
              v-if="!form.doc4"
              v-model="form.item_number_4"
              :error="errors.item_number_4"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certificate of I/OPCRF Rating *"
            />
            <file-input
              v-model="form.item_number_5"
              :error="errors.item_number_5"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Updated Service Record *"
            />
            <file-input
              v-model="form.item_number_6"
              :error="errors.item_number_6"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Photocopy of PSA Birth Certificate *"
            />
            <file-input
              v-if="!form.doc7"
              v-model="form.item_number_7"
              :error="errors.item_number_7"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Certification as to scholastic standing of last educational attainment (TOR) *"
            />
            <file-input
              v-model="form.item_number_8"
              :error="errors.item_number_8"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Medical Certificate *"
            />
            <file-input
              v-if="!form.doc4"
              v-model="form.item_number_9"
              :error="errors.item_number_9"
              class="pr-6 pb-8 w-full lg:w-1/2"
              type="file"
              accept="image/*"
              label="Copy of Letter of Admission/Certificate of Enrolment *"
            />
          </div>
          <div
            v-if="scholar.scholarship_type == '2'"
            class="flex-row ml-10 mb-6"
          >
            <div class="my-5 text-yellow-800 font-semibold">
              Check the box below if you want the corresponding documents to be
              uploaded later.
            </div>

            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc3"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certificate of No Pending Administrative Case</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc4"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certificate of I/OPCRF Rating</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc7"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Certification as to scholastic standing of last educational
                attainment (TOR)</label
              >
            </div>
            <div class="flex py-1 items-center space-x-2">
              <input
                v-model="form.doc9"
                type="checkbox"
                class="w-4 h-4 transition duration-300 rounded focus:ring-2 focus:ring-offset-0 focus:outline-none focus:ring-blue-200"
              />
              <label class="text-sm font-semibold text-gray-900"
                >Copy of Letter of Admission/Certificate of Enrolment</label
              >
            </div>
          </div>
          <!-- End -->

          <!-- <file-input
            v-model="form.item_number_16"
            :error="errors.item_number_16"
            class="pr-6 pb-8 w-full lg:w-1/2"
            type="file"
            accept="image/*"
            label="Result/Report on Exam/Interview/Background Check by the University Staff Development Committe *"
          /> -->
        </div>
        <div
          class="px-8 py-4 bg-gray-100 border-t border-gray-200 flex justify-end items-center"
        >
          <loading-button :loading="sending" class="btn-indigo" type="submit"
            >Upload</loading-button
          >
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Layout from "@/Pages/EmployeePanel/Layout";
import LoadingButton from "@/Shared/LoadingButton";
import SelectInput from "@/Shared/SelectInput";
import TextInput from "@/Shared/TextInput";
import TextareaInput from "@/Shared/TextareaInput";
import FileInput from "@/Shared/FileInput";
import moment from "moment";
import VSelectize from "@isneezy/vue-selectize";
import jobs from "../../../Shared/Modals/jobs.json";

export default {
  metaInfo: { title: "Upload Documents" },
  layout: Layout,
  components: {
    LoadingButton,
    SelectInput,
    TextInput,
    TextareaInput,
    VSelectize,
    FileInput,
  },
  props: {
    errors: Object,
    employee: Object,
    scholar: Object,
  },
  remember: "form",
  watch: {
    form: {
      handler(e) {},
      deep: true,
    },
  },
  data() {
    return {
      sending: false,
      options: jobs,
      form: {
        contact_id: this.employee.id,
        scholarship_id: this.scholar.id,
        type: this.scholar.scholarship_type,
        plan: this.scholar.plan,
        item_number_2: null,
        item_number_3: null,
        item_number_4: null,
        item_number_5: null,
        item_number_6: null,
        item_number_7: null,
        item_number_8: null,
        item_number_9: null,
        item_number_10: null,
        item_number_11: null,
        item_number_12: null,
        item_number_13: null,
        item_number_14: null,
        item_number_15: null,
        doc2: null,
        doc3: null,
        doc4: null,
        doc5: null,
        doc6: null,
        doc7: null,
        doc8: null,
        doc9: null,
        doc10: null,
        doc11: null,
        doc12: null,
        doc13: null,
        doc14: null,
        doc15: null,
      },
    };
  },
  methods: {
    handleType(e) {
      console.log(e.target.value);
      if (e.target.value != 4) {
        this.form.plan = null;
      }
    },
    submit() {
      const data = new FormData();
      data.append("item_number_2", this.form.item_number_2 || "");
      data.append("item_number_3", this.form.item_number_3 || "");
      data.append("item_number_4", this.form.item_number_4 || "");
      data.append("item_number_5", this.form.item_number_5 || "");
      data.append("item_number_6", this.form.item_number_6 || "");
      data.append("item_number_7", this.form.item_number_7 || "");
      data.append("item_number_8", this.form.item_number_8 || "");
      data.append("item_number_9", this.form.item_number_9 || "");
      data.append("item_number_10", this.form.item_number_10 || "");
      data.append("item_number_11", this.form.item_number_11 || "");
      data.append("item_number_12", this.form.item_number_12 || "");
      data.append("item_number_13", this.form.item_number_13 || "");
      data.append("item_number_14", this.form.item_number_14 || "");
      data.append("item_number_15", this.form.item_number_15 || "");
      data.append("doc2", this.form.doc2 || "");
      data.append("doc3", this.form.doc3 || "");
      data.append("doc4", this.form.doc4 || "");
      data.append("doc5", this.form.doc5 || "");
      data.append("doc6", this.form.doc6 || "");
      data.append("doc7", this.form.doc7 || "");
      data.append("doc8", this.form.doc8 || "");
      data.append("doc9", this.form.doc9 || "");
      data.append("doc10", this.form.doc10 || "");
      data.append("doc11", this.form.doc11 || "");
      data.append("doc12", this.form.doc12 || "");
      data.append("doc13", this.form.doc13 || "");
      data.append("doc14", this.form.doc14 || "");
      data.append("doc15", this.form.doc15 || "");
      data.append("plan", this.form.plan || "");
      data.append("type", this.form.type || "");
      data.append("id", this.form.scholarship_id || "");
      data.append("_method", "put");

      this.$inertia.post(
        this.route("employee.scholarship.store.documents"),
        data,
        {
          onStart: () => (this.sending = true),
          onFinish: () => (this.sending = false),
        }
      );
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
  },
};
</script>
