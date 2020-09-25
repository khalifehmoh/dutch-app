<?php /* Template Name: Dutch Test*/ ?>

			
<?php get_header(); ?>
<script charset="UTF-8">
	var globalData = [];
	function get_data() {
		$.ajax({
			url: "<?php echo admin_url('admin-ajax.php'); ?>",
			data: {
				'action': 'get_dutch_questions'
			},
			type: 'POST', // POST
			success: function (data) {
				globalData = data;
				$('.btn-english-start').prop("disabled", true);
				$('.btn-english-start').removeAttr("disabled");
				$('.btn-english-start').html('بدء');
				var setup = {
					labels: {
						title: 'اختبار اللغة الهولندية',
						progress: ':الإنجاز',
						nextBtn: 'التالي',
						resultBtn: 'إظهار النتيجة',
						yourResult: 'نتيجتك',
						timeTaken: 'مدة الإنهاء',
						wrongAns: 'الإجابات الخاطئة',
						nasoohAdvice: 'روابط من العم نصوح'
					},
					layout: {
						isNashoohAdviceOn: true,
						isTimeLimitOn: true,
						isWrongAnswersOn: true
					},
					feedbackText: `<a href="https://lookinmena.com/دليل-تعلّم-اللغة-الهولندية/" target="_blank">دليل تعلم اللغة الهولندية</a>`
				}
				languageTestLogic(setup, globalData)
			}
		});
	}
	function getResultMessage(totalMark) {
		if (totalMark >= 38 && totalMark <= 50) {
			return "جيد جداً";
		}
		else if (totalMark >= 26 && totalMark <= 37) {
			return "جيد";
		}
		else if (totalMark >= 11 && totalMark <= 25) {
			return "متوسط";
		}
		else if (totalMark <= 10 && totalMark >= 0) {
			return "ضعيف";
		}
	}
	window.onload = get_data()
</script>
<script type="text/javascript" charset="UTF-8" src="<?php bloginfo('template_directory'); ?>/assets/js/language_assesment.js"></script>
		<!-- test -->
		<div class="body_view">
			<!-- PAGE CONTENT -->
			<div id="page-search" ng-controller="profiles_uni_controller">
			<!-- common-language-tests class handles all tests except for the arabic and english -->
				<div class="js-container common-language-tests english-main-con">

					<!--home page-->
					<div class="home-container">
					<div class="row home-sub-con">
							<div class="col-sm-6">
								<img class="img-main-image" src="https://lookinmena.com/wp-content/themes/lookinmena/assets/images/big_logo_test.png" alt="LookInMENA logo">
							</div>
							<div class="col-sm-6">
							<h1 class="home-header prime-color">إختبار اللغة الهولندية</h1>
								<h5 class="home-header-arabic-desc" style="direction: rtl;">المقدم من Look In MENA</h5>
								<p class="home-header-arabic-desc" style="direction: rtl;">
								</p>
								<button type="submit" class="btn-test btn-asses-submit btn-english-start" disabled>
									<span class="questions-loading">
										<div class="lds-facebook">
											<div></div>
											<div></div>
											<div></div>
										</div>
										انتظر قليلا ريثما نجهز لك الأسئلة...
									</span>
								</button>
							</div>

						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	<?php get_footer(); ?>