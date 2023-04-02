<div class="row text-center">
	@if(file_exists(public_path('uploads/logo.png')))
		<div class="col-xs-12">
			<img src="/uploads/logo.png" class="img-rounded" alt="Logo" width="150" style="margin-bottom: 30px;">
		</div>
	@else
    	<h1 style="font-size: 30px; font-family:'Times New Roman', Times, serif" class="text-center ">{{ config('app.name', 'ultimatePOS') }}</h1>
    @endif
</div>