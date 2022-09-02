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
                    v-model.number="usdAmount"
                    @keyup="calculateOrder"
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
                    @click="placeOrder"
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
                                <td class="text-left">{{ selectedCurrency }}</td>
                                <td class="text-left">{{ currentExchangeRate }}</td>
                                <td class="text-left">{{ currentSurcharge + ' %' }}</td>
                                <td class="text-left">{{ surchargeAmount}}</td>
                                <td class="text-left">{{ buyAmount }}</td>
                                <td class="text-right"><strong>{{ amountToPay }}</strong></td>
                            </tr>
                        </tbody>
                    </template>
                </v-simple-table>
            </v-col>
        </v-row>

        <v-snackbar
            v-model="showSnackbar"
            :color="snackBarColor"
            :timeout="3000"
        >
            <div
                class="text-center"
            >
                {{ snackBarMessage }}
            </div>
        </v-snackbar>

    </v-container>

</template>

<script>
    import CurrenciesAPI from "../api/CurrenciesAPI";
    import ExchangeRatesAPI from "../api/ExchangeRatesAPI";
    import CurrencySettingsAPI from "../api/CurrencySettingsAPI";
    import OrdersAPI from "../api/OrdersAPI";

    export default {
        name: "ExchangeComponent",

        data: () => ({
            usdAmount: 0,
            selectedCurrency: null,
            currentExchangeRate: 0,
            currentSurcharge: 0,
            surchargeAmount: 0,
            buyAmount: 0,
            amountToPay: 0,
            showSnackbar: false,
            snackBarMessage: '',
            snackBarColor: 'green',
            currencies: [],
            tableHeaders: [
                'Currency Purchased',
                'Exchange Rate',
                'Surcharge Percentage',
                'Amount of Surcharge',
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
                        this.calculateOrder();
                    });
                CurrencySettingsAPI.show(this.selectedCurrency)
                    .then((response) => {
                        this.currentSurcharge = response.data.surcharge;
                        this.currentDiscount = response.data.discount;
                        this.calculateOrder();
                    });
            },

            calculateOrder() {
                if(this.selectedCurrency && this.usdAmount){
                    this.buyAmount = this.usdAmount / this.currentExchangeRate;
                    this.buyAmount = Number(this.buyAmount.toFixed(2));

                    this.currentSurcharge > 0 ?
                        this.surchargeAmount = this.calculateSurchargeAmount(this.currentSurcharge, this.currentExchangeRate, this.buyAmount) :
                        this.surchargeAmount = 0;

                    this.amountToPay = this.usdAmount + this.surchargeAmount;
                }
            },

            calculateSurchargeAmount(currentSurcharge, currentExchangeRate, buyAmount){
                let value = ((currentSurcharge / 100) * currentExchangeRate) * buyAmount;
                return Number(value.toFixed(2));
            },

            placeOrder(){
                let data = {
                    code: this.selectedCurrency,
                    rate: this.currentExchangeRate,
                    surcharge_percentage: this.currentSurcharge,
                    surcharge_amount: this.surchargeAmount,
                    amount_purchased: this.buyAmount,
                    amount_paid: this.amountToPay,
                };
                OrdersAPI.store(data)
                    .then((response) => {
                        this.resetValues();
                        this.snackBarMessage = 'Order successful';
                        this.snackBarColor = 'green';
                        this.showSnackbar = true;
                    })
                    .catch((error) => {
                        this.snackBarMessage = error.response.data.message;
                        this.snackBarColor = 'red';
                        this.showSnackbar = true;
                    });
            },

            resetValues(){
                this.usdAmount = 0;
                this.selectedCurrency = null;
                this.currentExchangeRate = 0;
                this.currentSurcharge = 0;
                this.surchargeAmount = 0;
                this.currentDiscount = 0;
                this.discountAmount = 0;
                this.buyAmount = 0;
                this.amountToPay = 0;
            }

        }
    }
</script>

<style scoped>

</style>
