<?php
// Simple example using JSON to store game state
$gameStateFile = 'game_state.json';

if (file_exists($gameStateFile)) {
    $gameState = json_decode(file_get_contents($gameStateFile), true);
    echo json_encode($gameState);
} else {
    // Initialize new game if state file doesn't exist
    $newGameState = [
        "board" => array_fill(0, 9, " "),
        "turn" => "player1",
        "winner" => null
    ];
    file_put_contents($gameStateFile, json_encode($newGameState));
    echo json_encode($newGameState);
}
?>
