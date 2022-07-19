<template>
    <div>
      <b-navbar type="is-light" spaced>
          <template #brand>
            <b-navbar-item>
                <img
                    src="https://www.remotecompany.com/assets/remote-company-logo.svg"
                    alt="The Remote Company"
                >
            </b-navbar-item>
        </template>
        <template #start>
            <b-navbar-item href="/home" :active="activePage === 'Home'">
                Home
            </b-navbar-item>
            <b-navbar-item href="/admin" :active="activePage === 'Admin'">
                Admin
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
