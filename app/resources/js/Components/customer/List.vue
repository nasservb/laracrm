<template>
    <div class="card">
        <table class="table table-striped table-hovered">
            <thead>
                <th>#</th>
                <th>{{__('common.firstName')}}</th>
                <th>{{__('common.lastName')}}</th>
                <th>{{__('common.website')}}</th>
                <th>{{__('common.message')}}</th>
                <th>{{__('common.view')}}</th>
                <th>{{__('common.edit')}}</th>
                <th>{{__('common.delete')}}</th>
            </thead>
            <tr v-for="item in response.data">
               <td>{{item.id}}</td>
               <td>{{item.firstName}}</td>
               <td>{{item.lastName}}</td>
               <td>{{item.website}}</td>
               <td>{{ item.message.substr(0,100)+'...' }}</td>
                <td>
                    <button class="btn btn-light icon" @click="$emit('show', item)">
                        <i class="fe fe-eye" aria-hidden="true"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-blue icon" @click="$emit('edit', item)">
                        <i class="fe fe-edit" aria-hidden="true"></i>
                    </button>
                </td>
                <td>
                    <button class="btn btn-red icon" @click="$emit('remove', item)">
                        <i class="fe fe-delete" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    props: {
        response:{}
    },
    methods:{

    }

}
</script>
