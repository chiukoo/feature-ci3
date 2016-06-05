<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3640.0651509721924!2d120.66215471498937!3d24.169447784384584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3469162ae1b5fd0f%3A0x118454873ed46d6c!2zNDA35Y-w5Lit5biC6KW_5bGv5Y2A5oiQ6YO96LevMjE5LTLomZ8!5e0!3m2!1szh-TW!2stw!4v1464796709094" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>

<div class="container">
	<div class="contact-content">
		歡迎您有任何問題需求都可以透過電話或電子郵件方式與我們聯繫，只要是有 鼎津節能通風設備有限公司 可以為您服務的機會，我們將會竭盡所能，為您提供最專業的服務，或是填寫以下表單，並註明您的需求，我們將盡快地與您聯繫。
	</div>
	<div class="form contact-form">
		<div class="form-mandatory text-red">填寫聯絡表單： (*)號表示必須填寫</div>
		<div class="form-group">
			<label class="form-label"><span class="text-red">*</span>公司名稱</label>
			<input type="text" class="form-input">
		</div>
		<div class="form-group">
			<label class="form-label"><span class="text-red">*</span>聯絡人</label>
			<input type="text" class="form-input">
		</div>
		<div class="form-group">
			<label class="form-label">地址</label>
			<input type="text" class="form-input">
		</div>
		<div class="form-group">
			<label class="form-label"><span class="text-red">*</span>聯絡電話</label>
			<input type="text" class="form-input">
		</div>
		<div class="form-group">
			<label class="form-label">傳真</label>
			<input type="text" class="form-input">
		</div>
		<div class="form-group">
			<label class="form-label"><span class="text-red">*</span>E-mail</label>
			<input type="email" class="form-input">
		</div>
		<div class="form-group">
			<label class="form-label"><span class="text-red">*</span>驗證碼</label>
			<input type="text" class="form-input form-code">
			<?php echo $captcha; ?>
		</div>
		<div class="form-group">
			<label class="form-label"><span class="text-red">*</span>聯絡主旨</label>
			<input type="text" class="form-input">
		</div>
		<div class="form-group">
			<label class="form-label"><span class="text-red">*</span>內容</label>
			<textarea cols="30" rows="10" class="form-textarea"></textarea>
		</div>
		<div class="form-group form-button">
			<button class="btn-submit">送出</button>
		</div>
	</div>
</div>

<script>
$(function() {
	$( "#captchaId" ).click(function() {
		var captcha = $(this);
		jQuery.ajax({
			url: "contact/changeCaptcha",
			success: function(res) {
				captcha.attr('src', '<?php echo base_url();?>captcha/' + res);
			},
	        error: function(msg){
	            alert(msg);
	        }
		});
	});
});
</script>