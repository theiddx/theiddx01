<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maafkan Aku</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #FFB347, #FF8C00);
            font-family: 'Arial', sans-serif;
            overflow: hidden;
            position: relative;
            cursor: pointer;
        }

        .message {
            text-align: center;
            color: #FFF;
            font-size: 1.3em;
            padding: 0px;
            z-index: 2;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            width: 85%;
        }

        p {

            font-size: 18px;

        }

        .roses {
            position: fixed;
            bottom: -20px;
            width: 100%;
            height: 150px;
            z-index: 1;
        }

        .rose {
            animation: float 4s ease-in-out infinite;
            position: absolute;
            filter: drop-shadow(2px 4px 6px rgba(0,0,0,0.2));
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(-5deg); }
            50% { transform: translateY(-30px) rotate(5deg); }
        }
    </style>
</head>
<body>
    <div class="message">
        <h2>Puan sayang,</h2>
        <p>aku minta maaf ya udah banyak salah sama kamu. Aku mohon jangan putusin aku :(<br>🌹Kamu klik layarnya, ini ada lagunya🌹</p>
    </div>

    <div class="roses">
        <?php
        function generateRose($position) {
            return '
            <svg class="rose" style="left:'.$position.'%;width:80px;height:110px;" viewBox="0 0 80 110">
                <!-- Bunga Mawar -->
                <g transform="translate(40,50)">
                    <path fill="#FF6B35" d="M0,0 Q10,-20 20,-15 Q25,-25 35,-20 Q30,-30 25,-35 Q15,-40 0,-35 Q-15,-40 -25,-35 Q-30,-30 -35,-20 Q-25,-25 -20,-15 Q-10,-20 0,0"/>
                    <path fill="#FF7F50" d="M-15,5 Q0,-15 15,5 Q0,25 -15,5"/>
                    <path fill="#FF4500" d="M-10,10 Q0,0 10,10 Q0,20 -10,10"/>
                    <!-- Daun -->
                    <path fill="#228B22" d="M5,35 Q15,25 25,35 Q15,40 5,35" transform="rotate(30)"/>
                    <path fill="#2E8B57" d="M-5,40 Q-15,30 -25,40 Q-15,45 -5,40" transform="rotate(-20)"/>
                    <!-- Tangkai -->
                    <path stroke="#2E8B57" stroke-width="4" d="M0,25 L0,55"/>
                </g>
            </svg>';
        }
        
        // Menampilkan 5 mawar dengan posisi berbeda
        echo generateRose(5);
        echo generateRose(25);
        echo generateRose(50);
        echo generateRose(75);
        echo generateRose(95);
        ?>
    </div>

    <audio id="music" loop>
        <source src="bunga-maaf.mp3" type="audio/mpeg">
        Browser tidak mendukung audio
    </audio>

    <script>
        // Sistem audio dengan user interaction
        let audioEnabled = false;
        
        document.addEventListener('click', () => {
            if(!audioEnabled) {
                const audio = document.getElementById('music');
                audio.play();
                audioEnabled = true;
                document.body.style.cursor = 'default';
            }
        });

        // Animasi mawar dengan variasi
        document.querySelectorAll('.rose').forEach((rose, index) => {
            rose.style.animationDelay = `${index * 0.5}s`;
            rose.style.width = `${60 + Math.random() * 20}px`;
            rose.style.transform = `rotate(${Math.random() * 20 - 10}deg)`;
        });
    </script>
</body>
</html>