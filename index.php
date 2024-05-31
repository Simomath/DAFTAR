<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cahier de texte - Professeur de mathématiques</title>
</head>
<body>
    <h1>Cahier de texte - Mathématiques</h1>

    <!-- Section pour afficher les leçons -->
    <div class="lessons-list">
        <?php
        // Affichage des leçons depuis le fichier texte "lessons.txt"
        $filePath = "lessons.txt";
        if (file_exists($filePath)) {
            $lessonsContent = file_get_contents($filePath);
            $lessonsArray = explode("\n\n", $lessonsContent);

            foreach ($lessonsArray as $lessonData) {
                $lessonData = trim($lessonData);
                if (!empty($lessonData)) {
                    $lines = explode("\n", $lessonData);
                    echo '<div class="lesson">';
                    foreach ($lines as $line) {
                        echo '<div>' . htmlspecialchars($line) . '</div>';
                    }
                    echo '</div>';
                }
            }
        }
        ?>
    </div>

    <!-- Formulaire pour ajouter une nouvelle leçon -->
    <div class="add-lesson-form">
        <h2>Ajouter une nouvelle leçon</h2>
        <form method="post" action="save_lesson.php">
            <label for="lesson-date">Date :</label>
            <input type="text" id="lesson-date" name="lesson-date" placeholder="Format: AAAA-MM-JJ" required>
            
            <label for="lesson-title">Titre :</label>
            <select id="lesson-title" name="lesson-title" required>
                
                <option value="40">  Les nombres en ecriture fractionnaire</option>
<option value="1"> Operation sur les nombres en ecriture fractionnaire</option>
<option value="2">  Corréction du devoir à domicile N° 1</option>
<option value="3">  Devoir surveillé N° 1</option>
<option value="4">  Corréction du devoir surveillé  N° 1</option>
<option value="5">  Notion de géométrie</option>
<option value="6">  Inégalité triangulaire - médiatrice</option>
<option value="7">les nombres décimaux relatifs</option>
<option value="8">Addition et Soustraction des nombres relatifs</option>
<option value="9">Correction du Devoir a domicile N° 2</option>
<option value="10"> Devoir surveillé N° 2</option>
<option value="11"> Corréction du devoir surveillé  N° 2</option>
<option value="12"> Multiplication et division des nombres rationnels</option>
<option value="13">Angles - Mesures des angles d'un triangle - Triangles particuliers 
</option>
<option value="14"> Puissances  - puissances de 10</option>
<option value="15"> Bissectrice et Hauteur d'un triangle
</option>
<option value="16"> Périmetres et Surfaces</option>
<option value="17"> Correction du Devoir à domicile  N° 3</option>
<option value="18"> Devoir surveillé N°3</option>
<option value="19"> Correction du devoir surveillé N° 3
</option>
<option value="20">Support</option>
<option value="21"> Développement et Factorisation</option>
<option value="22"> Equations
</option>
<option value="23"> Symétrie centrale et Parallélogramme
</option>
<option value="24"> Correction du Devoir à domicile  N° 4
</option>
<option value="25"> 
Devoir surveillé N°4

