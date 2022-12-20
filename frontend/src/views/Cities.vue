<script>
import { HalfCircleSpinner } from 'epic-spinners';
export default {
    components: {
        HalfCircleSpinner: HalfCircleSpinner
    },
    
    data() {
        return {
            cities: [],
            search: null,
            loading: false,
            cityName: {
                uuid: null,
                value: null,
                validation: null
            },
            selectedCity: null,
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

        createCity() {
            this.axios.post('/api/cities/store', {
                'name': this.cityName.value
            }).then(response => {
                this.$swal.fire({
                    toast: true,
                    position: 'top-end',
                    timer: 5000,
                    timerProgressBar: true,
                    icon: 'success',
                    title: 'City created with success!',
                    showConfirmButton: false,
                });
                this.cityName = {
                    value: null,
                    validation: null
                };
            }).catch(error => {
                this.cityName.validation = error.response.data.message;
            });
        },

        setCity(index) {
            this.cityName.uuid = this.cities[index].uuid;
            this.cityName.value = this.cities[index].name;
        },

        resetCity() {
            this.cityName = {
                uuid: null,
                value: null,
                validation: null
            };
        },

        updateCity() {
            this.axios.put('/api/cities/update', {
                'uuid': this.cityName.uuid,
                'name': this.cityName.value
            }).then(response => {
                this.$swal.fire({
                    toast: true,
                    position: 'top-end',
                    timer: 5000,
                    timerProgressBar: true,
                    icon: 'success',
                    title: 'City updated with success!',
                    showConfirmButton: false,
                });
                this.cityName = {
                    value: null,
                    validation: null
                };
                this.getCities();
            }).catch(error => {
                this.cityName.validation = error.response.data.message;
            })
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
                this.getCities();
            }).catch(error => {
                this.$swal.fire({
                    toast: true,
                    position: 'top-end',
                    timer: 5000,
                    timerProgressBar: true,
                    icon: 'error',
                    title: error.response.data.message,
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

        <div class="d-flex justify-content-between gap-2 mb-3">
            <button class="btn btn-indigo rounded-3 text-decoration-none" data-bs-toggle="modal" data-bs-target="#createCity" @click="resetCity()">
                <div class="d-flex gap-1">
                    <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
                    <div class="d-none d-md-inline-block">Add city</div>
                </div>
            </button>
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
                    <tr v-if="this.loading">
                        <td colspan="2" class="p-5 align-center text-indigo">
                            <HalfCircleSpinner
                                class="m-auto"
                                :animation-duration="1000"
                                :size="100"
                                color="currentColor"
                            />
                        </td>
                    </tr>
                    <tr v-for="(city, index) in this.cities" :key="index" v-else-if="this.cities.length">
                        <td class="align-center p-3">{{ city.name }}</td>
                        <td class="align-center p-3">
                            <div class="d-flex justify-content-end gap-3">
                                <a class="cursor-pointer text-decoration-none text-dark">
                                    <svg @click="deleteCity(index)" class="cursor-pointer" height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18m-2 0v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6m3 0V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2m-6 5v6m4-6v6"/></svg>
                                </a>
                                <a class="cursor-pointer text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#updateCity" @click="setCity(index)">
                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5L2 22l1.5-5.5L17 3z"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr v-else>
                        <td colspan="5" class="text-center align-center text-indigo">Nothing was found</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <form class="modal fade" id="createCity" tabindex="-1" aria-labelledby="createCityLabel" aria-hidden="true" @submit.prevent="createCity()">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createCityLabel">Add City</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input v-model="this.cityName.value" type="text" class="form-control" :class="{'is-invalid': this.cityName.validation}" placeholder="Name">
                        <div class="invalid-feedback">
                            {{ this.cityName.validation }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-indigo rounded-3 text-decoration-none" @click.prevent="createCity()">
                            <div class="d-flex gap-1">
                                <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
                                <div class="d-none d-md-inline-block">Add city</div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <form class="modal fade" id="updateCity" tabindex="-1" aria-labelledby="updateCityLabel" aria-hidden="true" @submit.prevent="updateCity()">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="updateCityLabel">Update City</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input v-model="this.cityName.value" type="text" class="form-control" :class="{'is-invalid': this.cityName.validation}" placeholder="Name">
                        <div class="invalid-feedback">
                            {{ this.cityName.validation }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-indigo rounded-3 text-decoration-none" @click.prevent="updateCity()">
                            <div class="d-flex gap-1">
                                <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
                                <div class="d-none d-md-inline-block">Update city</div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</template>