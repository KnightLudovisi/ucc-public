<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UCC | Student Life</title>
	<link rel="icon" type="image/png" href="images/UCC2.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="utility.css">
	<link rel="stylesheet" href="assets/utility-bar.css">
	<link rel="stylesheet" href="assets/navbar.css">
	<link rel="stylesheet" href="assets/footer.css">
	<style>
		.student-modal{
			position:fixed;
			inset:0;
			z-index:9999;
			display:flex;
			align-items:center;
			justify-content:center;
			padding:30px;
			visibility:hidden;
			opacity:0;
			pointer-events:none;
			transition:opacity .3s ease,visibility .3s ease;
		}
		.student-modal.active{
			visibility:visible;
			opacity:1;
			pointer-events:auto;
		}
		.student-modal-backdrop{
			position:absolute;
			inset:0;
			background:rgba(0,35,25,.72);
			backdrop-filter:blur(8px);
			-webkit-backdrop-filter:blur(8px);
		}
		.student-modal-dialog{
			position:relative;
			width:min(920px,100%);
			max-height:calc(100vh - 60px);
			background:#fbfcfa;
			border:1px solid rgba(7,95,73,.15);
			box-shadow:0 30px 80px rgba(0,31,22,.35);
			overflow:hidden;
			transform:translateY(25px) scale(.97);
			transition:transform .35s cubic-bezier(.22,1,.36,1);
			z-index:2;
			display:flex;
			flex-direction:column;
		}
		.student-modal.active .student-modal-dialog{
			transform:translateY(0) scale(1);
		}
		.student-modal-close{
			position:absolute;
			top:18px;
			right:18px;
			z-index:5;
			width:42px;
			height:42px;
			border:1px solid rgba(255,255,255,.4);
			background:rgba(0,55,39,.88);
			color:#fff;
			display:flex;
			align-items:center;
			justify-content:center;
			cursor:pointer;
			transition:background .25s ease,transform .25s ease;
		}
		.student-modal-close:hover{
			background:var(--gold,#e5b548);
			color:#073d2d;
			transform:rotate(90deg);
		}
		.student-modal-close svg{
			width:19px;
			height:19px;
		}
		.student-modal-header{
			padding:42px 55px 30px;
			background:linear-gradient(135deg,#003f2a,#075f49);
			color:#fff;
			position:relative;
			overflow:hidden;
		}
		.student-modal-header::after{
			content:"";
			position:absolute;
			width:240px;
			height:240px;
			right:-90px;
			top:-110px;
			border:1px solid rgba(229,181,72,.28);
			border-radius:50%;
			box-shadow:0 0 0 25px rgba(229,181,72,.04),0 0 0 50px rgba(229,181,72,.025);
		}
		.student-modal-header-line{
			width:48px;
			height:4px;
			background:var(--gold,#e5b548);
			margin-bottom:18px;
		}
		.student-modal-category{
			display:block;
			font-family:"Manrope",sans-serif;
			font-size:11px;
			font-weight:800;
			letter-spacing:2px;
			color:#f2ca68;
			margin-bottom:10px;
		}
		.student-modal-header h2{
			max-width:760px;
			margin:0;
			font-family:"Oswald",sans-serif;
			font-size:clamp(30px,4vw,48px);
			line-height:1.05;
			font-weight:600;
			text-transform:uppercase;
			letter-spacing:.2px;
			padding-right:40px;
		}
		.student-modal-meta{
			display:flex;
			align-items:center;
			gap:8px;
			margin-top:20px;
			font-family:"Manrope",sans-serif;
			font-size:12px;
			color:rgba(255,255,255,.75);
		}
		.student-modal-meta svg{
			width:16px;
			height:16px;
			color:#f2ca68;
		}
		.student-modal-image-wrap{
			width:100%;
			max-height:320px;
			overflow:hidden;
			background:#eaf3f0;
			display:none;
		}
		.student-modal-image-wrap.has-image{
			display:block;
		}
		.student-modal-image-wrap img{
			display:block;
			width:100%;
			height:320px;
			object-fit:cover;
		}
		.student-modal-body{
			padding:38px 55px 42px;
			overflow-y:auto;
			color:#263d38;
			font-family:"Manrope",sans-serif;
			font-size:15px;
			line-height:1.8;
		}
		.student-modal-body h3{
			margin:25px 0 9px;
			font-family:"Oswald",sans-serif;
			font-size:23px;
			line-height:1.2;
			letter-spacing:.4px;
			color:#075f49;
			text-transform:uppercase;
		}
		.student-modal-body h3:first-child{
			margin-top:0;
		}
		.student-modal-body p{
			margin:0 0 17px;
		}
		.student-modal-body ul{
			margin:0 0 20px;
			padding-left:23px;
		}
		.student-modal-body li{
			margin-bottom:7px;
		}
		.student-modal-body strong{
			color:#075f49;
		}
		.student-modal-body .modal-highlight{
			margin:22px 0;
			padding:20px 22px;
			border-left:4px solid #e5b548;
			background:#f1f6f3;
		}
		.student-modal-body .modal-video-link{
			display:inline-flex;
			align-items:center;
			gap:9px;
			padding:12px 18px;
			margin-top:8px;
			background:#075f49;
			color:#fff;
			text-decoration:none;
			font-size:12px;
			font-weight:800;
			letter-spacing:1px;
			transition:background .25s ease,transform .25s ease;
		}
		.student-modal-body .modal-video-link:hover{
			background:#e5b548;
			color:#073d2d;
			transform:translateY(-2px);
		}
		.student-modal-body .modal-video-link svg{
			width:16px;
			height:16px;
		}
		.student-modal-footer{
			min-height:66px;
			padding:0 55px;
			border-top:1px solid rgba(7,95,73,.12);
			display:flex;
			align-items:center;
			justify-content:space-between;
			gap:20px;
			background:#fff;
			font-family:"Manrope",sans-serif;
			font-size:10px;
			font-weight:800;
			letter-spacing:1.5px;
			color:#71817c;
		}
		.student-modal-footer a{
			display:inline-flex;
			align-items:center;
			gap:7px;
			color:#075f49;
			text-decoration:none;
			transition:color .2s ease;
		}
		.student-modal-footer a:hover{
			color:#d49d21;
		}
		.student-modal-footer svg{
			width:14px;
			height:14px;
		}
		body.modal-open{
			overflow:hidden;
		}
		.student-modal-trigger{
			cursor:pointer;
		}
	</style>
</head>
<body>
<div class="page-dots" aria-hidden="true">
	<span class="dot-pattern dot-1"></span>
	<span class="dot-pattern dot-2"></span>
	<span class="dot-pattern dot-3"></span>
	<span class="dot-pattern dot-4"></span>
</div>

<?php include __DIR__ . '/includes/utility-bar.php'; ?>
<?php include __DIR__ . '/includes/navbar.php'; ?>

<!-- STUDENT LIFE MAIN CONTENT -->
<main class="student-life-page">
	<div class="student-life-container">
		<!-- PAGE HEADER -->
		<div class="student-life-heading reveal">
			<div>
				<span class="student-life-eyebrow">UCC COMMUNITY</span>
				<h1>STUDENT LIFE</h1>
			</div>
			<div class="student-life-heading-line"></div>
		</div>
		<section class="student-life-top-grid">
			<!-- LARGE FEATURED CARD -->
			<article class="student-card student-card-featured reveal student-modal-trigger" data-article="osas">
				<div class="student-card-content">
					<span class="student-category">STUDENT SUPPORT</span>
					<h2>
						THE OFFICE OF<br>
						STUDENT AFFAIRS<br>
						AND SERVICES
					</h2>
					<div class="student-meta">
						<i data-lucide="calendar-days"></i>
						<span>Published 1 year ago</span>
					</div>
					<p>
						To support and empower students’ academic and
						extracurricular development by providing maximum
						support student services and a conducive
						environment for students.
					</p>
					<a href="#" class="student-read-more" data-modal-trigger="osas">
						<span>READ MORE</span>
						<span class="student-arrow">→</span>
					</a>
				</div>
				<div class="student-card-image student-card-image-osass">
					<img src="images/OSAS-LOGO.png" alt="Office of Student Affairs and Services">
				</div>
			</article>
			<!-- SECONDARY CARD -->
			<article class="student-card student-card-light reveal student-modal-trigger" data-article="organizations">
				<div class="student-card-light-content">
					<span class="student-category student-category-dark">STUDENT ORGANIZATIONS</span>
					<h2>
						LIST OF ACCREDITED<br>
						STUDENT ORGANIZATIONS
					</h2>
					<div class="student-meta student-meta-dark">
						<i data-lucide="calendar-days"></i>
						<span>Published 1 year ago</span>
					</div>
					<p>
						Supreme Student Council, The New Crossroad,
						College of Education Council, BECED Council and
						other accredited student organizations of UCC.
					</p>
					<a href="#" class="student-read-more student-read-more-dark" data-modal-trigger="organizations">
						<span>READ MORE</span>
						<span class="student-arrow student-arrow-outline">→</span>
					</a>
				</div>
				<div class="student-org-graphic">
					<div class="org-person org-main">
						<i data-lucide="user-round"></i>
					</div>
					<div class="org-line org-line-main"></div>
					<div class="org-children">
						<span><i data-lucide="user-round"></i></span>
						<span><i data-lucide="user-round"></i></span>
						<span><i data-lucide="user-round"></i></span>
						<span><i data-lucide="user-round"></i></span>
						<span><i data-lucide="user-round"></i></span>
						<span><i data-lucide="user-round"></i></span>
					</div>
				</div>
			</article>
		</section>
		<!-- LCUAA -->
		<article class="student-card student-card-wide reveal student-modal-trigger" data-article="lcuaa">
			<div class="student-wide-image">
				<img src="images/UCC-LCUAA-2025.png" alt="UCC Heroes LCUAA 2025">
			</div>
			<div class="student-wide-overlay"></div>
			<div class="student-wide-content">
				<span class="student-category student-category-green">CAMPUS ATHLETICS</span>
				<h2>
					UCC HEROES DOMINATE
					LCUAA 2025:
					<span>A CELEBRATION OF EXCELLENCE AND HEART</span>
				</h2>
				<div class="student-meta student-meta-light">
					<i data-lucide="calendar-days"></i>
					<span>Published 9 months ago</span>
				</div>
				<p>
					With unwavering determination, discipline, and the
					spirit of sportsmanship, the University of Caloocan
					City Heroes continue to make UCC proud.
				</p>
				<a href="#" class="student-read-more student-read-more-wide" data-modal-trigger="lcuaa">
					<span>READ MORE</span>
					<span class="student-arrow">→</span>
				</a>
			</div>
		</article>
		<section class="student-life-bottom-grid">
			<!-- SPORTS DEVELOPMENT -->
			<article class="student-card student-card-bottom reveal student-modal-trigger" data-article="heroes">
				<div class="student-bottom-content">
					<span class="student-category">SPORTS DEVELOPMENT</span>
					<h2>
						Heroes’ Center for<br>
						Sports Development
					</h2>
					<div class="student-meta student-meta-dark">
						<i data-lucide="calendar-days"></i>
						<span>Published 1 year ago</span>
					</div>
					<p>
						VISIONA sports development program anchored on
						institutional UCCian values and culture that is
						pro-sports.
					</p>
					<a href="#" class="student-read-more student-read-more-dark" data-modal-trigger="heroes">
						<span>READ MORE</span>
						<span class="student-arrow student-arrow-outline">→</span>
					</a>
				</div>
				<div class="student-bottom-image">
					<img src="images/UCC-HEROES.jpg" alt="Heroes Center for Sports Development">
				</div>
			</article>
			<!-- COMMUNITY EDUCATION -->
			<article class="student-card student-card-bottom reveal student-modal-trigger" data-article="batang">
				<div class="student-bottom-content">
					<span class="student-category">COMMUNITY EDUCATION</span>
					<h2>
						Dekalidad na Edukasyon<br>
						para sa bawat Batang<br>
						Kankaloo
					</h2>
					<div class="student-meta student-meta-dark">
						<i data-lucide="calendar-days"></i>
						<span>Published 2 years ago</span>
					</div>
					<p>
						Click here to learn more about the University's
						programs and initiatives for the children and
						community of Caloocan.
					</p>
					<a href="#" class="student-read-more student-read-more-dark" data-modal-trigger="batang">
						<span>READ MORE</span>
						<span class="student-arrow student-arrow-outline">→</span>
					</a>
				</div>
				<div class="student-bottom-image">
					<img src="images/Batang-Kankaloo.jpg" alt="Batang Kankaloo community education">
				</div>
			</article>
		</section>
	</div>
</main>

<!-- STUDENT LIFE ARTICLE MODAL -->
<div class="student-modal" id="studentModal" aria-hidden="true">
	<div class="student-modal-backdrop" data-modal-close></div>
	<div class="student-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="studentModalTitle">
		<div class="student-modal-header">
			<div class="student-modal-heading">
				<span class="student-modal-label" id="studentModalCategory">STUDENT SUPPORT</span>
				<span class="student-modal-number" id="studentModalNumber">01</span>
			</div>
			<button class="student-modal-close" type="button" aria-label="Close" data-modal-close>×</button>
		</div>
		<div class="student-modal-body">
			<div class="student-modal-accent"></div>
			<h2 id="studentModalTitle"></h2>
			<div id="studentModalContent"></div>
		</div>
		<div class="student-modal-footer">
			<span>UNIVERSITY OF CALOOCAN CITY</span>
		</div>
	</div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>

<button class="back-top" id="backTop" aria-label="Back to top">↑</button>
<script src="script.js"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>lucide.createIcons();</script>

<script>
	const studentModal=document.getElementById("studentModal");
	const studentModalCategory=document.getElementById("studentModalCategory");
	const studentModalNumber=document.getElementById("studentModalNumber");
	const studentModalTitle=document.getElementById("studentModalTitle");
	const studentModalContent=document.getElementById("studentModalContent");
	const studentArticles={
		osas:{
			category:"STUDENT SUPPORT",
			title:"THE OFFICE OF STUDENT AFFAIRS AND SERVICES",
			content:`
				<h3>Vision</h3>
				<p>To support and empower the students’ academic and extracurricular development. Provide maximum support to student services and a conducive environment for students by elevating security services and opportunities.</p>
				<h3>Mission</h3>
				<p>To provide optimum support to the students for their physical, academic and mental development, to foster maximum partnership to all services for students, in order to develop holistic personality among the students to nurture discipline, love for country, excellence, integrity, competitiveness and global mindset.</p>
				<h3>Common Services</h3>
				<ul>
					<li><strong>Academic Advising</strong> — Guidance on course selection, degree requirements, and academic planning.</li>
					<li><strong>Counseling Services</strong> — Mental health support, counseling, and therapy.</li>
					<li><strong>Career Services</strong> — Career counseling, job search assistance, internships, and resume building.</li>
					<li><strong>Student Activities</strong> — Organizing extracurricular events, clubs, and student organizations.</li>
					<li><strong>Financial Aid</strong> — Assistance with scholarships, grants, and financial planning.</li>
					<li><strong>Health Services</strong> — Medical care, wellness programs, and health education.</li>
					<li><strong>Disability Services</strong> — Support for students with disabilities, including accommodations and resources.</li>
					<li><strong>Student Conduct</strong> — Handling behavioral issues and enforcement of student codes of conduct.</li>
				</ul>
			`
		},
		organizations:{
			category:"STUDENT ORGANIZATIONS",
			title:"LIST OF ACCREDITED STUDENT ORGANIZATIONS",
			content:`
				<p>UCC has a diverse community of accredited student organizations that provide opportunities for leadership, academic engagement, professional development, community involvement, and student activities.</p>
				<h3>Supreme Student Council</h3>
				<ul>
					<li>Supreme Student Council</li>
					<li>The New Crossroad</li>
				</ul>
				<h3>College of Education</h3>
				<ul>
					<li>College of Education Council</li>
					<li>BECED Council</li>
					<li>BSE English Council</li>
					<li>BSE Science Council</li>
					<li>BTLED Home Economics Council</li>
				</ul>
				<h3>College of Business and Accountancy</h3>
				<ul>
					<li>College of Business and Accountancy Council</li>
					<li>Junior Philippine Institute of Accountant</li>
					<li>Accounting Information System Youth Associates</li>
					<li>Young Entrepreneurs Society</li>
					<li>Junior Marketing Association</li>
					<li>Junior Financial Executives</li>
					<li>Human Resource Management Society</li>
					<li>Philippine Association of Students in Office Administration</li>
					<li>Council of Hospitality Industry Management Students</li>
					<li>Society of Tourism Advocates and Representatives</li>
					<li>Tourism Organization of Uccians for the Refinement of Student Leaders</li>
				</ul>
				<h3>College of Liberal Arts and Sciences</h3>
				<ul>
					<li>College of Liberal Arts and Sciences Council</li>
					<li>BS Math Council</li>
					<li>Psychology Society</li>
					<li>Association of Computer E-Students</li>
					<li>Communication Advocates Council</li>
					<li>Bachelor of Public Administration Society</li>
					<li>Alliance of Students for the Advancement of Politics</li>
				</ul>
				<h3>College of Criminal Justice Education</h3>
				<ul>
					<li>Association of Students in Law Enforcement Administration</li>
				</ul>
				<h3>Non-Academic Organization</h3>
				<ul>
					<li>Center for UCC’s Best Entertainers</li>
					<li>Physical Education Club</li>
					<li>Student Association of Books and Library Advocates</li>
					<li>Rotaract Club of University of Caloocan City</li>
					<li>Rotaract Club of UCC CBA</li>
					<li>Bayanihan Youth for Peace UCC</li>
					<li>Advance Life Saver and Emergency Response Team</li>
					<li>Peer Counseling Club</li>
					<li>Dance Troupe</li>
					<li>Campus Christian Ministry</li>
				</ul>
			`
		},
		lcuaa:{
			category:"CAMPUS ATHLETICS",
			title:"UCC HEROES DOMINATE LCUAA 2025: A CELEBRATION OF EXCELLENCE AND HEART",
			content:`
				<p>With unwavering determination, discipline, and the spirit of sportsmanship, the University of Caloocan City Heroes continue to make UCC proud.</p>
				<p>Showcasing both skill and heart, the UCC delegation brought home an impressive <strong>12 gold, 1 silver, and 17 bronze medals</strong> across Karatedo, Arnis, Taekwondo, and Chess events.</p>
				<h3>Gold Medalists</h3>
				<p><strong>Karatedo</strong></p>
				<ul>
					<li>Team Women’s Kata — Jasmine P. Delos Santos, Mechelle Ann I. David, Whenaseph Excekiel G. Macalino</li>
					<li>Individual Women’s Kumite 68kg — Zharina Hariannel Kate R. Amul</li>
					<li>Individual Men’s Kumite 75kg — Kane Joel P. Lacaba</li>
					<li>Individual Men’s Kumite 84kg — Phoebe Mar T. Arevalo</li>
					<li>Team Women’s Kumite — Sandrine Miles V. Accad, Zharina Hariannel Kate R. Amul, Ma. Theresa C. Calderon, Mechelle Ann I. David</li>
				</ul>
				<p><strong>Chess</strong></p>
				<ul>
					<li>Individual Men’s Category — Alfredo Sanger III</li>
				</ul>
				<p><strong>Arnis</strong></p>
				<ul>
					<li>Individual Women’s Double Identical Weapon Anyo — Angelie Ganuhay</li>
					<li>Individual Women’s Sword and Dagger Anyo — Angelie Ganuhay</li>
					<li>Men’s Welterweight Full Contact — Cyruss Jhiro Aguila</li>
					<li>Men’s Super Heavyweight Full Contact — Ivan Vera</li>
					<li>Men’s Cruiserweight Full Contact — Erjon Jebb Gacho</li>
					<li>Women’s Heavyweight Full Contact — Annia Alexa Matias</li>
				</ul>
				<h3>Silver Medalist</h3>
				<p><strong>Karatedo</strong></p>
				<ul>
					<li>Individual Men’s Kumite 60kg — Candelario Guban</li>
				</ul>
				<h3>Bronze Medalists</h3>
				<p><strong>Karatedo</strong></p>
				<ul>
					<li>Individual Men’s Kata — Rolan James G. Santos</li>
					<li>Individual Women’s Kata — Jasmine P. Delos Santos</li>
					<li>Individual Men’s Kumite 67kg — Liam James B. Yu</li>
					<li>Individual Women’s Kumite 64kg — Francine Nichole G. Vargas</li>
					<li>Individual Women’s Kumite 50kg — Mechelle Ann I. David</li>
				</ul>
				<p><strong>Taekwondo</strong></p>
				<ul>
					<li>Kyorugi Fin Category — Rafael N. Aquino</li>
					<li>Kyorugi Fly Category — John Bob A. Domingo</li>
					<li>Kyorugi Welterweight Category — Ralph Laurence N. Quilanita</li>
					<li>Kyorugi Heavyweight Category — Kaycee Marc G. Oco</li>
				</ul>
				<p><strong>Chess</strong></p>
				<ul>
					<li>Individual Men’s Category — Eddion Derek Cagomoc</li>
					<li>Individual Women’s Category — Hannah Cabarrubias</li>
				</ul>
				<p><strong>Arnis</strong></p>
				<ul>
					<li>Men’s Bantamweight Full Contact — Kimuel Macaraeg</li>
					<li>Men’s Middleweight Full Contact — King Rowland Dela Rama</li>
					<li>Men’s Heavyweight Full Contact — Bruce Dosayla</li>
					<li>Men’s Featherweight Full Contact — Arvin Tiamson</li>
					<li>Women’s Flyweight Full Contact — Sophia Marie Gruezo</li>
					<li>Women’s Cruiserweight Full Contact — Tweetie Furio</li>
				</ul>
				<h3>Chess Team Champions</h3>
				<p><strong>Men’s Team Category</strong></p>
				<ul>
					<li>Alfredo Sanger III</li>
					<li>Vincent Arevalo</li>
					<li>Mark Cielo Janario</li>
					<li>Christophen Monte</li>
					<li>Eddion Derek Cagomoc</li>
				</ul>
				<br>
				<p>Each triumph, whether individual or team—embodies the passion, perseverance, and pride of every UCC Hero who competed with courage and heart.</p>
				<p>Your remarkable achievements have once again brought honor and glory to the University of Caloocan City.</p>
			`
		},
		heroes:{
			category:"SPORTS DEVELOPMENT",
			title:"HEROES’ CENTER FOR SPORTS DEVELOPMENT",
			content:`
				<div class="modal-highlight">The original UCC post for this article is currently unavailable and returns a 404 Not Found response.</div>
				<p>VISIONA sports development program anchored on institutional UCCian values and culture that is pro-sports.</p>
			`
		},
		batang:{
			category:"COMMUNITY EDUCATION",
			title:"DEKALIDAD NA EDUKASYON PARA SA BAWAT BATANG KANKALOO",
			content:`
				<p>Click here to learn more about the University's programs and initiatives for the children and community of Caloocan.</p>
				<div class="modal-highlight">The original UCC post provides a video resource for this initiative.</div>
				<a class="modal-video-link" href="https://drive.google.com/file/d/1aAqEBDd3tN-jFwe-aGzSZ89YWAPxKtoz/view?usp=sharing" target="_blank" rel="noopener noreferrer">WATCH THE FEATURE VIDEO</a>
			`
		}
	};
	function openStudentModal(articleId){
		const article=studentArticles[articleId];
		if(!article)return;
		studentModalCategory.textContent=article.category;
		studentModalNumber.textContent=article.number;
		studentModalTitle.textContent=article.title;
		studentModalContent.innerHTML=article.content;
		studentModal.classList.add("show");
		studentModal.setAttribute("aria-hidden","false");
		document.body.classList.add("student-modal-open");
		const modalBody=studentModal.querySelector(".student-modal-body");
		modalBody.scrollTop=0;
	}
	function closeStudentModal(){
		studentModal.classList.remove("show");
		studentModal.setAttribute("aria-hidden","true");
		document.body.classList.remove("student-modal-open");
	}
	document.querySelectorAll(".student-modal-trigger").forEach(card=>{
		card.addEventListener("click",function(event){
			if(event.target.closest("a"))return;
			openStudentModal(this.dataset.article);
		});
	});
	document.querySelectorAll("[data-modal-trigger]").forEach(button=>{
		button.addEventListener("click",function(event){
			event.preventDefault();
			event.stopPropagation();
			openStudentModal(this.dataset.modalTrigger);
		});
	});
	document.querySelectorAll("[data-modal-close]").forEach(button=>{
		button.addEventListener("click",closeStudentModal);
	});
	document.addEventListener("keydown",function(event){
		if(event.key==="Escape"&&studentModal.classList.contains("show")){
			closeStudentModal();
		}
	});
</script>
</body>
</html>
