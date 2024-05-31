<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les données du formulaire
    $lessonDate = $_POST["lesson-date"];
    $lessonTitle = $_POST["lesson-title"];
    $lessonSubtitle = $_POST["lesson-subtitle"];
    $lessonExercise = $_POST["lesson-exercise"];
    $lessonActivity = $_POST["lesson-activity"];

    // Validation des entrées (ajoutez d'autres validations si nécessaire)
    if (!validateDate($lessonDate, 'Y-m-d')) {
        echo "La date doit être au format AAAA-MM-JJ.";
        exit;
    }

    if (empty($lessonTitle)) {
        echo "Le titre de la leçon ne peut pas être vide.";
        exit;
    }

    // Nettoyage des données (facultatif, mais recommandé pour la sécurité)
    $lessonDate = htmlspecialchars($lessonDate);
    $lessonTitle = htmlspecialchars($lessonTitle);
    $lessonSubtitle = htmlspecialchars($lessonSubtitle);
    $lessonExercise = htmlspecialchars($lessonExercise);
    $lessonActivity = htmlspecialchars($lessonActivity);

    // Chemin du fichier de stockage des leçons
    $filePath = "lessons.txt";

    // Formatage des données de la leçon
    $lessonData = "Date: " . $lessonDate . "\n";
    $lessonData .= "Titre: " . $lessonTitle . "\n";
    $lessonData .= "Sous-titre: " . $lessonSubtitle . "\n";
    $lessonData .= "Exercice: " . $lessonExercise . "\n";
    $lessonData .= "Activité: " . $lessonActivity . "\n\n";

    // Ouvrir le fichier en mode ajout (append) et écrire les données de la leçon
    file_put_contents($filePath, $lessonData, FILE_APPEND | LOCK_EX);

    // Rediriger vers la page d'accueil après avoir enregistré la leçon
    header("Location: index.php");
    exit;
}

// Fonction de validation de la date au format AAAA-MM-JJ
function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}
?>
