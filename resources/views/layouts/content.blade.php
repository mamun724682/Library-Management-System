<h5>{{ $ntc->title }}</h5>
<img src="{{  $ntc->image? $ntc->image : asset('frontEnd/images/2.jpg') }}" alt=" " class="img-responsive" />
<p>{!! $ntc->description !!}
</p>