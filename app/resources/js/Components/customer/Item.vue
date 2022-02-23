
<template>
    <table class="table table-striped table-bordered">
        <tr  v-if="item.id"><td>{{ __('common.id') }}</td><td>#{{ item.id }}</td></tr>
        <tr>
            <td>{{ __('common.firstname') }}</td>
            <td>
                <input type="text" id="firstName" class="input" :value="item.firstName"  v-if="edit">
                <label v-if="!edit">{{ item.firstName }}</label>
            </td>
        </tr>
        <tr>
            <td>{{ __('common.lastname') }}</td>
            <td>
                <input type="text" id="lastName" class="input" :value="item.lastName"  v-if="edit">
                <label v-if="!edit">{{ item.lastName }}</label>
            </td>
        </tr>
        <tr>
            <td>{{ __('common.phone') }}</td>
            <td>
                <input type="text" id="phone" class="input" :value="item.phone"  v-if="edit">
                <label v-if="!edit">{{ item.phone }}</label>
            </td>
        </tr>
        <tr>
            <td>{{ __('common.email') }}</td>
            <td>
                <input type="text" id="email" class="input" :value="item.email"  v-if="edit">
                <label v-if="!edit">{{ item.email }}</label>
            </td>
        </tr>
        <tr>
            <td>{{ __('common.desiredBudget') }}</td>
            <td>

              <div v-if="edit">
                <input type="number" id="desiredBudget" class="input" :value="item.desiredBudget">$
              </div>

                <label v-if="!edit">{{ item.desiredBudget }}</label>
            </td>
        </tr>
        <tr>
            <td>{{ __('common.message') }}</td>
            <td>
                <textarea id="message" :value="item.message"  v-if="edit"></textarea>
                <label v-if="!edit">{{ item.message }}</label>
            </td>
        </tr>
        <tr v-if="item.id"><td>{{ __('common.created_at') }}</td><td>{{ item.created_at }}</td></tr>
        <tr v-if="item.id"><td>{{ __('common.updated_at') }}</td><td>{{ item.updated_at }}</td></tr>
    </table>
</template>
'id' => $this->id,
'' =>$this->firstName,
'' =>$this->lastName,
'' =>$this->phone,
'' =>$this->email,
'' =>$this->desiredBudget,
'' =>$this->message,
'description' => $this->description,
'created_at' => $this->created_at->format('Y-m-d H:i:s'),
'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
<script>
export default {
    props: {
        resource: {
            required: true,
            id:null,
            firstName:null,
            lastName:null,
            phone:null,
            email:null,
            desiredBudget:null,
            message:null,
            description:null,
            created_at:null,
            updated_at:null,
        },
        edit:false,
    },
    computed: {
        item: {
            get: function() {
                if (this.resource) {
                    return this.resource;
                }
                else {
                    return {
                        id:null,
                        firstName:null,
                        lastName:null,
                        phone:null,
                        email:null,
                        desiredBudget:null,
                        message:null,
                        description:null,
                        created_at:null,
                        updated_at:null,
                    }
                }
                }
            }
        }
}
</script>
