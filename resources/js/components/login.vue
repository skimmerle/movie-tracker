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
    </div>
</template>
<script>
export default {
    data() {
        return {
            email: "",
            password: ""
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
            );
        }
    }
};
</script>
