<template>
    <div class="p-3 col-12">

        <div class="col-12 text-center">
            <h4>
                <i class="fa fa-search"></i>
            </h4>
            <h4>Filtrer les plantes :</h4>
            <hr />
        </div>

        <form>
            <div class="form-group">
                <!-- FILTRE TYPE -->
                <label for="type">Type de plantes</label>
                <select
                    name="type"
                    id="type"
                    class="form-control text-capitalize"
                    v-model="params.typeSelected"
                >
                    <option selected>choisir...</option>
                    <option value="indoor">intérieur</option>
                    <option value="outdoor">extérieur</option>
                </select>
            </div>

            <div class="form-group">
                <!-- FILTRE ENTRETIEN -->
                <label for="difficulty">Entretien</label>
                <select
                    name="difficulty"
                    id="difficulty"
                    class="form-control text-capitalize"
                    v-model="params.difficultySelected"
                >
                    <option selected>choisir...</option>
                    <option value="1">entretien facile</option>
                    <option value="2">entretien moyen</option>
                    <option value="3">entretien difficile</option>
                </select>
            </div>

            <div class="form-group">
                <!-- FILTRE EXPOSITION -->
                <label for="sunshine">Exposition</label>
                <select
                    name="sunshine"
                    id="sunshine"
                    class="form-control text-capitalize"
                    v-model="params.sunshineSelected"
                >
                    <option selected>choisir...</option>
                    <option value="1">ensoleillé</option>
                    <option value="2">moyennement ensoleillé</option>
                    <option value="3">ombre</option>
                </select>
            </div>

            <div class="form-group">
                <!-- FILTRE ARROSAGE -->
                <label for="watering">Fréquence d'arrosage</label>
                <select
                    name="watering"
                    id="watering"
                    class="form-control text-capitalize"
                    v-model="params.waterSelected"
                >
                    <option selected>choisir...</option>
                    <option value="1">arrosage fréquent</option>
                    <option value="2">arrosage occasionnel</option>
                    <option value="3">rare</option>
                </select>
            </div>

            <button
                class="btn btn-secondary"
                @click.prevent="$emit('get-params',  {
                    type: getParams(params.typeSelected),
                    water: getParams(params.waterSelected),
                    sunshine: getParams(params.sunshineSelected),
                    difficulty:  getParams(params.difficultySelected),
                    filter: true
                })"
            >Rechercher</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Filtrage",

    data() {
        return {
            params: {
                typeSelected: "choisir...",
                waterSelected: "choisir...",
                sunshineSelected: "choisir...",
                difficultySelected: "choisir..."
            }
        };
    },

    methods: {
        getParams(param) {
            if (param === "choisir...") {
                return "null";
            }

            return param;
        }
    }
};
</script>