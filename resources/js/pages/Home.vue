<template>
    <app-layout>
        Welcome, {{ $page.props.user.name }}
    </app-layout>
</template>

<script setup>
import AppLayout from '../layouts/App.vue';

</script>