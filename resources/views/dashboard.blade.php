<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - Role Pending</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #ff6b6b 0%, #ffffff 50%, #ff4757 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border-radius: 25px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 25px 50px rgba(255, 75, 87, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            max-width: 500px;
            width: 90%;
        }
        
        .icon-container {
            margin-bottom: 2rem;
        }
        
        .icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ff4757, #ff6b6b);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 15px 30px rgba(255, 75, 87, 0.3);
        }
        
        .icon::before {
            content: "⏳";
            font-size: 2rem;
        }
        
        .header-gradient {
            background: linear-gradient(135deg, #ff2626, #ff6969);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .message {
            color: #666;
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 2rem;
        }
        
        .loading-dots {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 1.5rem 0;
        }
        
        .dot {
            width: 12px;
            height: 12px;
            background: #ff4757;
            border-radius: 50%;
            margin: 0 5px;
        }
        
        .logout-btn {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 15px 35px rgba(231, 76, 60, 0.3);
        }
        
        .logout-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(231, 76, 60, 0.4);
            background: linear-gradient(45deg, #c0392b, #e74c3c);
        }
        
        .logout-btn:active {
            transform: translateY(-1px);
        }
        
        /* Clock Styles */
        .clock-section {
            margin: 2rem 0;
            padding: 1.5rem;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .clock-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            gap: 1.5rem;
        }
        
        .analog-clock {
            width: 120px;
            height: 120px;
            border: 4px solid #ff4757;
            border-radius: 50%;
            position: relative;
            background: linear-gradient(135deg, #ffffff, #ffe6e6);
            box-shadow: 0 10px 25px rgba(255, 75, 87, 0.2);
        }
        
        .clock-center {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 8px;
            height: 8px;
            background: #ff4757;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            z-index: 10;
        }
        
        .clock-hand {
            position: absolute;
            background: #ff4757;
            transform-origin: bottom center;
            border-radius: 2px;
            transition: transform 0.1s ease-in-out;
        }
        
        .hour-hand {
            width: 3px;
            height: 35px;
            top: 25px;
            left: 50%;
            margin-left: -1.5px;
        }
        
        .minute-hand {
            width: 2px;
            height: 45px;
            top: 15px;
            left: 50%;
            margin-left: -1px;
        }
        
        .second-hand {
            width: 1px;
            height: 50px;
            top: 10px;
            left: 50%;
            margin-left: -0.5px;
            background: #ff6b6b;
        }
        
        .digital-clock {
            text-align: center;
        }
        
        .digital-time {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ff4757;
            font-family: 'Courier New', monospace;
            text-shadow: 0 2px 10px rgba(255, 75, 87, 0.3);
        }
        
        .digital-date {
            font-size: 0.9rem;
            color: #666;
            margin-top: 0.5rem;
        }
        
        @media (max-width: 600px) {
            .container {
                padding: 2rem;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .message {
                font-size: 1rem;
            }
            
            .clock-container {
                flex-direction: column;
            }
            
            .analog-clock {
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon-container">
            <div class="icon"></div>
        </div>
        
        <h1 class="header-gradient">Role Pending</h1>
        
        <div class="clock-section">
            <div class="clock-container">
                <div class="analog-clock" id="analogClock">
                    <div class="clock-center"></div>
                    <div class="clock-hand hour-hand" id="hourHand"></div>
                    <div class="clock-hand minute-hand" id="minuteHand"></div>
                    <div class="clock-hand second-hand" id="secondHand"></div>
                </div>
                <div class="digital-clock">
                    <div class="digital-time" id="digitalTime">00:00:00</div>
                    <div class="digital-date" id="digitalDate">Loading...</div>
                </div>
            </div>
        </div>
        
        <div class="message">
            Wait until someone assigns you a role or try to login after sometime
        </div>
        
        <div class="loading-dots">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                Logout
            </button>
        </form>
    </div>

    <script>
        function updateClocks() {
            const now = new Date();
            
            // Digital Clock
            const digitalTime = document.getElementById('digitalTime');
            const digitalDate = document.getElementById('digitalDate');
            
            const timeString = now.toLocaleTimeString('en-US', { 
                hour12: false,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            
            const dateString = now.toLocaleDateString('en-US', {
                weekday: 'short',
                month: 'short',
                day: 'numeric'
            });
            
            if (digitalTime) digitalTime.textContent = timeString;
            if (digitalDate) digitalDate.textContent = dateString;
            
            // Analog Clock
            const hourHand = document.getElementById('hourHand');
            const minuteHand = document.getElementById('minuteHand');
            const secondHand = document.getElementById('secondHand');
            
            const hours = now.getHours() % 12;
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            
            const hourDegree = (hours * 30) + (minutes * 0.5);
            const minuteDegree = minutes * 6;
            const secondDegree = seconds * 6;
            
            if (hourHand) hourHand.style.transform = `rotate(${hourDegree}deg)`;
            if (minuteHand) minuteHand.style.transform = `rotate(${minuteDegree}deg)`;
            if (secondHand) secondHand.style.transform = `rotate(${secondDegree}deg)`;
        }
        
        // Update clocks immediately and then every second
        updateClocks();
        setInterval(updateClocks, 1000);
    </script>
</body>
</html>
