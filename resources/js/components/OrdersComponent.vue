<template>
    <v-container
        class="mt-5"
    >

        <v-row
            align="center"
            justify="center"
        >
            <v-col cols="12">
                <v-data-table
                    :headers="headers"
                    :items="orders"
                    :loading="loading"
                    :options.sync="options"
                    @update:options="getOrders()"
                    :server-items-length="totalOrders"
                    class="elevation-1"
                ></v-data-table>
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
    import OrdersAPI from "../api/OrdersAPI";

    export default {
        name: "OrdersComponent",

        data: () => ({
            headers: [
                { text: 'Order ID', value: 'id' },
                { text: 'Currency', value: 'code' },
                { text: 'Exchange Rate', value: 'rate' },
                { text: 'Surcharge Percentage', value: 'surcharge_percentage' },
                { text: 'Surcharge Amount', value: 'surcharge_amount' },
                { text: 'Discount Percentage', value: 'discount_percentage' },
                { text: 'Discount Amount', value: 'discount_amount' },
                { text: 'Amount Purchased', value: 'amount_purchased' },
                { text: 'Amount Paid', value: 'amount_paid' },
                { text: 'Date Created', value: 'created_at' }
            ],
            orders: [],
            totalOrders: 0,
            options: {},
            loading: false,
            showSnackbar: false,
            snackBarColor: 'green',
            snackBarMessage: ''
        }),

        methods: {
            getOrders(){
                this.loading = true;
                OrdersAPI.index(this.options)
                    .then((response) => {
                        this.loading = false;
                        this.totalOrders = response.data.totalOrders;
                        this.orders = response.data.orders;
                    }).catch((error) => {
                    this.loading = false;
                    this.snackBarMessage = error.response.data.message;
                    this.snackBarColor = 'red';
                    this.showSnackbar = true;
                });
            }
        }
    }
</script>

<style scoped>

</style>
