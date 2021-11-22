<template>
    <div>
        <v-data-table
            :headers="headers"
            :items="movies"
            item-key="movie_id"
            class="elevation-1"
            sort-by="name"
            loading-text="Wird geladen... Bitte warten"
        >
            <template v-slot:top>
                <v-toolbar flat>
                    <v-btn
                        color="primary"
                        dark
                        class="mb-2"
                        :to="{name:'search'}"
                    >
                        Weiteren Film suchen
                    </v-btn>
                </v-toolbar>
            </template>
            <template v-slot:item.actions="{ item }">
                <v-icon
                    small
                    @click="deleteItem(item)"
                >
                    mdi-delete
                </v-icon>
            </template>
        </v-data-table>
    </div>
</template>
<script>
export default {
    data() {
        return {
            headers: [
                {
                    text: 'Filmtitel',
                    align: 'start',
                    value: 'title',
                },
                {
                    text: 'Erscheinungsjahr',
                    value: 'year',
                },
                {text: 'Gesehen', value: 'seen'},
                {text: 'Actions', value: 'actions', sortable: false}
            ],
            movies: []
        }
    },
    created() {
        this.initialize()
    },
    methods: {
        initialize() {
            this.$http.get(
                '/api/v1.0/movies'
            ).then(response => {
                this.movies = response.data.data;
            });
        },
        deleteItem(item) {
            this.movies.splice(this.movies.indexOf(item), 1)
            this.$http.delete(
                '/api/v1.0/movies/' + item.movie_id
            );
        }
    }
};
</script>
