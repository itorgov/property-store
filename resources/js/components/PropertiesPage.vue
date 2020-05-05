<template>
    <div>
        <PropertiesPageSearchForm class="mb-4" @submit="search"/>
        <PropertiesPageTable :properties="properties"/>
    </div>
</template>

<script>
    import PropertiesPageSearchForm from "./PropertiesPageSearchForm";
    import PropertiesPageTable from "./PropertiesPageTable";

    export default {
        name: "PropertiesPage",

        components: {
            PropertiesPageSearchForm,
            PropertiesPageTable,
        },

        data() {
            return {
                properties: [],
            };
        },

        created() {
            this.fetchProperties();
        },

        methods: {
            search(formData) {
                this.fetchProperties(formData);
            },

            async fetchProperties(formData = {}) {
                const response = await this.$http.get('/api/properties', {
                    params: formData,
                });

                this.properties = response.data.data;
            }
        }
    }
</script>

<style scoped>

</style>
