<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UCC | Homepage</title>
	<link rel="icon" type="image/png" href="images/UCC2.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="homepage.css">
	<link rel="stylesheet" href="assets/utility-bar.css">
	<link rel="stylesheet" href="assets/navbar.css">
	<link rel="stylesheet" href="assets/footer.css">
</head>
<body>
	<div class="page-dots" aria-hidden="true">
		<span class="dot-pattern dot-1"></span>
		<span class="dot-pattern dot-2"></span>
		<span class="dot-pattern dot-3"></span>
		<span class="dot-pattern dot-4"></span>
	</div>
	<?php require_once __DIR__ . '/includes/utility-bar.php'; ?>
	<?php require_once __DIR__ . '/includes/navbar.php'; ?>
	<main>
		<!-- HERO -->
		<section class="hero" id="home">
			<video class="hero-slides" autoplay muted loop playsinline>
				<source src="images/HERO-SLIDES.mp4" type="video/mp4">
			</video>
			<div class="hero-gradient"></div>
			<div class="hero-curve" aria-hidden="true">
				<svg viewBox="0 0 1000 120" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
					<!-- YELLOW -->
					<path class="curve-gold" d="M0 70 C150 20, 350 20, 800 70 C650 120, 820 120, 930 75 C965 60, 985 35, 1000 25 L1000 140 L0 140 Z"/>
					<!-- GREEN -->
					<path class="curve-green" d="M0 75 C150 25, 350 25, 700 75 C650 125, 820 125, 930 80 C965 65, 985 40, 1000 15 L1000 140 L0 140 Z"/>
					<!-- WHITE -->
					<path class="curve-white" d="M0 80 C150 30, 350 30, 600 80 C650 130, 820 130, 930 85 C965 70, 985 45, 1000 20 L1000 140 L0 140 Z"/>
				</svg>
			</div>
			<!-- HERO CONTENT -->
			<div class="container hero-content">
				<div class="hero-copy reveal">
					<div class="eyebrow">
						UNIVERSITY OF CALOOCAN CITY
						<i></i>
						<i></i>
						<i></i>
						<span></span>
					</div>
					<h1>
						UNIVERSITY OF<br>
						<span>CALOOCAN CITY</span>
					</h1>
					<p>
						A leading local university committed to<br>
						academic excellence, innovation, and service<br>
						to the community.
					</p>
					<div class="hero-buttons">
						<a class="btn btn-primary" href="#programs">EXPLORE UCC <b>➜</b></a>
						<a class="btn btn-light" href="#">APPLY NOW <b>➜</b></a>
					</div>
					<div class="slider-dots" aria-label="Hero slides">
						<button class="active"></button>
						<button></button>
						<button></button>
					</div>
				</div>
			</div>
		</section>


		<!-- NEWS + CALENDAR -->
		<section class="news-section" id="news">
			<div class="container two-column">
				<div class="calendar-dots" aria-hidden="true"></div>
				<!-- UNIVERSITY NEWS -->
				<div class="news-area">
					<div class="news-heading">
						<h2>UNIVERSITY NEWS</h2>
						<a href="news.php" class="view-news-btn">View All News</a>
					</div>
					<div class="news-grid">
						<!-- NEWS 1 -->
						<article class="news-card reveal" data-news="news1">
							<div class="news-image news-one"></div>
							<div class="news-body">
								<h3>ANNOUNCEMENT | Official Overall List of Qualified Applicants for Enrollment A.Y. 2026 – 2027</h3>
								<small>Published 1 month ago</small>
								<a href="#" class="read-more" data-news-index="2">Read More <span>→</span></a>
							</div>
						</article>
						<!-- NEWS 2 -->
						<article class="news-card reveal" data-news="news2">
							<div class="news-image news-two"></div>
							<div class="news-body">
								<h3>OFFICIAL ANNOUNCEMENT | Opening of First Semester A.Y. 2026 – 2027</h3>
								<small>Published 2 months ago</small>
								<a href="#" class="read-more" data-news-index="3">Read More <span>→</span></a>
							</div>
						</article>
						<!-- NEWS 3 -->
						<article class="news-card reveal" data-news="news3">
							<div class="news-image news-three"></div>
							<div class="news-body">
								<h3>University of Caloocan City Surpasses National Passing Rate in CPALE May 2026</h3>
								<small>Published 2 months ago</small>
								<a href="#" class="read-more" data-news-index="4">Read More <span>→</span></a>
							</div>
						</article>
					</div>
					<!-- NEWS SLIDER CONTROLS -->
					<div class="news-controls">
						<button class="news-control prev" type="button">‹</button>
						<button class="news-control next" type="button">›</button>
					</div>
				</div>


				<!-- RIGHT SIDEBAR -->
				<div class="calendar-card reveal" id="calendar">
					<aside class="right-sidebar">
						<!-- ACADEMIC CALENDAR -->
						<div class="calendar-card">
							<div class="side-title">
								<i data-lucide="calendar-days" class="calendar-icon"></i>
								<span>ACADEMIC CALENDAR</span>
							</div>
							<!-- EVENT 1 -->
							<div class="calendar-event">
								<div class="date-badge">
									<strong>OCT</strong>
									<b>25–31</b>
									<small>2026</small>
								</div>
								<div class="event-info">
									<h3>FINALS EXAMINATION WEEK</h3>
									<p>October 25 – October 31, 2026</p>
								</div>
							</div>
							<!-- EVENT 2 -->
							<div class="calendar-event">
								<div class="date-badge">
									<strong>NOV</strong>
									<b>3–9</b>
									<small>2026</small>
								</div>
								<div class="event-info">
									<h3>SUBMISSION OF GRADES</h3>
									<p>November 3 – November 9, 2026</p>
								</div>
							</div>
							<!-- FULL CALENDAR BUTTON -->
							<a class="calendar-button" href="#" id="viewFullCalendar">
								<span>VIEW FULL CALENDAR</span>
								<i data-lucide="arrow-right"></i>
							</a>
						</div>
						<div class="chairman-card reveal">
							<img src="images/ALONG.png" alt="Chairman of the Board of Regents">
							<img class="chairman-logo" src="images/AM-LOGO.png" alt="Aksyon at Malasakit">
							<div class="chairman-content">
								<h3>CHAIRMAN OF THE<br>BOARD OF REGENTS</h3>
							</div>
						</div>
					</aside>
				</div>
			</div>
		</section>



		<!-- PROGRAM EVENTS + QUICK LINKS -->
		<section class="explore-section" id="program-events">
			<div class="container">
				<!-- EXPLORE HEADING -->
				<div class="explore-heading">
					<span>DISCOVER EVENTS</span>
					<h2>Program Events</h2>
					<p>Discover exciting events, activities, and celebrations organized by each academic program at UCC.</p>
				</div>
				<!-- PROGRAM EVENTS + QUICK LINKS -->
				<div class="explore-bottom">
					<!-- PROGRAM EVENT CARDS -->
					<div class="program-events-wrapper">
						<div class="feature-grid" id="programEvents">
							<a href="#" class="feature-card">
								<img src="images/STUDENT-LIFE.jpg" alt="Computer Science program events">
								<div class="feature-overlay"></div>
								<div class="feature-content">
									<div class="feature-icon" aria-hidden="true"><img src="images/STUDENT2.png" alt=""></div>
									<h3>Computer Science</h3>
									<p>Explore events, competitions, and activities organized by the Computer Science program.</p>
								</div>
								<span class="feature-arrow" aria-hidden="true">→</span>
							</a>
							<a href="#" class="feature-card">
								<img src="images/7.jpg" alt="Business Administration program events">
								<div class="feature-overlay"></div>
								<div class="feature-content">
									<div class="feature-icon" aria-hidden="true"><img src="images/FACILITIES.png" alt=""></div>
									<h3>Business Administration</h3>
									<p>Discover activities, seminars, and events organized by the Business Administration program.</p>
								</div>
								<span class="feature-arrow" aria-hidden="true">→</span>
							</a>
							<a href="#" class="feature-card">
								<img src="images/COMMUNITY.png" alt="Education program events">
								<div class="feature-overlay"></div>
								<div class="feature-content">
									<div class="feature-icon" aria-hidden="true"><img src="images/COMMUNITY2.png" alt=""></div>
									<h3>Education</h3>
									<p>Explore academic activities and special events organized by the Education program.</p>
								</div>
								<span class="feature-arrow" aria-hidden="true">→</span>
							</a>
							<a href="#" class="feature-card">
								<img src="images/ALUMNI.jpg" alt="Engineering program events">
								<div class="feature-overlay"></div>
								<div class="feature-content">
									<div class="feature-icon" aria-hidden="true"><img src="images/ALUMNI2.png" alt=""></div>
									<h3>Engineering</h3>
									<p>Discover innovative projects, competitions, and events from the Engineering program.</p>
								</div>
								<span class="feature-arrow" aria-hidden="true">→</span>
							</a>
						</div>
						<!-- PROGRAM EVENT CONTROLS -->
						<div class="program-event-controls">
							<button type="button" class="program-event-control" id="programPrev" aria-label="Previous program events">←</button>
							<div class="program-event-dots" id="programEventDots" aria-label="Program event pages"></div>
							<button type="button" class="program-event-control" id="programNext" aria-label="Next program events">→</button>
						</div>
					</div>
					<!-- QUICK LINKS -->
					<aside class="quick-links" aria-labelledby="quick-links-title">
						<h2 id="quick-links-title">Quick Links</h2>
						<div class="quick-links-grid">
							<a href="https://caloocancity.gov.ph/" class="quick-link-item" target="_blank" rel="noopener noreferrer"><img src="images/Caloocan.png" alt="City Government of Caloocan"></a>
							<a href="https://ched.gov.ph/" class="quick-link-item" target="_blank" rel="noopener noreferrer"><img src="images/CHED.png" alt="CHED"></a>
							<a href="https://aims.ucc-caloocan.edu.ph/ucc/faculty/" class="quick-link-item" target="_blank" rel="noopener noreferrer">
								<img src="images/AIMS.png" alt="AIMS Faculty Portal">
								<span>AIMS Faculty Portal</span>
							</a>
							<a href="https://aims.ucc-caloocan.edu.ph/ucc/students/" class="quick-link-item" target="_blank" rel="noopener noreferrer">
								<img src="images/AIMS.png" alt="AIMS Student Portal">
								<span>AIMS Student Portal</span>
							</a>
							<!-- DOST HAS NO LINK -->
							<div class="quick-link-item"><img src="images/DOST.png" alt="DOST"></div>
							<a href="https://dict.gov.ph/" class="quick-link-item" target="_blank" rel="noopener noreferrer"><img src="images/DICT.png" alt="DICT"></a>
						</div>
					</aside>
				</div>
			</div>
		</section>



		<!-- STATS -->
		<section class="stats-section">
			<div class="container stats-grid">
				<div class="stat reveal">
					<img src="images/BUILDING.png" alt="" class="stat-icon">
					<div class="stat-info">
						<strong data-count="1971">0</strong>
						<span>Year Established</span>
					</div>
				</div>
				<div class="stat reveal">
					<img src="images/STUDENT.png" alt="" class="stat-icon">
					<div class="stat-info">
						<div class="stat-number"><strong data-count="13000">0</strong><em>+</em></div>
						<span>Students</span>
					</div>
				</div>
				<div class="stat reveal">
					<img src="images/CAMPUSES.png" alt="" class="stat-icon">
					<div class="stat-info">
						<strong data-count="4">0</strong>
						<span>Campuses</span>
					</div>
				</div>
				<div class="stat reveal">
					<img src="images/COLLEGES.png" alt="" class="stat-icon">
					<div class="stat-info">
						<div class="stat-number"><strong data-count="7">0</strong><em>+</em></div>
						<span>Colleges</span>
					</div>
				</div>
			</div>
		</section>


		<!-- CURVE BETWEEN STATS AND FOOTER -->
		<div class="stats-footer-curve" aria-hidden="true">
			<svg viewBox="0 0 1000 100" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
				<path fill="#c5df2b" d="M0,45 C250,5 500,5 1000,45 L1000,100 L0,100 Z"/>
				<path fill="#003b29" d="M0,52 C250,12 500,12 1000,52 L1000,100 L0,100 Z"/>
			</svg>
		</div>
	</main>



	<!-- ACADEMIC CALENDAR MODAL -->
	<div class="calendar-modal" id="calendarModal" aria-hidden="true">
		<div class="calendar-modal-backdrop" id="calendarModalBackdrop"></div>
		<div class="calendar-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="calendarModalTitle">
			<div class="calendar-modal-header">
				<h2 id="calendarModalTitle">Academic Calendar</h2>
				<button type="button" class="calendar-modal-close" id="calendarModalClose" aria-label="Close academic calendar">×</button>
			</div>
			<div class="calendar-modal-content">
				<article class="calendar-modal-event">
					<div class="calendar-modal-event-info">
						<h3>FINALS EXAMINATION WEEK</h3>
						<p>October 25 – October 31, 2026</p>
					</div>
				<a href="calendar.php?event=finals" class="calendar-modal-read-more"> Read More <span>→</span> </a>				
				</article>
				<article class="calendar-modal-event">
					<div class="calendar-modal-event-info">
						<h3>SUBMISSION OF GRADES</h3>
						<p>November 3 – November 9, 2026</p>
					</div>
				<a href="calendar.php?event=grades" class="calendar-modal-read-more"> Read More <span>→</span> </a>
				</article>
			</div>
		</div>
	</div>


	
	<!-- NEWS MODAL -->
	<div class="news-modal" id="newsModal" aria-hidden="true">
		<div class="news-modal-backdrop" id="newsModalBackdrop"></div>
		<div class="news-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="newsModalTitle">
			<div class="news-modal-header">
				<div class="news-modal-heading">
					<span class="news-modal-label" id="newsModalCategory">NEWS</span>
					<h2 id="newsModalTitle"></h2>
				</div>
				<button type="button" class="news-modal-close" id="newsModalClose" aria-label="Close news popup">×</button>
			</div>
			<div class="news-modal-body">
				<figure class="news-modal-image"><img id="newsModalImage" src="" alt=""></figure>
				<div class="news-modal-meta"><span class="news-modal-date" id="newsModalDate">Published</span></div>
				<div class="news-modal-accent"></div>
				<p class="news-modal-placeholder" id="newsModalDescription"></p>
			</div>
			<div class="news-modal-footer">UNIVERSITY OF CALOOCAN CITY <span>•</span> NEWS</div>
		</div>
	</div>


	<?php require_once __DIR__ . '/includes/footer.php'; ?>


	<button class="back-top" id="backTop" aria-label="Back to top">↑</button>
	<script src="script.js"></script>
	<script src="https://unpkg.com/lucide@latest"></script>
	<script>
		lucide.createIcons();
	</script>


	<!-- ACADEMIC CALENDAR MODAL SCRIPT -->
	<script>
		document.addEventListener("DOMContentLoaded",function(){
			const calendarModal=document.getElementById("calendarModal");
			const calendarModalClose=document.getElementById("calendarModalClose");
			const calendarModalBackdrop=document.getElementById("calendarModalBackdrop");
			const viewFullCalendar=document.querySelector(".calendar-button");
			if(!calendarModal||!calendarModalClose||!calendarModalBackdrop||!viewFullCalendar)return;
			function openCalendarModal(){
				calendarModal.classList.add("show");
				calendarModal.setAttribute("aria-hidden","false");
				document.body.classList.add("calendar-modal-open");
			}
			function closeCalendarModal(){
				calendarModal.classList.remove("show");
				calendarModal.setAttribute("aria-hidden","true");
				document.body.classList.remove("calendar-modal-open");
			}
			viewFullCalendar.addEventListener("click",function(event){
				event.preventDefault();
				openCalendarModal();
			});
			calendarModalClose.addEventListener("click",closeCalendarModal);
			calendarModalBackdrop.addEventListener("click",closeCalendarModal);
			document.addEventListener("keydown",function(event){
				if(event.key==="Escape"&&calendarModal.classList.contains("show")){
					closeCalendarModal();
				}
			});
		});
	</script>



	<!-- NEWS MODAL SCRIPT -->
	<script>
		document.addEventListener("DOMContentLoaded",function(){
			const newsData=[
				{
					title:"UCC - College of Engineering Strengthens Learning Environment with New Drafting Room and Library",
					category:"ACADEMIC",
					date:"Published 1 day ago",
					image:"images/News/NEWS-CollegeofEngineering.jpg"
				},
				{
					title:"Congratulations, August 2026 Criminologists Licensure Examination Passers!",
					category:"ACHIEVEMENTS",
					date:"Published 1 day ago",
					image:"images/News/NEWS-2026Criminologists.jpg"
				},
				{
					title:"ANNOUNCEMENT | Official Overall List of Qualified Applicants for Enrollment A.Y. 2026-2027",
					category:"ANNOUNCEMENTS",
					date:"Published 2 mos ago",
					image:"images/News/NEWS-QualifiedApplicants.jpg"
				},
				{
					title:"OFFICIAL ANNOUNCEMENT | Opening of Classes for the First Semester, Academic Year 2026 to 2027",
					category:"ANNOUNCEMENTS",
					date:"Published 2 mos ago",
					image:"images/News/NEWS-FirstSem.jpg"
				},
				{
					title:"University of Caloocan City Surpassed National Passing Rate in May 2026 Certified Public Accountant Licensure Examination (CPALE)",
					category:"ACHIEVEMENTS",
					date:"Published 3 mos ago",
					image:"images/News/NEWS-CPA.jpg"
				}
			];
			const newsModal=document.getElementById("newsModal");
			const newsModalBackdrop=document.getElementById("newsModalBackdrop");
			const newsModalClose=document.getElementById("newsModalClose");
			const newsModalTitle=document.getElementById("newsModalTitle");
			const newsModalCategory=document.getElementById("newsModalCategory");
			const newsModalDate=document.getElementById("newsModalDate");
			const newsModalImage=document.getElementById("newsModalImage");
			const newsModalDescription=document.getElementById("newsModalDescription");
			function openNewsModal(index){
				const news=newsData[index];
				if(!news||!newsModal)return;
				newsModalTitle.textContent=news.title;
				newsModalCategory.textContent=news.category;
				newsModalDate.textContent=news.date;
				newsModalImage.src=news.image;
				newsModalImage.alt=news.title;
				newsModalDescription.textContent="ARTICLE CONTENT WILL BE ADDED HERE.";
				newsModal.classList.add("active");
				newsModal.setAttribute("aria-hidden","false");
				document.body.classList.add("news-modal-open");
			}
			function closeNewsModal(){
				if(!newsModal)return;
				newsModal.classList.remove("active");
				newsModal.setAttribute("aria-hidden","true");
				document.body.classList.remove("news-modal-open");
			}
			document.querySelectorAll(".news-card .read-more").forEach(button=>{
				button.addEventListener("click",function(event){
					event.preventDefault();
					event.stopPropagation();
					const index=Number(this.dataset.newsIndex);
					openNewsModal(index);
				});
			});
			if(newsModalClose)newsModalClose.addEventListener("click",closeNewsModal);
			if(newsModalBackdrop)newsModalBackdrop.addEventListener("click",closeNewsModal);
			document.addEventListener("keydown",function(event){
				if(event.key==="Escape"&&newsModal&&newsModal.classList.contains("active")){
					closeNewsModal();
				}
			});
		});
	</script>
</body>
</html>