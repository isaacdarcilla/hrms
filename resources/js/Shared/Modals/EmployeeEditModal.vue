<template>
	<div v-if="showing">
		<div class="fixed z-10 inset-0 overflow-y-auto">
		  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
		    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
		      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
		    </div>
		    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
		    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-4 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
		      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
		        <div>
		          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
		            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
		              ✏️ Edit {{ employee.first_name }} Personal Information
		            </h3>
		            <form class="w-full max-w-lg pr-4 pt-5">
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">First Name</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter first name" 
							    v-model="form.first_name"
							    />
							    <div v-if="$page.errors.first_name !== null" class="form-error">{{ $page.errors.first_name }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Last Name</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter last name" v-model="form.last_name"
							    />
							    <div v-if="$page.errors.last_name !== null" class="form-error">{{ $page.errors.last_name }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Middle Name</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter middle name" v-model="form.middle_name"
							    />
							    <div v-if="$page.errors.middle_name !== null" class="form-error">{{ $page.errors.middle_name }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Name Extension <span class="font-medium">(Optional)</span></label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter name extension" v-model="form.name_extension"
							    />
							    <div v-if="$page.errors.name_extension !== null" class="form-error">{{ $page.errors.name_extension }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Email Address</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter email address" v-model="form.email"
							    /> 
							    <div v-if="$page.errors.email !== null" class="form-error">{{ $page.errors.email }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Phone</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter phone number" v-model="form.phone" v-mask="'###########'" type="tel" 
							    />
							    <div v-if="$page.errors.phone !== null" class="form-error">{{ $page.errors.phone }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Telephone <span class="font-medium">(Optional)</span></label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter telephone number" v-model="form.telephone"
							    />
							    <div v-if="$page.errors.telephone !== null" class="form-error">{{ $page.errors.telephone }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Department</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter department" v-model="form.department"
							    /> 
							    <div v-if="$page.errors.department !== null" class="form-error">{{ $page.errors.department }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Position</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter position" v-model="form.position"
							    />
							    <div v-if="$page.errors.position !== null" class="form-error">{{ $page.errors.position }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Status of Appointment</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter status of appointment" v-model="form.status_of_appointment"
							    />
							    <div v-if="$page.errors.status_of_appointment !== null" class="form-error">{{ $page.errors.status_of_appointment }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Sex</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter sex" v-model="form.sex"
							    />
							    <div v-if="$page.errors.sex !== null" class="form-error">{{ $page.errors.sex }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Height in Centimeters</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter height in centimeters" v-model="form.height"
							    />
							    <div v-if="$page.errors.height !== null" class="form-error">{{ $page.errors.height }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Weight in Kilograms</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter weight in kilograms" v-model="form.weight"
							    />
							    <div v-if="$page.errors.weight !== null" class="form-error">{{ $page.errors.weight }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Blood Type</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter blood type" v-model="form.blood_type"
							    />
							    <div v-if="$page.errors.blood_type !== null" class="form-error">{{ $page.errors.blood_type }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">GSIS Identification <span class="font-medium">(Optional)</span></label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter GSIS identification" v-model="form.gsis_id" v-mask="'###########'" type="tel" 
							    />
							    <div v-if="$page.errors.gsis_id !== null" class="form-error">{{ $page.errors.gsis_id }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">SSS Identification <span class="font-medium">(Optional)</span></label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter SSS identification" v-model="form.sss_id" v-mask="'##########'" type="tel" 
							    />
							    <div v-if="$page.errors.sss_id !== null" class="form-error">{{ $page.errors.sss_id }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Pagibig Identification <span class="font-medium">(Optional)</span></label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter Pagibig identification" v-model="form.pagibig_id" v-mask="'############'" type="tel" 
							    />
							    <div v-if="$page.errors.pagibig_id !== null" class="form-error">{{ $page.errors.pagibig_id }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">TIN Identification <span class="font-medium">(Optional)</span></label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter TIN identification" v-model="form.tin_id" v-mask="'#########'" type="tel" 
							    />
							    <div v-if="$page.errors.tin_id !== null" class="form-error">{{ $page.errors.tin_id }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">PhilHealth Identification <span class="font-medium">(Optional)</span></label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter PhilHealth identification" v-model="form.philhealth_id" v-mask="'############'" type="tel" 
							    />
							    <div v-if="$page.errors.philhealth_id !== null" class="form-error">{{ $page.errors.philhealth_id }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Agency Employee Identification <span class="font-medium">(Optional)</span></label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter agency employee identification" v-model="form.agency_employee_id"
							    />
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Civil Status</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter civil status" v-model="form.civil_status"
							    />
							    <div v-if="$page.errors.civil_status !== null" class="form-error">{{ $page.errors.civil_status }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Birth Date</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter birth date" v-model="form.birth_date" type="tel" v-mask="'##/##/####'"
							    />
							    <div v-if="$page.errors.birth_date !== null" class="form-error">{{ $page.errors.birth_date }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Birth Place</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter birth place" v-model="form.birth_place"
							    />
							    <div v-if="$page.errors.birth_place !== null" class="form-error">{{ $page.errors.birth_place }}</div>
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label font-bold">Citizenship</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter citizenship" v-model="form.citizenship"
							    />
							    <div v-if="$page.errors.citizenship !== null" class="form-error">{{ $page.errors.citizenship }}</div>
							</div>
			            </div>
			        </form>
		          </div>
		        </div>
		      </div>
		      <div class="pr-4 pb-4">
		      	<div class="bg-gray-50 px-4 pb-3 sm:px-6 sm:flex sm:flex-row-reverse">
		        <button :disabled="sending" @click.prevent="save" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm hover:bg-yellow-700">
		          {{ sending ? "Saving..." : "Save" }}
		        </button>
		        <button :disabled="sending" type="button" @click="closeModal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
		          Close
		        </button>
		      </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</template>

<script>
import { mask } from 'vue-the-mask';

export default {
	props: {
		modal: {
            default: false,
        },
        errors: Object,
		showing: Boolean,
		employee: Object,
	},
	directives: { mask },
	data() { 
		return {
			sending: false,
			form: {
				first_name: this.employee.first_name,
				middle_name: this.employee.middle_name,
				last_name: this.employee.last_name,
				name_extension: this.employee.name_extension,
				email: this.employee.email,
				phone: this.employee.phone,
				telephone: this.employee.telephone,
				department: this.employee.department,
				position: this.employee.position,
				status_of_appointment: this.employee.status_of_appointment,
				sex: this.employee.sex,
				height: this.employee.height,
				weight: this.employee.weight,
				birth_date: this.employee.birth_date,
				birth_place: this.employee.birth_place,
				blood_type: this.employee.blood_type,
				gsis_id: this.employee.gsis_id,
				sss_id: this.employee.sss_id,
				philhealth_id: this.employee.philhealth_id,
				agency_employee_id: this.employee.agency_employee_id,
				tin_id: this.employee.tin_id,
				pagibig_id: this.employee.pagibig_id,
				tin_id: this.employee.tin_id,
				birth_place: this.employee.birth_place,
				civil_status: this.employee.civil_status,
				citizenship: this.employee.citizenship,
			},
		};
	},
	methods: {
		save() {
			this.$inertia.post(
                this.route("employees.update", this.employee.id), this.form, {
                    onStart: () => (this.sending = true),
                    onFinish: () => (this.sending = false)
                }
            );
		},
        closeModal() { 
            this.$emit('update:modal');
        },
    },
};
</script>