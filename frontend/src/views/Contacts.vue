<script>
export default {
    data() {
        return {
            loading: false,
            users: []
        }
    },

    methods: {
        getContacts() {
            this.axios.get('/api/users')
            .then(response => {
                this.users = response.data;
            })
        },

        deleteContact(index) {
            this.axios.delete('/api/users/destroy', {
                params: {
                    'uuid': this.users[index].uuid
                }
            }).then(response => {
                this.users.splice(index, 1);
            })
        }
    },

    mounted() {
        this.getContacts();
    },
}
</script>

<template>
    <button class="btn btn-indigo d-flex gap-2 mb-3">
        <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
        Add contact
    </button>

    <div class="col-md-12 mx-auto">
        <div class="border rounded-3 overflow-auto">
            <table class="table">
                <thead class="bg-light">
                    <tr>
                        <td class="align-center">Name</td>
                        <td class="align-center d-none d-sm-table-cell">E-mail</td>
                        <td class="align-center d-none d-md-table-cell">Telephone</td>
                        <td class="align-center d-none d-lg-table-cell">City</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in this.users" :key="index" v-if="users.length">
                        <td class="align-center">{{ user.name }}</td>
                        <td class="align-center d-none d-sm-table-cell">{{ user.email }}</td>
                        <td class="align-center d-none d-md-table-cell">{{ user.telephone }}</td>
                        <td class="align-center d-none d-lg-table-cell">{{ user.city }}</td>
                        <td class="align-center">
                            <div class="d-flex justify-content-center gap-3">
                                <svg @click="deleteContact(index)" class="cursor-pointer" height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18m-2 0v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6m3 0V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2m-6 5v6m4-6v6"/></svg>
                                <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5L2 22l1.5-5.5L17 3z"/></svg>
                            </div>
                        </td>
                    </tr>
                    <tr v-for="i in 10" :key="i" v-else>
                        <td><div class="loading-skeleton rounded pt-4"></div></td>
                        <td><div class="loading-skeleton rounded pt-4"></div></td>
                        <td><div class="loading-skeleton rounded pt-4"></div></td>
                        <td><div class="loading-skeleton rounded pt-4"></div></td>
                        <td><div class="loading-skeleton rounded pt-4"></div></td>
                        <td><div class="loading-skeleton rounded pt-4"></div></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>