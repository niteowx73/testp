<?php
// Отримуємо User-Agent
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Посилання для приватного каналу
$telegramInvite = "tg://join?invite=eo8iW_92pmcxOWQy"; // Спеціальна схема для додатка Telegram
$telegramWebLink = "https://t.me/+eo8iW_92pmcxOWQy"; // Веб-посилання

// Перевіряємо, чи використовується внутрішній браузер TikTok
if (stripos($userAgent, 'TikTok') !== false) {
    // Якщо це внутрішній браузер TikTok
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Open in External Browser</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
                padding: 20px;
            }
            h1 {
                color: #333;
            }
            p {
                margin: 20px 0;
                font-size: 18px;
            }
            button {
                padding: 10px 20px;
                font-size: 16px;
                color: #fff;
                background-color: #007bff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }
            button:hover {
                background-color: #0056b3;
            }
            #confirmation {
                color: green;
                font-size: 16px;
                display: none;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Open in External Browser</h1>
        <p>To join our private Telegram channel, please copy the link below and open it in Chrome or Safari:</p>
        <button onclick="copyLink()">Copy Link</button>
        <p id="confirmation">Link copied! Open it in Chrome or Safari.</p>
        <script>
            function copyLink() {
                const link = "<?= $telegramWebLink ?>";
                navigator.clipboard.writeText(link).then(() => {
                    document.getElementById('confirmation').style.display = 'block';
                });
            }
        </script>
    </body>
    </html>
    <?php
} else {
    // Якщо це не TikTok, перенаправляємо користувача безпосередньо до Telegram
    header("Location: $telegramInvite");
    exit;
}
?>
