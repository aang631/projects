(function () {
    'use strict';

    const LEFT = 37,
        UP = 38,
        RIGHT = 39,
        DOWN = 40;

    var canvas = document.getElementById('theCanvas'),
        chompSound = document.getElementById('chompSound'),
        crashSound = document.getElementById('crashSound'),
        hissingSound = document.getElementById('hissingSound'),
        ctx = canvas.getContext('2d'),
        face,
        apple,
        snakeSize = 64,
        direction = RIGHT,
        snake = [{
            x: -64,
            y: 0
        }],
        appleX,
        appleY,
        interval,
        score = 0,
        speed = 400;

    function resizeCanvas() {
        var width = window.innerWidth - 10,
            height = window.innerHeight - 10;

        canvas.width = width - width % snakeSize;
        canvas.height = height - height % snakeSize;
    }

    window.addEventListener('resize', function () {
        resizeCanvas();
    });

    resizeCanvas();

    face = new Image();
    face.src = 'snakehead.png';

    function drawScore() {
        ctx.font = "48px cursive";
        ctx.fillStyle = 'white';
        ctx.fillText(score - 1, canvas.width - 150, 50);
        ctx.fillStyle = 'black';
        ctx.fillText(score, canvas.width - 150, 50);
    }

    function endGame() {
        clearInterval(interval);
        crashSound.play();
    }

    function increaseSpeed() {
        clearInterval(interval);
        speed -= 50;
        init();
    }

    function init() {
        interval = setInterval(function () {
            var x = 0,
                y = 0;
            switch (direction) {
                case LEFT:
                    x = -snakeSize;
                    break;
                case RIGHT:
                    x = snakeSize;
                    break;
                case UP:
                    y = -snakeSize;
                    break;
                case DOWN:
                    y = snakeSize;
                    break;
            }

            hissingSound.play();

            if (snake[0].x + x < 0 || snake[0].y + y < 0 ||
                snake[0].x + x >= canvas.width || snake[0].y + y >= canvas.height) {
                endGame();
                return;
            }

            var selfCrash = snake.find(function (element) {
                if (snake[0].x + x === element.x && snake[0].y + y === element.y) {
                    return element;
                }
            });
            if (selfCrash) {
                endGame();
                return;
            }


            if (snake[0].x + x === appleX && snake[0].y + y === appleY) {

                snake.unshift({
                    x: snake[0].x + x,
                    y: snake[0].y + y
                });
                chompSound.play();
                score++;
                drawScore();
                placeApple();
                if (score !== 0 && score % 5 === 0 && score < 26) {
                    increaseSpeed();
                }

            } else {
                if (snake.length === 1) {
                    ctx.clearRect(snake[0].x, snake[0].y, snakeSize, snakeSize);
                    snake[0].x += x;
                    snake[0].y += y;
                } else {
                    snake.unshift({
                        x: snake[0].x + x,
                        y: snake[0].y + y
                    });
                    ctx.clearRect(snake[snake.length - 1].x, snake[snake.length - 1].y, snakeSize, snakeSize);
                    snake.pop();

                }
            }
            ctx.drawImage(face, snake[0].x, snake[0].y, snakeSize, snakeSize);
            if (snake.length > 1) {
                ctx.fillStyle = "#41984F";
                ctx.fillRect(snake[1].x, snake[1].y, snakeSize, snakeSize);
            }
            drawScore();
        }, speed);
    }

    face.onload = init;

    function getRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function placeApple() {
        appleX = getRandomNumber(0, canvas.width);
        appleY = getRandomNumber(0, canvas.height);

        appleX -= appleX % snakeSize;
        appleY -= appleY % snakeSize;


        var spotTaken = snake.find(function (element) {
            if (appleX === element.x && appleY === element.y) {
                return element;
            }
        });
        if (spotTaken) {
            placeApple();
        } else {
            ctx.drawImage(apple, appleX, appleY, snakeSize, snakeSize);
        }
    }

    apple = new Image();
    apple.src = 'apple.jpg';
    apple.onload = placeApple;

    drawScore();

    window.addEventListener('keydown', function (event) {
        switch (event.keyCode) {
            case LEFT:
                if (snake.length === 1 || direction !== RIGHT) {
                    direction = event.keyCode;
                }
                break;
            case UP:
                if (snake.length === 1 || direction !== DOWN) {
                    direction = event.keyCode;

                }
                break;
            case RIGHT:
                if (snake.length === 1 || direction !== LEFT) {
                    direction = event.keyCode;

                }
                break;
            case DOWN:
                if (snake.length === 1 || direction !== UP) {
                    direction = event.keyCode;

                }
                break;
        }
    });
}());