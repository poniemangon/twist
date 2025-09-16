@if (!empty(getSponsors()) && count(getSponsors()) > 0)
	<section class="our-local-supporters-section">
		<div class="container">
			<div class="row first-row">
				<p class="text-center text-uppercase medium">Our local supporters</p>
			</div>

			<div class="row second-row">
				<div class="local-supporters-slider">
					@foreach (getSponsors() as $sponsor)
						<div class="item">
							@if ($sponsor->link)
                                <a href="{{ url($sponsor->link) }}" @if ($sponsor->link_new_tab) target="_blank" @endif>
                                	<img src="{{ asset('public/backend/images/sponsors/' . $sponsor->logo) }}" alt="{{ $sponsor->logo_alternative_text }}">
                                </a>
							@else
							    <img src="{{ asset('public/backend/images/sponsors/' . $sponsor->logo) }}" alt="{{ $sponsor->logo_alternative_text }}">
							@endif
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>
@endif