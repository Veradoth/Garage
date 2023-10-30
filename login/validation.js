const validation = new JustValidate("#signup"); // Crée une instance de JustValidate et l'associe à l'élément avec l'ID "signup"

validation
    .addField("#nom", [ // Ajoute un champ de validation pour l'élément avec l'ID "nom"
        {
            rule: "required" // Règle de validation : champ requis
        }
    ])
    .addField("#mail", [ // Ajoute un champ de validation pour l'élément avec l'ID "mail"
        {
            rule: "required" // Règle de validation : champ requis
        },
        {
            rule: "email" // Règle de validation : format d'email
        },
        {
            validator: (value) => () => { // Fonction de validation personnalisée pour vérifier si l'email est déjà pris
                return fetch("mail_valide.php?mail=" + encodeURIComponent(value)) // Effectue une requête fetch vers "mail_valide.php" avec l'email encodé
                        .then(function(response) { // Récupère la réponse de la requête
                            return response.json(); // Transforme la réponse en JSON
                        })
                        .then(function(json) { // Traite les données JSON
                            return json.available; // Renvoie la disponibilité de l'email (true ou false)
                        });
            },
            errorMessage: "mail déjà pris" // Message d'erreur à afficher si l'email est déjà pris
        }
    ])
    .addField("#mdp", [ // Ajoute un champ de validation pour l'élément avec l'ID "mdp"
        {
            rule: "required" // Règle de validation : champ requis
        },
        {
            rule: "password" // Règle de validation : mot de passe
        }
    ])
    .addField("#mdp_confirm", [ // Ajoute un champ de validation pour l'élément avec l'ID "mdp_confirm"
        {
            validator: (value, fields) => { // Fonction de validation personnalisée pour vérifier si les mots de passe correspondent
                return value === fields["#mdp"].elem.value; // Vérifie si la valeur du champ de confirmation est identique à celle du champ "mdp"
            },
            errorMessage: "Les mots de passes ne sont pas identiques" // Message d'erreur à afficher si les mots de passe ne correspondent pas
        }
    ])
    .onSuccess((event) => { // Fonction exécutée lorsque la validation réussit
        document.getElementById("signup").submit(); // Soumet le formulaire avec l'ID "signup"
    });
