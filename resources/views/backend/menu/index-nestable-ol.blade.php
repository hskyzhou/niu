@if($list->isNotEmpty())
	<ol class="dd-list">
		@foreach($list as $info) 
			@include('backend.menu.index-nestable-li', ['info' => $info])
		@endforeach
	</ol>	
@endif

