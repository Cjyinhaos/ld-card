<?php
session_start();

if (!isset($_SESSION['username'])) {
header("Location: index.php"); 
exit();
}

?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>音乐网站</title>
// 检查anzhuan.lock文件是否存在
$lockFile = __DIR__ . '/anzhuan.lock';

if (file_exists($lockFile)) {
    // 如果文件存在，显示安装成功的信息
    echo "<h1>冷淡音乐系统</h1>";
    echo "<p>安装成功！后台地址：<a href='http://你的域名/admin'>http://你的域名/admin</a> 用户名：Cyinhao 密码：Cyh370495664</p>";
    echo "<p>请牢记你的后台地址，用户名密码！</p>";
    exit;
}

// 如果文件不存在，显示安装向导
?>
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
<style>
body, html {
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    background: #f7f7f7;
}

.container {
    width: 100%;
    height: 100%;
    margin: auto;
    background: #fff;
    padding: 20px;
    box-sizing: border-box;
}

.search-container {
    display: flex;
    margin-bottom: 20px;
}

.search-container input[type="text"] {
    flex-grow: 1;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-right: 10px;
}

.search-container button {
    background: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.music-list {
    margin-bottom: 20px;
}

.music-list ul {
    list-style: none;
    padding: 0;
}

.music-list li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    cursor: pointer;
}

.audio-player {
    margin-top: 20px;
}

.audio-progress {
    width: 100%;
    margin-top: 10px;
}

input[type="range"] {
    width: 100%;
    -webkit-appearance: none;
    height: 5px;
    border-radius: 5px;
    background: #ddd;
    outline: none;
}

input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 15px;
    height: 15px;
    border-radius: 50%;
    background: #000000;
    cursor: pointer;
}

.play-pause-btn {
    background: #007bff;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}
     </style>
</head>
<body>

<div class="container">
     <div class="search-container">
         <input type="text" id="searchInput" onkeyup="searchMusic()" placeholder="搜索音乐...">
     </div>
     <div class="music-list">
         <ul id="musicListUL">
             <?php
             $dir = 'Music/';
             $files = scandir($dir);
             foreach ($files as $file) {
                 if (pathinfo($file, PATHINFO_EXTENSION) == 'mp3') {
                     $filename = pathinfo($file, PATHINFO_FILENAME);
                     echo "<li data-src='$dir{$file}' onclick='selectMusic(this)'>$filename</li>";
                 }
             }
             ?>
         </ul>
     </div>
     <div class="audio-player">
         <audio id="audioPlayer" preload="none">
             eee迷惑贝贝aaa
         </audio>
         <div class="audio-progress">
             <input type="range" id="progressBar" min="0" value="0">
         </div>
     </div>
     <p style="color: grey; font-size: smaller;">创作者.yilin 拥有者.kim</p>
     <!--建议留下版权，如果你选择留下，那就千万不要把创作者的名字去掉呀(纯属不甘心)-->
</div>

<script>
     var audioPlayer = document.getElementById('audioPlayer');
     var progressBar = document.getElementById('progressBar');
     var musicListUL = document.getElementById('musicListUL');
     var currentTrack = null;

     audioPlayer.onloadedmetadata = function() {
         progressBar.max = audioPlayer.duration;
     };

     audioPlayer.ontimeupdate = function() {
         progressBar.value = audioPlayer.currentTime;
     };

     progressBar.onchange = function() {
         audioPlayer.currentTime = progressBar.value;
     };



     function selectMusic(element) {
         if (currentTrack) {
             currentTrack.classList.remove('active');
         }
         currentTrack = element;
         currentTrack.classList.add('active');
         audioPlayer.src = element.getAttribute('data-src');
         audioPlayer.load();
         audioPlayer.play();
         document.querySelector('.play-pause-btn').textContent = '█';
     }

     function searchMusic() {
         var input, filter, ul, li, a, i, txtValue;
         input = document.getElementById("searchInput");
         filter = input.value.toUpperCase();
         ul = document.getElementById("musicListUL");
         li = ul.getElementsByTagName('li');

         for (i = 0; i < li.length; i++) {
             txtValue = li[i].textContent || li[i].innerText;
             if (txtValue.toUpperCase().indexOf(filter) > -1) {
                 li[i].style.display = "";
             } else {
                 li[i].style.display = "none";
             }
         }
     }
</script>

</body>
</html>