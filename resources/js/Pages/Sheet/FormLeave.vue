<template>
  <div>
    <div class="flex justify-between">
      <h1 class="mb-8 font-bold text-3xl">Leave Form 📜</h1>
      <button
        @click="printPdf()"
        class="btn-indigo h-10 rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
      >
        <span>🖨️ Generate</span>
      </button>
    </div>
    <vue-html2pdf
      :show-layout="true"
      :float-layout="false"
      :enable-download="false"
      :preview-modal="true"
      :paginate-elements-by-height="1400"
      :filename="filename"
      :pdf-quality="2"
      :manual-pagination="true"
      pdf-format="legal"
      pdf-orientation="portrait"
      pdf-content-width="mx-auto"
      @hasStartedGeneration="hasStartedGeneration()"
      @hasGenerated="hasGenerated($event)"
      ref="html2Pdf"
    >
      <section
        slot="pdf-content"
        class="mt-2 bg-white font-sans mx-auto text-black"
        style="width: 816px; height: 1280px"
      >
        <div class="mx-4 mt-4">
          <div class="text-right text-sm">CSC Form No. 6</div>
          <div class="text-right text-sm">Revised, 1984</div>
        </div>
        <div class="flex mt-6">
          <img class="mx-3 rounded-full" src="/img/logo.jpg" width="60px" />
          <div class="my-auto">
            <div class="text-sm italic mt-1">Republic of the Philippines</div>
            <div class="text-sm font-bold uppercase my-1">
              Catanduanes State University
            </div>
            <div class="text-sm italic mb-1">Virac, Catanduanes</div>
          </div>
        </div>
        <div class="mt-4">
          <div
            class="border border-b-0 border-black bg-white font-sans mx-auto text-black"
            style="width: 812px; height: 1113px"
          >
            <div class="w-full">
              <div class="h-8 border-b-one border-black">
                <div
                  class="uppercase font-bold text-center justify-center my-2"
                >
                  Application For Leave
                </div>
              </div>
            </div>
            <div class="flex">
              <div class="w-5/12">
                <div class="h-10 border-b-one border-r-one border-black">
                  <div class="uppercase text-sm ml-2">1. Agency/Office</div>
                  <div
                    class="capitalize mt-1 text-sm font-semibold text-center"
                  >
                    {{ leave.agency }}
                  </div>
                </div>
              </div>
              <div class="w-3/12">
                <div class="h-10 border-b-one border-r-one border-black">
                  <div class="uppercase text-sm ml-2">2. Last Name</div>
                  <div class="uppercase mt-1 text-sm font-semibold text-center">
                    {{ leave.last_name }}
                  </div>
                </div>
              </div>
              <div class="w-3/12">
                <div class="h-10 border-b-one border-r-one border-black">
                  <div class="uppercase text-sm mx-auto text-center">
                    First Name
                  </div>
                  <div class="uppercase mt-1 text-sm font-semibold text-center">
                    {{ leave.first_name }}
                  </div>
                </div>
              </div>
              <div class="w-1/12">
                <div class="h-10 border-b-one border-black">
                  <div class="uppercase text-sm mx-auto text-center">M.I.</div>
                  <div class="uppercase mt-1 text-sm font-semibold text-center">
                    {{ leave.middle_initial }}
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div class="w-3/12">
                <div class="h-10 border-b-one border-r-one border-black">
                  <div class="uppercase text-sm ml-2">3. Date of Filing</div>
                  <div
                    class="capitalize mt-1 text-sm font-semibold text-center"
                  >
                    {{ format(leave.date_of_filing) }}
                  </div>
                </div>
              </div>
              <div class="w-5/12">
                <div class="h-10 border-b-one border-r-one border-black">
                  <div class="uppercase text-sm ml-2">4. Position</div>
                  <div class="uppercase mt-1 text-sm font-semibold text-center">
                    {{ leave.position }}
                  </div>
                </div>
              </div>
              <div class="w-4/12">
                <div class="h-10 border-b-one border-black">
                  <div class="text-sm mx-auto text-center">
                    5. SALARY (Monthly)
                  </div>
                  <div class="uppercase mt-1 text-sm font-semibold text-center">
                    {{ currency(leave.monthly_salary) }}
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full">
              <div class="h-8 border-b-one border-black">
                <div
                  class="uppercase font-bold text-center justify-center my-2"
                >
                  Details of Application
                </div>
              </div>
            </div>
            <div class="flex">
              <div class="w-6/12">
                <div class="h-56 border-b-one border-r-one border-black">
                  <div class="text-sm ml-2">6.a. TYPE OF LEAVE</div>
                  <div class="flex mt-2">
                    <div
                      v-if="leave.type_of_leave === 'Vacation'"
                      class="text-sm ml-6"
                    >
                      🗸
                    </div>
                    <div v-else class="text-sm ml-8"></div>
                    <div
                      class="text-sm h-2 border my-auto ml-4 border-black p-1"
                    ></div>
                    <div class="text-sm ml-4">VACATION</div>
                  </div>
                  <div class="my-1 text-sm ml-20">To seek employment</div>
                  <div class="flex mt-2">
                    <div class="w-1/2 flex">
                      <div
                        v-if="
                          leave.type_of_leave === 'CTO' ||
                          leave.type_of_leave === 'FL' ||
                          leave.type_of_leave === 'SPL'
                        "
                        class="text-sm ml-6"
                      >
                        🗸
                      </div>
                      <div v-else class="text-sm ml-8"></div>
                      <div
                        class="text-sm h-2 w-2 border my-auto ml-4 border-black p-1"
                      ></div>
                      <div class="text-sm ml-4">Others (Specify)</div>
                    </div>
                    <div class="w-1/2">
                      <div
                        v-if="
                          leave.type_of_leave === 'CTO' ||
                          leave.type_of_leave === 'FL' ||
                          leave.type_of_leave === 'SPL'
                        "
                        class="border-b-one border-black text-center font-semibold text-sm mr-4"
                      >
                        {{ leave.type_of_leave }}
                      </div>
                      <div
                        v-else
                        class="border-b-one border-black text-center text-sm mr-4"
                      >
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div
                    class="ml-12 mt-4 border-b-one border-black text-center text-sm mr-4"
                  ></div>
                  <div class="flex mt-2">
                    <div
                      v-if="leave.type_of_leave === 'Sick'"
                      class="text-sm ml-6"
                    >
                      🗸
                    </div>
                    <div v-else class="text-sm ml-8"></div>
                    <div
                      class="text-sm h-2 border my-auto ml-4 border-black p-1"
                    ></div>
                    <div class="text-sm ml-4">SICK</div>
                  </div>
                  <div class="flex mt-2">
                    <div
                      v-if="leave.type_of_leave === 'Maternity'"
                      class="text-sm ml-6"
                    >
                      🗸
                    </div>
                    <div v-else class="text-sm ml-8"></div>
                    <div
                      class="text-sm h-2 border my-auto ml-4 border-black p-1"
                    ></div>
                    <div class="text-sm ml-4">MATERNITY</div>
                  </div>
                  <div class="flex mt-2">
                    <div class="w-1/2 flex">
                      <div
                        v-if="
                          leave.type_of_leave !== 'CTO' &&
                          leave.type_of_leave !== 'FL' &&
                          leave.type_of_leave !== 'SPL' &&
                          leave.type_of_leave !== 'Vacation' &&
                          leave.type_of_leave !== 'Sick' &&
                          leave.type_of_leave !== 'Maternity'
                        "
                        class="text-sm ml-6"
                      >
                        🗸
                      </div>
                      <div v-else class="text-sm ml-8"></div>
                      <div
                        class="text-sm h-2 w-2 border my-auto ml-4 border-black p-1"
                      ></div>
                      <div class="text-sm ml-4">Others (Specify)</div>
                    </div>
                    <div class="w-1/2">
                      <div
                        v-if="
                          leave.type_of_leave !== 'CTO' &&
                          leave.type_of_leave !== 'FL' &&
                          leave.type_of_leave !== 'SPL' &&
                          leave.type_of_leave !== 'Vacation' &&
                          leave.type_of_leave !== 'Sick' &&
                          leave.type_of_leave !== 'Maternity'
                        "
                        class="border-b-one border-black font-semibold text-center text-sm mr-4"
                      >
                        {{ leave.type_of_leave }}
                      </div>
                      <div
                        v-else
                        class="border-b-one border-black text-center text-sm mr-4"
                      >
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div
                    class="ml-12 mt-4 mb-2 border-b-one border-black text-center text-sm mr-4"
                  ></div>
                </div>
              </div>
              <div class="w-6/12">
                <div class="h-56 border-b-one border-black">
                  <div class="text-sm ml-2">6.b. WHERE LEAVE WILL BE SPENT</div>
                  <div class="flex mt-2">
                    <div class="text-sm ml-12">
                      1) IN CASE OF VACATION LEAVE
                    </div>
                  </div>
                  <div class="flex mt-1">
                    <div
                      v-if="
                        leave.type_of_leave === 'Vacation' &&
                        leave.vacation_leave_location ===
                          'Within the Philippines'
                      "
                      class="text-sm ml-10"
                    >
                      🗸
                    </div>
                    <div v-else class="text-sm ml-12"></div>
                    <div
                      class="text-sm h-2 border my-auto ml-4 border-black p-1"
                    ></div>
                    <div class="text-sm ml-4">Within the Philippines</div>
                  </div>
                  <div class="flex mt-2">
                    <div class="w-1/2 flex">
                      <div
                        v-if="
                          leave.type_of_leave === 'Vacation' &&
                          leave.vacation_leave_location !==
                            'Within the Philippines' &&
                          leave.vacation_leave_location !== null
                        "
                        class="text-sm ml-10"
                      >
                        🗸
                      </div>
                      <div v-else class="text-sm ml-12"></div>
                      <div
                        class="text-sm h-2 w-2 border my-auto ml-4 border-black p-1"
                      ></div>
                      <div class="text-sm ml-4">Abroad (Specify)</div>
                    </div>
                    <div class="w-1/2">
                      <div
                        v-if="
                          leave.type_of_leave === 'Vacation' &&
                          leave.vacation_leave_location !==
                            'Within the Philippines' &&
                          leave.vacation_leave_location !== null
                        "
                        class="border-b-one border-black font-semibold text-center text-sm mr-4"
                      >
                        {{ leave.vacation_leave_location }}
                      </div>
                      <div
                        v-else
                        class="border-b-one border-black text-center text-sm mr-4"
                      >
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div
                    class="ml-16 mt-4 mb-2 border-b-one border-black text-center text-sm mr-4"
                  ></div>
                  <div class="flex mt-2">
                    <div class="text-sm ml-12">2) IN CASE OF SICK LEAVE</div>
                  </div>
                  <div class="flex mt-2">
                    <div class="w-1/2 flex">
                      <div
                        v-if="
                          leave.type_of_leave === 'Sick' &&
                          leave.sick_leave_location.split(/::/)[0] ===
                            'inhospital' &&
                          leave.sick_leave_location !== null
                        "
                        class="text-sm ml-10"
                      >
                        🗸
                      </div>
                      <div v-else class="text-sm ml-12"></div>
                      <div
                        class="text-sm h-2 w-2 border my-auto ml-4 border-black p-1"
                      ></div>
                      <div class="text-sm ml-4">In Hospital (Specify)</div>
                    </div>
                    <div class="w-1/2">
                      <div
                        v-if="
                          leave.type_of_leave === 'Sick' &&
                          leave.sick_leave_location.split(/::/)[0] ===
                            'inhospital' &&
                          leave.sick_leave_location !== null
                        "
                        class="border-b-one border-black font-semibold text-center text-sm mr-4"
                      >
                        {{ leave.sick_leave_location.split(/::/)[1] }}
                      </div>
                      <div
                        v-else
                        class="border-b-one border-black text-center text-sm mr-4"
                      >
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div
                    class="ml-16 mt-4 mb-2 border-b-one border-black text-center text-sm mr-4"
                  ></div>
                  <div class="flex mt-2">
                    <div class="w-1/2 flex">
                      <div
                        v-if="
                          leave.type_of_leave === 'Sick' &&
                          leave.sick_leave_location.split(/::/)[0] ===
                            'outpatient' &&
                          leave.sick_leave_location !== null
                        "
                        class="text-sm ml-10"
                      >
                        🗸
                      </div>
                      <div v-else class="text-sm ml-12"></div>
                      <div
                        class="text-sm h-2 w-2 border my-auto ml-4 border-black p-1"
                      ></div>
                      <div class="text-sm ml-4">Out Patient (Specify)</div>
                    </div>
                    <div class="w-1/2">
                      <div
                        v-if="
                          leave.type_of_leave === 'Sick' &&
                          leave.sick_leave_location.split(/::/)[0] ===
                            'outpatient' &&
                          leave.sick_leave_location !== null
                        "
                        class="border-b-one border-black font-semibold text-center text-sm mr-4"
                      >
                        {{ leave.sick_leave_location.split(/::/)[1] }}
                      </div>
                      <div
                        v-else
                        class="border-b-one border-black text-center text-sm mr-4"
                      >
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div
                    class="ml-16 mt-4 mb-2 border-b-one border-black text-center text-sm mr-4"
                  ></div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div class="w-6/12">
                <div class="h-40 border-b-one border-r-one border-black">
                  <div class="text-sm text-center">
                    NUMBER OF WORKING DAYS APPLIED FOR:
                  </div>
                  <div
                    v-if="leave.number_of_working_days === '1'"
                    class="mt-6 mx-8 text-sm text-center font-semibold border-b-one border-black"
                  >
                    {{ leave.number_of_working_days }} day
                  </div>
                  <div
                    v-else
                    class="mt-8 mx-8 text-sm text-center font-semibold border-b-one border-black"
                  >
                    {{ leave.number_of_working_days }} days
                  </div>
                  <div class="text-sm ml-20 mt-8">
                    <div class="ml-1">INCLUSIVE DATES:</div>
                  </div>
                  <div
                    class="my-2 mx-8 text-sm text-center border-b-one border-black"
                  >
                    <div class="font-semibold">{{ dates() }}</div>
                  </div>
                </div>
              </div>
              <div class="w-6/12">
                <div class="h-40 border-b-one border-black">
                  <div class="text-sm ml-12">COMMUTATION:</div>
                  <div class="flex mt-2">
                    <div
                      v-if="leave.commutation === 'Requested'"
                      class="text-sm ml-10"
                    >
                      🗸
                    </div>
                    <div v-else class="text-sm ml-12"></div>
                    <div
                      class="text-sm h-2 border my-auto ml-4 border-black p-1"
                    ></div>
                    <div class="text-sm ml-4">Requested</div>
                  </div>
                  <div class="flex mt-2">
                    <div
                      v-if="leave.commutation === 'Not Requested'"
                      class="text-sm ml-10"
                    >
                      🗸
                    </div>
                    <div v-else class="text-sm ml-12"></div>
                    <div
                      class="text-sm h-2 border my-auto ml-4 border-black p-1"
                    ></div>
                    <div class="text-sm ml-4">Not Requested</div>
                  </div>
                  <div class="flex mt-16 mb-3">
                    <div class="w-2/5 flex">&nbsp;</div>
                    <div class="w-3/5">
                      <div
                        class="border-t-one border-black text-center text-sm mr-4"
                      >
                        (Signature of Applicant)
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full">
              <div class="h-8 border-b-one border-black">
                <div
                  class="uppercase font-bold text-center justify-center my-2"
                ></div>
              </div>
            </div>
            <div class="flex">
              <div class="w-1/2">
                <div class="h-56 border-b-one border-r-one border-black">
                  <div class="text-sm ml-2">
                    7.a. CERTIFICATION OF LEAVE CREDITS
                  </div>
                  <div class="flex justify-center mt-3">
                    <div class="w-1/5">
                      <div class="text-sm mx-auto text-right">As of</div>
                    </div>
                    <div class="w-4/5">
                      <div v-if="certification !== null"
                        class="text-sm mx-5 text-center font-semibold border-b-one border-black"
                      >
                        {{ format(certification.updated_at) }}
                      </div>
                    </div>
                  </div>
                  <div class="flex justify-center mt-8">
                    <div class="w-4/12 border-t-one border-r-one border-black">
                      <div class="text-sm text-center">Vacation</div>
                    </div>
                    <div class="w-4/12 border-t-one border-r-one border-black">
                      <div class="text-sm text-center">Sick</div>
                    </div>
                    <div class="w-4/12 border-t-one border-black">
                      <div class="text-sm text-center">Total</div>
                    </div>
                  </div>
                  <div class="flex justify-center">
                    <div class="w-4/12 border-t-one border-r-one border-black">
                      <div class="text-sm text-center font-semibold">
                        {{ totals.vacation }}
                      </div>
                    </div>
                    <div class="w-4/12 border-t-one border-r-one border-black">
                      <div class="text-sm text-center font-semibold">
                        {{ totals.sick }}
                      </div>
                    </div>
                    <div class="w-4/12 border-t-one border-black">
                      <div class="text-sm text-center font-semibold">
                        {{ total() }}
                      </div>
                    </div>
                  </div>
                  <div class="flex justify-center">
                    <div class="w-4/12 border-t-one border-r-one border-black">
                      <div class="text-sm text-center font-semibold">
                        &nbsp;
                      </div>
                    </div>
                    <div class="w-4/12 border-t-one border-r-one border-black">
                      <div class="text-sm text-center font-semibold">
                        &nbsp;
                      </div>
                    </div>
                    <div class="w-4/12 border-t-one border-black">
                      <div class="text-sm text-center font-semibold">
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div class="flex justify-center">
                    <div
                      class="w-4/12 border-t-one border-b-one border-r-one border-black"
                    >
                      <div class="text-sm text-center font-semibold">
                        &nbsp;
                      </div>
                    </div>
                    <div
                      class="w-4/12 border-t-one border-b-one border-r-one border-black"
                    >
                      <div class="text-sm text-center font-semibold">
                        &nbsp;
                      </div>
                    </div>
                    <div class="w-4/12 border-t-one border-b-one border-black">
                      <div class="text-sm text-center font-semibold">
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div
                    class="text-sm mx-12 mt-8 text-center uppercase font-semibold border-b-one border-black"
                  >
                    {{ hr.leave_hr_approving_name }}
                  </div>
                  <div class="text-sm text-center mx-12">
                    {{ hr.leave_hr_approving_position }}
                  </div>
                  <div class="text-sm text-center mx-12">
                    {{ hr.leave_hr_approving_office }}
                  </div>
                </div>
              </div>
              <div class="w-1/2">
                <div class="h-56 border-b-one border-black">
                  <div class="text-sm ml-2">7.b. RECOMMENDATION</div>

                  <div class="flex mt-1">
                    <div
                      v-if="leave.recommendation === 'Approved'"
                      class="text-sm ml-10"
                    >
                      🗸
                    </div>
                    <div v-else class="text-sm ml-12"></div>
                    <div
                      class="text-sm h-2 border my-auto ml-4 border-black p-1"
                    ></div>
                    <div class="text-sm ml-4">Approved</div>
                  </div>
                  <div class="flex mt-2">
                    <div class="w-1/2 flex">
                      <div
                        v-if="leave.recommendation === 'Disapproved'"
                        class="text-sm ml-10"
                      >
                        🗸
                      </div>
                      <div v-else class="text-sm ml-12"></div>
                      <div
                        class="text-sm h-2 w-2 border my-auto ml-4 border-black p-1"
                      ></div>
                      <div class="text-sm ml-4">Disapproved due to</div>
                    </div>
                    <div class="w-1/2">
                      <div
                        v-if="leave.recommendation === 'Disapproved'"
                        class="border-b-one border-black font-semibold text-center text-sm mr-4"
                      >
                        {{ leave.disapproved_due_to }}
                      </div>
                      <div
                        v-else
                        class="border-b-one border-black text-center text-sm mr-4"
                      >
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div
                    class="ml-16 mt-2 mb-2 border-b-one border-black text-center text-sm mr-4"
                  ></div>
                  <div
                    class="text-sm mx-12 mt-22 text-center uppercase font-semibold border-b-one border-black"
                  >
                    {{ oic.officer_in_charge }}
                  </div>
                  <div class="text-sm text-center mx-12">
                    {{ oic.officer_in_charge_position }}
                  </div>
                  <div class="text-sm text-center mx-12">
                    {{ oic.department }}
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div class="w-1/2">
                <div class="h-32 border-b-one border-r-one border-black">
                  <div class="text-sm ml-2">7.c. APPROVED FOR</div>
                  <div class="border-b-one border-black mx-8 mt-10"></div>
                  <div class="border-b-one border-black mx-8 mt-5"></div>
                  <div class="border-b-one border-black mx-8 mt-5"></div>
                </div>
              </div>
              <div class="w-1/2">
                <div class="h-32 border-b-one border-black">
                  <div class="text-sm ml-2">7.d. DISAPPROVED DUE TO</div>
                  <div class="border-b-one border-black mx-8 mt-10"></div>
                  <div class="border-b-one border-black mx-8 mt-5"></div>
                  <div class="border-b-one border-black mx-8 mt-5"></div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div class="w-full">
                <div class="h-32 border-b-one border-black">
                  <div
                    class="text-sm mx-64 mt-12 text-center uppercase font-semibold border-b-one border-black"
                  >
                    {{ hr.leave_vp_approving_name }}
                  </div>
                  <div class="text-sm text-center mx-12">(Signature)</div>
                  <div
                    class="text-sm mx-64 mt-3 text-center uppercase border-b-one border-black"
                  >
                    {{ hr.leave_vp_approving_position }}
                  </div>
                  <div class="text-sm text-center mx-12">(Position)</div>
                </div>
              </div>
            </div>
            <div class="border-b-2 border-black mt-3"></div>
            <div class="flex">
              <div class="w-4/12">
                <div class="text-sm italic text-left">CSU-F-HRM-18</div>
              </div>
              <div class="w-4/12">
                <div class="text-sm text-center italic">Rev.0</div>
              </div>
              <div class="w-4/12">
                <div class="text-sm text-right italic">
                  Effectivity Date: June 1, 2015
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </vue-html2pdf>
  </div>
</template>

<script>
import Layout from "@/Shared/Layout";
import VueHtml2pdf from "vue-html2pdf";
import moment from "moment";

export default {
  metaInfo: { title: "Leave Form" },
  layout: Layout,
  components: {
    VueHtml2pdf,
  },
  props: {
    leave: Object,
    totals: Object,
    certification: Object,
    oic: Object,
    hr: Object,
  },
  data() {
    return {
      filename: `${this.leave.first_name} ${this.leave.last_name} - ${this.leave.leave_number} - Leave Form`,
    };
  },
  methods: {
    total() {
      return this.totals.vacation + this.totals.sick;
    },
    dates() {
      let dates = [];
      this.leave.start_of_inclusive_date.forEach((date) => {
        var data = moment(String(date.date)).format("MMMM D YYYY");
        dates.push(data);
      });
      return dates.join(", ");
    },
    printPdf() {
      console.log(true);
      this.$refs.html2Pdf.generatePdf();
    },
    format(value) {
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