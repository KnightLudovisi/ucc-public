<?php
$currentPage = basename($_SERVER['PHP_SELF']);

function navActive($pages, $currentPage) {
	return in_array($currentPage, (array) $pages, true) ? 'active' : '';
}

function navCurrent($pages, $currentPage) {
	return in_array($currentPage, (array) $pages, true) ? 'current-page' : '';
}

$aboutPages = [
	'about.php',
	'board-of-regents.php',
	'executive-officials.php'
];

$academicPages = [
	'business-accountancy.php',
	'criminal-justice.php',
	'education.php',
	'engineering.php',
	'law.php',
	'liberal-arts-sciences.php',
	'graduate-school.php'
];

$aboutActive = in_array($currentPage, $aboutPages, true);
$academicsActive = in_array($currentPage, $academicPages, true);
?>
<!-- BRAND HEADER -->
<header class="brand-header">
	<div class="container brand-inner">
		<div class="brand-logos">
			<img src="images/BagongPilipinas.png" alt="Bagong Pilipinas">
			<img src="images/Caloocan.png" alt="Caloocan City">
			<img src="images/UCC2.png" alt="University of Caloocan City seal">
		</div>
		<nav class="main-nav" id="mainNav">
			<div class="nav-inner">
				<div class="nav-links">
					<a href="homepage.php" class="<?= navActive('homepage.php', $currentPage) ?>">HOME</a>

				<div class="nav-dropdown <?= $aboutActive ? 'active' : '' ?>">
					<button type="button" class="<?= $aboutActive ? 'active' : '' ?>" aria-expanded="false">
						ABOUT <span>⌄</span>
					</button>
					<div class="dropdown-menu">
						<a href="about.php" class="<?= navCurrent('about.php', $currentPage) ?>">About UCC</a>
						<a href="board-of-regents.php" class="<?= navCurrent('board-of-regents.php', $currentPage) ?>">Board of Regents</a>
						<a href="executive-officials.php" class="<?= navCurrent('executive-officials.php', $currentPage) ?>">Executive Officials</a>
					</div>
				</div>

				<div class="nav-dropdown <?= $academicsActive ? 'active' : '' ?>">
					<button type="button" class="<?= $academicsActive ? 'active' : '' ?>" aria-expanded="false">
						ACADEMICS <span>⌄</span>
					</button>
					<div class="dropdown-menu academics-menu">
						<a href="business-accountancy.php" class="<?= navCurrent('business-accountancy.php', $currentPage) ?>">College of Business and Accountancy</a>
						<a href="criminal-justice.php" class="<?= navCurrent('criminal-justice.php', $currentPage) ?>">College of Criminal Justice Education</a>
						<a href="education.php" class="<?= navCurrent('education.php', $currentPage) ?>">College of Education</a>
						<a href="engineering.php" class="<?= navCurrent('engineering.php', $currentPage) ?>">College of Engineering</a>
						<a href="law.php" class="<?= navCurrent('law.php', $currentPage) ?>">College of Law</a>
						<a href="liberal-arts-sciences.php" class="<?= navCurrent('liberal-arts-sciences.php', $currentPage) ?>">College of Liberal Arts and Sciences</a>
						<a href="graduate-school.php" class="<?= navCurrent('graduate-school.php', $currentPage) ?>">Graduate School</a>
					</div>
				</div>

					<a href="campus.php" class="<?= navActive('campus.php', $currentPage) ?>">CAMPUS</a>
					<a href="contacts.php" class="<?= navActive('contacts.php', $currentPage) ?>">CONTACTS</a>
				</div>

			</div>
		</nav>
	</div>
</header>
