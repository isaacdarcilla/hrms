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
		              ✏️ Edit {{ child.name }} Details
		            </h3>
		            <form class="w-full max-w-lg pr-4 pt-5">
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label">Name</label>
							    <input autofocus="true" class="form-input block w-full" placeholder="Enter your child name" 
							    :value="child.name"
							    />
							</div>
			            </div>
			            <div class="flex flex-wrap -mx-3 mb-6">
	    					<div class="w-full px-3">
				            	<label class="form-label">Birth Date</label>
							    <input class="form-input block w-full" placeholder="Enter your child birth date" 
							    :value="child.birthday" 
							    />
							</div>
			            </div>
			        </form>
		          </div>
		        </div>
		      </div>
		      <div class="pr-4 pb-4">
		      	<div class="bg-gray-50 px-4 pb-3 sm:px-6 sm:flex sm:flex-row-reverse">
		        <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
		          Save
		        </button>
		        <button type="button" @click="closeModal" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
		          Cancel
		        </button>
		      </div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		modal: {
            default: false,
        },
        errors: Object,
		showing:Boolean,
		child: Object,
	},
	data() {
		return {
	        name: null,
	        birthday: null,
		};
	},
	methods: {
        closeModal() { 
            this.$emit('update:modal')
        },
    },
};
</script>