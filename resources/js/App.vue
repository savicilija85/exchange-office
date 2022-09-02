<template>
    <v-app>
        <div id="MyApp">
            <v-app-bar
                color="deep-purple accent-4"
                dense
                dark
            >
                <v-toolbar-title>Exchange Office</v-toolbar-title>

                <v-spacer></v-spacer>

                <v-btn
                    color="deep-purple accent-4"
                    depressed
                    to="/"
                >
                    Exchange
                </v-btn>

                <v-btn
                    color="deep-purple accent-4"
                    depressed
                >
                    Orders
                </v-btn>

                <v-menu
                    left
                    bottom
                >
                    <template v-slot:activator="{ on, attrs }">
                        <v-btn
                            icon
                            v-bind="attrs"
                            v-on="on"
                        >
                            <v-icon>mdi-dots-vertical</v-icon>
                        </v-btn>
                    </template>

                    <v-list>
                        <v-list-item link to="/user-settings">
                            <v-list-item-title>User Settings</v-list-item-title>
                        </v-list-item>
                        <v-list-item link to="/currencies-settings">
                            <v-list-item-title>Currencies Settings</v-list-item-title>
                        </v-list-item>
                    </v-list>
                </v-menu>
            </v-app-bar>

            <router-view></router-view>
        </div>
    </v-app>
</template>

<script>

</script>
