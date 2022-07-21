<template>
    <div>
      <b-navbar type="is-light" spaced >
          <template #brand>
            <b-navbar-item>
                <img
                    src="https://www.remotecompany.com/assets/remote-company-logo.svg"
                    alt="The Remote Company"
                >
            </b-navbar-item>
        </template>
        <template #start>
            <b-navbar-item  href="/home" :active="activePage === 'Home'">
              <b-icon
                icon="home"
                class="mr-1"
              >
            </b-icon>Home
            </b-navbar-item>
            <b-navbar-item href="/admin" :active="activePage === 'Admin'">
                <b-icon
                icon="account"
                class="mr-2"
              >
            </b-icon>Admin
            </b-navbar-item>
        </template>
    </b-navbar>
    </div>
</template>
<script>
    export default {
        name: 'Header',
        props: ['activePage']
    }
</script>
