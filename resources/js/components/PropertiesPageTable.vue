<template>
    <BTable
        striped
        hover
        :show-empty="true"
        :items="properties"
        :fields="fields"
        stacked="md"
    >
        <template v-slot:cell(price)="data">
            {{ data.value | formatPrice }}
        </template>
    </BTable>
</template>

<script>
    export default {
        name: "PropertiesPageTable",

        props: {
            properties: {
                type: Array,
                required: true,
            },
        },

        filters: {
            formatPrice(value) {
                const formatter = new Intl.NumberFormat('en-US', {style: 'currency', currency: 'USD'});

                return formatter.format(value);
            },
        },

        computed: {
            fields() {
                return [
                    {
                        key: 'name',
                        sortable: true
                    },
                    {
                        key: 'price',
                        sortable: true
                    },
                    {
                        key: 'bedrooms',
                        sortable: true
                    },
                    {
                        key: 'bathrooms',
                        sortable: true
                    },
                    {
                        key: 'storeys',
                        sortable: true
                    },
                    {
                        key: 'garages',
                        sortable: true
                    },
                ];
            }
        }
    }
</script>
