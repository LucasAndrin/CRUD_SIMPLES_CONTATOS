<script>
import { HalfCircleSpinner } from 'epic-spinners';
export default {
    data() {
        return {
            cities: [],
            search: null,
            loading: false,
            selectedCity: null
        }
    },

    methods: {
        getCities() {
            this.loading = true;
            this.axios.get('/api/cities', {
                params: {
                    'name': this.search
                }
            }).then(response => {
                this.loading = false;
                this.cities = response.data;
            }).catch(error => {
                this.$swal.fire({
                    toast: true,
                    position: 'top-end',
                    timer: 5000,
                    timerProgressBar: true,
                    icon: 'error',
                    title: 'Oops! something went wrong!',
                    showConfirmButton: false,
                });
            });
        },

        deleteCity(index) {
            this.axios.delete('/api/cities/destroy', {
                params: {
                    'uuid': this.cities[index].uuid
                }
            }).then(response => {
                this.$swal.fire({
                    toast: true,
                    position: 'top-end',
                    timer: 5000,
                    timerProgressBar: true,
                    icon: 'success',
                    title: 'City delete with success!',
                    showConfirmButton: false,
                });
            }).catch(error => {
                this.$swal.fire({
                    toast: true,
                    position: 'top-end',
                    timer: 5000,
                    timerProgressBar: true,
                    icon: 'error',
                    title: 'Oops! something went wrong!',
                    showConfirmButton: false,
                });
            });
        }
    },

    mounted() {
        this.getCities();
    },
}
</script>

<template>
    <div>

        <div class="d-flex justify-content-between mb-3">
            <RouterLink to="/contacts/store" class="btn btn-indigo rounded-3 text-decoration-none" role="button">
                <div class="d-flex gap-1">
                    <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
                    <div class="d-none d-md-inline-block">Add city</div>
                </div>
            </RouterLink>
            <form class="input-group w-fit-content" @submit.prevent="getCities()">
                <input v-model="this.search" type="text" class="form-control border-end-0">
                <button class="btn btn-addon border-start-0 d-flex align-items-center" type="button" @click.prevent="getCities()">
                    <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 12 12"><path fill="currentColor" d="M5 1a4 4 0 1 0 2.452 7.16l2.694 2.693a.5.5 0 1 0 .707-.707L8.16 7.453A4 4 0 0 0 5 1ZM2 5a3 3 0 1 1 6 0a3 3 0 0 1-6 0Z"/></svg>
                </button>
            </form>
        </div>

        <div class="border rounded-3">
            <table class="table table-rounded table-hover mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="align-center px-3">Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(city, index) in this.cities" :key="index" v-if="this.cities.length">
                        <td class="align-center p-3">{{ city.name }}</td>
                        <td class="align-center p-3">
                            <div class="d-flex justify-content-end gap-3">
                                <svg @click="deleteCity(index)" class="cursor-pointer" height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18m-2 0v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6m3 0V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2m-6 5v6m4-6v6"/></svg>
                                <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5L2 22l1.5-5.5L17 3z"/></svg>
                            </div>
                        </td>
                    </tr>
                    <tr v-else-if="this.loading">
                        <td class="align-center px-3"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
    </div>
</template>