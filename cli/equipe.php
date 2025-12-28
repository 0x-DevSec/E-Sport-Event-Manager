<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../repositories/EquipeRepository.php';
require_once __DIR__ . '/../src/Entities/Equipe.php';

try {
    // Database connection
    $database = new Database(
        'localhost',
        'root',
        '',
        'club_management'
    );

    $conn = $database->connect();
    $equipeRepository = new EquipeRepository($conn);

    while (true) {
        echo "\n========== EQUIPE MENU ==========\n";
        echo "1. Add New Equipe\n";
        echo "2. View All Equipes\n";
        echo "3. Exit\n";
        echo "Enter your choice: ";

        $choice = trim(fgets(STDIN));

        switch ($choice) {
            case '1':
                echo "\n--- ADD NEW EQUIPE ---\n";

                echo "Enter equipe name: ";
                $nom = trim(fgets(STDIN));

                echo "Enter game: ";
                $jeu = trim(fgets(STDIN));

                echo "Enter club ID: ";
                $clubId = (int) trim(fgets(STDIN));

                $equipe = new Equipe($nom, $jeu, $clubId);
                $equipeRepository->create($equipe);

                echo "Equipe added successfully!\n";
                break;

            case '2':
                echo "\n--- ALL EQUIPES ---\n";

                $equipes = $equipeRepository->findAll();

                if (empty($equipes)) {
                    echo "No equipes found.\n";
                    break;
                }

                foreach ($equipes as $equipe) {
                    echo "ID: {$equipe['id']} | "
                       . "Equipe: {$equipe['nom']} | "
                       . "Game: {$equipe['jeu']} | "
                       . "Club: {$equipe['club_nom']}\n";
                }
                break;

            case '3':
                echo "Goodbye!\n";
                exit;

            default:
                echo "Invalid choice. Try again.\n";
        }
    }

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
