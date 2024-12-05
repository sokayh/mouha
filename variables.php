<?php

// Retrieving Variables Using the MySQL Client

$projectsStatement = $mysqlClient->prepare('SELECT * FROM projects');
$projectsStatement->execute();
$projects = $projectsStatement->fetchAll();

$technologies = [];
foreach ($projects as $project) { 
    $technologies[] = explode(', ', $project['technology_used']);
}

function hashPasswordWithPython($password) {
    // Construire la commande exacte
    $pythonScriptPath = __DIR__ . "/scripts/hash.py"; // Chemin absolu vers le script Python
    $command = escapeshellcmd("python $pythonScriptPath " . escapeshellarg($password));
    
    // Exécuter la commande
    $output = shell_exec($command);

    // Vérifier si la sortie est vide ou incorrecte
    if ($output === null || $output === false) {
        throw new Exception("Erreur : Impossible d'exécuter le script Python.");
    }

    // Retourner le résultat haché (trim pour éviter les espaces superflus)
    return trim($output);
}

// $string = $projects[0]['technology_used'];
// $substrings = explode(', ', $string);

// $string = foreach ($projects as $project): 
//     echo $project['technology_used'];
//     $substrings = explode(', ', $string);
//     endforeach; 




// $employees = [
//     [
//         'name' => 'Alice',
//         'departement' => 'IT',
//         'experiance' => 5,
//     ],
//     [
//         'name' => 'Maxime',
//         'departement' => 'Finance',
//         'experiance' => 2,
//     ],
//     [
//         'name' => 'Antoine',
//         'departement' => 'RH',
//         'experiance' => 4,
//     ],
// ];

?>