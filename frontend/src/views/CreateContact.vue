<script>
export default {
    data() {
        return {
            contact: {
                name: null,
                email: null,
                telephone: null,
                password: null,
                age: null,
                sex: null,
                city: null
            },
            hobbies: [],
            cities: []
        }
    },

    methods: {
        createdContact() {
            axios.post('/api/users/store', {
                'contact': this.contact,
                'hobbies': this.hobbies
            }).then(response => {

            }).catch(error => {

            });
        },

        createHobby(index = 0) {
            this.hobbies.splice(index, 0, {
                descript: null
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
    <form @submit.prevent="createContact()" class="col-12">
        <div class="row mt-1 mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input v-model="this.contact.name" type="text" class="form-control" placeholder="Name">
                    <label for="floatingInput">Name</label>
                    <div class="invalid-feedback">
                        Invalid name
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input v-model="this.contact.email" type="email" class="form-control" placeholder="E-mail">
                    <label for="floatingInput">E-mail</label>
                    <div class="invalid-feedback">
                        Invalid e-mail
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input v-model="this.contact.password" type="password" class="form-control" placeholder="E-mail">
                    <label for="floatingInput">Password</label>
                    <div class="invalid-feedback">
                        Invalid password
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input v-model="this.contact.age" type="number" class="form-control" placeholder="E-mail">
                    <label for="floatingInput">Age</label>
                    <div class="invalid-feedback">
                        Invalid age
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input v-model="this.contact.telehone" type="number" class="form-control" placeholder="E-mail">
                    <label for="floatingInput">Telephone</label>
                    <div class="invalid-feedback">
                        Invalid Telephone
                    </div>
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="form-floating">
                    <select v-model="contact.sex" class="form-select" id="floatingSelectSex">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                    <label for="floatingSelectSex">Sex</label>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelectCity">
                        <option v-for="(city, index) in this.cities" :value="city.uuid" :key="index">{{ city.name }}</option>
                    </select>
                    <label for="floatingSelectCity">City</label>
                </div>
            </div>
        </div>

        <h4 class="d-flex align-items-center gap-3">
            <button class="btn btn-success" @click="createHobby()">
                <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
            </button>
            Hobbies
        </h4>

        <div class="d-flex flex-row gap-3 mb-3" v-for="(hobby, index) in hobbies" :key="index">
            <div class="form-floating">
                <input v-model="hobby.name" type="text" class="form-control" placeholder="Name">
                <label for="floatingInput">Name</label>
                <div class="invalid-feedback">
                    Invalid name
                </div>
            </div>
            <button class="btn btn-success" @click="createHobby(index)">
                <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
            </button>
            <button class="btn btn-danger" @click="deleteHobby(index)">
                <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"/></svg>
            </button>
        </div>

        <button class="btn btn-indigo d-flex gap-2" type="submit" @click.prevent="createContact()">
            <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
            <div class="d-none d-md-inline-block">Add contact</div>
        </button>

    </form>
</template>