</option>
<option value="26"> Correction du devoir surveillé N° 4
</option>
<option value="27">Parallélogramme</option>
<option value="28"> Quadrilatères particuliers
</option>
<option value="29"> Les angles formés par deux droites sécantes
</option>
<option value="30"> Correction du Devoir à domicile  N° 5
</option>
<option value="31"> Devoir surveillé N°5
</option>
<option value="32">Correction du devoir surveillé N° 5
</option>
<option value="33">Droite graduée et Repère dans le plan
</option>
<option value="34">Proportionnalité</option>
<option value="35">Cercle</option>
<option value="36">Statistique</option>
<option value="37"> Prisme droit et Cylindre
</option>
<option value="38"> Correction du Devoir à domicile  N° 6
</option>
<option value="39">Devoir surveillé N°6
</option>
<option value="41">Correction du devoir surveillé N° 6
</option>
                <!-- Ajoutez plus d'options de titre si nécessaire -->
            </select>

            <label for="lesson-subtitle">Sous-titre :</label>
            <select id="lesson-subtitle" name="lesson-subtitle" required>
                <!-- Les options pour le sous-titre seront générées dynamiquement en fonction du titre sélectionné -->
            </select>

            <label for="lesson-exercise">Exercice :</label>
            <textarea id="lesson-exercise" name="lesson-exercise" rows="4" placeholder="Exercice de la leçon" required></textarea>

            <label for="lesson-activity">Activité :</label>
            <textarea id="lesson-activity" name="lesson-activity" rows="4" placeholder="Activité de la leçon" required></textarea>
            
            <button type="submit">Ajouter la leçon</button>
        </form>
    </div>

    <!-- Lien pour exporter en PDF -->
    <div class="export-pdf">
        <a href="export_lessons.php" target="_blank">Exporter en PDF</a>
    </div>

    <script>
        // Tableau des sous-titres pour chaque titre
        const subtitlesByTitle = {
            "40": [
"I-calculs sans paranthèses :règle 1(avec des assitions et des soustractions) , exemples" ,
"I-calculs sans paranthèses :règle 2(avec des multiplications et des divisions) , exemples",
"I-calculs sans paranthèses :règle 3(avec des assitions et des soustractions et des multiplications et des divisions) , exemples",
"II-calculs avec paranthèses :règle 4",

"III-distributivité de la multiplication par rapport à l'addition et la soustraction:règle 4",
"III-distributivité de la multiplication par rapport à l'addition et la soustraction:règle 5",
                // Ajoutez plus d'options de sous-titre pour "Algèbre" si nécessaire
            ],
             "1": [
"I-addition et soustraction: règle 1 (avec même dénominateur) ;règle 2 (avec des dénominateurs différents) ",

"II-multiplication : règle 3",
"III-règles de priorité règles , exemples",

                // Ajoutez plus d'options de sous-titre pour "Géométrie" si nécessaire
            ],
            "2": [
                "Corréction du devoir à domicile N° 1",
                // Ajoutez plus d'options de sous-titre pour "Géométrie" si nécessaire
            ],
            "3": [
                "N° 1",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],

              "4": [
                "N° 1",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                "5": [
         "I-la droite : propriété 1 ",
         "II-Points alligné: Définition 1",
"III-position de deux droites dans le plan: Définition 2 ,  Définition 3 ,  Définition 4 , propriété 2 ",
 "IV-Droites perpondiculaires :Définition 5, proriété 3",
"V-Demi droite: définition 6 ",
" VI-Segement : Définition 7 ",
"VII- milieu d'un segment : définition 8",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                  "6": [
                "I- inégalité triangulaire :propriété 1 , propriété 2",

"II-médiatrice d'un segment :Définition ,propriété 3, propriété 4 ",
 "III-Médiatrice d'un triangle",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                    "7": [
                "I- les nombres décimaux relatifs : Définition 1",
"II-droite graduée: Définition 2",

"III- distance à zero d'un nombre décimal relatif : définition 3",
 " IV- nombres opposés: Définition 4",
"comparaison de deux nombres décimaux relatifs : règle 1 , règle 2 , définition 5",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                      "8": [
                "I - addition de deux nombres décimaux relatifs : règle 1;règle 2;règle 3;règle 4",
"II - soustraction de deux nombres décimaux relatifs : règle 5;règle 6",
 "III-distance entre deux points :règle 7",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                        "9": [
                "Puissances - puissances de 10",
                "Support",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                          "10": [
                "Puissances - puissances de 10",
                "Support",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                            "11": [
                "Puissances - puissances de 10",
                "Support",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],                   "12": [
 "I - produit de deux nombres décimaux relatifs  : règle 1;règle 2",
 "II - produit de plusieurs nombres décimaux relatifs :règle 3;règle 4;règle 5",
"III - quotient de deux nombres décimaux relatifs  : définition 1; quotients particuliers;règle  6(signe d'un quotient) ;remarque ; valeur approchée d'un quotient",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                "13": [
                "I-Angles : définition 1 , angles particuliers",
"II-Relation entre les angles d'un triangle  : propriété 1",
"III-triangles particuliers : triangle rectangle : définition 2;propriété 2  - triangle isocèle :définition 3;propriété 3",
"III-triangles particuliers : triangle isocèle rectangle :définition 4;propriété 4 - triangle équilatéral définition 5;propriété 5",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                  "14": [
             
"I-puissance d'un nombre décimal relatif : définition 1  ",
 "II - signe d'une puissance : règle 1",
 "III- puissances de 10 : propriété",  
 "IV- Notation scientifique d'un nombre décimal : définition 2",
"V-propriétés des puissances :règle 2(produit de deux puissances de même base);régle 3(puissance d'un produit)",

                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                    "15": [
                "I-bissectrice d'un angle : définition 1;propriété 1; propriété 2",
    " II-bissectrices d'un triangle : définition 2; propriété 3",
"III-hauteurs d'un triangle: définition 3 ; propriété 4",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                      "16": [
                "I-triangle",
 "II- carré",
"III- rectangle",
"IV-trapeze",
 "V-losange",
  "VI-parallélogramme",
    "VII-cercle",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                        "17": [
                "Puissances - puissances de 10",
                "Support",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                          "18": [
                "Puissances - puissances de 10",
                "Support",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                        "19": [
                "Puissances - puissances de 10",
                "Support",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],                 "20": [
          "Puissances - puissances de 10",
                "Support",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],                           "21": [
                "I-produit d'un nombre par une somme : régle 1",
  "II - Factorisation : règle 2",
"III- produit de deux sommes : règle 3",
"IV - Identités Remarquables : règle 4",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                                  "22": [
                "I - Equations du premier degré : définition - règle 1",
"I - Equations du premier degré : règle 2",
"II –Résolution de problème",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                                    "23": [
                "I - Symétrique d'un point",
"II - Symétrique d'un segment",
"III - Symétrique d'une demi droite ,d'une droite",
"VI - Symétrique d'une angle",
"V- Symétrique d'un cercle", 
"VI - Centre de Symétrie d'une figure",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                                      "24": [
                "Puissances - puissances de 10",
                "Support",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                                        "25": [
                "Puissances - puissances de 10",
                "Support",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                                          "26": [
                "Puissances - puissances de 10",
                "Support",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                                            "27": [
                "I - Parallélogramme : Définition 1  ; Autrement dit",
"II - propriété du parallélogramme :  propriété du diagonales ; Autrement dit",
"II - propriété du parallélogramme :  propriété des cotés ; Autrement dit",
"II - propriété du parallélogramme :  propriété des angles ; Autrement dit",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                      "28": [
                "I- Rectangle : Définition 1 ; Autrement dit ; propriété 1",
"I- Rectangle : propriété 2 ; Autrement dit ; propriété 3 ;Autrement dit",
"II - Losange : Définition 2 ; proriété 4", 
"III - Carré : Définition 4 ; remarque",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
            "29": [
                "I - Angles alternes-internes : Propriété 2 ; Autrement dit",
"II- angles correspondants : propriété 3 ; Autrement dit",
"III - Cas particulier : propriété 4 ; Autrement dit",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
               "30": [
                "N°5",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
       "31": [
                "Puissances - puissances de 10",
                "Support",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
    "32": [
                "Puissances - puissances de 10",
                "Support",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                                                        "33": [
                "I - Droite Gradueé : 1  Abscisse d'un point ; 2- Distance de deux points d'une droite graduée",
"II - Repère dans le plan : 1- construction d'un repère; 2-Coordonnées d'un point du plan",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
                                                                          "34": [
                "I - Tableau de proportionnalité : Définition 1 ; Graphique du proportionnalité",
"II - La quatrième proportionnelle : Définition 2",
"III - Echelle : Définition 3 ; Remarque",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
"35": [
                "I - Cercle : Définition 1 ; Vocabulaire",
"II - La droite et le Cercle",
"III - tangente à une Cercle : Définition 2 ; propriété 1 ; propriété 2 ;Remarque",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],

 "36": [
"I - Pourcentage : Règle1 ; exemple ; règle2 ;exemple",
"II - Statistique :  tableau d'une serie ; Vocabulaire(Population,caractère étudié ,effectif,effectif total )", 
"III - Diagramme en Batons ; Regroupement en classes ;histogramme; Diagramme Cerculaire",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ], 
                "37": [
"I - patron : Définition 3 ; exemples",
"II - Prisme droite : Définition 1 ;exemples(parallélépipède,cube)",
"III - Cylindre de révolution : Définition 2 ; exemples",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
     "38": [
                "N°6",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
     "39": [
                "N°6",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],
     "41": [
                "N°6",
                // Ajoutez plus d'options de sous-titre pour "Calcul" si nécessaire
            ],


        };

        // Fonction pour mettre à jour les options de sous-titre en fonction du titre sélectionné
        function updateSubtitles() {
            const titleSelect = document.getElementById("lesson-title");
            const subtitleSelect = document.getElementById("lesson-subtitle");
            const selectedTitle = titleSelect.value;

            // Supprimer toutes les options actuelles
            subtitleSelect.innerHTML = "";

            // Ajouter les options de sous-titre appropriées
            subtitlesByTitle[selectedTitle].forEach(subtitle => {
                const option = document.createElement("option");
                option.textContent = subtitle;
                subtitleSelect.appendChild(option);
            });
        }

        // Écouter les changements de sélection du titre et mettre à jour les options de sous-titre
        document.getElementById("lesson-title").addEventListener("change", updateSubtitles);

        // Mettre à jour les options de sous-titre initialement
        updateSubtitles();
    </script>
</body>
</html>
