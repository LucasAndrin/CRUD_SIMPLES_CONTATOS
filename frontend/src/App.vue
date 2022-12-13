<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Your Site</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <RouterLink to="/" class="nav-link">Contacts</RouterLink>
          <a class="nav-link" href="#">Cities</a>
        </div>
      </div>
    </div>
  </nav>

  <main class="overflow-auto container-vh-100">

    <div class="container-fluid">
      <RouterView/>
    </div>
  </main>
</template>
