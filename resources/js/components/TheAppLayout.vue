<template>
    <BContainer>
        <BRow>
            <BCol>
                <TheAppHeader/>
            </BCol>
        </BRow>
        <BRow>
            <BCol>
                <PropertiesPage/>
            </BCol>
        </BRow>
    </BContainer>
</template>

<script>
    import TheAppHeader from "./TheAppHeader";
    import PropertiesPage from "./PropertiesPage";

    export default {
        name: "TheAppLayout",

        components: {
            TheAppHeader,
            PropertiesPage,
        }
    }
</script>
