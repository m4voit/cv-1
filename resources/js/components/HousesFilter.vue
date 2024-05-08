<template>
    <div>
        <el-form
            v-model="form"
            label-position="top"
            ref="formRef"
        >
            <el-row gutter="12">
                <el-col :xs="24" :sm="12" >
                    <el-form-item label="Name">
                        <el-input v-model="form.name" />
                    </el-form-item>
                </el-col>
                <el-col :xs="24" :sm="12" >
                    <el-form-item label="Price">
                        <div class="price">
                            <el-input v-model="form.price_from" placeholder="From"/>
                            <el-input v-model="form.price_to"placeholder="To" />
                        </div>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-row gutter="12">
                <el-col :xs="12" :sm="6">
                    <el-form-item label="Bedrooms">
                        <el-select
                            v-model="form.bedroom"
                            clearable
                        >
                            <el-option
                                v-for="(i, idx) in 4"
                                :key="idx"
                                :value="i"
                            />
                        </el-select>
                    </el-form-item>
                </el-col>
                <el-col :xs="12" :sm="6">
                    <el-form-item label="Bathrooms">
                        <el-select
                            v-model="form.bathroom"
                            clearable
                        >
                            <el-option
                                v-for="(i, idx) in 4"
                                :key="idx"
                                :value="i"
                            />
                        </el-select>
                    </el-form-item>
                </el-col>
                <el-col :xs="12" :sm="6">
                    <el-form-item label="Storeys">
                        <el-select
                            v-model="form.storey"
                            clearable
                        >
                            <el-option
                                v-for="(i, idx) in 4"
                                :key="idx"
                                :value="i"
                            />
                        </el-select>
                    </el-form-item>
                </el-col>
                <el-col :xs="12" :sm="6">
                    <el-form-item label="Garages">
                        <el-select
                            v-model="form.garage"
                            clearable
                        >
                            <el-option
                                v-for="(i, idx) in 4"
                                :key="idx"
                                :value="i"
                            />
                        </el-select>
                    </el-form-item>
                </el-col>
            </el-row>
            <el-row justify="end">
                <el-form-item>
                    <el-button
                        color="green"
                        :disabled="isLoading"
                        @click="applyForm"
                    >
                        Filter
                    </el-button>
                    <el-button
                        @click="resetForm"
                    >
                        Reset
                    </el-button>
                </el-form-item>
            </el-row>
        </el-form>
    </div>
</template>

<script setup>
import {ref, watchEffect} from "vue";

    const filter = defineModel({
        type: Object
    })

    const { isLoading } = defineProps({
        isLoading: Boolean
    })

    const form = ref({...filter.value});
    const resetForm = () => {
        Object.keys(form.value).forEach(k => {
            form.value[k] = null;
        })
        applyForm();
    }
    const applyForm = () => {
        filter.value = {...form.value}
    }
</script>
<style scoped>
    .price {
        display: flex;
        justify-content: space-between;
        gap: 16px;
        width: 100%;
    }
</style>
