<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Kad Kahwin</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --blush-pink: #f4e4e4;
            --ivory: #fffef7;
            --gold: #d4af37;
            --gold-light: #e8d192;
            --text-dark: #5a4a42;
            --text-light: #8b7b73;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, var(--blush-pink) 0%, var(--ivory) 100%);
            color: var(--text-dark);
            overflow-x: hidden;
            position: relative;
        }

        .parallax-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 30%, rgba(212, 175, 55, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(244, 228, 228, 0.3) 0%, transparent 50%);
            z-index: 0;
            transition: transform 0.1s ease-out;
        }

        .islamic-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.03;
            z-index: 1;
            background-image: 
                repeating-linear-gradient(45deg, transparent, transparent 35px, var(--gold) 35px, var(--gold) 36px),
                repeating-linear-gradient(-45deg, transparent, transparent 35px, var(--gold) 35px, var(--gold) 36px);
            pointer-events: none;
        }

        .container {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .petal {
            position: fixed;
            width: 20px;
            height: 20px;
            background: radial-gradient(ellipse at center, rgba(244, 228, 228, 0.8) 0%, rgba(212, 175, 55, 0.3) 100%);
            border-radius: 50% 0 50% 0;
            animation: fall linear infinite;
            z-index: 1;
            pointer-events: none;
        }

        @keyframes fall {
            0% {
                transform: translateY(-10vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(110vh) rotate(360deg);
                opacity: 0;
            }
        }

        .audio-control {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 100;
            background: white;
            border: 2px solid var(--gold);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .audio-control:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.3);
        }

        .audio-icon {
            font-size: 20px;
            color: var(--gold);
        }

        .hero {
            background: white;
            border-radius: 20px;
            padding: 60px 40px;
            margin: 40px 0;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--gold), var(--gold-light), var(--gold));
        }

        .bismillah {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            color: var(--gold);
            margin-bottom: 30px;
            font-weight: 300;
        }

        .invitation-text {
            font-size: 14px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 20px;
        }

        .names {
            font-family: 'Cormorant Garamond', serif;
            font-size: 56px;
            font-weight: 600;
            color: var(--text-dark);
            margin: 30px 0;
            line-height: 1.2;
            opacity: 0;
            animation: nameReveal 1.5s ease-out 0.5s forwards;
        }

        @keyframes nameReveal {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .ampersand {
            display: block;
            font-size: 40px;
            color: var(--gold);
            margin: 10px 0;
        }

        .parents-section {
            margin: 40px 0 30px;
            padding: 30px 0;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
            border-bottom: 1px solid rgba(212, 175, 55, 0.2);
        }

        .parent-info {
            margin: 25px 0;
        }

        .parent-label {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 12px;
            font-weight: 400;
        }

        .parent-names {
            font-family: 'Cormorant Garamond', serif;
            font-size: 20px;
            color: var(--text-dark);
            margin: 5px 0;
            font-weight: 400;
        }

        .parent-divider {
            color: var(--gold);
            font-size: 24px;
            margin: 15px 0;
            opacity: 0.5;
        }

        .floral-divider {
            width: 100px;
            height: 2px;
            background: var(--gold);
            margin: 30px auto;
            position: relative;
        }

        .floral-divider::before,
        .floral-divider::after {
            content: '❋';
            position: absolute;
            color: var(--gold);
            font-size: 16px;
            top: -8px;
        }

        .floral-divider::before {
            left: -25px;
        }

        .floral-divider::after {
            right: -25px;
        }

        .details-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            margin: 30px 0;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        }

        .detail-item {
            margin: 30px 0;
            text-align: center;
        }

        .detail-icon {
            font-size: 28px;
            color: var(--gold);
            margin-bottom: 10px;
        }

        .detail-label {
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 8px;
        }

        .detail-value {
            font-size: 18px;
            color: var(--text-dark);
            font-weight: 500;
        }

        .venue-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 600;
        }

        .rsvp-section {
            text-align: center;
            margin: 40px 0;
        }

        .rsvp-button {
            background: linear-gradient(135deg, var(--gold), var(--gold-light));
            color: white;
            border: none;
            padding: 18px 50px;
            font-size: 16px;
            letter-spacing: 2px;
            text-transform: uppercase;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
            transition: all 0.3s ease;
            font-family: 'Montserrat', sans-serif;
            font-weight: 500;
        }

        .rsvp-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(212, 175, 55, 0.4);
        }

        .rsvp-button:active {
            transform: translateY(-1px);
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            z-index: 999;
            pointer-events: none;
        }

        @keyframes confettiFall {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }

        .footer {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-light);
            font-size: 14px;
        }

        .footer-text {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 40px 25px;
            }

            .names {
                font-size: 42px;
            }

            .bismillah {
                font-size: 20px;
            }

            .details-section {
                padding: 30px 20px;
            }

            .rsvp-button {
                padding: 15px 40px;
                font-size: 14px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .petal,
            .names,
            .parallax-bg {
                animation: none !important;
                transition: none !important;
            }

            .names {
                opacity: 1;
                transform: none;
            }
        }

        .message-toast {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%) translateY(100px);
            background: white;
            padding: 20px 40px;
            border-radius: 50px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            z-index: 1000;
            opacity: 0;
            transition: all 0.3s ease;
            border: 2px solid var(--gold);
        }

        .message-toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }
    </style>
