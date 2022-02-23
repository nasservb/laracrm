<template>
    <div class="pb-4">
        <div class="card">

            <div class="card-body" >

                <div class="flex-none sm:w-full md:w-2/3">
                    <customer-item :edit="true" :resource="null"></customer-item>
                </div>
            </div>
        </div>

        <button @click="back()" class="btn btn-gray">{{__('layouts.back')}}</button>
        <button @click="save()" class="btn btn-blue">{{__('common.save')}}</button>

    </div>

</template>

<script>

export default {
    data() {
        return {
            id: null,
            resource: {},
        }
    },

    methods: {
        back() {
            this.$router.back();
        },
        save(){
            axios.post(
                route('api.customer.create'),{
                  firstName: document.getElementById("firstName").value,
                  lastName: document.getElementById("lastName").value,
                  phone: document.getElementById("phone").value,
                  email: document.getElementById("email").value,
                  desiredBudget: document.getElementById("desiredBudget").value,
                  message: document.getElementById("message").value,
                })
                .then(response => {
                    alert(__('common.the_record_is_created'));
                    this.$router.push({name:'index'});
                })
                . catch(errors => {
                    console.log(errors);
                    alert(__('common.the_record_is_not_created')+ ':'+errors.message);
                });

        }
    },
}
</script>
