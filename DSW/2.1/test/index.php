<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tic-Tac-Toe</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .board {
            display: grid;
            grid-template-columns: repeat(3, 100px);
        }

        .cell {
            width: 100px;
            height: 100px;
            text-align: center;
            font-size: 40px;
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <h1>Tic-Tac-Toe</h1>
    <div id="board" class="board">
        <!-- Cells for Tic-Tac-Toe -->
        <div class="cell" data-index="0"></div>
        <div class="cell" data-index="1"></div>
        <div class="cell" data-index="2"></div>
        <div class="cell" data-index="3"></div>
        <div class="cell" data-index="4"></div>
        <div class="cell" data-index="5"></div>
        <div class="cell" data-index="6"></div>
        <div class="cell" data-index="7"></div>
        <div class="cell" data-index="8"></div>
    </div>

    <script>
        function updateBoard() {
            $.getJSON("getGameState.php", function(data) {
                // Update the board with the new game state
                data.board.forEach((value, index) => {
                    $('#board .cell').eq(index).text(value);
                });

                if (data.winner) {
                    alert(data.winner + " wins!");
                    clearInterval(gameInterval); // Stop polling when the game ends
                }
            });
        }

        $('#board .cell').click(function() {
            var index = $(this).data('index');
            $.post("makeMove.php", {
                index: index
            }, function(response) {
                updateBoard();
            });
        });

        // Polling the server every 2 seconds to check for game state changes
        var gameInterval = setInterval(updateBoard, 2000);

        // Initial board load
        updateBoard();
    </script>

</body>

</html>