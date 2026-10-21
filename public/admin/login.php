<?php
declare(strict_types=1);

require_once __DIR__ . '/../../bootstrap.php';

if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UCC Admin | Login</title>
	<link rel="icon" type="image/png" href="assets/images/ucc-LOGO.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
	<script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-page">
	<div class="login-grid">
		<div class="login-brand">
			<div class="brand-content">
				<img src="assets/images/ucc-LOGO.png" alt="UCC Logo">
				<div class="brand-line"></div>
				<h1>UCC CMS</h1>
				<p>University of Caloocan City</p>
				<div class="brand-divider"></div>
				<span>PUBLIC SERVICE THROUGH QUALITY EDUCATION</span>
			</div>
		</div>
		<div class="login-side">
			<div class="top-slogan">A BRIGHTER CALOOCAN<br>THROUGH HIGHER LEARNING
				<div class="slogan-line"></div>
			</div>
			<div class="login-card">
				<div class="login-header">
					<div class="login-top-icon">
						<i data-lucide="shield-check"></i>
					</div>
					<h2>Login</h2>
				</div>
				<p>Sign in to access the UCC Website CMS Panel.</p>
				<form class="login-form" id="loginForm">
					<div class="input-group">
						<label for="username">Username</label>
						<div class="input-box">
							<i data-lucide="user-round"></i>
							<input type="text" name="username" id="username" placeholder="Enter Username">
						</div>
					</div>
					<div class="input-group">
						<label for="password">Password</label>
						<div class="input-box">
							<i data-lucide="lock"></i>
							<input type="password" name="password" id="password" placeholder="Enter Password">
						</div>
					</div>
					<button type="submit" class="login-btn">
						Login
						<i data-lucide="arrow-right"></i>
					</button>
				</form>
				<div class="login-footer">
					<div class="footer-line"></div>
					<span>UCC Content Management System</span>
				</div>
			</div>
		</div>
    </div>
<script src="js/common.js"></script>
<script src="js/login.js"></script>
</body>
</html>
