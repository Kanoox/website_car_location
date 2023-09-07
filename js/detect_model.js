$(document).ready(function() {
    // Fonction pour mettre à jour la combobox de la marque et du modèle
    function updateVehicleModels() {
        // Récupération de la classe de véhicule sélectionnée
        var vehicleCategory = $("#vehicle-category").val();

        // Envoi de la requête AJAX
        $.ajax({
            type: "POST",
            url: "../php/get_model.php",
            data: { "vehicle-category": vehicleCategory },
            dataType: "json",
            success: function(models) {
                // Réinitialisation de la combobox de la marque et du modèle
                var vehicleModelSelect = $("#vehicle-model");
                vehicleModelSelect.empty();

                // Ajout des options pour chaque modèle récupéré
                for (var i = 0; i < models.length; i++) {
                    var option = $("<option></option>");
                    option.val(models[i].id);
                    option.text(models[i].marque + " " + models[i].modele + " " + models[i].couleur + " " + models[i].annee);
                    vehicleModelSelect.append(option);
                }

                // Déclencher l'événement change manuellement pour mettre à jour l'ID avec la première valeur affichée
                vehicleModelSelect.trigger('change');
            },
            error: function(xhr, status, error) {
                // Gérer les erreurs éventuelles
                console.log("Erreur lors de la récupération des modèles de véhicule.");
            }
        });
    }

    // Écouteur d'événement pour la sélection de la classe de véhicule
    $("#vehicle-category").change(updateVehicleModels);

    // Écouteur d'événement pour la sélection du modèle de véhicule
    $("#vehicle-model").change(function() {
        var selectedModelId = $(this).val();
        $("#vehicle-id").val(selectedModelId);
        console.log("ID véhicule sélectionné :" + selectedModelId);
    });

    // Appel initial pour mettre à jour les modèles en fonction de la classe de véhicule par défaut
    updateVehicleModels();
});