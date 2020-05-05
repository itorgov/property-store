<template>
    <BCard title="Find property for you">
        <BForm @submit.prevent="submit">
            <BContainer class="px-0" :fluid="true">
                <BRow
                    cols="1"
                    cols-md="2"
                >
                    <BCol>
                        <BFormGroup
                            label="Name:"
                            label-for="name"
                        >
                            <BFormInput
                                id="name"
                                v-model="form.name"
                                type="text"
                                lazy
                            ></BFormInput>
                        </BFormGroup>
                    </BCol>
                    <BCol>
                        <BFormGroup
                            label="Price:"
                            label-for="price"
                        >
                            <BInputGroup
                                prepend="From"
                                append="To"
                            >
                                <BFormInput
                                    id="price"
                                    v-model="form.price_from"
                                    type="number"
                                    :min="0"
                                    number
                                    lazy
                                ></BFormInput>
                                <BFormInput
                                    id="name"
                                    v-model="form.price_to"
                                    type="number"
                                    :min="0"
                                    number
                                    lazy
                                ></BFormInput>
                            </BInputGroup>
                        </BFormGroup>
                    </BCol>
                </BRow>
                <BRow
                    cols="1"
                    cols-md="2"
                >
                    <BCol>
                        <BFormGroup
                            label="Bedrooms:"
                            label-for="bedrooms"
                        >
                            <BFormInput
                                id="bedrooms"
                                v-model="form.bedrooms"
                                type="number"
                                :min="1"
                                :max="5"
                                number
                                lazy
                            ></BFormInput>
                        </BFormGroup>
                    </BCol>
                    <BCol>
                        <BFormGroup
                            label="Bathrooms:"
                            label-for="bathrooms"
                        >
                            <BFormInput
                                id="bathrooms"
                                v-model="form.bathrooms"
                                type="number"
                                :min="1"
                                :max="3"
                                number
                                lazy
                            ></BFormInput>
                        </BFormGroup>
                    </BCol>
                </BRow>
                <BRow
                    cols="1"
                    cols-md="2"
                >
                    <BCol>
                        <BFormGroup
                            label="Storeys:"
                            label-for="storeys"
                        >
                            <BFormInput
                                id="storeys"
                                v-model="form.storeys"
                                type="number"
                                :min="1"
                                :max="2"
                                number
                                lazy
                            ></BFormInput>
                        </BFormGroup>
                    </BCol>
                    <BCol>
                        <BFormGroup
                            label="Garages:"
                            label-for="garages"
                        >
                            <BFormInput
                                id="garages"
                                v-model="form.garages"
                                type="number"
                                :min="1"
                                :max="3"
                                number
                                lazy
                            ></BFormInput>
                        </BFormGroup>
                    </BCol>
                </BRow>
                <BRow>
                    <BCol>
                        <BButton
                            class="d-none d-sm-inline-block"
                            type="submit"
                            variant="primary"
                        >
                            Search
                        </BButton>
                        <BButton
                            class="d-block d-sm-none"
                            type="submit"
                            variant="primary"
                            block
                        >
                            Search
                        </BButton>
                    </BCol>
                </BRow>
            </BContainer>
        </BForm>
    </BCard>
</template>

<script>
    export default {
        name: "PropertiesPageSearchForm",

        data() {
            return {
                form: {
                    name: '',
                    price_from: '',
                    price_to: '',
                    bedrooms: '',
                    bathrooms: '',
                    storeys: '',
                    garages: '',
                }
            }
        },

        methods: {
            submit() {
                const data = {};

                Object.keys(this.form).forEach(fieldName => {
                    if (this.form[fieldName]) {
                        data[fieldName] = this.form[fieldName]
                    }
                });

                this.$emit('submit', data);
            }
        }
    }
</script>
