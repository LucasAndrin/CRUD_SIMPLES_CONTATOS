<script>
export default {
    data() {
        return {
            name: {
                value: null,
                validation: null
            },
            email: {
                value: null,
                validation: null
            },
            telephone: {
                value: null,
                validation: null
            },
            password: {
                value: null,
                validation: null
            },
            age: {
                value: null,
                validation: null
            },
            sex: {
                value: null,
                validation: null
            },
            city_uuid: {
                value: null,
                validation: null
            },
            hobbies: [],
            cities: [],
            validation: {}
        }
    },

    methods: {
        createContact() {
            this.axios.post('/api/users/store', {
                'name': this.name.value,
                'email': this.email.value,
                'telephone': this.telephone.value,
                'password': this.password.value,
                'age': this.age.value,
                'sex': this.sex.value,
                'city_uuid': this.city_uuid.value,
                'hobbies': this.hobbies
            }).then(response => {
                this.$swal.fire({
                    toast: true,
                    position: 'top-end',
                    timer: 5000,
                    timerProgressBar: true,
                    icon: 'success',
                    title: 'Contact created with success!',
                    showConfirmButton: false,
                });

                this.$router.push({ name: 'Contacts' });
            }).catch(error => {
                this.name.validation = null;
                this.email.validation = null;
                this.telephone.validation = null;
                this.password.validation = null;
                this.sex.validation = null;
                this.city_uuid.validation = null;
                this.age.validation = null;
                this.hobbies.forEach((hobby, index) => {
                    this.hobbies[index].validation = null
                });

                console.log(Object.keys(error.response.data.errors));
                let substring = '.';
                Object.keys(error.response.data.errors).forEach((key) => {
                    if (key.includes(substring)) {
                        let keys = key.split(substring)

                        this[keys[0]][keys[1]].validation = error.response.data.errors[key][0]

                        console.log(this[keys[0]][keys[1]]);
                    } else {
                        this[key].validation = error.response.data.errors[key][0]
                        console.log(this[key]);
                    }
                })
            });
        },

        createHobby(index = 0) {
            this.hobbies.splice(index + 1, 0, {
                descript: null,
                validation: null
            });
        },

        deleteHobby(index) {
            this.hobbies.splice(index, 1);
        },

        getCities() {
            this.axios.get('/api/cities')
            .then(response => {
                this.cities = response.data;
            });
        }
    },

    mounted() {
        this.getCities();
    },
}
</script>

<template>
    <form @submit.prevent="createContact()" class="col-12 mx-auto">
        <div class="row">
            <div class="col-md-4 mb-3">
                <input v-model="this.name.value" type="text" class="form-control" :class="{'is-invalid': this.name.validation}" placeholder="Name">
                <div class="invalid-feedback">
                    {{ this.name.validation }}
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <input v-model="this.email.value" type="email" class="form-control" :class="{'is-invalid': this.email.validation}" placeholder="E-mail">
                <div class="invalid-feedback">
                    {{ this.email.validation }}
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <input v-model="this.password.value" type="password" class="form-control" :class="{'is-invalid': this.password.validation}" placeholder="Password">
                <div class="invalid-feedback">
                    {{ this.password.validation }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <input v-model="this.telephone.value" type="number" class="form-control" :class="{'is-invalid': this.telephone.validation}" placeholder="Telephone">
                <div class="invalid-feedback">
                    {{ this.telephone.validation }}
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <input v-model="this.age.value" type="number" class="form-control" :class="{'is-invalid': this.age.validation}" placeholder="Age">
                <div class="invalid-feedback">
                    {{ this.age.validation }}
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <select v-model="this.city_uuid.value" class="form-select" :class="{'is-invalid': this.city_uuid.validation}">
                    <option v-for="(city, index) in this.cities" :value="city.uuid" :key="index">{{ city.name }}</option>
                </select>
                <div class="invalid-feedback">
                    {{ this.city_uuid.validation }}
                </div>
            </div>
            <div class="col-md-2">
                <select v-model="this.sex.value" class="form-select" :class="{'is-invalid': this.sex.validation}">
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
                <div class="invalid-feedback">
                    {{ this.sex.validation }}
                </div>
            </div>
        </div>

        <hr>

        <h4 class="d-flex align-items-center gap-3">
            <svg @click="createHobby()" class="cursor-pointer text-success" height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
            Hobbies
        </h4>
        <div class="d-flex align-items-center gap-3 mb-2" v-for="(hobby, index) in hobbies" :key="index">
            <input v-model="hobby.descript" type="text" class="form-control rounded-pill" :class="{'is-invalid': hobby.validation}" placeholder="Description">
            <svg @click="createHobby(index)" class="text-success cursor-pointer" height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
            <svg @click="deleteHobby(index)" class="text-danger cursor-pointer" height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg>
        </div>

        <button class="btn btn-indigo rounded-3 d-flex gap-2 mt-5" type="submit" @click.prevent="createContact()">
            <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
            <div class="d-none d-md-inline-block">Add contact</div>
        </button>
    </form>
</template>