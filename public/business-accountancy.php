<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Explore the College of Business and Accountancy programs at the University of Caloocan City.">
	<title>UCC | College of Business Accountancy</title>
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
	<div class="page-dots" aria-hidden="true">
		<span class="dot-pattern dot-1"></span>
		<span class="dot-pattern dot-2"></span>
		<span class="dot-pattern dot-3"></span>
		<span class="dot-pattern dot-4"></span>
	</div>
	<?php require_once __DIR__ . '/includes/utility-bar.php'; ?>
	<?php require_once __DIR__ . '/includes/navbar.php'; ?>
	<main class="cba-page">
		<section class="cba-hero">
			<div class="cba-building">
				<img src="images/FOOTER.jpg" alt="">
			</div>
			<div class="cba-hero-inner">
				<div class="cba-dean">
					<div class="cba-dean-photo">
						<img src="images/Executive-Officials/EO-MACKAY.png" alt="Dr. Eloisa P. Mackay">
					</div>
					<h2>Dr. Eloisa P. Mackay</h2>
					<p>Dean, College of Business and Accountancy</p>
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
						COLLEGE OF BUSINESS
						<strong>AND ACCOUNTANCY</strong>
					</h1>
				</div>
			</div>
			<div class="cba-hero-wave"></div>
		</section>
		<section class="cba-about">
			<div class="container">
				<div class="cba-section-title">
					<h2>ABOUT THE COLLEGE</h2>
					<span></span>
				</div>
				<div class="cba-about-grid">
					<div class="cba-about-logo">
						<img src="images/CBA-LOGO.png" alt="College of Business and Accountancy Logo">
					</div>
					<div class="cba-about-block">
						<div class="cba-quote">“</div>
						<h3>VISION</h3>
						<p>A strong and well-rounded College offering innovative globally competitive and cross-functional graduates for the organizational and entrepreneurial pursuits of tomorrow.</p>
					</div>
					<div class="cba-about-block">
						<div class="cba-quote">“</div>
						<h3>MISSION</h3>
						<p>The department aims to develop proactive and globally-competitive graduates through an evidence - based education aligned with the principles and ideals of Outcome - Based Education that meet the ever changing needs, wants, demands, and expectations.</p>
					</div>
				</div>
			</div>
		</section>
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
					<p>Explore our academic programs designed for future business leaders.</p>
				</div>
				<div class="cba-filters">
					<button type="button" class="active" data-filter="all">ALL PROGRAMS</button>
					<button type="button" data-filter="accountancy">ACCOUNTANCY</button>
					<button type="button" data-filter="business-administration">BUSINESS ADMINISTRATION</button>
					<button type="button" data-filter="entrepreneurship">ENTREPRENEURSHIP</button>
					<button type="button" data-filter="hospitality">HOSPITALITY</button>
					<button type="button" data-filter="office-administration">OFFICE ADMINISTRATION</button>
					<button type="button" data-filter="tourism">TOURISM</button>
				</div>
				<div class="cba-program-grid">
					<article class="cba-program-card" data-program="accountancy" data-category="accountancy">
						<div class="cba-program-number">01</div>
						<h3>Bachelor of Science in Accountancy</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
					<article class="cba-program-card" data-program="accounting-information-system" data-category="accountancy">
						<div class="cba-program-number">02</div>
						<h3>Bachelor of Science in Accounting Information System</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
					<article class="cba-program-card" data-program="financial-management" data-category="business-administration">
						<div class="cba-program-number">03</div>
						<h3>Bachelor of Science in Business Administration, Major in Financial Management</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
					<article class="cba-program-card" data-program="human-resource-management" data-category="business-administration">
						<div class="cba-program-number">04</div>
						<h3>Bachelor of Science in Business Administration, Major in Human Resource Management</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
					<article class="cba-program-card" data-program="marketing-management" data-category="business-administration">
						<div class="cba-program-number">05</div>
						<h3>Bachelor of Science in Business Administration, Major in Marketing Management</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
					<article class="cba-program-card" data-program="entrepreneurship" data-category="entrepreneurship">
						<div class="cba-program-number">06</div>
						<h3>Bachelor of Science in Entrepreneurship</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
					<article class="cba-program-card" data-program="hospitality-management" data-category="hospitality">
						<div class="cba-program-number">07</div>
						<h3>Bachelor of Science in Hospitality Management</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
					<article class="cba-program-card" data-program="office-administration" data-category="office-administration">
						<div class="cba-program-number">08</div>
						<h3>Bachelor of Science in Office Administration</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
					<article class="cba-program-card" data-program="tourism-management" data-category="tourism">
						<div class="cba-program-number">09</div>
						<h3>Bachelor of Science in Tourism Management</h3>
						<a href="#" class="program-read-more">Read more <span>→</span></a>
					</article>
				</div>
				<p id="noProgramsMessage" style="display:none;">No programs found in this category.</p>
			</div>
		</section>
		<section class="cba-quick-links">
			<div class="container cba-quick-grid">
				<a href="#programs">
					<div class="cba-quick-icon">
						<i data-lucide="graduation-cap"></i>
					</div>
					<div>
						<strong>EXPLORE A PROGRAM</strong>
						<span>Browse programs</span>
					</div>
					<b>→</b>
				</a>
				<a href="#about-college">
					<div class="cba-quick-icon">
						<i data-lucide="book-open"></i>
					</div>
					<div>
						<strong>READ MORE</strong>
						<span>Learn about CBA</span>
					</div>
					<b>→</b>
				</a>
				<a href="contacts.php">
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
						<span>Start your journey</span>
					</div>
					<b>→</b>
				</a>
			</div>
		</section>
	</main>
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
					<p id="programModalVision">Program vision information has not been provided yet.</p>
				</div>
				<div class="program-modal-section">
					<div class="program-modal-section-heading">
						<span class="program-modal-section-line"></span>
						<h3>MISSION</h3>
					</div>
					<p id="programModalMission">Program mission information has not been provided yet.</p>
				</div>
			</div>
			<div class="program-modal-footer">
				<span>UNIVERSITY OF CALOOCAN CITY</span>
			</div>
		</div>
	</div>
	<?php require_once __DIR__ . '/includes/footer.php'; ?>
		<script src="script.js"></script>
	<script src="https://unpkg.com/lucide@latest"></script>
	<script>
		document.addEventListener("DOMContentLoaded",function(){
			if(window.lucide){
				lucide.createIcons();
			}
			const filterButtons=document.querySelectorAll(".cba-filters button");
			const programCards=document.querySelectorAll(".cba-program-card");
			const noProgramsMessage=document.getElementById("noProgramsMessage");
			filterButtons.forEach(function(button){
				button.addEventListener("click",function(){
					const filter=button.dataset.filter;
					let visibleCount=0;
					filterButtons.forEach(function(item){
						item.classList.toggle("active",item===button);
					});
					programCards.forEach(function(card){
						const matches=filter==="all"||card.dataset.category===filter;
						card.style.display=matches?"":"none";
						if(matches){
							visibleCount++;
						}
					});
					noProgramsMessage.style.display=visibleCount===0?"block":"none";
				});
			});
			const modal=document.getElementById("programModal");
			const modalTitle=document.getElementById("programModalTitle");
			const modalVision=document.getElementById("programModalVision");
			const modalMission=document.getElementById("programModalMission");
			const modalNumber=document.getElementById("programModalNumber");
			const programLinks=document.querySelectorAll(".program-read-more");
			const closeButtons=document.querySelectorAll("[data-modal-close]");
			const programDescriptions={
				"accountancy":{
					title:"Bachelor of Science in Accountancy",
					vision:"Program vision information has not been provided yet.",
					mission:"Program mission information has not been provided yet."
				},
				"accounting-information-system":{
					title:"Bachelor of Science in Accounting Information System",
					vision:"Program vision information has not been provided yet.",
					mission:"Program mission information has not been provided yet."
				},
				"financial-management":{
					title:"Bachelor of Science in Business Administration, Major in Financial Management",
					vision:"Program vision information has not been provided yet.",
					mission:"Program mission information has not been provided yet."
				},
				"human-resource-management":{
					title:"Bachelor of Science in Business Administration, Major in Human Resource Management",
					vision:"Program vision information has not been provided yet.",
					mission:"Program mission information has not been provided yet."
				},
				"marketing-management":{
					title:"Bachelor of Science in Business Administration, Major in Marketing Management",
					vision:"Program vision information has not been provided yet.",
					mission:"Program mission information has not been provided yet."
				},
				"entrepreneurship":{
					title:"Bachelor of Science in Entrepreneurship",
					vision:"Program vision information has not been provided yet.",
					mission:"Program mission information has not been provided yet."
				},
				"hospitality-management":{
					title:"Bachelor of Science in Hospitality Management",
					vision:"Program vision information has not been provided yet.",
					mission:"Program mission information has not been provided yet."
				},
				"office-administration":{
					title:"Bachelor of Science in Office Administration",
					vision:"Program vision information has not been provided yet.",
					mission:"Program mission information has not been provided yet."
				},
				"tourism-management":{
					title:"Bachelor of Science in Tourism Management",
					vision:"Program vision information has not been provided yet.",
					mission:"Program mission information has not been provided yet."
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
		});
	</script>
</body>
</html>
