import { ref, reactive, watchEffect, toValue, computed } from 'vue';
import axios from "axios";

const defaultParams = {
    page: 1,
    countPages: 1,
    limit: 2,
    countItems: 0,
}
export default function usePaginatorFetch(url, params = {}) {
    const data = ref(null);
    const error = ref(null);
    const isLoading = ref(false);
    const pageParams = reactive({
        ...defaultParams
    });

    const paginator = computed(() =>{
        return {
            ...pageParams,
            hasNextPage: pageParams.countPages > pageParams.page,
            setPage(page) {
                if (Number.isInteger(page) && page > 0 && page <= pageParams.countPages) {
                    pageParams.page = page;
                }
            },
            setLimit(limit) {
                if (Number.isInteger(limit) && limit > 0 ) {
                    pageParams.limit = limit;
                }
            }
        }
    });

    const config = computed(() => {
        return {
            ...toValue(params),
            page: pageParams.page,
            limit: pageParams.limit,
        };
    });

    watchEffect(() => {
        isLoading.value = true;
        axios.get(
            url,
            {
                params: toValue(config)
            })
            .then(fetchData => {
                data.value = fetchData.data.data;
                const meta = fetchData.data.meta;
                if (meta) {
                    pageParams.countPages = meta.last_page;
                    pageParams.countItems = meta.total;
                }
            })
            .catch(e => error.value = e)
            .finally(() => isLoading.value = false)
    });


    return { data, error, isLoading, paginator }
}
