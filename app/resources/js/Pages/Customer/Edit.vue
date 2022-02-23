<template>
    <div class="pb-4">
        <div class="card">

            <div class="card-body" >

                <div class="flex-none sm:w-full md:w-2/3">
                    <customer-item :edit="true" :resource="resource"></customer-item>
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
        getResource() {
            axios.get(route('api.customer.show', { customer: this.id }))
                .then(response => {
                    this.resource = response.data.data;
                })
                . catch(errors => {
                    console.log(errors);
                });

        },
        back() {
            this.$router.back();
        },
        save(){
                axios.put(
                    route('api.customer.edit',{customer:this.resource.id}),
                    {
                      firstName: document.getElementById("firstName").value,
                      lastName: document.getElementById("lastName").value,
                      phone: document.getElementById("phone").value,
                      email: document.getElementById("email").value,
                      desiredBudget: document.getElementById("desiredBudget").value,
                      message: document.getElementById("message").value,
                    }
                )
                    .then(response => {
                        alert(__('common.the_record_is_updated'));
                        this.$router.push({name:'index'});
                    })
                    . catch(errors => {
                        console.log(errors);
                        alert(__('common.the_record_is_not_updated')+ ':'+errors.message);
                    });

        }
    },

    created() {
        this.id = this.$route.params.vulnerability;

        this.getResource();
    },

}
</script>
