<template>
    <v-container
        class="mt-5"
    >
        <!-- FORM -->
        <v-row
            align="center"
            justify="center"
        >
            <v-col cols="4">
                <v-text-field
                    label="Enter USD Amount"
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
                    @change="getExchangeRateAndCurrencySetting"
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

        <!-- ORDER TABLE -->
        <v-row
            v-if="selectedCurrency && usdAmount"
            align="center"
            justify="center"
        >
            <v-col cols="12">
                <v-simple-table>
                    <template v-slot:default>

                        <thead>
                            <tr>
                                <th
                                    v-for="header in tableHeaders"
                                    :key="header"
                                    class="text-left"
                                >
                                    {{ header }}
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="text-right"> {{ selectedCurrency }} </td>
                                <td class="text-right"> {{ currentExchangeRate }} </td>
                                <td class="text-right"> {{ currentSurcharge + ' %' }} </td>
                                <td class="text-right"></td>
                                <td class="text-right">{{ currentDiscount + ' %'}}</td>
                                <td class="text-right"></td>
                                <td class="text-right"></td>
                                <td class="text-right"><strong></strong></td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-col>
        </v-row>

    </v-container>

</template>

<script>
    import CurrenciesAPI from "../api/CurrenciesAPI";
    import ExchangeRatesAPI from "../api/ExchangeRatesAPI";
    import CurrencySettingsAPI from "../api/CurrencySettingsAPI";

    export default {
        name: "ExchangeComponent",

        data: () => ({
            usdAmount: 0,
            selectedCurrency: null,
            currentExchangeRate: null,
            currentSurcharge: null,
            currentDiscount: null,
            currencies: [],
            tableHeaders: [
                'Currency Purchased',
                'Exchange Rate',
                'Surcharge Percentage',
                'Amount of Surcharge',
                'Discount Percentage',
                'Discount Amount',
                'Amount Purchased',
                'Amount To Pay USD',
            ],
            tableData: {

            }
        }),

        beforeCreate() {
            CurrenciesAPI.index().then((response) => {
                this.currencies = response.data.map((item) => {
                    return item.code;
                });
            });
        },

        methods: {

            getExchangeRateAndCurrencySetting(){
                ExchangeRatesAPI.show(this.selectedCurrency)
                    .then((response) => {
                        this.currentExchangeRate = response.data.rate;
                    });
                CurrencySettingsAPI.show(this.selectedCurrency)
                    .then((response) => {
                        this.currentSurcharge = response.data.surcharge;
                        this.currentDiscount = response.data.discount;
                    });
            }

        }
    }
</script>

<style scoped>

</style>
