<?php
// 检查anzhuan.lock文件是否存在
$lockFile = __DIR__ . '/anzhuan.lock';

if (file_exists($lockFile)) {
    // 如果文件存在，显示安装成功的信息
    echo "<h1>冷淡音乐系统</h1>";
    echo "<p>安装成功！后台地址：<a href='http://你的域名/admin'>http://你的域名/admin</a> 用户名：admin密码：admin</p>";
    echo "<p>请牢记你的后台地址，用户名密码！</p>";
    exit;
}

// 如果文件不存在，显示安装向导
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>冷淡音乐系统安装向导</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .title {
            text-align: center;
            color: #333;
        }
        .footer {
            text-align: center;
            color: #aaa;
            font-size: 12px;
            position: absolute;
            bottom: 10px;
            width: 100%;
        }
        .agreement {
            margin: 20px 0;
            padding: 10px;
            background-color: #eee;
            overflow-y: scroll;
            height: 150px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">冷淡音乐系统安装向导</div>
        <div class="agreement">
            <h3>冷淡音乐系统相关协议</h3>
            <p>不可将该音乐系统运用到非法网站。</p>
            <p>如果使用的音乐并没有版权，原作者并不承担任何责任，一切法律由使用者自行承担！</p>
        </div>
        <button onclick="createLockFile()">同意并使用</button>
        <div class="footer">Cyinhao、yilin共同制作</div>
    </div>

    <script>
        function createLockFile() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'create-lock-file.php');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // 刷新页面以显示安装成功信息
                    window.location.reload();
                } else {
                    alert('安装失败，请重试。');
                }
            };
            xhr.send();
        }
    </script>
</body>
</html>
