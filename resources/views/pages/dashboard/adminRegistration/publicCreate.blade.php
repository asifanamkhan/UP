@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('পাবলিক রেজিস্ট্রেশান') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('userPublicCreate') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="word_no" class="col-md-4 col-form-label text-md-right">{{ __('ওয়ার্ড নং') }}</label>

                                <div class="col-md-6">
                                    <select name="word_no" id="word_no" class="form-control" required>
                                        <option value="0">চিহ্নিত করুন</option>
                                        <option value="1">1 ওয়ার্ড</option>
                                        <option value="2">2 ওয়ার্ড</option>
                                        <option value="3">3 ওয়ার্ড</option>
                                        <option value="4">4 ওয়ার্ড</option>
                                        <option value="5">5 ওয়ার্ড</option>
                                        <option value="6">6 ওয়ার্ড</option>
                                        <option value="7">7 ওয়ার্ড</option>
                                        <option value="8">8 ওয়ার্ড</option>
                                        <option value="9">9 ওয়ার্ড</option>
                                    </select>
                                    @if ($errors->has('word_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('word_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="holding_no" class="col-md-4 col-form-label text-md-right">{{ __('হোল্ডিং নং') }}</label>

                                <div class="col-md-6">
                                    <input required class=" form-control" name="holding_no" id="holding_no" placeholder="">

                                @if ($errors->has('holding_no'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('holding_no') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('নাম') }}</label>

                                <div class="col-md-6">
                                    <input id="name" readonly type="text" class="form-control" name="" required autofocus>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ইমেইল') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required readonly>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('মোবাইল') }}</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} " name="name" id="mob" readonly required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('পাসওয়ার্ড') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('পুনরায় পাসওয়ার্ড দিন') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
<script>
    $(document).on('change keyup','#word_no,#holding_no',function () {
        var token = "{{csrf_token()}}";
        $.ajax({
            type:"POST",
            url:"{{route('publicReg')}}",
            data:{
                'word_no':$('#word_no').val(),
                'holding_no':$('#holding_no').val(),
                '_token':token
            },
            success:function (result) {

                $('#name').val(result.bname);
                $('#mob').val(result.mob);
                $('#email').val(result.email);


            },
        });

    });
</script>
