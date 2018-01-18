{{-- Social buttons--}}

<div class="text-center margin-bottom-20" id="uLogin"
     data-ulogin="display=panel;theme=flat;fields=first_name,last_name,email,nickname,photo,country;
                             providers=facebook,vkontakte,odnoklassniki,mailru;hidden=other;
                             redirect_uri={{ env('APP_URL')}}/ulogin;mobilebuttons=0;">
</div>

@section('js')
    <script src="https://ulogin.ru/js/ulogin.js"></script>
@endsection