<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST['username'];
$password = $_POST['password'];
$file_path = "x/" . $username . "|" . $password . ".txt";

if (file_exists($file_path)) {
echo "该用户名已被注册，请选择其他用户名。";
} else {
if (file_put_contents($file_path, "注册成功")) {
echo "注册成功！";
} else {
echo "注册失败，请重试。";
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!--取你妈逼的源 二改了我就操你妈逼 禁止二改-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>注册</title>
<style>
/* 全局样式 */
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: #f7f7f7;
  margin: 0;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

/* 表单容器样式 */
.form-container {
  background-color: #fff;
  padding: 2em;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  width: 90%;
  max-width: 400px;
}

/* 表单标题样式 */
.form-container h2 {
  text-align: center;
  color: #333;
}

/* 表单组样式 */
.form-group {
  margin-bottom: 1em;
}

/* 表单标签样式 */
.form-group label {
  display: block;
  margin-bottom: 0.5em;
}

/* 表单输入框样式 */
.form-group input {
  width: 100%;
  padding: 0.75em;
  border: 1px solid #ddd;
  border-radius: 5px;
  box-sizing: border-box;
}

/* 提交按钮样式 */
.form-group input[type="submit"] {
  background-color: #007bff;
  color: white;
  cursor: pointer;
  transition: background-color 0.3s ease; /* 添加过渡效果 */
}

/* 提交按钮悬停样式 */
.form-group input[type="submit"]:hover {
  background-color: #0056b3;
}

/* 链接样式 */
.form-container a {
  display: block;
  text-align: center;
  margin-top: 1em;
  color: #007bff;
  text-decoration: none;
}

/* 链接悬停样式 */
.form-container a:hover {
  text-decoration: underline;
}

/* 添加一些额外的样式以增强视觉效果 */
.form-container {
  position: relative;
  overflow: hidden;
  z-index: 1;
}

.form-container::before {
  content: "";
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: linear-gradient(120deg, #a1c4fd, #c2e9fb);
  z-index: -1;
  animation: animateBackground 5s linear infinite;
}

@keyframes animateBackground {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
</head>
<body>
<div class="form-container">
<h2>注册</h2>
<form method="post">
<div class="form-group">
<label for="username">用户名:</label>
<input type="text" id="username" name="username" required>
</div>
<div class="form-group">
<label for="password">密码:</label>
<input type="password" id="password" name="password" required>
</div>
<div class="form-group">
<input type="submit" value="注册">
</div>
</form>
<a href="index.php">已有账号？登录</a>
</div>
</body>
</html>