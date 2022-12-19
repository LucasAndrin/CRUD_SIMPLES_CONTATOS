<script>
import CreateContact from '../components/ViewContact.vue';

export default {
    components: {
        CreateContact
    },

    data() {
        return {
            loading: false,
            contacts: [],
            selectContactUuid: null,
            createContactOffcanvas: null,
            search: null
        }
    },

    methods: {
        createContact() {

        },

        getContacts(name = '') {
            this.loading = true;
            this.axios.get('/api/users', {
                params: {
                    name: name
                }
            }).then(response => {
                this.contacts = response.data;
                this.loading = false;
            })
        },

        getContact(index) {
            this.selectContactUuid = this.contacts[index].uuid
        },

        deleteContact(index) {
            this.axios.delete('/api/users/destroy', {
                params: {
                    'uuid': this.contacts[index].uuid
                }
            }).then(response => {
                this.contacts.splice(index, 1);
            })
        }
    },

    watch: {
        search() {
            this.getContacts(this.search);
        }
    },

    mounted() {
        this.getContacts();
    },
}
</script>

<template>
    <!-- <button class="btn btn-indigo d-flex gap-2 mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#createContact" aria-controls="createContact">
        <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
        <div class="d-none d-md-inline-block">Add contact</div>
    </button> -->

    <div>
        <div class="d-flex justify-content-between mb-3">
            <div class="d-flex gap-2">
                <RouterLink to="/contacts/store" class="btn btn-indigo text-decoration-none" role="button">
                    <div class="d-flex gap-1">
                        <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256"><path fill="currentColor" d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z"/></svg>
                        <div class="d-none d-md-inline-block">Add contact</div>
                    </div>
                </RouterLink>
            </div>
            <div class="input-group w-fit-content">
                <input v-model="this.search" type="text" class="form-control border-end-0" placeholder="search">
                <button class="btn btn-addon border-start-0 d-flex align-items-center" type="button">
                    <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 12 12"><path fill="currentColor" d="M5 1a4 4 0 1 0 2.452 7.16l2.694 2.693a.5.5 0 1 0 .707-.707L8.16 7.453A4 4 0 0 0 5 1ZM2 5a3 3 0 1 1 6 0a3 3 0 0 1-6 0Z"/></svg>
                </button>
            </div>
        </div>
    
        <div class="border rounded-3 overflow-auto">
            <table class="table table-hover">
                <thead class="bg-light">
                    <tr>
                        <td class="align-center px-3">Name</td>
                        <td class="align-center px-3 d-none d-sm-table-cell">E-mail</td>
                        <td class="align-center px-3 d-none d-md-table-cell">Telephone</td>
                        <td class="align-center px-3 d-none d-lg-table-cell">City</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(contact, index) in this.contacts" :key="index" v-if="this.contacts.length" @click="getContact(index)" class="cursor-pointer">
                        <td class="align-center p-3">{{ contact.name }}</td>
                        <td class="align-center p-3 d-none d-sm-table-cell">{{ contact.email }}</td>
                        <td class="align-center p-3 d-none d-md-table-cell">{{ contact.telephone }}</td>
                        <td class="align-center p-3 d-none d-lg-table-cell">{{ contact.city }}</td>
                        <td class="align-center p-3">
                            <div class="d-flex justify-content-center gap-3">
                                <svg @click="deleteContact(index)" class="cursor-pointer" height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18m-2 0v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6m3 0V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2m-6 5v6m4-6v6"/></svg>
                                <svg height="20px" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5L2 22l1.5-5.5L17 3z"/></svg>
                            </div>
                        </td>
                    </tr>
                    <tr v-for="i in 10" :key="i" v-else-if="this.loading">
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
    
        <CreateContact
            tabindex="-1"
            id="createContact"
        />
    </div>
</template>