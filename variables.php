<?php

// Retrieving Variables Using the MySQL Client

$projectsStatement = $mysqlClient->prepare('SELECT * FROM projects');
$projectsStatement->execute();
$projects = $projectsStatement->fetchAll();

$technologies = [];
foreach ($projects as $project) { 
    $technologies[] = explode(', ', $project['technology_used']);
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