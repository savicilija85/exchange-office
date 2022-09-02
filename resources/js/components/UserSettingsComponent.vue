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
                    <v-card-title>User Settings</v-card-title>
                    <v-divider class="mx-4"></v-divider>
                    <br>
                    <v-list
                        dense
                    >
                        <v-list-item>
                            <v-list-item-content>
                                <v-text-field
                                    label="Email"
                                    type="text"
                                    :value="user.email"
                                    v-model="user.email"
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
                            @click="updateUser"
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
    import UsersAPI from "../api/UsersAPI";

    export default {
        name: "UserSettingsComponent",

        data: () => ({
            user: {
                email: ''
            },
            showSnackbar: false,
            snackBarColor: 'green',
            snackBarMessage: '',
            loading: false
        }),

        created() {
            this.loading = true;
            UsersAPI.show(1)
                .then((response) => {
                    this.user.email = response.data.email;
                    this.loading = false;
                })
        },

        methods: {
            updateUser(){
                this.loading = true;
                UsersAPI.update(1, this.user)
                    .then((response) => {
                        this.user.email = response.data.email;
                        this.loading = false;
                        this.snackBarMessage = 'User successfully updated';
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
