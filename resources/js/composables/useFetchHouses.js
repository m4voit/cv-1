import {ref} from "vue";
import usePaginatorFetch from "./usePaginatorFetch.js";

export default function useFetchHouses() {
    const url = '/api/houses'
    const filter = ref({
        name: null,
        bedrooms: null,
        bathrooms: null,
        storeys: null,
        garages: null
    });
    const {error, data, paginator, isLoading} = usePaginatorFetch(url, filter);


    return {error, data, paginator, filter, isLoading}
}