</head>
<body>
    <div class="parallax-bg" id="parallaxBg"></div>
    <div class="islamic-pattern"></div>

    <div class="audio-control" id="audioControl" title="Mainkan Muzik">
        <span class="audio-icon">🎵</span>
    </div>

    <div class="container">
        <div class="hero">
            <div class="bismillah">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</div>
            <div class="invitation-text">Dengan Penuh Kesyukuran</div>
            <div class="invitation-text">Kami Menjemput Anda ke Majlis Perkahwinan</div>
            
            <div class="names">
                Nur Aisyah
                <span class="ampersand">&</span>
                Muhammad Hafiz
            </div>

            <div class="parents-section">
                <div class="parent-info">
                    <div class="parent-label">Anak Perempuan Kepada</div>
                    <div class="parent-names">Encik Ahmad bin Abdullah</div>
                    <div class="parent-names">& Puan Fatimah binti Ibrahim</div>
                </div>

                <div class="parent-divider">∘</div>

                <div class="parent-info">
                    <div class="parent-label">Anak Lelaki Kepada</div>
                    <div class="parent-names">Encik Hassan bin Omar</div>
                    <div class="parent-names">& Puan Zainab binti Mahmood</div>
                </div>
            </div>

            <div class="floral-divider"></div>
        </div>

        <div class="details-section">
            <div class="detail-item">
                <div class="detail-icon">📅</div>
                <div class="detail-label">Tarikh</div>
                <div class="detail-value">Sabtu, 15 Februari 2025</div>
            </div>

            <div class="detail-item">
                <div class="detail-icon">🕐</div>
                <div class="detail-label">Masa</div>
                <div class="detail-value">11:00 Pagi - 4:00 Petang</div>
            </div>

            <div class="detail-item">
                <div class="detail-icon">📍</div>
                <div class="detail-label">Lokasi</div>
                <div class="detail-value venue-name">Dewan Serbaguna Taman Melati</div>
                <div style="font-size: 14px; color: var(--text-light); margin-top: 8px;">
                    No. 123, Jalan Harmoni 5/2,<br>
                    Taman Melati, 53100 Kuala Lumpur
                </div>
            </div>
        </div>

        <div class="rsvp-section">
            <button class="rsvp-button" id="rsvpButton">Sahkan Kehadiran</button>
        </div>

        <div class="footer">
            <div class="footer-text">
                "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya."
            </div>
            <div style="font-size: 12px; margin-top: 10px;">
                — Surah Ar-Rum, 30:21
            </div>
        </div>
    </div>

    <div class="message-toast" id="messageToast">
        Terima kasih! Kehadiran anda disahkan ✨
    </div>

    <script>
        // Floating petals animation
        function createPetal() {
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReducedMotion) return;

            const petal = document.createElement('div');
            petal.className = 'petal';
            petal.style.left = Math.random() * 100 + 'vw';
            petal.style.animationDuration = (Math.random() * 10 + 15) + 's';
            petal.style.animationDelay = Math.random() * 5 + 's';
            petal.style.opacity = Math.random() * 0.5 + 0.3;
            document.body.appendChild(petal);

            setTimeout(() => petal.remove(), 25000);
        }

        // Create petals periodically
        setInterval(createPetal, 800);
        for (let i = 0; i < 8; i++) createPetal();

        // Parallax effect
        const parallaxBg = document.getElementById('parallaxBg');
        document.addEventListener('mousemove', (e) => {
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (prefersReducedMotion) return;

            const x = (e.clientX / window.innerWidth - 0.5) * 20;
            const y = (e.clientY / window.innerHeight - 0.5) * 20;
            parallaxBg.style.transform = `translate(${x}px, ${y}px)`;
        });

        // Audio control
        const audioControl = document.getElementById('audioControl');
        let audioPlaying = false;

        audioControl.addEventListener('click', () => {
            audioPlaying = !audioPlaying;
            const icon = audioControl.querySelector('.audio-icon');
            icon.textContent = audioPlaying ? '🔊' : '🎵';
            
            // In a real implementation, you would play/pause actual audio here
            // For example: audioElement.play() or audioElement.pause()
            console.log('Audio toggled:', audioPlaying);
        });

        // RSVP with confetti
        const rsvpButton = document.getElementById('rsvpButton');
        const messageToast = document.getElementById('messageToast');

        function createConfetti() {
            const colors = ['#f4e4e4', '#d4af37', '#e8d192', '#fff'];
            
            for (let i = 0; i < 50; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.className = 'confetti';
                    confetti.style.left = (window.innerWidth / 2 + (Math.random() - 0.5) * 200) + 'px';
                    confetti.style.top = (window.innerHeight / 2) + 'px';
                    confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.animation = `confettiFall ${Math.random() * 2 + 2}s ease-out forwards`;
                    confetti.style.transform = `translateX(${(Math.random() - 0.5) * 400}px)`;
                    
                    document.body.appendChild(confetti);
                    setTimeout(() => confetti.remove(), 4000);
                }, i * 20);
            }
        }

        rsvpButton.addEventListener('click', () => {
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            
            if (!prefersReducedMotion) {
                createConfetti();
            }

            messageToast.classList.add('show');
            rsvpButton.style.background = 'linear-gradient(135deg, #8b7b73, #a89989)';
            rsvpButton.textContent = 'Kehadiran Disahkan ✓';
            rsvpButton.disabled = true;

            setTimeout(() => {
                messageToast.classList.remove('show');
            }, 3000);
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>