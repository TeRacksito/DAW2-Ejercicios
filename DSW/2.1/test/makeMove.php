<?php
$gameStateFile = 'game_state.json';

// Load current game state
$gameState = json_decode(file_get_contents($gameStateFile), true);

$index = $_POST['index'];

// Ensure the move is valid and it's the player's turn
if ($gameState['board'][$index] === ' ' && !$gameState['winner']) {
    $gameState['board'][$index] = $gameState['turn'] === 'player1' ? 'X' : 'O';
    $gameState['turn'] = $gameState['turn'] === 'player1' ? 'player2' : 'player1';
    
    // Check if there is a winner after the move
    $winningCombinations = [
        [0, 1, 2], [3, 4, 5], [6, 7, 8],  // Rows
        [0, 3, 6], [1, 4, 7], [2, 5, 8],  // Columns
        [0, 4, 8], [2, 4, 6]              // Diagonals
    ];

    foreach ($winningCombinations as $combo) {
        if ($gameState['board'][$combo[0]] !== ' ' &&
            $gameState['board'][$combo[0]] === $gameState['board'][$combo[1]] &&
            $gameState['board'][$combo[1]] === $gameState['board'][$combo[2]]) {
            $gameState['winner'] = $gameState['board'][$combo[0]] === 'X' ? 'player1' : 'player2';
            break;
        }
    }

    // Save updated game state
    file_put_contents($gameStateFile, json_encode($gameState));
}

echo json_encode($gameState);
?>
