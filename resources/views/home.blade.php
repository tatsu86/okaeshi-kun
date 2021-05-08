@extends('./_layouts.parent')

@section('content')

<div class="container mt-2">
  <div class="row simple">
    <div class="col">
      <a class="card mb-2" href="{{ route('event.list') }}">
        <div class="card-body text-center">
          Events
        </div>
      </a>
    </div>

    <div class="col">
      <a class="card mb-2" href="{{ route('celebrater.list') }}">
        <div class="card-body text-center">
          Celebraters
        </div>
      </a>
    </div>
  </div>

  <div class="row simple">
    <div class="col">
      <a class="card mb-2" href="{{ route('help.list') }}">
        <div class="card-body text-center">
          Help
        </div>
      </a>
    </div>

    <div class="col">
      <a class="card mb-2" href="{{ route('help.list') }}">
        <div class="card-body text-center">
          Template
        </div>
      </a>
    </div>
  </div>
</div>
@endsection
