<template>
    <houses-filter v-model="filter" :is-loading="isLoading"/>
    <houses-list :data="data" :paginator="paginator" :is-loading="isLoading" />
</template>

<script setup>
import HousesList from "./HousesList.vue";
import useFetchHouses from "../composables/useFetchHouses";
import HousesFilter from "./HousesFilter.vue";

const {data, filter, paginator, isLoading} = useFetchHouses();

</script>
