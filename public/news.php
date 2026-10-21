<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UCC | News</title>
	<link rel="icon" type="image/png" href="images/UCC2.png">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Oswald:wght@500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="utility.css">
	<link rel="stylesheet" href="news.css">
	<link rel="stylesheet" href="assets/utility-bar.css">
	<link rel="stylesheet" href="assets/navbar.css">
	<link rel="stylesheet" href="assets/footer.css">
</head>
<body>
	<?php include __DIR__ . '/includes/utility-bar.php'; ?>
	<?php include __DIR__ . '/includes/navbar.php'; ?>

	<!-- PAGE DOTS -->
	<div class="page-dots" aria-hidden="true">
		<span class="dot-pattern dot-1"></span>
		<span class="dot-pattern dot-2"></span>
		<span class="dot-pattern dot-3"></span>
		<span class="dot-pattern dot-4"></span>
	</div>

	<!-- NEWS MAIN CONTENT -->
	<main class="news-page">
		<div class="news-decor news-decor-top" aria-hidden="true"></div>
		<div class="news-decor news-decor-right" aria-hidden="true"></div>
		<div class="news-decor news-decor-bottom" aria-hidden="true"></div>

		<section class="news-container">
			<div class="news-heading">
				<div>
					<h1>NEWS</h1>
					<div class="news-heading-line">
						<span></span>
						<i></i>
						<span></span>
					</div>
					<p>Stay updated with the latest news, announcements, achievements, academic developments, and student life at the University of Caloocan City.</p>
				</div>
			</div>

			<div class="news-filters" role="tablist" aria-label="News categories">
				<button type="button" class="news-filter active" data-filter="ALL">ALL</button>
				<button type="button" class="news-filter" data-filter="ANNOUNCEMENTS">ANNOUNCEMENTS</button>
				<button type="button" class="news-filter" data-filter="ACADEMIC">ACADEMIC</button>
				<button type="button" class="news-filter" data-filter="EVENTS">EVENTS</button>
				<button type="button" class="news-filter" data-filter="ACHIEVEMENTS">ACHIEVEMENTS</button>
				<button type="button" class="news-filter" data-filter="STUDENT LIFE">STUDENT LIFE</button>
			</div>

			<section class="news-featured" id="featuredNews"></section>

			<div class="news-section-title">
				<div>
					<span>MORE NEWS</span>
					<div class="news-mini-line">
						<i></i>
						<i></i>
						<i></i>
					</div>
				</div>
			</div>

			<section class="news-grid-wrapper">
				<button type="button" class="news-slider-arrow news-slider-prev" id="newsPrev" aria-label="Previous news">‹</button>
				<div class="news-grid" id="newsGrid"></div>
				<button type="button" class="news-slider-arrow news-slider-next" id="newsNext" aria-label="Next news">›</button>
			</section>

			<div class="news-pagination" id="newsPagination"></div>

			<button type="button" class="news-view-all" id="viewAllNews">
				<span>▤</span>
				VIEW ALL NEWS
			</button>
		</section>
	</main>

	<!-- NEWS MODAL -->
	<div class="news-modal" id="newsModal" aria-hidden="true">
		<div class="news-modal-backdrop" data-news-modal-close></div>
		<div class="news-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="newsModalTitle">
			<div class="news-modal-header">
				<div class="news-modal-heading">
					<span class="news-modal-label" id="newsModalCategory">NEWS</span>
					<h2 id="newsModalTitle">News Title</h2>
				</div>
				<button type="button" class="news-modal-close" data-news-modal-close aria-label="Close news popup">×</button>
			</div>
			<div class="news-modal-body">
				<figure class="news-modal-image">
					<a href="#" id="newsModalImageLink" aria-label="View full-size news image">
						<img id="newsModalImage" src="" alt="">
					</a>
				</figure>
				<div class="news-modal-meta">
					<span class="news-modal-category" id="newsModalCategoryBadge">NEWS</span>
					<span class="news-modal-date" id="newsModalDate">Published</span>
				</div>
				<div class="news-modal-accent"></div>
				<p class="news-modal-placeholder">ARTICLE CONTENT WILL BE ADDED HERE.</p>
			</div>
			<div class="news-modal-footer">
				University of Caloocan City • News
			</div>
		</div>
	</div>

	<!-- FULL-SIZE NEWS IMAGE LIGHTBOX -->
	<div class="news-image-lightbox" id="newsImageLightbox" aria-hidden="true">
		<div class="news-image-lightbox-backdrop" data-news-image-close></div>
		<div class="news-image-lightbox-content">
			<button type="button" class="news-image-lightbox-close" data-news-image-close aria-label="Close full-size image">×</button>
			<img id="newsLightboxImage" src="" alt="">
		</div>
	</div>

	<!-- NEWS SCRIPT -->
	<script>
		const newsData=[
			{title:"UCC - College of Engineering Strengthens Learning Environment with New Drafting Room and Library",category:"ACADEMIC",date:"Published 1 day ago",image:"images/News/NEWS-CollegeofEngineering.jpg"},
			{title:"Congratulations, August 2026 Criminologists Licensure Examination Passers!",category:"ACHIEVEMENTS",date:"Published 1 day ago",image:"images/News/NEWS-2026Criminologists.jpg"},
			{title:"ANNOUNCEMENT | Official Overall List of Qualified Applicants for Enrollment A.Y. 2026-2027",category:"ANNOUNCEMENTS",date:"Published 2 mos ago",image:"images/News/NEWS-QualifiedApplicants.jpg"},
			{title:"OFFICIAL ANNOUNCEMENT | Opening of Classes for the First Semester, Academic Year 2026 to 2027",category:"ANNOUNCEMENTS",date:"Published 2 mos ago",image:"images/News/NEWS-FirstSem.jpg"},
			{title:"University of Caloocan City Surpassed National Passing Rate in May 2026 Certified Public Accountant Licensure Examination (CPALE)",category:"ACHIEVEMENTS",date:"Published 3 mos ago",image:"images/News/NEWS-CPA.jpg"},
			{title:"UCC FRESHMEN ENROLLMENT PROCESS",category:"ANNOUNCEMENTS",date:"Published 3 mos ago",image:"images/News/NEWS-FreshmenEnrollment.jpg"},
			{title:"Celebrating UCC’s Outstanding Criminology Board Achievement!",category:"ACHIEVEMENTS",date:"Published 4 mos ago",image:"images/News/NEWS-CrimBoardAchievement.jpg"},
			{title:"UCC Recognition Day 2026: Honoring Excellence, Inspiring Purpose",category:"EVENTS",date:"Published 4 mos ago",image:"images/News/NEWS-Recognition20206.jpg"},
			{title:"CONGRATULATIONS TO THE 3RD BATCH PASSERS OF UNIVERSITY OF CALOOCAN CITY ADMISSION TEST 2026!",category:"ANNOUNCEMENTS",date:"Published 5 mos ago",image:"images/News/NEWS-3rdBatchPassers.jpg"},
			{title:"Congratulations, Newly Registered Criminologists!",category:"ACHIEVEMENTS",date:"Published 5 mos ago",image:"images/News/NEWS-RegisteredCrim.jpg"},
			{title:"Champions Rise at the UCC - College of Law Debate Council’s Ikalimang Talastasan – Vera Cup 2026",category:"EVENTS",date:"Published 6 mos ago",image:"images/News/NEWS-ChampionsRise.jpg"},
			{title:"Happy National Women’s Month!",category:"EVENTS",date:"Published 6 mos ago",image:"images/News/NEWS-WomensMonth.jpg"},
			{title:"UCCAT 2ND BATCH RESULTS UPDATE",category:"ANNOUNCEMENTS",date:"Published 6 mos ago",image:"images/News/NEWS-2ndBatch.jpg"},
			{title:"CALOOCAN CITY DAY",category:"EVENTS",date:"Published 6 mos ago",image:"images/News/NEWS-CaloocanDay.jpg"},
			{title:"University of Caloocan City Strengthens Community Health Through Successful Blood Letting Activity",category:"EVENTS",date:"Published 6 mos ago",image:"images/News/NEWS-BloodLetting.jpg"},
			{title:"CONGRATULATIONS TO THE 2ND BATCH PASSERS OF UNIVERSITY OF CALOOCAN CITY ADMISSION TEST 2026!",category:"ANNOUNCEMENTS",date:"Published 6 mos ago",image:"images/News/NEWS-2ndBatch2.jpg"},
			{title:"University of Caloocan City - College of Law Testimonial Ceremonies for the 2025 Bar Examination Passers",category:"EVENTS",date:"Published 6 mos ago",image:"images/News/NEWS-Law2025BarPassers.jpg"},
			{title:"University of Caloocan City’s Aspiring Engineers Earn National Recognition at AutoMATHic 2026",category:"ACHIEVEMENTS",date:"Published 6 mos ago",image:"images/News/NEWS-AutoMATHic2026.jpg"},
			{title:"UCC Strengthens Institutional Foundations Through a Benchmarking Visit to Gordon College",category:"ACADEMIC",date:"Published 6 mos ago",image:"images/News/NEWS-GordonCollege.jpg"},
			{title:"University of Caloocan City Earns PRC Recognition for Exemplary Performance in Licensure Exam for Teachers (LET)",category:"ACHIEVEMENTS",date:"Published 7 mos ago",image:"images/News/NEWS-LET.jpg"},
			{title:"ICYMI | University of Caloocan City Health Services",category:"STUDENT LIFE",date:"Published 7 mos ago",image:"images/News/NEWS-HealthService.jpg"},
			{title:"University of Caloocan City Celebrates Collective Success",category:"ACHIEVEMENTS",date:"Published 7 mos ago",image:"images/News/NEWS-CollectiveSuccess.jpg"},
			{title:"ADMISSIONS ANNOUNCEMENT 2026-2",category:"ANNOUNCEMENTS",date:"Published 7 mos ago",image:"images/News/NEWS-Admissions2026-2.jpg"},
			{title:"ADMISSIONS ANNOUNCEMENT 2026-1",category:"ANNOUNCEMENTS",date:"Published 7 mos ago",image:"images/News/NEWS-Admission2026-1.png"},
			{title:"UCC Strengthens Scholarship Programs Through Partnership with Tzu Chi Foundation",category:"ACADEMIC",date:"Published 7 mos ago",image:"images/News/NEWS-TzuChiPartnership.jpg"},
			{title:"UCC - College of Allied Health Sciences: Where Action and Compassion Empower Healthcare Education",category:"ACADEMIC",date:"Published 7 mos ago",image:"images/News/NEWS-AlliedHealthSciences.jpg"},
			{title:"Congratulations, New UCC Lawyers!",category:"ACHIEVEMENTS",date:"Published 7 mos ago",image:"images/News/NEWS-NewUCCLawyers.jpg"},
			{title:"END OF CHRISTMAS BREAK",category:"ANNOUNCEMENTS",date:"Published 8 mos ago",image:"images/News/NEWS-EndofChristmasBreak.png"},
			{title:"UCC Windbreaker Jackets for the Graduating Class of 2026!",category:"STUDENT LIFE",date:"Published 8 mos ago",image:"images/News/NEWS-Windbreaker.jpg"},
			{title:"CONGRATULATIONS TO THE 1ST BATCH PASSERS OF UNIVERSITY OF CALOOCAN CITY ADMISSION TEST 2026!",category:"ANNOUNCEMENTS",date:"Published 8 mos ago",image:"images/News/NEWS-1stBatchPassers.png"},
			{title:"UCC Strengthens Public Service Excellence: University of Caloocan City’s College of Criminal Justice Education Excels in the October 2025 NAPOLCOM Examination",category:"ACHIEVEMENTS",date:"Published 8 mos ago",image:"images/News/NEWS-NAPOLCOM.jpg"},
			{title:"University of Caloocan City among Country’s Top Performing Schools in Licensure Examination for Teachers 2025",category:"ACHIEVEMENTS",date:"Published 8 mos ago",image:"images/News/NEWS-LET2025.jpg"},
			{title:"UCC Advocates Gender Inclusivity: Fostering Safe and Respectful Learning Environments",category:"STUDENT LIFE",date:"Published 8 mos ago",image:"images/News/NEWS-UCCAdvocatesGenderInclusivity.jpg"},
			{title:"University of Caloocan City, WISE Community: World-class, Innovative, Sustainable, and Empowered Faculty",category:"ACADEMIC",date:"Published 8 mos ago",image:"images/News/NEWS-UCCWISECommunity.jpg"},
			{title:"University of Caloocan City - College of Law Recognized as the No. 6 Overall Placement in the Bar Examination 2024!",category:"ACHIEVEMENTS",date:"Published 8 mos ago",image:"images/News/NEWS-UCCLawRecognized.jpg"},
			{title:"ADMISSIONS ANNOUNCEMENT",category:"ANNOUNCEMENTS",date:"Published 8 mos ago",image:"images/News/NEWS-ADMISSIONSANNOUNCEMENT.png"},
			{title:"UCC Advances Toward Excellence: Nine Programs Earn ALCUCOA Candidate Status",category:"ACADEMIC",date:"Published 8 mos ago",image:"images/News/NEWS-UCCAdvancesTowardExcellence.jpg"},
			{title:"Congratulations, Carlstle Rose D. Carulla!",category:"ACHIEVEMENTS",date:"Published 8 mos ago",image:"images/News/NEWS-CongratulationsCarlstleRoseDCarulla.jpg"},
			{title:"UCC Heroes United: Building a Legacy of Collective Excellence",category:"EVENTS",date:"Published 9 mos ago",image:"images/News/NEWS-UCCHeroesUnited.jpg"},
			{title:"The Heart of UCC: Amplifying the Voices That Shape Our WISE Community",category:"EVENTS",date:"Published 9 mos ago",image:"images/News/NEWS-TheHeartOfUCC.jpg"},
			{title:"UCC’s Dedication to Quality Education: Empowering Students towards a WISE Community",category:"ACADEMIC",date:"Published 9 mos ago",image:"images/News/NEWS-UCCsDedicationToQualityEducation.jpg"},
			{title:"UCC in Community Action: Showcasing Community-Extension Excellence",category:"EVENTS",date:"Published 9 mos ago",image:"images/News/NEWS-UCCinCommunityAction.jpg"},
			{title:"Strengthening the WISE Community: UCC’s Continued Pursuit of Excellence Through Accreditation",category:"ACADEMIC",date:"Published 9 mos ago",image:"images/News/NEWS-StrengtheningTheWISECommunity.jpg"},
			{title:"The University of Caloocan City is honored to welcome the esteemed ALCUCOA National Board for its First Preliminary Accreditation Visit on December 1–3, 2025.",category:"ACADEMIC",date:"Published 9 mos ago",image:"images/News/NEWS-ALCUCOANationalBoard.jpg"},
			{title:"Bonifacio Day: Honoring the Father of the Philippine Revolution",category:"EVENTS",date:"Published 9 mos ago",image:"images/News/NEWS-BonifacioDay.jpg"},
			{title:"2nd Semester Begins! How was your first week, UCCians?",category:"STUDENT LIFE",date:"Published 9 mos ago",image:"images/News/NEWS-2ndSemesterBegins.png"},
			{title:"CPAs on the Rise: Congratulations, University of Caloocan City’s CPALE Passers!",category:"ACHIEVEMENTS",date:"Published 9 mos ago",image:"images/News/NEWS-CPAsOnTheRise.jpg"},
			{title:"Collaborative Interdisciplinary Research and Creative Linkages in Education Summit 2025",category:"ACADEMIC",date:"Published 9 mos ago",image:"images/News/NEWS-CollaborativeInterdisciplinary2025.jpg"},
			{title:"Cultivating Culture: UCC Strengthens Its Cultural Vision Through a Landmark Partnership with PETA",category:"EVENTS",date:"Published 9 mos ago",image:"images/News/NEWS-CultivatingCulture.jpg"},
			{title:"Empowering Scholars: UCC and Miao De Bodhisattva Society Foundation Reinforce Their Commitment to Students’ Success",category:"ACADEMIC",date:"Published 9 mos ago",image:"images/News/NEWS-EmpoweringScholars.jpg"},
			{title:"UCC Releases Official ID Policy, Dress Code, and Policy on Self-Expressions: Promoting Inclusivity, Professionalism, and Respect",category:"ANNOUNCEMENTS",date:"Published 9 mos ago",image:"images/News/NEWS-UCCOfficialIDPolicyDressCode.jpg"},
			{title:"Turning Duty into a Dream: UCC Security Guard Finally Earns His Degree",category:"STUDENT LIFE",date:"Published 1 yr ago",image:"images/News/NEWS-news-52.jpg"},
			{title:"CONGRATULATIONS, TEAM ARKO!",category:"ACHIEVEMENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-53.jpg"},
			{title:"UCC ENROLLMENT ADVISORY",category:"ANNOUNCEMENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-54.jpg"},
			{title:"Celebrating Rod's Life",category:"EVENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-55.jpg"},
			{title:"Enrollment Schedules, 1st Semester, AY 2025-2026.",category:"ANNOUNCEMENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-56.jpg"},
			{title:"Congratulations to all UCCAT 2025 Passers!",category:"ANNOUNCEMENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-57.jpg"},
			{title:"UCC PRODUCES 112 PASSERS IN THE MARCH 2025 LET EXAMINATION",category:"ACHIEVEMENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-58.jpg"},
			{title:"UCC at the PSPA Caravan 2025",category:"EVENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-59.jpg"},
			{title:"MESSAGE FROM DR. MARILYN T. DE JESUS, UNIVERSITY PRESIDENT",category:"ANNOUNCEMENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-60.jpg"},
			{title:"Congratulations UCCians Batch 2025!",category:"STUDENT LIFE",date:"Published 1 yr ago",image:"images/News/NEWS-news-61.jpg"},
			{title:"Membership in Professional Organizations",category:"ACADEMIC",date:"Published 1 yr ago",image:"images/News/NEWS-news-62.jpg"},
			{title:"CONGRATULATIONS TO OUR NEWLY REGISTERED CRIMINOLOGISTS!",category:"ACHIEVEMENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-63.jpg"},
			{title:"UCC - College of Education Strengthens Partnership for Localized Tara, Basa Tutoring Program",category:"ACADEMIC",date:"Published 1 yr ago",image:"images/News/NEWS-news-64.jpg"},
			{title:"Congratulations, UCC ROTC Unit!",category:"ACHIEVEMENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-65.jpg"},
			{title:"UCC Officials made a Courtesy Visit to CHED-NCR Director",category:"EVENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-66.jpg"},
			{title:"GIFTS WERE SHARED, MEMORIES WERE MADE: ADOPT A BOX 2025 WRAPPED UP WITH CHILDREN SMILES THAT NEVER FADE!",category:"EVENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-67.jpg"},
			{title:"English-Chinese Department Year-End Summary Meeting: A Joint Festivity between the University of Caloocan City and Huaqiao University",category:"EVENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-68.png"},
			{title:"Mayor Dale Gonzalo “Along” Malapitan Leads Caloocan City Delegation on Official Visit to Huaqiao University, Xiamen City, China",category:"EVENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-69.jpg"},
			{title:"CCJE Week 2024 held in both South and North Campuses",category:"STUDENT LIFE",date:"Published 1 yr ago",image:"images/News/NEWS-news-70.jpg"},
			{title:"Strength, Skill, and Spirit: UCC Heroes Strike Gold and Finish 6th Place at 13th National LCUAA Games 2024",category:"ACHIEVEMENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-71.jpg"},
			{title:"Caloocan City Filipino-Chinese Chamber of Commerce donates Advanced Learning Technology to UCC",category:"ACADEMIC",date:"Published 1 yr ago",image:"images/News/NEWS-news-72.jpg"},
			{title:"Inauguration of University of Caloocan City College of Engineering: A New Era Begins",category:"EVENTS",date:"Published 1 yr ago",image:"images/News/NEWS-news-73.jpg"},
			{title:"UCC to offer BS Social Work program soon",category:"ACADEMIC",date:"Published 2 yrs ago",image:"images/News/NEWS-news-74.jpg"},
			{title:"UCC Students Shine at the International Youth Fellowship (IYF) World Camp 2024",category:"STUDENT LIFE",date:"Published 1 yr ago",image:"images/News/NEWS-news-75.png"},
			{title:"UCC Boosts Employee Excellence with Dynamic Seminar and Team Building Event",category:"EVENTS",date:"Published 2 yrs ago",image:"images/News/NEWS-news-76.jpg"},
			{title:"MARCH 2024 LET RESULTS ARE OUT",category:"ACHIEVEMENTS",date:"Published 2 yrs ago",image:"images/News/NEWS-news-77.jpg"},
			{title:"Celebrating UCC DTHIM Triumph at the Philippine Flair Wars 2024!",category:"ACHIEVEMENTS",date:"Published 2 yrs ago",image:"images/News/NEWS-news-78.jpg"}
		];

		let currentFilter="ALL";
		let currentPage=1;
		let showAllNews=false;
		const itemsPerPage=12;
		const featuredNews=document.getElementById("featuredNews");
		const newsGrid=document.getElementById("newsGrid");
		const newsPagination=document.getElementById("newsPagination");
		const newsPrev=document.getElementById("newsPrev");
		const newsNext=document.getElementById("newsNext");
		const newsFilters=document.querySelectorAll(".news-filter");
		const viewAllNews=document.getElementById("viewAllNews");
		const newsModal=document.getElementById("newsModal");
		const newsModalTitle=document.getElementById("newsModalTitle");
		const newsModalCategory=document.getElementById("newsModalCategory");
		const newsModalCategoryBadge=document.getElementById("newsModalCategoryBadge");
		const newsModalDate=document.getElementById("newsModalDate");
		const newsModalImage=document.getElementById("newsModalImage");
		const newsModalImageLink=document.getElementById("newsModalImageLink");
		const newsImageLightbox=document.getElementById("newsImageLightbox");
		const newsLightboxImage=document.getElementById("newsLightboxImage");

		function getFilteredNews(){
			if(currentFilter==="ALL"){
				return newsData;
			}
			return newsData.filter(news=>news.category===currentFilter);
		}

		function getExcerpt(title){
			if(title.length<=105){
				return title;
			}
			return title.substring(0,105).trim()+"...";
		}

		function createNewsCard(news){
			const newsIndex=newsData.indexOf(news);
			return `
				<article class="news-card">
					<div class="news-card-image">
						<img src="${news.image}" alt="${news.title}" loading="lazy" onerror="this.onerror=null;this.src='images/UCC2.png';">
						<span class="news-card-category">${news.category}</span>
					</div>
					<div class="news-card-content">
						<h3>${news.title}</h3>
						<div class="news-card-date">
							<span>▣</span>
							${news.date}
						</div>
						<div class="news-card-line"></div>
						<a href="#" class="news-card-button" data-news-index="${newsIndex}">
							READ MORE <span>→</span>
						</a>
					</div>
				</article>
			`;
		}

		function renderFeatured(){
			const items=getFilteredNews();
			if(!items.length){
				featuredNews.innerHTML=`
					<div class="news-featured-content" style="grid-column:1/-1;text-align:center;">
						<h2>No news found</h2>
						<p>There are currently no news articles under this category.</p>
					</div>
				`;
				return;
			}
			const news=items[0];
			const newsIndex=newsData.indexOf(news);
			featuredNews.innerHTML=`
				<div class="news-featured-image">
					<img src="${news.image}" alt="${news.title}" onerror="this.onerror=null;this.src='images/UCC2.png';">
				</div>
				<div class="news-featured-content">
					<div class="news-featured-glow"></div>
					<span class="news-badge">${news.category}</span>
					<h2>${news.title}</h2>
					<div class="news-meta">
						<span>▣</span>
						<strong>${news.date}</strong>
					</div>
					<div class="news-gold-divider"></div>
					<p>${getExcerpt(news.title)}</p>
					<a href="#" class="news-read-more news-featured-read-more" data-news-index="${newsIndex}">
						READ MORE <span>→</span>
					</a>
				</div>
			`;
		}

		function renderCards(){
			const items=getFilteredNews();
			const cardItems=items.slice(1);
			const totalPages=Math.ceil(cardItems.length/itemsPerPage);

			if(showAllNews){
				newsGrid.innerHTML=cardItems.length?cardItems.map(news=>createNewsCard(news)).join(""):`<div class="news-empty"><h3>No news available</h3><p>There are no news articles in this category.</p></div>`;
				newsPagination.innerHTML="";
				newsPrev.style.display="none";
				newsNext.style.display="none";
				return;
			}

			if(currentPage>totalPages){
				currentPage=totalPages||1;
			}

			const start=(currentPage-1)*itemsPerPage;
			const pageItems=cardItems.slice(start,start+itemsPerPage);

			if(!pageItems.length){
				newsGrid.innerHTML=`
					<div class="news-empty">
						<h3>No news available</h3>
						<p>There are no news articles in this category.</p>
					</div>
				`;
			}else{
				newsGrid.innerHTML=pageItems.map(news=>createNewsCard(news)).join("");
			}

			renderPagination(totalPages);
			updateArrowButtons(totalPages);
		}

		function renderPagination(totalPages){
			newsPagination.innerHTML="";
			if(showAllNews||totalPages<=1){
				return;
			}

			const previous=document.createElement("button");
			previous.type="button";
			previous.className="news-page-arrow";
			previous.innerHTML="‹ PREVIOUS";
			previous.disabled=currentPage===1;
			previous.addEventListener("click",()=>{
				if(currentPage>1){
					currentPage--;
					renderCards();
					attachNewsModalTriggers();
					scrollToNewsPage();
				}
			});
			newsPagination.appendChild(previous);

			for(let i=1;i<=totalPages;i++){
				const button=document.createElement("button");
				button.type="button";
				button.className="news-page-number";
				if(i===currentPage){
					button.classList.add("active");
				}
				button.textContent=i;
				button.addEventListener("click",()=>{
					currentPage=i;
					renderCards();
					attachNewsModalTriggers();
					scrollToNewsPage();
				});
				newsPagination.appendChild(button);
			}

			const next=document.createElement("button");
			next.type="button";
			next.className="news-page-arrow";
			next.innerHTML="NEXT ›";
			next.disabled=currentPage===totalPages;
			next.addEventListener("click",()=>{
				if(currentPage<totalPages){
					currentPage++;
					renderCards();
					attachNewsModalTriggers();
					scrollToNewsPage();
				}
			});
			newsPagination.appendChild(next);
		}

		function updateArrowButtons(totalPages){
			if(showAllNews||totalPages<=1){
				newsPrev.style.display="none";
				newsNext.style.display="none";
				return;
			}
			newsPrev.style.display="";
			newsNext.style.display="";
			newsPrev.disabled=currentPage===1;
			newsNext.disabled=currentPage===totalPages;
		}

		function scrollToNewsPage(){
			const newsPage=document.querySelector(".news-page");
			if(!newsPage){
				return;
			}
			const top=newsPage.getBoundingClientRect().top+window.pageYOffset-20;
			window.scrollTo({
				top:top,
				behavior:"smooth"
			});
		}

		function setActiveFilter(selectedButton){
			newsFilters.forEach(button=>{
				button.classList.remove("active");
			});
			if(selectedButton){
				selectedButton.classList.add("active");
			}
		}

		function updateViewAllButton(){
			if(showAllNews){
				viewAllNews.innerHTML="<span>▤</span> SHOW LESS NEWS";
			}else{
				viewAllNews.innerHTML="<span>▤</span> VIEW ALL NEWS";
			}
		}

		function openNewsModal(index){
			const news=newsData[index];
			if(!news){
				return;
			}
			newsModalTitle.textContent=news.title;
			newsModalCategory.textContent=news.category;
			newsModalCategoryBadge.textContent=news.category;
			newsModalDate.textContent=news.date;
			newsModalImage.src=news.image;
			newsModalImage.alt=news.title;
			newsModalImageLink.href=news.image;
			newsModalImageLink.dataset.image=news.image;
			newsModal.classList.add("active");
			newsModal.setAttribute("aria-hidden","false");
			document.body.classList.add("news-modal-open");
		}

		function closeNewsModal(){
			closeNewsImageLightbox();
			newsModal.classList.remove("active");
			newsModal.setAttribute("aria-hidden","true");
			document.body.classList.remove("news-modal-open");
		}

		function attachNewsModalTriggers(){
			document.querySelectorAll("[data-news-index]").forEach(button=>{
				button.addEventListener("click",event=>{
					event.preventDefault();
					event.stopPropagation();
					openNewsModal(Number(button.dataset.newsIndex));
				});
			});
		}

		function openNewsImageLightbox(){
			const image=newsModalImageLink.dataset.image;
			if(!image){
				return;
			}
			newsLightboxImage.src=image;
			newsLightboxImage.alt=newsModalImage.alt;
			newsImageLightbox.classList.add("active");
			newsImageLightbox.setAttribute("aria-hidden","false");
		}

		function closeNewsImageLightbox(){
			newsImageLightbox.classList.remove("active");
			newsImageLightbox.setAttribute("aria-hidden","true");
			newsLightboxImage.src="";
		}

		newsModalImageLink.addEventListener("click",event=>{
			event.preventDefault();
			event.stopPropagation();
			openNewsImageLightbox();
		});

		newsImageLightbox.addEventListener("click",event=>{
			if(event.target.closest("[data-news-image-close]")){
				closeNewsImageLightbox();
			}
		});

		newsFilters.forEach(button=>{
			button.addEventListener("click",()=>{
				currentFilter=button.dataset.filter;
				currentPage=1;
				showAllNews=false;
				setActiveFilter(button);
				updateViewAllButton();
				renderFeatured();
				renderCards();
				attachNewsModalTriggers();
				window.scrollTo({
					top:document.querySelector(".news-page").offsetTop-20,
					behavior:"smooth"
				});
			});
		});

		newsPrev.addEventListener("click",()=>{
			if(currentPage>1&&!showAllNews){
				currentPage--;
				renderCards();
				attachNewsModalTriggers();
				scrollToNewsPage();
			}
		});

		newsNext.addEventListener("click",()=>{
			const cardItems=getFilteredNews().slice(1);
			const totalPages=Math.ceil(cardItems.length/itemsPerPage);
			if(currentPage<totalPages&&!showAllNews){
				currentPage++;
				renderCards();
				attachNewsModalTriggers();
				scrollToNewsPage();
			}
		});

		viewAllNews.addEventListener("click",()=>{
			if(showAllNews){
				showAllNews=false;
				currentPage=1;
				updateViewAllButton();
				renderFeatured();
				renderCards();
				attachNewsModalTriggers();
				scrollToNewsPage();
				return;
			}
			currentFilter="ALL";
			currentPage=1;
			showAllNews=true;
			const allButton=document.querySelector('.news-filter[data-filter="ALL"]');
			setActiveFilter(allButton);
			updateViewAllButton();
			renderFeatured();
			renderCards();
			attachNewsModalTriggers();
		});

		newsModal.addEventListener("click",event=>{
			if(event.target.closest("[data-news-modal-close]")){
				closeNewsModal();
			}
		});

		document.addEventListener("keydown",event=>{
			if(event.key==="Escape"){
				if(newsImageLightbox.classList.contains("active")){
					closeNewsImageLightbox();
					return;
				}
				if(newsModal.classList.contains("active")){
					closeNewsModal();
				}
			}
		});

		renderFeatured();
		renderCards();
		updateViewAllButton();
		attachNewsModalTriggers();
	</script>

	<!-- SHARED FOOTER -->
	<?php include __DIR__ . '/includes/footer.php'; ?>

	<button class="back-top" id="backTop" aria-label="Back to top">↑</button>

	<!-- SCRIPTS -->
	<script src="script.js"></script>
	<script src="https://unpkg.com/lucide@latest"></script>
	<script>
		lucide.createIcons();
	</script>
</body>
</html>
