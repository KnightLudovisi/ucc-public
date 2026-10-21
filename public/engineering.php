<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UCC | College of Engineering</title>
	<link rel="icon" type="image/png" href="images/UCC2.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="academics.css">
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
	<!-- COLLEGE OF ENGINEERING -->
	<main class="ccje-page coe-page">
		<section class="cba-hero">
			<div class="cba-building">
				<img src="images/FOOTER.jpg" alt="University of Caloocan City building">
			</div>
			<div class="cba-hero-inner">
				<div class="cba-dean">
					<div class="cba-dean-photo">
						<img src="https://ucc-caloocan.edu.ph/uploads/colleges/collegeofengineering_dean.png" alt="Engr. Wenald H. Lopez, RECE, PhD">
					</div>
					<h2>Engr. Wenald H. Lopez, RECE, PhD</h2>
					<p>Dean, College of Engineering</p>
				</div>
				<div class="cba-hero-content">
					<div class="cba-breadcrumb">
						<span>ACADEMICS</span>
						<b>/</b>
						<span>COLLEGE PROFILE</span>
						<div class="cba-breadcrumb-dots">
							<i></i>
							<i></i>
							<i></i>
							<span></span>
						</div>
					</div>
					<h1>
						COLLEGE OF
						<strong>ENGINEERING</strong>
					</h1>
				</div>
			</div>
			<div class="cba-hero-wave"></div>
		</section>
		<!-- ABOUT THE COLLEGE -->
		<section class="ccje-about" id="about-college">
			<div class="container">
				<div class="cba-section-title">
					<h2>ABOUT THE COLLEGE</h2>
					<span></span>
				</div>
				<div class="cba-about-grid">
					<div class="cba-about-logo">
						<img src="https://ucc-caloocan.edu.ph/uploads/colleges/449599278_122137574288263173_7723356929386909159_n.png" alt="College of Engineering Logo">
					</div>
					<div class="cba-about-block">
						<div class="cba-quote">“</div>
						<h3>VISION</h3>
						<p>We envision UCC College of Engineering as: “A world-class, academically excellent, socially-impactful and industry-oriented engineering college recognized for its talented people, innovative technologies and continually improving processes that contribute to civic consciousness, ecological sustainability and better quality of life.”</p>
					</div>
					<div class="cba-about-block">
						<div class="cba-quote">“</div>
						<h3>MISSION</h3>
						<p>The mission of UCC College of Engineering is to build an academically excellent, professionally progressive, environmentally conscious, globally competitive, inclusive, diverse and responsible community through quality education, functional co-curricular activities, responsive community immersion programs, and continually improving management systems.</p>
					</div>
				</div>
				<div class="cba-about-grid" style="margin-top:30px;">
					<div class="cba-about-block">
						<div class="cba-quote">“</div>
						<h3>ADMISSION &amp; RETENTION POLICY</h3>
						<ol style="position:relative;z-index:2;margin:0;padding-left:20px;color:#3b443f;font-size:13px;line-height:1.75;">
							<li>Applicants must meet UCC admission requirements and submit the required documents.</li>
							<li>Applicants must have a GWA of 90% or higher.</li>
							<li>Applicants must pass the UCC Admission Test, including 50 additional items for Engineering.</li>
							<li>Qualified applicants will be screened by the program chairs based on their skills and interests.</li>
							<li>Approved applicants will be endorsed to the Registrar’s Office for enrollment.</li>
						</ol>
					</div>
					<div class="cba-about-block" style="grid-column:span 2;">
						<div class="cba-quote">“</div>
						<h3>HISTORY</h3>
						<p>In the heart of the largest barangay in North Caloocan, the University of Caloocan City – College of Engineering, located in Bagong Silang, emerged in 2023 as the first university for aspiring engineers. This newly established institution began its construction on June 14, 2021, under the leadership of Congressman Oca Malapitan and Mayor Along Malapitan. Following its completion, a visit from the Joint Regional Quality Assessment Team and Technical Panel for Engineering and Technology (RQAT-TPET) on October 27, 2023, evaluated UCC's adherence to CHED standards. As another school year approaches, UCC-COEng stands prepared to welcome its first batch of students, eagerly awaiting the beginning of its academic journey. Today, the university serves as a proud testament to the city's dedication to advancing education and its continual march towards progress.</p>
					</div>
				</div>
			</div>
		</section>
		<!-- PROGRAMS -->
		<section class="cba-programs" id="programs">
			<div class="container">
				<div class="cba-program-heading">
					<div class="cba-heading-line"></div>
					<h2>PROGRAMS</h2>
					<div class="cba-heading-dots">
						<i></i>
						<i></i>
						<i></i>
					</div>
					<p>Explore our engineering programs designed to develop competent, innovative, and globally competitive engineering professionals.</p>
				</div>
				<div class="cba-filters">
					<button type="button" class="active" data-filter="all">ALL PROGRAMS</button>
					<button type="button" data-filter="computer-engineering">COMPUTER ENGINEERING</button>
					<button type="button" data-filter="electrical-engineering">ELECTRICAL ENGINEERING</button>
					<button type="button" data-filter="electronics-engineering">ELECTRONICS ENGINEERING</button>
					<button type="button" data-filter="industrial-engineering">INDUSTRIAL ENGINEERING</button>
				</div>
				<div class="cba-program-grid">
					<article class="cba-program-card" data-number="01" data-program="computer-engineering">
						<div class="cba-program-number">01</div>
						<h3>Bachelor of Science in Computer Engineering</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
					<article class="cba-program-card" data-number="02" data-program="electrical-engineering">
						<div class="cba-program-number">02</div>
						<h3>Bachelor of Science in Electrical Engineering</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
					<article class="cba-program-card" data-number="03" data-program="electronics-engineering">
						<div class="cba-program-number">03</div>
						<h3>Bachelor of Science in Electronics Engineering</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
					<article class="cba-program-card" data-number="04" data-program="industrial-engineering">
						<div class="cba-program-number">04</div>
						<h3>Bachelor of Science in Industrial Engineering</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
				</div>
			</div>
		</section>
		<!-- QUICK LINKS -->
		<section class="cba-quick-links">
			<div class="container cba-quick-grid">
				<a href="#programs">
					<div class="cba-quick-icon">
						<i data-lucide="graduation-cap"></i>
					</div>
					<div>
						<strong>EXPLORE A PROGRAM</strong>
						<span>Browse engineering programs</span>
					</div>
					<b>→</b>
				</a>
				<a href="#about-college">
					<div class="cba-quick-icon">
						<i data-lucide="book-open"></i>
					</div>
					<div>
						<strong>READ MORE</strong>
						<span>Learn about COEng</span>
					</div>
					<b>→</b>
				</a>
				<a href="contacts.php#office-directory">
					<div class="cba-quick-icon">
						<i data-lucide="building-2"></i>
					</div>
					<div>
						<strong>ACADEMIC OFFICE</strong>
						<span>Contact us</span>
					</div>
					<b>→</b>
				</a>
				<a href="admission.php">
					<div class="cba-quick-icon">
						<i data-lucide="users-round"></i>
					</div>
					<div>
						<strong>ADMISSIONS</strong>
						<span>Start your engineering journey</span>
					</div>
					<b>→</b>
				</a>
			</div>
		</section>
	</main>
	<!-- PROGRAM MODAL -->
	<div class="program-modal" id="programModal" aria-hidden="true">
		<div class="program-modal-backdrop" data-modal-close></div>
		<div class="program-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="programModalTitle">
			<div class="program-modal-header">
				<div class="program-modal-heading">
					<span class="program-modal-label">ACADEMIC PROGRAM</span>
					<div class="program-modal-number" id="programModalNumber">01</div>
				</div>
				<button class="program-modal-close" type="button" aria-label="Close program details" data-modal-close>×</button>
			</div>
			<div class="program-modal-body">
				<div class="program-modal-accent"></div>
				<h2 id="programModalTitle"></h2>
				<div class="program-modal-section">
					<div class="program-modal-section-heading">
						<span class="program-modal-section-line"></span>
						<h3>VISION</h3>
					</div>
					<p id="programModalVision"></p>
				</div>
				<div class="program-modal-section">
					<div class="program-modal-section-heading">
						<span class="program-modal-section-line"></span>
						<h3>MISSION</h3>
					</div>
					<p id="programModalMission"></p>
				</div>
			</div>
			<div class="program-modal-footer">
				<span>UNIVERSITY OF CALOOCAN CITY</span>
			</div>
		</div>
	</div>
	<!-- SHARED FOOTER -->
	<?php include __DIR__ . '/includes/footer.php'; ?>
	<button class="back-top" id="backTop" aria-label="Back to top">↑</button>
	<!-- SCRIPTS -->
	<script src="script.js"></script>
	<script src="https://unpkg.com/lucide@latest"></script>
	<script>
		document.addEventListener("DOMContentLoaded",function(){
			lucide.createIcons();
			const modal=document.getElementById("programModal");
			const modalTitle=document.getElementById("programModalTitle");
			const modalVision=document.getElementById("programModalVision");
			const modalMission=document.getElementById("programModalMission");
			const modalNumber=document.getElementById("programModalNumber");
			const programLinks=document.querySelectorAll(".program-read-more");
			const closeButtons=document.querySelectorAll("[data-modal-close]");
			const filterButtons=document.querySelectorAll(".cba-filters button");
			const programCards=document.querySelectorAll(".cba-program-card");
			const programDescriptions={
				"computer-engineering":{
					title:"Bachelor of Science in Computer Engineering",
					vision:"We envision UCC College of Engineering as: “A world-class, academically excellent, socially-impactful and industry-oriented engineering college recognized for its talented people, innovative technologies and continually improving processes that contribute to civic consciousness, ecological sustainability and better quality of life.”",
					mission:"The mission of UCC College of Engineering is to build an academically excellent, professionally progressive, environmentally conscious, globally competitive, inclusive, diverse and responsible community through quality education, functional co-curricular activities, responsive community immersion programs, and continually improving management systems."
				},
				"electrical-engineering":{
					title:"Bachelor of Science in Electrical Engineering",
					vision:"We envision UCC College of Engineering as: “A world-class, academically excellent, socially-impactful and industry-oriented engineering college recognized for its talented people, innovative technologies and continually improving processes that contribute to civic consciousness, ecological sustainability and better quality of life.”",
					mission:"The mission of UCC College of Engineering is to build an academically excellent, professionally progressive, environmentally conscious, globally competitive, inclusive, diverse and responsible community through quality education, functional co-curricular activities, responsive community immersion programs, and continually improving management systems."
				},
				"electronics-engineering":{
					title:"Bachelor of Science in Electronics Engineering",
					vision:"We envision UCC College of Engineering as: “A world-class, academically excellent, socially-impactful and industry-oriented engineering college recognized for its talented people, innovative technologies and continually improving processes that contribute to civic consciousness, ecological sustainability and better quality of life.”",
					mission:"The mission of UCC College of Engineering is to build an academically excellent, professionally progressive, environmentally conscious, globally competitive, inclusive, diverse and responsible community through quality education, functional co-curricular activities, responsive community immersion programs, and continually improving management systems."
				},
				"industrial-engineering":{
					title:"Bachelor of Science in Industrial Engineering",
					vision:"We envision UCC College of Engineering as: “A world-class, academically excellent, socially-impactful and industry-oriented engineering college recognized for its talented people, innovative technologies and continually improving processes that contribute to civic consciousness, ecological sustainability and better quality of life.”",
					mission:"The mission of UCC College of Engineering is to build an academically excellent, professionally progressive, environmentally conscious, globally competitive, inclusive, diverse and responsible community through quality education, functional co-curricular activities, responsive community immersion programs, and continually improving management systems."
				}
			};
			function openProgramModal(card){
				const data=programDescriptions[card.dataset.program];
				const number=card.querySelector(".cba-program-number");
				if(!data){
					return;
				}
				modalTitle.textContent=data.title;
				modalVision.textContent=data.vision;
				modalMission.textContent=data.mission;
				modalNumber.textContent=number?number.textContent.trim():"";
				modal.classList.add("show");
				modal.setAttribute("aria-hidden","false");
				document.body.classList.add("program-modal-open");
			}
			function closeProgramModal(){
				modal.classList.remove("show");
				modal.setAttribute("aria-hidden","true");
				document.body.classList.remove("program-modal-open");
			}
			programLinks.forEach(function(link){
				link.addEventListener("click",function(event){
					event.preventDefault();
					const card=link.closest(".cba-program-card");
					if(card){
						openProgramModal(card);
					}
				});
			});
			closeButtons.forEach(function(button){
				button.addEventListener("click",closeProgramModal);
			});
			document.addEventListener("keydown",function(event){
				if(event.key==="Escape"&&modal.classList.contains("show")){
					closeProgramModal();
				}
			});
			filterButtons.forEach(function(button){
				button.addEventListener("click",function(){
					const filter=button.dataset.filter;
					filterButtons.forEach(function(item){
						item.classList.toggle("active",item===button);
					});
					programCards.forEach(function(card){
						card.style.display=filter==="all"||card.dataset.program===filter?"":"none";
					});
				});
			});
		});
	</script>
</body>
</html>
