<template>
    <v-container
        class="mt-5"
    >
        <v-row
            align="center"
            justify="center"
        >
            <v-col cols="4">
                <v-text-field
                    label="Enter Amount"
                    type="number"
                    prepend-icon="mdi-currency-usd"
                    v-model="usdAmount"
                ></v-text-field>
            </v-col>
            <v-col cols="4">
                <v-select
                    v-model="selectedCurrency"
                    :items="currencies"
                    label="Select Currency"
                    @change="getExchangeRate"
                ></v-select>
            </v-col>
            <v-col cols="2">
                <v-btn
                    color="deep-purple accent-4"
                    dark
                >
                    ORDER NOW
                </v-btn>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
    import CurrenciesAPI from "../api/CurrenciesAPI";
    import ExchangeRatesAPI from "../api/ExchangeRatesAPI";

    export default {
        name: "ExchangeComponent",

        data: () => ({
            usdAmount: 0,
            selectedCurrency: null,
            currentExchangeRate: 0,
            currencies: []
        }),

        beforeCreate() {
            CurrenciesAPI.index().then((response) => {
                this.currencies = response.data.map((item) => {
                    return item.code;
                });
            });
        },

        methods: {
            getExchangeRate(){
                ExchangeRatesAPI.show(this.selectedCurrency).then((response) => {
                    this.currentExchangeRate = response.data.rate;
                });
            }
        }
    }
</script>

<style scoped>

</style>
