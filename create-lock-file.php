<?php
// 创建anzhuan.lock文件
$lockFile = __DIR__ . '/anzhuan.lock';

if (file_put_contents($lockFile, 'locked') === false) {
    // 如果文件创建失败，输出错误信息
    http_response_code(500);
    echo "安装失败，无法创建锁定文件。";
    exit;
}

// 如果文件创建成功，输出成功信息
echo "<h1>冷淡音乐系统</h1>";
echo "<p>安装成功！后台地址：<a href='http://你的域名/admin'>http://你的域名/admin</a> 用户名：Cyinhao 密码：Cyh370495664</p>";
echo "<p>请牢记你的后台地址，用户名密码！</p>";
