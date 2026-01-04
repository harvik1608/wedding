@extends('include.header')
@section('content')
<div class="row sales-cards">
	@if(!$events->isEmpty())
        @foreach($events as $event)
        	<div class="col-xl-3 col-sm-6 col-12 d-flex">
				<div class="card color-info bg-primary flex-fill mb-4">
					<div class="mb-2">
						
					</div>
					<h3 class="counters" data-count="{{ $event->total_guests }}">{{ $event->total_guests }}</h3>
					<p>{{ $event->name }}</p>
				</div>
			</div>
        @endforeach
    @endif
</div>
<script>
	var page_title = "Dashboard";
</script>
@endsection
