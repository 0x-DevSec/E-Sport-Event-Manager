<?php

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../repositories/ClubRepository.php';
require_once __DIR__ . '/../src/Entities/Club.php';

    $database = new Database(
        'localhost',
        'root',
        '',
        'club_management'
    );

    $conn = $database->connect();
    $clubRepository = new ClubRepository($conn);

    while (true) {
        echo "\n========== CLUB MENU ==========\n";
        echo "1. Add New Club\n";
        echo "2. View All Clubs\n";
        echo "3. Exit\n";
        echo "Enter your choice: ";

        $choice = trim(fgets(STDIN));

        switch ($choice) {
            case '1':
                echo "\n--- ADD NEW CLUB ---\n";

                echo "Enter club name: ";
                $nom = trim(fgets(STDIN));

                echo "Enter city: ";
                $ville = trim(fgets(STDIN));

                echo "Enter date (YYYY-MM-DD): ";
                $date = trim(fgets(STDIN));

                
                $club = new Club($nom, $ville, $date);
                $clubRepository->create($club);

                echo "Club added successfully!\n";
                break;

            case '2':
                echo "\n--- ALL CLUBS ---\n";

                $clubs = $clubRepository->findAll();

                if (empty($clubs)) {
                    echo "No clubs found.\n";
                    break;
                }

                foreach ($clubs as $club) {
                    echo "ID: {$club['id']} | "
                       . "Name: {$club['nom']} | "
                       . "City: {$club['ville']} | "
                       . "Date: {$club['date_creation']}\n";
                }
                break;

            case '3':
                echo "Goodbye!\n";
                exit;

            default:
                echo "Invalid choice. Try again.\n";
        }
    }