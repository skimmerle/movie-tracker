<template>
    <div>
        <v-card
            elevation="2"
            width="300"
        >
            <v-card-title>Login</v-card-title>
            <v-card-text>
                <v-text-field
                    label="Benutzername"
                    placeholder="Benutzername"
                    v-model="email"
                    type="email"
                    solo
                ></v-text-field>
                <v-text-field
                    label="Passwort"
                    placeholder="Passwort"
                    v-model="password"
                    solo
                    type="password"
                ></v-text-field>
            </v-card-text>
            <v-card-actions class="justify-end">
                <v-btn
                    elevation="2"
                    color="primary"
                    align="right"
                    @click="login"
                >
                    Login
                </v-btn>
            </v-card-actions>
        </v-card>
        <v-snackbar
            v-model="snackbar"
        >
            {{ snackbarText }}

            <template v-slot:action="{ attrs }">
                <v-btn
                    color="red"
                    text
                    v-bind="attrs"
                    @click="snackbar = false"
                >
                    X
                </v-btn>
            </template>
        </v-snackbar>
    </div>
</template>
<script>
export default {
    data() {
        return {
            email: "steffen@schmidts.casa",
            password: "password",
            snackbar: false,
            snackbarText: ''
        };
    },
    methods: {
        login() {
            this.$http.post(
                '/login',
                {
                    email: this.email,
                    password: this.password
                }
            ).then(response => {
                Vue.prototype.$isAuthenticated = true;
                this.$router.push('/home');
            }).catch(response => {
                this.snackbarText = 'Es ist ein Fehler aufgetreten';
                this.snackbar = true;
            });
        }
    }
};
</script>
