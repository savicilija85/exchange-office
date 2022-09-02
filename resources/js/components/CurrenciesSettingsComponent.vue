<template>
    <v-container
        class="mt-5"
    >
        <v-row
            align="center"
            justify="center"
        >
            <v-col cols="12">
                <v-card
                    class="mx-auto"
                    elevation="2"
                    outlined
                >
                    <v-card-title>EUR Currency Settings</v-card-title>
                    <v-divider class="mx-4"></v-divider>
                    <br>
                    <v-list
                        dense
                    >
                        <v-list-item>
                            <v-list-item-content>
                                <v-text-field
                                    label="EUR Discount"
                                    type="number"
                                    :value="currency_setting.discount"
                                    v-model.number="currency_setting.discount"
                                    :loading="loading"
                                    :disabled="loading"
                                ></v-text-field>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn
                            dark
                            color="deep-purple accent-4"
                            @click="updateCurrencySetting"
                            :loading="loading"
                        >
                            UPDATE
                        </v-btn>
                    </v-card-actions>
                </v-card>
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
    import CurrencySettingsAPI from "../api/CurrencySettingsAPI";

    export default {
        name: "CurrenciesSettingsComponent",

        data: () => ({
            currency_setting: {
                discount: ''
            },
            showSnackbar: false,
            snackBarColor: 'green',
            snackBarMessage: '',
            loading: false
        }),

        created() {
            this.loading = true;
            CurrencySettingsAPI.show('EUR')
                .then((response) => {
                    this.currency_setting.discount = response.data.discount;
                    this.loading = false;
                })
        },

        methods: {
            updateCurrencySetting(){
                this.loading = true;
                CurrencySettingsAPI.update('EUR', this.currency_setting)
                    .then((response) => {
                        this.currency_setting.discount = response.data.discount;
                        this.loading = false;
                        this.snackBarMessage = 'Currency setting successfully updated';
                        this.snackBarColor = 'green';
                        this.showSnackbar = true;
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
