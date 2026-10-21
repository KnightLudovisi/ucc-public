<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UCC | Calendar</title>
	<link rel="icon" type="image/png" href="images/UCC2.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="calendar.css">
	<link rel="stylesheet" href="assets/utility-bar.css">
	<link rel="stylesheet" href="assets/navbar.css">
	<link rel="stylesheet" href="assets/footer.css">
</head>
<body>
	<!-- PAGE DOTS -->
	<div class="page-dots" aria-hidden="true">
		<span class="dot-pattern dot-1"></span>
		<span class="dot-pattern dot-2"></span>
		<span class="dot-pattern dot-3"></span>
		<span class="dot-pattern dot-4"></span>
	</div>
	<?php include __DIR__ . '/includes/utility-bar.php'; ?>
	<?php include __DIR__ . '/includes/navbar.php'; ?>

	<main class="calendar-page">
		<section class="calendar-hero">
			<div class="calendar-hero-overlay"></div>
			<div class="container calendar-hero-content">
				<span>UNIVERSITY OF CALOOCAN CITY</span>
				<h1>Academic Calendar</h1>
				<p>Important academic schedules, examinations, and university dates.</p>
			</div>
		</section>
		<section class="calendar-content-section">
			<div class="container">
				<a href="homepage.php" class="calendar-back-link">
					<i data-lucide="arrow-left"></i>
					<span>Back to Homepage</span>
				</a>
				<div id="calendarEventContainer"></div>
			</div>
		</section>
	</main>
	<?php include __DIR__ . '/includes/footer.php'; ?>
	<button class="back-top" id="backTop" aria-label="Back to top">↑</button>
	<!-- SCRIPTS -->
	<script src="script.js"></script>
	<script src="https://unpkg.com/lucide@latest"></script>
	<script>
		lucide.createIcons();
		const calendarEvents = {
			finals: {
				category: "ACADEMIC SCHEDULE",
				title: "FINALS EXAMINATION WEEK",
				date: "OCTOBER 25 – OCTOBER 31, 2026",
				published: "PUBLISHED OCTOBER 1, 2026",
				image: "images/CALENDAR.jpg",
				description: "The University of Caloocan City will conduct its Final Examination Week for the First Semester of Academic Year 2026–2027. Students are advised to review their examination schedules and coordinate with their respective colleges and instructors for any additional instructions.",
				details: [
					["DATE", "October 25 – October 31, 2026"],
					["EVENT TYPE", "Final Examination"],
					["ACADEMIC YEAR", "2026 – 2027"],
					["AUDIENCE", "All UCC Students"]
				]
			},
			grades: {
				category: "ACADEMIC SCHEDULE",
				title: "SUBMISSION OF GRADES",
				date: "NOVEMBER 3 – NOVEMBER 9, 2026",
				published: "PUBLISHED OCTOBER 1, 2026",
				image: "images/CALENDAR.jpg",
				description: "Faculty members are reminded to complete and submit the required student grades within the designated submission period. All grades should be properly reviewed and submitted through the appropriate university procedures.",
				details: [
					["DATE", "November 3 – November 9, 2026"],
					["EVENT TYPE", "Submission of Grades"],
					["ACADEMIC YEAR", "2026 – 2027"],
					["AUDIENCE", "UCC Faculty Members"]
				]
			}
		};
		const params = new URLSearchParams(window.location.search);
		const eventKey = params.get("event") || "finals";
		const event = calendarEvents[eventKey];
		const container = document.getElementById("calendarEventContainer");
		if (event) {
			container.innerHTML = `
				<article class="calendar-detail-card">
					<div class="calendar-detail-image">
						<img src="${event.image}" alt="${event.title}">
						<div class="calendar-detail-category">${event.category}</div>
					</div>
					<div class="calendar-detail-body">
						<div class="calendar-detail-published">${event.published}</div>
						<h2>${event.title}</h2>
						<div class="calendar-detail-date">
							<span>◷</span>
							${event.date}
						</div>
						<div class="calendar-detail-divider"></div>
						<p class="calendar-detail-description">${event.description}</p>
						<div class="calendar-detail-information">
							<h3>EVENT INFORMATION</h3>
							<div class="calendar-detail-grid">
								${event.details.map(detail => `
									<div class="calendar-detail-item">
										<span>${detail[0]}</span>
										<strong>${detail[1]}</strong>
									</div>
								`).join("")}
							</div>
						</div>
					</div>
				</article>
			`;
		} else {
			container.innerHTML = `
				<div class="calendar-not-found">
					<h2>Calendar Event Not Found</h2>
					<p>The calendar event you are looking for is unavailable.</p>
					<a href="homepage.html">Return to Homepage</a>
				</div>
			`;
		}
	</script>
</body>
</html>