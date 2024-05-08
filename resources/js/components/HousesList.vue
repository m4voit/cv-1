<template>
    <div>
        <el-table :data="data" v-loading="isLoading">
            <el-table-column prop="name" label="Name" />
            <el-table-column prop="price" label="Price" />
            <el-table-column prop="bedroom" label="Bedrooms" />
            <el-table-column prop="bathroom" label="Bathrooms" />
            <el-table-column prop="storey" label="Storeys" />
            <el-table-column prop="garage" label="Garages" />
        </el-table>
        <el-pagination
            class="paginator"
            layout="prev, pager, next, sizes"
            :page-count="paginator.countPages"
            :page-size="paginator.limit"
            :page-sizes="[1, 2, 5]"
            :disabled="isLoading"
            @change="paginator.setPage"
            @size-change="paginator.setLimit"
        />
    </div>
</template>

<script setup>
    const {data, paginator, isLoading} = defineProps({
        data: Array,
        paginator: Object,
        isLoading: Boolean
    })
</script>
<style scoped>
    .paginator {
        display: flex;
        justify-content: flex-end;
        margin-top: 12px;
    }
</style>
