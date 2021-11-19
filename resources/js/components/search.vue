<template>
    <div>
        <v-card
            elevation="1"
            outlined
            tile
        >
            <v-card-title>Neuen Film suchen</v-card-title>
            <v-card-text>
                <v-text-field
                    label="Filmtitel"
                    placeholder="Filmtitel"
                    v-model="title"
                    type="text"
                    solo
                ></v-text-field>
            </v-card-text>
            <v-card-actions class="justify-end">
                <v-btn
                    elevation="2"
                    align="left"
                    :to="{name:'home'}"
                >
                    Zurück
                </v-btn>
                <v-btn
                    elevation="2"
                    color="primary"
                    align="right"
                    @click="search"
                >
                    Suchen
                </v-btn>
            </v-card-actions>
            <v-data-table
                :headers="headers"
                :items="movies"
                item-key="id"
                class="elevation-1"
                sort-by="name"
                hide-default-footer
                v-if=this.movies.length> 0
                >
                <template v-slot:item.seen="{ item }">
                    <v-checkbox v-model="item.seen"></v-checkbox>
                </template>
                <template v-slot:item.actions="props">
                    <v-btn class="mx-2" fab dark small color="pink" @click="save(props.item)">
                        <v-icon dark>mdi-heart</v-icon>
                    </v-btn>
                </template>
            </v-data-table>
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
            snackbar: false,
            snackbarText: '',
            title: "",
            headers: [
                {
                    text: 'Filmtitel',
                    align: 'start',
                    value: 'name',
                },
                {
                    text: 'Erscheinungsjahr',
                    value: 'year',
                },
                {text: 'Gesehen', value: 'seen'},
                {text: 'Actions', value: 'actions', sortable: false}
            ],
            movies: [],
        };
    },
    methods: {
        search() {
            /*
            this.$http.post(
                '/v1.0/movies/search',
                {
                    title: this.title
                }
            ).then(response => {
                this.movies = response.data;
            }).catch(response => {
                this.movies = [];
            });*/
            this.movies = [
                {
                    id: 1,
                    name: 'Frog Yogurt',
                    year: 2012,
                },
                {
                    id: 2,
                    name: 'Frozen',
                    year: 2013,
                }
            ]
        },
        save(movie) {
            this.$http.post(
                '/v1.0/movies',
                movie
            ).then(response => {
                this.snackbarText = 'Film "' + movie.name + '" erfolgreich gespeichert';
                this.snackbar = true;
            }).catch(response => {
                this.snackbarText = 'Es ist ein Fehler aufgetreten';
                this.snackbar = true;
            });
        }
    }
};
</script>
