// JavaScript Document
            const canvas = document.getElementById('gameCanvas');
            const ctx = canvas.getContext('2d');

            let player = { 
                x: 50, 
                y: 300, 
                w: 40, 
                h: 40, 
                dy: 0,  
                jump: false, 
                speed: 5,
                wingsboost: 0
            };
            const keys = {};
            const platformHeight = 10;
            const platformWidth = 120;
            const gravity = 0.8;
            let platforms = [
                { x: 0, y: 350, w: 800, h: 50 },
                { x: 200, y: 280, w: platformWidth, h: platformHeight },
                { x: 400, y: 220, w: platformWidth, h: platformHeight },
                { x: 600, y: 150, w: platformWidth, h: platformHeight }
            ];

            document.addEventListener('keydown', (e) => {
                keys[e.code] = true;

                if (e.code === 'Space' && !player.jump) {
                    player.dy = -12;
                    player.jump = true;
                    player.wingsboost = 0; // Reset wings boost on jump
                }
            });

            document.addEventListener('keyup', (e) => { keys[e.code] = false; });

            function generatePlatform(lastX) {
                const gap = Math.random() < 0.2 ? Math.random() * 200 + 150 : Math.random() * 100 + 50; // Random gap between platforms
                const height = Math.random() * 150 + 100; // Random height for the platform
                return { x: lastX + gap, y: canvas.height - height, w: platformWidth, h: platformHeight };
            }

            function update() {
                if (keys['KeyA']) player.x -= player.speed;
                if (keys['KeyD']) player.x += player.speed;

                if (keys['KeyW'] && player.wingsboost < 2) {
                    player.dy -= 0.8; // Wings boost
                    player.wingsboost++;
                }

                player.dy += gravity;
                player.y += player.dy;

                let onPlatform = false;
                for (let p of platforms) {
                    if (
                        player.x < p.x + p.w &&
                        player.x + player.w > p.x &&
                        player.y + player.h < p.y + 5 &&
                        player.y + player.h + player.dy >= p.y
                    ) {
                        player.y = p.y - player.h;
                        player.dy = 0;
                        player.jump = false;
                        player.wingsboost = 0; // Reset wings boost on landing
                        onPlatform = true;
                    }
                }

                if (player.y + player.h > canvas.height) {
                    player.x = 50; // Reset player position
                    player.y = 300; // Reset player vertical position
                    player.dy = 0;
                    player.jump = false;
                    player.wingsboost = 0; // Reset wings boost on falling
                }

                const midScreen = canvas.width / 2;
                if (player.x > midScreen) {
                    const diff = player.x - midScreen;
                    player.x = midScreen;
                    platforms.forEach(p => p.x -= diff);
                } else if (player.x < 150 && platforms[0].x < 0) {
                    const diff = 150 - player.x;
                    player.x = 150;
                    platforms.forEach(p => p.x += diff);
                }

                platforms = platforms.filter(p => p.x + p.w > 0);
                let lastX = platforms[platforms.length - 1].x;
                while (lastX < canvas.width + 200) {
                    const newP = generatePlatform(lastX);
                    platforms.push(newP);
                    lastX = newP.x;
                }
            }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = "red";
            ctx.fillRect(player.x, player.y, player.w, player.h);
            ctx.fillStyle = "green";
            platforms.forEach(p => ctx.fillRect(p.x, p.y, p.w, p.h));
        }

        function gameLoop() {
            update();
            draw();
            requestAnimationFrame(gameLoop);
        }
        gameLoop();
