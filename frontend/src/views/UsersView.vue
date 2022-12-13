<script>
export default {
    data() {
        return {
            loading: false,
            users: []
        }
    },

    methods: {
        getUsers() {
            this.axios.get('/api/users')
            .then(response => {
                this.users = response.data;
            })
        }
    },

    mounted() {
        this.getUsers();
    },
}
</script>

<template>
    <div class="col-md-10 mx-auto mt-5">
        <table class="table table-dark table-striped rounded rounded overflow-hidden">
            <thead>
                <tr>
                    <td>Name</td>
                    <td>E-mail</td>
                    <td>Age</td>
                    <td>Sex</td>
                    <td>Telephone</td>
                    <td>City</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(users, uuid) in this.users" :key="uuid" v-if="users.length">
                    <td>{{ users.name }}</td>
                    <td>{{ users.email }}</td>
                    <td>{{ users.age }}</td>
                    <td>{{ users.sex }}</td>
                    <td>{{ users.telephone }}</td>
                    <td>{{ users.city }}</td>
                </tr>
                <tr v-for="index in 10" :key="index">
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
</template>