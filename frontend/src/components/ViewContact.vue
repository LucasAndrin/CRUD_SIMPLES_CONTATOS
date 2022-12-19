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
            hobbies: []
        }
    },

    methods: {
        createdContact() {

        }
    }
}
</script>

<template>
    <div class="offcanvas offcanvas-500 offcanvas-end">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Add Contact</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form @submit.prevent="createContact()">

                <div class="form-floating mb-3">
                    <input v-model="this.contact.name" type="text" class="form-control" placeholder="Name">
                    <label for="floatingInput">Name</label>
                    <div class="invalid-feedback">
                        Invalid name
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input v-model="this.contact.email" type="email" class="form-control" placeholder="E-mail">
                    <label for="floatingInput">E-mail</label>
                    <div class="invalid-feedback">
                        Invalid e-mail
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input v-model="this.contact.password" type="password" class="form-control" placeholder="E-mail">
                    <label for="floatingInput">Password</label>
                    <div class="invalid-feedback">
                        Invalid password
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input v-model="this.contact.age" type="number" class="form-control" placeholder="E-mail">
                    <label for="floatingInput">Age</label>
                    <div class="invalid-feedback">
                        Invalid age
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input v-model="this.contact.telehone" type="number" class="form-control" placeholder="E-mail">
                    <label for="floatingInput">Telephone</label>
                    <div class="invalid-feedback">
                        Invalid Telephone
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <select v-model="contact.sex" class="form-select" id="floatingSelectSex">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                    <label for="floatingSelectSex">Sex</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelectCity">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelectCity">City</label>
                </div>

                <button class="btn btn-indigo d-flex gap-2 mb-3" type="submit" @click.prevent="createContact()">
                    <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
                    <div class="d-none d-md-inline-block">Add contact</div>
                </button>

            </form>
        </div>
    </div>
</template>