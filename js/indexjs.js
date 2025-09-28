// JavaScript Document

    const mainVideo = document.getElementById('mainVideo');
    const popup = document.getElementById('videoPopup');
    const popupVideoBox = document.getElementById('popupVideoBox');
    const content = document.getElementById('mainContent');
    const modeBtn = document.getElementById('modeToggle');
    const videoContainer = document.getElementById('videoContainer');

    function updateDateTime() {
        const now = new Date();
        const timeOptions = { hour: '2-digit', minute: '2-digit', hour12: true, timeZone: 'Asia/Manila' };
        const dayOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', timeZone: 'Asia/Manila' };

        document.getElementById('sidebar-time').textContent = now.toLocaleString('en-PH', timeOptions);
        document.getElementById('sidebar-day').textContent = now.toLocaleString('en-PH', dayOptions);
    }
    setInterval(updateDateTime, 60000);
    updateDateTime();

    function updateWelcome() {
        const hours = new Date().getHours();
        let greeting = "✦ Welcome";
        if(hours >= 5 && hours < 12) greeting = "Good Morning";
        else if(hours >= 12 && hours < 18) greeting = "Good Afternoon";
        else greeting = "Good Evening";
        document.getElementById('welcomeMsg').textContent = greeting;
    }
    updateWelcome();

    let totalMinutes = 0;
    function updateChrono() {
        totalMinutes++;
        const h = Math.floor(totalMinutes/60);
        const m = totalMinutes%60;
        document.getElementById('chrono').textContent = h>0 ? `Chrono: ${h}h ${m}m` : `Chrono: ${m}m`;
    }
    setInterval(updateChrono, 60000);
    updateChrono();

    function updateMOTD() {
        const today = new Date().toLocaleString('en-PH', { weekday: 'long', timeZone: 'Asia/Manila' }).toLowerCase();

        document.querySelectorAll('.verse-box').forEach(box => box.classList.remove('active'));
        
        const todayBox = document.querySelector(`.verse-box.${today}`);
        
        if  (todayBox) { 
            todayBox.classList.add('active');
        } else {
            console.log(`No verse box found for ${today}`);
        }   
    }

updateMOTD();

    mainVideo.muted = false;
    mainVideo.addEventListener('click', () => {
        popup.style.display = 'flex';
        content.style.filter = 'blur(5px)';

        popupVideoBox.appendChild(mainVideo);
        
        mainVideo.play();
        mainVideo.controls = true;
    });
    
    popup.addEventListener('click', () => {
        popup.style.display = 'none';
        content.style.filter = 'none';

        videoContainer.appendChild(mainVideo);

        mainVideo.play();
        mainVideo.controls = true;
    });

    modeBtn.addEventListener('click', () => {
        document.body.classList.toggle('light-mode');
        modeBtn.textContent = document.body.classList.contains('light-mode') ? '🌞' : '🌙';
    });
