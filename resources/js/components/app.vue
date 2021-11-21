<template>
    <div>
        <v-data-table
            :headers="headers"
            :items="movies"
            item-key="id"
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
                    value: 'name',
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
            //change with axios call
            this.$http.get(
                'v1.0/movies'
            ).then(response => {
                this.movies = response.data;
            }).catch(error => {
                console.log(error.response)
            });
            /*this.movies = [
                {
                    id: 1,
                    name: 'Frog Yogurt',
                    year: 2012,
                    seen: true,
                },
                {
                    id: 2,
                    name: 'Frozen',
                    year: 2013,
                    seen: true,
                },
                {
                    id: 3,
                    name: 'Yogurt',
                    year: 2014,
                    seen: false,
                },
                {
                    id: 4,
                    name: 'Frozed Yogurt',
                    year: 2015,
                    seen: false,
                },
            ]*/
        },
        deleteItem(item) {
            this.movies.splice(this.movies.indexOf(item), 1)
            this.$http.delete(
                'v1.0/movies/' + item.id
            );
        }
    }
};
</script>
