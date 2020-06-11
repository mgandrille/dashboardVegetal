<template>
    <div class="container">

        <div class="container my-5">
            <h4 class="my-3"><i class="fa fa-search"></i> Filtrer les plantes :</h4>
        </div>
        
        <form action="#" method="post">
            <div class="form-row">

                <div class="form-group mx-2 my-4">   <!-- FILTRE TYPE -->
                    <label for="type">Type de plantes</label>
                    <select name="type" id="type" class="form-control text-capitalize">
                        <option selected>choisir...</option>
                        <option value="indoor">intérieur</option>
                        <option value="outdoor">extérieur</option>
                    </select>
                </div>

                <div class="form-group mx-2 my-4">   <!-- FILTRE ENTRETIEN -->
                    <label for="difficulty">Entretien</label>
                    <select name="difficulty" id="difficulty" class="form-control text-capitalize">
                        <option selected>choisir...</option>
                        <option value="1">entretien facile</option>
                        <option value="2">entretien moyen</option>
                        <option value="3">entretien difficile</option>
                    </select>
                </div>

                <div class="form-group mx-2 my-4">   <!-- FILTRE EXPOSITION -->
                    <label for="sunshine">Exposition</label>
                    <select name="sunshine" id="sunshine" class="form-control text-capitalize">
                        <option selected>choisir...</option>
                        <option value="1">ensoleillé</option>
                        <option value="2">moyennement ensoleillé</option>
                        <option value="3">ombre</option>
                    </select>
                </div>

                <div class="form-group mx-2 my-4">   <!-- FILTRE ARROSAGE -->
                    <label for="watering">Fréquence d'arrosage</label>
                    <select name="watering" id="watering" class="form-control text-capitalize">
                        <option selected>choisir...</option>
                        <option value="1">arrosage fréquent</option>
                        <option value="2">arrosage occasionnel</option>
                        <option value="3">rare</option>
                    </select>
                </div>

            </div>
        </form>

    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>