@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="create-wrapper">
		<form action="/create" method="post">
            {{ csrf_field() }}
			<div class="select-box">

				<div class="select-type">
					<label for="notice" class="label">
						<input type="radio" name="kind" value="1" id="notice">告知
					</label>
					<label for="collect" class="label">
						<input type="radio" name="kind" value="2" id="collect">募集
					</label>
				</div>
                
                <textarea class="title-board" name="title" cols="30" rows="1"></textarea>
				<textarea class="text-board" name="description" rows="14" cols="80"></textarea>

				<div class="select-time">
					<p>Gone Time</p>
					<div>
						<label for="day" class="time-set">
							<input type="text" name="day_time">days
						</label>
						<label for="hour" class="time-set">
							<input type="text" name="hour_time">hour
						</label>
						<label for="min" class="time-set">
							<input type="text" name="min_time">min
						</label>
					</div>
				</div>

				<input type="submit" value="投稿する" class="submit-btn">
			</div>
		</form>
	</div>
@endsection